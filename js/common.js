/* global window, document, Gplcart, jQuery */
(function (window, document, Gplcart, $) {

    "use strict";

    var pageinit = {};

    $.mobile.ajaxEnabled = false;

    /**
     * Returns HTML of "In comparison" button
     * @returns {String}
     */
    var htmlBtnInCompare = function () {
        var html = '<a rel="nofollow" href="' + Gplcart.settings.base + 'compare" class="ui-btn ui-icon-bullets ui-corner-all ui-btn-icon-right ui-btn-active">';
        html += Gplcart.text('Already in comparison');
        html += '</a>';
        return html;
    };

    /**
     * Returns HTML of "In wishlist" button
     * @returns {String}
     */
    var htmlBtnInWishlist = function () {

        var html = '<a rel="nofollow" href="' + Gplcart.settings.base + 'wishlist" class="ui-btn ui-icon-heart ui-corner-all ui-btn-icon-right ui-btn-active">';
        html += Gplcart.text('Already in wishlist');
        html += '</a>';
        return html;
    };

    /**
     * Handles "Add to cart" action
     * @param {String} action
     * @param {Object} data
     * @returns {undefined}
     */
    var submitAddToCart = function (action, data) {
        if (action === 'add_to_cart' && 'quantity' in data) {
            $('#cart-quantity').text(data.quantity);
        }
    };

    /**
     * Handles "Remove from cart" action
     * @param {String} action
     * @param {Object} data
     * @returns {undefined}
     */
    var submitRemoveFromCart = function (action, data) {
        if (action === 'remove_from_cart' && 'quantity' in data) {
            $('#cart-quantity').text(data.quantity);
        }
    };

    /**
     * Handles "Add to compare" action
     * @param {String} action
     * @param {Object} data
     * @param {Object} button
     * @returns {undefined}
     */
    var submitAddToCompare = function (action, data, button) {
        if (action === 'add_to_compare' && 'quantity' in data) {
            $('#compare-quantity').text(data.quantity);
            button.replaceWith(htmlBtnInCompare());
        }
    };

    /**
     * Handles "Add to wishlist" action
     * @param {String} action
     * @param {Object} data
     * @param {Object} button
     * @returns {undefined}
     */
    var submitAddToWishlist = function (action, data, button) {
        if (action === 'add_to_wishlist' && 'quantity' in data) {
            $('#wishlist-quantity').text(data.quantity);
            button.replaceWith(htmlBtnInWishlist());
        }
    };

    /**
     * Handles "Remove from wishlist" action
     * @param {String} action
     * @param {Object} data
     * @returns {undefined}
     */
    var submitRemoveFromWishlist = function (action, data) {
        if (action === 'remove_from_wishlist' && 'quantity' in data) {
            $('#wishlist-quantity').text(data.quantity);
        }
    };

    /**
     * Returns an array of selected field values
     * @returns {Array}
     */
    var getSelectedOptions = function () {

        var value, values = [];

        $('[name^="product[options]"]:checked, [name^="product[options]"] option:selected').each(function () {
            value = $(this).val();
            if (value.length) {
                values.push(value);
            }
        });

        return values;
    };

    /**
     * Open up popup window
     * @param {String} selector
     * @param {String} content
     * @returns {undefined}
     */
    var openPopUp = function (selector, content) {

        var listview, popup = $(selector);

        popup.find('.popup-container').html(content);
        listview = popup.find('[data-role="listview"]');

        if (listview.length) {
            listview.listview();
        }

        popup.popup('open');
    };

    /**
     * Handles cart preview
     */
    $(document).on('click', '#cart-preview-link', function () {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: Gplcart.settings.base + 'ajax',
            data: {
                action: 'getCartPreviewAjax',
                token: Gplcart.settings.token
            },
            success: function (data) {
                if (typeof data === 'object' && data.preview) {
                    openPopUp('#cart-preview-popup', data.preview);
                }
            },
            beforeSend: function () {
                $.mobile.loading('show');
            },
            complete: function () {
                $.mobile.loading('hide');
            }
        });
    });

    /**
     * Handles confirmation dialogs
     * @returns {undefined}
     */
    pageinit.confirm = function () {

        var form, button, popup;

        $(document).on('click', '[data-confirm]', function () {
            button = $(this);
            form = button.closest('form');
            if (form.length) {
                popup = $('#confirm-popup[data-role="popup"]');
                popup.find('.popup-container').text(button.data('confirm'));
                popup.popup('open');
                return false;
            }
        });

        $(document).on('click', '[data-confirm-ok="true"]', function () {
            if (button && form) {
                form.append($('<input>', {
                    type: 'hidden',
                    val: button.val(),
                    name: button.attr('name')
                })).submit();
            }
        });
    };

    /**
     * Handles changing product options
     * @returns {undefined}
     */
    pageinit.updateOption = function () {

        var selected = getSelectedOptions(), message = $('.add-to-cart .message');

        $(document).on('change', '[name^="product[options]"]', function () {

            selected = getSelectedOptions();

            $.ajax({
                data: {
                    values: selected,
                    action: 'switchProductOptionsAjax',
                    token: Gplcart.settings.token,
                    product_id: Gplcart.settings.product.product_id
                },
                method: 'POST',
                dataType: 'json',
                url: Gplcart.settings.base + 'ajax',
                success: function (data) {
                    if (typeof data === 'object') {

                        $('#sku').text(data.sku);
                        $('#price').text(data.price_formatted);

                        if (data.original_price_formatted) {
                            $('#original-price').text(data.original_price_formatted);
                        }

                        if (data.message) {
                            message.html(data.message);
                        }

                        if (data.modal) {
                            openPopUp('#common-popup', data.modal);
                        }

                        $('[name="add_to_cart"]').prop('disabled', !data.cart_access);
                    }
                },
                beforeSend: function () {
                    message.empty();
                    $.mobile.loading('show');
                },
                complete: function () {
                    $.mobile.loading('hide');
                }
            });
        });
    };

    /**
     * Handles checkout form submits
     * @returns {undefined}
     */
    pageinit.submitCheckout = function () {

        var clicked;

        $(document).on('change', 'form#checkout :input:not([data-ajax="false"])', function () {
            $('form#checkout').submit();
        });

        $(document).on('click', 'form#checkout :submit', function () {
            clicked = $(this);
            $(this).closest('form').append($('<input>').attr({
                type: 'hidden',
                name: $(this).attr('name'),
                value: $(this).attr('value')
            }));
        });

        $(document).off('submit').on('submit', 'form#checkout', function (e) {

            if (clicked && clicked.data('ajax') === false) {
                return true;
            }

            e.preventDefault();

            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: Gplcart.settings.urn,
                data: $('form#checkout').serialize(),
                success: function (data) {
                    if (data.length) {
                        $('#checkout-form-wrapper').html(data);
                    }
                },
                beforeSend: function () {
                    $.mobile.loading('show');
                },
                complete: function () {
                    $.mobile.loading('hide');

                    $('form#checkout select').selectmenu();
                    $('form#checkout input[type=text], form#checkout input:not([type]), form#checkout textarea, form#checkout input[type=password]').textinput();
                    $('form#checkout :checkbox, form#checkout :radio').checkboxradio();

                    $('form#checkout [data-role="listview"]').listview();
                    $('form#checkout [data-role="collapsible"]').collapsible();
                    $('form#checkout [data-role="controlgroup"]').controlgroup();

                }
            });
        });
    };

    /**
     * Handles various submit events
     * @returns {undefined}
     */
    pageinit.submit = function () {

        var button, action, popup = '#common-popup[data-role="popup"]';

        $(document).on('click', ':button[name][data-ajax="true"]', function (e) {

            e.preventDefault();

            button = $(this);
            action = button.attr('name');

            if (!action) {
                return false;
            }

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: Gplcart.settings.urn,
                data: button.closest('form').serialize() + '&' + action + '=1',
                success: function (data) {

                    if (typeof data !== 'object') {
                        return false;
                    }

                    if (data.redirect) {
                        window.location.replace(Gplcart.settings.base + data.redirect);
                        return false;
                    }

                    if ('modal' in data) {
                        openPopUp(popup, data.modal);
                    } else if (data.message) {
                        openPopUp(popup, data.message);
                    }

                    if (data.severity === 'success') {
                        submitAddToCart(action, data);
                        submitRemoveFromCart(action, data);
                        submitAddToCompare(action, data, button);
                        submitAddToWishlist(action, data, button);
                        submitRemoveFromWishlist(action, data, button);
                    }
                },
                beforeSend: function () {
                    $.mobile.loading('show');
                },
                complete: function () {
                    $.mobile.loading('hide');
                }
            });

            return false;
        });
    };

    /**
     * Keeps original page title 
     * @returns {undefined}
     */
    pageinit.title = function () {
        $(":jqmData(role='page')").attr("data-title", document.title);
    };

    /**
     * Call all registered methods on JM's pageinit event
     */
    $(document).on('pageinit', '#main-page', function () {
        $.each(pageinit, function () {
            this.call();
        });
    });

})(window, document, Gplcart, jQuery);
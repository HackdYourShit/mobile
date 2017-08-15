<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (empty($cart['items'])) { ?>
<?php echo $this->text('Shopping cart is empty. <a href="@url">Shop now</a>', array('@url' => $this->url('catalog'))); ?>
<?php } else { ?>
<form method="post" id="checkout">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <?php if ($show_login_form) { ?>
  <?php echo $pane_login; ?>
  <?php } else if (!$_is_logged_in) { ?>
  <div class="form-group">
    <button class="ui-btn ui-corner-all ui-btn-icon-right ui-icon-user" name="checkout_login" value="1">
      <?php echo $this->text('Already registered?'); ?> <?php echo $this->text('Click to login'); ?>
    </button>
  </div>
  <?php } ?>
  <?php if (!$show_login_form) { ?>
  <?php if (!empty($pane_shipping_address)) { ?>
  <?php echo $pane_shipping_address; ?>
  <?php } ?>
  <?php if (!empty($pane_payment_address)) { ?>
  <?php echo $pane_payment_address; ?>
  <?php } ?>
  <?php if (!empty($pane_shipping_methods)) { ?>
  <?php echo $pane_shipping_methods; ?>
  <?php } ?>
  <?php if (!empty($pane_payment_methods)) { ?>
  <?php echo $pane_payment_methods; ?>
  <?php } ?>
  <?php if (!empty($pane_review)) { ?>
  <?php echo $pane_review; ?>
  <?php } ?>
  <?php if (!empty($pane_comment)) { ?>
  <?php echo $pane_comment; ?>
  <?php } ?>
  <?php if (!empty($pane_action)) { ?>
  <?php echo $pane_action; ?>
  <?php } ?>
  <?php } ?>
</form>
<?php } ?>
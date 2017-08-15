<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<body<?php echo $this->attributes(array('class' => $_classes)); ?>>
  <div data-role="page" id="main-page" data-title="">
    <div data-role="panel" data-position="left" data-display="overlay" id="left-panel" class="ui-panel ui-panel-position-left ui-panel-display-overlay ui-body-a ui-panel-animate ui-panel-open">
      <ul data-role="listview" data-count-theme="b" class="ui-body-a">
        <li data-icon="user">
          <?php if ($_is_logged_in) { ?>
          <a href="<?php echo $this->url("account/$_uid"); ?>">
            <?php echo $this->e($_user['name']); ?>
          </a>
          <?php } else { ?>
          <a rel="nofollow" href="<?php echo $this->url('login'); ?>">
            <?php echo $this->text('Log in'); ?>
          </a>
          <?php } ?>
        </li>
        <li data-role="list-divider"></li>
        <li data-icon="home"><a href="<?php echo $this->url('/'); ?>"><?php echo $this->text('Home'); ?></a></li>
        <li data-icon="bullets"><a href="<?php echo $this->url('catalog'); ?>"><?php echo $this->text('Catalog'); ?></a></li>
        <li data-role="list-divider"></li>
        <li class="cart" data-icon="false">
          <a rel="nofollow" href="<?php echo $this->url('checkout'); ?>">
            <?php echo $this->text('Cart'); ?>
            <span id="cart-quantity" class="ui-li-count"><?php echo empty($_cart['quantity']) ? 0 : $_cart['quantity']; ?></span>
          </a>
        </li>
        <li class="wishlist" data-icon="false">
          <a rel="nofollow" href="<?php echo $this->url('wishlist'); ?>">
            <?php echo $this->text('Wishlist'); ?>
            <span id="wishlist-quantity" class="ui-li-count"><?php echo count($_wishlist); ?></span>
          </a>
        </li>
        <li class="compare" data-icon="false">
          <a rel="nofollow" id="compare-link" href="<?php echo $this->url('compare'); ?>">
            <?php echo $this->text('Compare'); ?>
            <span id="compare-quantity" class="ui-li-count">
              <?php echo count($_comparison); ?>
            </span>
          </a>
        </li>
        <li data-role="list-divider" data-theme="a"></li>
        <li data-icon="phone">
          <a rel="nofollow" href="<?php echo $this->url('page/1'); ?>"><?php echo $this->text('Contact'); ?></a>
        </li>
        <li data-icon="info">
          <a rel="nofollow" href="<?php echo $this->url('page/2'); ?>"><?php echo $this->text('Help'); ?></a>
        </li>
        <li data-role="list-divider"></li>
        <?php if (count($_languages) > 1) { ?>
        <li>
          <a href="#language-popup" data-rel="popup" data-transition="pop" data-position-to="window">
            <?php if (empty($_languages[$_langcode]['status'])) { ?>
            <?php echo $this->text('select language'); ?>
            <?php } else { ?>
            <?php echo $this->text('Language'); ?>: <?php echo $this->e($_languages[$_langcode]['name']); ?>
            <?php } ?>
          </a>
        </li>
        <?php } ?>
        <li>
          <a rel="nofollow" data-rel="popup" data-transition="pop" data-position-to="window" href="#currency-popup"><?php echo $this->text('Currency'); ?>: <?php echo $this->e($_currency['code']); ?></a>
        </li>
        <?php if ($_is_logged_in) { ?>
        <li data-role="list-divider"></li>
        <li data-icon="action">
          <a href="<?php echo $this->url('logout'); ?>">
            <?php echo $this->text('Log out'); ?>
          </a>
        </li>
        <?php } ?>
      </ul>
    </div>
    <div data-role="header" data-position="fixed">
      <a href="#left-panel" class="ui-btn ui-btn-left ui-alt-icon ui-nodisc-icon ui-corner-all ui-btn-icon-notext ui-icon-bars"></a>
      <h1>
        <?php if (empty($_store_logo)) { ?>
        <a class="store-title" href="<?php echo $this->e($_base); ?>">
          <?php echo $this->e($_store_title); ?>
        </a>
        <?php } else { ?>
        <a class="store-logo" href="<?php echo $this->e($_base); ?>">
          <img src="<?php echo $this->e($_store_logo); ?>">
        </a>
        <?php } ?>
      </h1>
      <a id="cart-preview-link" href="#" class="ui-btn ui-btn-right ui-alt-icon ui-nodisc-icon ui-corner-all ui-btn-icon-notext ui-icon-shop"></a>
      <div class="ui-bar">
        <form action="search">
          <input type="search" name="q" value="" placeholder="<?php echo $this->text('Search'); ?>">
        </form>
      </div>
    </div>
    <div role="main" class="ui-content" id="main-content">
      <?php if (!empty($_messages)) { ?>
      <?php foreach ($_messages as $type => $strings) { ?>
      <div class="ui-body ui-body-a ui-corner-all section alert alert-<?php echo $this->e($type); ?>">
        <?php foreach ($strings as $string) { ?>
        <?php echo $this->filter($string); ?><br>
        <?php } ?>
      </div>
      <?php } ?>
      <?php } ?>
      <?php if (!empty($region_content)) { ?>
      <?php echo $region_content; ?>
      <?php } ?>
    </div>
    <div data-role="footer" data-position="fixed">
      <h4>
        <a href="mailto:<?php echo $this->e($_store['data']['email'][0]); ?>"><?php echo $this->e($_store['data']['email'][0]); ?></a>
        <?php if (!empty($_store['data']['phone'][0])) { ?>
        <a href="tel:<?php echo $this->e($_store['data']['phone'][0]); ?>"><?php echo $this->e($_store['data']['phone'][0]); ?></a>
        <?php } ?>
      </h4>
    </div>
    <?php if (count($_languages) > 1) { ?>
    <div id="language-popup" data-role="popup" data-overlay-theme="b">
      <ul data-role="listview" data-inset="true">
        <?php foreach ($_languages as $language) { ?>
        <?php if ($language['code'] !== $_langcode && !empty($language['status'])) { ?>
        <li>
          <a href="<?php echo $this->lurl($language['code'], '', $_query); ?>">
            <?php echo $this->e($language['native_name']); ?>
          </a>
        </li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
    <?php } ?>
    <?php if (count($_currencies) > 1) { ?>
    <div id="currency-popup" data-role="popup" data-overlay-theme="b">
      <ul data-role="listview" data-inset="true">
        <?php foreach ($_currencies as $currency) { ?>
        <li><a rel="nofollow" href="<?php echo $this->url('', array('currency' => $currency['code'])); ?>"><?php echo $this->e($currency['name']); ?></a></li>
        <?php } ?>
      </ul>
    </div>
    <?php } ?>
    <div id="cart-preview-popup" data-role="popup" data-overlay-theme="b">
      <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right"></a>
      <div class="popup-container ui-content"><?php echo $this->text('Shopping cart is empty.'); ?></div>
    </div>
    <div id="common-popup" data-role="popup" data-overlay-theme="b">
      <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right"></a>
      <div class="popup-container ui-content"></div>
    </div>
    <div id="confirm-popup" data-role="popup" data-overlay-theme="b" data-dismissible="false">
      <div class="ui-content">
        <div class="popup-container"></div>
        <a href="#" class="ui-btn ui-corner-all ui-btn-inline ui-btn-b cancel" data-rel="back"><?php echo $this->text('Cancel'); ?></a>
        <a href="#" class="ui-btn ui-corner-all ui-btn-inline ok" data-confirm-ok="true" data-rel="back" data-transition="flow"><?php echo $this->text('OK'); ?></a>
      </div>
    </div>
  </div>
</body>

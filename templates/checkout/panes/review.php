<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all checkout-review section">
  <div class="title"><?php echo $this->text('Review'); ?></div>
  <?php if (!empty($messages['cart'])) { ?>
  <div class="ui-body ui-body-a ui-corner-all alert alert-danger">
    <?php foreach ($messages['cart'] as $text) { ?>
    <div class="message"><?php echo $this->filter($text); ?></div>
    <?php } ?>
  </div>
  <?php } ?>
  <ul data-role="listview">
    <?php foreach ($cart['items'] as $sku => $item) { ?>
    <li class="cart<?php echo $this->error("cart.items.$sku", ' has-error'); ?>">
      <fieldset class="ui-grid-a ui-responsive">
        <div class="ui-block-a">
          <a target="_blank" href="<?php echo $this->url("product/{$item['product']['product_id']}"); ?>">
            <img src="<?php echo $this->e($item['thumb']); ?>">
          </a>
          <div class="info">
            <div class="price">
              <?php if (isset($item['original_price']) && $item['original_price'] > $item['price']) { ?>
              <s><?php echo $this->e($item['original_price_formatted']); ?></s>
              <?php } ?>
              <?php echo $this->e($item['price_formatted']); ?>
            </div>
            <div class="title">
              <a target="_blank" href="<?php echo $this->url("product/{$item['product']['product_id']}"); ?>">
                <?php echo $this->e($this->truncate($item['product']['title'], 50)); ?>
              </a>
            </div>
            <input name="order[cart][items][<?php echo $this->e($sku); ?>][quantity]" value="<?php echo $this->e($item['quantity']); ?>">
          </div>
        </div>
        <div class="ui-block-b">
          <div class="buttons">
            <button class="ui-btn ui-btn-icon-right ui-icon-delete ui-corner-all" name="order[cart][action][delete]" value="<?php echo $this->e($item['cart_id']); ?>"><?php echo $this->text('Delete'); ?></button>
            <button class="ui-btn ui-btn-icon-right ui-icon-heart ui-corner-all" data-ajax="false" name="order[cart][action][wishlist]" value="<?php echo $this->e($sku); ?>"><?php echo $this->text('Wishlist'); ?></button>
          </div>
        </div>
      </fieldset>
    </li>
    <?php } ?>
    <?php if (!empty($price_components)) { ?>
    <li data-role="list-divider">
      <div class="ui-grid-b">
        <div class="ui-block-a">
          <?php echo $this->text('Subtotal'); ?>
        </div>
        <div class="ui-block-b">
          <?php echo $this->e($cart['total_formatted']); ?>
        </div>
      </div>
    </li>
    <?php } ?>
    <?php foreach ($price_components as $id => $price_component) { ?>
    <li data-role="list-divider">
      <div class="ui-grid-b">
        <div class="ui-block-a">
          <?php echo $this->e($price_component['name']); ?>
        </div>
        <div class="ui-block-b">
          <?php if (isset($price_component['rule']['code']) && $price_component['rule']['code'] !== '') { ?>
          <div data-role="fieldcontain" class="<?php echo $this->error('check_pricerule', 'has-error'); ?>">
            <input name="order[data][pricerule_code]" placeholder="<?php echo $this->text('Enter code'); ?>" value="<?php echo isset($order['data']['pricerule_code']) ? $this->e($order['data']['pricerule_code']) : ''; ?>">
            <button class="btn btn-default" name="check_pricerule" value="<?php echo $this->e($id); ?>"><?php echo $this->text('Apply'); ?></button>
          </div>
          <?php if ($price_component['price'] != 0) { ?>
          <?php echo $this->e($price_component['price_formatted']); ?>
          <?php } ?>
          <?php } else { ?>
          <?php echo $this->e($price_component['price_formatted']); ?>
          <input type="hidden" name="order[data][components][<?php echo $this->e($id); ?>][price]" value="<?php echo $this->e($price_component['price']); ?>">
          <?php } ?>
          <?php echo $this->error("data.components.$id"); ?>
        </div>
      </div>
    </li>
    <?php } ?>
    <li data-role="list-divider">
      <div class="ui-grid-b">
        <div class="ui-block-a">
          <?php echo $this->text('Grand total'); ?>
        </div>
        <div class="ui-block-b">
          <input type="hidden" name="order[total]" value="<?php echo $this->e($total); ?>">
          <b><?php echo $this->e($total_formatted); ?></b>
          <?php echo $this->error('total'); ?>
        </div>
      </div>
    </li>
  </ul>
  <?php if (!empty($messages['components'])) { ?>
  <div class="ui-body ui-body-a ui-corner-all alert alert-danger">
    <?php foreach ($messages['components'] as $text) { ?>
    <div><?php echo $this->filter($text); ?></div>
    <?php } ?>
  </div>
  <?php } ?>
</div>

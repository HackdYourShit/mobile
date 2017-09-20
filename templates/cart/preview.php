<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div>
  <?php if (empty($cart['items'])) { ?>
  <?php echo $this->text('Shopping cart is empty'); ?>
  <?php } else { ?>
  <ul data-role="listview" data-inset="true">
    <?php foreach ($cart['items'] as $item) { ?>
    <li>
      <a href="<?php echo $this->url("product/{$item['product']['product_id']}"); ?>">
        <img src="<?php echo $this->e($item['thumb']); ?>">
        <h3><?php echo $this->truncate($this->e($item['product']['title']), 100); ?></h3>
        <p><?php echo $this->e($item['quantity']); ?> X <?php echo $this->e($item['price_formatted']); ?> = <?php echo $this->e($item['total_formatted']); ?></p>
      </a>
    </li>
    <?php } ?>
    <li data-role="list-divider">
      <h3><?php echo $this->text('Subtotal'); ?> : <span class="cart-preview-subtotal"><?php echo $this->e($cart['total_formatted']); ?></span></h3>
      <p><?php echo $this->text('Final price will be shown on checkout page'); ?></p>
    </li>
  </ul>
  <?php } ?>
  <a href="<?php echo $this->url('checkout'); ?>" class="ui-btn"><?php echo $this->text('Cart / Checkout'); ?></a>
</div>
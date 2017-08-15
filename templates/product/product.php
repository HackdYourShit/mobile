<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<h1><?php echo $this->e($product['title']); ?></h1>
<?php echo $this->text('Rating'); ?> <?php echo $rating; ?>
<div id="price"><?php echo $this->text('Price'); ?> <?php echo $this->e($product['selected_combination']['price_formatted']); ?></div>
<?php echo $this->text('SKU'); ?>: <span id="sku"><?php echo $this->e($product['selected_combination']['sku']); ?></span>
<s id="original-price">
<?php if (isset($product['selected_combination']['original_price']) && $product['selected_combination']['original_price'] > $product['selected_combination']['price']) { ?>
<?php echo $this->e($product['selected_combination']['original_price_formatted']); ?>
<?php } ?>
</s>
<?php if (!empty($images)) { ?>
<?php echo $images; ?>
<?php } ?>
<?php if (!empty($summary)) { ?>
<?php echo $this->e($this->truncate($summary, 500)); ?>
<?php } ?>
<?php echo $cart_form; ?>
<div data-role="collapsibleset" data-theme="a" data-content-theme="a">
<?php if (!empty($description)) { ?>
<?php echo $description; ?>
<?php } ?>
<?php if (!empty($attributes)) { ?>
<?php echo $attributes; ?>
<?php } ?>
</div>
<?php if (!empty($related)) { ?>
<?php echo $related; ?>
<?php } ?>
<?php if (!empty($recent)) { ?>
<?php echo $recent; ?>
<?php } ?>
<?php if (!empty($reviews)) { ?>
<?php echo $reviews; ?>
<?php } ?>
<?php if ($this->config('review_editable', 1) && $_is_logged_in) { ?>
<a class="ui-btn ui-icon-comment ui-corner-all ui-btn-icon-right" rel="nofollow" href="<?php echo $this->url('review/add/' . $product['product_id']); ?>">
  <?php echo $this->text('Add review'); ?>
</a>
<?php } ?>

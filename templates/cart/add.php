<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all add-to-cart section">
<form method="post" class="add-to-cart">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <input type="hidden" name="product[product_id]" value="<?php echo $this->e($product['product_id']); ?>">
  <?php if (!empty($product['fields']['option'])) { ?>
  <?php foreach ($product['fields']['option'] as $field_id => $field) { ?>
  <?php if (!empty($product['field']['option'][$field_id])) { ?>
  <fieldset data-role="controlgroup" class="field-widget-<?php echo $this->e($field['widget']); ?> field-id-<?php echo $this->e($field_id); ?>">
    <legend><?php echo $this->e($field['title']); ?></legend>
    <?php if ($field['widget'] === 'button') { ?>
    <label class="option-combination field-widget-button">
      <input class="option" data-field-id="<?php echo $this->e($field_id); ?>" name="product[options][<?php echo $this->e($field_id); ?>]" type="radio" value="">
      <?php echo $this->text('Any'); ?>
    </label>
    <?php foreach ($product['field']['option'][$field_id] as $field_value_id) { ?>
    <?php if (isset($field['values'][$field_value_id])) { ?>
    <label class="option-combination field-widget-button">
      <input class="option" data-field-id="<?php echo $this->e($field_id); ?>" data-field-title="<?php echo $this->e($field['values'][$field_value_id]['title']); ?>" data-field-value-id="<?php echo $this->e($field_value_id); ?>" type="radio" name="product[options][<?php echo $this->e($field_id); ?>]" value="<?php echo $this->e($field_value_id); ?>"<?php echo in_array($field_value_id, $product['default_field_values']) ? ' checked' : ''; ?>>
      <?php if (!empty($field['values'][$field_value_id]['thumb'])) { ?>
      <span class="ui-btn image has-value" style="background-image: url(<?php echo $this->e($field['values'][$field_value_id]['thumb']); ?>);"></span>
      <?php } else if (!empty($field['values'][$field_value_id]['color'])) { ?>
      <span class="ui-btn color has-value" style="background-color:<?php echo $this->e($field['values'][$field_value_id]['color']); ?>;"></span>
      <?php } else { ?>
      <span class="text"><?php echo $this->e($field['values'][$field_value_id]['title']); ?></span>
      <?php } ?>
    </label>
    <?php } ?>
    <?php } ?>
    <?php } else if ($field['widget'] === 'radio') { ?>
    <label class="option-combination field-widget-radio">
      <input class="option" data-field-id="<?php echo $this->e($field_id); ?>" name="product[options][<?php echo $this->e($field_id); ?>]" type="radio" value="">
      <?php echo $this->text('Any'); ?>
    </label>
    <?php foreach ($product['field']['option'][$field_id] as $field_value_id) { ?>
    <?php if (isset($field['values'][$field_value_id])) { ?>
    <label class="option-combination field-widget-radio">
      <input class="option" data-field-id="<?php echo $this->e($field_id); ?>" data-field-title="<?php echo $this->e($field['values'][$field_value_id]['title']); ?>" data-field-value-id="<?php echo $this->e($field_value_id); ?>" id="option-<?php echo $this->e($field_value_id); ?>" type="radio" name="product[options][<?php echo $this->e($field_id); ?>]" value="<?php echo $this->e($field_value_id); ?>"<?php echo in_array($field_value_id, $product['default_field_values']) ? ' checked' : ''; ?>>
      <?php echo $this->e($field['values'][$field_value_id]['title']); ?>
    </label>
    <?php } ?>
    <?php } ?>
    <?php } else if ($field['widget'] === 'select') { ?>
    <select class="option-combination" data-field-id="<?php echo $this->e($field_id); ?>" name="product[options][<?php echo $this->e($field_id); ?>]">
      <option data-field-id="<?php echo $this->e($field_id); ?>" value=""><?php echo $this->text('Any'); ?></option>
      <?php foreach ($product['field']['option'][$field_id] as $field_value_id) { ?>
      <?php if (isset($field['values'][$field_value_id])) { ?>
      <option data-field-id="<?php echo $this->e($field_id); ?>" data-field-title="<?php echo $this->e($field['values'][$field_value_id]['title']); ?>" data-field-value-id="<?php echo $this->e($field_value_id); ?>" value="<?php echo $this->e($field_value_id); ?>"<?php echo in_array($field_value_id, $product['default_field_values']) ? ' selected' : ''; ?>>
        <?php echo $this->e($field['values'][$field_value_id]['title']); ?>
      </option>
      <?php } ?>
      <?php } ?>
    </select>
    <?php } ?>
  </fieldset>
  <?php } ?>
  <?php } ?>
  <?php } ?>
  <p class="selected-combination"></p>
  <button name="add_to_cart" value="1" data-ajax="true" class="ui-btn ui-icon-shop ui-corner-all ui-btn-icon-right add-to-cart"<?php echo $product['selected_combination']['cart_access'] ? '' : ' disabled'; ?>>
    <?php echo $this->text('Add to cart'); ?>
  </button>
  <div class="message"><?php echo $product['selected_combination']['message']; ?></div>
  <?php if (empty($product['in_wishlist'])) { ?>
  <button class="ui-btn ui-icon-heart ui-corner-all ui-btn-icon-right" data-ajax="true" name="add_to_wishlist" value="1">
    <?php echo $this->text('Add to wishlist'); ?>
  </button>
  <?php } else { ?>
  <a rel="nofollow" href="<?php echo $this->url('wishlist'); ?>" class="ui-btn ui-icon-heart ui-corner-all ui-btn-icon-right ui-btn-active">
    <?php echo $this->text('Already in wishlist'); ?>
  </a>
  <?php } ?>
  <?php if (empty($product['in_comparison'])) { ?>
  <button class="ui-btn ui-icon-bullets ui-corner-all ui-btn-icon-right" data-ajax="true" name="add_to_compare" value="1">
    <?php echo $this->text('Compare'); ?>
  </button>
  <?php } else { ?>
  <a rel="nofollow" href="<?php echo $this->url('compare'); ?>" class="ui-btn ui-icon-bullets ui-corner-all ui-btn-icon-right ui-btn-active">
    <?php echo $this->text('Already in comparison'); ?>
  </a>
  <?php } ?>
  <?php echo $share; ?>
</form>
</div>
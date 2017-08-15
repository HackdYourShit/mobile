<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all shipping-address section">
  <?php echo $this->text('Shipping address'); ?>
  <?php if ($this->error('shipping_address', true)) { ?>
  <div class="ui-body ui-body-a ui-corner-all alert alert-danger">
    <?php echo $this->error('shipping_address'); ?>
  </div>
  <?php } ?>
  <?php if (!empty($addresses) && !$show_shipping_address_form) { ?>
  <fieldset data-role="controlgroup">
    <?php foreach ($addresses as $address_id => $address) { ?>
    <label class="address<?php echo ((isset($order['shipping_address']) && $order['shipping_address'] == $address_id) || count($addresses) == 1) ? ' active' : ''; ?>">
      <input type="radio" name="order[shipping_address]" value="<?php echo $this->e($address_id); ?>"<?php echo ((isset($order['shipping_address']) && $order['shipping_address'] == $address_id) || count($addresses) == 1) ? ' checked' : ''; ?>>
      <?php foreach ($address as $name => $value) { ?>
      <span class="small"><?php echo $this->e($name); ?> : <?php echo $this->e($value); ?></span>
      <?php } ?>
    </label>
    <?php } ?>
  </fieldset>
  <?php if ($can_add_address) { ?>
  <button class="ui-btn ui-corner-all ui-icon-plus ui-btn-icon-right" name="add_address" value="shipping"><?php echo $this->text('Add address'); ?></button>
  <?php } ?>
  <?php } else if ($can_add_address) { ?>
  <?php if (!empty($countries)) { ?>
  <div class="ui-field-contain<?php echo $this->error('address.shipping.country', ' has-error'); ?>">
    <label><?php echo $this->text('Country'); ?></label>
    <?php if (count($countries) > 1) { ?>
    <select name="order[address][shipping][country]">
      <option value="" disabled selected><?php echo $this->text('- select -'); ?></option>
      <?php foreach ($countries as $code => $name) { ?>
      <option value="<?php echo $this->e($code); ?>"<?php echo $address['shipping']['country'] == $code ? ' selected' : ''; ?>>
        <?php echo $this->e($name); ?>
      </option>
      <?php } ?>
    </select>
    <?php } else { ?>
    <?php echo $this->e(reset($countries)); ?>
    <input type="hidden" name="order[address][shipping][country]" value="<?php echo $this->e(key($countries)); ?>">
    <?php } ?>
  </div>
  <?php } ?>
  <?php if (empty($countries) || !empty($address['shipping']['country'])) { ?>
  <?php foreach ($format['shipping'] as $key => $data) { ?>
  <?php if ($key !== 'country') { ?>
  <div class="ui-field-contain<?php echo empty($data['required']) ? '' : ' required'; ?><?php echo $this->error("address.shipping.$key", ' has-error'); ?>">
    <label><?php echo $this->e($data['name']); ?></label>
    <?php if ($key === 'state_id') { ?>
    <select name="order[address][shipping][state_id]">
      <option value="" disabled selected><?php echo $this->text('- select -'); ?></option>
      <?php foreach ($states['shipping'] as $state_id => $state) { ?>
      <option value="<?php echo $this->e($state_id); ?>"<?php echo isset($address['shipping']['state_id']) && $address['shipping']['state_id'] == $state_id ? ' selected' : ''; ?>>
        <?php echo $this->e($state['name']); ?>
      </option>
      <?php } ?>
    </select>
    <?php } else { ?>
    <input name="order[address][shipping][<?php echo $this->e($key); ?>]" data-ajax="false" maxlength="255" value="<?php echo isset($address['shipping'][$key]) ? $this->e($address['shipping'][$key]) : ''; ?>">
    <?php } ?>
  </div>
  <?php } ?>
  <?php } ?>
  <?php } ?>
  <div class="ui-toolbar">
    <?php if (!empty($addresses)) { ?>
    <button class="ui-btn ui-corner-all ui-icon-back ui-btn-icon-right" name="cancel_address_form" value="shipping"><?php echo $this->text('Cancel'); ?></button>
    <?php } ?>
    <?php if ($can_save_address && (empty($countries) || !empty($address['shipping']['country']))) { ?>
    <button class="ui-btn ui-corner-all ui-icon-check ui-btn-icon-right" name="save_address" value="shipping">
      <?php echo $this->text('Save'); ?>
    </button>
    <?php } ?>
  </div>
  <?php } ?>
</div>
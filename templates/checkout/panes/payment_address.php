<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all payment-address section">
  <?php echo $this->text('Payment address'); ?>
  <?php if ($this->error('payment_address', true)) { ?>
  <div class="ui-body ui-body-a ui-corner-all alert alert-danger">
    <?php echo $this->error('payment_address'); ?>
  </div>
  <?php } ?>
  <input type="hidden" name="same_payment_address" value="0">
  <label>
    <input type="checkbox" name="same_payment_address" value="1"<?php echo $same_payment_address ? ' checked' : ''; ?>> <?php echo $this->text('My shipping and payment addresses are the same'); ?>
  </label>
  <?php if (!$same_payment_address) { ?>
  <?php if (!empty($addresses) && !$show_payment_address_form) { ?>
  <fieldset data-role="controlgroup" class="saved-addresses">
    <?php foreach ($addresses as $address_id => $address) { ?>
    <label class="address">
      <input type="radio" name="order[payment_address]" value="<?php echo $this->e($address_id); ?>"<?php echo isset($order['payment_address']) && $order['payment_address'] == $address_id ? ' checked' : ''; ?>>
      <?php foreach ($address as $name => $value) { ?>
      <span class="small"><?php echo $this->e($name); ?> : <?php echo $this->e($value); ?></span>
      <?php } ?>
    </label>
    <?php } ?>
  </fieldset>
  <?php if ($can_add_address) { ?>
  <button class="ui-btn ui-corner-all ui-icon-plus ui-btn-icon-right" name="add_address" value="payment"><?php echo $this->text('Add address'); ?></button>
  <?php } ?>
<?php } else if ($can_add_address) { ?>
  <?php if (!empty($countries)) { ?>
  <div class="ui-field-contain<?php echo $this->error('address.payment.country', ' has-error'); ?>">
    <label><?php echo $this->text('Country'); ?></label>
    <?php if (count($countries) > 1) { ?>
    <select name="order[address][payment][country]">
      <option value="" disabled selected><?php echo $this->text('- select -'); ?></option>
      <?php foreach ($countries as $code => $name) { ?>
      <option value="<?php echo $this->e($code); ?>"<?php echo $address['payment']['country'] == $code ? ' selected' : ''; ?>>
        <?php echo $this->e($name); ?>
      </option>
      <?php } ?>
    </select>
    <?php } else { ?>
    <?php echo $this->e(reset($countries)); ?>
    <input type="hidden" name="order[address][payment][country]" value="<?php echo $this->e(key($countries)); ?>">
    <?php } ?>
  </div>
  <?php } ?>
  <?php if (empty($countries) || !empty($address['payment']['country'])) { ?>
  <?php foreach ($format['payment'] as $key => $data) { ?>
  <?php if ($key !== 'country') { ?>
  <div class="ui-field-contain<?php echo empty($data['required']) ? '' : ' required'; ?><?php echo $this->error("address.payment.$key", ' has-error'); ?>">
    <label><?php echo $this->e($data['name']); ?></label>
    <?php if ($key === 'state_id') { ?>
    <select name="order[address][payment][state_id]">
      <option value="" disabled selected><?php echo $this->text('- select -'); ?></option>
      <?php foreach ($states['payment'] as $state_id => $state) { ?>
      <option value="<?php echo $this->e($state_id); ?>"<?php echo isset($address['payment']['state_id']) && $address['payment']['state_id'] == $state_id ? ' selected' : ''; ?>>
        <?php echo $this->e($state['name']); ?>
      </option>
      <?php } ?>
    </select>
    <?php } else { ?>
    <input name="order[address][payment][<?php echo $this->e($key); ?>]" data-ajax="false" maxlength="255" value="<?php echo isset($address['payment'][$key]) ? $this->e($address['payment'][$key]) : ''; ?>">
    <?php } ?>
  </div>
  <?php } ?>
  <?php } ?>
  <?php } ?>
  <div class="ui-toolbar">
    <?php if (!empty($addresses)) { ?>
    <button class="ui-btn ui-corner-all ui-icon-back ui-btn-icon-right" name="cancel_address_form" value="payment"><?php echo $this->text('Cancel'); ?></button>
    <?php } ?>
    <?php if ($can_save_address && (empty($countries) || !empty($address['payment']['country']))) { ?>
    <button class="ui-btn ui-corner-all ui-icon-check ui-btn-icon-right" name="save_address" value="payment">
      <?php echo $this->text('Save'); ?>
    </button>
    <?php } ?>
  </div>
  <?php } ?>
  <?php } ?>
</div>
<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all payment-methods section">
  <?php echo $this->text('Payment method'); ?>
  <?php if ($this->error('payment', true) && !is_array($this->error('payment'))) { ?>
  <div class="ui-body ui-body-a ui-corner-all alert alert-danger">
    <?php echo $this->error('payment'); ?>
  </div>
  <?php } ?>
  <fieldset data-role="controlgroup">
    <?php if ($show_payment_methods) { ?>
    <?php foreach ($payment_methods as $method_id => $method) { ?>
    <label>
      <?php if (!empty($method['image'])) { ?>
      <img src="<?php echo $this->e($method['image']); ?>">
      <?php } ?>
      <input type="radio" name="order[payment]" value="<?php echo $this->e($method_id); ?>"<?php echo ((isset($order['payment']) && $order['payment'] == $method_id) || count($payment_methods) == 1 || $default_payment_method == $method_id) ? ' checked' : ''; ?>>
      <?php echo $this->e($method['title']); ?>
      <?php if (!empty($method['description'])) { ?>
      <span class="description small block"><?php echo $this->filter($method['description']); ?></span>
      <?php } ?>
    </label>
    <?php if (isset($context_templates['payment']) && isset($order['payment']) && $order['payment'] == $method_id) { ?>
    <?php echo $context_templates['payment']; ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
  </fieldset>
  <?php if (!empty($has_dynamic_payment_methods)) { ?>
  <button class="ui-btn ui-corner-all ui-icon-refresh ui-btn-icon-right" name="get_payment_methods" value="1">
    <?php echo $this->text('Get payment services'); ?>
  </button>
  <?php } ?>
</div>
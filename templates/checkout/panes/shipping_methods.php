<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all shipping-methods section">
  <?php echo $this->text('Shipping method'); ?>
  <?php if ($this->error('shipping', true) && !is_array($this->error('shipping'))) { ?>
  <div class="ui-body ui-body-a ui-corner-all alert alert-danger">
    <?php echo $this->error('shipping'); ?>
  </div>
  <?php } ?>
  <fieldset data-role="controlgroup">
    <?php if ($show_shipping_methods) { ?>
    <?php foreach ($shipping_methods as $method_id => $method) { ?>
    <label>
      <?php if (!empty($method['image'])) { ?>
      <img src="<?php echo $this->e($method['image']); ?>">
      <?php } ?>
      <input type="radio" name="order[shipping]" value="<?php echo $this->e($method_id); ?>"<?php echo ((isset($order['shipping']) && $order['shipping'] == $method_id) || count($shipping_methods) == 1 || $default_shipping_method == $method_id) ? ' checked' : ''; ?>>
      <?php echo $this->e($method['title']); ?>
      <?php if (!empty($method['description'])) { ?>
      <span class="description small block"><?php echo $this->filter($method['description']); ?></span>
      <?php } ?>
    </label>
    <?php if (isset($context_templates['shipping']) && isset($order['shipping']) && $order['shipping'] == $method_id) { ?>
    <?php echo $context_templates['shipping']; ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
  </fieldset>
  <?php if (!empty($has_dynamic_shipping_methods)) { ?>
  <button class="ui-btn ui-corner-all ui-icon-refresh ui-btn-icon-right" name="get_shipping_methods" value="1">
    <?php echo $this->text('Get shipping services'); ?>
  </button>
  <?php } ?>
</div>
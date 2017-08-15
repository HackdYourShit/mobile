<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all checkout-login section">
  <?php if ($this->error('login', true)) { ?>
  <div class="ui-body ui-body-a ui-corner-all alert alert-danger">
    <?php echo $this->error('login'); ?>
  </div>
  <?php } ?>
  <div class="ui-field-contain form-group<?php echo $this->error('order.user.email', ' has-error'); ?>">
    <label><?php echo $this->text('E-mail'); ?></label>
    <input name="order[user][email]" data-ajax="false" value="<?php echo isset($order['user']['email']) ? $this->e($order['user']['email']) : ''; ?>" autofocus>
    <div class="help-block"><?php echo $this->error('order.user.email'); ?></div>
  </div>
  <div class="ui-field-contain form-group">
    <label><?php echo $this->text('Password'); ?></label>
    <input type="password" data-ajax="false" name="order[user][password]" value="">
  </div>
  <button class="ui-btn ui-corner-all ui-btn-icon-right ui-icon-back" name="checkout_anonymous" value="1"><?php echo $this->text('Continue as guest'); ?></button>
  <button class="ui-btn ui-corner-all ui-btn-icon-right ui-icon-arrow-r" data-ajax="false" name="login" value="1"><?php echo $this->text('Log in'); ?></button>
</div>

<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-grid-b">
  <div class="ui-block-a"><a class="ui-btn ui-corner-all" href="<?php echo $this->url('login'); ?>"><?php echo $this->text('Login'); ?></a></div>
  <div class="ui-block-b"><a class="ui-btn ui-corner-all ui-btn-active" href="<?php echo $this->url('register'); ?>"><?php echo $this->text('Register'); ?></a></div>
  <div class="ui-block-c"><a class="ui-btn ui-corner-all" href="<?php echo $this->url('forgot'); ?>"><?php echo $this->text('Forgot password'); ?></a></div>
</div>
<form method="post">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <div class="form-group<?php echo $this->error('name', ' has-error'); ?>">
    <label><?php echo $this->text('Name'); ?></label>
    <input maxlength="255" name="user[name]" value="<?php echo isset($user['name']) ? $this->e($user['name']) : ''; ?>">
    <div class="help-block"><?php echo $this->error('name'); ?></div>
  </div>
  <div class="form-group<?php echo $this->error('email', ' has-error'); ?>">
    <label><?php echo $this->text('E-mail'); ?></label>
    <input type="email" name="user[email]" value="<?php echo isset($user['email']) ? $this->e($user['email']) : ''; ?>" autofocus>
    <div class="help-block"><?php echo $this->error('email'); ?></div>
  </div>
  <div class="form-group<?php echo $this->error('password', ' has-error'); ?>">
    <label><?php echo $this->text('Password'); ?></label>
    <input type="password" name="user[password]" placeholder="<?php echo $this->text('@min - @max characters', array('@min' => $password_limit['min'], '@max' => $password_limit['max'])); ?>">
    <div class="help-block">
      <?php echo $this->error('password'); ?>
    </div>
  </div>
  <?php if (!empty($_captcha)) { ?>
  <?php echo $_captcha; ?>
  <?php } ?>
  <button class="ui-btn ui-corner-all" name="register" value="1"><?php echo $this->text('Register'); ?></button>
</form>
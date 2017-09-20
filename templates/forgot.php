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
  <div class="ui-block-b"><a class="ui-btn ui-corner-all" href="<?php echo $this->url('register'); ?>"><?php echo $this->text('Register'); ?></a></div>
  <div class="ui-block-c"><a class="ui-btn ui-corner-all ui-btn-active" href="<?php echo $this->url('forgot'); ?>"><?php echo $this->text('Forgot password'); ?></a></div>
</div>
<form method="post">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <?php if (empty($forgetful_user)) { ?>
  <div class="form-group<?php echo $this->error('email', ' has-error'); ?>">
    <label><?php echo $this->text('E-mail'); ?></label>
    <input name="user[email]" value="<?php echo isset($user['email']) ? $this->e($user['email']) : ''; ?>" autofocus>
    <div class="help-block"><?php echo $this->error('email'); ?></div>
  </div>
  <?php } else { ?>
  <div class="form-group<?php echo $this->error('password', ' has-error'); ?>">
    <label><?php echo $this->text('New password'); ?></label>
    <input type="password" name="user[password]" autocomplete="new-password" autofocus>
    <div class="help-block"><?php echo $this->error('password'); ?></div>
  </div>
  <?php } ?>
  <?php if (!empty($_captcha)) { ?>
  <?php echo $_captcha; ?>
  <?php } ?>
  <button name="reset" value="1">
    <?php if (empty($forgetful_user)) { ?>
    <?php echo $this->text('Reset password'); ?>
    <?php } else { ?>
    <?php echo $this->text('Change password'); ?>
    <?php } ?>
  </button>
</form>
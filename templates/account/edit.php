<?php

/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<ul data-role="listview" data-inset="true">
  <li class="orders" data-icon="shop">
    <a href="<?php echo $this->url("account/{$user['user_id']}"); ?>"><?php echo $this->text('Orders'); ?></a>
  </li>
  <li class="address" data-icon="location">
    <a href="<?php echo $this->url("account/{$user['user_id']}/address"); ?>"><?php echo $this->text('Addresses'); ?></a>
  </li>
  <li class="settings active" data-icon="edit">
    <a href="#"><?php echo $this->text('Settings'); ?></a>
  </li>
</ul>
<form method="post">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <div class="form-group required<?php echo $this->error('email', ' has-error'); ?>">
    <label><?php echo $this->text('E-mail'); ?></label>
    <input name="user[email]" value="<?php echo isset($user['email']) ? $this->e($user['email']) : ''; ?>">
    <div class="help-block"><?php echo $this->error('email'); ?></div>
  </div>
  <div class="form-group required<?php echo $this->error('name', ' has-error'); ?>">
    <label><?php echo $this->text('Name'); ?></label>
    <input name="user[name]" maxlength="255" value="<?php echo isset($user['name']) ? $this->e($user['name']) : ''; ?>">
    <div class="help-block"><?php echo $this->error('name'); ?></div>
  </div>
  <div class="form-group<?php echo $this->error('password', ' has-error'); ?>">
    <label><?php echo $this->text('New password'); ?></label>
    <input type="password" name="user[password]" autocomplete="new-password">
    <div class="help-block"><?php echo $this->error('password'); ?></div>
  </div>
  <div class="form-group<?php echo $this->error('password_old', ' has-error'); ?>">
    <label><?php echo $this->text('Existing password'); ?></label>
    <input type="password" name="user[password_old]" autocomplete="new-password">
    <div class="help-block"><?php echo $this->error('password_old'); ?></div>
  </div>
  <button class="ui-btn ui-btn-icon-right ui-icon-check ui-corner-all save" name="save" value="1">
    <?php echo $this->text('Save'); ?>
  </button>
</form>
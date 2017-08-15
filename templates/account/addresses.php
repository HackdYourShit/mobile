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
  <li class="address active" data-icon="location">
    <a href="<?php echo $this->url("account/{$user['user_id']}/address"); ?>"><?php echo $this->text('Addresses'); ?></a>
  </li>
  <li class="settings" data-icon="edit">
    <a href="<?php echo $this->url("account/{$user['user_id']}/edit"); ?>"><?php echo $this->text('Settings'); ?></a>
  </li>
</ul>
<?php if (empty($addresses)) { ?>
<?php echo $this->text('You have no saved addresses yet'); ?>
<?php } else { ?>
<ul data-role="listview" data-inset="true" data-split-icon="delete" data-split-theme="a">
  <?php foreach ($addresses as $address_id => $address) { ?>
  <li>
    <?php if (($_uid == $user['user_id'] || $this->access('user_edit')) && empty($address['locked'])) { ?>
    <a href="#">
      <?php foreach ($address['items'] as $label => $value) { ?>
      <span class="block"><?php echo $this->e($label); ?>: <?php echo $this->e($value); ?></span>
      <?php } ?>
    </a>
    <a href="#delete-address-<?php echo $address_id; ?>" data-rel="popup" data-position-to="window" data-transition="pop"><?php echo $this->text('Delete'); ?></a>
    <?php } else { ?>
    <?php foreach ($address['items'] as $label => $value) { ?>
    <span class="block"><?php echo $this->e($label); ?>: <?php echo $this->e($value); ?></span>
    <?php } ?>
    <?php } ?>
  </li>
  <div data-role="popup" id="delete-address-<?php echo $address_id; ?>" data-overlay-theme="b" class="ui-content">
    <h3><?php echo $this->text('Delete?'); ?></h3>
    <a href="<?php echo $this->url('', array('delete' => $address_id, 'token' => $_token)); ?>" class="ui-btn ui-corner-all ui-btn-inline ui-mini"><?php echo $this->text('OK'); ?></a>
    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-btn-inline ui-btn-b ui-mini"><?php echo $this->text('Cancel'); ?></a>
  </div>
  <?php } ?>
</ul>
<?php } ?>

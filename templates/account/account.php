<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<ul data-role="listview" data-inset="true">
  <li class="orders active" data-icon="shop">
    <a href="#"><?php echo $this->text('Orders'); ?></a>
  </li>
  <li class="address" data-icon="location">
    <a href="<?php echo $this->url("account/{$user['user_id']}/address"); ?>"><?php echo $this->text('Addresses'); ?></a>
  </li>
  <?php if ($_uid == $user['user_id'] || $this->access('user_edit')) { ?>
  <li class="settings" data-icon="edit">
    <a href="<?php echo $this->url("account/{$user['user_id']}/edit"); ?>"><?php echo $this->text('Settings'); ?></a>
  </li>
  <?php } ?>
</ul>
<?php if (!empty($orders)) { ?>
<ul data-role="listview" data-inset="true">
  <li data-role="list-divider"><?php echo $this->text('Orders'); ?></li>
  <?php foreach ($orders as $order_id => $order) { ?>
  <li>
    <a href="<?php echo $this->url("account/{$order['user_id']}/order/{$order['order_id']}"); ?>">
      #<?php echo $this->e($order['order_id']); ?>, <?php echo $this->date($order['created']); ?>, <?php echo $this->e($order['status_name']); ?>, <?php echo $this->e($order['total_formatted']); ?>
    </a>
  </li>
  <?php } ?>
</ul>
<?php echo $_pager; ?>
<?php } else { ?>
<?php if ($_uid == $user['user_id']) { ?>
<?php echo $this->text('You have no orders yet. <a href="@href">Shop now</a>', array('@href' => $this->url('catalog'))); ?>
<?php } ?>
<?php } ?>
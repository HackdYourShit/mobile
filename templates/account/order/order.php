<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<ul data-role="listview" data-inset="true">
  <li class="summary active" data-icon="user">
    <a href="<?php echo $this->url("account/{$user['user_id']}"); ?>"><?php echo $this->text('Summary'); ?></a>
  </li>
  <li class="address" data-icon="location">
    <a href="<?php echo $this->url("account/{$user['user_id']}/address"); ?>"><?php echo $this->text('Addresses'); ?></a>
  </li>
  <li class="settings" data-icon="edit">
    <a href="<?php echo $this->url("account/{$user['user_id']}/edit"); ?>"><?php echo $this->text('Settings'); ?></a>
  </li>
</ul>
<?php echo $summary; ?>
<?php echo $shipping_address; ?>
<?php echo $payment_address; ?>
<?php echo $components; ?>




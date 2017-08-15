<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all order-summary section">
  <table>
    <tr>
      <td><?php echo $this->text('Order ID'); ?></td>
      <td><?php echo $this->e($order['order_id']); ?></td>
    </tr>
    <tr>
      <td><?php echo $this->text('Status'); ?></td>
      <td><?php echo $this->e($order['status_name']); ?></td>
    </tr>
    <tr>
      <td><?php echo $this->text('Shipping'); ?></td>
      <td><?php echo $this->e($order['shipping_name']); ?></td>
    </tr>
    <tr>
      <td><?php echo $this->text('Payment'); ?></td>
      <td><?php echo $this->e($order['payment_name']); ?></td>
    </tr>
    <tr>
      <td><?php echo $this->text('Created'); ?></td>
      <td><?php echo $this->date($order['created']); ?></td>
    </tr>
    <?php if ($order['modified']) { ?>
    <tr>
      <td><?php echo $this->text('Last modified'); ?></td>
      <td><?php echo $this->date($order['modified']); ?></td>
    </tr>
    <?php } ?>
    <?php if ($order['comment']) { ?>
    <tr>
      <td><?php echo $this->text('Comments'); ?></td>
      <td><?php echo $this->date($order['comment']); ?></td>
    </tr>
    <?php } ?>
  </table>
</div>

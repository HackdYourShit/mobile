<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($order['payment_address']) && $order['payment_address'] != $order['shipping_address']) { ?>
<div class="ui-body ui-body-a ui-corner-all order-payment-address section">
  <?php echo $this->text('Payment address'); ?>
  <?php if (empty($order['address_translated']['payment'])) { ?>
  <?php echo $this->text('Unknown'); ?>
  <?php } else { ?>
  <table>
    <tbody>
      <?php foreach ($order['address_translated']['payment'] as $name => $value) { ?>
      <tr>
        <td><?php echo $this->e($name); ?></td>
        <td><?php echo $this->e($value); ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } ?>
</div>
<?php } ?>

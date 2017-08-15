<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all order-shipping-address section">
  <?php echo $this->text('Shipping address'); ?>
  <?php if (empty($order['address_translated']['shipping'])) { ?>
  <?php echo $this->text('Unknown'); ?>
  <?php } else { ?>
  <table>
    <tbody>
      <?php foreach ($order['address_translated']['shipping'] as $name => $value) { ?>
      <tr>
        <td><?php echo $this->e($name); ?></td>
        <td><?php echo $this->e($value); ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } ?>
</div>




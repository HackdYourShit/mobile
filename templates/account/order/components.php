<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="ui-body ui-body-a ui-corner-all order-components section">
  <table>
    <tbody>
      <?php foreach ($components as $component) { ?>
      <?php echo $component['rendered']; ?>
      <?php } ?>
      <tr class="bold total">
        <td><?php echo $this->text('Grand total'); ?></td>
        <td><?php echo $this->e($order['total_formatted']); ?></td>
      </tr>
    </tbody>
  </table>
</div>


<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($product['field_value_labels']['attribute'])) { ?>
<div data-role="collapsible" data-iconpos="right">
  <h3><?php echo $this->text('Specs'); ?></h3>
  <table class="ui-responsive">
    <tbody>
      <?php foreach ($product['field_value_labels']['attribute'] as $field_id => $labels) { ?>
      <tr>
        <th scope="row"><?php echo $this->e($product['fields']['attribute'][$field_id]['title']); ?></th>
        <td><?php echo $this->e(implode(',', $labels)); ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php } ?>


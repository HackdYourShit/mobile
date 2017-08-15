<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($products) && count($products) > 1) { ?>
<table data-role="table" data-mode="columntoggle" data-column-btn-text="<?php echo $this->text('Products to compare...'); ?>" class="ui-responsive compare">
  <thead>
    <tr>
      <td></td>
      <?php $index = 1; ?>
      <?php foreach ($products as $product) { ?>
      <th data-priority="<?php echo $index; ?>"><?php echo $this->e($product['title']); ?></th>
      <?php $index++; ?>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <?php foreach ($products as $product_id => $product) { ?>
      <td>
        <?php echo $product['rendered']; ?>
      </td>
      <?php } ?>
    </tr>
    <?php if (!empty($fields['attribute'])) { ?>
    <?php foreach ($fields['attribute'] as $field_id => $field_title) { ?>
    <tr class="togglable">
      <th class="active" scope="row"><?php echo $this->e($field_title); ?></th>
      <?php foreach ($products as $product_id => $product) { ?>
      <?php if (empty($product['field_value_labels']['attribute'][$field_id])) { ?>
      <td class="value"></td>
      <?php } else { ?>
      <td class="value"><?php echo $this->e(implode(', ', $product['field_value_labels']['attribute'][$field_id])); ?></td>
      <?php } ?>
      <?php } ?>
    </tr>
    <?php } ?>
    <?php } ?>
    <?php if (!empty($fields['option'])) { ?>
    <?php foreach ($fields['option'] as $field_id => $field_title) { ?>
    <tr class="togglable">
      <th class="active" scope="row"><?php echo $this->e($field_title); ?></th>
      <?php foreach ($products as $product_id => $product) { ?>
      <?php if (empty($product['field_value_labels']['option'][$field_id])) { ?>
      <td class="value"></td>
      <?php } else { ?>
      <td class="value"><?php echo $this->e(implode(', ', $product['field_value_labels']['option'][$field_id])); ?></td>
      <?php } ?>
      <?php } ?>
    </tr>
    <?php } ?>
    <?php } ?>
  </tbody>
</table>
<?php } else { ?>
<?php echo $this->text('Nothing to compare'); ?>
<?php } ?>
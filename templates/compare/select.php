<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($products)) { ?>
<?php foreach ($products as $items) { ?>
<ul data-role="listview" data-inset="true" class="product-list">
  <?php foreach ($items as $product) { ?>
  <li><?php echo $product['rendered']; ?></li>
  <?php } ?>
</ul>
<?php if (count($items) > 1) { ?>
<a class="ui-btn ui-corner-all" href="<?php echo $this->url('compare/' . implode(',', array_keys($items))); ?>">
  <?php echo $this->text('Compare'); ?>
</a>
<?php } else { ?>
<a class="ui-btn ui-corner-all" href="<?php echo $this->url('catalog'); ?>">
  <?php echo $this->text('Add more to compare'); ?>
</a>
<?php } ?>
<?php } ?>
<?php } else { ?>
<?php echo $this->text('Nothing to compare'); ?>
<?php } ?>
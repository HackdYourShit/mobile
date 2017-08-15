<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($products)) { ?>
<ul data-role="listview" data-inset="true" class="related-products">
  <li data-role="list-divider">
    <h3><?php echo $this->text('Related'); ?></h3>
  </li>
  <?php foreach ($products as $product) { ?>
  <li><?php echo $product['rendered']; ?></li>
  <?php } ?>
  <?php if (!empty($pager)) { ?>
  <li class="pager">
    <?php echo $pager; ?>
  </li>
  <?php } ?>
</ul>
<?php } ?>
<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($products)) { ?>
<ul data-role="listview" data-inset="true" class="product-list">
  <?php foreach ($products as $product) { ?>
  <li>
    <?php echo $product['rendered']; ?>
  </li>
  <?php } ?>
</ul>
<?php } ?>
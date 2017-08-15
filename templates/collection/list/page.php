<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($items)) { ?>
<ul data-role="listview" data-inset="true" class="collection-page collection-<?php echo $this->e($collection_id); ?>">
  <li data-role="list-divider"><?php echo $this->e($title); ?></li>
  <?php foreach ($items as $item) { ?>
  <li><?php echo $item['rendered']; ?></li>
  <?php } ?>
</ul>
<?php } ?>
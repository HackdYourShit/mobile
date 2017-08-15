<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($items)) { ?>
<ul data-role="listview" data-inset="true" class="collection-file collection-<?php echo $this->e($collection_id); ?>">
  <?php foreach ($items as $item) { ?>
  <li><?php echo $item['rendered']; ?></li>
  <?php } ?>
</ul>
<?php } ?>
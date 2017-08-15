<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (empty($item['collection_item']['data']['url'])) { ?>
<?php if (!empty($item['thumb'])) { ?>
<img class="ui-li-thumb" src="<?php echo $this->e($item['thumb']); ?>">
<?php } ?>
<span class="title block bold"><?php echo $this->e($item['title']); ?></span>
<?php if (!empty($item['description'])) { ?>
<span class="description block"><?php echo $this->e(strip_tags($item['description'])); ?></span>
<?php } ?>
<?php } else { ?>
<a href="<?php echo $this->e($item['collection_item']['data']['url']); ?>">
  <?php if (!empty($item['thumb'])) { ?>
  <img class="ui-li-thumb" src="<?php echo $this->e($item['thumb']); ?>">
  <?php } ?>
  <span class="title block bold"><?php echo $this->e($item['title']); ?></span>
  <?php if (!empty($item['description'])) { ?>
  <span class="description block"><?php echo $this->e(strip_tags($item['description'])); ?></span>
  <?php } ?>
</a>
<?php } ?>

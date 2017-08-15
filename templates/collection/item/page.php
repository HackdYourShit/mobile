<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<a href="<?php echo empty($item['url']) ? $this->url("page/{$item['page_id']}") : $this->e($item['url']); ?>">
  <?php if (!empty($item['thumb'])) { ?>
  <img class="ui-li-thumb" src="<?php echo $this->e($item['thumb']); ?>">
  <?php } ?>
  <span class="title block"><?php echo $this->e($item['title']); ?></span>
  <?php if (!empty($item['description'])) { ?>
  <span class="description block"><?php echo $this->e(strip_tags($item['description'])); ?></span>
  <?php } ?>
</a>
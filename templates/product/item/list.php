<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<a class="item view-list" href="<?php echo empty($item['url']) ? $this->url("product/{$item['product_id']}") : $this->e($item['url']); ?>">
  <?php if (!empty($item['thumb'])) { ?>
  <img class="ui-li-thumb" src="<?php echo $this->e($item['thumb']); ?>">
  <?php } ?>
  <span class="title block"><?php echo $this->e($this->truncate($item['title'], 50)); ?></span>
  <span class="price block">
    <?php if (isset($item['original_price']) && $item['original_price'] > $item['price']) { ?>
    <s><?php echo $this->e($item['original_price_formatted']); ?></s>
    <?php } ?>
    <?php echo $this->e($item['price_formatted']); ?>
  </span>
</a>
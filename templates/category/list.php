<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($categories)) { ?>
<ul data-role="listview" data-inset="true">
  <?php foreach ($categories as $category) { ?>
  <?php if ($category['depth'] < 1) { ?>
  <li class="depth-<?php echo $this->e($category['depth']); ?><?php echo empty($category['active']) ? '' : ' active'; ?>">
    <?php echo $this->e($category['indentation']); ?>
    <?php if (empty($category['active'])) { ?>
    <a href="<?php echo $this->e($category['url_query']); ?>"><?php echo $this->e($category['title']); ?></a>
    <?php } else { ?>
    <a href="#" class="disabled"><?php echo $this->e($category['title']); ?></a>
    <?php } ?>
  </li>
  <?php } ?>
  <?php } ?>
</ul>
<?php } ?>

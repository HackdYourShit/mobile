<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($children)) { ?>
<ul data-role="listview" data-inset="true" class="category-children">
  <?php foreach ($children as $child) { ?>
  <li>
    <a href="<?php echo $this->e($child['url']); ?>">
      <?php if (!empty($child['thumb']) && empty($child['thumb_placeholder'])) { ?>
      <img src="<?php echo $this->e($child['thumb']); ?>">
      <?php } ?>
      <?php echo $this->e($child['title']); ?>
    </a>
  </li>
  <?php } ?>
</ul>
<?php } ?>



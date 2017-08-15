<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($items)) { ?>
<ul data-role="listview">
  <?php foreach ($items as $item) { ?>
  <?php if ($item['depth'] <= $depth) { ?>
  <li class="depth-<?php echo $this->e($item['depth']); ?><?php echo empty($item['active']) ? '' : ' active'; ?>">
    <?php echo $this->e($item['indentation']); ?>
    <?php if (empty($item['active'])) { ?>
    <a href="<?php echo $this->e($item['url_query']); ?>"><?php echo $this->e($item['title']); ?></a>
    <?php } else { ?>
    <a href="#" class="disabled"><?php echo $this->e($item['title']); ?></a>
    <?php } ?>
  </li>
  <?php } ?>
  <?php } ?>
</ul>
<?php } ?>
<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($pager['pages'])) { ?>
<div data-role="controlgroup" data-type="horizontal" class="ui-mini ui-bar">
  <?php if (!empty($pager['prev'])) { ?>
  <a class="ui-btn ui-btn-icon-left ui-icon-arrow-l" href="<?php echo $this->e($pager['prev']); ?>"><?php echo $this->text('Previous'); ?></a>
  <?php } ?>
  <?php foreach ($pager['pages'] as $page) { ?>
  <?php if (empty($page['url'])) { ?>
  <a href="#" class="ui-btn disabled"><?php echo $page['num']; ?></a>
  <?php } else { ?>
  <a class="ui-btn<?php echo empty($page['is_current']) ? '' : ' active'; ?>" href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
  <?php } ?>
  <?php } ?>
  <?php if (!empty($pager['next'])) { ?>
  <a class="ui-btn ui-btn-icon-right ui-icon-arrow-r" href="<?php echo $this->e($pager['next']); ?>"><?php echo $this->text('Next'); ?></a>
  <?php } ?>
</div>
<?php } ?>


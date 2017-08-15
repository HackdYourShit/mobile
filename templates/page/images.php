<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($page['images'])) { ?>
<div class="page-images">
  <?php foreach ($page['images'] as $id => $image) { ?>
  <a class="page-thumb" href="#popup-page-image-<?php echo $id; ?>" data-rel="popup" data-position-to="window" data-transition="fade">
    <img src="<?php echo $this->e($image['thumb']); ?>">
  </a>
  <?php } ?>
  <div data-role="popup" id="popup-page-image-<?php echo $id; ?>" data-overlay-theme="b" data-corners="false">
    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right"></a>
    <img class="page-original-image" src="<?php echo $this->image($image['path'], $this->configTheme('mobile_image_style_popup', 6)); ?>">
  </div>
</div>
<?php } ?>
<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<form method="post">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <?php echo $_captcha; ?>
  <?php echo $rating; ?>
  <div class="form-group required<?php echo $this->error('text', ' has-error'); ?>">
    <label><?php echo $this->text('Text'); ?></label>
    <textarea rows="10" name="review[text]"><?php echo isset($review['text']) ? $this->e($review['text']) : ''; ?></textarea>
    <div class="help-block"><?php echo $this->error('text'); ?></div>
  </div>
  <div class="form-group">
    <?php if($can_delete) { ?>
    <button class="ui-btn ui-btn-inline ui-btn-icon-right ui-icon-delete ui-corner-all" name="delete" value="1" data-confirm="<?php echo $this->text('Are you sure?'); ?>">
      <?php echo $this->text('Delete'); ?>
    </button>
    <?php } ?>
    <a class="ui-btn ui-btn-inline ui-btn-icon-right ui-icon-back ui-corner-all" href="<?php echo $this->url('product/' . $product['product_id']); ?>">
      <?php echo $this->text('Cancel'); ?>
    </a>
    <button class="ui-btn ui-btn-inline ui-btn-icon-right ui-icon-check ui-corner-all" name="save" value="1">
      <?php echo $this->text('Save'); ?>
    </button>
  </div>
</form>
<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div class="rating dinamic">
  <label><?php echo $this->text('Rating'); ?></label>
  <fieldset data-role="controlgroup" data-type="horizontal">
    <?php if (!empty($unvote)) { ?>
    <label>
      <input name="review[rating]" type="radio" value="0">
      <?php echo $this->text('Unvote'); ?>
    </label>
    <?php } ?>
    <label>
      <input type="radio" name="review[rating]" value="1"<?php echo isset($review['rating']) && $review['rating'] == 1 ? ' checked' : ''; ?>>1
    </label>
    <label>
      <input type="radio" name="review[rating]" value="2"<?php echo isset($review['rating']) && $review['rating'] == 2 ? ' checked' : ''; ?>>2
    </label>
    <label>
      <input type="radio" name="review[rating]" value="3"<?php echo isset($review['rating']) && $review['rating'] == 3 ? ' checked' : ''; ?>>3
    </label>
    <label for="star-rating-4">
      <input type="radio" name="review[rating]" value="4"<?php echo isset($review['rating']) && $review['rating'] == 4 ? ' checked' : ''; ?>>4
    </label>
    <label>
      <input type="radio" name="review[rating]" value="5"<?php echo isset($review['rating']) && $review['rating'] == 5 ? ' checked' : ''; ?>>5
    </label>
  </fieldset>
</div>

<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<form onchange="$(this).submit();" class="category-navbar">
  <div class="form-group">
  <select name="sort" data-native-menu="false" data-overlay-theme="b">
    <option value="price-asc"<?php echo $sort === 'price-asc' ? ' selected' : ''; ?>>
      <?php echo $this->text('Low prices first'); ?>
    </option>
    <option value="price-desc"<?php echo $sort === 'price-desc' ? ' selected' : ''; ?>>
      <?php echo $this->text('High prices first'); ?>
    </option>
    <option value="title-asc"<?php echo $sort === 'title-asc' ? ' selected' : ''; ?>>
      <?php echo $this->text('Title A-Z'); ?>
    </option>
    <option value="title-desc"<?php echo $sort === 'title-desc' ? ' selected' : ''; ?>>
      <?php echo $this->text('Title Z-A'); ?>
    </option>
  </select>
  </div>
  <?php // Add hidden fields to retain additional GET parameters from the current URL (if any)  ?>
  <?php foreach ($_query as $key => $value) { ?>
  <?php if (!in_array($key, array('sort', 'view'))) { ?>
  <input type="hidden" name="<?php echo $this->e($key); ?>" value="<?php echo $this->e($value); ?>">
  <?php } ?>
  <?php } ?>
</form>

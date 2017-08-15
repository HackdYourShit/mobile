<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($rating['rating'])) { ?>
<span data-role="controlgroup" data-type="horizontal" class="rating static">
  <?php for ($i = 0; $i < 5; $i++) { ?>
  <span class="ui-btn ui-icon-star ui-btn-icon-notext<?php echo $i <= $rating['rating'] ? ' ui-btn-active' : ''; ?>"></span>
  <?php } ?>
</span>
<?php } ?>
<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($children)) { ?>
<?php echo $children; ?>
<?php } ?>
<?php if (empty($products)) { ?>
<?php if (empty($children)) { ?>
<?php echo $this->text('This category has no content'); ?>
<?php } ?>
<?php } else { ?>
<?php if(!empty($navbar)) { ?>
<?php echo $navbar; ?>
<?php } ?>
<?php echo $products; ?>
<?php if (!empty($_pager)) { ?>
<?php echo $_pager; ?>
<?php } ?>
<?php } ?>
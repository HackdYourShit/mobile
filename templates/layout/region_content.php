<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (empty($region_content)) { ?>
<?php echo $this->text('Content coming soon...'); ?>
<?php } else { ?>
<?php foreach ($region_content as $item) { ?>
<?php echo $item; ?>
<?php } ?>
<?php } ?>
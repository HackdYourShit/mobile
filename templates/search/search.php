<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (empty($results)) { ?>
<?php echo $this->text('No results found. Try another search keyword'); ?>
<?php } else { ?>
<?php if (!empty($navbar)) { ?>
<?php echo $navbar; ?>
<?php } ?>
<?php echo $results; ?>
<?php if (!empty($_pager)) { ?>
<?php echo $_pager; ?>
<?php } ?>
<?php } ?>
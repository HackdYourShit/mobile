<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (empty($products)) { ?>
<?php echo $this->text('Your wishlist is empty. <a href="!href">Continue shopping</a>', array('!href' => $this->url('catalog'))); ?>
<?php } else { ?>
<?php echo $products; ?>
<?php } ?>
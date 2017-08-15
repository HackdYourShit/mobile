<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<a href="<?php echo $this->url('catalog'); ?>" class="ui-btn ui-btn-b ui-corner-all ui-icon-bullets ui-btn-icon-right"><?php echo $this->text('Catalog'); ?></a>
<?php if (empty($collection_file) && empty($collection_product) && empty($collection_page)) { ?>
<div class="empty"><?php echo $this->text('Content coming soon...'); ?></div>
<?php } else { ?>
<?php if (!empty($collection_file)) { ?>
<?php echo $collection_file; ?>
<?php } ?>
<?php if (!empty($collection_product)) { ?>
<?php echo $collection_product; ?>
<?php } ?>
<?php if (!empty($collection_page)) { ?>
<?php echo $collection_page; ?>
<?php } ?>
<?php } ?>
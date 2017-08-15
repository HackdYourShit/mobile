<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($category['images'])) { ?>
<?php foreach ($category['images'] as $image) { ?>
<img src="<?php echo $this->e($image['thumb']); ?>">
<?php } ?>
<?php } ?>

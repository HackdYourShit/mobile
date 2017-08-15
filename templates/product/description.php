<?php

/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($description)) { ?>
<div data-role="collapsible" data-iconpos="right">
  <h3><?php echo $this->text('Description'); ?></h3>
  <?php echo $this->filter($description); ?>
</div>
<?php } ?>
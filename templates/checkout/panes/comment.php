<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<div data-role="collapsible" data-collapsed="<?php echo empty($order['comment']) ? 'true' : 'false'; ?>" data-iconpos="right" class="section comment">
  <h4><?php echo $this->text('Order comments'); ?></h4>
  <textarea name="order[comment]"><?php echo $this->e($order['comment']); ?></textarea>
</div>

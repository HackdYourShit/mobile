<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<?php if (!empty($reviews)) { ?>
<ul data-role="listview" data-inset="true">
  <li data-role="list-divider"><h3><?php echo $this->text('Reviews'); ?></h3></li>
  <?php foreach ($reviews as $review) { ?>
  <?php if ($review['user_id'] == $_uid && $this->config('review_editable', 1)) { ?>
  <li data-icon="edit">
    <a href="<?php echo $this->url("review/edit/{$product['product_id']}/{$review['review_id']}"); ?>">
      <p class="name"><strong><?php echo $this->e($review['name']); ?></strong> <span class="created"><?php echo $this->date($review['created']); ?></span></p>
      <p class="rating"><strong><?php echo $this->text('Rating'); ?>:</strong> <?php echo $review['rating']; ?></p>
      <p class="text"><?php echo $this->e($review['text']); ?></p>
    </a>
  </li>
  <?php } else { ?>
  <li>
    <p class="rating"><?php echo $review['rating_formatted']; ?></p>
    <p class="name"><strong><?php echo $this->e($review['name']); ?></strong> <span class="created"><?php echo $this->date($review['created']); ?></span></p>
    <p class="text"><?php echo $this->e($review['text']); ?></p>
  </li>
  <?php } ?>
  <?php } ?>
  <?php if (!empty($pager)) { ?>
  <li data-role="list-divider"><?php echo $pager; ?></li>
  <?php } ?>
</ul>
<?php } ?>
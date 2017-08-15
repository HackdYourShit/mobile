<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<a href="#share-popup" data-rel="popup" data-transition="pop" class="ui-btn ui-corner-all ui-btn-icon-right ui-icon-audio"><?php echo $this->text('Share'); ?></a>
<div data-role="popup" data-overlay-theme="b" id="share-popup">
  <ul data-role="listview" data-inset="true">
    <li>
      <a rel="nofollow" target="_blank" href="<?php echo $this->url('http://www.facebook.com/sharer.php', array('u' => $url), true); ?>"><?php echo $this->text('Facebook'); ?></a>
    </li>
    <li>
      <a rel="nofollow" target="_blank" href="<?php echo $this->url('https://plus.google.com/share', array('url' => $url), true); ?>"><?php echo $this->text('Google+'); ?></a>
    </li>
    <li>
      <a rel="nofollow" target="_blank" href="<?php echo $this->url('https://twitter.com/share', array('url' => $url), true); ?>"><?php echo $this->text('Twitter'); ?></a>
    </li>
  </ul>
</div>

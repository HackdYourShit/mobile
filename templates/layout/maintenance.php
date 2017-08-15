<?php
/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */
?>
<body class="maintenance">
  <div data-role="page">
    <div role="main" class="ui-content">
      <h1><?php echo $this->text("We'll be back soon!"); ?></h1>
      <p><?php echo $this->text("Sorry for the inconvenience but we're performing some maintenance at the moment."); ?></p>
      <p>
        <a href="mailto:<?php echo $this->e($_store['data']['email'][0]); ?>"><?php echo $this->e($_store['data']['email'][0]); ?></a>
        <?php if (!empty($_store['data']['phone'][0])) { ?>
        <a href="tel:<?php echo $this->e($_store['data']['phone'][0]); ?>"><?php echo $this->e($_store['data']['phone'][0]); ?></a>
        <?php } ?>
      </p>
    </div>
  </div>
</body>

<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_specials_default.php 2935 2006-02-01 11:12:40Z birdbrain $
 */

?>

<!-- bof: specials -->

<div class="centerBoxWrapper" id="">
<div id="contentcat">
<?php
/**
 * require the columnar_display template to show the products
 */
//  require($template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php');
require('includes/catalogopag.php');
//  require($define_page);
?>
</div>
</div>

<!-- eof: specials -->

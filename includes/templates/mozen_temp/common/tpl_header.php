<?php
/**
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 @version $Id: tpl_header.php 3392 2006-04-08 15:17:37Z birdbrain $
 */
?>


<?php
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
  echo htmlspecialchars(urldecode($_GET['error_message']));
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
   echo htmlspecialchars($_GET['info_message']);
} else {

}
?>
					<?php 
							$image = $slideshow_result->fields['logo_image'];
							$logo_txt = $slideshow_result->fields['logo_txt'];
							$tagline = $slideshow_result->fields['tagline'];
							$display_logo = $slideshow_result->fields['display_logo'];
							$call_us = $slideshow_result->fields['call_us'];
					?>
<!--bof-header logo and navigation display-->
<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>
<div id="mj-topbar"><!-- mj-topabar -->
    	<div class="mj-subcontainer"><!-- mj-subcontainer -->
            <div class="mj-grid16 mj-lspace">
                LL&Aacute;MENOS : <?php echo $call_us; ?> &nbsp;&nbsp;&nbsp;&nbsp; E-MAIL: <span style="text-transform: lowercase;">info@mobelhispania.com</span>
			</div>             	
            
            
            <div class="mj-grid40 mj-rspace"> <!--Top bar Links on the Right-->
            	<ul class="menu">
					<?php if ($_SESSION['customer_id']) { ?>
                    	<li><a><?php echo $currencies->format($_SESSION['cart']->show_total());?></a></li>
    					<li><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a></li>
    					<li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li>
                        <li><a href="<?php echo HTTP_SERVER . DIR_WS_CATALOG ?>index.php?main_page=shopping_cart"><?php echo BOX_HEADING_SHOPPING_CART; ?></a></li>
					<?php } 
					else 
					{
        				if (STORE_STATUS == '0') 
					{?>
					<li><a><?php echo $currencies->format($_SESSION['cart']->show_total());?></a></li>
					<li><a href="<?php echo HTTP_SERVER . DIR_WS_CATALOG ?>index.php?main_page=shopping_cart"><?php echo BOX_HEADING_SHOPPING_CART; ?></a></li>
					<?php if ($_SESSION['cart']->count_contents() != 0) { ?>
    				<li><a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?></a></li>
					<?php }?>

                    <li><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li>
					<?php } } ?>
 					<li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>
                </ul>
            </div><!--Top bar Links on the Right Ends-->
        </div><!-- mj-subcontainer End -->
	</div><!-- mj-topabar -->

	<div id="mj-header"><!-- mj-header -->
    	<div class="mj-subcontainer"><!-- mj-subcontainer -->
        	<div id="mj-logo" class="mj-grid48 mj-lspace">
				<a href="index.php?main_page=index">
                    
                    <?php 
					if($display_logo=="yes")
					{
						if($image!=NULL) { ?>
							<img alt="<?php if($image!=NULL){ echo "logo"; } ?>" src="<?php echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images')
								.'/logo/'.$image;?>"> 	
                    <?php } 
						 echo $logo_txt; 			//Logo Display
					}
					else{
					?>
					<?php echo $logo_txt; }  ?> 			<!--Logo Display-->
					
                    <span class="tagline"><?php echo $tagline; ?></span> <!--Tagline for the logo-->
				
                </a> 
            </div>
            
                    <!--<div class="mj-grid16 mj-rspace mj-lspace">
                        <div id="mj-languagebar">--><!-- mj-languagebar Start -->
                            <!--mj-currencies Start-->
                            <!--<div class="mj-currencies"> 
                                <?php /*echo zen_draw_form('currencies', zen_href_link(basename(ereg_replace('.php','', $PHP_SELF)), '', $request_type, false), 'get')?>
                                <?php if (isset($currencies) && is_object($currencies)) 
                                {
                                  reset($currencies->currencies);
                                  $currencies_array = array();
                                  while (list($key, $value) = each($currencies->currencies)) 
                                  {
                                    $currencies_array[] = array('id' => $key, 'text' => $value['title']);
                                  }
                                  $hidden_get_variables = '';
                                  reset($_GET);
                                  while (list($key, $value) = each($_GET)) 
                                  {
                                    if ( ($key != 'currency') && ($key != zen_session_name()) && ($key != 'x') && ($key != 'y') ) 
                                    {
                                        $hidden_get_variables .= zen_draw_hidden_field($key, $value);
                                    }
                                  }
                                }
                                ?>
                                <?php echo zen_draw_pull_down_menu('currency', $currencies_array, $_SESSION['currency'], ' onchange="this.form.submit();"') . 
                                $hidden_get_variables . zen_hide_session_id()*/?></form>
                            </div>--><!--mj-currencies End--> 
                        <!--</div>
                    </div>-->
                    
                    <div class="mj-grid32 mj-lspace"> <!--Search Bar-->
                        <?php
                          $text = str_replace("ENTER SEARCH KEYWORDS HERE", "Buscar Aqu&iacute;..", "ENTER SEARCH KEYWORDS HERE");
                          $content = "";
                          $content .= zen_draw_form('quick_find_header', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get');
                          $content .= zen_draw_hidden_field('main_page',FILENAME_ADVANCED_SEARCH_RESULT);
                          $content .= zen_draw_hidden_field('search_in_description', '1') . zen_hide_session_id();
            
                          $content .= '<div class="search">' . zen_draw_input_field('keyword', '', 'class="search-text" maxlength="30" value="'.$text.'" 
						  onfocus="if(this.value == \''.$text.'\') this.value = \'\';" onblur="if (this.value == \'\') this.value = \'' . $text . '\';"') . 
						  '<button id="search-button" type="submit"><span>Buscar</span></button></div>';
                          $content .= "</form>";
						  
						  
                          echo($content);
                        ?>
                    </div><!--Search Bar Ends-->

					<div id="lema">
                    	<img src="images/textologo.png" />
                    </div>
            
        </div><!-- mj-subcontainer End-->
	</div><!-- mj-header End-->

	<div id="mj-righttop">
    		<div class="mj-subcontainer">
                <div id="mj-menubar">
                    <?php require($template->get_template_dir('tpl_drop_menu.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_drop_menu.php');?>
  		   		</div><!--Menu-->
           </div>
    </div><!-- mj-righttop End-->
                
    <!--bof-header ezpage links-->
    <?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
    <?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
    <?php } ?>
    <!--eof-header ezpage links-->
                
            


<?php if ($this_is_home_page) { ?>


			<div id="mj-slideshow">
            	<div class="mj-subcontainer">
            		 <div class="flexslider">
                      <ul class="slides">
                      	<?
						$i=0;
						$val_up = $db->Execute("SELECT * FROM slider");
						while (!$val_up->EOF) {
						  $slides_count ++;
						  
						  $slides[$i]['id_slider']=$val_up->fields['id_slider'];
						  $slides[$i]['titulo']=$val_up->fields['titulo'];
						  $slides[$i]['descripcion']=$val_up->fields['descripcion'];
						  $slides[$i]['precio']=$val_up->fields['precio'];
						  $slides[$i]['imagen']=$val_up->fields['imagen'];
						  $slides[$i]['orden']=$val_up->fields['orden'];	  
					
						  $i++;	  	  	  
						  $val_up->MoveNext();
					
						}
						  for($i=0;$i<count($slides);$i++){
						?>
                        <!--Slide-1-->
                      	<li>
                             <div class="caption_text">
                                    <p class="flex-caption"><?=$slides[$i]['titulo']?></p>
                                            <div class="slide-description">
                                            	<p><?=$slides[$i]['descripcion']?></p>
                                            </div>
                                   
                                    <div class="content">
                                            <div class="button-wrapper">
                                            	<div class="a-btn">
                                                	<a href="index.php?main_page=contact_us"><span class="a-btn-text">Consultar!</span></a> 
                                                    <a href="index.php?main_page=contact_us"><span class="a-btn-slide-text">Ver M&aacute;s</span></a>
													<span class="a-btn-icon-right"><span></span></span>
                                                </div>
                                            </div>
                                    </div>
                              </div>
                            <div class="slide_img">
                            	<div class="price-tag" style="background:#A52223;">
                                		<div style="color:#FFFFFF">
                                        		<span class="tag">Precio</span>
                                                <span class="price">&euro;<?=$slides[$i]['precio']?></span>
                                                <span class="discount"></span>
                                       </div>
                                </div>
                              <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/'.$slides[$i]['imagen']?>" alt="Slide-3" />
                            </div>
                        </li>
                        <?
						}
						?>
                        <!--Slide-1 ends-->
                      </ul>
                    </div>
               </div> 
			</div>


			<div id="mj-featured1">
                <div class="mj-subcontainer">
                    <div class="mj-grid96"> <!--Free Shipping Text-->
                        <?php if($this_is_home_page){ ?>
                          <div class="mj-grid16 mj-rspace mj-lspace welcome-home-title">Bienvenidos</div>
                        <?php } else { ?>
                          <div class="mj-grid16 mj-rspace mj-lspace">Bienvenidos</div>
                        <?php } ?>

                        <?php if($this_is_home_page){ ?>
                            <div class="mj-grid80 mj-rspace mj-lspace welcome-home"><?php require($define_page); ?></div>
                        <?php } else { ?>
                            <div class="mj-grid80 mj-rspace mj-lspace"><?php require($define_page); ?></div>
                        <?php } ?>                            
                     </div>
                </div>	
            </div>
            
            
<div id="headerpic">
<?php
    if (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) {
                if ($banner->RecordCount() > 0) {
?>
      <div id="bannerTwo" class="banners"><?php echo zen_display_banner('static', $banner);?></div>
	  
	 <?php } } ?>
</div>
<?php } ?>

<?php if (!$this_is_home_page) { ?>
<div id="headerpic">
<?php
  if (SHOW_BANNERS_GROUP_SET3 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET3)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerThree" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>
</div>
<?php } ?>


<?php } ?>




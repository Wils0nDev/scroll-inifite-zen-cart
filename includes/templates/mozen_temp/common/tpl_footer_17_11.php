<?php
/**
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer.php 3183 2006-03-14 07:58:59Z birdbrain $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));

$address = $slideshow_result->fields['address'];
$email_id = $slideshow_result->fields['email_id'];
$phone_support = $slideshow_result->fields['phone_support'];
$skype_id = $slideshow_result->fields['skype_id'];
$copyright_text = $slideshow_result->fields['copyright_text'];

?>

<?php
if (!$flag_disable_footer) {


		$last_dt = $db->Execute("select max(p.products_date_added) as last_u_date
                           from (" . TABLE_PRODUCTS . " p
                           left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id )
                           where p.products_id = pd.products_id  and p.products_status = 1
                           and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'");
						   
		 $last_products = $db->Execute("select pd.products_description,p.products_date_added,p.products_id, p.products_image, pd.products_name, p.master_categories_id
                           from (" . TABLE_PRODUCTS . " p
                           left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id )
                           where p.products_date_added ='".$last_dt->fields['last_u_date']."'
                           and p.products_id = pd.products_id
                           and p.products_status = 1 and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'");
						   
		$second_last_dt = $db->Execute("select p.products_id
                           from (" . TABLE_PRODUCTS . " p
                           left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id ) 
                           where p.products_id = pd.products_id  and p.products_status = 1
                           and pd.language_id = '" . (int)$_SESSION['languages_id'] . "' ORDER BY p.products_id DESC LIMIT 1,1");
						   
		$third_last_dt = $db->Execute("select p.products_id
                           from (" . TABLE_PRODUCTS . " p
                           left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id ) 
                           where p.products_id = pd.products_id  and p.products_status = 1
                           and pd.language_id = '" . (int)$_SESSION['languages_id'] . "' ORDER BY p.products_id DESC LIMIT 2,1");	//  print_r($second_last_dt->fields['products_id']);
	   $second_last_product = $db->Execute("select pd.products_description,p.products_date_added,p.products_id, p.products_image, pd.products_name, p.master_categories_id
                           from (" . TABLE_PRODUCTS . " p
                           left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id )
                           where p.products_id ='".$second_last_dt->fields['products_id']."'
                           and p.products_id = pd.products_id
                           and p.products_status = 1 and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'");
						   
		$third_last_product = $db->Execute("select pd.products_description,p.products_date_added,p.products_id, p.products_image, pd.products_name, p.master_categories_id
                           from (" . TABLE_PRODUCTS . " p
                           left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id )
                           where p.products_id ='".$third_last_dt->fields['products_id']."'
                           and p.products_id = pd.products_id
                           and p.products_status = 1 and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'");		
						 			   
						
?>
<?php 
                    	$cat_slide = "select * from ".DB_PREFIX."manufacturers ORDER BY RAND() LIMIT 5";
						$manufactureimage = $db->Execute($cat_slide); 						
?>
<?php 
	
	if ($this_is_home_page)
	{
?>				
<div id="mj-footertop">
	<div class="mj-subcontainer">
    	<div class="mj-brands mj-grid56 mj-lspace mj-rspace">
        	<h3> Nuestras Marcas </h3>
						<ul>
                        	<?php 
							  while (!$manufactureimage->EOF) {
							  
								$manufacturers_image = $manufactureimage->fields['manufacturers_image'];
							?>
                        	<li><img src="images/<?php echo $manufacturers_image;?>" alt="" /></li>
                        	<?php $manufactureimage->MoveNext();
							}
							 ?>				
						</ul>
		</div>
	       	
        <div class="mj-stayintouch mj-grid40 mj-lspace mj-rspace">
        		<h3>Qu&eacute;date Conectado</h3>
                <div class="mj-newsletter">
                        <a class="mj-newstext" href="index.php?main_page=page&id=35&pg=features">&Uacute;nete al Bolet&iacute;n</a>
                        <p>Mantente actualizado con nuestras ofertas y nuevos productos</p>
                </div>
                <div class="mj-storelocator mj-lspace mj-rspace">
                    <a class="mj-storetext" href="index.php?main_page=page&id=54&pg=features">El establecimiento</a>
                    <p>Ubica nuesto establecimiento</p>
                </div>
         	</div>
    </div>
</div> <?php } ?>

<div id="mj-footer">
	<div class="mj-subcontainer">
    	<!--<div class="moduletable mj-grid24 mj-dotted">
        	<h3>Latest Products</h3>
            	<div class="custom mj-grid24 mj-dotted mj-latest">
                        <div class="mj-latestimage">
                         
                         <?php
						     /*$productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && $_GET['filter_id'] > 0) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);
						?>
                         <a href="<?php echo zen_href_link(zen_get_info_page($last_products->fields['products_id']), 'cPath=' . $productsInCategory[$last_products->fields['products_id']] . '&products_id=' . $last_products->fields['products_id']); ?>"><?php echo zen_image(DIR_WS_IMAGES . $last_products->fields['products_image'], $last_products->fields['products_name'], IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH, IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT); ?></a>
            			</div>
                            <div class="mj-productname"> <a href="<?php echo zen_href_link(zen_get_info_page($last_products->fields['products_id']), 'cPath=' . $productsInCategory[$last_products->fields['products_id']] . '&products_id=' . $last_products->fields['products_id']); ?>"><?php echo $last_products->fields['products_name']; ?></a></div>
                    		<div class="mj-productdescription"><p class="p.product_s_desc"><?php echo rtrim(substr($last_products->fields['products_description'],0,40))."...";?>		
                            </p></div>
                        <ul class="mj-product"><li>
                   			<div class="mj-latestimage">
                        		 <?php
						     $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && $_GET['filter_id'] > 0) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);
						?>
                         <a href="<?php echo zen_href_link(zen_get_info_page($second_last_product->fields['products_id']), 'cPath=' . $productsInCategory[$second_last_product->fields['products_id']] . '&products_id=' . $second_last_product->fields['products_id']); ?>"><?php echo zen_image(DIR_WS_IMAGES . $second_last_product->fields['products_image'], $second_last_product->fields['products_name'], IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH, IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT); ?></a>
            			</div>
                            <div class="mj-productname"> <a href="<?php echo zen_href_link(zen_get_info_page($second_last_product->fields['products_id']), 'cPath=' . $productsInCategory[$second_last_product->fields['products_id']] . '&products_id=' . $second_last_product->fields['products_id']); ?>"><?php echo $second_last_product->fields['products_name']; ?></a></div>
                    		<div class="mj-productdescription"><p class="p.product_s_desc"><?php echo rtrim(substr($second_last_product->fields['products_description'],0,40))."...";?>		
                            </p>
                            </div>
                    	</li></ul> 	
                        <ul class="mj-product"><li>
                   			<div class="mj-latestimage">
                        		 <?php
						     $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && $_GET['filter_id'] > 0) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);
						?>
                         <a href="<?php echo zen_href_link(zen_get_info_page($third_last_product->fields['products_id']), 'cPath=' . $productsInCategory[$third_last_product->fields['products_id']] . '&products_id=' . $third_last_product->fields['products_id']); ?>"><?php echo zen_image(DIR_WS_IMAGES . $third_last_product->fields['products_image'], $third_last_product->fields['products_name'], IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH, IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT); ?></a>
            			</div>
                            <div class="mj-productname"> <a href="<?php echo zen_href_link(zen_get_info_page($third_last_product->fields['products_id']), 'cPath=' . $productsInCategory[$third_last_product->fields['products_id']] . '&products_id=' . $third_last_product->fields['products_id']); ?>"><?php echo $third_last_product->fields['products_name']; ?></a></div>
                    		<div class="mj-productdescription"><p class="p.product_s_desc"><?php echo rtrim(substr($third_last_product->fields['products_description'],0,40))."...";*/ ?>		
                            </p>
                            </div>
                    	</li></ul>
               </div>
        </div>
-->    	<div class="moduletable mj-grid24 mj-dotted">
        	<h3>Extra</h3>
            	<div class="custom mj-grid24 mj-dotted" style="width:40%;">
                    <ul class="footer-bullet">
                    	<li><a href="index.php?main_page=quienes_somos">Quienes Somos</a></li>
<!--                        <li><a href="index.php?main_page=conditions&pg=information">T&eacute;rminos y Condiciones</a></li>-->
                        <li><a href="<?php echo zen_href_link(FILENAME_PRIVACY."&pg=information"); ?>">Privacidad y Condiciones de Venta</a></li>
                        <li><a href="http://www.mobelhispania.com/catalogo" target="_blank">Cat&aacute;logos</a></li>                        
                    </ul>
                 </div>
                 <div class="custom mj-grid24 mj-dotted" style="width:38%; margin-left:77px;">
                    <ul class="footer-bullet">
                        <li><a href="index.php?main_page=donde_estamos">Ub&iacute;canos en el Mapa</a></li>
                        <li><a href="index.php?main_page=site_map">Mapa del Sitio</a></li>
<!--                        <li><a href="index.php?main_page=page&id=35&pg=features">Afiliados</a></li>-->
<!--                        <li><a href="index.php?main_page=shippinginfo&pg=information">Informaci&oacute;n de Env&iacute;os</a></li>-->
                        
                    </ul>
				</div>
        </div>
        <div class="moduletable mj-grid24 mj-dotted">
        	<h3>Cont&aacute;ctanos</h3>
            <div class="custom mj-grid24 mj-dotted">
                <div class="address">
                    <span class="small"><?php echo $address; ?></span>
                    <br/>
                    <!--Ub&iacute;canos en el Mapa-->
                </div>
                <div class="mail" style="margin-left:20px;">
                    <span class="small">Escr&iacute;benos:</span>
                    <br/>
                    <a href="mailto:info@mobelhispania.com"><?php echo $email_id; ?></a>
                </div>
                <div class="phone">
                    <span class="small">Tel&eacute;fonos de Contacto:</span>
                    <br/>
                    <?php echo $phone_support; ?>
                </div>
<!--                <div class="skype">
                    <span class="small">Ll&aacute;manos:</span>
                    <br/>
                    <?php //echo $skype_id; ?>
                </div>
-->                <div class="social_icons" style="margin-left:20px;">
                    <a class="mj-linkedin" href="#" target="_blank">linkedin</a>
                    <a class="mj-feed" href="#" target="_blank">RSS Feed</a>
                    <a class="mj-twitter" href="https://twitter.com/grupoemopa" target="_blank">Twitter</a>
                    <a class="mj-facebook" href="https://www.facebook.com/pages/Mobel-Hispania/261063300647178" target="_blank">Facebook</a>
                    <a class="mj-pinterest" href="https://www.pinterest.com/mobelhispania/" target="_blank">Pinterest</a>
                    <a class="mj-google" href="https://plus.google.com/111587615063026433769/posts" target="_blank">Google</a>                                        
                </div>
            </div>
        </div>
<!--        <div class="moduletable mj-grid24 mj-dotted mj-rspace">
        	<h3>Support</h3>
            <div id="mj-payment">
                <img src="<?php  //echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/support.png'?>" alt="payment-cards"/>
            </div>
        </div>-->
	</div>
</div>
    <div id="mj-copyright">
        <div class="mj-subcontainer">
                <div class="custom mj-grid88" style="margin:auto; width:500px; float:left; margin-left:400px;">
                    <p><!--&copy;--> <?php echo $copyright_text; ?></p>
                </div>
            
                <div class="custom mj-grid8">
                    <p>
                        <a id="w2b-StoTop" class="top" style="display: block;">Back to Top</a>
                    </p>
                </div>
        </div>
    </div>
</div>
<?php
} // flag_disable_footer
?>

<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=2962588; 
var sc_invisible=1; 
var sc_security="8a41bc6e"; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>
<noscript><div class="statcounter"><a title="web counter"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/2962588/0/8a41bc6e/1/"
alt="web counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

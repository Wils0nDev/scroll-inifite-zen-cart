<head><title>Contact Us</title></head>

<span class="mj-title"><?php echo $var_pageDetails->fields['pages_title']; ?></span>
<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=contact_us.<br />
 * Displays contact us page form.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_contact_us_default.php 18695 2011-05-04 05:24:19Z drbyte $
 */
?>
<div class="centerColumn" id="contactUsDefault">


<?php echo zen_draw_form('contact_us', zen_href_link(FILENAME_CONTACT_US, 'action=send')); ?>

<?php if (CONTACT_US_STORE_NAME_ADDRESS== '1') { ?>

<?php } ?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>

<div class="mainContent success"><?php echo TEXT_SUCCESS; ?></div>

<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<?php
  } else {
?>

<?php if (DEFINE_CONTACT_US_STATUS >= '1' and DEFINE_CONTACT_US_STATUS <= '2') { ?>
<?php } ?>

<?php if ($messageStack->size('contact') > 0) echo $messageStack->output('contact'); ?>

<fieldset id="contactUsForm">
<h1 id="contactus-heading"><?php echo HEADING_TITLE; ?></h1>
<iframe src="https://mapsengine.google.com/map/embed?mid=zHAPuvGHi0UE.kB9VXq4o8R2Y" width="920" height="400"></iframe>
<br />
<br />

<h2 style="padding-left:0px !important;">Encuéntrenos</h2>

<div class="contact-info" style="overflow: auto;">
      <div class="content" style="padding: 10px;overflow: auto;margin-bottom: 10px;border: 1px solid #EAE5E4;"><div class="left" style="float: left;width: 49%;"><b>Dirección:</b><br>
        MobelHispania.com<br>
        C/ Francisco Tárrega, 11 04640 Pulpí­, Almerí­a</div>
      <div class="right" style="float: right;width: 49%;">
                <b>Teléfono:</b><br>
        950465453 - 616 406 466<br>
        <br>
        <b>DNI/CIF:</b><br><!--B04000000--></div>
    </div>
</div>

<h2 style="padding-left:0px !important;">Formulario de Contacto</h2>
<div style="padding: 10px;overflow: auto;margin-bottom: 10px;border: 1px solid #EAE5E4;">    

<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>

<?php
// show dropdown if set
    if (CONTACT_US_LIST !=''){
?>
<label class="inputLabel" for="send-to"><?php echo SEND_TO_TEXT; ?></label>
<?php echo zen_draw_pull_down_menu('send_to',  $send_to_array, 0, 'id="send-to"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />
<?php
    }
?>


<div class="mj-contact" for="contactname"><?php echo ENTRY_NAME . '<span class="mj-msgalert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></div>
<?php echo zen_draw_input_field('contactname', $name, ' size="40" id="contactname"') ; ?>
<br class="clearBoth" />

<div class="mj-contact" for="email-address"><?php echo ENTRY_EMAIL . '<span class="mj-msgalert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></div>
<?php echo zen_draw_input_field('email', ($email_address), ' size="40" id="email-address"') ; ?>
<br class="clearBoth" />

<div class="mj-message" for="enquiry"><?php echo ENTRY_ENQUIRY . '<span class="mj-msgalert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
<?php echo zen_draw_textarea_field('enquiry', '30', '7', $enquiry, ' id="enquiry"'); ?>
</div>
</fieldset>

<div class="mj-sendmail"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<!--<div class="buttonRow back"><?php //echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>-->
<?php
  }
?>
</form>
</div>
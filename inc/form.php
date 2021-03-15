<?php

/** 
* Display Button and Echo CF7
*
*/

// Add inquiry Button

function catenq_display_inquiry_button() {

  $label = get_option( 'wc_settings_tab_catenq_form_label' );
  $form = get_option( 'wc_settings_tab_catenq_form_shortcode' );
  if(get_option( 'wc_settings_tab_catenq_form_show_inquiry_button' ) == 'yes') {
    echo '<button type="submit" id="catenq_inquiry_button" class="single_add_to_cart_button button alt">';
    echo esc_attr($label); 
    echo '</button>';
    echo '<div id="catenq_product_inq" style="display:none">';
    echo do_shortcode($form);
    echo '</div>';
  }

}

add_action( 'woocommerce_single_product_summary', 'catenq_display_inquiry_button', 30 );
 
// Add inquiry Form

function catenq_display_inquiry_form() {

  $labels = get_option( 'wc_settings_tab_catenq_form_label' );

?>
  <script type="text/javascript">
    jQuery('#catenq_inquiry_button').on('click', function(){
      var label = '<?php echo esc_attr($labels); ?>';
      if ( jQuery(this).text() == label ) {
        jQuery('#catenq_product_inq').css("display","block");
        jQuery('input[name="your-subject"]').val('<?php the_title(); ?>');
        jQuery("#catenq_inquiry_button").html('Close'); 
      } else {
          jQuery('#catenq_product_inq').hide();
          jQuery("#catenq_inquiry_button").html(label); 
        }
    });
  </script>
<?php

}

add_action( 'woocommerce_single_product_summary', 'catenq_display_inquiry_form', 40 );
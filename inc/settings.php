<?php

/** 
* Woocommerce Setting Tab
*
*/

class WC_settings_tab_wci {

    /**
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_settings_tab_wci', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_settings_tab_wci', __CLASS__ . '::update_settings' );
    }
    
    
    /**
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['settings_tab_wci'] = __( 'Woo Catalog & Enquiry', 'wci' );
        return $settings_tabs;
    }


    /**
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }


    /**
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }


    /**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_settings() {

        $settings = array(
            'section_title' => array(
                'name'     => __( 'Woo Catalog & Enquiry', 'wci' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'wc_settings_tab_wci_section_title'
            ),
            'hide_in_shop_page' => array(
                'name' => __( 'Hide Cart Button In Shop and Product Archive Page', 'wci' ),
                'type' => 'checkbox',
                'id'   => 'wc_settings_tab_wci_form_hide_in_shop_page',
                'default'   => 'no',
            ),
            'hide_in_single_page' => array(
                'name' => __( 'Hide Cart Button In Single Product Page', 'wci' ),
                'type' => 'checkbox',
                'id'   => 'wc_settings_tab_wci_form_hide_in_single_page',
                'default'   => 'no',
            ),
            'hide_price_in_shop_page' => array(
                'name' => __( 'Hide Price In Shop and Product Archive Page', 'wci' ),
                'type' => 'checkbox',
                'id'   => 'wc_settings_tab_wci_form_hide_price_in_shop_page',
                'default'   => 'no',
            ),
            'hide_price_in_single_page' => array(
                'name' => __( 'Hide Price In Single Product Page', 'wci' ),
                'type' => 'checkbox',
                'id'   => 'wc_settings_tab_wci_form_hide_price_in_single_page',
                'default'   => 'no',
            ),
            'show_Enquiry_button' => array(
                'name' => __( 'Show Enquiry Button', 'wci' ),
                'type' => 'checkbox',
                'id'   => 'wc_settings_tab_wci_form_show_inquiry_button',
                'default'   => 'no',
            ),
            'button_label' => array(
                'name' => __( 'Button Label', 'wci' ),
                'type' => 'text',
                'desc' => __( 'Please Enter Enquiry Button Label', 'wci' ),
                'id'   => 'wc_settings_tab_wci_form_label',
                'default'   => 'Product Enquiry'
            ),
            'shortcode' => array(
                'name' => __( 'Contact Form Shortcode', 'wci' ),
                'type' => 'text',
                'desc' => __( 'Please Enter Contact Form 7 Shortcode', 'wci' ),
                'id'   => 'wc_settings_tab_wci_form_shortcode'
            ),
            'section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'wc_settings_tab_wci_section_end'
            ),
            'style_section_title' => array(
                'name'     => __( 'Style Settings', 'wci' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'wc_style_settings_tab_wci_section_title'
            ),
            'button_margin' => array(
                'name' => __( 'Button Margin', 'wci' ),
                'type' => 'text',
                'desc' => __( 'Please Enter Button Margin', 'wci' ),
                'id'   => 'wc_settings_tab_wci_button_margin',
                'default'   => '20px 0px'
            ),
            'button_pading' => array(
                'name' => __( 'Button Padding', 'wci' ),
                'type' => 'text',
                'desc' => __( 'Please Enter Button Padding', 'wci' ),
                'id'   => 'wc_settings_tab_wci_button_padding',
                'default'   => '8px 25px'
            ),
            'button_background' => array(
                'name' => __( 'Button Background Color', 'wci' ),
                'type' => 'color',
                'desc' => __( 'Please Set Button Background Color', 'wci' ),
                'id'   => 'wc_settings_tab_wci_button_background',
                'default'   => '#28a745'
            ),
            'button_border' => array(
                'name' => __( 'Button Border Color', 'wci' ),
                'type' => 'color',
                'desc' => __( 'Please Set Button Border Color', 'wci' ),
                'id'   => 'wc_settings_tab_wci_button_border',
                'default'   => '#28a745'
            ),
            'button_color' => array(
                'name' => __( 'Button Color', 'wci' ),
                'type' => 'color',
                'desc' => __( 'Please Set Button Color', 'wci' ),
                'id'   => 'wc_settings_tab_wci_button_color',
                'default'   => '#fff'
            ),
            'custom_css' => array(
                'name' => __( 'Custom CSS', 'wci' ),
                'type' => 'textarea',
                'desc' => __( 'Write Your Custom CSS', 'wci' ),
                'id'   => 'wc_settings_tab_wci_custom_css'
            ),
            'style_section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'wc_style_settings_tab_wci_section_end'
            )
        );

        return apply_filters( 'wc_settings_tab_wci_settings', $settings );
    }

}

WC_settings_tab_wci::init();
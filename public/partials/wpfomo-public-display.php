<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://wpdeveloper.net
 * @since      1.0.0
 *
 * @package    Wpfomo
 * @subpackage Wpfomo/public/partials
 */


function wpfomo_add_content() {
	$wpfomo_show_image = get_option( 'wpfomo_show_image' );
	if( 1 == $wpfomo_show_image ) {
		$wpfomo_image = '<div class="wpfomo-product-thumb-container"><img src="" class="wpfomo-product-thumb"></div>';
	}else {
		$wpfomo_image = '';
	}
    echo '<div id="wpfomo">'.
			$wpfomo_image.
			'<div class="wpfomo-content-wrapper">'.
				do_shortcode( get_option( 'wpfomo_user_template' ) ).
			'</div>'.
		'</div>';
		}
add_action('wp_footer', 'wpfomo_add_content');

/**
 * Buyer Name Shortcode
 */
function wpfomo_name_shortcode( $atts ) {

	return '<span class="wpfomo-buyer-name"></span>';

}
add_shortcode( 'name', 'wpfomo_name_shortcode' );

/**
 * Product Name Shortcode
 */
function wpfomo_product_name_shortcode( $atts ) {

	return '<a href="#" target="_blank" class="wpfomo-product-name"></a>';

}
add_shortcode( 'product', 'wpfomo_product_name_shortcode' );

/**
 * Purchase Time Shortcode
 */
function wpfomo_purchase_time_shortcode( $atts ) {

	return '<div class="time">
			    <span class="number"></span>
			    	<span class="type"></span>
			    <span>ago</span>
			</div>';

}
add_shortcode( 'time', 'wpfomo_purchase_time_shortcode' );
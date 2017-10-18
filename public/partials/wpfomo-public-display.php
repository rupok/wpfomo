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
    echo '<div id="wpfomo">'.
			'<img src="" class="wpfomo-product-thumb">'.
			  '<div class="wpfomo-content-wrapper">'.
			    '<div class="wpfomo-buyer">'.
			    	'<span class="wpfomo-buyer-name"></span> <span>has purchased</span>'.
			    '</div>'.
			    	'<a href="#" target="_blank" class="wpfomo-product-name"></a>'.
			   	'<div class="time">'.
			     	'<span class="number"></span> '.
			      	'<span class="type"></span> '.
			      '<span>ago</span>'.
			    '</div>'.
			  '</div>'.
		'</div>';
		}
add_action('wp_footer', 'wpfomo_add_content');
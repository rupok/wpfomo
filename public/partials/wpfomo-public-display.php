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
    echo '<div id="fomo">'.
			'<img src="" class="product_image">'.
			  '<div class="wrapper">'.
			    '<div class="buyer"><span class="name"></span>Someone in <span class="location">Dhaka</span> Purchased</div>'.
			    '<a href="#" target="_blank" class="product_name">A Cool Product</a>'.
			    '<div class="time">'.
			      '<span class="number">10</span> '.
			      '<span class="type">min</span> '.
			      '<span>ago</span>'.
			    '</div>'.
			  '</div>'.
			'</div>';
		}
add_action('wp_footer', 'wpfomo_add_content');
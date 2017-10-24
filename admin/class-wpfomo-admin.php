<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wpdeveloper.net
 * @since      1.0.0
 *
 * @package    Wpfomo
 * @subpackage Wpfomo/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpfomo
 * @subpackage Wpfomo/admin
 * @author     WP Developer <support@wpdeveloper.net>
 */
class Wpfomo_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfomo-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_media();
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'wpfomo-repeater', plugin_dir_url( __FILE__ ) . 'js/wpfomo-repeater.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfomo-admin.js', array( 'jquery' ), $this->version, true );

		// Count Previous Section
		$repeater = array(
			'start' => count( get_option( 'wpfomo_buyer_name' ) )
		);
		wp_localize_script( 'wpfomo-repeater', 'repeater', $repeater );

	}

	/**
	 * Create an admin page
	 */
	public function create_wpfomo_admin_page() {

		add_menu_page( 
			'wpFomo', 
			'wpFomo', 
			'manage_options', 
			'wpfomo-settings-page', 
			array( $this, 'wpfomo_settings_page' ), 
			'',
			199  
		);

	}
	/**
	 * Register Settings Options
	 */
	public function wpfomo_register_settings() {

		register_setting( 'wpfomo-settings-group', 'wpfomo_buyer_name' ); 
		register_setting( 'wpfomo-settings-group', 'wpfomo_purchase_time' ); 
		register_setting( 'wpfomo-settings-group', 'wpfomo_product_name' ); 
		register_setting( 'wpfomo-settings-group', 'wpfomo_product_image' ); 
		register_setting( 'wpfomo-settings-group', 'wpfomo_product_image_src' ); 
		register_setting( 'wpfomo-settings-group', 'wpfomo_url' ); 
		
	}


	/**
	 * Settings Option Page
	 */
	public function wpfomo_settings_page() {

		$buyer_name 	= array_values( (array) get_option( 'wpfomo_buyer_name' ) );
		$purchase_time 	= array_values( (array) get_option( 'wpfomo_purchase_time' ) );
		$product_name 	= array_values( (array) get_option( 'wpfomo_product_name' ) );
		$product_image 	= array_values( (array) get_option( 'wpfomo_product_image' ) );
		$product_image_src 	= array_values( (array) get_option( 'wpfomo_product_image_src' ) );
		$custom_url 	= array_values( (array) get_option( 'wpfomo_url' ) );
		// If No Image Uploaded
    	$default_image = 'https://cdn.shopify.com/s/files/1/1585/6515/files/boost_thumb.png';

		?>
		<h2>wpFomo Settings</h2><hr>
		<form action="options.php" method="post">
			<?php settings_fields( 'wpfomo-settings-group' ); ?>
    		<?php do_settings_sections( 'wpfomo-settings-group' ); ?>
    		<div class="wpfomo-settings">
    			<?php for( $i = 0; $i < count( $buyer_name ); $i++ ) { ?>
				<?php 
				if ( !empty( $product_image[$i] ) ) {
				        $image_attributes = wp_get_attachment_image_src( $product_image[$i], array( 100, 100 ) );
				        $src = $image_attributes[0];
				        $value = $product_image[$i];
				    } else {
				        $src = $default_image;
				        $value = '';
				    }
				?>
    			<h2><?php $fomo = $i + 1; echo "Fomo ". $fomo; ?></h2>
    			<table class="form-table" id="table-id-<?php echo $i; ?>" style="max-width:600px;">
	    			<tr valign="top">
	    				<th scope="row"><?php _e( 'Buyer Name', 'wpfomo' ); ?></th>
	    				<td><input type="text" class="widefat" name="wpfomo_buyer_name[<?php echo $i; ?>]" value="<?php echo esc_attr( $buyer_name[$i] ); ?>"></td>
	    			</tr>
	    			<tr valign="top">
	    				<th scope="row"><?php _e( 'Purchase Time', 'wpfomo' ); ?></th>
	    				<td><input type="text" class="datepicker widefat" name="wpfomo_purchase_time[<?php echo $i; ?>]" value="<?php echo esc_attr( $purchase_time[$i] ); ?>"></td>
	    			</tr>
	    			<tr valign="top">
	    				<th scope="row"><?php _e( 'Product Name', 'wpfomo' ); ?></th>
	    				<td><input type="text" class="widefat" name="wpfomo_product_name[<?php echo $i; ?>]" value="<?php echo esc_attr( $product_name[$i] ); ?>"></td>
	    			</tr>
	    			<tr valign="top">
	    				<th scope="row"><?php _e( 'Product Image URL', 'wpfomo' ); ?></th>
	    				<td>
	    					<div class="upload">
					            <img data-src="<?php echo esc_url( $default_image ); ?>" src="<?php echo esc_url( $src ); ?>" width="100px" height="100px" />
					            <div>
					                <input type="hidden" name="wpfomo_product_image[<?php echo $i; ?>]" id="wpfomo_product_image[<?php echo $i; ?>]" value="<?php echo esc_attr( intval( $value ) ); ?>" />
					                <button type="submit" class="upload_image_button button"><?php echo esc_html__( 'Upload', 'wpfomo' ) ?></button>
					                <button type="submit" class="remove_image_button button"><?php echo esc_html__( 'Delete', 'wpfomo' ); ?></button>
					            </div>
					        </div>
					    </td>
	    			</tr>
	    			<tr valign="top">
	    				<th scope="row"><?php _e( 'URL', 'wpfomo' ); ?></th>
	    				<td><input type="text" class="widefat" name="wpfomo_url[<?php echo $i; ?>]" value="<?php echo esc_url( $custom_url[$i] ); ?>"></td>
	    				<td><input type="button" data-id="<?php echo $i; ?>" name="wpfomo_delete" class="button button-danger del-btn" value="<?php _e( 'Delete', 'wpfomo' ); ?>" /></td>
	    			</tr>
	    			<tr valign="top">
	    				<td colspan="3" ><hr></td>
	    			</tr>
	    		</table>
	    		<?php } ?>
	    		<div class="repeatable"></div>
	    		<p><input type="button" value="<?php _e( 'Add New Section', 'wpfomo' ); ?>" class="button button-secondary add" /> <input type="submit" name="submit" class="button button-primary" value="<?php _e( 'Save', 'wpfomo' ); ?>" /></p>
    		</div>
		</form>
		<?php
	}

}

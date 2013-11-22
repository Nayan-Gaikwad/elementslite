<?php
/**
 * Title: Elements Initializer
 *
 * Description: Initializes the elements. Adds all required files.
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

/**
 * Add plugin automation file
 */
require_once( dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php' );

// Load style for elements
function cyberchimps_add_elements_style() {

	// Set directory uri
	$directory_uri = get_template_directory_uri();

	wp_register_style( 'elements_style', $directory_uri . '/elements/lib/css/elements.css' );
	wp_enqueue_style( 'elements_style' );

	wp_register_script( 'elements_js', $directory_uri . '/elements/lib/js/elements.min.js' );
	wp_enqueue_script( 'elements_js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'cyberchimps_add_elements_style', 30 );

// Load elements
// Set directory path
$directory_path = get_template_directory();

require_once( $directory_path . '/elements/portfolio-lite.php' );
require_once( $directory_path . '/elements/slider-lite.php' );
require_once( $directory_path . '/elements/boxes.php' );

// main blog drag and drop options
function cyberchimps_selected_elements() {
	$options = array(
		'boxes_lite'     => __( 'Boxes Lite', 'cyberchimps_elements' ),
		"portfolio_lite" => __( 'Portfolio Lite', 'cyberchimps_elements' ),
		"blog_post_page" => __( 'Post Page', 'cyberchimps_elements' ),
		"slider_lite"    => __( 'Slider Lite', 'cyberchimps_elements' )
	);

	return $options;
}

add_filter( 'cyberchimps_elements_draganddrop_options', 'cyberchimps_selected_elements' );

function cyberchimps_selected_page_elements() {
	$options = array(
		'boxes_lite'     => __( 'Boxes Lite', 'cyberchimps_elements' ),
		"portfolio_lite" => __( 'Portfolio Lite', 'cyberchimps_elements' ),
		"page_section"   => __( 'Page', 'cyberchimps_elements' ),
		"slider_lite"    => __( 'Slider Lite', 'cyberchimps_elements' )
	);

	return $options;
}

add_filter( 'cyberchimps_elements_draganddrop_page_options', 'cyberchimps_selected_page_elements' );

// drop breadcrumb fields
function cyberchimps_element_drop_fields( $fields ) {
// drop unwanted fields
	foreach( $fields as $key => $value ) {
		if( $value['id'] == 'single_post_breadcrumbs' || $value['id'] == 'archive_breadcrumbs' ) {
			unset( $fields[$key] );
		}
	}

	return $fields;
}

add_filter( 'cyberchimps_field_filter', 'cyberchimps_element_drop_fields', 2 );

// Show message to install plugins.
function cyberchimps_install_plugins() {
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     => 'cyberchimpsextras', // The plugin name
			'slug'     => 'cyberchimpsextras', // The plugin slug (typically the folder name)
			'required' => false
		)
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'cyberchimps_elements';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */

	$config = array(
		'domain'           => $theme_text_domain, // Text domain - likely want to be the same as your theme.
		'default_path'     => '', // Default absolute path to pre-packaged plugins
		'parent_menu_slug' => 'themes.php', // Default parent menu slug
		'parent_url_slug'  => 'themes.php', // Default parent URL slug
		'menu'             => 'install-cyberchimpsextras', // Menu slug
		'has_notices'      => true, // Show admin notices or not
		'is_automatic'     => true, // Automatically activate plugins after installation or not
		'message'          => '', // Message to output right before the plugins table
		'strings'          => array(
			'page_title'                      => __( 'Cyberchimps Add Features', $theme_text_domain ),
			'menu_title'                      => __( 'Activate Add Ons', $theme_text_domain ),
			'installing'                      => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                            => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                          => __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                => __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
		)
	);

	tgmpa( $plugins, $config );

}

// Add plugin notification only if the current user is admin.
if( current_user_can( 'manage_options' ) ) {
	add_action( 'tgmpa_register', 'cyberchimps_install_plugins' );
}
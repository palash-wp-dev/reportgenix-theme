<?php
/**
 * xgenious functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package xgenious
 */

/**
 * Define Xgenious Folder Path & Url Const
 * @since 1.0.0
 * */
define('XGENIOUS_THEME_ROOT',get_template_directory());
define('XGENIOUS_THEME_ROOT_URL',get_template_directory_uri());
define('XGENIOUS_INC',XGENIOUS_THEME_ROOT .'/inc');
define('XGENIOUS_THEME_SETTINGS',XGENIOUS_INC.'/theme-settings');
define('XGENIOUS_THEME_SETTINGS_IMAGES',XGENIOUS_THEME_ROOT_URL.'/inc/theme-settings/images');
define('XGENIOUS_TGMA',XGENIOUS_INC.'/plugins/tgma');
define('XGENIOUS_DYNAMIC_STYLESHEETS',XGENIOUS_INC.'/dynamic-stylesheets');
define('XGENIOUS_CSS',XGENIOUS_THEME_ROOT_URL.'/assets/css');
define('XGENIOUS_IMG',XGENIOUS_THEME_ROOT_URL.'/assets/img');
define('XGENIOUS_JS',XGENIOUS_THEME_ROOT_URL.'/assets/js');
define('XGENIOUS_ASSETS',XGENIOUS_THEME_ROOT_URL.'/assets');
define('XGENIOUS_DEV',true);
define('EDD_SLUG', 'our-products');
/**
 * Theme Initial File
 * @since 1.0.0
 * */
if (file_exists(XGENIOUS_INC .'/class-xgenious-init.php')){
	require_once XGENIOUS_INC .'/class-xgenious-init.php';
}
/**
 * Codester Framework Functions
 * @since 1.0.0
 * */
if (file_exists(XGENIOUS_INC .'/csf-functions.php')){
	require_once XGENIOUS_INC .'/csf-functions.php';
}
/**
 * theme helpers functions
 * @since 1.0.0
 * */
if (file_exists(XGENIOUS_INC .'/class-xgenious-helper-functions.php')){

	require_once XGENIOUS_INC .'/class-xgenious-helper-functions.php';
	if (!function_exists('Xgenious')){
		function Xgenious(){
			return class_exists('Xgenious_Helper_Functions') ? new Xgenious_Helper_Functions() : false;
		}
	}

}

add_action( 'template_redirect', 'xgenious_redirect_product_category_page') ;
function xgenious_redirect_product_category_page() {
	$slug     = defined( 'EDD_SLUG' ) ? EDD_SLUG : 'downloads';
	if (isset($_SERVER['HTTPS']) &&
	    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
	    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
	    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
		$protocol = 'https://';
	}
	else {
		$protocol = 'http://';
	}

	$currenturl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$currenturl_relative = wp_make_link_relative($currenturl);
	$build_base_url = XGENIOUS_DEV ? '/xg' : '';
	switch ($currenturl_relative) {

		case $build_base_url.'/'.$slug.'/category':
			$urlto = home_url('/'.$slug);

			break;
		case $build_base_url.'/'.$slug.'/category/':
			$urlto = home_url('/'.$slug);
			break;

		default:
			return;

	}

	if ($currenturl != $urlto)
		exit( wp_redirect( $urlto ) );
}

remove_filter( 'the_content', 'wpautop' );
$br = false;
add_filter( 'the_content', function( $content ) use ( $br ) {
    return wpautop( $content, $br );
}, 10 );


function xgenious_defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'xgenious_defer_parsing_of_js', 10 );

function xgenious_right_way_to_include_google_fonts() {
	if (!is_admin()) {
		wp_register_style('google', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700&display=swap', array(), null, 'all');
		wp_enqueue_style('google');
	}
}
add_action('wp_enqueue_scripts', 'xgenious_right_way_to_include_google_fonts');


function pw_edd_remove_price( $args ) {
	
	$args['price'] = 'no';

	return $args;
}
add_filter( 'edd_purchase_link_defaults', 'pw_edd_remove_price' );

// list link class add
// function add_menu_link_class($atts, $item, $args)
// {
//     $atts['class'] = '';
//     return $atts;
// }
// add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

// list class add
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    $classes['class'] = ''; // add extra class
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

add_image_size( 'xgenious-custom-size', 80, 200 );
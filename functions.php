<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'PENTAX_DIR_URI' ) )
		define( 'PENTAX_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'PENTAX_DIR_ASSETS_URI' ) )
		define( 'PENTAX_DIR_ASSETS_URI', PENTAX_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'PENTAX_DIR_CSS_URI' ) )
		define( 'PENTAX_DIR_CSS_URI', PENTAX_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'PENTAX_DIR_JS_URI' ) )
		define( 'PENTAX_DIR_JS_URI', PENTAX_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('PENTAX_DIR_ICON_IMG_URI') )
		define( 'PENTAX_DIR_ICON_IMG_URI', PENTAX_DIR_URI.'img/core-img/' );
	
	//DIR inc
	if( !defined( 'PENTAX_DIR_INC' ) )
		define( 'PENTAX_DIR_INC', PENTAX_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'PENTAX_DIR_ELEMENTOR' ) )
		define( 'PENTAX_DIR_ELEMENTOR', PENTAX_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'PENTAX_DIR_PATH' ) )
		define( 'PENTAX_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'PENTAX_DIR_PATH_INC' ) )
		define( 'PENTAX_DIR_PATH_INC', PENTAX_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'PENTAX_DIR_PATH_LIB' ) )
		define( 'PENTAX_DIR_PATH_LIB', PENTAX_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'PENTAX_DIR_PATH_CLASSES' ) )
		define( 'PENTAX_DIR_PATH_CLASSES', PENTAX_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'PENTAX_DIR_PATH_WIDGET' ) )
		define( 'PENTAX_DIR_PATH_WIDGET', PENTAX_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'PENTAX_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'PENTAX_DIR_PATH_ELEMENTOR_WIDGETS', PENTAX_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( PENTAX_DIR_PATH_INC . 'pentax-breadcrumbs.php' );
	// Sidebar register file include
	require_once( PENTAX_DIR_PATH_INC . 'widgets/pentax-widgets-reg.php' );
	// Post widget file include
	require_once( PENTAX_DIR_PATH_INC . 'widgets/pentax-recent-post-thumb.php' );
	// News letter widget file include
	require_once( PENTAX_DIR_PATH_INC . 'widgets/pentax-newsletter-widget.php' );
	//Social Links
	require_once( PENTAX_DIR_PATH_INC . 'widgets/pentax-social-links.php' );
	// Instagram Widget
	require_once( PENTAX_DIR_PATH_INC . 'widgets/pentax-instagram.php' );
	// Nav walker file include
	require_once( PENTAX_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( PENTAX_DIR_PATH_INC . 'pentax-functions.php' );

	// Theme Demo file include
	require_once( PENTAX_DIR_PATH_INC . 'demo/demo-import.php' );

	// Inline css file include
	require_once( PENTAX_DIR_PATH_INC . 'pentax-commoncss.php' );
	// Post Like
	require_once( PENTAX_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( PENTAX_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( PENTAX_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( PENTAX_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( PENTAX_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( PENTAX_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( PENTAX_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( PENTAX_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( PENTAX_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class pentax dashboard
	require_once( PENTAX_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( PENTAX_DIR_PATH_INC . 'pentax-metabox.php' );
	}
	

	// Admin Enqueue Script
	function pentax_admin_script(){
		wp_enqueue_style( 'pentax-admin', get_template_directory_uri().'/assets/css/pentax_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'pentax_admin', get_template_directory_uri().'/assets/js/pentax_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'pentax_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );




	/**
	 * Instantiate Pentax object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Pentax Dashboard .
	 *
	 */
	
	$Pentax = new Pentax();
	

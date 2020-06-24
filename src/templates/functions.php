<?php 
  
  @ini_set( 'upload_max_size' , '10M' );
	@ini_set( 'post_max_size', '10M');
  @ini_set( 'max_execution_time', '300' );
  
	/* Add theme support */
	add_theme_support( 'menus' );
  add_theme_support( 'post-thumbnails' );

  	/* Add Theme assets */
	function theme_assets() {
    wp_enqueue_style('style_css', get_stylesheet_uri(), false);
    wp_enqueue_style( 'bundle_css', get_template_directory_uri() . '/styles/bundle.css', array(), '1.0.0', 'all' );

    wp_enqueue_script( 'bundle_js', get_template_directory_uri() . '/js/bundle.js', array('jquery'), '1.0.0', true);
	}
  add_action('wp_enqueue_scripts', 'theme_assets');

  /* Add custom menu */
  function register_menu() {
    register_nav_menu('main-menu',__( 'Main Menu' ));
  }
  add_action( 'init', 'register_menu' );

  /* Remove WP Version from script files */
  function remove_version() {
		return '';
	}
  add_filter('the_generator', 'remove_version');

  /* Hide WP-Admin bar for non-admin users */
  add_action('after_setup_theme', 'remove_admin_bar');
  
  function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
  }

	/* Remove wp version param from any enqueued scripts */
	function vc_remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
	add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
  add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
  
   /* Add Google Map API */
  /* function my_acf_google_map_api( $api ){
    $api['key'] = '*****';
    return $api;
    }
    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api'); */

?>
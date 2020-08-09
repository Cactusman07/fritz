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
    register_nav_menu('top-links',__( 'Top Links' ));
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
   function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAN8uDlNkrTYVg4FVKz21sCcUi84y2EhTg';
    return $api;
  }
  add_filter('acf/fields/google_map/api', 'my_acf_google_map_api'); 

  /* Add custom post type 'Products' to Theme */
  function create_postTypeProducts() {
		
    $labels = array(
      'name'					      => _x( 'Products', 'Post Type General Name', "Fritz's Wieners theme"),
      'singular name'			  => _x( 'Product', 'Singular Name', "Fritz's Wieners theme"),
      'menu_name'				    => __( 'Products', "Fritz's Wieners theme"),
      'all_items'         	=> __( 'All Products', "Fritz's Wieners theme" ),
      'view_item'         	=> __( 'View Product', "Fritz's Wieners theme" ),
      'add_new_item'      	=> __( 'Add New Product', "Fritz's Wieners theme" ),
      'add_new'           	=> __( 'Add Product', "Fritz's Wieners theme" ),
      'edit_item'         	=> __( 'Edit Product', "Fritz's Wieners theme" ),
      'update_item'       	=> __( 'Update Product', "Fritz's Wieners theme" ),
      'search_items'      	=> __( 'Search for Product', "Fritz's Wieners theme" ),
      'not_found'         	=> __( 'Not Found', "Fritz's Wieners theme" ),
      'not_found_in_trash'	=> __( 'Not found in Trash', "Fritz's Wieners theme" ),
    );
    
    $args = array(
      'label'				        => __('Products', "Fritz's Wieners theme"),
      'description'		      => __('A list of Products and their details.', "Fritz's Wieners theme"),
      'labels'			        => $labels,
      'supports'			      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
      'hierarchical' 		    => true,
      'public'			        => true,
      'publicly_queryable'  => true,
      'query_var'           => true,
      'show_in_rest'        => true,
      'rest_base'           => 'Products',
      'rest_controller_class' => 'WP_REST_Posts_Controller',
      'show_ui'			        => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
      'menu_icon'           => 'dashicons-star-filled',
    );
    register_post_type('Products', $args );
  }
  add_action('init', 'create_postTypeProducts', 0 );

  /* Add custom post type 'Locations' to Theme */
  function create_postTypeLocations() {
		
    $labels = array(
      'name'					      => _x( 'Locations', 'Post Type General Name', "Fritz's Wieners theme"),
      'singular name'			  => _x( 'Location', 'Singular Name', "Fritz's Wieners theme"),
      'menu_name'				    => __( 'Locations', "Fritz's Wieners theme"),
      'all_items'         	=> __( 'All Locations', "Fritz's Wieners theme" ),
      'view_item'         	=> __( 'View Location', "Fritz's Wieners theme" ),
      'add_new_item'      	=> __( 'Add New Location', "Fritz's Wieners theme" ),
      'add_new'           	=> __( 'Add Location', "Fritz's Wieners theme" ),
      'edit_item'         	=> __( 'Edit Location', "Fritz's Wieners theme" ),
      'update_item'       	=> __( 'Update Location', "Fritz's Wieners theme" ),
      'search_items'      	=> __( 'Search for Location', "Fritz's Wieners theme" ),
      'not_found'         	=> __( 'Not Found', "Fritz's Wieners theme" ),
      'not_found_in_trash'	=> __( 'Not found in Trash', "Fritz's Wieners theme" ),
    );
    
    $args = array(
      'label'				        => __('Locations', "Fritz's Wieners theme"),
      'description'		      => __('A list of Locations and their details to list on the Locations Map.', "Fritz's Wieners theme"),
      'labels'			        => $labels,
      'supports'			      => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
      'hierarchical' 		    => true,
      'public'			        => true,
      'publicly_queryable'  => true,
      'query_var'           => true,
      'show_in_rest'        => true,
      'rest_base'           => 'Locations',
      'rest_controller_class' => 'WP_REST_Posts_Controller',
      'show_ui'			        => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 6,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
      'menu_icon'           => 'dashicons-location-alt',
    );
    register_post_type('Locations', $args );
  }
  add_action('init', 'create_postTypeLocations', 0 );

  // Add advance custom fields to rest-api
  function create_ACF_meta_in_REST() {
    $postypes_to_exclude = ['acf-field-group','acf-field'];
    $extra_postypes_to_include = ["page"];
    $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);

    array_push($post_types, $extra_postypes_to_include);

    foreach ($post_types as $post_type) {
        register_rest_field( $post_type, 'ACF', [
            'get_callback'    => 'expose_ACF_fields',
            'schema'          => null,
       ]
     );
    }

  }
  function expose_ACF_fields( $object ) {
      $ID = $object['id'];
      return get_fields($ID);
  }
  add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );
?>
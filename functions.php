<?php
/**
 * WP Starter Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Starter_Theme
 */

if ( ! function_exists( 'wp_starter_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_starter_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP Starter Theme, use a find and replace
		 * to change 'wp-starter-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp-starter-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wp-starter-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wp_starter_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wp_starter_theme_setup' );

// Add mobile logo to Customizr
function savini_mobile_logo($wp_customize) {
	// add a setting for the site logo
			$wp_customize->add_setting('light_logo');
	// Add a control to upload the logo
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'light_logo',
					array(
							'label' => 'Light Logo',
							'section' => 'title_tagline',
							'settings' => 'light_logo',
					) ) );
	}
	add_action('customize_register', 'savini_mobile_logo');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_starter_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wp_starter_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_starter_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function savini_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp-starter-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-starter-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'savini_widgets_init' );

/**
 * Register menu location.
 *
 * @link https://developer.wordpress.org/themes/functionality/navigation-menus/#register-menus
 */
function savini_menus() {
  register_nav_menus(
    array(
			'footer' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'savini_menus' );

/**
 * Enqueue scripts and styles.
 */
function savini_scripts() {
	wp_enqueue_style( 'savini-style', get_template_directory_uri() . '/assets/css/main.min.css' );
	wp_enqueue_script( 'wp-starter-theme-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array( 'jquery' ), NULL, true );

	wp_enqueue_script( 'savini-custom-script', get_template_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ), NULL, true );

	wp_register_style( 'lightgallery', '//cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.min.css', false, NULL, 'all' );
	wp_register_script( 'lightgallery', '//cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery-all.js', array( 'jquery' ), NULL, true );
	// wp_register_script( 'lightgallery-video', '//cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-video.min.js', array(), NULL, true );
	// wp_register_script( 'lightgallery-thumbnail', '//cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-thumbnail.min.js', array(), NULL, true );
	// wp_register_script( 'lightgallery-fullscreen', '//cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-fullscreen.js', array(), NULL, true );
	// wp_register_script( 'lightgallery-zoom', '//cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-zoom.min.js', array(), NULL, true );
	
	wp_register_script( 'slick-carousel', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ), NULL, true );
	wp_register_style( 'slick-carousel', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', false, NULL, 'all' );
	wp_register_style( 'slick-carousel-theme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', false, NULL, 'all' );

	wp_register_script( 'lettering', '//cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js', array( 'jquery' ), NULL, true );

	// wp_register_style( 'plyr', '//cdn.plyr.io/3.4.6/plyr.css', false, NULL, 'all' );
	// wp_register_script( 'plyr', '//cdn.plyr.io/3.4.6/plyr.js', array(), NULL, true );

	// wp_register_style( 'animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css', false, NULL, 'all' );

	// wp_register_script( 'micro-modal', '//cdn.jsdelivr.net/npm/micromodal@0.3.2/dist/micromodal.min.js', array(), NULL, true );

	// wp_register_script( 'wow', '//cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js', array(), NULL, true );

	// wp_register_script( 'lazy-sizes', '//cdn.jsdelivr.net/npm/lazysizes@4.1.5/lazysizes.min.js', array(), NULL, true );

	// wp_register_script( 'swup', '//cdn.jsdelivr.net/npm/swup@1.7.17/dist/swup.min.js', array(), NULL, true );

	wp_register_style('font', 'https://fonts.googleapis.com/css?family=Alex+Brush', false, NULL, 'all');

	wp_enqueue_style( 'savini-style' );
	wp_enqueue_script( 'savini-custom-script' );
	// wp_enqueue_script( 'wp-starter-theme-vendor' );

	wp_enqueue_style( 'lightgallery' );
	wp_enqueue_script( 'lightgallery' );
	// wp_enqueue_script( 'lightgallery-thumbnail' );
	// wp_enqueue_script( 'lightgallery-fullscreen' );
	// wp_enqueue_script( 'lightgallery-zoom' );
	// wp_enqueue_script( 'lightgallery-video' );

	wp_enqueue_style( 'slick-carousel' );
	wp_enqueue_style( 'slick-carousel-theme' );
	wp_enqueue_script( 'slick-carousel' );

	wp_enqueue_script( 'lettering' );

	// wp_enqueue_style( 'plyr' );
	// wp_enqueue_script( 'plyr' );

	// wp_enqueue_style( 'animate' );

	// wp_enqueue_script( 'wow' );

	// wp_enqueue_script( 'micro-modal' );

	// wp_enqueue_script( 'lazy-sizes' );

	// wp_enqueue_script( 'swup' );

	wp_enqueue_style('font');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'savini_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


// Create Wheel Post Type
function create_wheel_post_type() {
    $labels = array(
        'name'               => 'Wheels',
        'singular_name'      => 'Wheel',
        'add_new'            => 'Add New Wheel',
        'add_new_item'       => 'Add New Wheel',
        'edit_item'          => 'Edit Wheel',
        'new_item'           => 'New Wheel',
        'all_items'          => 'All Wheels',
        'view_item'          => 'View Wheel',
        'search_items'       => 'Search Wheels',
        'not_found'          =>  'No Wheels Found',
        'not_found_in_trash' => 'No Wheels found in Trash',
        'parent_item_colon'  => '',
        'menu_name'          => 'Wheels',
    );
    // Register Wheel Post Type
    register_post_type( 'wheel', array(
            'labels'              => $labels,
            'has_archive'         => true,
            'has_rest'            => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
						'show_in_admin_bar'   => true,
						'show_in_rest'		  => true,
            'can_export'          => true,
            'publicly_queryable'  => true,
            'menu_icon'           => 'dashicons-admin-generic',
            'menu_position'       => 5,
            'supports'            => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
            'taxonomies'          => array( 'wheel_tag', 'wheel_category' ),
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'rewrite'             => array( 'slug' => 'wheels' )
        )
    );
}
add_action( 'init', 'create_wheel_post_type' );

// Create Vehicle Post Type
function create_vehicle_post_type() {
	$labels = array(
			'name'               => 'Vehicles',
			'singular_name'      => 'Vehicle',
			'add_new'            => 'Add New Vehicle',
			'add_new_item'       => 'Add New Vehicle',
			'edit_item'          => 'Edit Vehicle',
			'new_item'           => 'New Vehicle',
			'all_items'          => 'All Vehicles',
			'view_item'          => 'View Vehicle',
			'search_items'       => 'Search Vehicles',
			'not_found'          =>  'No Vehicles Found',
			'not_found_in_trash' => 'No Vehicles found in Trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Vehicles',
	);
	// Register Wheel Post Type
	register_post_type( 'vehicle', array(
					'labels'              => $labels,
					'has_archive'         => true,
					'has_rest'            => true,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'show_in_rest'		  => true,
					'can_export'          => true,
					'publicly_queryable'  => true,
					'menu_icon'           => 'dashicons-admin-generic',
					'menu_position'       => 5,
					'supports'            => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
					'taxonomies'          => array( 'vehicle_tag', 'vehicle_category' ),
					'exclude_from_search' => false,
					'capability_type'     => 'post',
					'rewrite'             => array( 'slug' => 'vehicles' )
			)
	);
}
add_action( 'init', 'create_vehicle_post_type' );

// Create Finish Post Type
function create_finish_post_type() {
	$labels = array(
			'name'               => 'Finish',
			'singular_name'      => 'Finish',
			'add_new'            => 'Add New Finish',
			'add_new_item'       => 'Add New Finish',
			'edit_item'          => 'Edit Finish',
			'new_item'           => 'New Finish',
			'all_items'          => 'All Finishes',
			'view_item'          => 'View Finish',
			'search_items'       => 'Search Finishes',
			'not_found'          =>  'No Finishes Found',
			'not_found_in_trash' => 'No Finishes found in Trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Finishes',
	);
	// Register Finish Post Type
	register_post_type( 'finish', array(
					'labels'              => $labels,
					'has_archive'         => true,
					'has_rest'            => true,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'show_in_rest'		  => true,
					'can_export'          => true,
					'publicly_queryable'  => true,
					'menu_icon'           => 'dashicons-admin-generic',
					'menu_position'       => 5,
					'supports'            => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
					'taxonomies'          => array( 'finish_tag', 'finish_category' ),
					'exclude_from_search' => false,
					'capability_type'     => 'post',
					'rewrite'             => array( 'slug' => 'finishes' )
			)
	);
}
add_action( 'init', 'create_finish_post_type' );

// Edit Wheel Post Type Title Text
function wheel_title_text( $title ) {
    $screen = get_current_screen();
    if  ( 'wheel' == $screen->post_type ) {
        $title = 'Enter name of the wheel here';
    }
    return $title;
}
add_filter( 'enter_title_here', 'wheel_title_text' );

// Create Wheel Post Type Categories
function create_wheel_categories() {
    $collections_labels = array(
        'name'              => _x( 'Collections', 'taxonomy general name' ),
        'singular_name'     => _x( 'Collection', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Collections' ),
        'all_items'         => __( 'All Collections' ),
        'parent_item'       => __( 'Parent Collection' ),
        'parent_item_colon' => __( 'Parent Collection:' ),
        'edit_item'         => __( 'Edit Collection' ),
        'update_item'       => __( 'Update Collection' ),
        'add_new_item'      => __( 'Add New Collection' ),
        'new_item_name'     => __( 'New Collection' ),
        'menu_name'         => __( 'Collections' ),
    );
    $collections_args = array(
        'labels' => $collections_labels,
				'hierarchical' => true,
				'show_in_rest'	=>	true,
				'has_archive' => true,
				'rewrite' => array( 
					'slug' => 'wheel-collections',
					'with_front' => false
				)
    );
		register_taxonomy( 'wheel_collections', 'wheel', $collections_args );
		
		$configurations_labels = array(
			'name'              => _x( 'Configurations', 'taxonomy general name' ),
			'singular_name'     => _x( 'Configuration', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Configurations' ),
			'all_items'         => __( 'All Configurations' ),
			'parent_item'       => __( 'Parent Configuration' ),
			'parent_item_colon' => __( 'Parent Configuration:' ),
			'edit_item'         => __( 'Edit Configuration' ),
			'update_item'       => __( 'Update Configuration' ),
			'add_new_item'      => __( 'Add New Configuration' ),
			'new_item_name'     => __( 'New Configuration' ),
			'menu_name'         => __( 'Configurations' ),
	);
	$configurations_args = array(
			'labels' => $configurations_labels,
			'hierarchical' => true,
			'show_in_rest'	=>	true
	);
	register_taxonomy( 'wheel_configurations', 'wheel', $configurations_args );
}
add_action( 'init', 'create_wheel_categories', 0 );

// Create Vehicle Post Type Categories
function create_vehicle_categories() {
	$make_labels = array(
			'name'              => _x( 'Make', 'taxonomy general name' ),
			'singular_name'     => _x( 'Make', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Makes' ),
			'all_items'         => __( 'All Makes' ),
			'parent_item'       => __( 'Parent Make' ),
			'parent_item_colon' => __( 'Parent Make' ),
			'edit_item'         => __( 'Edit Make' ),
			'update_item'       => __( 'Update Make' ),
			'add_new_item'      => __( 'Add New Make' ),
			'new_item_name'     => __( 'New Make' ),
			'menu_name'         => __( 'Makes' ),
	);
	$make_args = array(
			'labels' => $make_labels,
			'hierarchical' => true,
			'show_in_rest'	=>	true,
			'has_archive' => true,
			'rewrite' => array(
				'slug' => 'vehicle-make',
				'with_front' => false
			)
	);
	register_taxonomy( 'vehicle_make', 'vehicle', $make_args );

	$model_labels = array(
		'name'              => _x( 'Model', 'taxonomy general name' ),
		'singular_name'     => _x( 'Model', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Models' ),
		'all_items'         => __( 'All Models' ),
		'parent_item'       => __( 'Parent Model' ),
		'parent_item_colon' => __( 'Parent Model:' ),
		'edit_item'         => __( 'Edit Model' ),
		'update_item'       => __( 'Update Model' ),
		'add_new_item'      => __( 'Add New Model' ),
		'new_item_name'     => __( 'New Model' ),
		'menu_name'         => __( 'Models' ),
	);
	$model_args = array(
			'labels' => $model_labels,
			'hierarchical' => true,
			'show_in_rest'	=>	true,
			'has_archive' => true,
			'rewrite' => array( 
					'slug' => 'vehicle-model',
					'with_front' => false
			)
	);
	register_taxonomy( 'vehicle_model', 'vehicle', $model_args );
}
add_action( 'init', 'create_vehicle_categories', 0 );

// Create Vehicle Post Type Categories
function create_finish_categories() {
	$option_labels = array(
			'name'              => _x( 'Option', 'taxonomy general name' ),
			'singular_name'     => _x( 'Option', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Options' ),
			'all_items'         => __( 'All Options' ),
			'parent_item'       => __( 'Parent Option' ),
			'parent_item_colon' => __( 'Parent Option' ),
			'edit_item'         => __( 'Edit Option' ),
			'update_item'       => __( 'Update Option' ),
			'add_new_item'      => __( 'Add New Option' ),
			'new_item_name'     => __( 'New Option' ),
			'menu_name'         => __( 'Options' ),
	);
	$option_args = array(
			'labels' => $option_labels,
			'hierarchical' => true,
			'show_in_rest'	=>	true,
			'has_archive' => true,
			'rewrite' => array(
				'slug' => 'finish-option',
				'with_front' => false
			)
	);
	register_taxonomy( 'finish_options', 'finish', $option_args );

	$color_labels = array(
		'name'              => _x( 'Color', 'taxonomy general name' ),
		'singular_name'     => _x( 'Color', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Colors' ),
		'all_items'         => __( 'All Colors' ),
		'parent_item'       => __( 'Parent Color' ),
		'parent_item_colon' => __( 'Parent Color:' ),
		'edit_item'         => __( 'Edit Color' ),
		'update_item'       => __( 'Update Color' ),
		'add_new_item'      => __( 'Add New Color' ),
		'new_item_name'     => __( 'New Color' ),
		'menu_name'         => __( 'Colors' ),
	);
	$color_args = array(
			'labels' => $color_labels,
			'hierarchical' => true,
			'show_in_rest'	=>	true,
			'has_archive' => true,
			'rewrite' => array( 
					'slug' => 'finish-color',
					'with_front' => false
			)
	);
	register_taxonomy( 'finish_colors', 'finish', $color_args );
}
add_action( 'init', 'create_finish_categories', 0 );

// Create Wheel Post Type Tags
// function create_wheel_tags() {
//     $labels = array(
//         'name'              => _x( 'Finishes', 'taxonomy general name' ),
//         'singular_name'     => _x( 'Finish', 'taxonomy singular name' ),
//         'search_items'      => __( 'Search Finishes' ),
//         'all_items'         => __( 'All Finishes' ),
//         'parent_item'       => __( 'Parent Finish' ),
//         'parent_item_colon' => __( 'Parent Finish:' ),
//         'edit_item'         => __( 'Edit Finish' ),
//         'update_item'       => __( 'Update Finish' ),
//         'add_new_item'      => __( 'Add New Finish' ),
//         'new_item_name'     => __( 'New Finish' ),
//         'menu_name'         => __( 'Finishes' ),
//     );
//     $args = array(
//         'labels' => $labels,
// 				'hierarchical' => true,
// 				'show_in_rest'	=>	true,
// 				'has_archive' => true,
// 				'rewrite' => array( 
// 						'slug' => 'finishes'
// 				)
//     );
//     register_taxonomy( 'finishes', 'wheel', $args );
// }
// add_action( 'init', 'create_wheel_tags', 0 );

// Edit Wheel Post Type Messages
function wheel_messages( $messages ) {
    global $post, $post_ID;
    $link = esc_url( get_permalink($post_ID) );
    $messages['wheel'] = array(
        0 => '',
        1 => sprintf( __('Wheel updated. <a href="%s">View wheel</a>'), $link ),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Wheel updated.'),
        5 => isset($_GET['revision']) ? sprintf( __('Wheel restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Wheel published. <a href="%s">View wheel</a>'), $link ),
        7 => __('Wheel saved.'),
        8 => sprintf( __('Wheel submitted. <a target="_blank" href="%s">Preview wheel</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Wheel scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview wheel</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), $link ),
        10 => sprintf( __('Wheel draft updated. <a target="_blank" href="%s">Preview wheel</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );
    return $messages;
}
add_filter( 'post_updated_messages', 'wheel_messages' );

// Edit Wheel Post Type Bulk Messages
function wheel_bulk_messages( $bulk_messages, $bulk_counts ) {
    $bulk_messages['wheel'] = array(
        'updated'   => _n( "%s wheel updated.", "%s wheels updated.", $bulk_counts["updated"] ),
        'locked'    => _n( "%s wheel not updated, somebody is editing it.", "%s wheels not updated, somebody is editing them.", $bulk_counts["locked"] ),
        'deleted'   => _n( "%s wheel permanently deleted.", "%s wheels permanently deleted.", $bulk_counts["deleted"] ),
        'trashed'   => _n( "%s wheel moved to the Trash.", "%s wheels moved to the Trash.", $bulk_counts["trashed"] ),
        'untrashed' => _n( "%s wheel restored from the Trash.", "%s wheels restored from the Trash.", $bulk_counts["untrashed"] ),
    );
    return $bulk_messages;
}
add_filter( 'bulk_post_updated_messages', 'wheel_bulk_messages', 10, 2 );

// Edit Wheel Post Type Help Text
function wheel_help() {
    $screen = get_current_screen();
    if ( 'wheel' != $screen->post_type )
        return;
    $args = [
        'id'      => 'wheel_help',
        'title'   => 'Wheel Help',
        'content' => '<h3>Wheels</h3><p>Create, edit, and publish wheels.</p>',
    ];
    $screen->add_help_tab( $args );
}
add_action('admin_head', 'wheel_help' );

// Create the Categories
function insert_the_parent_categories() {
	wp_insert_term(
		'Savini Forged',
		'wheel_collections',
		array(
		  'description'	=> 'The Savini Forged line is our most refined and meticulously designed products cut from only the best aluminums in a multi-piece construction with (7) different profile configurations and a wide variety of custom finishes.',
		  'slug' 		=> 'savini-forged'
		)
	);
	wp_insert_term(
		'Black di Forza',
		'wheel_collections',
		array(
		  'description'	=> 'The Black di Forza lines are one of our simplest and more essential products for everyday use. Now available in Super Concave profiles and an array of fitments.',
		  'slug' 		=> 'black-di-forza'
		)
	);
	wp_insert_term(
		'SV-F Flow Form',
		'wheel_collections',
		array(
		  'description'	=> 'Savini Wheels is excited to introduce our all-new SV-F collection, which utilizes advanced flow form technology. These wheels are our strongest and lightest wheels to date, thanks to a combination of enhanced engineering and state-of-the-art technology that’s used to create each wheel.',
		  'slug' 		=> 'sv-f'
		)
	);
	wp_insert_term(
		'Savini Diamond',
		'wheel_collections',
		array(
		  'description'	=> 'The Savini Diamond line is our urban-inspired wheel line with each wheel being an art canvas influenced by where we\'re from and where we\'ve been. They\'re built from the highest quality aluminum and feature (4) different profile configurations and a wide variety of custom finishes.',
		  'slug' 		=> 'savini-diamond'
		)
	);
}
add_action( 'init', 'insert_the_parent_categories' );

// function insert_the_children_categories() {
// 	wp_insert_term(
// 		'',
// 		'wheel_category',
// 		array(
// 			'description'	=> '',
// 			'slug' 			=> '',
// 			'parent'		=> ''
// 		)
// 	);
// }
// add_action( 'init', 'insert_the_children_categories' );


// function savini_customizer_sections( $wp_customize ) {
// 	$wp_customize->add_panel( 'frontpage_panel', array(
// 		'title'			=> __( 'Front Page', 'savini' ),
// 		'priority'	=> 30,
// 		)
// 	);

// 	$wp_customize->add_section( 'frontpage_slider_section', array(
// 		'title'			=> __( 'Slider', 'savini' ),
// 		'priority'	=> 30,
// 		'panel'			=> 'frontpage_panel'
// 		)
// 	);

// 	$wp_customize->add_setting( 'slider_setting', array(
// 		'default'			=> 'a'
// 		)
// 	);

// 	$wp_customize->add_control( 'slider_control', array(
// 		'label'			=> 'Text',
// 		'type'			=> 'image',
// 		'section'		=> 'frontpage_slider_section',
// 		'settings'	=> 'slider_setting'
// 		)
// 	);
// }

// add_action( 'customize_register', 'savini_customizer_sections' );

function custom_query_vars_filter($vars) {
	$vars[] .= 'collection';
	$vars[] .= 'config';
	$vars[] .= 'make';
	$vars[] .= 'model';
	$vars[] .= 'wheels';
	$vars[] .= 'finishes';
	$vars[] .= 'display';
	$vars[] .= 'color';
	$vars[] .= 'options';

  return $vars;
}
add_filter( 'query_vars', 'custom_query_vars_filter' );



function collection_archive_order ( $query ) {

	if ( is_admin() || !$query->is_main_query() || !$query->is_tax('wheel_collections') || !$query->has_term('wheel_collections') ) {
		return;
	}

	$query->set( 'post_type', 'wheel' );                 
	// $query->set( 'posts_per_page', '10' );  
	$query->set( 'orderby', 'menu_order' );
	$query->set( 'post_parent', 0 );
	$query->set( 'order', 'ASC' );

}
add_action( 'pre_get_posts', 'collection_archive_order' );



function blog_archive_order ( $query ) {

	if ( is_admin() || ! $query->is_main_query() || $query->is_tax('wheel_collections') || $query->is_archive('wheel') || $query->is_archive('vehicle') || $query->is_archive('finish') ){
		return;
	}

	$query->set( 'order', 'ASC' );
	$query->set( 'posts_per_page', '9' );


}
add_action( 'pre_get_posts', 'blog_archive_order' );



// function savini_forged_config_filters() {

// 	global $wp_query;

// 	if ( is_admin() || ! $query->is_main_query() || ! $query->is_tax('wheel_collections') ) {
// 		return;
// 	}

// 	$tax_query = array();

// 	$config = get_query_var( 'config' );

// 	if( !empty( $config ) ) {
// 		$tax_query[] = array(
// 			'taxonomy' => 'wheel_configurations',
// 			'terms' => $config,
// 			'field' => 'slug',
// 			'operator' => 'IN'
// 		);
// 	}

// 	if ( count( $tax_query ) > 0 ) {
// 		$query->set( 'tax_query', $tax_query );
// 	}

// }
// add_action( 'pre_get_posts', 'savini_forged_config_filters' );



function vehicle_gallery_filters($query) {

	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'vehicle' ) ) {
		return;
	}

	$meta_query = array();
	$tax_query = array();

	$collection = get_query_var( 'collection' );

	if( !empty( $collection ) ){
		$tax_query[] = array(
			'taxonomy' => 'wheel_collections',
			'terms' => $collection,
			'field' => 'slug',
			'operator' => 'IN'
		);
	}

	$make = get_query_var( 'make' );

	if( !empty( $make ) ){
		$tax_query[] = array(
			'taxonomy' => 'vehicle_make',
			'terms' => $make,
			'field' => 'slug',
			'operator' => 'IN'
		);
	}

	$model = get_query_var( 'model' );

	if( !empty( $model ) ){
		$tax_query[] = array(
			'taxonomy' => 'vehicle_model',
			'terms' => $model,
			'field' => 'slug',
			'operator' => 'IN'
		);
	}

	$wheel = get_query_var( 'wheels' );

	if( !empty( $wheel ) ) {

		$wheel_object = get_page_by_title( $wheel, 'OBJECT', 'wheel' );
		$wheel_id = $wheel_object->ID;

		$meta_query[] = array(
			'key' => 'vehicle_wheel',
			'value' => $wheel_id,
			'compare' => '='
		);

		// $query->set( 'meta_key', 'vehicle_wheel' );
		// $query->set( 'meta_value_num', $wheel_id );
		// $query->set( 'meta_compare', 'IN' );
	}

	$finish = get_query_var( 'finishes' );

	if( !empty( $finish ) ) {

		$finish_object = get_page_by_title( $finish, 'OBJECT', 'finish' );
		$finish_id = $finish_object->ID;

		$meta_query[] = array(
			'key' => 'vehicle_finish',
			'value' => $finish_id,
			'compare' => '='
		);

		// $query->set( 'meta_key', 'vehicle_finish' );
		// $query->set( 'meta_value_num', $finish_id );
		// $query->set( 'meta_compare', 'IN' );
	}

	$display = get_query_var( 'display' );

	if( !empty( $display ) && $display == 'videos' ) {

		$meta_query[] = array(
			'key' => 'vehicle_video',
			'value' => '',
			'compare' => '>'
		);

		// $query->set( 'meta_key', 'vehicle_finish' );
		// $query->set( 'meta_value_num', $finish_id );
		// $query->set( 'meta_compare', 'IN' );
	}

	if ( count( $meta_query ) > 1 ) {
		$meta_query['relation'] = 'AND';
		$query->set( 'meta_query', $meta_query );
	}

	if ( count( $meta_query ) > 0 ) {
			$query->set( 'meta_query', $meta_query );
	}

	if ( count( $tax_query ) > 1 ) {
		$tax_query['relation'] = 'AND';
		$query->set( 'tax_query', $tax_query );
	}

	if ( count( $tax_query ) > 0 ) {
		$query->set( 'tax_query', $tax_query );
	}

	$query->set( 'posts_per_page', 6 );

}
add_action( 'pre_get_posts', 'vehicle_gallery_filters' );


function finish_gallery_filters($query) {
	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'finish' ) ){
		return;
	}

	$meta_query = array();
	$tax_query = array();

	$collection = get_query_var( 'collection' );

	if( !empty( $collection ) ){
		$tax_query[] = array(
			'taxonomy' => 'wheel_collections',
			'terms' => $collection,
			'field' => 'slug',
			'operator' => 'IN'
		);
	}

	$options = get_query_var( 'options' );

	if( !empty( $finish ) ){
		$tax_query[] = array(
			'taxonomy' => 'finish_options',
			'terms' => $options,
			'field' => 'slug',
			'operator' => 'IN'
		);
	}

	$color = get_query_var( 'color' );

	if( !empty( $color ) ){
		$tax_query[] = array(
			'taxonomy' => 'finish_colors',
			'terms' => $color,
			'field' => 'slug',
			'operator' => 'IN'
		);
	}

	if ( count( $tax_query ) > 1 ) {
		$tax_query['relation'] = 'AND';
		$query->set( 'tax_query', $tax_query );
	}

	if ( count( $tax_query ) > 0 ) {
		$query->set( 'tax_query', $tax_query );
	}

	$query->set( 'posts_per_page', 6 );

}
add_action( 'pre_get_posts', 'finish_gallery_filters' );


function wheel_gallery_filters($query) {
	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'wheel' ) ){
		return;
	}

	$meta_query = array();
	$tax_query = array();

	$collection = get_query_var( 'collection' );

	if( !empty( $collection ) ){
		$tax_query[] = array(
			'taxonomy' => 'wheel_collections',
			'terms' => $collection,
			'field' => 'slug',
			'operator' => 'IN'
		);
	}

	$configutation = get_query_var( 'config' );

	if( !empty( $configutation ) ){
		$tax_query[] = array(
			'taxonomy' => 'wheel_configurations',
			'terms' => $configutation,
			'field' => 'slug',
			'operator' => 'IN'
		);
	}

	if ( count( $tax_query ) > 1 ) {
		$tax_query['relation'] = 'AND';
		$query->set( 'tax_query', $tax_query );
	}

	if ( count( $tax_query ) > 0 ) {
		$query->set( 'tax_query', $tax_query );
	}

	$query->set( 'posts_per_page', -1 );
}
add_action( 'pre_get_posts', 'wheel_gallery_filters' );


function load_more_scripts() {
	global $wp_query; 
 
	wp_register_script( 'loadmore', get_stylesheet_directory_uri() . '/assets/js/loadmore.js', array('jquery') );
 
	wp_localize_script( 'loadmore', 'loadMoreParams', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode( $wp_query->query_vars ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'load_more_scripts' );


function loadmore_vehicle_ajax_handler() {
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			get_template_part( 'template-parts/content', 'vehicle' );
 
 
		endwhile;
 
	endif;
	die;
}
add_action('wp_ajax_vehicle_load_more', 'loadmore_vehicle_ajax_handler');
add_action('wp_ajax_nopriv_vehicle_load_more', 'loadmore_vehicle_ajax_handler');


function loadmore_finish_ajax_handler() {
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			get_template_part( 'template-parts/content', 'finish' );
 
 
		endwhile;
 
	endif;
	die;
}
add_action('wp_ajax_finish_load_more', 'loadmore_finish_ajax_handler');
add_action('wp_ajax_nopriv_finish_load_more', 'loadmore_finish_ajax_handler');


function loadmore_blog_ajax_handler() {
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';

	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			get_template_part( 'template-parts/content' );

		endwhile;
 
	endif;
	die;
}
add_action('wp_ajax_blog_load_more', 'loadmore_blog_ajax_handler');
add_action('wp_ajax_nopriv_blog_load_more', 'loadmore_blog_ajax_handler');


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Homepage Settings',
		'menu_title'	=> 'Homepage',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact Settings',
		'menu_title'	=> 'Contact',
		'parent_slug'	=> 'theme-general-settings',
	));

}
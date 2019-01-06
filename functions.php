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
function wp_starter_theme_widgets_init() {
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
add_action( 'widgets_init', 'wp_starter_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_starter_theme_scripts() {
	wp_enqueue_style( 'wp-starter-theme-style', get_template_directory_uri() . '/assets/css/main.min.css' );
	// wp_register_script( 'wp-starter-theme-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array( 'jquery' ), NULL, true );

	wp_register_style( 'lightgallery', '//cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.min.css', false, NULL, 'all' );
	wp_register_script( 'lightgallery', '//cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery.min.js', array( 'jquery' ), NULL, true );
	
	wp_register_style( 'plyr', '//cdn.plyr.io/3.4.6/plyr.css', false, NULL, 'all' );
	wp_register_script( 'plyr', '//cdn.plyr.io/3.4.6/plyr.js', array(), NULL, true );

	wp_register_style( 'animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css', false, NULL, 'all' );

	wp_register_script( 'micro-modal', '//cdn.jsdelivr.net/npm/micromodal@0.3.2/dist/micromodal.min.js', array(), NULL, true );

	wp_register_script( 'wow', '//cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js', array(), NULL, true );

	wp_register_script( 'lazy-sizes', '//cdn.jsdelivr.net/npm/lazysizes@4.1.5/lazysizes.min.js', array(), NULL, true );
	wp_register_script( 'lazy-sizes-thumbnail', '//cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-thumbnail.min.js', array(), NULL, true );
	// wp_register_script( 'lazy-sizes-fullscreen', '//cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-fullscreen.js', array(), NULL, true );
	// wp_register_script( 'lazy-sizes-zoom', '//cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-zoom.min.js', array(), NULL, true );
	wp_register_script( 'lazy-sizes-video', '//cdn.jsdelivr.net/npm/lightgallery@1.6.11/modules/lg-video.min.js', array(), NULL, true );

	wp_register_script( 'swup', '//cdn.jsdelivr.net/npm/swup@1.7.17/dist/swup.min.js', array(), NULL, true );

	wp_enqueue_style( 'wp-starter-theme-style' );
	// wp_enqueue_script( 'wp-starter-theme-vendor' );

	wp_enqueue_style( 'lightgallery' );
	wp_enqueue_script( 'lightgallery' );

	wp_enqueue_style( 'plyr' );
	wp_enqueue_script( 'plyr' );

	wp_enqueue_style( 'animate' );

	wp_enqueue_script( 'wow' );

	wp_enqueue_script( 'micro-modal' );

	wp_enqueue_script( 'lazy-sizes' );
	wp_enqueue_script( 'lazy-sizes-thumbnail' );
	// wp_enqueue_script( 'lazy-sizes-fullscreen' );
	// wp_enqueue_script( 'lazy-sizes-zoom' );
	wp_enqueue_script( 'lazy-sizes-video' );


	wp_enqueue_script( 'swup' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_starter_theme_scripts' );

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
            'menu_icon'           => 'dashicons-tickets',
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
    $labels = array(
        'name'              => _x( 'Wheel Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Wheel Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Wheel Categories' ),
        'all_items'         => __( 'All Wheel Categories' ),
        'parent_item'       => __( 'Parent Wheel Category' ),
        'parent_item_colon' => __( 'Parent Wheel Category:' ),
        'edit_item'         => __( 'Edit Wheel Category' ),
        'update_item'       => __( 'Update Wheel Category' ),
        'add_new_item'      => __( 'Add New Wheel Category' ),
        'new_item_name'     => __( 'New Wheel Category' ),
        'menu_name'         => __( 'Wheel Categories' ),
    );
    $args = array(
        'labels' => $labels,
		'hierarchical' => true,
		'show_in_rest'	=>	true
    );
    register_taxonomy( 'wheel_category', 'wheel', $args );
}
add_action( 'init', 'create_wheel_categories', 0 );

// Create Wheel Post Type Tags
function create_wheel_tags() {

    $labels = array(
        'name'              => _x( 'Wheel Tags', 'taxonomy general name' ),
        'singular_name'     => _x( 'Wheel Tag', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Wheel Tags' ),
        'all_items'         => __( 'All Wheel Tags' ),
        'parent_item'       => __( 'Parent Wheel Tag' ),
        'parent_item_colon' => __( 'Parent Wheel Tag:' ),
        'edit_item'         => __( 'Edit Wheel Tag' ),
        'update_item'       => __( 'Update Wheel Tag' ),
        'add_new_item'      => __( 'Add New Wheel Tag' ),
        'new_item_name'     => __( 'New Wheel Tag' ),
        'menu_name'         => __( 'Wheel Tags' ),
    );
    $args = array(
        'labels' => $labels,
		'hierarchical' => true,
		'show_in_rest'	=>	true
    );

    register_taxonomy( 'wheel_tag', 'wheel', $args );
}

add_action( 'init', 'create_wheel_tags', 0 );

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
		'wheel_category',
		array(
		  'description'	=> 'The Savini Forged line is our most refined and meticulously designed products cut from only the best aluminums in a multi-piece construction with (7) different profile configurations and a wide variety of custom finishes.',
		  'slug' 		=> 'savini-forged'
		)
	);
	wp_insert_term(
		'Savini Diamond',
		'wheel_category',
		array(
		  'description'	=> 'The Savini Diamond line is our urban-inspired wheel line with each wheel being an art canvas influenced by where we\'re from and where we\'ve been. They\'re built from the highest quality aluminum and feature (4) different profile configurations and a wide variety of custom finishes.',
		  'slug' 		=> 'savini-diamond'
		)
	);
	wp_insert_term(
		'SV-F Flow Form',
		'wheel_category',
		array(
		  'description'	=> 'Savini Wheels is excited to introduce our all-new SV-F collection, which utilizes advanced flow form technology. These wheels are our strongest and lightest wheels to date, thanks to a combination of enhanced engineering and state-of-the-art technology that’s used to create each wheel.',
		  'slug' 		=> 'sv-f'
		)
	);
	wp_insert_term(
		'Black di Forza - Super Concave',
		'wheel_category',
		array(
		  'description'	=> 'The Black di Forza lines are one of our simplest and more essential products for everyday use. Now available in Super Concave profiles and an array of fitments.',
		  'slug' 		=> 'black-di-forza'
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

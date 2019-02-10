<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WP_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_starter_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
}

// Remove RSD, XMLRPC, WLW, WP Generator, ShortLink, Comment Feed, and Prev/Next article links*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'feed_links', 2 ); 
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
// Remove WP Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
/**
 * Disable toolbar on the frontend of your website
 * for subscribers.
 */
function disable_admin_bar() {
    if( ! current_user_can('edit_posts') )
        add_filter('show_admin_bar', '__return_false');
}
add_action( 'after_setup_theme', 'disable_admin_bar' );
// Hide WP Admin Bar
add_action('admin_print_scripts-profile.php', 'hide_admin_bar_prefs');
function hide_admin_bar_prefs() { ?>
    <style type="text/css">
        .show-admin-bar {display: none;}
    </style>
    <?php
}
add_filter('show_admin_bar', '__return_false');
/**
 * WordPress function for redirecting users on login based on user role
 */
function login_redirect( $url, $request, $user ){
    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if( current_user_can( 'administrator' ) ) {
            $url = admin_url();
        } else {
            $url = $request;
        }
    }
    return $url;
}
add_filter('login_redirect', 'login_redirect', 10, 3 );
/**
 * Redirect back to homepage and not allow access to
 * WP backend for Subscribers.
 */
function restrict_admin_access() {
    if ( ! current_user_can( 'publish_posts' ) && ! wp_doing_ajax() ) {
        wp_redirect( get_bloginfo('url') );
        exit;
    }
}
add_action( 'admin_init', 'restrict_admin_access', 1 );
// Add 'logged-in' & 'logged-out' classes to body
function user_logged_in ($classes) {
    if ( is_user_logged_in() ) {
        return array_merge( $classes, array( 'logged-in' ) );
    } else {
        return array_merge( $classes, array( 'logged-out' ) );
    }
}
add_filter('body_class', 'user_logged_in');


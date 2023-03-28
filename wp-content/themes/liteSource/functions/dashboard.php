<?php

wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/assets/style/admin-style.css' );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Remove Widgets From Dashboard
function remove_dashboard_meta() {
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
    remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Removes the 'At a Glance' widget
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
}
add_action('admin_init', 'remove_dashboard_meta');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Remove Menu Items from dashboard that aren't used.
function post_remove(){
 remove_menu_page( 'appearance.php');
 remove_menu_page( 'themes.php' );
 remove_menu_page( 'edit.php' );
 remove_menu_page( 'edit.php?post_type=page' );
 remove_menu_page( 'plugins.php' );
 remove_menu_page( 'tools.php' );
 remove_menu_page( 'options-general.php' );

}
if(!current_user_can( 'edit_posts' )){
	add_action('admin_menu', 'post_remove');   //adding action for triggering function call
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add new menu link to Dashboard

function wpdocs_register_my_custom_menu_page() {
  if(is_multisite() && is_scs()){
    add_menu_page(
      __( 'Custom Menu Title', 'textdomain' ),
      'LiteSource Network',
      'manage_options',
      network_admin_url() . 'sites.php',
      '',
      'dashicons-admin-network',
      1
    );
  }
	add_menu_page(
		__( 'Custom Menu Title', 'textdomain' ),
		'Visit Site',
		'manage_options',
		home_url(),
		'',
		'dashicons-admin-home',
		1
	);
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Disable Live Editing from WP Editor

add_action( 'customize_preview_init', function() {
  die("The customizer is disabled. Please save and preview your site on the frontend.");
}, 1);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// User Profile Feature

// Remove colour scheme options for logged in user
function admin_color_scheme() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = [];

}
add_action('admin_head', 'admin_color_scheme');

// Remove personal options from the profile page.
add_action( 'admin_head', function () {
  ob_start( function( $subject ) {

      $subject = preg_replace( '#<h[0-9]>'.__("Personal Options").'</h[0-9]>.+?/table>#s', '', $subject, 1 );
      return $subject;
  });
});

function remove_profile_features(){
  // Remove avatars & password feature
  add_filter('option_show_avatars', '__return_false');
  add_filter( 'wp_is_application_passwords_available', '__return_false' );
}
add_action('admin_init', 'remove_profile_features');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add message to CMS Footer

function remove_footer_admin (){
	echo '<span id="footer-thankyou">Made by <a target="_blank" href="http://www.sourcecodestudio.co.uk">SourceCodeStudio</a> | Return to <a target="_blank" href="#">Admin Console</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

remove_action('wp_head', 'wp_generator');

add_filter('contextual_help_list','contextual_help_list_remove');
function contextual_help_list_remove(){
    global $current_screen;
    $current_screen->remove_help_tabs();
}

add_filter('screen_options_show_screen', '__return_false');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add Custom Widget to Dashboard
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('custom_help_widget_3', 'Read Our Knowledge Base', 'custom_dashboard_help_3');
wp_add_dashboard_widget('custom_help_widget_2', 'Theme Support', 'custom_dashboard_help_2');
wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>. For WordPress Tutorials visit: <a href="https://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
}

function custom_dashboard_help_2() {
echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>. For WordPress Tutorials visit: <a href="https://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
}

function custom_dashboard_help_3() {
echo '<p>Access our full range of guides and tutorials on how to update your website - <a href="#">View Knowledge Base</a>.</p>';
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function pw_load_scripts($hook) {
	wp_enqueue_script( 'custom-js', '/wp-content/themes/lms/assets/js/dashboard.js' );
}
add_action('admin_enqueue_scripts', 'pw_load_scripts');
?>

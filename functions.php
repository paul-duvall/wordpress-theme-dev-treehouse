<?php

// Add theme support for menus
add_theme_support( 'menus' );

// This function adds the specific menus to the theme
 function register_theme_menus() {

  register_nav_menus(
      array(
        'primary-menu' => __( 'Primary Menu' )
      )
    );
 }
 add_action( 'init', 'register_theme_menus' );

// The wpt bit is for name spacing - to ensure that the functions have a unique name
// Any unique name spacing can be used for the start of functions to ensure they are unique
function wpt_theme_styles() {

  // Now we can add some style sheets
  // First parameter = a name for this particular stylesheet so we can refer to it later
  // Second parameter is the location
  // Note that get_template_directory_uri() is used to ensure that the uri is always correct and gets us into the main directory for the theme. This then needs to be conncatenated with the location of the stylesheet we are linking to
  wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.css');
  // wp_enqueue_style('normalize_css', get_template_directory_uri() . '/css/normalize.css');
  wp_enqueue_style('googlefont_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic');
  wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}

// This bit loads the style sheets above
add_action('wp_enqueue_scripts', 'wpt_theme_styles');

function wpt_theme_js() {

  // The third parameter is an array containing any dependencies that the script requires
  // wp_enqueue_script will then ensure that those scripts are loaded first
  // The final parameter here is true if the script should be in the footer or false to place it in the header
  wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false);
  wp_enqueue_script('foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true);
  wp_enqueue_script('main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true);
}

add_action( 'wp_enqueue_scripts', 'wpt_theme_js');

?>
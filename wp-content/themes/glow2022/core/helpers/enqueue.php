<?php
//add_theme_support( 'title-tag' );
/**
 * Load front end theme scripts and styles
 */


function theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri(), null, wp_get_theme()->Version);
    wp_enqueue_script('compiled-js', get_template_directory_uri() . '/js/compiled.min.js', null, wp_get_theme()->Version, true);
    //wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', false );
    
}

add_action('wp_enqueue_scripts', 'theme_scripts');

/**
 * Load back end scripts and styles
 */
function admin_scripts()
{
    wp_enqueue_style('admin-style', get_template_directory_uri() . '/assets/admin/admin.css', null, wp_get_theme()->Version);
}

add_action('admin_head', 'admin_scripts');

/**
 * Load IE conditional scripts and styles
 * Add the action within conditional tags in the head.
 */
//function ie_scripts()
//{
   // wp_enqueue_script('html-5-shiv', get_template_directory_uri() . '/components/html5shiv/dist/html5shiv.js');
    //wp_enqueue_script('respond', get_template_directory_uri() . '/components/respond/dest/respond.min.js');
    //wp_enqueue_style('ie-style', get_template_directory_uri() . '/assets/ie/ie.css');
//}


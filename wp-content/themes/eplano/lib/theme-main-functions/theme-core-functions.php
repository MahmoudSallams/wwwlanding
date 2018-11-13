<?php
/**
 * Theme Core Functions
 *
 *************************************************************************/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/************************************************************************
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *************************************************************************/

function eplano_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'eplano_content_width', 640 );
}
add_action( 'after_setup_theme', 'eplano_content_width', 0 );


/************************************************************************
 * Helpers Function
 *************************************************************************/

if ( file_exists(get_template_directory(). '/lib/theme-main-functions/_helpers.php')) {
    require get_template_directory() . '/lib/theme-main-functions/_helpers.php';
}


/************************************************************************
 * Enqueue Theme Assets (Scripts & Styles)
 *************************************************************************/

if ( file_exists(get_template_directory() . '/lib/theme-main-functions/_enqueue-assets.php')) {
    require get_template_directory() . '/lib/theme-main-functions/_enqueue-assets.php';
}



/************************************************************************
 * register  Function
 *************************************************************************/

if ( file_exists(get_template_directory(). '/lib/theme-main-functions/_register.php')) {

    require get_template_directory() . '/lib/theme-main-functions/_register.php';
}
/************************************************************************
 * nav walker function
 *************************************************************************/

if ( file_exists(get_template_directory(). '/lib/theme-main-functions/_nav-walker.php')) {

    require get_template_directory() . '/lib/theme-main-functions/_nav-walker.php';
}

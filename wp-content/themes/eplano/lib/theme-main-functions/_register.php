<?php
/**
 * Created by PhpStorm.
 * User: DCL network
 * Time: 1:28 PM
 */

/************************************************************************
 * Register widget area.
 *************************************************************************/


function eplano_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'eplano' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'eplano' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget', 'eplano' ),
        'id'            => 'csx-footer-sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'eplano' ),
        'before_widget' => '<div id="%1$s" class="col-xs-12 col-sm-6 col-md-3 footer_widget %2$s"><div class="single csi-footer-single">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h2 class="title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'eplano' ),
        'id'            => 'sidebar-shop',
        'description'   => esc_html__( 'Add widgets here.', 'eplano' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'eplano_widgets_init' );



/*-------------------------------------------------------
*           Include the TGM Plugin Activation class
*-------------------------------------------------------*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/************************************************************************
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 *************************************************************************/

if ( ! function_exists( 'eplano_setup' ) ) :

    function eplano_setup() {

        //Text Domain
        load_theme_textdomain( 'eplano', get_template_directory() . '/languages' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );

        add_image_size( 'eplano-thumbnails', 200, 200, true );

        add_image_size( 'eplano-blog-medium', 480, 295, true );

        add_image_size( 'eplano-gallery-medium', 640, 470, true );

        add_image_size( 'eplano-blog', 1140, 565, true );


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'mainmenu' => esc_html__( 'Main Menu', 'eplano' ),
        ) );

        add_theme_support( 'post-formats', array( 'audio','gallery','image','link','quote','video'));
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form'));
        add_theme_support( 'automatic-feed-links' );

        add_editor_style('');

        if ( ! isset( $content_width ) ) {
            $content_width = 660;
        }


        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'eplano_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );


    }
endif;
add_action( 'after_setup_theme', 'eplano_setup' );


/**
 * Enqueue scripts and styles.
 */
function eplano_scripts() {
    global $eplano_options;
    $eplano_opt = new LgxFrameworkOpt();

    // LOAD FONTS
    if(!isset($eplano_options['body-font'])) {
        wp_enqueue_style('eplano-fonts', eplano_fonts_url(), array(), '1.0.0');
    }


    //LOAD Vendor STYLE SHEET
    wp_enqueue_style( 'eplano_bsstyle', EPLANO_URI . 'assets/vendor/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'eplano_font-aw', EPLANO_URI . 'assets/vendor/font-awesome/css/font-awesome.min.css' );

    //LOAD Main STYLE SHEET
    wp_enqueue_style( 'eplano-main-style', EPLANO_URI . 'assets/css/main-style.min.css', array(), '1.1.4');
    wp_enqueue_style( 'eplano-style', get_stylesheet_uri() );


    //LOAD SCRIPT
    wp_enqueue_script( 'theme-vendor', EPLANO_SCRIPT . 'theme-vendor.min.js', array(), '1.0', false );

    wp_enqueue_script( 'eplano_easing', EPLANO_URI . 'assets/js/jquery.easing.min.js', array(), '1.0', true );

    wp_enqueue_script( 'eplano_smoothscroll', EPLANO_URI . 'assets/js/jquery.smooth-scroll.min.js', array(), '1.0', true );

    wp_enqueue_script( 'eplano_slider', EPLANO_URI . 'assets/js/slider.js', array(), '1.0', true );

    if ( is_rtl() ) {
        wp_enqueue_script( 'eplano_rtl', EPLANO_URI . 'assets/js/rtl.js', array(), '1.0', true );
    }
    wp_enqueue_script( 'eplano-script', EPLANO_SCRIPT . 'csi-theme-main.js', array('theme-vendor'), '1.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Custom Style  Start
    $eplano_custom_css = "";

    // Logo Settings
    if(!empty($eplano_options['logo-width'])){
        $eplano_logo_wd = $eplano_options['logo-width'];
        $eplano_custom_css .= "
            .csi-header .csi-navbar .csi-logo a img{
                width:{$eplano_logo_wd};
            }
        ";
    }

    // Page Banner background
    if(isset($eplano_options['opt_page_banner_bg_type'])) {
        $header_banner_style = 'background:' . $eplano_options['csx_page_banner_color'] . ';';

        if ($eplano_options['opt_page_banner_bg_type']) {
            $header_banner_style = 'background: url(' . $eplano_opt->eplano_page_banner() . ')center bottom / cover no-repeat;';
        }

        $eplano_custom_css .= ' .csi-banner-wrapper{'. $header_banner_style . '}';
    }



    // Footer background
    if(isset($eplano_options['pre_loader_en']) && $eplano_options['pre_loader_en']) {

        $eplano_custom_css .= '#vcx-preloader {
                            background:url('.$eplano_opt->eplano_pre_loader_img().') no-repeat #FFFFFF 50%;
                            -moz-background-size: '.$eplano_options['pre_loader_width']. ' '.$eplano_options['pre_loader_width'].';
                            -o-background-size: '.$eplano_options['pre_loader_width']. ' '.$eplano_options['pre_loader_width'].';
                            -webkit-background-size: '.$eplano_options['pre_loader_width']. ' '.$eplano_options['pre_loader_width'].';
                            background-size: '.$eplano_options['pre_loader_width']. ' '.$eplano_options['pre_loader_width'].';
                           
        }';
    }


    // Pre Loader

    if(isset($eplano_options['opt_footer_bg_type'])) {
        $footer_banner_style = 'background:' . $eplano_options['csx_footer_bg_color'] . ';';

        if ($eplano_options['opt_footer_bg_type']) {
            $footer_banner_style = 'background: url(' . $eplano_opt->eplano_footer_bg_img() . ') bottom center no-repeat;';
        }

        $eplano_adv_css = (isset($eplano_options['custom_css'])) ? $eplano_options['custom_css'] : '' ;
        $eplano_custom_css .= "{$eplano_adv_css}";

        $eplano_custom_css .= ' .csi-footer {'. $footer_banner_style . '}';
    }

    wp_add_inline_style( 'eplano-style', $eplano_custom_css );






    $eplano_adv_js = 'jQuery(window).load(function() {
            jQuery("#vcx-preloader").delay(250).fadeOut("slow");
            setTimeout(vcx_remove_preloader, 2000);
            function vcx_remove_preloader() {
                jQuery("#vcx-preloader").remove();
            }
        });';

    $eplano_custom_js = (isset($eplano_options['pre_loader_en']) && $eplano_options['pre_loader_en']==1) ? $eplano_adv_js : '' ;


    //
   // $eplano_custom_js .= "{$eplano_adv_js}";

    wp_add_inline_script( 'eplano-script', $eplano_custom_js );

}
add_action( 'wp_enqueue_scripts', 'eplano_scripts' );


/************************************************************************
 * // Remove the Open Sans From Frontend & Backend
 *************************************************************************/

if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
    // Uncomment below to remove from admin
    // add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

/************************************************************************
 * Default Fonts Enqueue
 *************************************************************************/


if (!function_exists('eplano_fonts_url'))  {
    function eplano_fonts_url() {

        $eplano_font = '';

        $font_families = array();
        $font_families[] = 'Oswald:300,400,500,600,700';
        $font_families[] = 'Poppins:300,400,400i,600,700,900';

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            //'subset' => urlencode( 'latin,latin-ext' )
        );

        $eplano_font = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

        return esc_url_raw( $eplano_font );
    }
}


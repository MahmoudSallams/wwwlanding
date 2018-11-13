<?php
/*
*  Theme Core Plugin By HttpCoder
*
* Plugin Name: VCX Theme Core
* Plugin URI: http://httpcoder.com/vcx-theme-core
* Author: HttpCoder
* Author URI: http://httpcoder.com
* License - GNU/GPL V2 or Later
* Description: VCX Theme Core is is Core required plugin for ePlano.
* Version: 2.4.0
*************************************************************************/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/************************************************************************
 * vcx Theme core Plugin Language
 *************************************************************************/


function vcx_theme_core_language_load(){
    $plugin_dir = basename(dirname(__FILE__))."/languages/";
    load_plugin_textdomain( 'vcx-theme-core', false, $plugin_dir );
}
add_action( 'init', 'vcx_theme_core_language_load' );


/************************************************************************
 * Important Helpers Function
 *************************************************************************/
include_once( 'helpers/helpers.php' );


/*****************************************
 *  Post Type Declaration
 *****************************************/

include_once( 'post-type/post-speaker.php');
include_once( 'post-type/post-schedule.php');
include_once( 'post-type/post-pricing.php');
include_once( 'post-type/post-testimonial.php');
include_once( 'post-type/post-gallery.php');


/************************************************************************
 * Metabox Include & Configuration
 *************************************************************************/

include_once( 'meta-data/metabox-config.php' );


/************************************************************************
 * Register Global Shortcode
 *************************************************************************/

//Add Here .....................



/************************************************************************
 * Register Theme Shortcode
 *************************************************************************/


include_once( 'vc-addons/e_home-banner.php' );
include_once( 'vc-addons/e_home-classic.php' );
include_once( 'vc-addons/e_home-registration.php' );
include_once( 'vc-addons/e_about.php');
include_once( 'vc-addons/e_title.php');
include_once( 'vc-addons/e_travel-info.php');
include_once( 'vc-addons/e_speaker.php' );
include_once( 'vc-addons/e_sponsors.php');
include_once( 'vc-addons/e_get-ticket.php' );
include_once( 'vc-addons/e_latest-news.php' );
include_once( 'vc-addons/e_video-embed.php' );
include_once( 'vc-addons/e_photo-gallery.php' );
include_once( 'vc-addons/e_schedule.php' );
include_once( 'vc-addons/e_countdown.php' );
include_once( 'vc-addons/e_milestone.php' );
include_once( 'vc-addons/brand-btn.php' );
include_once( 'vc-addons/address-box.php' );
include_once( 'vc-addons/e_particle-section.php' );
include_once( 'vc-addons/e_testimonial.php' );
include_once( 'vc-addons/e_logoslider.php' );
include_once( 'vc-addons/e_number_up.php' );



/************************************************************************
 * Important Helpers Function
 *************************************************************************/
include_once( 'one-click-demo/init-one.php' );



/************************************************************************
 * Enqueue Assets
 *************************************************************************/

include_once( 'assets/assets.php');



/**
 *  Initialising Visual shortcode editor
 */


if (class_exists('WPBakeryVisualComposerAbstract')) {

	function vcx_theme_core_requireVcExtend(){
		include_once( 'extend_vc/extend_vc.php');
	}
	add_action('init', 'vcx_theme_core_requireVcExtend',2);
}


/************************************************************************
 * Custom Color
 *************************************************************************/

include_once( 'assets/custom-color.php' );
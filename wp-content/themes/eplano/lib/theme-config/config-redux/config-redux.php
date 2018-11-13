<?php
/**
 * Created by PhpStorm.
 * User: Vaskar Jewel
 * Date: 28-Dec-17
 * Time: 7:53 PM
 */


//Adding custom config to redux framework
if ( file_exists(get_template_directory() . '/lib/theme-config/config-redux/_custom-config.php')){
    require get_template_directory() . '/lib/theme-config/config-redux/_custom-config.php';
}

//Adding custom config to redux framework
if ( file_exists(get_template_directory() . '/lib/theme-config/config-redux/_config-helper.php')){
    require_once get_template_directory() . '/lib/theme-config/config-redux/_config-helper.php';
}


/************************************************************************
 * Enqueue Redux Styles (Over right Redux Core Css )
 *************************************************************************/

function eplano_addPanelCSS() {
    wp_register_style( 'redux-custom-css', get_stylesheet_directory_uri() .'/lib/theme-config/config-redux/redux-custom.css', array( 'redux-admin-css' ), time(),'all');
    wp_enqueue_style('redux-custom-css');
}
add_action( 'admin_head', 'eplano_addPanelCSS' );

<?php
/**
 * File: csi-theme-config.php
 * Purpose: Global Theme Config And Constant
 */


/************************************************************************
 * Include TGM, REDUX, CMB2 & AUTHOR BOX
 *************************************************************************/

// Adding for External Plugins Requirement
if ( file_exists(get_template_directory() . '/lib/theme-config/config-tgm/tgm-config.php')) {

    require_once get_template_directory() . '/lib/theme-config/config-tgm/tgm-config.php';
}


//Adding Redux Framework

global $eplano_options;

if ( file_exists(get_template_directory() . '/lib/theme-config/config-redux/config-redux.php')){
    require_once get_template_directory() . '/lib/theme-config/config-redux/config-redux.php';
}
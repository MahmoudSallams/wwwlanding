<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Logo Slider", 'vcx-theme-core'),
        "base" => "logo-slider",
        "class" => "",
        "description" => esc_html__("Display Logo Slider", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

        )

    ));
}
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_brand_btn', 'vcx_brand_btn_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_brand_btn_function($atts) {
    extract(shortcode_atts(array(
        'text' 	=>	'Brand Button', // Any Text
        'size'=>	'btn-df', // small or large
        'style'=>	'csi-btn-brand', // small or large
        'url' 	=>	'#', //url
        'target'=>	'_blank', // )_blank, _self

    ), $atts));

    $output = '<div class="csi-brand-btn-area text-center">
                    <a class="csi-btn '.esc_attr($size).'  '.esc_attr($style).'" href="'.$url.'" target="'.$target.'"><span>'.$text.'</span></a>
                </div>';
    return $output;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Brand Button", 'vcx-theme-core'),
        "base" => "vcx_brand_btn",
        "class" => "",
        "description" => esc_html__("Add Brand Button", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Text", "vcx-theme-core"),
                "param_name" 	=> "text",
                "value" 		=> "Brand Button",
                "admin_label"   => true,
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("URL", "vcx-theme-core"),
                "param_name" 	=> "url",
                "value" 		=> "#",
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Size", 'vcx-theme-core'),
                "param_name" 	=> "size",
                "value" 		=> array('Default'=>'btn-df','Large'=>'csi-btn-lg'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Style", 'vcx-theme-core'),
                "param_name" 	=> "style",
                "value" 		=> array('Brand'=>'csi-btn-brand','Brand Two'=>'csi-btn-brand2', 'Brand Three'=>'csi-btn-brand3', 'Vivid'=>'csi-btn-highlight'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Target Type", 'vcx-theme-core'),
                "param_name" 	=> "target",
                "value" 		=> array('New Window'=>'_blank','Current Window'=>'_self'),
            )
        )

    ));
}
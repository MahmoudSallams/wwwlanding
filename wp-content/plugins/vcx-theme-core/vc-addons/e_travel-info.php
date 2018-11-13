<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_travel_info', 'vcx_travel_info_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_travel_info_function($atts, $content = null ) {

    extract(shortcode_atts(array(
        'info_title' 	=>	'',
        'travel_icon' 	=>	'fa-map-signs',
        'is_container' => true,
        'text_color' => 'default',
    ), $atts));


    $output = '<div class="csi-single-service csi-single-service-'.esc_attr($text_color).'">
                        <span class="icon"><i class="fa '.$travel_icon.'" aria-hidden="true"></i></span>
                        <div class="text-area">
                            <h2 class="title">'.$info_title.'</h2>
                            <p>'.$content.'</p>                    
                        </div>
                    </div>';


    return $output;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Location Info", 'vcx-theme-core'),
        "base" => "vcx_travel_info",
        "class" => "",
        "description" => esc_html__("Display all of the Travel Information", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Title", "vcx-theme-core"),
                "param_name" 	=> "info_title",
                "value" 		=> "",
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Icon Name", "vcx-theme-core"),
                'descriptiopn'  => esc_html__('Add Font Awesome Icon Class name. e.g. fa-map-signs', 'vcx-theme-core'),
                "param_name" 	=> "travel_icon",
                "value" 		=> "fa-map-signs",
            ),

            array(
                "type"       => "textarea_html",
                "holder"        => "div",
                "heading" 		=> esc_html__("Content", "vcx-theme-core"),
                "param_name" 	=> "content",
                "value" 		=> "",
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Text Color", 'vcx-theme-core'),
                "param_name" 	=> "text_color",
                "value" 		=> array('Default'=>'default','White'=>'white', 'Black'=>'black'),
            ),


        )

    ));
}
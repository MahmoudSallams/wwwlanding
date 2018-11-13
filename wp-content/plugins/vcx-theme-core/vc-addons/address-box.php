<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


add_shortcode( 'vcx_address_box', 'vcx_address_box_function');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */


function vcx_address_box_function($atts)
{
    extract(shortcode_atts(array(
        'vcx_address_title'            => 'Location',
        'vcx_address_icon'            => 'fa fa-map-marker',
        'vcx_address_content_first'   => '123 Grand Tower - 45 Street Name.',
        'vcx_address_content_second'  => 'City Name, United State.',

    ), $atts));


    $output = '<div class="csi-box" >
                    <h3 class="title">'.$vcx_address_title.'</h3>
                <span class="csi-icon"><i class="'.$vcx_address_icon.'"></i></span>
                <div class="address">
                    <p>'.$vcx_address_content_first.'</p>
                    <p>'.$vcx_address_content_second.'</p>
                </div>
            </div>';


    return $output;
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Address Box", 'vcx-theme-core'),
        "base" => "vcx_address_box",
        "class" => "",
        "description" => esc_html__("Display Address Box.", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(


            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Title", "vcx-theme-core"),
                "param_name" 	=> "vcx_address_title",
                "value" 		=> 'Location',
            ),


            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Box Icon", "vcx-theme-core"),
                "description" 	=> esc_html__("Please add font awesome icon, e.g : fa fa-headphones", "vcx-theme-core"),
                "param_name" 	=> "vcx_address_icon",
                "value" 		=> 'fa fa-map-marker',
                "admin_label"   => true,
            ),


            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Content First Line", "vcx-theme-core"),
                "param_name" 	=> "vcx_address_content_first",
                "value" 		=> '123 Grand Tower - 45 Street Name.',
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Content Second Line", "vcx-theme-core"),
                "param_name" 	=> "vcx_address_content_second",
                "value" 		=> 'City Name, United State.',
            ),


        )
    ));
}
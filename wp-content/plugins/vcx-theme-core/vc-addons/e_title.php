<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_food_title', 'vcx_food_title_function');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */

function vcx_food_title_function($atts)
{
    extract(shortcode_atts(array(
        'title'         => 'Section Title', // Section Title
        'sub_title'  =>  'Please add your section Sub title Here.', // Section Sub Title
        'color'      => '',
        'title_type'   => '',
    ), $atts));

    $output = '<div class="csi-heading '.$color.' '.$title_type.'" >
                    <h2 class="heading">'.$title.'</h2>
                    <h3 class="subheading">'.$sub_title.'</h3>              
              </div>';

    return $output;
}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Section Title", 'vcx-theme-core'),
        "base" => "vcx_food_title",
        "class" => "",
        "description" => esc_html__("Display Section Title", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Section Title", "vcx-theme-core"),
                "param_name" 	=> "title",
                "value" 		=> "Section Title",
                "admin_label"   => true,
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Post Title", "vcx-theme-core"),
                "param_name" 	=> "sub_title",
                "value" 		=> "Please add your section Post title Here.",
            ),


            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Title Type", 'vcx-theme-core'),
                "param_name" 	=> "color",
                "value" 		=> array('Default'=>'','White'=>'csi-heading-white'),
            )
        )

    ));
}
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


add_shortcode( 'vcx_number_up', 'vcx_number_up_unction');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */


function vcx_number_up_unction($atts)
{
    extract(shortcode_atts(array(
        'counter_number'    => '29',
        'counter_post_text' => 'November',

    ), $atts));





    $counter_html =(!empty ($counter_number)) ? '<h3 class="date"><b class="lgx-counter">'.intval($counter_number).'</b> <span>'.$counter_post_text.'</span></h3>' : '' ;

    $output = '<div id="csi-number-up"  class="csi-number-up">
                    '.$counter_html.'
                </div>';

    return $output;
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Single Counter Up", 'vcx-theme-core'),
        "base" => "vcx_number_up",
        "class" => "",
        "description" => esc_html__("Display Single Counter Up.", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Counter Up Number", "vcx-theme-core"),
                "param_name" 	=> "counter_number",
                "value" 		=> '29',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Counter Post Text", "vcx-theme-core"),
                "param_name" 	=> "counter_post_text",
                "value" 		=> 'November',
            ),


        )
    ));
}


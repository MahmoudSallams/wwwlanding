<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Counter Up", 'vcx-theme-core'),
        "base" => "lgx-counter",
        "class" => "",
        "description" => esc_html__("Display all Milestone", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Items Per Row ", 'vcx-theme-core'),
                "param_name" 	=> "row_item",
                "value" 		=> array('One'=>'1','Two'=>'2','Three'=>'3', 'Four'=>'4', 'Six'=>'6', 'Twelve' =>'12'),
            ),

            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__("Number Color", "vcx-theme-core"),
                "param_name"    => "number_color",
                "value"         => "#ffffff",
            ),

            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__("Text Color", "vcx-theme-core"),
                "param_name"    => "text_color",
                "value"         => "#ffffff",
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order", 'vcx-theme-core'),
                "param_name" 	=> "order",
                "value" 		=> array('DESC'=>'DESC','ASC'=>'ASC'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("OderBy", 'vcx-theme-core'),
                "param_name" 	=> "order_by",
                "value" 		=> array('Date'=>'date','Title'=>'title','Modified'=>'modified','Author'=>'author','Random'=>'rand'),
            ),


        )

    ));
}
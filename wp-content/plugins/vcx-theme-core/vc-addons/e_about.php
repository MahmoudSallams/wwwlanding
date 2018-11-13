<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_event_about', 'vcx_event_about_function');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */

function vcx_event_about_function($atts)
{

    extract(shortcode_atts(array(
        'about_title'  => 'UI CONFERENCE 2030', // Section Lead
        'lead_text'  => 'Why User Interface Conference ?', // Section Lead
        'about_page_content'  => '', // Section Lead
        'buy_url'    => '', // Buy Button URL
        'buy_urlr'    => '', // Buy Button URL
        'buy_text'    => 'Register Now', // Buy Button URL
        'buy_textr'    => 'More About', // Buy Button URL
        'text_align'    => '', // Buy Button URL
        'vcx_chris_en'		=> '',
    ), $atts));

    $vcx_chris_attr = ($vcx_chris_en == 'yes') ? 'csi-about-christmas' : '';

    $lead_text_one = (!empty($about_title) ? '<h2 class="heading">'.$about_title.'</h2>' : '');
    $lead_text_html = (!empty($lead_text) ? '<h3 class="subheading ">'.$lead_text.'</h3>' : '');

    $left_btn_html = (!empty($buy_url) ? '<a class="csi-btn csi-btn-brand" href="'.$buy_url.'"><span>'.$buy_text.'</span></a>' : '');
    $right_btn_html = (!empty($buy_urlr) ? '<a class="csi-btn csi-btn-highlight" href="'.$buy_urlr.'"><span>'.$buy_textr.'</span></a>' : '');

    $align_class =( ($text_align == 'left') ? 'csi-about-content-area-left' : '');

    $output = '<div class="csi-about '.$vcx_chris_attr.'">
                    <div class="csi-about-content-area '.$align_class.'">
                            <div class="csi-heading">
                                '.$lead_text_one.'
                                '.$lead_text_html.'
                            </div>
                            <div class="csi-about-content">
                                <p class="text">'.$about_page_content.'</p>
                                <div class="btn-area">
                                    '.$left_btn_html.'
                                    '.$right_btn_html.'
                                </div>
                            </div>
                            </div>
                        </div>';

    return $output;
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("About Section", 'vcx-theme-core'),
        "base" => "vcx_event_about",
        "class" => "",
        "description" => esc_html__("Display About Section Content.", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(


            array(
                "type"          => "textfield",
                "heading"       => esc_html__("About Title", "vcx-theme-core"),
                "param_name"    => "about_title",
                "value"         => "UI CONFERENCE 2030",
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Section Post Title", "vcx-theme-core"),
                "param_name" 	=> "lead_text",
                "value" 		=> "Why User Interface Conference ?",
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__("Section Short Content", 'vcx-theme-core'),
                "param_name"    => "about_page_content",
                "description" => esc_html__("Write section short description here.", 'vcx-theme-core'),
                "value"         => '',
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Left Button URL", "vcx-theme-core"),
                "param_name"    => "buy_url",
                "value"         => "",
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Left Button Text", "vcx-theme-core"),
                "param_name"    => "buy_text",
                "value"         => "Resister Now",
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Right Button URL", "vcx-theme-core"),
                "param_name"    => "buy_urlr",
                "value"         => "",
            ),
            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Right Button Text", "vcx-theme-core"),
                "param_name" 	=> "buy_textr",
                "value" 		=> "More About",
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Text Align", 'vcx-theme-core'),
                "param_name" 	=> "text_align",
                "value" 		=> array('Center'=>'','Left'=>'left'),
            ),

            array(
                "type"          => "checkbox",
                "weight"        => 10,
                "heading"       => esc_html__( "Enabled Christmas Style", "vcx-theme-core" ),
                "description"   => esc_html__("Christmas Style for Christmas Layout", "vcx-theme-core"),
                "value"         => array('Yes' => 'yes' ),
                "param_name"    => "vcx_chris_en"
            ),
        )

    ));
}
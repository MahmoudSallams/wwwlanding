<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


add_shortcode( 'vcx_header_classic', 'vcx_header_classic_function');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */


function vcx_header_classic_function($atts)
{
    extract(shortcode_atts(array(
        'vcx_pre_title'     => 'Very Happy',
        'vcx_title'         => 'Conference ( 2020 )',
        'vcx_title_second'  => '( 2020 ) Biggest Symposium | { Freelancers } Conference.',
        'vcx_post_title'    => '( 27-30 ) October 2020, United State',
        'vcx_count_date'    => '2019/12/15',
        'vcx_particle_en'   => '',
        'count_type'        => 'none',
        'vcx_text_day'      => 'Days',
        'vcx_text_hour'     =>'Hours',
        'vcx_text_min'      => 'Minutes',
        'vcx_text_sec'      => 'Seconds',
        'counter_number'    => '29',
        'counter_post_text' => 'November',
        'count_align'       => 'left',
        'vcx_typed_en'      => '',
        'banner_height'     => 'df',
    ), $atts));


    //Show Particle Effect
    $vcx_banner_attr = ($vcx_particle_en == 'yes') ? 'particle' : 'classic';


    // For Count down

    $count_type_class = esc_attr($count_type);
    $count_align_class = esc_attr($count_align);

    $countdown = '<div class="csi-countdown-area csi-countdown-area-'.$count_type_class.'_'.$count_align_class.'">
                    <div class="csi-countdown-area-inner">
                        <div id="csi-countdown" class="csi-countdown csi-countdowntop" data-vday="'.$vcx_text_day.'" data-vhour="'.$vcx_text_hour.'" data-vmin="'.$vcx_text_min.'" data-vsec="'.$vcx_text_sec.'" data-date="'. esc_html($vcx_count_date) .'"></div>
                    </div>
                </div>';
    $countdown_html = ( ($count_type != 'none') ? $countdown : '');


    $counter_html =(!empty ($counter_number)) ? '<h3 class="date"><b class="lgx-counter">'.intval($counter_number).'</b> <span>'.$counter_post_text.'</span></h3>' : '' ;
    $pre_title_html =(!empty ($vcx_pre_title)) ? '<h3 class="csi-subtitle">'.$vcx_pre_title.'</h3>' : '' ;
    $title_html =(!empty ($vcx_title)) ? '<h2 class="csi-title">'.vcx_spilt_classic_heading($vcx_title) .'</h2>' : '' ;
    $title_two_html =(!empty ($vcx_title_second)) ? '<h2 class="csi-title2">'.vcx_spilt_classic_heading($vcx_title_second).'</h2>' : '' ;
    $post_title_html =(!empty ($vcx_post_title)) ? '<p class="date">'.vcx_spilt_classic_heading($vcx_post_title).'</p>' : '' ;




    $banner_text = '<div class="csi-banner-content">                  
                    <div class="csi-banner-info-area">
                        <div class="csi-banner-info-circle">
                            <div class="info-circle-inner">
                            '.$counter_html.'
                            </div>
                        </div>
                        <div class="csi-banner-info">
                            '.$pre_title_html.'
                            '.$title_html.'
                            '.$title_two_html.'
                            '.$post_title_html.'
                            '. (!empty($vcx_count_date) ? $countdown_html  : '') .'
                        </div>
                    </div>
                </div>';

    $output = '<section>
                <div id="csi-banner-'.esc_attr($vcx_banner_attr).'"  class="csi-banner csi-classic-header csi-banner-'.esc_attr($vcx_banner_attr).'">
                    <div class="csi-banner-style">
                         <div class="csi-inner-'.$banner_height.'">
                            <div class="container">
                               '.$banner_text.'
                            </div>
                        </div>
                    </div>
                </div>
            </section>';

    return $output;
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Header Classic", 'vcx-theme-core'),
        "base" => "vcx_header_classic",
        "class" => "",
        "description" => esc_html__("Display Classic Banner.", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Banner Height", 'vcx-theme-core'),
                "param_name" 	=> "banner_height",
                "value" 		=> array('Default'=>'df','Medium'=>'md' , 'Small'=>'sm'),
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Pre Title", "vcx-theme-core"),
                "param_name" 	=> "vcx_pre_title",
                    "value" 	=> 'Very Happy',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Title", "vcx-theme-core"),
                "param_name" 	=> "vcx_title",
                "value" 		=> 'Conference ( 2020 )',
                "description"   => esc_html__("Important: To get theme classic style in title please follow this format: Conference ( 2020 )", "vcx-theme-core"),
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Second Title", "vcx-theme-core"),
                "param_name" 	=> "vcx_title_second",
                "value" 		=> '( 2020 ) Biggest Symposium | { Freelancers } Conference.',
                "description"   => esc_html__("Important: To get theme classic style in title please follow this format: ( 2020 ) Biggest Symposium | { Freelancers } Conference. ", "vcx-theme-core"),

            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Post Title", "vcx-theme-core"),
                "param_name" 	=> "vcx_post_title",
                "value" 		=> '( 27-30 ) October 2020, United State ',
                "description"   => esc_html__("Important: To get theme classic style in title please follow this format: ( 27-30 ) October 2020, United State ", "vcx-theme-core"),

            ),

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

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Countdown Type", 'vcx-theme-core'),
                "param_name" 	=> "count_type",
                "value" 		=> array('None'=>'none','Simple'=>'simple','Square'=>'squre', 'Circular'=>'circle'),
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Countdown Date", "vcx-theme-core"),
                "description"   => esc_html__("Important: Date Format Must be: Y/m/d . For Example: 2019/10/5", "vcx-theme-core"),
                "param_name" 	=> "vcx_count_date",
                "value" 		=> '2019/12/15',
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Countdown Align", 'vcx-theme-core'),
                "param_name" 	=> "count_align",
                "value" 		=> array('Left'=>'left','Center'=>'center', 'Right'=>'right'),
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Day Text", "vcx-theme-core"),
                "param_name" 	=> "vcx_text_day",
                "value" 		=> 'Days',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Hour Text", "vcx-theme-core"),
                "param_name" 	=> "vcx_text_hour",
                "value" 		=> 'Hours',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Minute Text", "vcx-theme-core"),
                "param_name" 	=> "vcx_text_min",
                "value" 		=> 'Minutes',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Seconds Text", "vcx-theme-core"),
                "param_name" 	=> "vcx_text_sec",
                "value" 		=> 'Seconds',
            ),

            array(
                "type"          => "checkbox",
                "weight"        => 10,
                "heading"       => esc_html__( "Enabled Particle Effect", "vcx-theme-core" ),
                "value"         => array('Yes'   => 'yes' ),
                "param_name"    => "vcx_particle_en"
            )

        )
    ));
}


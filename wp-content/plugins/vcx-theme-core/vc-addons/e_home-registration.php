<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


add_shortcode( 'vcx_home_registration', 'vcx_home_registration_function');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */

//var_dump(class_exists('WPBakeryVisualComposerAbstract'));

function vcx_home_registration_function($atts)
{
    extract(shortcode_atts(array(
        'banner_align'              => 'left',
        'vcx_form_id'               => '',
        'vcx_pre_title'             => 'Conference On',
        'vcx_title'                 => 'Conference ( 2020 )',
        'vcx_title_second'          => '( 2020 ) Biggest Symposium | { Freelancers } Conference.',
        'vcx_post_title'            => '( 27-30 ) October 2020, United State',
        'vcx_particle_en'           => '',
        'vcx_typed_en'              => '',
        'vcx_snow_en'               => '',
        'vcx_count_date'            => '2019/12/15',
        'vcx_text_day'              => 'Days',
        'vcx_text_hour'             =>'Hours',
        'vcx_text_min'              => 'Minutes',
        'vcx_text_sec'              => 'Seconds',
        'count_align'               => 'left',
        'count_type'                => 'none',
        'vcx_btn_text1'             => 'Buy Ticket Now',
        'vcx_btn_url1'              => '',
        'vcx_btn_text2'             => 'Buy Ticket Now',
        'vcx_btn_url2'              => '',
        'vcx_btn_text3'             => 'Buy Ticket Now',
        'vcx_btn_url3'              => '',
        'vcx_btn_text4'             => 'Buy Ticket Now',
        'vcx_btn_url4'              => '',
        'banner_height'             => 'df',

    ), $atts));


    //$vcx_typed_en = false;
    $vcx_title_view = ($vcx_typed_en != 'yes') ? vcx_spilt_classic_heading($vcx_title) : '';
    $typed_data     = ($vcx_typed_en == 'yes') ? 'data-title="'.$vcx_title.'"' : '';




    //Show Snow Fall Effect
    $vcx_snow_element = ($vcx_snow_en == 'yes') ? 'id="vcxSnowfall"' : '';


    //Show Particle Effect
    $vcx_banner_attr = ($vcx_particle_en == 'yes') ? 'particle' : 'registration';


    //Button
    $button_html1= (!empty($vcx_btn_url1)) ? '<a class="csi-btn csi-btn-lg" href="'.esc_url($vcx_btn_url1).'"><span>'.esc_html($vcx_btn_text1).'</span></a>' : '';
    $button_html2= (!empty($vcx_btn_url2)) ? '<a class="csi-btn csi-btn-lg csi-btn-brand2" href="'.esc_url($vcx_btn_url2).'"><span>'.esc_html($vcx_btn_text2).'</span></a>' : '';
    $button_html3= (!empty($vcx_btn_url3)) ? '<a class="csi-btn csi-btn-lg csi-btn-brand3" href="'.esc_url($vcx_btn_url3).'"><span>'.esc_html($vcx_btn_text3).'</span></a>' : '';
    $button_html4= (!empty($vcx_btn_url4)) ? '<a class="csi-btn csi-btn-lg csi-btn-highlight" href="'.esc_url($vcx_btn_url4).'"><span>'.esc_html($vcx_btn_text4).'</span></a>' : '';

    $button_area_html= '<div class="action-area">
                        '.$button_html1.'
                        '.$button_html2.'
                        '.$button_html3.'
                        '.$button_html4.'
                        </div>';

    $banner_align_class = esc_attr($banner_align);

    // For Count down
    $count_type_class = esc_attr($count_type);
    $count_align_class = esc_attr($count_align);

    $countdown = '<div class="csi-countdown-area csi-countdown-area-'.$count_type_class.'_'.$count_align_class.'">
                    <div class="csi-countdown-area-inner">
                        <div id="csi-countdown" class="csi-countdown csi-countdowntop" data-vday="'.$vcx_text_day.'" data-vhour="'.$vcx_text_hour.'" data-vmin="'.$vcx_text_min.'" data-vsec="'.$vcx_text_sec.'" data-date="'. esc_html($vcx_count_date) .'"></div>
                    </div>
                </div>';

    $countdown_html = ( ($count_type != 'none') ? $countdown : '');

    $pre_title_html =(!empty ($vcx_pre_title)) ? '<h3 class="csi-subtitle">'.$vcx_pre_title.'</h3>' : '' ;
    $title_html =(!empty ($vcx_title)) ? '<h2 class="csi-title"><span class="csi-typed-string"  '.$typed_data.' >'.$vcx_title_view.'</span></h2>' : '' ;
    $title_two_html =(!empty ($vcx_title_second)) ? '<h2 class="csi-title2">'.vcx_spilt_classic_heading($vcx_title_second).'</h2>' : '' ;
    $post_title_html =(!empty ($vcx_post_title)) ? '<p class="date">'.vcx_spilt_classic_heading($vcx_post_title).'</p>' : '' ;



    $banner_text = ' <div class="csi-banner-content csi-banner-content-'.$banner_align_class.' vcx-registration-content">
                        <div class="vcx-regi-wrapper">
                            <div class="vcx-regi-left">
                            '.$pre_title_html.'
                            '.$title_html.'
                            '.$title_two_html.'
                            '.$post_title_html.'
                             '. (!empty($vcx_count_date) ? $countdown_html  : '') .'
                              '.$button_area_html.'
                             </div>
                             <div class="vcx-regi-right">
                                 <div class="vcx-registration-box">
                                    '.( (!empty($vcx_form_id)) ? do_shortcode('[contact-form-7 id="'.$vcx_form_id.'" ]' ) : '' ).'
                                </div>
                            </div>
                     </div>
                </div>

                
           ';


    $output = '<section>
                <div id="csi-banner-'.esc_attr($vcx_banner_attr).'"  class="csi-banner vcx-registration-header csi-banner-'.esc_attr($vcx_banner_attr).'">
                    <div '.$vcx_snow_element.'  class="csi-banner-style">
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
        "name" => esc_html__("Header Registration", 'vcx-theme-core'),
        "base" => "vcx_home_registration",
        "class" => "",
        "description" => esc_html__("Display Header Banner.", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Select form", 'csx-food-king'),
                "param_name"    => 'vcx_form_id',
                "dsc"         => esc_html__('Choose previously created contact form from the drop down list.', 'vcx-theme-core'),
                "value"         => vcx_theme_core_post_list('wpcf7_contact_form')

            ),
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Banner Alignment", 'vcx-theme-core'),
                "param_name" 	=> "banner_align",
                "value" 		=> array('Left'=>'left','Center'=>'center' , 'Right'=>'right'),
            ),

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
                "value"         => 'Conference On',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Title", "vcx-theme-core"),
                "param_name" 	=> "vcx_title",
                "value" 		=> 'Conference ( 2020 )',
                "description"   => esc_html__("Important: To get theme classic style in title please follow this format: Conference ( 2020 ) ", "vcx-theme-core"),

            ),


            array(
                "type"          => "checkbox",
                "weight"        => 10,
                "heading"       => esc_html__( "Enabled Typing Effect", "vcx-theme-core" ),
                "description"   => esc_html__("Important: use  vertical bar ( | ) to separate sentence for typing effect title.  E.g. : User Interface | New Interface | Different Interface", "vcx-theme-core"),
                "value"         => array('Yes'   => 'yes' ),
                "param_name"    => "vcx_typed_en"
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
                "heading" 		=> esc_html__("Countdown Day Text", "vcx-theme-core"),
                "param_name" 	=> "vcx_text_day",
                "value" 		=> 'Days',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Countdown Hour Text", "vcx-theme-core"),
                "param_name" 	=> "vcx_text_hour",
                "value" 		=> 'Hours',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Countdown Minute Text", "vcx-theme-core"),
                "param_name" 	=> "vcx_text_min",
                "value" 		=> 'Minutes',
            ),

            array(
                "type" 			=> "textfield",
                "admin_label"   => true,
                "heading" 		=> esc_html__("Countdown Seconds Text", "vcx-theme-core"),
                "param_name" 	=> "vcx_text_sec",
                "value" 		=> 'Seconds',
            ),


            array(
                "type"          => "textfield",
                "heading"       => esc_html__("First Button Text", "vcx-theme-core"),
                "param_name"    => "vcx_btn_text1",
                "value"         => "Buy Ticket Now",
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("First Button URL", "vcx-theme-core"),
                "param_name"    => "vcx_btn_url1",
                "value"         => '',
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Second Button Text", "vcx-theme-core"),
                "param_name"    => "vcx_btn_text2",
                "value"         => "Buy Ticket Now",
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Second Button URL", "vcx-theme-core"),
                "param_name"    => "vcx_btn_url2",
                "value"         => '',
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Third Button Text", "vcx-theme-core"),
                "param_name"    => "vcx_btn_text3",
                "value"         => "Buy Ticket Now",
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Third Button URL", "vcx-theme-core"),
                "param_name"    => "vcx_btn_url3",
                "value"         => '',
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Fourth Button Text", "vcx-theme-core"),
                "param_name"    => "vcx_btn_text4",
                "value"         => "Buy Ticket Now",
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Fourth Button URL", "vcx-theme-core"),
                "param_name"    => "vcx_btn_url4",
                "value"         => '',
            ),

            array(
                "type"          => "checkbox",
                "weight"        => 10,
                "heading"       => esc_html__( "Enabled Particle Effect", "vcx-theme-core" ),
                "value"         => array('Yes'   => 'yes' ),
                "param_name"    => "vcx_particle_en"
            ),

            array(
                "type"          => "checkbox",
                "weight"        => 10,
                "heading"       => esc_html__( "Enabled Snow Effect", "vcx-theme-core" ),
                "description"   => esc_html__("Display Snow in Header Area", "vcx-theme-core"),
                "value"         => array('Yes'   => 'yes' ),
                "param_name"    => "vcx_snow_en"
            ),



        )
    ));
}

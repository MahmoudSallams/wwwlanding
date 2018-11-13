<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_countdown', 'vcx_countdown_function');



/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_countdown_function($atts) {
    extract(shortcode_atts(array(
        'countdown_type'     => '',
        'vcx_count_date'     => '2019/12/15',
        'count_align'        => 'left',
        'count_type'         => 'simple',
        'vcx_text_day'       => 'Days',
        'vcx_text_hour'      =>'Hours',
        'vcx_text_min'       => 'Minutes',
        'vcx_text_sec'       => 'Seconds',
    ), $atts));

    // For Count down
    $count_type_class = trim($count_type);
    $count_align_class = trim($count_align);


    ob_start(); ?>


    <div class="csi-countdown-area csi-countdown-area-inner csi-countdown-area-<?php echo $count_type_class.'_'.$count_align_class;?> ">
        <div class="csi-countdown-area-inner">
            <?php echo '<div id="csi-countdown" class="csi-countdown-section csi-countdown" data-vday2="'.$vcx_text_day.'" data-vhour2="'.$vcx_text_hour.'" data-vmin2="'.$vcx_text_min.'" data-vsec2="'.$vcx_text_sec.'" data-date2="'. esc_html($vcx_count_date) .'"></div>'; ?>
       </div>
    </div>


    <?php
    return ob_get_clean();
 
}


// VC Addons goes to theme
/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Section Countdown", 'vcx-theme-core'),
        "base" => "vcx_countdown",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Cicrcle Countdown", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

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
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Countdown Type", 'vcx-theme-core'),
                "param_name" 	=> "count_type",
                "value" 		=> array('Simple'=>'simple','Square'=>'squre', 'Circular'=>'circle'),
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

        )
    ));
}
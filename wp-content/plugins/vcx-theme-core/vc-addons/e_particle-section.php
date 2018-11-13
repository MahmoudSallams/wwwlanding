<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_inner_particle', 'vcx_inner_particle_function');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */

function vcx_inner_particle_function($atts)
{

    extract(shortcode_atts(array(
        'pre_title'         => 'What are you waiting for? Get Ready to Start Your Exciting Journey!', // Section Lead
        'title'             => 'Your Agency Will Lead You Through the Amazing Digital world. What are you waiting for? Get Ready to Start Your Exciting Journey.', // Section Lead
        'post_title'        => 'Get Ready to Start Your Exciting Journey. Our Agency Will Lead You Through the Amazing Digital world.', // Section Lead
        'btn_url_left'      => '',
        'btn_text_left'     => 'Buy Ticket Now', // Buy Button URL
        'btn_url_right'     => '',
        'btn_text_right'    => 'Register Now', // Buy Button URL
        'particle_area'      => 'default', // Buy Button URL
    ), $atts));

    $section_class = esc_attr($particle_area);

    ob_start(); ?>


    <div id="vcx-particle-section" class="vcx-particle-section vcx-particle-<?php echo $section_class ;?>">
        <div id="vcx-particles-inner" class="vcx-particles-section-wrapper">
            <div class="vcx-particle-content">
                <?php echo (!empty($pre_title) ? '<h3 class="csi-pre-title"><h3 class="heading">'.esc_html($pre_title).'</h3>' : '');?>
                <?php echo (!empty($title) ? '<h2 class="csi-title">'.esc_html($title).'</h2>' : ''); ?>
                <?php echo (!empty($post_title) ? '<p class="csi-content">'.esc_html($post_title).'</p>' : ''); ?>

                <div class="action-area">

                    <?php echo (!empty($btn_url_left) ? '<a class="csi-btn csi-btn-brand" href="'.esc_url($btn_url_left).'"><span>'.esc_attr($btn_text_left).'</span></a>' : ''); ?>
                    <?php echo (!empty($btn_url_right) ? '<a class="csi-btn csi-btn-highlight" href="'.esc_url($btn_url_right).'"><span>'.esc_attr($btn_text_right).'</span></a>' : ''); ?>

                </div>


            </div><!--//content -->
        </div>
    </div>

    <?php
    return ob_get_clean();

}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Particle Section", 'vcx-theme-core'),
        "base" => "vcx_inner_particle",
        "class" => "",
        "description" => esc_html__("Display Inner Particle Section Content.", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Section Type", 'vcx-theme-core'),
                "param_name" 	=> "particle_area",
                "value" 		=> array('Default'=>'default','Header'=>'header',),
            ),

            array(
                "type"          => "textarea",
                "heading"       => esc_html__("Pre Title", "vcx-theme-core"),
                "param_name"    => "pre_title",
                "value"         => "What are you waiting for? Get Ready to Start Your Exciting Journey!",
            ),

            array(
                "type"          => "textarea",
                "heading"       => esc_html__("Title", "vcx-theme-core"),
                "param_name"    => "title",
                "value"         => "Your Agency Will Lead You Through the Amazing Digital world. What are you waiting for? Get Ready to Start Your Exciting Journey.",
            ),

            array(
                "type" 			=> "textarea",
                "heading" 		=> esc_html__(" Post Title", "vcx-theme-core"),
                "param_name" 	=> "post_title",
                "value" 		=> "Get Ready to Start Your Exciting Journey. Our Agency Will Lead You Through the Amazing Digital world.",
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Left Button Text", "vcx-theme-core"),
                "param_name"    => "btn_text_left",
                "value"         => "Buy Ticket Now",
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Left Button URL", "vcx-theme-core"),
                "param_name"    => "btn_url_left",
                "value"         => "",
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Right Button Text", "vcx-theme-core"),
                "param_name" 	=> "btn_text_right",
                "value" 		=> "Register Now",
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Right Button URL", "vcx-theme-core"),
                "param_name"    => "btn_url_right",
                "value"         => "",
            ),

        )

    ));
}
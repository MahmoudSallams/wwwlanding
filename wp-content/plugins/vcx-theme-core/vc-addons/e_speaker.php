<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_speaker', 'vcx_speaker_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_speaker_function($atts) {

    $speaker_id = '';
    
    extract(shortcode_atts(array(
         'speaker_id' 	 =>	'',
        'social_position' => '',
        'style' => 'default',
        'bg_type' => 'default',
        'vcx_no_gap' => '',
    ), $atts));

    // Default Value
    $spekears_url           = '';
    $spekears_img           = '';
    $spekears_name          = '';


    // Get Post By ID
    if($speaker_id != '') {

        $postSpeaker = get_post(intval($speaker_id));

        $spekears_url           = get_permalink($speaker_id);
        $spekears_img           = wp_get_attachment_image_src(get_post_thumbnail_id( $speaker_id ), true);
        $spekears_name          = $postSpeaker->post_title;
        $spekears_designation   = get_post_meta($speaker_id,'__vcx__speaker-designation',true);

        $spekears_facebook      = get_post_meta($speaker_id,'__vcx__speaker-facebook',true);
        $spekears_twitter       = get_post_meta($speaker_id,'__vcx__speaker-twitter',true);
        $spekears_instagram     = get_post_meta($speaker_id,'__vcx__speaker-instagram',true);
        $spekears_linkedin      = get_post_meta($speaker_id,'__vcx__speaker-linkedin',true);
        $spekears_vimeo         = get_post_meta($speaker_id,'__vcx__speaker-vimeo',true);
        $spekears_behance       = get_post_meta($speaker_id,'__vcx__speaker-behance',true);
        $spekears_dribbble      = get_post_meta($speaker_id,'__vcx__speaker-dribbble',true);

        wp_reset_postdata();
    }

    ob_start(); ?>

    <div class="csi-single-speaker<?php echo (!empty($social_position)) ? esc_attr($social_position) : ''; ?> csi-single-speaker-<?php echo esc_attr($style);?> csi-single-speaker-bg-<?php echo esc_attr($bg_type);?>  <?php echo ( ( $vcx_no_gap == 'yes') ? 'csi-single-speaker-nogap' : ''); ?>">
        <figure>
            <a class="profile-img" href="<?php echo $spekears_url; ?>">
                <img src="<?php echo esc_url( $spekears_img[0]); ?>" alt="<?php echo $spekears_name; ?>"/>
            </a>

            <figcaption>
                <div class="social-group">
                    <?php echo (!empty($spekears_facebook) ?  '<a class="sp-fb" href="'.$spekears_facebook.'"><i class="fa fa-facebook"></i></a>' : ''); ?>
                    <?php echo (!empty($spekears_twitter) ?  '<a class="sp-tw" href="'.$spekears_twitter.'"><i class="fa fa-twitter"></i></a>' : ''); ?>
                    <?php echo (!empty($spekears_instagram) ? '<a class="sp-insta" href="'.$spekears_instagram.'"><i class="fa fa-instagram"></i></a>' : ''); ?>
                    <?php echo (!empty($spekears_linkedin) ?  '<a class="sp-in" href="'.$spekears_linkedin.'"><i class="fa fa-linkedin"></i></a>' : ''); ?>
                    <?php echo (!empty($spekears_vimeo) ?  '<a class="sp-vm" href="'.$spekears_vimeo.'"><i class="fa fa-vimeo"></i></a>' : ''); ?>
                    <?php echo (!empty($spekears_behance) ?  '<a class="sp-be" href="'.$spekears_behance.'"><i class="fa fa-behance"></i></a>' : ''); ?>
                    <?php echo (!empty($spekears_dribbble) ?  '<a class="sp-dr" href="'.$spekears_dribbble.'"><i class="fa fa-dribbble"></i></a>' : ''); ?>
                </div>
                <div class="speaker-info">
                    <h3 class="title"><a href="<?php echo $spekears_url; ?>"><?php echo $spekears_name; ?></a></h3>
                    <?php echo (isset($spekears_designation) ? '<h4 class="subtitle">'.$spekears_designation.'</h4>' : '');?>
                </div>
            </figcaption>
        </figure>
    </div>



    <?php
    return ob_get_clean();
}


// VC Addons goes to theme


/**
 * Visual Composer addon for speaker
 *
 *
 */

if(function_exists ('vcx_theme_core_post_list')) {

    if (class_exists('WPBakeryVisualComposerAbstract')) {
        vc_map(array(
            "name" => esc_html__("Speaker", 'vcx-theme-core'),
            "base" => "vcx_speaker",
            "class" => "",
            "description" => esc_html__("Display Speaker", 'vcx-theme-core'),
            "category" => esc_html__('EventPlan', 'vcx-theme-core'),
            "params" => array(
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Select a Speaker", 'vcx-theme-core'),
                    "param_name"    => "speaker_id",
                    "value"         => vcx_theme_core_post_list('speaker')
                ),
                array(
                    "type" 			=> "dropdown",
                    "heading" 		=> esc_html__("Style", 'vcx-theme-core'),
                    "param_name" 	=> "style",
                    "value" 		=> array('Default'=>'default','Circular'=>'circular'),
                ),

                array(
                    "type" 			=> "dropdown",
                    "heading" 		=> esc_html__("Social Icon Position", 'vcx-theme-core'),
                    "param_name" 	=> "social_position",
                    "value" 		=> array('Default'=>'','Vertical'=>'2'),
                ),

                array(
                    "type" 			=> "dropdown",
                    "heading" 		=> esc_html__("Section Background Type", 'vcx-theme-core'),
                    "param_name" 	=> "bg_type",
                    "value" 		=> array('Default'=>'default','Vivid'=>'vivid'),
                ),
                array(
                    "type"          => "checkbox",
                    "weight"        => 10,
                    "heading"       => esc_html__( "Remove Extra Space", "vcx-theme-core" ),
                    "description"   => esc_html__("Remove Bottom Extra Space for Full  Style", "vcx-theme-core"),
                    "value"         => array('Yes'   => 'yes' ),
                    "param_name"    => "vcx_no_gap"
                ),
            )
        ));
    }
}


<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_video_embed', 'vcx_video_embed_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_video_embed_function($atts) {
    extract(shortcode_atts(array(
        'video_id' 	=>	'7OSkB4BCx00',
    ), $atts));


    $outputnew = '<div class="csi-video-area" >
                                <figure>
                                    <figcaption>
                                        <div class="video-icon">
                                            <div class="csi-vertical">
                                                <a id="myModalLabel" class="icon" href="#" data-toggle="modal" data-target="#csi-modal">
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div id="csi-modal" class="modal fade csi-modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                  <iframe id="modalvideo" src="https://www.youtube.com/embed/'.$video_id.'" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';


    return $outputnew;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Video Embed", 'vcx-theme-core'),
        "base" => "vcx_video_embed",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Youtube Video", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Youtube Video ID", "vcx-theme-core"),
                "description" => esc_html__("Please add Youtube Video ID", 'vcx-theme-core'),
                "param_name" 	=> "video_id",
                "value" 		=> "7OSkB4BCx00",
            ),
        )

    ));
}
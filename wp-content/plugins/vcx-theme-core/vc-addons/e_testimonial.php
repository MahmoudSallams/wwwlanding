<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_testimonial', 'vcx_testimonial_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_testimonial_function($atts) {
    extract(shortcode_atts(array(
        'limit' 	=> -1,
        'order' 	=> 'DESC',
        'orderby' 	=> 'date',//orderby
        'view_item' => '',//orderby
    ), $atts));


    $item = '';
    global $post;
    global $wpdb;

    $testimonial_args = array(
        'post_type'      => array( 'vcxreview' ),
        'post_status'    => array( 'publish' ),
        'order'          => $order,//ASC,DESC
        'orderby'        => $orderby,//ID / title/ modified/ rand
        'posts_per_page' => esc_attr($limit)// Any number, -1 for all
    );

    $testimonial_loop = new WP_Query( $testimonial_args );
    if ( $testimonial_loop->have_posts() ) :
        while ( $testimonial_loop->have_posts() ) : $testimonial_loop->the_post();

            // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));

            $thumb_url = '';
            if ( has_post_thumbnail( $post->ID ) ) {
                $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'eplano-thumbnails', true);
                $thumb_url = $thumb_url[0];
            }

            $designation = get_post_meta($post->ID,'__vcx__client-designation',true);
            $client_name = get_post_meta(get_the_ID(),'__vcx__client-name',true);

            $item .= '<div class="item">
                <div class="csi-client-bio">
                    <figure class="csi-client-image">
                        <img class="csi-zoomIn"  src="'.$thumb_url.'" alt="'.$client_name.'"/> 
                    </figure>
                    <div class="testi-info-area">
                        <h4 class="csi-client-name">'.$client_name.'<span>'.$designation.'</span></h4>
                        <i class="fa fa-quote-left"></i>
                        <p class="csi-review">'. get_the_content() .'</p>
                    </div>  
                </div>
                
            </div>';
        endwhile;
    endif;
    wp_reset_postdata();// Restore original Post Data



    $output = '<section>
            <div class="csi-testimonials">
                <div class="csi-review-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="csi-review-area">
                                <div class="owl-carousel csi-review-slider'.esc_attr($view_item).'">
                                    '.$item.'
                                </div>
                            </div>
                        </div> <!--//.COL 12 -->
                    </div> <!--//.ROW-->
                </div>
            </div><!--//.LGX SECTION -->
        </section>';

    return $output;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Testimonial", 'vcx-theme-core'),
        "base" => "vcx_testimonial",
        "class" => "",
        "description" => esc_html__("Display Testimonial", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Slider Item", 'vcx-theme-core'),
                "param_name" 	=> "view_item",
                "value" 		=> array('One'=>'', 'Two'=>'2', 'Three'=>'3'),
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Item Max Limit", "vcx-theme-core"),
                "param_name" 	=> "limit",
                "value" 		=> -1,
                "description"   => esc_html__("Input -1 to get all. ", "vcx-theme-core"),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order", 'vcx-theme-core'),
                "param_name" 	=> "order",
                "value" 		=> array('Descending'=>'DESC', 'Ascending'=>'ASC'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order By", 'vcx-theme-core'),
                "param_name" 	=> "orderby",
                "value" 		=> array('Date'=>'date', 'ID'=>'ID','Title'=>'title' , 'Modified'=>'modified' , 'Rand'=> 'rand'),//ID / title/ modified/ rand
            ),


        )
    ));
}
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_latest_news', 'vcx_latest_news_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_latest_news_function($atts)
{
    $category 	= '';
    $number 	= 3;
    $order_by	= 'date';
    $order		= 'DESC';

    extract(shortcode_atts(array(
        'category' 		=> '',
        'number' 		=>  3,
        'order_by'		=> 'date',
        'order'			=> 'DESC',
    ), $atts));

    global $post;
    global $wpdb;


    // Basic Query
    $args = array(
        'post_status'		=> 'publish',
        'posts_per_page'	=> esc_attr($number),
        'order'				=> $order,
        'orderby'			=> $order_by
    );

    // Category Add
    if( ( $category != '' )){
        $args2 = array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'id',
                    'terms'    => $category,
                ),
            ),
        );
        $args = array_merge( $args,$args2 );
    }

    ob_start(); ?>

    <div id="csi-news" class="csi-news">
        <div class="csi-wrapper">
            <div class="row">
                <?php
                $data = new WP_Query($args);
                if ( $data->have_posts() ) {
                    while ( $data->have_posts() ) {
                        $data->the_post();



                        $thumb_url = '';
                        if ( has_post_thumbnail( $post->ID ) ) {

                            update_post_thumbnail_cache();
                            $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'eplano-blog-medium', true);
                            $thumb_url = $thumb_url[0];
                        }


                        ?>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="csi-single-news">
                                <figure>
                                    <a href="<?php echo get_the_permalink(); ?>" target="_blank">
                                        <img src="<?php echo esc_url( $thumb_url); ?>" alt="<?php echo get_the_title(); ?>"/>
                                    </a>
                                    <figcaption>
                                        <h4 class="date">
                                            <?php echo date_i18n(get_option('date_format'), false, false);; ?>
                                        </h4>
                                    </figcaption>
                                </figure>
                                <div class="news-info">
                                    <h4 class="csi-post-author"><?php the_author(); ?></h4>
                                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <a class="csi-btn csi-btn-sm csi-btn-white" href="<?php the_permalink(); ?>"><span><?php esc_html_e('Read More', 'vcx-theme-core') ?></span></a>
                                </div>

                            </div>
                        </div><!--// Single -->

                    <?php      }
                }
                wp_reset_postdata();// Restore original Post Data
                ?>
            </div><!-- //row  -->
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
        "name" => esc_html__("Latest News", 'vcx-theme-core'),
        "base" => "vcx_latest_news",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Latest News.", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Category Filter", 'vcx-theme-core'),
                "param_name" 	=> "category",
                "value" 		=> vcx_get_post_category(),
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Number of items", 'vcx-theme-core'),
                "param_name" 	=> "number",
                "value" 		=> 3,
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("OderBy", 'vcx-theme-core'),
                "param_name" 	=> "order_by",
                "value" 		=> array('Select'=>'','Date'=>'date','Title'=>'title','Modified'=>'modified','Author'=>'author','Random'=>'rand'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order", 'vcx-theme-core'),
                "param_name" 	=> "order",
                "value" 		=> array('Select'=>'','DESC'=>'DESC','ASC'=>'ASC'),
            ),
        )

    ));
}
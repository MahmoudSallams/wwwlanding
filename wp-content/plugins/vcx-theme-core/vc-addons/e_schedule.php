<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_schedule', 'vcx_schedule_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_schedule_function($atts) {

    extract(shortcode_atts(array(
        'menu_position' => '',
        'order_by'		=> 'date',
        'order'			=> 'DESC',
    ), $atts));


    ob_start(); ?>

    <section>
        <div id="csi-schedule" class="csi-schedule">
            <div class="csi-schedule-inner">
                <div class="csi-tab <?php echo (($menu_position == 'top') ? 'csi-tab2' : ''); ?> ">


                    <?php
                    $taxonomy = 'schedule_cat';
                    $terms = get_terms($taxonomy); // Get all terms of a taxonomy
                    $i = 1;
                    if ( $terms && !is_wp_error( $terms ) ) :

                        ?>
                        <ul class="nav nav-pills csi-nav">
                            <?php foreach ( $terms as $term ):   ?>
                                <li <?php echo ($i == 1) ?  'class="active"' : '' ;?> >
                                    <a data-toggle="pill" href="#schedule<?php echo $term->term_id; ?>">
                                        <h3><?php echo vcx_spilt_heading($term->name); ?></h3>
                                        <p><?php echo vcx_spilt_heading($term->description, 'left'); ?></p>
                                    </a>
                                </li>
                                <?php  $i++; endforeach; ?>
                        </ul>
                    <?php endif;?>

                    <div class="tab-content csi-tab-content">
                        <?php
                        $count = 1;
                        if ( $terms && !is_wp_error( $terms ) ) :
                            foreach ( $terms as $term ):   ?>
                                <div id="schedule<?php echo $term->term_id; ?>" class="tab-pane fade in  <?php echo ($count == 1) ?  'active' : '' ;?>">
                                    <div class="panel-group" id="accordion<?php echo $term->term_id; ?>" role="tablist" aria-multiselectable="true">
                                        <?php

                                        $posts_array = get_posts(
                                            array(
                                                'posts_per_page' => -1,
                                                'post_type' => 'schedule',
                                                //'order'   => 'ASC',
                                                'order'				=> $order,
                                                'orderby'			=> $order_by,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'schedule_cat',
                                                        'field' => 'term_id',
                                                        'terms' => $term->term_id,
                                                    )
                                                )
                                            )
                                        );

                                        $loop = 1;

                                        foreach ( $posts_array as $schedule) :
                                            $spekears_img = '';
                                            $spekears_name = '';
                                            $spekears_url = '';
                                            $spekears_designation = '';
                                            $id = $schedule->ID;
                                            $speakers_time          = get_post_meta($id,'__vcx__schedule-time',true);

                                            $spekears_id            = get_post_meta($id,'__vcx__schedule-speaker',true);
                                            $spekears_two_en            = get_post_meta($id,'__vcx__schedule-speaker_two_show',true);
                                            $spekears_id_two            = get_post_meta($id,'__vcx__schedule-speaker_two',true);


                                            $schedule_locations      = get_post_meta($id,'__vcx__schedule-location',true);

                                            // Replace Price
                                            $search_a = array('[',']');
                                            $replace_b = array('<span> ',' </span>');
                                            $speakers_time =  !empty($speakers_time) ? str_replace($search_a, $replace_b, $speakers_time) : '';

                                            if(!empty($spekears_id)) {
                                                $spekears_img           = wp_get_attachment_image_src(get_post_thumbnail_id( $spekears_id ), array(150,150), true);
                                                $spekears_img           = $spekears_img[0];
                                                $spekears_name          =  get_the_title($spekears_id);
                                                $spekears_url           = get_permalink($spekears_id);
                                                $spekears_designation   = get_post_meta($spekears_id,'__vcx__speaker-designation','eplano-thumbnails',true);
                                            }
                                            if(!empty($spekears_id_two)) {
                                                $spekears_img_two           = wp_get_attachment_image_src(get_post_thumbnail_id( $spekears_id_two ), array(150,150),true);
                                                $spekears_img_two           = $spekears_img_two[0];
                                                $spekears_name_two          =  get_the_title($spekears_id_two);
                                                $spekears_url_two           = get_permalink($spekears_id_two);
                                                $spekears_designation_two   = get_post_meta($spekears_id_two,'__vcx__speaker-designation',true);
                                            }

                                            ?>

                                            <div class="panel panel-default csi-panel">
                                                <div class="panel-heading" role="tab" id="headingOne<?php echo $id; ?><?php echo $term->term_id; ?>">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion<?php echo $term->term_id; ?>" href="#collapseOne<?php echo $id; ?><?php echo $term->term_id; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $id; ?>">
                                                            <div class="csi-single-schedule">
                                                                <div class="author <?php echo ($spekears_two_en == 'yes') ? 'author-multi' : ''; ?>">
                                                                    <img src="<?php echo esc_url( $spekears_img); ?>" alt="<?php echo $spekears_name; ?>"/>

                                                                    <?php if($spekears_two_en == 'yes'): ?>
                                                                        <img src="<?php echo esc_url( $spekears_img_two); ?>" alt="<?php echo $spekears_name_two; ?>"/>
                                                                    <?php endif; ?>

                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time"><?php echo ( ($speakers_time) ? $speakers_time : ' '); ?></h4>
                                                                    <h3 class="title"><?php echo $schedule->post_title; ?></h3>
                                                                    <h4 class="author-info">
                                                                        <?php esc_html_e('By', 'vcx-theme-core') ?>
                                                                        <span>
                                                                                    <?php echo($spekears_name ? $spekears_name : ' '); ?>
                                                                                </span>
                                                                        , <?php echo ($spekears_designation ? $spekears_designation : ' '); ?>
                                                                        <?php if($spekears_two_en == 'yes'): ?>
                                                                            <b>|</b> <span><?php echo($spekears_name_two ? $spekears_name_two : ' '); ?> </span> ,
                                                                            <?php echo($spekears_designation_two ? $spekears_designation_two : ' '); ?>
                                                                        <?php endif; ?>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseOne<?php echo $id; ?><?php echo $term->term_id; ?>" class="panel-collapse collapse <?php echo ($loop == 1) ?  'in' : '' ;?>" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <p class="text"><?php echo $schedule->post_excerpt; ?>   <a class="csi-btn-simple" href="<?php echo get_permalink($id); ?>"><?php esc_html_e('View Details', 'vcx-theme-core') ?></a></p>
                                                        <h4 class="location"> <?php echo !empty($schedule_locations) ? ('<strong>'.esc_html__('Location:', 'vcx-theme-core').'</strong> '. vcx_span_heading($schedule_locations)) : ''; ?></h4>
                                                    </div>
                                                </div>
                                            </div>  <!--// item -->


                                        <?php $loop++; endforeach;

                                        wp_reset_postdata();?>

                                    </div> <!--//accordian -->
                                </div> <!--//Tabs -->
                                <?php  $count++;  endforeach; ?>
                        <?php endif;?>

                    </div> <!-- //.tab-content -->

                </div><!--CSI TAB-->
            </div><!-- //.INNER -->
        </div>
    </section>



    <?php
    return ob_get_clean();

}


/**
 * Visual Composer
 *
 * Visual Composer for Schedule
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Schedule Section", 'hcx-event-pro'),
        "base" => "vcx_schedule",
        "class" => "",
        "description" => esc_html__("Display all Schedule", 'hcx-event-pro'),
        "category" => esc_html__('EventPlan', 'hcx-event-pro'),

        "params" => array(

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Menu Position", 'vcx-theme-core'),
                "param_name" 	=> "menu_position",
                "value" 		=> array('Left'=>'','Top'=>'top'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order", 'hcx-event-pro'),
                "param_name" 	=> "order",
                "value" 		=> array('Select'=>'','DESC'=>'DESC','ASC'=>'ASC'),
            ),
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("OderBy", 'hcx-event-pro'),
                "param_name" 	=> "order_by",
                "value" 		=> array('Select'=>'','Date'=>'date','Title'=>'title','Modified'=>'modified','Author'=>'author','Random'=>'rand'),
            ),

        )
    ));
}
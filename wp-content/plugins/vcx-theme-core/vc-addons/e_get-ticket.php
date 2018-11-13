<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_get_ticket', 'vcx_get_ticket_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_get_ticket_function($atts) {


    extract(shortcode_atts(array(
        'pricing_style'     => 'default',
        'pricingcatlist'    => '',
        'order_by'		    => 'date',
        'recommend'         => 'recommended',
        'order'			    => 'ASC',
        'vcx_chris_en'		=> '',
    ), $atts));

    global $post;


    // Basic Query
    $args_pricing = array(
        'post_type'      => array( 'pricing' ),
        'post_status'		=> 'publish',
        'posts_per_page'	=> -1,
        'order'				=> $order,
        'orderby'			=> $order_by,

    );


    $cats = esc_html($pricingcatlist);

    $recommend_class = esc_attr($recommend);
    // Category to Array Convert
    if( !empty($cats) && $cats != '' ){
        $cats = trim($cats);
        $cats_arr   = explode(',', $cats);

        if(is_array($cats_arr) && sizeof($cats_arr) > 0){
            $args_pricing['tax_query'] = array(
                array(
                    'taxonomy' => 'pricing_cat',
                    'field'    => 'slug',
                    'terms'    => $cats_arr
                )
            );

        }
    }


    $data = new WP_Query($args_pricing);

    ?>
    <div id="vcx-register" class="vcx-register <?php echo (($vcx_chris_en == 'yes') ? 'csi-register-christmas' : '') ?>">
        <div class="vcx-inner">
            <div class="vcx-wrapper">
                <div class="csi-registration-area csi-registration-area-<?php echo esc_attr($pricing_style) ;?>">

                    <?php
                    if ( $data->have_posts() ) :
                        while ( $data->have_posts() ) :
                            $data->the_post();
                            $id = $post->ID;

                            $price          = get_post_meta($id,'__vcx__pricing-price',true);
                            $symbol         = get_post_meta($id,'__vcx__pricing-symbol',true);
                            $url            = get_post_meta($id,'__vcx__pricing-url',true);
                            $recommended    = get_post_meta($id,'__vcx__pricing-recommended',true);
                            $priceLists     = get_post_meta($id,'__vcx__pricing-group',true);
                            $button_text    = get_post_meta($id,'__vcx__button-text',true);


                            // Replace Price
                            $price_a = array('[',']');
                            $price_b = array('<span>/ ','</span>');
                            $price =  !empty($price) ? str_replace($price_a, $price_b, $price) : '';


                            ?>

                            <div class="csi-single-registration <?php echo ($recommended == 'recommended') ? $recommend_class : '' ;?> ">
                                <div class="csi-single-registration-inner">
                                    <div class="single-top">
                                        <h3 class="title"><?php echo get_the_title(); ?></h3>
                                        <h4 class="price"><i><?php echo (!empty($symbol) ? $symbol : '$'); ?></i><?php echo (!empty($price) ? $price : ''); ?></h4>
                                    </div>
                                    <div class="single-bottom">
                                        <ul class="list-unstyled list">
                                            <?php
                                            if ( isset($priceLists) && is_array( $priceLists ) ) {
                                                foreach($priceLists as $list) {
                                                    echo '<li><i class="fa fa-'.(($list['__vcx__pricing-list-style'] == 'no') ? 'times' : 'check').'" aria-hidden="true"></i> '.$list['__vcx__pricing-list-text'].'</li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <?php if(!empty($button_text)): ?>
                                            <div class="csi-btn-area">
                                                <a class="csi-btn" href="<?php echo $url; ?>" target="_blank"><span><?php echo $button_text;?></span></a>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                        <?php      endwhile;
                    endif;
                    wp_reset_postdata();// Restore original Post Data
                    ?>
                </div>
                <!--//.ROW-->
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
    <?php
}

/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Register/ Ticket", 'vcx-theme-core'),
        "base" => "vcx_get_ticket",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Register or Ticket", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(


            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Select Style", 'vcx-theme-core'),
                "param_name" 	=> "pricing_style",
                "value" 		=> array('Default'=> 'default','Vivid'=>'colorful', 'Simple'=>'simple'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Show Recommended  Style", 'vcx-theme-core'),
                "param_name" 	=> "recommend",
                "value" 		=> array('Yes'=> 'recommended','No'=>'non-recommend'),
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Add Category Slug", 'vcx-theme-core'),
                "param_name" 	=> "pricingcatlist",
                "value" 		=>'',
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

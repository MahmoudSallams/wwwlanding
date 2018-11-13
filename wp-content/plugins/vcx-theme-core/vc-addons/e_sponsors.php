<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'vcx_sponsor', 'vcx_sponsor_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function vcx_sponsor_function($atts) {
    extract(shortcode_atts(array(
        'title' 	    =>	'Sponsor Title',
        'sp_style' 	    =>	'default',
        'row_item' 	    =>	'item4',
    ), $atts));


    $title_html = ( !empty($title) ? '<div class="vcx-sponsored-title"><h3 class="sponsored-heading first-heading">'.$title.'</h3></div>' : '');

    ob_start(); ?>
    <div class="vcx-sponsored-wrapper vcx-spwrap-<?php echo esc_attr($sp_style); ?>  vcx-spwrap-<?php echo esc_attr($row_item); ?> ">

        <?php echo $title_html; ?>

        <?php
        $vcx_sponsor_partner_items = array();
        if (class_exists('WPBakeryVisualComposerAbstract')){
        $vcx_sponsor_partner_items = vc_param_group_parse_atts( $atts['sponsor_images']);
        }
        $vcx_sponsor_partner_num = count($vcx_sponsor_partner_items);

        echo '<div class="sponsors-area">';
        if($vcx_sponsor_partner_num > 0){
            for($i=0; $i<$vcx_sponsor_partner_num; $i++){
                $sponsor_logo = (isset($vcx_sponsor_partner_items[$i]['sponsor_image'])) ? $vcx_sponsor_partner_items[$i]['sponsor_image'] : '';
                $sponsor_url = (isset($vcx_sponsor_partner_items[$i]['sponsor_url'])) ? $vcx_sponsor_partner_items[$i]['sponsor_url'] : 'javascript:void(0)';
                $sponsor_image = wp_get_attachment_image_src($sponsor_logo,'img-size');
                $sponsor_img = $sponsor_image[0];
                ?>

                <div class="single single-<?php echo esc_attr($sp_style); ?> csi-<?php echo esc_attr($row_item); ?>">
                    <a class="<?php echo $title; ?>" href="<?php echo $sponsor_url;?>" target="_blank" ><img src="<?php echo esc_url($sponsor_img);?>" alt="Sponsor"/></a>
                </div> <!--//single-->

            <?php
            }
        }

        echo '</div>';

        ?>
    </div>
    <?php
    return ob_get_clean();
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Sponsors", 'vcx-theme-core'),
        "base" => "vcx_sponsor",
        'icon' => 'icon_openiconic',
        "class" => "",
        "description" => esc_html__("Display Sponsors", 'vcx-theme-core'),
        "category" => esc_html__('EventPlan', 'vcx-theme-core'),
        "params" => array(
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Select Style", 'vcx-theme-core'),
                "param_name" 	=> "sp_style",
                "value" 		=> array('Default'=>'default','Border'=>'border-style' , 'Shadow'=>'shadow-style', 'Background'=>'background-style'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Item Per Row", 'vcx-theme-core'),
                "param_name" 	=> "row_item",
                "value" 		=> array('Four'=>'item4','Three'=>'item3'),
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Sponsor Title", "vcx-theme-core"),
                "param_name" 	=> "title",
                "value" 		=> "Sponsor Title",
            ),
            array(
                'heading' => esc_html__('Add Sponsors Image', 'vcx-theme-core'),
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'sponsor_images',
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        "type" 			=> "attach_image",
                        "heading" 		=> esc_html__("Upload Image", "vcx-theme-core"),
                        "param_name" 	=> "sponsor_image",
                        "value" 		=> "",
                    ),
                    array(
                        "type" 			=> "textfield",
                        "heading" 		=> esc_html__("URL", "vcx-theme-core"),
                        "param_name" 	=> "sponsor_url",
                        "value" 		=> "javascript:void(0)",
                    ),
                )
            )

        )

    ));
}
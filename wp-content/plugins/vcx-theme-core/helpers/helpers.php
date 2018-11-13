<?php

/*
 *  Get Post Category
 */



function vcx_get_post_category() {
    $categories_array = array();
    $categories = get_categories();
    foreach( $categories as $category ){
        $categories_array[$category->name] = $category->term_id;
    }

    return $categories_array;
}



add_action( 'init', 'vcx_add_excerpts_to_pages' );

function vcx_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );

}



// remove empty p tag
add_filter( 'the_content', 'vcx_remove_ptag' );
function vcx_remove_ptag( $content ) {
    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );
}

// admin area css
function vcx_admin_styles() {
    ?>
    <style type="text/css">
        .rs-update-notice-wrap,
        .redux-timer,
        #wpfooter #footer-left,
        .redux-dev-qtip,
        .rAds span a img,
        .redux-notice,
        #redux_blast_1454922210,
        #admin_config{
            display: none !important;
        }
        .redux-notice-field{
            background: #666;
            color: #fff;
            border-color:#000
        }
        .redux-notice-field .redux-info-desc {
            margin-top: 10px;
        }
    </style>
    <?php
}



/**
 *  Get Post Array  for VC
 */



function vcx_theme_core_post_list($postType) {

    $args = array('post_type' => $postType, 'posts_per_page' => -1);

    $list = array();
    if( $data = get_posts($args)){

        foreach($data as $key){
            $list[$key->post_title] = $key->ID;
        }
    }else{
        $list[ esc_html__('No item found', 'vcx-theme-core')] = 0;
    }

    return $list ;
}




/**
 * @return array
 */

function vcxEventpricingCat(){

    $taxo = 'pricing_cat';
    $terms = get_terms($taxo); // Get all terms of a taxonomy
    $output = array();
    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $output[$term->name] =$term->slug;
        }
    }
    return $output;
}


/**
 *  Get Post
 */

// paste below code in your functions.php

function cmb2_vcx_get_post_options ( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'post',
        'numberposts' => 10,
    ) );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->ID ] = $post->post_title;
        }
    }

    return $post_options;
}


function cmb2_get_speaker_post_options() {
    return cmb2_vcx_get_post_options( array( 'post_type' => 'speaker', 'numberposts' => -1 ) );
}


if ( ! function_exists( 'vcx_spilt_heading' ) ) {
    /**
     * Splited heading to use theme style
     *
     * @param $heading
     *
     * @return string
     */
    function vcx_spilt_heading( $heading, $type = '' ) {
        $heading_first = '';
        $heading_last  = '';
        $heading_str   = trim( $heading );
        if ( isset( $heading_str ) && ! empty( $heading_str ) ) {
            $heading_arr   = explode( " ", $heading_str );
            $heading_first = isset( $heading_arr[0] ) ? $heading_arr[0] : '';
            unset( $heading_arr[0] );
            $heading_last = implode( $heading_arr );
        }

        $output =  $heading_first . ' <span>' . $heading_last . '</span>';

        if($type == 'left') {
            $output = '<span>'. $heading_first . ' </span>' . $heading_last ;
        }
        return $output;
    }
}



if ( ! function_exists( 'vcx_span_heading' ) ) {
    /**
     * Splited heading to use theme style
     *
     * @param $heading
     *
     * @return string
     */
    function vcx_span_heading( $heading ) {
        $a = array('[',']');
        $b = array('<span>','</span>');
        $output =  !empty($heading) ? str_replace($a, $b, $heading) : '';

        return $output;
    }
}



if ( ! function_exists( 'vcx_spilt_classic_heading' ) ) {
    /**
     * Split heading to use theme style
     *
     * @param $heading
     *
     * @return string
     */
    function vcx_spilt_classic_heading( $heading ) {
        $a = array('(',')', '{','}', '|');
        $b = array('<b>','</b>','<i>', '</i>', '<br/> ');
        $output =  !empty($heading) ? str_replace($a, $b, $heading) : '';

        return $output;
    }
}


if ( ! function_exists( 'vcx_theme_core_add_share_icon' ) ) {

    function vcx_theme_core_add_share_icon() {
        $output = '<h4 class="title">'.esc_html_e('Share','vcx-theme-core').'</h4>';
        $output .= '<div class="csi-share"><ul class="list-inline csi-social">';
        $output .= '<li><a href="'.esc_url('http://twitter.com/home/?status='.get_the_title().' - '.get_the_permalink()).'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
        $output .= ' <li><a href="'.esc_url('http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;title='.get_the_title()).'"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>';
        $output .= '<li><a href="'.esc_url('https://plus.google.com/share?url='.get_the_permalink().'&amp;title='.get_the_title()).'"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';
        $output .= '<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>';
        $output .= '<li><a href="'.esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;title='.get_the_title()).'"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>';
        $output .= '</ul></div>';

        echo $output;
    }
    add_filter( 'vcx-theme-core_single_post_footer', 'vcx_theme_core_add_share_icon' );
}


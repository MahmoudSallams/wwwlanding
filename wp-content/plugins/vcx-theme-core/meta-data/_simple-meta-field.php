<?php
add_filter('cmb2_meta_boxes', 'vcx_custom_meta_box');
function vcx_custom_meta_box(array $meta_boxes) {

    $prefix   = '__vcx__';

    $meta_boxes['vcx-speaker'] = array(
        'id'           => 'vcxspeaker',
        'title'        => esc_html__('Add Custom Information', 'vcx-theme-core'),
        'object_types' => array('speaker'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(


            array(
                'name' => esc_html__('Designation', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Designation', 'vcx-theme-core'),
                'id'   => $prefix . 'speaker-designation',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Facebook Url', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Facebook Profile Url ', 'vcx-theme-core'),
                'id'   => $prefix . 'speaker-facebook',
                'type' => 'text_url'
            ),

            array(
                'name' => esc_html__('Twitter Url', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Twitter Profile Url ', 'vcx-theme-core'),
                'id'   => $prefix . 'speaker-twitter',
                'type' => 'text_url'
            ),

            array(
                'name' => esc_html__('Instagram Url', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Instagram Profile Url ', 'vcx-theme-core'),
                'id'   => $prefix . 'speaker-instagram',
                'type' => 'text_url'
            ),

            array(
                'name' => esc_html__('Linkedin Url', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Linkedin Profile Url ', 'vcx-theme-core'),
                'id'   => $prefix . 'speaker-linkedin',
                'type' => 'text_url'
            ),

            array(
                'name' => esc_html__('Vimeo Url', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Vimeo Profile Url ', 'vcx-theme-core'),
                'id'   => $prefix . 'speaker-vimeo',
                'type' => 'text_url'
            ),

            array(
                'name' => esc_html__('Behance Url', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Behance Profile Url ', 'vcx-theme-core'),
                'id'   => $prefix . 'speaker-behance',
                'type' => 'text_url'
            ),

            array(
                'name' => esc_html__('Dribbble Url', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Dribbble Profile Url ', 'vcx-theme-core'),
                'id'   => $prefix . 'speaker-dribbble',
                'type' => 'text_url'
            ),

        )
    );//Single Box End


    $meta_boxes['vcx-testimonial'] = array(
        'id'           => 'vcxtestimonial',
        'title'        => esc_html__('Add Client Information', 'vcx-theme-core'),
        'object_types' => array('vcxreview'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => esc_html__('Client Name', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Client Name.', 'vcx-theme-core'),
                'id'   => $prefix . 'client-name',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Client Designation', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Client Designation', 'vcx-theme-core'),
                'id'   => $prefix . 'client-designation',
                'type' => 'text'
            ),
        )
    );//Single Box End


    $meta_boxes['lgx-pricing'] = array(
        'id'           => 'lgxpricing',
        'title'        => __('Add General info &  pricing Box Makes Recommended', 'vcx-theme-core'),
        'object_types' => array('pricing'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => __('Ticket Price', 'vcx-theme-core'),
                'desc' => __('Please Add Ticket Price in following format: value[ Month ]', 'vcx-theme-core'),
                'id'   => $prefix . 'pricing-price',
                'default'  => '59[ Month ]',
                'type' => 'text'
            ),

            array(
                'name' => __('Currency Symbol', 'vcx-theme-core'),
                'desc' => __('Please Add Currency Symbol in Text', 'vcx-theme-core'),
                'id'   => $prefix . 'pricing-symbol',
                'default'=>'$',
                'type' => 'text'
            ),
            array(
                'name' => __('Button Text', 'vcx-theme-core'),
                'desc' => __('Please Add Ticket Button Text Here', 'vcx-theme-core'),
                'id'   => $prefix . 'button-text',
                'default' => 'Buy Ticket',
                'type' => 'text'
            ),
            array(
                'name' => __('Buy URL', 'vcx-theme-core'),
                'desc' => __('Please Add Ticket URL', 'vcx-theme-core'),
                'id'   => $prefix . 'pricing-url',
                'type' => 'text_url'
            ),
            array(
                'name'    =>  __('Pricing Box', 'vcx-theme-core'),
                'id'      => $prefix . 'pricing-recommended',
                'type'    => 'radio_inline',
                'options' => array(
                    'recommended' => __( 'Recommended', 'vcx-theme-core' ),
                    'none'   => __( 'None', 'vcx-theme-core' ),
                ),
                'default' => 'none',
            ),
        )
    );//Single Box End



    $meta_boxes['vcx-schedule'] = array(
        'id'           => 'vcxschedule',
        'title'        => __('Add Schedule Information', 'vcx-theme-core'),
        'object_types' => array('schedule'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(

            array(
                'name' => esc_html__('Time', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add schedule time here. ** If you want add AM or PM please add inside [ ] to achieve theme style. e.g.  05:30 [PM].', 'vcx-theme-core'),
                'id'   => $prefix . 'schedule-time',
                'type' => 'text'
            ),

            array(
                'name'       => __( 'Select First Speaker', 'vcx-theme-core' ),
                'desc'       => __( 'Please Select First Speaker', 'vcx-theme-core' ),
                'id'         => $prefix . 'schedule-speaker',
                'type'       => 'select',
                'options_cb' => 'cmb2_get_speaker_post_options',
            ),

            array(
                'name' => esc_html__('Show  Second Speaker', 'vcx-theme-core'),
                'desc' => esc_html__('Second Speaker in frontend.', 'vcx-theme-core'),
                'id'   => $prefix . 'schedule-speaker_two_show',
                'type' => 'select',
                'options' => array(
                    'no'   => __( 'NO', 'vcx-theme-core' ),
                    'yes'    => __( 'Yes', 'vcx-theme-core' ),
                ),
                'default' => 'No',
            ),

            array(
                'name'       => __( 'Select Second Speaker', 'vcx-theme-core' ),
                'desc'       => __( 'Please Select Second Speaker', 'vcx-theme-core' ),
                'id'         => $prefix . 'schedule-speaker_two',
                'type'       => 'select',
                'options_cb' => 'cmb2_get_speaker_post_options',
            ),

            array(
                'name' => esc_html__('Location', 'vcx-theme-core'),
                'default'=> 'Hall 1, Building A , Golden Street , [Southafrica]',
                'desc' => esc_html__('Please Add schedule Location here. ** Format: Hall 1, Building A , Golden Street , [Southafrica]', 'vcx-theme-core'),
                'id'   => $prefix . 'schedule-location',
                'type' => 'text'
            ),
        )
    );//Single Box End


    $meta_boxes['lgxslider'] = array(

        'id'           => 'lgxcarousel',
        'title'        => esc_html__('Add Slider Information', 'vcx-theme-core'),
        'object_types' => array('lgxcarousel'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(

            array(
                'name'   =>  esc_html__( 'Content Align', 'vcx-theme-core' ),
                'id'     => $prefix . 'slider-align',
                'type'     => 'select',
                'default'  => 'left',
                'options'  => array(
                    'left'  => esc_html__( 'Left', 'vcx-theme-core' ), 
                    'right'  => esc_html__( 'Right', 'vcx-theme-core' ), 
                    'center'  => esc_html__( 'Center', 'vcx-theme-core' )
                )
            ),

            array(
                'name' => esc_html__('Pre Title', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-pre-title',
                'default' => 'Conference On',
                "desc" => esc_html__("Important: To get theme classic style in title please follow this format: Conference ( 2020 ) ", "vcx-theme-core"),
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Title', 'vcx-theme-core'),
                "description"   => esc_html__("Important: To get theme classic style in title please follow this format: Conference ( 2020 ) ", "vcx-theme-core"),
                'id'   => $prefix . 'slider-title',
                'default' => 'Conference ( 2020 )',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Second Title', 'vcx-theme-core'),
                "description"   => esc_html__("Important: To get theme classic style in title please follow this format: ( 2020 ) Biggest Symposium | { Freelancers } Conference. ", "vcx-theme-core"),
                'id'   => $prefix . 'slider-title-second',
                'default' => '( 2020 ) Biggest Symposium | { Freelancers } Conference.',
                'type' => 'text'
            ),

            array(
                'name'  => esc_html__('Post Title', 'vcx-theme-core'),
                "description" => esc_html__("Important: To get theme classic style in title please follow this format: ( 27-30 ) October 2020, United State ", "vcx-theme-core"),
                'id'   => $prefix . 'slider-post-title',
                'default' => '( 27-30 ) October 2020, United State',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('First Button Text', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Button Text Here', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-button-text1',
                'default' => 'Buy Ticket Now',
                'type' => 'text'
            ),
            array(
                'name' => esc_html__('First Button URL', 'vcx-theme-core'),
                '' => esc_html__('Please Add Button URL Here', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-button-url1',
                'type' => 'text'
            ),


            array(
                'name' => esc_html__('Second Button Text', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Button Text Here', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-button-text2',
                'default' => 'Buy Ticket Now',
                'type' => 'text'
            ),
            array(
                'name' => esc_html__('Second Button URL', 'vcx-theme-core'),
                '' => esc_html__('Please Add Button URL Here', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-button-url2',
                'type' => 'text'
            ),


            array(
                'name' => esc_html__('Third Button Text', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Button Text Here', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-button-text3',
                'default' => 'Buy Ticket Now',
                'type' => 'text'
            ),
            array(
                'name' => esc_html__('Third Button URL', 'vcx-theme-core'),
                '' => esc_html__('Please Add Button URL Here', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-button-url3',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Fourth Button Text', 'vcx-theme-core'),
                'desc' => esc_html__('Please Add Button Text Here', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-button-text4',
                'default' => 'Buy Ticket Now',
                'type' => 'text'
            ),
            array(
                'name' => esc_html__('Fourth Button URL', 'vcx-theme-core'),
                '' => esc_html__('Please Add Button URL Here', 'vcx-theme-core'),
                'id'   => $prefix . 'slider-button-url4',
                'type' => 'text'
            )



        )
    );//Single Box End



    $meta_boxes['csx-post-format'] = array(
        'id'           => 'csxpostformat',
        'title'        => esc_html__('Post Format', 'vcx-theme-core'),
        'object_types' => array('post'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => esc_html__('Video Embed Code', 'vcx-theme-core'),
                'desc' => esc_html__('Put video embeded Code here.', 'vcx-theme-core'),
                'id'   => $prefix . 'post-format-video',
                'type' => 'textarea_code'
            ),
            array(
                'name' => esc_html__('Audio Embed Code', 'vcx-theme-core'),
                'desc' => esc_html__('Write Your Audio Embed Code Here.', 'vcx-theme-core'),
                'id'   => $prefix . 'post-format-audio',
                'type' => 'textarea_code'
            ),
            array(
                'name' => esc_html__('Quote Text', 'vcx-theme-core'),
                'desc' => esc_html__('Write Your Quote Here.', 'vcx-theme-core'),
                'id'   => $prefix . 'post-format-quote',
                'type' => 'textarea_small'
            ),

            array(
                'name' => esc_html__('Quote Author', 'vcx-theme-core'),
                'desc' => esc_html__('Write Quote Author or Source.', 'vcx-theme-core'),
                'id'   => $prefix . 'post-format-quote-author',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Gallery Image Upload', 'vcx-theme-core'),
                'desc' => esc_html__('Upload Gallery Images Here. You can  Upload max 3 images.', 'vcx-theme-core'),
                'id'   => $prefix . 'post-format-gallery',
                'type' => 'file_list'
            ),
            array(
                'name' => esc_html__('Link URL', 'vcx-theme-core'),
                'desc' => esc_html__('Write Your Link.', 'vcx-theme-core'),
                'id'   => $prefix . 'post-format-link',
                'type' => 'text'
            ),

        )
    );//Single Box End


    $meta_boxes['vcx-menutype'] = array(
        'id'           => 'vcxmenutype',
        'title'        => esc_html__('Header Menu Variations', 'vcx-theme-core'),
        'object_types' => array('page'), // Tells CMB to use user_meta vs post_meta
        'context'      => 'side',
        'fields'       => array(
            array(
                'name'   =>  esc_html__( 'Menu Style', 'vcx-theme-core' ),
                'id'     => $prefix . 'menu_style',
                'type'     => 'select',
                'default'  => 'default',
                'options'  => array(
                    'default'           => esc_html__( 'Default', 'vcx-theme-core' ),
                    'shadow'            => esc_html__( 'Shadow', 'vcx-theme-core' ),
                    'black-tp '         => esc_html__( 'Black Transparent', 'vcx-theme-core' ),
                    'brand-tp'          => esc_html__( 'Brand Transparent', 'vcx-theme-core' ),
                    'brand-container'   => esc_html__( 'Brand Container', 'vcx-theme-core' ),
                    'normal'        => esc_html__( 'Classic', 'vcx-theme-core' )
                )
            ),

            array(
                'name'   =>  esc_html__( 'Menu Width', 'vcx-theme-core' ),
                'id'     => $prefix . 'menu_width',
                'type'     => 'select',
                'default'  => 'fixed',
                'options'  => array(
                    'container'  => esc_html__( 'Fixed', 'vcx-theme-core' ),
                    'container-fluid'  => esc_html__( 'Full', 'vcx-theme-core' )
                )
            ),
        )
    );//Single Box End



    return $meta_boxes;
}

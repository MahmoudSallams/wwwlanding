<?php
/**
 * Created by PhpStorm.
 * User: Vaskar Jewel
 * Date: 08-Jan-18
 * Time: 4:25 PM
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Don't duplicate me!
if ( ! class_exists( 'LogicHuntPluginExtendedAdmin' ) ) {


    class LogicHuntPluginExtendedAdmin
    {


        /**
         *  Output function of the milestone counter
         * @param null
         * @return array
         */

        public function lgx_owl_carousel_admin_post_args()


        {



            $labels = array(
                'name'               => _x('Carousel Slider', 'Carousel Slider', 'eplano'),
                'singular_name'      => _x('Slider Item', 'Slider Items', 'eplano'),
                'menu_name'          => __('Carousel Slider', 'eplano'),
                'all_items'          => __('All Carousel', 'eplano'),
                'view_item'          => __('View Item', 'eplano'),
                'add_new_item'       => __('Add New Carousel Item', 'eplano'),
                'add_new'            => __('Add New', 'eplano'),
                'edit_item'          => __('Edit Carousel Item', 'eplano'),
                'update_item'        => __('Update Carousel Item', 'eplano'),
                'search_items'       => __('Search Carousel', 'eplano'),
                'not_found'          => __('No Carousel items found', 'eplano'),
                'not_found_in_trash' => __('No Carousel items found in trash', 'eplano')
            );


            //custom post type setup
            $args_lgxcarousel = array(
                'label'               => __('Carousel Slider', 'eplano'),
                'description'         => __('OWL Carousel Slider Post Type', 'eplano'),
                'labels'              => $labels,
                'supports'            => array('title', 'thumbnail'),
                'taxonomies'          => array(''),
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_icon'           => plugins_url('/lgx-owl-carousel/admin/assets/img/owl-logo.png'),
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 25,
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
            );



            // Return Output
            return $args_lgxcarousel;

        } //End MileStone

    }
}
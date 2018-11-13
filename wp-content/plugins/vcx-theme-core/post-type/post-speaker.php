<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Speaker post type
 *
 */



/**
 * Register post type Speaker
 *
 * @return void
 */



function vcx_post_type_speaker() {
    $labels = array(
        'name'               => _x( 'Speaker', 'vcx-theme-core' ),
        'singular_name'      => _x( 'Speaker', 'vcx-theme-core' ),
        'menu_name'          => _x( 'Speakers', 'vcx-theme-core' ),
        'name_admin_bar'     => _x( 'Speaker', 'vcx-theme-core' ),
        'add_new'            => _x( 'Add New', 'vcx-theme-core' ),
        'add_new_item'       => __( 'Add New Speaker', 'vcx-theme-core' ),
        'new_item'           => __( 'Add New', 'vcx-theme-core' ),
        'edit_item'          => __( 'Edit Speaker', 'vcx-theme-core' ),
        'view_item'          => __( 'View Speaker', 'vcx-theme-core' ),
        'all_items'          => __( 'All Speaker', 'vcx-theme-core' ),
        'search_items'       => __( 'Search Speaker', 'vcx-theme-core' ),
        'parent_item_colon'  => __( 'Parent Speaker:', 'vcx-theme-core' ),
        'not_found'          => __( 'No Speaker found.', 'vcx-theme-core' ),
        'not_found_in_trash' => __( 'No Speaker found in Trash.', 'vcx-theme-core' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'vcx-theme-core' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'speaker' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'			 => 'dashicons-admin-users',
        'supports'           => array( 'title', 'editor', 'thumbnail')
    );

    register_post_type( 'speaker', $args );
}

add_action( 'init', 'vcx_post_type_speaker' );
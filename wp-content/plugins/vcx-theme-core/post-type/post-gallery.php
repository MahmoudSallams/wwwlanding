<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Gallery post type
 *
 */



/**
 * Register post type Gallery
 *
 * @return void
 */


function vcx_post_type_gallery()
{
    $labels = array(
        'name'                	=> _x( 'Gallery', 'vcx-theme-core' ),
        'singular_name'       	=> _x( 'Gallery', 'vcx-theme-core' ),
        'menu_name'           	=> __( 'Photo Gallery', 'vcx-theme-core' ),
        'parent_item_colon'   	=> __( 'Parent Gallery:', 'vcx-theme-core' ),
        'all_items'           	=> __( 'All Gallery', 'vcx-theme-core' ),
        'view_item'           	=> __( 'View Gallery', 'vcx-theme-core' ),
        'add_new_item'        	=> __( 'Add New Gallery', 'vcx-theme-core' ),
        'add_new'             	=> __( 'Add New', 'vcx-theme-core' ),
        'edit_item'           	=> __( 'Edit Gallery', 'vcx-theme-core' ),
        'update_item'         	=> __( 'Update Gallery', 'vcx-theme-core' ),
        'search_items'        	=> __( 'Search Gallery', 'vcx-theme-core' ),
        'not_found'           	=> __( 'No article found', 'vcx-theme-core' ),
        'not_found_in_trash'  	=> __( 'No article found in Trash', 'vcx-theme-core' )
    );

    $args = array(
        'labels'             	=> $labels,
        'public'             	=> true,
        'publicly_queryable' 	=> true,
        'show_in_menu'       	=> true,
        'show_in_admin_bar'   	=> true,
        'can_export'          	=> true,
        'has_archive'        	=> true,
        'hierarchical'       	=> false,
        'menu_position'      	=> null,
        'menu_icon'				=> 'dashicons-format-image',
        'supports'           	=> array( 'title', 'thumbnail')
    );

    register_post_type('gallery', $args);

}

add_action('init','vcx_post_type_gallery');

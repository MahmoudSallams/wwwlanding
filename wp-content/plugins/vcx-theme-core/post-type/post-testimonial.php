<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Testimonial post type
 *
 */



/**
 * Register post type Testimonial
 *
 * @return void
 */

function vcx_post_type_testimonial()
{
    $labels = array(
        'name'                	=> _x( 'Testimonial', 'vcx-theme-core' ),
        'singular_name'       	=> _x( 'Testimonial', 'vcx-theme-core' ),
        'menu_name'           	=> __( 'Testimonial', 'vcx-theme-core' ),
        'parent_item_colon'   	=> __( 'Parent Testimonial:', 'vcx-theme-core' ),
        'all_items'           	=> __( 'All Testimonial', 'vcx-theme-core' ),
        'view_item'           	=> __( 'View Testimonial', 'vcx-theme-core' ),
        'add_new_item'        	=> __( 'Add New Testimonial', 'vcx-theme-core' ),
        'add_new'             	=> __( 'Add New', 'vcx-theme-core' ),
        'edit_item'           	=> __( 'Edit Testimonial', 'vcx-theme-core' ),
        'update_item'         	=> __( 'Update Testimonial', 'vcx-theme-core' ),
        'search_items'        	=> __( 'Search Testimonial', 'vcx-theme-core' ),
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
        'menu_icon'				=> 'dashicons-media-interactive',
        'supports'           	=> array( 'title','editor','thumbnail')
    );

    register_post_type('vcxreview',$args);

}

add_action('init','vcx_post_type_testimonial');
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Pricing post type
 *
 */



/**
 * Register post type Pricing
 *
 * @return void
 */

function vcx_post_type_pricing()
{
    $labels = array(
        'name'                	=> _x( 'Pricing', 'vcx-theme-core' ),
        'singular_name'       	=> _x( 'Pricing', 'vcx-theme-core' ),
        'menu_name'           	=> __( 'Pricing', 'vcx-theme-core' ),
        'parent_item_colon'   	=> __( 'Parent Pricing:', 'vcx-theme-core' ),
        'all_items'           	=> __( 'All Pricing', 'vcx-theme-core' ),
        'view_item'           	=> __( 'View Pricing', 'vcx-theme-core' ),
        'add_new_item'        	=> __( 'Add New Pricing', 'vcx-theme-core' ),
        'add_new'             	=> __( 'Add New', 'vcx-theme-core' ),
        'edit_item'           	=> __( 'Edit Pricing', 'vcx-theme-core' ),
        'update_item'         	=> __( 'Update Pricing', 'vcx-theme-core' ),
        'search_items'        	=> __( 'Search Pricing', 'vcx-theme-core' ),
        'not_found'           	=> __( 'No Pricing found', 'vcx-theme-core' ),
        'not_found_in_trash'  	=> __( 'No Pricing found in Trash', 'vcx-theme-core' )
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
        'menu_icon'				=> 'dashicons-list-view',
        'supports'           	=> array( 'title')
    );

    register_post_type('pricing',$args);

}

add_action('init','vcx_post_type_pricing');


/**
 * Register Custom Taxonomies
 */

function vcx_create_pricing_taxonomy()
{
    $labels = array(
        'name'  			=> _x( 'Categories', 'Category','vcx-theme-core'),
        'singular_name'     => _x( 'Category', 'vcx-theme-core' ),
        'search_items'      => __( 'Search Category','vcx-theme-core'),
        'all_items'         => __( 'All Category','vcx-theme-core'),
        'parent_item'       => __( 'Parent Category','vcx-theme-core'),
        'parent_item_colon' => __( 'Parent Category:','vcx-theme-core'),
        'edit_item'         => __( 'Edit Category','vcx-theme-core'),
        'update_item'       => __( 'Update Category','vcx-theme-core'),
        'add_new_item'      => __( 'Add New Category','vcx-theme-core'),
        'new_item_name'     => __( 'New Category Name','vcx-theme-core'),
        'menu_name'         => __( 'Categories','vcx-theme-core')
    );



    $args = array(	'hierarchical' => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );

    register_taxonomy('pricing_cat',array( 'pricing' ),$args);

}
add_action('init','vcx_create_pricing_taxonomy');
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


function vcx_post_type_schedule()
{
	$labels = array(
		'name'                	=> _x( 'Schedule','vcx-theme-core' ),
		'singular_name'       	=> _x( 'Schedule', 'vcx-theme-core' ),
		'menu_name'           	=> __( 'Schedule', 'vcx-theme-core' ),
		'parent_item_colon'   	=> __( 'Parent Schedule:', 'vcx-theme-core' ),
		'all_items'           	=> __( 'All Schedule', 'vcx-theme-core' ),
		'view_item'           	=> __( 'View Schedule', 'vcx-theme-core' ),
		'add_new_item'        	=> __( 'Add New Schedule', 'vcx-theme-core' ),
		'add_new'             	=> __( 'Add New', 'vcx-theme-core' ),
		'edit_item'           	=> __( 'Edit Schedule', 'vcx-theme-core' ),
		'update_item'         	=> __( 'Update Schedule', 'vcx-theme-core' ),
		'search_items'        	=> __( 'Search Schedule', 'vcx-theme-core' ),
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
		'menu_icon'				=> 'dashicons-calendar-alt',
		'supports'           	=> array( 'title','editor','excerpt')
	);

	register_post_type('schedule',$args);

}

add_action('init','vcx_post_type_schedule');


/**
 * Register Custom Taxonomies
 */

function vcx_create_schedule_taxonomy()
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

	register_taxonomy('schedule_cat',array( 'schedule' ),$args);

}
add_action('init','vcx_create_schedule_taxonomy');

<?php
add_action( 'cmb2_init', 'vcx_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function vcx_group_field_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix    = '__vcx__';


    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'vcx-metabox',
        'title'        => __( 'Repeating Pricing Table List Field', 'vcx-event-point' ),
        'object_types' => array( 'pricing' ),
    ) );


    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'pricing-group',
        'type'        => 'group',
        'description' => __( 'Add Table Information', 'vcx-event-point' ),
        'options'     => array(
            'group_title'   => __( 'List Text {#}', 'vcx-event-point' ), // {#} gets replaced by row number
            'add_button'    => __( 'Add New Line', 'vcx-event-point' ),
            'remove_button' => __( 'Remove Entry', 'vcx-event-point' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_group->add_group_field( $group_field_id,
        array(
            'name'       => __( 'List Text', 'vcx-event-point' ),
            'id'         => $prefix .'pricing-list-text',
            'type'       => 'text',
            'repeatable' => false, // Repeatable fields are supported w/in repeatable groups (for most types)
        )
    );

    $cmb_group->add_group_field( $group_field_id,
        array(
            'name'    =>  __('List Style', 'vcx-theme-core'),
            'id'      => $prefix . 'pricing-list-style',
            'type'    => 'radio_inline',
            'options' => array(
                'yes' => __( 'Yes', 'vcx-theme-core' ),
                'no'   => __( 'No', 'vcx-theme-core' ),
            ),
            'default' => 'yes',
        )
    );

}
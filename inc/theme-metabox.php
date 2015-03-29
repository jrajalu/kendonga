<?php

add_action( 'cmb2_init', 'jrwtdw_metaboxes' );

function jrwtdw_metaboxes() {

    $prefix = '_jrwtdw_';

    $cmb = new_cmb2_box( array(
        'id'            => 'test_metabox',
        'title'         => __( 'Test Metabox', 'cmb2' ),
        'object_types'  => array( 'jrwtdw_slideshow' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, 
    ) );

    $cmb->add_field( array(
        'name'    => 'Image File',
        'desc'    => 'Upload an image or enter an URL.',
        'id'      => $prefix . 'slide_image',
        'type'    => 'file',
        'options' => array(
            'url' => false,
        ),
    ) );
}
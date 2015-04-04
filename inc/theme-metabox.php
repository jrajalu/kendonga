<?php

// metabox: slideshow

add_action( 'cmb2_init', 'jrwtdw_slideshow_metaboxes' );

  function jrwtdw_slideshow_metaboxes() {

      $prefix = '_jrwtdw_';

      $cmb = new_cmb2_box( array(
          'id'            => 'slideshow_metabox',
          'title'         => __( 'Slideshow Detail', 'cmb2' ),
          'object_types'  => array( 'slideshow' ),
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

add_action( 'cmb2_init', 'jrwtdw_work_metaboxes' );

  function jrwtdw_work_metaboxes() {

      $prefix = '_jrwtdw_';

      $cmb = new_cmb2_box( array(
          'id'            => 'work_metabox',
          'title'         => __( 'Slideshow Detail', 'cmb2' ),
          'object_types'  => array( 'work' ),
          'context'       => 'normal',
          'priority'      => 'high',
          'show_names'    => true, 
      ) );

      $cmb->add_field( array(
          'name'    => 'Work',
          'desc'    => 'e.g Interior Design & Built for Tan Sri Villa',
          'id'      => $prefix . 'work_name',
          'type'    => 'text',
      ) );

      $cmb->add_field( array(
          'name'    => 'Location',
          'desc'    => 'e.g Serai Saujana Villa',
          'id'      => $prefix . 'work_location',
          'type'    => 'text',
      ) );

      $cmb->add_field( array(
          'name'    => 'Date of Completion',
          'desc'    => 'e.g 2015',
          'id'      => $prefix . 'work_date',
          'type'    => 'text',
      ) );

      $cmb->add_field( array(
          'name'    => 'Value',
          'desc'    => 'e.g MYR 550,000.00',
          'id'      => $prefix . 'work_value',
          'type'    => 'text',
      ) );

  }


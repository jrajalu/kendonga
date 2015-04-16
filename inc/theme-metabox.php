<?php

// metabox: slideshow

add_action( 'cmb2_init', 'jrwtdw_slideshow_metaboxes' );

  function jrwtdw_slideshow_metaboxes() {

      $prefix = '_jrwtdw_';

      $cmb = new_cmb2_box( array(
          'id'            => 'slideshow_metabox',
          'title'         => 'Slideshow Detail',
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

add_action( 'cmb2_init', 'jrwtdw_portfolio_metaboxes' );

  function jrwtdw_portfolio_metaboxes() {

      $prefix = '_jrwtdw_';

      $cmb = new_cmb2_box( array(
          'id'            => 'portfolio_metabox',
          'title'         => 'Porfolio Detail',
          'object_types'  => array( 'portfolio' ),
          'context'       => 'normal',
          'priority'      => 'high',
          'show_names'    => true, 
      ) );

      $cmb->add_field( array(
        'name'         => 'Porfolio Photo',
        'desc'         =>  'Upload or add multiple images/attachments.',
        'id'           => $prefix . 'portfolio_photo',
        'type'         => 'file_list',
        'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
      ) );

  }


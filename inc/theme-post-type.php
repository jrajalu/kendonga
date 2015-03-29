<?php
/**
 * @package Kedong A
 * @author Jamaludin Rajalu
 */

 /**
  * Post Type: Slideshow
  */

function jrwtdw_slideshow() {

  $labels = array(
    'name'                => _x( 'Slides', 'Slide General Name', 'jrwtdw' ),
    'singular_name'       => _x( 'Slides', 'Slide Singular Name', 'jrwtdw' ),
    'menu_name'           => __( 'Slideshow', 'jrwtdw' ),
    'name_admin_bar'      => __( 'Slide', 'jrwtdw' ),
    'parent_item_colon'   => __( 'Parent Item:', 'jrwtdw' ),
    'all_items'           => __( 'All Slides', 'jrwtdw' ),
    'add_new_item'        => __( 'Add New Slide', 'jrwtdw' ),
    'add_new'             => __( 'Add New', 'jrwtdw' ),
    'new_item'            => __( 'New Slide', 'jrwtdw' ),
    'edit_item'           => __( 'Edit Slide', 'jrwtdw' ),
    'update_item'         => __( 'Update Slide', 'jrwtdw' ),
    'view_item'           => __( 'View Slide', 'jrwtdw' ),
    'search_items'        => __( 'Search Slide', 'jrwtdw' ),
    'not_found'           => __( 'Not found', 'jrwtdw' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'jrwtdw' ),
  );
  $args = array(
    'label'               => __( 'jrwtdw_slideshow', 'jrwtdw' ),
    'description'         => __( 'Frontpage slideshow', 'jrwtdw' ),
    'labels'              => $labels,
    'supports'            => array( 'title' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-images-alt2',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'jrwtdw_slideshow', $args );

}

add_action( 'init', 'jrwtdw_slideshow', 0 );
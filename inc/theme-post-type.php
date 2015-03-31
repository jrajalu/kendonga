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

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
add_action('manage_jrwtdw_slideshow_posts_custom_column', 'jrwtdw_jrwtdw_slideshow_custom_columns');
add_filter('manage_edit-jrwtdw_slideshow_columns', 'jrwtdw_add_new_jrwtdw_slideshow_columns');
function jrwtdw_add_new_jrwtdw_slideshow_columns( $columns ){
  $columns = array(
    'cb'                      => '<input type="checkbox">',
    'jrwtdw_slideshow_image'  => __( 'Image', 'ukmtheme' ),
    'title'                   => __( 'Title', 'ukmtheme' ),
    'date'                    => __( 'Date', 'ukmtheme' )
  );
  return $columns;
}
function jrwtdw_jrwtdw_slideshow_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'jrwtdw_slideshow_image' : $url = get_post_meta(get_the_ID(),'_jrwtdw_slide_image',true); echo '<img src="'.$url.'" width="200">';break;
  }
}
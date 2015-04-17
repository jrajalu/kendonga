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
    'all_items'           => __( 'Manage', 'jrwtdw' ),
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
    'label'               => __( 'Slideshow', 'jrwtdw' ),
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
    'capability_type'     => 'post',
  );
  register_post_type( 'slideshow', $args );

}

add_action( 'init', 'jrwtdw_slideshow', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
add_action('manage_slideshow_posts_custom_column', 'jrwtdw_slideshow_custom_columns');
add_filter('manage_edit-slideshow_columns', 'jrwtdw_add_new_slideshow_columns');
function jrwtdw_add_new_slideshow_columns( $columns ){
  $columns = array(
    'cb'              => '<input type="checkbox">',
    'slideshow_image' => __( 'Image', 'jrwtdw' ),
    'title'           => __( 'Title', 'jrwtdw' ),
    'date'            => __( 'Date', 'jrwtdw' )
  );
  return $columns;
}
function jrwtdw_slideshow_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'slideshow_image' : $url = get_post_meta(get_the_ID(),'_jrwtdw_slide_image',true); echo '<img src="'.$url.'" width="200">';break;
  }
}


// Post Type: Porfolio

function jrwtdw_portfolio_list() {

  $labels = array(
    'name'                => _x( 'Portfolios', 'Post Type General Name', 'jrwtdw' ),
    'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'jrwtdw' ),
    'menu_name'           => __( 'Portfolio', 'jrwtdw' ),
    'name_admin_bar'      => __( 'Portfolio', 'jrwtdw' ),
    'parent_item_colon'   => __( 'Parent portfolio:', 'jrwtdw' ),
    'all_items'           => __( 'Manage', 'jrwtdw' ),
    'add_new_item'        => __( 'Add New portfolio', 'jrwtdw' ),
    'add_new'             => __( 'Add New', 'jrwtdw' ),
    'new_item'            => __( 'New portfolio', 'jrwtdw' ),
    'edit_item'           => __( 'Edit portfolio', 'jrwtdw' ),
    'update_item'         => __( 'Update portfolio', 'jrwtdw' ),
    'view_item'           => __( 'View portfolio', 'jrwtdw' ),
    'search_items'        => __( 'Search portfolio', 'jrwtdw' ),
    'not_found'           => __( 'Not found', 'jrwtdw' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'jrwtdw' ),
  );
  $args = array(
    'label'               => __( 'Portfolio', 'jrwtdw' ),
    'description'         => __( 'Kendong A Construction portfolios.', 'jrwtdw' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', 'revisions', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-awards',
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'portfolio', $args );

}

add_action( 'init', 'jrwtdw_portfolio_list', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
add_action('manage_portfolio_posts_custom_column', 'jrwtdw_portfolio_custom_columns');
add_filter('manage_edit-portfolio_columns', 'jrwtdw_add_new_portfolio_columns');
function jrwtdw_add_new_portfolio_columns( $columns ){
  $columns = array(
    'cb'               => '<input type="checkbox">',
    'portfolio_image'  => __( 'Cover', 'jrwtdw' ),
    'title'            => __( 'Title', 'jrwtdw' ),
    'date'             => __( 'Date', 'jrwtdw' )
  );
  return $columns;
}
function jrwtdw_portfolio_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'portfolio_image' : echo get_the_post_thumbnail( $post_id, array( 60, 60) ); break;
  }
}
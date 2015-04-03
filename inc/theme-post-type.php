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


// Post Type: Work List

// Register Custom Post Type
function jrwtdw_work_list() {

  $labels = array(
    'name'                => _x( 'Works', 'Post Type General Name', 'jrwtdw' ),
    'singular_name'       => _x( 'Work', 'Post Type Singular Name', 'jrwtdw' ),
    'menu_name'           => __( 'Work', 'jrwtdw' ),
    'name_admin_bar'      => __( 'Work', 'jrwtdw' ),
    'parent_item_colon'   => __( 'Parent Work:', 'jrwtdw' ),
    'all_items'           => __( 'All Works', 'jrwtdw' ),
    'add_new_item'        => __( 'Add New Work', 'jrwtdw' ),
    'add_new'             => __( 'Add New', 'jrwtdw' ),
    'new_item'            => __( 'New Work', 'jrwtdw' ),
    'edit_item'           => __( 'Edit Work', 'jrwtdw' ),
    'update_item'         => __( 'Update Work', 'jrwtdw' ),
    'view_item'           => __( 'View Work', 'jrwtdw' ),
    'search_items'        => __( 'Search Work', 'jrwtdw' ),
    'not_found'           => __( 'Not found', 'jrwtdw' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'jrwtdw' ),
  );
  $args = array(
    'label'               => __( 'Work', 'jrwtdw' ),
    'description'         => __( 'Kendong A Construction works.', 'jrwtdw' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
    'taxonomies'          => array( 'work' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-hammer',
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'work', $args );

}

// Hook into the 'init' action
add_action( 'init', 'jrwtdw_work_list', 0 );

// Register Custom Taxonomy
function jrwtdw_project_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Projects', 'Taxonomy General Name', 'jrwtdw' ),
    'singular_name'              => _x( 'Project', 'Taxonomy Singular Name', 'jrwtdw' ),
    'menu_name'                  => __( 'Project', 'jrwtdw' ),
    'all_items'                  => __( 'All Projects', 'jrwtdw' ),
    'parent_item'                => __( 'Parent Project', 'jrwtdw' ),
    'parent_item_colon'          => __( 'Parent Project:', 'jrwtdw' ),
    'new_item_name'              => __( 'New Project Name', 'jrwtdw' ),
    'add_new_item'               => __( 'Add New Project', 'jrwtdw' ),
    'edit_item'                  => __( 'Edit Project', 'jrwtdw' ),
    'update_item'                => __( 'Update Project', 'jrwtdw' ),
    'view_item'                  => __( 'View Project', 'jrwtdw' ),
    'separate_items_with_commas' => __( 'Separate Projects with commas', 'jrwtdw' ),
    'add_or_remove_items'        => __( 'Add or remove Projects', 'jrwtdw' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'jrwtdw' ),
    'popular_items'              => __( 'Popular Projects', 'jrwtdw' ),
    'search_items'               => __( 'Search Projects', 'jrwtdw' ),
    'not_found'                  => __( 'Not Found', 'jrwtdw' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
  );
  register_taxonomy( 'project', array( 'work' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'jrwtdw_project_taxonomy', 0 );

// Register Custom Taxonomy
function jrwtdw_project_gallery_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Galleries', 'Taxonomy General Name', 'jrwtdw' ),
    'singular_name'              => _x( 'Gallery', 'Taxonomy Singular Name', 'jrwtdw' ),
    'menu_name'                  => __( 'Gallery', 'jrwtdw' ),
    'all_items'                  => __( 'All Galleries', 'jrwtdw' ),
    'parent_item'                => __( 'Parent Gallery', 'jrwtdw' ),
    'parent_item_colon'          => __( 'Parent Gallery:', 'jrwtdw' ),
    'new_item_name'              => __( 'New Gallery Name', 'jrwtdw' ),
    'add_new_item'               => __( 'Add New Gallery', 'jrwtdw' ),
    'edit_item'                  => __( 'Edit Gallery', 'jrwtdw' ),
    'update_item'                => __( 'Update Gallery', 'jrwtdw' ),
    'view_item'                  => __( 'View Gallery', 'jrwtdw' ),
    'separate_items_with_commas' => __( 'Separate Galleries with commas', 'jrwtdw' ),
    'add_or_remove_items'        => __( 'Add or remove Galleries', 'jrwtdw' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'jrwtdw' ),
    'popular_items'              => __( 'Popular Galleries', 'jrwtdw' ),
    'search_items'               => __( 'Search Galleries', 'jrwtdw' ),
    'not_found'                  => __( 'Not Found', 'jrwtdw' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
  );
  register_taxonomy( 'gallery', array( 'work' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'jrwtdw_project_gallery_taxonomy', 0 );
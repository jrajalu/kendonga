<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */

/**
 * Theme Update Checker
 * @link http://w-shadow.com/blog/2011/06/02/automatic-updates-for-commercial-themes/
 */

require get_template_directory() . '/lib/theme-updates/theme-update-checker.php';
  new ThemeUpdateChecker(
    'kendonga-master',
    'https://github.com/jrajalu/kendonga/blob/master/info.json'
  );

/**
 * Theme Features & Support
 * @link http://generatewp.com/theme-support/
 */

if ( ! function_exists('jrwtdw_theme_features') ) {

  function jrwtdw_theme_features()  {

    add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

    set_post_thumbnail_size( 200, 200, true );

    add_theme_support( 'custom-header', array(
      'default-image' => get_template_directory_uri() . '/img/logo-main.svg',
      'width'         => 960,
      'height'        => 100,
    ));

    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    register_nav_menus( array(
      'primary'   => __( 'Primary Navigation', 'jrwtdw' ),
      'secondary' => __( 'Secondary Navigation', 'jrwtdw' ),
    ));

  }

  add_action( 'after_setup_theme', 'jrwtdw_theme_features' );

}

if ( ! function_exists('jrwtdw_theme_require') ) {

  function jrwtdw_theme_require()  {

    require_once  get_template_directory() . '/lib/cmb2/init.php';

    require_once  get_template_directory() . '/inc/theme-metabox.php';
    require_once  get_template_directory() . '/inc/theme-navmenu.php';
    require_once  get_template_directory() . '/inc/theme-post-type.php';

  }

  add_action( 'after_setup_theme', 'jrwtdw_theme_require' );

}

/**
 * Show admin bar
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/show_admin_bar
 */

function jrwtdw_admin_bar() {
  return false;
}
add_filter( 'show_admin_bar' , 'jrwtdw_admin_bar');



if ( ! function_exists( 'jrwtdw_theme_sidebar' ) ) {

  function jrwtdw_theme_sidebar() {

    register_sidebar( array(
      'id'            => 'sidebar_1',
      'name'          => __( 'Frontpage: One Column', 'jrwtdw' ),
      'description'   => __( 'Full width widget', 'jrwtdw' ),
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
      'before_widget' => '<div class="section group"><div class="col span_12_of_12">',
      'after_widget'  => '</div></div>',
    ));

    register_sidebar( array(
      'id'            => 'sidebar_2',
      'name'          => __( 'Page Sidebar', 'jrwtdw' ),
      'description'   => __( 'Page Sidebar', 'jrwtdw' ),
      'before_title'  => '<h2>',
      'after_title'   => '</h2>',
      'before_widget' => '<div>',
      'after_widget'  => '</div>',
    ));

    register_sidebar( array(
      'id'            => 'sidebar_3',
      'name'          => __( 'Footer: Left', 'jrwtdw' ),
      'description'   => __( 'Footer content', 'jrwtdw' ),
      'before_title'  => '<h2 class="hide">',
      'after_title'   => '</h2>',
      'before_widget' => '<div class="left-footer">',
      'after_widget'  => '</div>',
    ));
  }

  add_action( 'widgets_init', 'jrwtdw_theme_sidebar' );

}


function jrwtdw_wp_admin_scripts() {

  wp_enqueue_style( 'admin', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );

}

add_action( 'admin_enqueue_scripts', 'jrwtdw_wp_admin_scripts' );

if ( ! function_exists( 'jrwtdw_theme_scripts' ) ) {

  function jrwtdw_theme_scripts() {

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri(). '/js/jquery.min.js', array(), '2.3.1', false );
    wp_enqueue_script( 'library', get_template_directory_uri(). '/js/library.all.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'theme', get_template_directory_uri(). '/js/scripts.min.js', array(), '1.0.0', true );

    wp_enqueue_style( 'theme', get_stylesheet_uri(), '1.0.0' );

  }

  add_action( 'wp_enqueue_scripts', 'jrwtdw_theme_scripts' );

}

/**
 * wp_title
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 */

function jrwtdw_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  $title .= get_bloginfo( 'name', 'display' );

  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'jrwtdw' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'jrwtdw_wp_title', 10, 2 );

/**
 * Login Page
 * @link http://codex.wordpress.org/Customizing_the_Login_Form
 */

function jrwtdw_login_logo() { ?>
  <style type="text/css">
    body.login div#login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo-admin.svg);
      -webkit-background-size: 320px;
      background-size: 320px;
      background-position: center top;
      background-repeat: no-repeat;
      color: #999;
      height: 80px;
      font-size: 20px;
      font-weight: 400;
      line-height: 1.3em;
      margin: 0 auto 0;
      padding: 0;
      text-decoration: none;
      width: 320px;
      text-indent: -9999px;
      outline: 0;
      overflow: hidden;
      display: block;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'jrwtdw_login_logo' );

function jrwtdw_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'jrwtdw_login_logo_url' );

function jrwtdw_login_logo_url_title() {
  return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'jrwtdw_login_logo_url_title' );
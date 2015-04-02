<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '&bull;', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
<header class="wrap section group header">
<div class="col span_6_of_12">
  <a href="<?php bloginfo( 'url' ); ?>">
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
  </a>
</div>
<div class="col span_6_of_12">
  <ul class="social-button">
    <li><a href="#"><i class="uk-icon uk-icon-facebook-official"></i></a></li>
    <li><a href="#"><i class="uk-icon uk-icon-instagram"></i></a></li>
  </ul>
</div>
</header>
<div class="nav-wrap">
  <nav class="wrap group">
    <?php 
      wp_nav_menu(array(
        'theme_location'  => 'primary',
        'menu'            => 'Primary Navigation', 
        'container_id'    => 'cssmenu', 
        'walker'          => new CSS_Menu_Maker_Walker()
      )); 
    ?> 
  </nav>
</div>
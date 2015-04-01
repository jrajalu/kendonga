<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */

$args = array(
  'post_type' => 'jrwtdw_slideshow',
  'orderby'   => 'menu_order'
);
$slide = new WP_Query( $args );

?>
<div class="flexslider">
  <ul class="slides">
    <?php if ( $slide->have_posts() ) : while ( $slide->have_posts() ) : $slide->the_post(); ?>

    <li>
      <img src="<?php echo get_post_meta( get_the_ID(), '_jrwtdw_slide_image', true ); ?>" alt="<?php the_title(); ?>">
      <div class="flex-caption-wrap">
      <p class="flex-caption"><?php the_title(); ?></p>
      </div>
    </li>

    <?php  endwhile; else: ?>

      <li>
        <img src="http://placehold.it/960x400" alt="placehold.it">
        <div class="flex-caption-wrap">
          <p class="flex-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, nam?</p>
        </div>
      </li>
      <li><img src="http://placehold.it/960x400" alt="placehold.it"></li>
      <li><img src="http://placehold.it/960x400" alt="placehold.it"></li>

    <?php endif; ?>
  </ul>
</div>
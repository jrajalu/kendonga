<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */

$args = array(
  'post_type' => 'jrwtdw_slideshow',
);
$slide = new WP_Query( $args );

?>
<div id="owl-front" class="owl-carousel owl-theme">
    <?php if ( $slide->have_posts() ) : while ( $slide->have_posts() ) : $slide->the_post(); ?>
    <div class="item">
      <img src="<?php echo get_post_meta( get_the_ID(), '_jrwtdw_slide_image', true ); ?>" alt="<?php the_title(); ?>">
    </div>         
    <?php  endwhile; else: ?>
      <div class="item"><img src="http://placehold.it/1920x800" alt="Placeholder 1"></div>
      <div class="item"><img src="http://placehold.it/1920x800" alt="Placeholder 2"></div>
      <div class="item"><img src="http://placehold.it/1920x800" alt="Placeholder 3"></div>
    <?php endif; ?>
</div>
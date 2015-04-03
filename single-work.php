<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap section group page">
  <div class="col span_12_of_12 article">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <img src="<?php echo get_post_meta( get_the_ID(), '_jrwtdw_work_image', true ); ?>" alt="<?php the_title(); ?>">
  <p><?php the_content(); ?></p>
  <?php endwhile; else: ?>
    <p>Page not found.</p>
  <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="section group">
  <div class="col span_8_of_12 article">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <p><?php the_content(); ?></p>
  <?php endwhile; else: ?>
    <p>Page not found.</p>
  <?php endif; ?>
  </div>
  <div class="col span_4_of_12 sidebar">
  <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>

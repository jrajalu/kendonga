<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */

get_header(); ?>
<div class="wrap page">
  <h1><?php single_cat_title(); ?></h1>
  <div class="section group">
    <ol class="col span_12_of_12 article">
    <?php while ( have_posts() ) : the_post(); ?>
      <li>
        <a href="<?php echo get_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
        <span>Date of Completion: <?php echo get_post_meta( get_the_ID(), '_jrwtdw_work_date', true ); ?></span>&nbsp;|&nbsp;<span>Value: MYR <?php echo get_post_meta( get_the_ID(), '_jrwtdw_work_value', true ); ?></span>
      </li>
    <?php endwhile; ?>
    </ol>
  </div>
</div>
<?php get_footer(); ?>
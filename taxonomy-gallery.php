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
      <li class="section group">
      <div class="col span_2_of_12">
        <?php the_post_thumbnail( 'thumbnail', array('class' => 'circle-image') ); ?>
      </div>
      <div class="col span_10_of_12">
        <a href="<?php echo get_permalink(); ?>"><h2 class="project-title"><?php the_title(); ?></h2></a>
      </div>
      </li>
    <?php endwhile; ?>
    </ol>
  </div>
</div>
<?php get_footer(); ?>
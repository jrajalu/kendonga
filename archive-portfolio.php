<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */

get_header(); ?>
<div class="wrap page">
  <h1><?php post_type_archive_title(); ?></h1>
  <div class="section group">
    <div class="gallery-wrap article">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="gallery-grid">
        <?php the_post_thumbnail( 'thumbnail', array('class' => 'circle-image') ); ?>
        <a href="<?php echo get_permalink(); ?>"><h5 class="project-title"><?php the_title(); ?></h5</a>
      </div>
    <?php endwhile; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
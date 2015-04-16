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
        <a href="<?php echo get_post_type_archive_link( 'gallery' ); ?>"><?php _e('Back to Main','ukmtheme'); ?></a></p>
        <div class="gallery">
        <?php cmb2_output_file_list( '_jrwtdw_portfolio_photo', 'small' ); ?>
        </div> 
    <?php endwhile; else: ?>
      <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
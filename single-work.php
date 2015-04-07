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
    <?php
      $taxonomy = 'gallery';
      $terms = get_terms( $taxonomy, '' );
      if ($terms) {
        foreach($terms as $term) {
          echo '<p>' . '<a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $term->name ) . '" ' . '>Back to Main Index</a></p> ';
        }
      }
    ?>
   <?php the_post_thumbnail( 'full', array('class' => 'project-image') ); ?>
  <p><?php the_content(); ?></p>
  <?php endwhile; else: ?>
    <p>Page not found.</p>
  <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
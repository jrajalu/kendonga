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
        <?php
          $work_name      = get_post_meta( get_the_ID(), '_jrwtdw_work_name', true );
          $work_location  = get_post_meta( get_the_ID(), '_jrwtdw_work_location', true );
          $work_value     = get_post_meta( get_the_ID(), '_jrwtdw_work_value', true );
          $work_date      = get_post_meta( get_the_ID(), '_jrwtdw_work_date', true );
        ?>
        <a href="<?php echo get_permalink(); ?>"><h3><?php echo $work_name;  ?>&nbsp;-&nbsp;<?php echo $work_location;  ?></h3></a>
        <span>Date of Completion: <?php echo $work_date; ?></span>&nbsp;|&nbsp;<span>Value: MYR <?php echo $work_value; ?></span>
      </li>
    <?php endwhile; ?>
    </ol>
  </div>
</div>
<?php get_footer(); ?>
<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap front-content">

<?php get_template_part( 'content', 'slider' ); ?>

<?php if (dynamic_sidebar( 'sidebar_1' )) : else : endif; ?>

</div>

<?php get_footer(); ?>
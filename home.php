<?php
/**
 * @package Kendong_A
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="carousel-wrap group">
<?php get_template_part( 'content', 'slider' ); ?>
</div>
<div class="wrap front-content">

<?php if (dynamic_sidebar( 'sidebar_1' )) : else : endif; ?>

</div>

<?php get_footer(); ?>
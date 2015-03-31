<div class="push"></div>
</div><!--wrapper-->
<footer>
  <nav class="wrap">
    <?php
      wp_nav_menu( array(
        'theme_location'    => 'secondary',
        'menu'              => 'Secondary Navigation',
        'menu_class'        => 'footer-nav',
      ));
    ?>
  </nav>
<div class="wrap section group">
  <div class="col span_6_of_12"><?php if (dynamic_sidebar( 'sidebar_3' )) : else : endif; ?></div>
  <div class="col span_6_of_12">&nbsp;</div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
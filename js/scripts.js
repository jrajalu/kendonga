( function( $ ) {

$(document).ready(function() {

  // flexslider

  $("#owl-front").owlCarousel({
 
      autoPlay: 10000,
      navigation : true, // Show next and prev buttons
      navigationText: ["<",">"],
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });

  // navmenu

  $('#cssmenu').prepend('<div id="menu-button">Menu</div>');

  $('#cssmenu #menu-button').on('click', function(){

    var menu = $(this).next('ul');

    if (menu.hasClass('open')) {

      menu.removeClass('open');

    }

    else {

      menu.addClass('open');

    }

  });

});

} )( jQuery );
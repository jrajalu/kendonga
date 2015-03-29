( function( $ ) {

$(document).ready(function() {

  // flexslider

  $('.flexslider').flexslider({
    animation: "slide"
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
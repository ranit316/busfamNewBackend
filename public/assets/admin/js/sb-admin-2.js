(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  // $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
  //   $("body").toggleClass("sidebar-toggled");
  //   $(".sidebar").toggleClass("toggled");
  //   if ($(".sidebar").hasClass("toggled")) {
  //     $('.sidebar .collapse').collapse('hide');
  //   };
  // });

  // Close any open menu accordions when window is resized below 768px
  // $(window).resize(function() {
  //   if ($(window).width() < 768) {
  //     $('.sidebar .collapse').collapse('hide');
  //   };
    
  //   // Toggle the side navigation when window is resized below 480px
  //   if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
  //     $("body").addClass("sidebar-toggled");
  //     $(".sidebar").addClass("toggled");
  //     $('.sidebar .collapse').collapse('hide');
  //   };
  // });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  // $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
  //   if ($(window).width() > 768) {
  //     var e0 = e.originalEvent,
  //       delta = e0.wheelDelta || -e0.detail;
  //     this.scrollTop += (delta < 0 ? 1 : -1) * 30;
  //     e.preventDefault();
  //   }
  // });


  let previousWidth = $(window).width();

$(window).resize(function() {
  let currentWidth = $(window).width();
  
  // Only proceed if the width changes significantly
  if (Math.abs(previousWidth - currentWidth) > 100) {
    previousWidth = currentWidth;

    if (currentWidth < 768) {
      $('.sidebar .collapse').collapse('hide');
    }

    if (currentWidth < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    }
  }
});

$('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
  if ($(window).width() > 768 && !("ontouchstart" in document.documentElement)) {
    var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  }
});

$("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
  e.stopPropagation(); // Prevent event bubbling
  $("body").toggleClass("sidebar-toggled");
  $(".sidebar").toggleClass("toggled");
  if ($(".sidebar").hasClass("toggled")) {
    $('.sidebar .collapse').collapse('hide');
  }

  if ($(".sidebar").hasClass("toggled")) {
    $(".publish-row").addClass("publish-adjust");
  } else {
    $(".publish-row").removeClass("publish-adjust");
  }

});

// Disable toggle behavior for input fields
$("input, textarea, select").on('focus', function(e) {
  e.stopPropagation(); // Stop focus event from interfering with sidebar
});


  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict



// backto-top btn script
var btn = jQuery('#backto-top');
jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 100) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '1000');
});
// backto-top btn script end


/* 
   Sticky Nav
   ========================================================================== */

   window.onscroll = function() {myFunction()};
   var navbar = document.getElementById("navbar");
   var sticky = navbar.offsetTop;
   function myFunction() {
     if (window.pageYOffset >= 40) {
       navbar.classList.add("sticky")
     } else {
       navbar.classList.remove("sticky");
     }
   }
  //  Pre Loader TImeOut
   setTimeout(function(){
    $('.loader_bg').fadeToggle();
    }, 500);

    // Contact Page Validation

   (function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          if (form.checkValidity() === true) {
            alert("Email has been Sent");
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

 // jQuery counterUp
 $('[data-toggle="counter-up"]').counterUp({
  delay: 10,
  time: 1000
});

// How It Works
$(document).ready(function() {
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    items : 4,
    responsive: {
      0: {
          items: 1,
      },
      400: {
          items: 1,
      },
      600: {
          items: 2,
      },
      700: {
          items: 3,
      },
      1000: {
          items: 4,
      }
  },
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 5000,
   autoplayHoverPause: false
  });
})


//Active liks
$(document).on('click', 'ul li a', function(){
  $(this).addClass('active').siblings().removeClass('active')
})
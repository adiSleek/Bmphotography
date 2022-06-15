
// // Set button to click.
// var button = document.getElementById( 'menu-toggle' );

// // Click the button.
// button.onclick = function() {

//   // Toggle class "opened". Set also aria-expanded to true or false.
//   if ( -1 !== button.className.indexOf( 'opened' ) ) {
//     button.className = button.className.replace( ' opened', '' );
//     button.setAttribute( 'aria-expanded', 'false' );
//   } else {
//      button.className += ' opened';
//     button.setAttribute( 'aria-expanded', 'true' );
//    }

//  };

// $(document).ready(function(){
//     $(".mega-toggle-on").on({
//         mouseenter: function(){
//             $(".mega-menu-link").css("color", "red");
//         }
//     });    
// });

jQuery(document).ready(function(){

  jQuery(".hamburger").click(function(){
    jQuery(this).toggleClass("is-active");
  });
  jQuery( ".mega-menu-link" ).click(function() {
    alert();
  });
  



  jQuery("#author_bio_wrap_toggle").click(function()
  {
    jQuery("#author_bio_wrap").slideToggle( "slow");

  });
 
 jQuery('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });

var $st = jQuery('.pagination');
var $slickEl = jQuery('.center');

$slickEl.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
  var i = (currentSlide ? currentSlide : 0) + 1;
  $st.text(i + ' of ' + slick.slideCount);
});

    jQuery(".photograph-slider").slick({
      centerMode: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 1500,
      arrows:true,
      prevArrow: '<button class="slick-prev" aria-label="Next" type="button"><img src="'+my_object.siteurl+'/wp-content/uploads/2022/04/left-arrow.png"></button>',
      nextArrow: '<button class="slick-next" aria-label="Next" type="button"><img src="'+my_object.siteurl+'/wp-content/uploads/2022/04/right-arrow.png"></button>',
              responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
  });


});
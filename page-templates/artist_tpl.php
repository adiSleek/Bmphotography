<?php 
/* Template Name: Artist*/

get_header(); 

global $post;
?>
<section class="hero hero-about">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-6">
        <div class="content">
          <span class="caps"><strong><?php the_field('sec1_head', $post->ID); ?></strong></span>
          <h1 class="h1"><?php the_field('sec1_title', $post->ID); ?></h1>
          <p><?php the_field('sec1_content', $post->ID); ?></p>
        </div>
      </div>
      <div class="col-lg-7 col-md-6">
          <div class="about-hero-bg">
             <img src="<?php the_field('sec1_img', $post->ID); ?>" alt="">
          </div>
      </div>
    </div>
  </div>
</section>

<section class="about-hero-bottom">
  <div class="container">
    <?php the_field('section_2', $post->ID); ?>
   </div>
</section>

<!-- Slider Start From Here  -->
<section class="photograph">
  <div class="container">
    <div class="photograph-slider center">
      <?php $i = 1;
       $sec2_repet = get_field('sec2_repet', $post->ID); 
        foreach ($sec2_repet as $sec2_key => $sec2_val) { ?>
          <!--   Img 1 DIV Start -->
      <div class="element element-<?php echo $i; ?>">
        <div class="ttt">
          <img src="<?php echo $sec2_val['sec2_subimg']; ?>">
        </div>
        <div class="photograph-content">
          <h2><?php echo $sec2_val['sec2_subhead']; ?></h2>
           <?php echo $sec2_val['sec2_subcontent']; ?>
        </div>
      </div>
      <!--   Img 1 DIV End -->
      <?php $i++; }
      ?>
      

      <!--   Img 2 DIV Start -->
     <!--  <div class="element element-2">
        <div class="ttt">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/artist-slider.jpg">
        </div>
        <div class="photograph-content">
          <h2>First Photograph</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
 

   
      <div class="element element-3">
        <div class="ttt">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/artist-slider.jpg">
        </div>
        <div class="photograph-content">
          <h2>First Photograph</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
   
      <div class="element element-4">
        <div class="ttt">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/artist-slider.jpg">
        </div>
        <div class="photograph-content">
          <h2>First Photograph</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>

      <div class="element element-1">
        <div class="ttt">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/artist-slider.jpg">
        </div>
        <div class="photograph-content">
          <h2>First Photograph</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div> -->
      <!--   Img 5 DIV End -->
    </div>
    <div class="pagination"></div>
  </div>
</section>
<!-- Slider End Here -->



<section class="award-slider">
  <div class="container">
    <h2><?php the_field('sec3_head', $post->ID); ?></h2>
    <div class="customer-logos slider">
       <?php
       $sec3_repet = get_field('sec3_repet', $post->ID); 
        foreach ($sec3_repet as $sec3_key => $sec3_val) { ?>
          <!--   Img 1 DIV Start -->
         <div class="slide"><img src="<?php echo $sec3_val['sec3_image']; ?>"></div>
      <!--   Img 1 DIV End -->
      <?php } ?>
      <!-- <div class="slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/award-slide2.jpg"></div>
      <div class="slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/award-slide3.jpg"></div>
      <div class="slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/award-slide4.jpg"></div>
      <div class="slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/award-slide5.jpg"></div> -->
      
    </div>
  </div>
</section>

<script>
  jQuery(()=>{
    var createSlick = ()=>{
      let slider = jQuery(".slider");

      slider.not('.slick-initialized').slick({
        autoplay: false,
        infinite: true,
        dots: false,
        slidesToShow: 4,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            adaptiveHeight: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        ],
      });
    }

    createSlick();

    jQuery(window).on( 'resize orientationchange', createSlick );
  })

</script>
<?php get_footer(); ?>

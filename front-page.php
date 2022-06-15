<?php

get_header();

global $post;
$arr1 = $arr2 = $arr3 = $arr4 = array();
?>

<!-- banner-section-end -->
<section class="banner">
  <?php 
  $ban_rep = get_field('banner_img', $post->ID); 
  foreach ($ban_rep as $ban_key => $ban_val) {
   $arr1[] = $ban_val['banner_sub_img'];
  }
  $ban_img = get_option( 'bm_banner_image' );

  ?>
  <img src="<?php echo esc_url($arr1[$ban_img]); ?>" alt="" class="img-fluid w-100 zoom">
  <button class="view-more-trigger button" style="z-index: 30;" id=""  data-toggle="modal" data-target="#largeModal">
 <i class="fa fa-picture-o" aria-hidden="true"></i>
 More
</button>
</section>



<!-- banner-section-end -->

<!-- banner-bottom-section-end -->
<section class="banner-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 my-auto" data-aos="fade-down"
      data-aos-easing="linear"
      data-aos-duration="1000">
      <div class="">
        <h5><?php the_field('sec5_head', $post->ID); ?></h5>
        <h2><?php the_field('sec5_title', $post->ID); ?></h2>
       <?php the_field('sec5_content', $post->ID); ?>
        <a href="<?php echo site_url().'/collections/new-releases/'; ?>">Shop Now <span><i class="fa fa-long-arrow-right"></i></span></a>
      </div>
    </div>
    <div class="col-lg-8 col-md-6 order-first order-md-0">
      <?php 
        //show delayed image after three days
       show_image_home(); 

       ?>
      <!-- <img src="<?php the_field('sec5_img', $post->ID); ?>" alt="" class="img-fluid"> -->
    </div>
  </div>
</div>
</section>
<!-- banner-bottom-section-end -->
<?php
$meta_query  = WC()->query->get_meta_query();
  $tax_query   = WC()->query->get_tax_query();
  $tax_query[] = array(
      'taxonomy' => 'product_visibility',
      'field'    => 'name',
      'terms'    => 'featured',
      'operator' => 'IN',
  );

  $args = array(
      'post_type'           => 'product',
      'post_status'         => 'publish',
      'ignore_sticky_posts' => 1,
      'posts_per_page'      => 1,
      'orderby'             => 'date',
      'order'               => 'DESC',
      'meta_query'          => $meta_query,
      'tax_query'           => $tax_query,
  );
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
     while ( $loop->have_posts() ) : $loop->the_post();

      ?>

<!-- Province-section-end -->
<div class="province-container">
  <?php if ( has_post_thumbnail()) {
       $wc_feat_img = wp_get_attachment_image_src( get_post_thumbnail_id($loop->ID), 'large');
     }
  ?>
  <section class="province-bottom" style="background-image: url(<?php echo $wc_feat_img[0]; ?>)">
  <div class="container">
    <div class="row">
      <div class="col-md-12" data-aos="fade-down"data-aos-easing="linear" data-aos-duration="1000">
      <div class="province-bottom-txt">
        <h2 class="text-white"><?php the_title(); ?></h2>
        <p class="text-white"><?php echo strip_tags(get_the_content(), $loop->post->ID); ?> </p>
        <a href="<?php echo get_permalink(); ?>">buy Now <span><i class="fa fa-long-arrow-right"></i></span></a>
      </div>
    </div>
  </div>
</div>
</section>
</div>

<?php
 endwhile;
} else {
    echo __( 'No products found' );
}
wp_reset_postdata();
?>
<!-- Province-section-end -->

<!-- banner-bottom-section-end -->
<section class="banner-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-6">
        <?php 
          
          $best_seller_rep = get_field('sec6_image', $post->ID); 
          foreach ($best_seller_rep as $best_seller_key => $best_seller_val) {
           $arr2[] = $best_seller_val['sec6_sub_img'];
          }
          $bm_best_seller_img = get_option( 'bm_best_seller_image' ); 
          ?>
        <img src="<?php echo esc_url($arr2[$bm_best_seller_img]); ?>" alt="" class="img-fluid">
      </div>
      <div class="col-lg-4 col-md-6 my-auto" data-aos="fade-down"
      data-aos-easing="linear"
      data-aos-duration="1000">
      <div class="ml-5 txt-ut">
        <h5><?php the_field('sec6_head', $post->ID); ?></h5>
        <h2><?php the_field('sec6_title', $post->ID); ?></h2>
       <?php the_field('sec6_content', $post->ID); ?>
        <a href="<?php echo site_url().'/collections/bestsellers/'; ?>">Shop Now <span><i class="fa fa-long-arrow-right"></i></span></a>
      </div>
    </div>
  </div>
</div>
</section>
<!-- banner-bottom-section-end -->

<!--  Editions-section-end -->
<section class="banner-bottom editions-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="editions-bottom-txt" data-aos="fade-right"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine"
        data-aos-duration="1000">
        <h5><?php the_field('sec2_head', $post->ID); ?></h5>
        <h2><?php the_field('sec2_txt', $post->ID); ?></h2>
        <p><?php the_field('sec2_content', $post->ID); ?></p>
        <a href="<?php echo site_url().'/collections/open-edition/'; ?>">Shop Now <span><i class="fa fa-long-arrow-right"></i></span></a>
      </div>
    </div>
    <div class="col-lg-8 col-md-6 order-first order-md-0">
       <?php 
          $open_edition_rep = get_field('sec2_image', $post->ID); 
          foreach ($open_edition_rep as $open_edition_key => $open_edition_val) {
           $arr3[] = $open_edition_val['sec2_sub_img'];
          }
          $open_edition_img = get_option( 'bm_open_edition_image' );

        ?>
      <img src="<?php echo esc_url($arr3[$open_edition_img]); ?>" alt="" class="img-fluid w-100">
    </div>
  </div>
</div>
</section>
<!--  Editions-section-end -->
<!-- Master-section-start -->
<section class="banner-bottom master">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 my-auto" data-aos="fade-right"
      data-aos-offset="300"
      data-aos-easing="ease-in-sine"
      data-aos-duration="1000">
      <div class="">
        <h3><?php the_field('sec3_txt', $post->ID); ?></h3>
        <p><?php the_field('sec3_content', $post->ID); ?></p>
        <a href="<?php echo esc_url(site_url().'/the-artist/'); ?>" id="author_bio_wrap_toggle">read more <span><i class="fa fa-long-arrow-right"></i></span></a>
      </div>
    </div>
    <div class="col-lg-8 col-md-6 order-first order-md-0">
      <img src="<?php the_field('sec3_img', $post->ID); ?>" alt="" class="img-fluid">
    </div>
  </div>
</div>
</section>
<!-- Master-section-end -->

<!-- master-bottom-section-start -->
<section class="master-bottom" id="author_bio_wrap" style="display: none;">
  <div class="container">
    <?php the_field('sec3_content2', $post->ID); ?>
   <!--  <p>Growing up in Denmark, I feel lucky as Denmark is blessed with beauty and nature, picturesque landscapes, and unique culture. When I got my first camera at the age of 10, I looked through the viewfinder and knew immediately that I had just met my destiny. From that moment on, I wanted to capture and explore the world with my camera.  </p>
    <p>My travels have taken me to the most amazing places around the world. Today, I can proudly look at my works of art, all of which are unique and offer photogenic glimpses created at stunning sceneries. In addition, I have met and portrayed the most beautiful and exciting people.</p>
    <p>So, don´t worry as I am not hanging up my camera yet. There are many more unique shots waiting out there and I can´t wait to share them with the rest of the world.</p> -->
  </div>
</section>
<!-- master-bottom-section-end -->

<!-- Art-section-end -->
<section class="banner-bottom art">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
         <?php 
          $limited_edition_rep = get_field('sec4_image', $post->ID); 
          foreach ($limited_edition_rep as $limited_edition_key => $limited_edition_val) {
           $arr4[] = $limited_edition_val['sec4_sub_img'];
          }
          $limited_edition_img = get_option( 'bm_limited_edition_image' );

        ?>
        <img src="<?php echo esc_url($arr4[$limited_edition_img]); ?>" alt="" class="img-fluid">
      </div>
      <div class="col-md-6 my-auto px-4" data-aos="fade-left"
      data-aos-offset="300"
      data-aos-easing="ease-in-sine"
      data-aos-duration="1000">
      <div class="ml-5 txt-ut">
        <h3> <?php the_field('sec4_txt', $post->ID); ?></h3>
         <?php the_field('sec4_content', $post->ID); ?>
       <!--  <p>Check out our selection of nature and culture with Christian Nørgaard´s collection of Limited Edition Fine Art Photography.</p>
        <p>Display the beauty of the Earth throughout your home, whether you want to showcase breathtaking views of the Himalayas, majestic rivers, or amazing people from around the globe.</p>
        <p>Speak with an Art Manager today to assist you in selecting the right art that fits your space.</p> -->
        <a href="<?php echo esc_url(site_url().'/contact-us'); ?>">contact <span><i class="fa fa-long-arrow-right"></i></span></a>
      </div>
    </div>
  </div>
</div>
</section>
<!-- Art-section-end -->



<?php get_footer(); ?>

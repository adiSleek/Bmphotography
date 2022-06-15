<?php /* Template Name: Process */
get_header();

global $post;
?>
<!-- header-section-end -->
<section class="banner-bottom process-bottom process-banner">
    <?php $ban_img = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
  <img src="<?php echo esc_url($ban_img); ?>" alt="" class="img-fluid w-100">
    <!-- <h2 class="process-bottom-txt"><?php the_field('process_head', $post->ID); ?></h2> -->
</section>



<?php // Check rows exists.
$i = 1;
if( have_rows('process_repet') ):
    // Loop through rows.
    while( have_rows('process_repet') ) : the_row();
        // Load sub field value.
        $sub_head = get_sub_field('process_subhead');
        $sub_title = get_sub_field('process_subtitle');
        $sub_content = get_sub_field('process_subcontent');
        $sub_img = get_sub_field('process_subimg');
if($i%2 != 0){
   ?>

<section class="banner-bottom process-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 my-auto aos-init" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
        <div class="">
          <h5><?php echo $sub_head; ?></h5>
          <h2><?php echo $sub_title; ?></h2>
          <?php echo $sub_content; ?>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 order-first order-md-0">
        <img src="<?php echo esc_url($sub_img); ?>" alt="" class="img-fluid float-right">
      </div>
    </div>
  </div>
</section>
<?php } else { ?>

<section class="banner-bottom process-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-6 order-first order-md-0">
        <img src="<?php echo esc_url($sub_img); ?>" alt="" class="img-fluid float-left">
      </div>
      <div class="col-lg-4 col-md-6 my-auto aos-init" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
        <div class="">
          <h5><?php echo $sub_head; ?></h5>
          <h2><?php echo $sub_title; ?></h2>
          <?php echo $sub_content; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}
$i++;
endwhile;
endif;
?>
<!-- <section class="banner-bottom process-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-8 order-first order-md-0">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process-bottom-img1.jpg" alt="" class="img-fluid float-left">
      </div>
      <div class="col-md-4 my-auto aos-init" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
        <div class="">
          <h5>THE PROCESS OF</h5>
          <h2>Perfection</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="banner-bottom process-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-4 my-auto aos-init" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
        <div class="">
          <h5>A DEDICATION TO</h5>
          <h2>The Details</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
        </div>
      </div>
      <div class="col-md-8 order-first order-md-0">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process-bottom-img2.jpg" alt="" class="img-fluid float-right">
      </div>
    </div>
  </div>
</section>

<section class="banner-bottom process-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-8 order-first order-md-0">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process-bottom-img3.jpg" alt="" class="img-fluid float-left">
      </div>
      <div class="col-md-4 my-auto aos-init" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
        <div class="">
          <h5>A COMMITMENT TO PROTECT</h5>
          <h2>Edition Integrity</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
        </div>
      </div>
    </div>
  </div>
</section> -->

<?php get_footer(); ?>



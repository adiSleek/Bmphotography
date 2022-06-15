<?php /* Template Name: Contact */
get_header(); 

global $post;
?>
<!-- header-section-end -->
<section class="contact-banner ">
    <?php $ban_img = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
  <img src="<?php echo esc_url($ban_img); ?>" alt="" class="img-fluid w-100">
</section>

<section class="banner-bottom contact-bottom"> 
  <div class="container"> 
  	<?php echo do_shortcode('[ninja_form id=2]'); ?>
  </div>
</section>

<?php get_footer(); ?>
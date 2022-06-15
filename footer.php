<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bmphotography
 */

?>
<!-- Footer -->
<footer style="background-image: url(<?php the_field('footer_background', 'options'); ?>);">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-3">
          <h5 class="foot-txt text-uppercase"><?php the_field('footer_nav_head', 'options'); ?></h5>

          <ul class="list-unstyled mb-0">
          	 <?php 
		               
                   wp_nav_menu(
                      array(
                         'container'  => '',
                         'items_wrap' => '%3$s',
                         'menu'   => 'Footer Menu',
                         'add_a_class' => 'text-white',
                      )
                   );

              ?>
         <!--    <li>
              <a href="#!" class="text-white">The Gellery</a>
            </li>
            <li>
              <a href="#!" class="text-white">The Artist</a>
            </li>
            <li>
              <a href="#!" class="text-white">Shop</a>
            </li>
            <li>
              <a href="#!" class="text-white">The Process</a>
            </li> -->
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-3">
          <h5 class="foot-txt text-uppercase"><?php the_field('footer_nav_head2', 'options'); ?></h5>

          <ul class="list-unstyled mb-0">
          	 <?php 
		               
                   wp_nav_menu(
                      array(
                         'container'  => '',
                         'items_wrap' => '%3$s',
                         'menu'   => 'Footer Menu2',
                         'add_a_class'  => 'text-white',
                      )
                   );

              ?>
           <!--  <li>
              <a href="#!" class="text-white">Cart</a>
            </li>
            <li>
              <a href="#!" class="text-white">Register</a>
            </li>
            <li>
              <a href="#!" class="text-white text-left">Login</a>
            </li> -->
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-3">
          <h5 class="foot-txt text-uppercase"><?php the_field('footer_nav_head3', 'options'); ?></h5>
          <?php 
          if(is_active_sidebar('sidebar-4')) {
  				dynamic_sidebar('sidebar-4');
  			}	
  			?>
          <!-- <ul class="list-unstyled mb-0">
            <li>
              <a href="tel: 1234567890" class="text-white">Phone: (000) 111-2222</a>
            </li>
            <li>
              <a href="mailto:info@driveautoagency.com.au" class="text-white">Email Id: info@domin.com</a>
            </li>
            <li>
              <a href="#!" class="text-white">Address:Lorem ipsum dolor sit amet, consectetuer NH 0000</a>
            </li>
          </ul> -->
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-3">
          <h5 class="foot-txt text-uppercase"><?php the_field('footer_nav_head4', 'options'); ?></h5>

          <ul class="list-unstyled mb-0">
          	 <?php 
		               
                   wp_nav_menu(
                      array(
                         'container'  => '',
                         'items_wrap' => '%3$s',
                         'menu'   => 'Footer Menu3',
                         'add_a_class'  => 'text-white',
                      )
                   );

              ?>
   
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->

  </div>
  <!-- Grid container -->
  <!-- Section: Social media -->
  <section class="mt-3 mb-2 text-center">
  		<?php 
  			if(is_active_sidebar('sidebar-3')) {
  				dynamic_sidebar('sidebar-3');
  			}	
  		?>

  <!--   <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fa fa-facebook"></i></a>


    <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fa fa-twitter"></i></a>


    <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fa fa-instagram"></i></a>


    <a class="btn btn-denger btn-floating m-1" style="background-color: #ca1c00" href="#!" role="button"><i class="fa fa-youtube text-white"></i></a> -->
  </section>
  <!-- Section: Social media -->

  <!-- Copyright -->
  <div class="text-center p-3">
    <a class="cop-sec" href="#">Copyright <?php echo date('Y'); ?> <?php the_field('footer_text', 'options'); ?>
    </a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<?php 
// Get shirts. 
$args = array(
    'category' => array( 'open-edition' ),
    'limit' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
    'status' => 'publish',
);
$products = wc_get_products( $args );
foreach ($products as $products_key => $products_val) {
  $terms = get_the_terms( $products_val->get_id(), 'product_cat' );
  $wc_feat_img = wp_get_attachment_image_src( get_post_thumbnail_id($products_val->get_id()), 'single-post-thumbnail'); 
?>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg d-flex  align-items-center">
    <div class="modal-content">
      <button type="button" class="close mod-btn" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-body modal-body-sec ">
        <div class="row no-gutters">
          <div class="col-md-6">
            <img src="<?php echo esc_url($wc_feat_img[0]); ?>">
          </div>
          <div class="col-md-6 p-5">
           <!-- <h5>Consectetuer </h5> -->
           <h2><?php echo $products_val->name; ?></h2>
           <p><?php echo $products_val->short_description; ?></p>
           <article><?php echo $terms[0]->name; ?></article>
           <h3>$<?php echo $products_val->get_regular_price(); ?></h3>
           <a href="<?php echo get_permalink($products_val->get_id()); ?>">Shop Now <span><i class="fa fa-long-arrow-right"></i></span></a>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script type="text/javascript">

	jQuery(function(){
    var flag=0;
		jQuery('.mega-menu-link').on('click', function(){
			jQuery('header').addClass('main-nt-sub'); 

		}); 
		jQuery('body').on('click', function(){
        jQuery('.mega-sub-menu').on('click', function(){
          return false;
        });
        if(jQuery(".main-nt-sub")[0]){
          if(flag==0){ 
             jQuery('header').addClass('main-nt-sub');
            flag=1;
          }else{ 
            jQuery('header').removeClass('main-nt-sub');
             flag=0;
          }
        }else{ 
          jQuery('header').removeClass('main-nt-sub');
        }
			}); 

       if ( jQuery( 'ul.product-categories' ).hasClass('product-categories') ) {
            // ADD YOUR NEW CLASS TO SOME OTHER (OR SAME) SELECTOR
            jQuery( 'ul.product-categories' ).addClass( 'subnav-links' );         
        }

     jQuery(window).load(function() {
      // Animate loader off screen
      jQuery(".se-pre-con").fadeOut("slow");;
    });

	});
  
</script>

<!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script> -->
<!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper/js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/webslidemenu.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/body-scroll-lock2.4"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/theme.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script> -->
<script>
  AOS.init();
</script>

<?php wp_footer(); ?>

</body>
</html>
	

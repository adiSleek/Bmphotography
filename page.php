<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bmphotography
 */
 
get_header( 'shop' );
?>

<section class="product-page inner-page">
    <div class="container">
        <div class="row">
        	 <div class="col-lg-12 col-md-12">
        	<?php while ( have_posts() ) :
			the_post(); ?>

			<!-- /wp:shortcode --><?php 
			if(is_cart()){

				echo do_shortcode('[woocommerce_cart]'); 

			}else if(is_checkout()){

				echo do_shortcode(' [woocommerce_checkout] '); 

			}else if(is_account_page()){

				echo do_shortcode('[woocommerce_my_account]'); 
			}
			// else{
			// 	get_template_part( 'template-parts/content', 'page' );
			// }
			

			 ?><!-- /wp:shortcode -->
		<?php endwhile; 

		?>
			</div>
	    </div>
	</div>
</section>

<?php
get_footer( 'shop' );

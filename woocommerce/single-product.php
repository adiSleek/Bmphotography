<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>
<script type="text/javascript">
	 jQuery(function(){
		console.log("DOM loaded");
		var image_to_show = '';
	    var variations = JSON.parse(jQuery(".variations_form").attr("data-product_variations"));
	    if(variations) {
	        var first_attr = Object.keys(variations[0].attributes)[0];
	        // when swatch button is clicked
	        jQuery("select[data-attribute_name='"+first_attr+"']").on('change',function() {
	            var choice = jQuery(this).find(":selected").val();
	            var found = false;
	            // loop variations JSON
	            for(const i in variations) {
	                if(found) continue;
	                if(variations.hasOwnProperty(i)) {
	                    // if first attribute has the same value as has been selected
	                    if (choice === variations[i].attributes[Object.keys(variations[0].attributes)[0]]) {
	                        // change featured image
	                        image_to_show = variations[i].image.full_src;
	                        found = true;
	                       // console.log(variations) 
	                        console.log(image_to_show)
	                        jQuery(".attachment-shop_single").attr("src", image_to_show).removeAttr("srcset");
	                    }else{
	                    	//console.log(variations[i].attributes[Object.keys(variations[0].attributes)[0]])
	                    	 //console.log(false)
	                    }
	                }
	            }
	        });

	        // after woo additional images has changed the image, change it again
	        // jQuery(".variations_form").on("wc_additional_variation_images_frontend_image_swap_done_callback", function() {
	        //     if(image_to_show.length) {
	               
	        //     }
	        // });

	    }

	// 	var image_to_show = '';

	// 	var variations = JSON.parse(jQuery(".variations_form").attr("data-product_variations"));

	// 	if(variations) {

	// 		var first_attr = Object.keys(variations[0].attributes)[0];
	// 		console.log(first_attr)
	// 		// when swatch button is clicked

	// 		jQuery("select[data-attribute_name='"+first_attr+"']").on('change', function() {

	// 		var choice = jQuery(this).attr("data-value");

	// 		var found = false;

	// 		// loop variations JSON

	// 		for(const i in variations) {

	// 		if(found) continue;

	// 		if(variations.hasOwnProperty(i)) {

	// 		// if first attribute has the same value as has been selected

	// 		if (choice === variations[i].attributes[Object.keys(variations[0].attributes)[0]]) {

	// 		// change featured image

	// 		image_to_show = variations[i].image.src;
	// 		console.log(image_to_show);

	// 		found = true;
	// 		jQuery(".wp-post-image").attr("src", image_to_show).removeAttr("srcset");

	// 		}

	// 		}

	// 		}

	// 	});

	// 	// // after woo additional images has changed the image, change it again

	// 	// jQuery(".variations_form").on("wc_additional_variation_images_frontend_image_swap_done_callback", function() {

	// 	// if(image_to_show.length) {

	// 	// $(".woocommerce-product-gallery__image").attr("src", image_to_show).removeAttr("srcset");

	// 	// }

	// 	// });

	// 	}

	 });

	jQuery(function(){

		// Update price according to variable price
		if (jQuery('form.variations_form').length !== 0) {
		    var form = jQuery('form.variations_form');
		    var variable_product_price = '';
		    setInterval(function() {
		        if (jQuery('.single_variation_wrap span.price span.amount').length !== 0) {
		            if (jQuery('.single_variation_wrap span.price span.amount').text() !== variable_product_price) {
		                variable_product_price = jQuery('.single_variation_wrap div.woocommerce-variation-price span.amount').text();
		                jQuery('div.price span.product-price').text("Price: "+variable_product_price);
		            }
		        }
		    }, 300);
		}

		
		jQuery('.slider').slick({
	        autoplay: false,
	        autoplaySpeed: 1500,
	        arrows:true,
            dots: false,
            infinite: true,
      	  	prevArrow:"<button type='button' class='pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
       		nextArrow:"<button type='button' class='pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }]
        });
   

	});
        
    /*End of Slider function*/
</script>


<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
?>


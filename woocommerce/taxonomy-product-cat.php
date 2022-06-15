<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' );

$category = get_queried_object();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

 <div class="collection-wrapper">
    <div class="container">
      <div class="cols">
        <div class="col-md-2 collection-sidebar">
        	<?php do_action( 'woocommerce_sidebar' ); ?>
        </div>

        <div class="col-md-10">
   
         <?php 

            woocommerce_product_loop_start();

           	   $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
      			$params = array(
                            'posts_per_page' => 9, 
                            'post_type' => 'product', 
                            'orderby' => 'date', 
                            'order' => 'DESC', 
                            'paged' => $paged,
                            'tax_query' => array(
                                  array(
                                      'taxonomy' => 'product_cat',
                                      'field'    => 'term_id',
                                      'terms'    => $category->term_id
                                  )
                              )
                          );
      			$wc_query = new WP_Query($params);

            	if ( $wc_query->have_posts() ) {	
      				while ( $wc_query->have_posts() ) {
      					$wc_query->the_post();

      					 
      					do_action( 'woocommerce_shop_loop' );
                		wc_get_template_part( 'content', 'product' );
       
      					
      				}
      			
      		woocommerce_product_loop_end();
      		?> 

        </div>


     	<div class="pagination clearfix"> 

  				<?php
  			if ($wc_query->max_num_pages > 1) :

  				$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
  				$format  = isset( $format ) ? $format : '';

  				echo paginate_links(
  								
  						array( 'base' => $base,
  							'format' => '',
  							'current' => max(1, get_query_var('paged')), 
  							'total' =>  $wc_query->max_num_pages,
  							'prev_text' => is_rtl() ? '&rarr;' : '&larr;', 
  							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
  							'type' => 'list',
  							'end_size' => 3, 
  							'mid_size' => 3 
  						)
  				);
  				endif; 
  				?>
		</div>  

	   <?php  } else {

                wc_get_template_part( 'loop/no', 'products-found' );
          } ?>

          <?php 
          /**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
          //do_action( 'woocommerce_after_shop_loop' ); ?>
 

        </div><!-- end .col-9 -->

      </div>
    </div>
  </div>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );



get_footer( 'shop' );


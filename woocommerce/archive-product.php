<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<!-- <header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	//do_action( 'woocommerce_archive_description' );
	?>
</header> -->
 <div class="collection-wrapper">
    <div class="container">
      <div class="cols">
        <div class="col-md-2 collection-sidebar">
        	<?php do_action( 'woocommerce_sidebar' ); ?>
     
         <!--  <div class="filter-group">
            <div class="filter-container">
              <span class="h6 active-filter js-trigger-filter">Collections</span>
              <ul class="show-filters the-work-list">
                <li><a href="/collections/view-all">View All</a></li>
                <li><a href="/collections/new-release">New Releases</a></li>
                <li><a href="/collections/best-sellers">Best Sellers</a></li>
                <li><a href="https://lik.com/collections/all/product_open-edition">Open Editions</a></li>
                <li><a href="/collections/abstract">Abstract</a></li>
              </ul>
            </div>

            <div class="filter-container">
              <span class="h6 active-filter js-trigger-filter">Color</span>
              <ul class="show-filters list-Color">
                <li><a href="/collections/all/color_b-w" title="Narrow selection to products matching tag Color_B&amp;W">B&amp;W</a></li>
                <li><a href="/collections/all/color_black" title="Narrow selection to products matching tag Color_Black">Black</a></li>
                <li><a href="/collections/all/color_blue" title="Narrow selection to products matching tag Color_Blue">Blue</a></li>
                <li><a href="/collections/all/color_brown" title="Narrow selection to products matching tag Color_Brown">Brown</a></li>
              </ul>
            </div>
 
            <div class="filter-container">
              <span class="h6 active-filter js-trigger-filter">Format</span>
              <ul class="show-filters list-Format">
                <li><a href="/collections/all/format_panoramic" title="Narrow selection to products matching tag Format_Panoramic">Panoramic</a></li>
                <li><a href="/collections/all/format_square" title="Narrow selection to products matching tag Format_Square">Square</a></li>
                <li><a href="/collections/all/format_standard" title="Narrow selection to products matching tag Format_Standard">Standard</a></li>
              </ul>
            </div>

            <div class="filter-container">
              <span class="h6 active-filter js-trigger-filter">Orientation</span>
              <ul class="show-filters list-Orientation">
              </ul>
            </div>

            <div class="filter-container">
              <span class="h6 active-filter js-trigger-filter">Product</span>
              <ul class="show-filters list-Product">
                <li><a href="/collections/all/product_book" title="Narrow selection to products matching tag Product_Book">Book</a></li>
                <li><a href="/collections/all/product_element-frames" title="Narrow selection to products matching tag Product_Element Frames">Element Frames</a></li>
                <li><a href="/collections/all/product_element-pack" title="Narrow selection to products matching tag Product_Element Pack">Element Pack</a></li>
                <li><a href="/collections/all/product_equation-of-time" title="Narrow selection to products matching tag Product_Equation of Time">Equation of Time</a></li>
                <li><a href="/collections/all/product_limited-edition" title="Narrow selection to products matching tag Product_Limited Edition">Limited Edition</a></li>
                <li><a href="/collections/all/product_open-edition" title="Narrow selection to products matching tag Product_Open Edition">Open Edition</a></li>
              </ul>
            </div>

          </div> -->
        </div>

        <div class="col-md-10">
   
         <?php 

            woocommerce_product_loop_start();
/*
                if ( wc_get_loop_prop( 'total' ) ) {
                  while ( have_posts() ) {
                    the_post();

                     
                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );
                  }
                }*/


            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            if(is_search()){
              $params = array('posts_per_page' => 9, 'post_type' => 'product', 's' => $_GET['s'], 'orderby' => 'date', 'order' => 'DESC', 'paged' => $paged);
            }else{
              $params = array('posts_per_page' => 9, 'post_type' => 'product', 'orderby' => 'date', 'order' => 'DESC', 'paged' => $paged);
            }
      			
      			$wc_query = new WP_Query($params);

            if ( $wc_query->have_posts() ) {	
      				while ( $wc_query->have_posts() ) {
      					$wc_query->the_post();

      					 
      					do_action( 'woocommerce_shop_loop' );
                wc_get_template_part( 'content', 'product' );
      					
      				}
      			
      			woocommerce_product_loop_end();
      		?> 

         <!--  <div class="">
            <div class="grid-item">
              <div class="hhh">
                <a href="/collections/all/products/1859" class="grid__image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/art.jpg" alt="Old wooden buildings that make up the town Bodie California overgrown with bushes and grass">
                </a>
                <div class="content">
                  <a href="product-detail.html"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
              </div>
              <div class="grid__details">
                <h1 class="h6">
                  CHRISTIAN NØRGAARD
                </h1>
                <div class="row no-gutters">
                  <div class="col-md-6">
                    <div class="details-price text-center">
                      <i class="fa fa-shopping-bag" aria-hidden="true"></i>Cart
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div>
                      <p class="details-price float-left">
                        price:$4,000
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>  -->

          </div>


          <div class="pagination clearfix"> 

      				<?php
      			if ($wc_query->max_num_pages > 1) :

      				// $total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
      				// $current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
      				$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
      				$format  = isset( $format ) ? $format : '';

      				echo paginate_links(
      					 apply_filters(
      				 	'woocommerce_pagination_args',
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
/*if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30

	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			 
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10

	do_action( 'woocommerce_after_shop_loop' );
} else {

	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10

	do_action( 'woocommerce_no_products_found' );
}
*/

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );




get_footer( 'shop' );

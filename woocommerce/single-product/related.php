<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<!-- 	<section class="related products"> -->
	
		<?php //woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					?>
					<div>
						<div class="grid-item sli w-100">
					      <div class="hhh grid-box-content">					      	
					        <a href="<?php echo esc_url(get_permalink()); ?>" class="grid__image">
					              	<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
					        </a>
					        <div class="content">
					          <a href="<?php echo esc_url(get_permalink()); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
					        </div> 
					      </div>
					      <div class="grid__details">
					        <h1 class="h6">
					         	<?php echo substr(get_the_title(), 0, 20); ?>
					        </h1>
					        <div class="d-flex justify-content-between px-2 no-gutters">
					        	<div>
						            <div class="details-price text-center">
						            	<?php 	do_action( 'woocommerce_after_shop_loop_item' ); ?>
						              <!-- <i class="fa fa-shopping-bag" aria-hidden="true"></i>Cart -->
						            </div>
					            </div>
					            <div> 
						            <div>
						              <p class="details-price float-left">
						                 <?php echo $related_product->get_price_html(); ?>
						              </p>
						            </div> 
					            </div>
					        </div>
					      </div>
					    </div> 
					</div>
				
			<?php endforeach; ?>

		<?php //woocommerce_product_loop_end(); ?>

<!-- 	</section> -->
	<?php
endif;

wp_reset_postdata();

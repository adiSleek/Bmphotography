<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<!-- <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	//do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		//do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action( 'woocommerce_after_single_product_summary' );
	?>
</div> -->



<div class="detail-product" id="product-<?php the_ID(); ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="feat-wrap">
        	<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
         <!--  <img class="featured-image" src="<?php echo get_template_directory_uri() . '/assets/images/banner.jpg'; ?>" alt="" data-product-featured-image=""> -->
        </div>
       <!--  <ul class="thumbnail-gallery">

	          <li><a class="lightbox-gallery-trigger" href="https://cdn.shopify.com/s/files/1/2486/4354/files/Peter-Lik-A-Night-in-Prague-In-Home-WB.jpg?v=1613612299" data-width="1200" data-fancybox="images">
	            <img src="https://cdn.shopify.com/s/files/1/2486/4354/files/Peter-Lik-A-Night-in-Prague-In-Home-WB.jpg?v=1613612299" alt="A Night In Prague in Home">
	          </a>
	        </li>
	        <li><a class="lightbox-gallery-trigger" href="https://cdn.shopify.com/s/files/1/2486/4354/files/Peter-Lik-A-Night-in-Prague-In-Home-WB.jpg?v=1613612299" data-width="1200" data-fancybox="images">
	          <img src="https://cdn.shopify.com/s/files/1/2486/4354/files/Peter-Lik-A-Night-in-Prague-In-Home-WB.jpg?v=1613612299" alt="A Night In Prague in Home">
	        </a>
	      </li>
	      <li><a class="lightbox-gallery-trigger" href="https://cdn.shopify.com/s/files/1/2486/4354/files/Peter-Lik-A-Night-in-Prague-In-Home-WB.jpg?v=1613612299" data-width="1200" data-fancybox="images">
	        <img src="https://cdn.shopify.com/s/files/1/2486/4354/files/Peter-Lik-A-Night-in-Prague-In-Home-WB.jpg?v=1613612299" alt="A Night In Prague in Home">
	      </a>
	    </li>
	  </ul> -->
</div>
<!-- end .col-8 -->
<div class="col-md-12 py-5">
  <div class="product-tools">
    <div class="row">
      <div class="col-md-4">

      	<?php do_action( 'woocommerce_single_product_summary' ); ?>

       <!--  <div class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
          <span class="product-price" data-product-price="">Price:<?php echo $product->get_price_html(); ?></span>
        </div> -->
    
        <!-- <button class="btn-std" type="submit" name="add" data-add-to-cart="">
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          <span data-add-to-cart-text="">Add to Cart</span>
        </button> -->
      </div>
      <div class="col-md-4">
            <?php echo woocommerce_template_single_add_to_cart(); ?>
        <!-- <form action="/cart/add" method="post" enctype="multipart/form-data">
          <div class="selector-wrapper js">
            <div><label>Size</label></div>
            <select id="SingleOptionSelector-0" data-single-option-selector="" data-index="option1">
              <option value="Size: 100CM" selected="selected">
                Size
              </option>
              <option value="Size: 100CM">
                Size: 100CM
              </option>
              <option value="Size: 150CM">
                Size: 150CM
              </option>
              <option value="Size: 200CM">
                Size: 200CM
              </option>
            </select>
          </div>

          <div class="selector-wrapper js">
            <div><label>Frame</label></div>
            <select id="SingleOptionSelector-1" data-single-option-selector="" data-index="option2">
              <option value="Frame: Acrylic Mount" selected="selected">
                Frame
              </option>
              <option value="Frame: Acrylic Mount">
                Frame: Acrylic Mount
              </option>
              <option value="Frame: Matte Black">
                Frame: Matte Black
              </option>
              <option value="Frame: Cigar Leaf">
                Frame: Cigar Leaf
              </option>
              <option value="Frame: Dark Ash">
                Frame: Dark Ash
              </option>
            </select>
          </div>
         <!--  <a href="#">buy Now</a> 
        </form> -->
      </div>
      <div class="col-md-4">
        <div class="live-help-text-wrapper">
          <p style="color:black; font-size: 18px;">
            <a href="<?php the_field('sizing_chart_link', 'options'); ?>"><b><?php the_field('sizing_chart_text', 'options'); ?></b></a>
          </p>
          <br>

          <p><?php the_field('sizing_chart_content', 'options'); ?></p>
          <br>
          <div class="live-help-text">
            <a class="fixed-live-chat" href="mailto:<?php the_field('sizing_chart_email', 'options'); ?>">
              <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-mail" viewBox="0 0 16 12"><path d="M15 0H1C.4 0 0 .4 0 1v10c0 .6.4 1 1 1h14c.6 0 1-.4 1-1V1c0-.6-.4-1-1-1zm-1 2v.7L8 6.3 2 2.7V2h12zM2 10V4.5L8 8l6-3.5V10H2z"></path></svg>
              <div class="live-help-hours">
                <strong>Email Us</strong>
              </div></a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- end .cols -->
</div>
</div>

<!-- Description -->
<section class="description">
  <div class="container">
    <h5>Description</h5>
    <?php echo $product->description; ?>
  </div>
</section>
<!-- Description End -->

<section class="px-3">
<?php 
$post_thumbnail_id = $product->get_image_id();
$f_img = wp_get_attachment_image_src(  $post_thumbnail_id, 'single-post-thumbnail' );
echo $html = '<img class="featured-image w-100" src="'.$f_img[0].'" data-prod-id="'.$post_thumbnail_id.'" data-src="'.esc_url( $f_img[0] ).'" alt="" >';
  ?>

</section>

<!-- Slider -->
<section class="product-slider">
  <div class="container-fluid">
    <?php
    // $heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );
    // if ( $heading ) :
      ?>
      <!-- <h2><?php echo esc_html( $heading ); ?></h2> -->
    <?php //endif; ?>
    <div class="slider">

      <?php echo woocommerce_output_related_products(); ?>
<!--      
      <div>
        <div class="grid-item sli w-100 ">
          <div class="hhh grid-box-content">
            <a href="/collections/all/products/1859" class="grid__image">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/master-side.jpg'; ?>" alt="Old wooden buildings that make up the town Bodie California overgrown with bushes and grass">
            </a>
            <div class="content">
              <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
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
      </div> 

      <div>
        <div class="grid-item sli w-100 ">
          <div class="hhh grid-box-content">
            <a href="/collections/all/products/1859" class="grid__image">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/shop-img.jpg'; ?>" alt="Old wooden buildings that make up the town Bodie California overgrown with bushes and grass">
            </a>
            <div class="content">
              <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
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
      </div> -->
    </div>
  </div>
</section>
<!-- Slider End -->


<?php do_action( 'woocommerce_after_single_product' ); ?>

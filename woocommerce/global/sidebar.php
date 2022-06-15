<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
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

//get_sidebar( 'shop' );


/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

?>
<!-- <button class="show-hide-filter"><span>Show Filters</span></button> -->
 <div class="filter-group">
    <div class="filter-container">
      <span class="h6 active-filter js-trigger-filter">Collections</span>
      <?php // Get Woocommerce product categories WP_Term objects
      $prod_categories = get_terms( [
          'taxonomy' => 'product_cat',   
          'orderby'      => 'name',
          'exclude' => array(15),
          'hide_empty'   => false] ); 
          ?>
      <ul class="show-filters the-work-list">
         <li><a href="<?= site_url('/shop'); ?>">View All</a></li>
      <?php  foreach ($prod_categories as $prod_cat) { ?>
        <li><a href="<?= get_term_link($prod_cat->slug, 'product_cat') ?>"><?php echo $prod_cat->name; ?></a></li>
      <?php } ?>
  
      </ul>
    </div>

   <!--  <div class="filter-container">
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
    </div> -->
  </div>
<!--   <button class="show-hide-filter-secondary"><span>Hide Filters</span></button> -->
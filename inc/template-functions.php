<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Bmphotography
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bmphotography_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'bmphotography_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bmphotography_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bmphotography_pingback_header' );


/* Aditya Custom & Woocommerce Functions*/ 

// option Page 
if( function_exists('acf_add_options_page') ) {  

	acf_add_options_page(array(
        'page_title'    => 'Options',
        'menu_title'    => 'Options',
        'menu_slug'     => 'Options',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position' => 2
    ));
}


function add_class_on_a_tag($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
  
return $classes;
}

add_filter('nav_menu_link_attributes', 'add_class_on_a_tag', 1, 3);

add_action( 'init', 'remove_my_action' );
function remove_my_action() {
   remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
   remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
   remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
   remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
   remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
   remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
   remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
   remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
   remove_action('woocommerce_single_product_summary', 'generate_product_data', 60);
     
}

// add_filter( 'wp_setup_nav_menu_item','my_item_setup' );
// function my_item_setup( $item ) {
//     if ( ! is_admin() && class_exists( 'woocommerce' ) ) {
//         if ( $item->url == esc_url( wc_get_cart_url() ) && ! WC()->cart->is_empty() ){
//             $title = get_locale() == 'fr_FR' ? 'PANIER' : 'MY CART';
//             $item->title = $title . ' (<span id="count-cart-items">' .  WC()->cart->get_cart_contents_count() . '</span>)';
//         }
//     }
//     return $item;
// }

// add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_cart_fragments', 50, 1 );
// function wc_refresh_cart_fragments( $fragments ){
//     $cart_count = WC()->cart->get_cart_contents_count();

//     // Normal version
//     $count_normal = '<span id="count-cart-items">' .  $cart_count . '</span>';
//     $fragments['#count-cart-items'] = $count_normal;

//     // Mobile version
//     $count_mobile = '<span id="count-cart-itemob">' .  $cart_count . '</span>';
//     $fragments['#count-cart-itemob'] = $count_mobile;

//     return $fragments;
// }

add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 ); 
function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['span.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    
    return $fragments;
    
}

add_filter( 'gettext', function( $translated_text ) {
	//$trans_txt = htmlspecialchars_decode("View cart");
	$translated_text = str_replace("View cart", "<i class='fa fa-eye' aria-hidden='true'></i>View cart", $translated_text);
 
    return $translated_text;
} );


if(!is_admin()){
    add_action('pre_get_posts',  'set_per_page');
}
function set_per_page($query) {
    global $wp_query;
    if(($query->is_post_type_archive('product') || $query->is_tax()) && ($query === $wp_query)){
        $query->set('posts_per_page', 9);
    }
   // $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    //(strpos($url,'post_type=product') !== false) && 
    // if ( is_search() ) {
    //     $query->set('post_type', 'product');
    // }

    return $query;
}
 

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 25);
function woocommerce_output_related_products(){
	$args = array( 
       'posts_per_page' => 6,  
        'columns' => 6,  
        'orderby' => 'date',
        'order'	  => 'desc' 
 ); 
   	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

add_filter( 'woocommerce_account_menu_items', function( $items ) {
	$items = array(
		'dashboard'       => __( 'Dashboard', 'woocommerce' ),
		'orders'          => __( 'Orders', 'woocommerce' ),
		'downloads'       => __( 'Downloads', 'woocommerce' ),
		'edit-address'    => __( 'Address', 'woocommerce' ),
		'payment-methods' => __( 'Payment methods', 'woocommerce' ),
		'edit-account'    => __( 'Account details', 'woocommerce' ),
		'customer-logout' => __( 'Logout', 'woocommerce' ),
	);

    return $items;
} );


add_filter( 'cron_schedules', 'example_add_cron_interval' );
function example_add_cron_interval( $schedules ) {
 if(!isset($schedules["bm_three_days"])){
        $schedules["bm_three_days"] = array(
            'interval' => 3*60*60*24,
            'display' => __('Once every 3 days'));
    }

return $schedules;
 }

 //Now you can schedule your function:
add_action( 'bm_photo_cron_hook', 'my_cron_schedules' );
if ( ! wp_next_scheduled( 'bm_photo_cron_hook' ) ) {
    wp_schedule_event( time(), 'bm_three_days', 'bm_photo_cron_hook' );
}

function my_cron_schedules() {
	// do something every three
	$arr = $arr1 = $arr2 = $arr3 = $arr4 = array();
	$news_rep = get_field('sec5_image', 63); 
	$ban_rep = get_field('banner_img', 63); 
	$open_edition_rep = get_field('sec2_image', 63); 
	$limited_edition_rep = get_field('sec4_image', 63); 
	$best_seller_rep = get_field('sec6_image', 63); 


	foreach ($news_rep as $key => $value) {
	 $arr[] = $value['sec5_sub_image'];
	}

	foreach ($ban_rep as $ban_key => $ban_val) {
	 $arr1[] = $ban_val['banner_sub_img'];
	}

	foreach ($open_edition_rep as $open_edition_key => $open_edition_val) {
	 $arr2[] = $open_edition_val['sec2_sub_img'];
	}

	foreach ($best_seller_rep as $best_seller_key => $best_seller_val) {
	 $arr3[] = $best_seller_val['sec6_sub_img'];
	}

	foreach ($limited_edition_rep as $limited_edition_key => $limited_edition_val) {
	 $arr4[] = $limited_edition_val['sec4_sub_img'];
	}

	$image_count = count($arr);
	$setVal = get_option('bm_news_release_image');

	$ban_img_count = count($arr1);
	$setVal_1 = get_option('bm_banner_image');

	$open_edition_count = count($arr2);
	$setVal_2 = get_option('bm_open_edition_image');

	$best_seller_count = count($arr3);
	$setVal_3 = get_option('bm_best_seller_image');

	$limited_edition_count = count($arr4);
	$setVal_4 = get_option('bm_limited_edition_image');

	// banner image
	if(get_option( 'bm_banner_image' ) !== false ){
		if($setVal_1 < ($ban_img_count-1) ){

			update_option( 'bm_banner_image', ($setVal_1+1));
		}else{
			
			update_option( 'bm_banner_image', 0);
		}
	}else{
		add_option( 'bm_banner_image',  0, '', 'yes' ); 
	}

	// news release image
  	if(get_option( 'bm_news_release_image' ) !== false ){
		if($setVal < ($image_count-1) ){

			update_option( 'bm_news_release_image', ($setVal+1));
		}else{
			
			update_option( 'bm_news_release_image', 0);
		}
	}else{
		add_option( 'bm_news_release_image',  0, '', 'yes' ); 
	} 

	// section 2 image
	if(get_option( 'bm_open_edition_image' ) !== false ){
		if($setVal_2 < ($open_edition_count-1) ){

			update_option( 'bm_open_edition_image', ($setVal_2+1));
		}else{
			
			update_option( 'bm_open_edition_image', 0);
		}
	}else{
		add_option( 'bm_open_edition_image',  0, '', 'yes' ); 
	}
 
	// best seller image
	if(get_option( 'bm_best_seller_image' ) !== false ){
		if($setVal_3 < ($open_edition_count-1) ){

			update_option( 'bm_best_seller_image', ($setVal_3+1));
		}else{
			
			update_option( 'bm_best_seller_image', 0);
		}
	}else{
		add_option( 'bm_best_seller_image',  0, '', 'yes' ); 
	}

	// limited edition image
	if(get_option( 'bm_limited_edition_image' ) !== false ){
		if($setVal_4 < ($limited_edition_count-1) ){

			update_option( 'bm_limited_edition_image', ($setVal_4+1));
		}else{
			
			update_option( 'bm_limited_edition_image', 0);
		}
	}else{
		add_option( 'bm_limited_edition_image',  0, '', 'yes' ); 
	}
     
}

// show image home page
function show_image_home() {
	$news_rep = get_field('sec5_image', 63); 
	$arr = array();

	$news_rep = get_field('sec5_image', 63); 
	foreach ($news_rep as $key => $value) {
	 $arr[] = $value['sec5_sub_image'];
	}

	$d_val = get_option( 'bm_news_release_image' );
	echo '<img src="'. $arr[$d_val].'" alt="" class="img-fluid">';

}

// function move_variation_price() {
//     remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
//     add_action( 'woocommerce_after_add_to_cart_quantity', 'woocommerce_single_variation', 5 );
// }
// add_action( 'woocommerce_before_add_to_cart_form', 'move_variation_price' );

// Minimum CSS to remove +/- default buttons on input field type number
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        display: none;
        margin: 0;
    }
    .quantity input.qty {
        appearance: textfield;
        -webkit-appearance: none;
        -moz-appearance: textfield;
    }
    </style>
    <?php
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}
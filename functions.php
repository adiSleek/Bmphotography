<?php
/**
 * Bmphotography functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bmphotography
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bmphotography_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Bmphotography, use a find and replace
		* to change 'bmphotography' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bmphotography', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'bmphotography' ),
			'menu-2' => esc_html__( 'Secondary', 'bmphotography' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
			'search-form',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bmphotography_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// woocommerce
	add_theme_support( 'woocommerce',  array(
	   'single_image_width' => 800,
	   //'thumbnail_image_width' => 400,
	   // 'product_grid' => array(
	   // 'default_columns' => 3,
	   // 'default_rows' => 4,
	   // 'min_columns' => 1,
	   // 'max_columns' => 6,
	   // 'min_rows' => 1
	   // )
	) );

	require_once get_template_directory(). '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'bmphotography_setup' );

// add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
// return array(
// 'width' => 1024,
// //'height' => 150,
// 'crop' => 0,
// );
// } );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bmphotography_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bmphotography_content_width', 640 );
}
add_action( 'after_setup_theme', 'bmphotography_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bmphotography_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bmphotography' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bmphotography' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 2', 'bmphotography' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'bmphotography' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'bmphotography' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'bmphotography' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Secondary Desktop Menu', 'bmphotography' ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Add widgets here.', 'bmphotography' ),
			'before_widget' => '<div class="overflow-nav-row">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bmphotography_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bmphotography_scripts() {
	wp_enqueue_style( 'bmphotography-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bmphotography-style', 'rtl', 'replace' );

	//css
  	wp_enqueue_style( 'bmphotography-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'bmphotography-fontawsome', get_template_directory_uri(). '/assets/css/font-awesome.min.css' , array(), _S_VERSION );
	//wp_enqueue_style( 'bmphotography-demo', get_template_directory_uri(). '/assets/css/demo.css' , array(), _S_VERSION );
	//wp_enqueue_style( 'bmphotography-webslidemenu', get_template_directory_uri(). '/assets/css/webslidemenu.css' , array(), _S_VERSION );
   // wp_enqueue_style( 'bmphotography-owl-carousel', get_template_directory_uri(). '/assets/css/owl.carousel.min.css' , array(), _S_VERSION );
	// wp_enqueue_style( 'bmphotography-owl-theme', get_template_directory_uri(). '/assets/css/owl.theme.default.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'bmphotography-animate', get_template_directory_uri(). '/assets/css/animate.css' , array(), _S_VERSION );
	wp_enqueue_style( 'bmphotography-slick', get_template_directory_uri(). '/assets/css/slick.css' , array(), _S_VERSION );
	wp_enqueue_style( 'bmphotography-theme', get_template_directory_uri(). '/assets/css/theme.css' , array(), _S_VERSION );
	wp_enqueue_style( 'bmphotography-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css' , array(), _S_VERSION );
	wp_enqueue_style( 'bmphotography-style-custom', get_template_directory_uri(). '/assets/css/style.css' , array(), _S_VERSION );

	//js
	//wp_enqueue_script( 'bmphotography-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
		
	wp_enqueue_script( 'bmphotography-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bmphotography-jquery-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'bmphotography-slim-min-js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'bmphotography-popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper/js/1.12.9/umd/popper.min.js', array(), _S_VERSION, true );
 
	//wp_enqueue_script( 'bmphotography-owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'bmphotography-webslidemenu-js', get_template_directory_uri() . '/assets/js/webslidemenu.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'bmphotography-body-scroll-js', get_template_directory_uri() . '/assets/js/body-scroll-lock2.4', array(), _S_VERSION, true );
	wp_enqueue_script( 'bmphotography-vendor-js', get_template_directory_uri() . '/assets/js/vendor.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bmphotography-aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'bmphotography-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bmphotography-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bmphotography-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );
	wp_localize_script('bmphotography-custom-js', 'my_object',  array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ), 
		'siteurl' => get_site_url()
		) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
//add_action( 'wp_enqueue_scripts', 'bmphotography_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
 
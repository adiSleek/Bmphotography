<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bmphotography
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Primary Meta Tags -->

  <link rel="shortcut icon" type="image/x-icon" href="#">
  <meta name="title" content="" />
  <meta name="description" content="hgjgy vgyjmnhgjmhbmjnhb" />

  <!-- Open Graph / Facebook -->
<!--   <meta property="og:type" content="website" />
  <meta property="og:url" content="" />
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:image" content="" /> -->
 <!--  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "Article headline",
      "image": [
      "https://example.com/photos/1x1/photo.jpg",
      "https://example.com/photos/4x3/photo.jpg",
      "https://example.com/photos/16x9/photo.jpg"
      ],
      "datePublished": "2015-02-05T08:00:00+08:00",
      "dateModified": "2015-02-05T09:20:00+08:00"
    }
  </script> -->
  <!-- Twitter -->
<!--   <meta property="twitter:card" content="summary_large_image" />
  <meta property="twitter:url" content="" />
  <meta property="twitter:title" content="" />
  <meta property="twitter:description" content="" />
  <meta property="twitter:image" content="" /> -->
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">

 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/demo.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/webslidemenu.css" />

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/theme.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" /> -->

  	<?php wp_head(); ?>
</head>

<body class="<?php echo ( (is_product()) ? 'single-prod' : (is_404() ? 'page-error-es' : '')); ?>">
  <div class="se-pre-con"></div>
  <!-- header-section-starts -->
  <div data-section-id="header" data-section-type="header-section" class="site-header">
    <header role="banner" class="headroom is-top not-bottom <?php if(is_page('the-artist') || is_page('terms-conditions') || is_shop() || is_product() || is_product_category() || is_cart() || is_checkout() || is_account_page() || is_404() || is_search()){ echo 'default-head'; } ?>" id="header">
      <div class="site-header-left">
        <a href="<?php echo home_url('/'); ?>" itemprop="url" class="site-logo">
         <?php //the_field('header_logo', 'options'); ?>
        </a>   
    </div>

    <nav class="nav mob-nav">
      <div class="site-nav-subnav  search-supernav hide-desktop" aria-hidden="true">
        <div class="search-container">
            <?php wc_get_template_part( 'product', 'searchform' ); ?>
          <!-- <form action="/search" method="get" role="search">
            <label for="Search-mobile" class="label-hidden">
              Search our store
            </label>
            <input type="search" name="q" id="Search-mobile" placeholder="Search Site" class="mobile-search lik-search aa-input" autocomplete="off" spellcheck="false" dir="auto"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;din-2014&quot;, sans-serif; font-size: 68px; font-style: normal; font-variant: no-common-ligatures; font-weight: 300; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></pre>
          </form> -->
        </div>
      </div>

      <div class="super-nav animate">
        <ul class="site-nav">
        	 <?php 
		                   if ( has_nav_menu( 'menu-1' ) ) {

		                           wp_nav_menu(
		                              array(
		                                 'container'  => '',
		                                 'items_wrap' => '%3$s',
		                                 'theme_location' => 'menu-1',
		                                 'menu'   => 'Main Menu',
		                              )
		                           );

		                       } 
		                     ?>

          <!-- <li class="main-nav-item">
            <a href="#" class="has-subnav js-supernav nav-link mobile-nav-link js-mobile-links" aria-haspopup="true">The GALLERY</a>
            <div class="site-nav-subnav work-supernav" aria-hidden="true">
              <div class="container">
                <div class="subnav-row">
                  <div class="col-6 left">
                    <ul class="subnav-links">
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/01</span> View All</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/02</span> New Releases</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/03</span> Best Sellers</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/04</span> Open Editions</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/05</span> Abstract</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/06</span> Aviator</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/07</span> Beach</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/08</span> Cities</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/09</span> Desert</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/10</span> Europe</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/11</span> Iceland</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/12</span> Fields</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/13</span> Mountains</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/14</span> Northwest</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/15</span> Southwest</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/16</span> Trees</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/17</span> Water</a>
                      </li>
                      <li>
                        <a href="#" class="nav-link"><span class="num" aria-hidden="true">/18</span> Wildlife</a>
                      </li>

                    </ul>

                  </div>
                  <div class="col-6 nav-feature">
                    <div class="subnav-row">
                      <div class="col-6">
                        <img src="data:image/jpeg;base64,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" alt="African leopard sitting on a rock with the setting sun lighting up the clouds above.">
                      </div>
                      <div class="col-6">
                        <span class="h3">Alluring Spirit</span>
                        <p>Experience the stunning beauty of Peter Lik's masterwork, <i>Alluring Spirit</i>.</p>
                        <a class="caps" href="#" aria-label="Learn more about Alluring Spirit">Learn More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
 -->
         <!--  <li class="main-nav-item">
            <a href="artist.html" class="has-subnav nav-link" aria-haspopup="true">The Artist </a>
          </li>
          <li class="main-nav-item">
            <a href="shop.html" class="nav-link" aria-haspopup="true">Shop</a>
          </li>
          <li class="main-nav-item">
            <a class="nav-link" href="#">
              The Process
            </a>
          </li>
          <li class="main-nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-user" aria-hidden="true"></i> Registration / Login
            </a>
          </li> -->
        </ul>

        <div class="hide-desktop mobile-nav-footer">
          <div class="container">
            <ul>
            	<?php 
            		wp_nav_menu(
                            array(
                               'container'  => '',
                               'items_wrap' => '%3$s',
                               'menu'   => 'Secondary Menu',
      				                 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      				                 'walker'          => new WP_Bootstrap_Navwalker()
                            )
                         );
            	?>
              <!-- <li>
                <a href="#" class="js-mobile-links">About Us</a>
                <ul class="subnav-links">
                  <li><a class="nav-link" href="#">Blog</a></li>
                </ul>
              </li>
              <li>
                <a href="#" class="js-mobile-links">Explore</a>
                <ul class="subnav-links">
                  <li><a class="nav-link" href="#">Inspiration</a></li>
                  <li><a class="nav-link" href="#">The Process</a></li>
                </ul>
              </li>
              <li>
                <a href="#" class="js-mobile-links">Customer Service</a>
                <ul class="subnav-links">
                  <li><a class="nav-link" href="#">FAQ’s</a></li>
                  <li><a class="nav-link" href="#">Contact Us</a></li>
 
                </ul>
              </li> -->
          <!--     <li>
                <a href="#" class="js-mobile-links">Sales</a>
                <ul class="subnav-links">
                  <li><a href="#" class="nav-link">Contact an Art Specialist</a></li>
                  <li><a class="nav-link" href="#">Affirm Financing</a></li>
                </ul>
              </li> -->
            <!--   <li>
                <a href="#" class="js-mobile-links">Legal</a>
                <ul class="subnav-links">
                  <li><a class="nav-link" href="#">Privacy Policy</a></li>
                  <li><a class="nav-link" href="#">Terms of Use</a></li>
                  <li><a class="nav-link" href="#">Terms of Sale</a></li>
                  <li><a class="nav-link" href="#">GDPR Compliance</a></li>
                  <li><a class="nav-link" href="#">CCPA Compliance</a></li>
                </ul>
              </li> 
            </ul>-->
            <ul>
              <li><a href="<?php echo site_url('/my-account'); ?>">Create Account</a></li>
              <li><a href="<?php echo site_url('/my-account'); ?>" id="customer_login_link">Log in</a></li>
            </ul>
          </div>
        </div>

      </div>
    </nav>

    <div class="site-header-right">
      <div class="super-nav animate">
        <ul class="nav-icons">

          <li class="nav-icon search-icon">
            <button class="unstyle js-supernav hide-mobile search-btn" data-open="search-supernav"><i class="fa fa-search" aria-hidden="true"></i>
              <span class="visually-hide">Open search</span>
            </button>
            <button class="unstyle js-mobile-search hide-desktop"><svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search" viewBox="0 0 20 20"><path d="M7.5 2.5c2.8 0 5 2.2 5 5 0 1-.3 2-.9 2.9l-.5.7-.7.5c-.9.6-1.9.9-2.9.9-2.8 0-5-2.2-5-5s2.2-5 5-5m0-2.5C3.4 0 0 3.4 0 7.5S3.4 15 7.5 15c1.6 0 3.1-.5 4.3-1.4l6 6c.2.2.6.4.9.4s.6-.1.9-.4c.5-.5.5-1.3 0-1.8l-6-6c.9-1.2 1.4-2.7 1.4-4.3C15 3.4 11.6 0 7.5 0z"></path></svg><span class="visually-hide">Open search</span>
            </button>
            <div class="site-nav-subnav search-supernav hide-mobile" aria-hidden="true">
              <div class="search-container">
                  <?php wc_get_template_part( 'product', 'searchform' ); ?>
                <!-- <form action="/search" method="get" role="search">
                  <label for="Search1" class="label-hidden">
                    Search our store
                  </label>
                  <input type="search" name="q" id="Search1" placeholder="Search Site" class="desktop-search lik-search aa-input" autocomplete="off" spellcheck="false" dir="auto"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;din-2014&quot;, sans-serif; font-size: 68px; font-style: normal; font-variant: no-common-ligatures; font-weight: 300; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></pre>

                </form> -->
              </div>
            </div>
          </li>
          <li class="nav-icon cart-icon">
            <?php $items_count = WC()->cart->get_cart_contents_count();  ?>
            <a href="<?php echo site_url().'/cart/';?>" aria-label="cart">
              <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-cart" viewBox="0 0 18 18"><style>.st0{fill:#070707}</style><path class="st0" d="M17.9 2.1l-1.3 5.6c-.2.8-.8 1.3-1.6 1.3H4.5v2.2h11.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1H3.9c-.9 0-1.7-.8-1.7-1.7V2.2H1.1C.5 2.2 0 1.7 0 1.1 0 .5.5 0 1.1 0h15.2c1.1 0 1.9 1 1.6 2.1zM5.1 14.6c.9 0 1.7.8 1.7 1.7 0 .9-.8 1.7-1.7 1.7-.9 0-1.7-.8-1.7-1.7 0-.9.7-1.7 1.7-1.7zm9 0c.9 0 1.7.8 1.7 1.7 0 .9-.8 1.7-1.7 1.7s-1.7-.8-1.7-1.7c0-.9.7-1.7 1.7-1.7z"></path></svg>
              <span class="cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
            </a>
          </li>
          <li class="nav-icon hamburger-icon ">
            <button class="nav-btn unstyle js-supernav hide-mobile" data-open="hamburger-supernav">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28" aria-labelledby="desktop-hamburger-title" aria-describedby="desktop-hamburger-description">
                <title id="desktop-hamburger-title">Hamburger</title>
                <desc id="desktop-hamburger-description">Three vertical lines</desc>
                <use xmlns:xlink="http://www.w3.org/1999/xlink" href="#burg" xlink:href="#burg">
                  <symbol id="burg" viewBox="0 0 28 28">
                    <rect class="burger__top" y="6" width="28" height="2"></rect>
                    <rect class="burger__mid" y="13" width="28" height="2"></rect>
                    <rect class="burger__bot" y="20" width="28" height="2"></rect>
                  </symbol>
                </use>
              </svg>
              <span class="visually-hide">Toggle navigation</span>
            </button>
            <button class="nav-btn unstyle js-mobile-nav hide-desktop">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28" aria-labelledby="mobile-hamburger-title" aria-describedby="mobile-hamburger-description">
                <title id="mobile-hamburger-title">Hamburger</title>
                <desc id="mobile-hamburger-description">Three vertical lines</desc>
                <use xmlns:xlink="http://www.w3.org/1999/xlink" href="#burg" xlink:href="#burg"></use>
              </svg>
              <span class="visually-hide">Toggle navigation</span>
            </button>
            <div class="site-nav-subnav hamburger-supernav" aria-hidden="true">
              <div class="hide-mobile">
                <div class="container">
                  
                  	 <?php 
				           if(is_active_sidebar('sidebar-5')) {
				  				    dynamic_sidebar('sidebar-5');
				  		    	}	
				  			   ?>
	              <!-- <div class="overflow-nav-row">
	                    <div class="overflow-col">
	                      <span class="h6">About Us</span>
	                      <ul class="overflow-links">
	                        <li class="nav-link"><a href="#">Blog</a></li>
	                      </ul>
	                    </div>
	                    <div class="overflow-col">
	                      <span class="h6">Explore</span>
	                      <ul class="overflow-links">
	                        <li class="nav-link"><a href="#">Inspiration</a></li>
	                      </ul>
	                    </div>
	                    <div class="overflow-col">
	                      <span class="h6">Customer Service</span>
	                      <ul class="overflow-links">
	                        <li class="nav-link"><a href="#">FAQ’s</a></li>
	                        <li class="nav-link"><a href="#">Contact Us</a></li>
	                      </ul>
	                    </div> 
	                  </div>-->
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
</div>
<!-- header-section-end -->
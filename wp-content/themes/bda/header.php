<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bda
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="google-site-verification" content="GCZWLLjZkDETCzT1z2NQ0hPh0HicsEJu3SzvNAs6Ecw" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74766992-1', 'auto');
  ga('send', 'pageview');

</script>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<header id="masthead" class="site-header header"> <!--header start-->
      <div class="container"><!--container start-->
          <div class="row"><!--row start-->
              <?php if( get_theme_mod( 'site_logo' ) ) : ?>
                  <div class="col-xs-6 logo">
                      <a href="<?php echo esc_url( home_url( ) ) ;?>"> <img src="<?php echo get_theme_mod( 'site_logo' ) ?>" alt="<?php bloginfo( 'name' );?>" width="499" height="78"/></a>
                  </div>
              <?php else : ?>
                      <div class="col-xs-6 logo">
                          <a href="<?php echo esc_url( home_url( ) ) ;?>"><?php bloginfo( 'name' ); ?></a>
                      </div>
              <?php endif ?>
              <div class="col-xs-6">
                  <nav class="top-nav">
                      <?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'menu_id' => 'top-menu' ) ); ?>  
                  </nav>
                  <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform hidden" id="searchform" method="get" role="search">
                      <span class="screen-reader-text">Search for:</span>
                      <input type="text" title="Search for:" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="Search..." class="search-field" kl_virtual_keyboard_secure_input="on">
                  </form>
                  <!-- social-icons -->
                  <div class="social-icon">
                      <ul>
                          <?php
                                  $custom_link1   = get_theme_mod( 'custom_link1' );    
                                  $custom_link2   = get_theme_mod( 'custom_link2' );    
                                  $facebook   = get_theme_mod( 'facebook_link' ); 
                                  $twitter   = get_theme_mod( 'twitter_link' );
                                  $pinterest  = get_theme_mod( 'pinterest_link' );
                                  $instagram = get_theme_mod( 'instagram_link' ); 
                          ?>
                          <?php if( !empty( $custom_link1 ) ) { ?>
                          <li><a href="<?php echo esc_url( $custom_link1 ); ?>" target="_blank" class="donate">Donate to BDA</a></li>

                          <?php } if( !empty( $custom_link2 ) ) { ?>
                          <li><a href="<?php echo esc_url( $custom_link2 ); ?>" class="donate donate-artist" style="background-color:#e4600b;">Donate to Sponsored Artist</a></li>
                          
                          <?php } if( !empty( $facebook ) ) { ?>
                              <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"></a></li>

                          <?php } if( !empty( $twitter ) ) { ?>   
                              <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"></a></li>

                          <?php } if( !empty( $pinterest ) ) { ?>
                              <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"></a></li>

                          <?php } if( !empty( $instagram ) ) { ?>
                              <li><a href="<?php echo ( $instagram ); ?>" target="_blank"></a></li>

                          <?php }?>

                      </ul>
                  </div> <!-- social-icons end -->
              </div>
              <div class="col-sm-12">
                  <nav class="main-navigation">
                      <!-- primary menu  -->
                     <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>  
                 </nav>
             </div>
          </div><!--row End-->
      </div><!--container end-->
   </header><!--header end-->
  <div id="content" class="site-content"><!--site content start-->
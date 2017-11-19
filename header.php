<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sensitive_Skin_Bootstrap
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TQJXCG5');</script>
<!-- End Google Tag Manager -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="UpakgIyAoYefwPTgGM5pZZTlvlljudV-Bhb7nDaw4No" />
<meta name="yandex-verification" content="5ac91f8ec3452505" />

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

<!--  Handles the emails in the footer -->
     <script>function maillink(lhs,rhs){document.write("<a href=\"mailto");document.write(":" + lhs + "@");document.write(rhs + "\" >" + lhs + "@" + rhs + "<\/a>");}</script>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQJXCG5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="container" data-spy="scroll" data-target=".navbar-brand" data-offset="50">
		<div id="page" class="hfeed site">
<!-- 	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sensitive-skin-bootstrap' ); ?></a>
 -->	<header>
			<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid navbar-static-top" ><!-- class="navbar navbar-static-top navbar-inverse" -->

					<div class="navbar-header">
						<!-- minified menu icons - 3 horizontal bars -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        	<i class="fa fa-bars"></i>
				      	</button>
					     <!-- minified search and signup icons -->
					     <div class="mobile-icons visible-xs-block">
					        <a data-toggle="collapse" data-target="#search-bar" class="circl" id="small-search-btn"><i class="fa fa-search"></i></a>
					        <a data-toggle="collapse" data-target="#signup-bar" class="circl" id="small-signup-btn"><i class="fa fa-user"></i></a>
					     </div>
					     <!-- logo -->
							 <?php if (is_home() || is_front_page()){ ?>
								 <h1 class="text-logo"><a href="<?php bloginfo('url'); ?>">Sensitive <span class="first-letter">S</span>kin</a></h1>
							 <?php }else{ ?>
								 <h3 class="text-logo"><a href="<?php bloginfo('url'); ?>">Sensitive <span class="first-letter">S</span>kin</a></h3>
							 <?php } ?>
							 
						  <!--<a title="Sensitive Skin" class="navbar-brand" href="<?php bloginfo('url'); ?>">
								<svg class="logo" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 440 60.7"><path d="M0 51.1l5.9-14.4c2.6 1.9 5 3.2 7.1 4.1 2.1 0.9 4 1.3 5.8 1.3 1.3 0 2.3-0.2 3-0.7 0.7-0.5 1.1-1.1 1.1-2 0-1.4-1.8-2.5-5.4-3.3 -1.2-0.3-2.1-0.5-2.7-0.6 -3.8-0.9-6.8-2.6-8.8-5s-3.1-5.4-3.1-8.9c0-5.5 2-10 5.9-13.5 4-3.5 9.2-5.2 15.6-5.2 3 0 5.9 0.4 8.7 1.2 2.9 0.8 5.7 1.9 8.6 3.5L36.1 21c-1.8-1.3-3.6-2.3-5.4-3 -1.8-0.7-3.5-1-5.2-1 -1.3 0-2.3 0.2-3 0.7 -0.7 0.4-1.1 1-1.1 1.8 0 1.5 2.6 2.7 7.7 3.8 0.8 0.2 1.5 0.3 1.9 0.4 3.5 0.8 6.3 2.4 8.4 4.9s3.1 5.4 3.1 8.9c0 5.7-2.1 10.3-6.2 14 -4.1 3.6-9.5 5.4-16 5.4 -3.4 0-6.7-0.5-10.1-1.4S3.4 53 0 51.1z"/><path d="M45.4 55.5V19.4h24.1v9.8H58.1v3.5h10.3v9.2H58.1v3.8h11.7v9.8H45.4z"/><path d="M73.8 55.5V19.4H86.5l11.2 18.9c-0.1-0.8-0.2-1.8-0.3-2.8s-0.1-2.3-0.1-4V19.4h12.5v36H97L85.9 36.7c0.1 0.8 0.2 1.7 0.3 2.6 0.1 0.9 0.1 2 0.1 3.1v13H73.8z"/><path d="M113.1 52.4l4.1-10.1c1.9 1.3 3.5 2.2 5 2.8 1.5 0.6 2.8 0.9 4.1 0.9 0.9 0 1.6-0.2 2.1-0.5 0.5-0.3 0.8-0.8 0.8-1.4 0-1-1.3-1.8-3.8-2.3 -0.8-0.2-1.5-0.3-1.9-0.4 -2.7-0.7-4.7-1.8-6.2-3.5 -1.4-1.7-2.1-3.8-2.1-6.3 0-3.9 1.4-7 4.2-9.4 2.8-2.4 6.4-3.6 10.9-3.6 2.1 0 4.1 0.3 6.1 0.8 2 0.5 4 1.4 6.1 2.5l-3.9 9.4c-1.2-0.9-2.5-1.6-3.8-2.1 -1.3-0.5-2.5-0.7-3.7-0.7 -0.9 0-1.6 0.2-2.1 0.5 -0.5 0.3-0.7 0.7-0.7 1.3 0 1 1.8 1.9 5.4 2.7 0.6 0.1 1 0.2 1.3 0.3 2.5 0.6 4.4 1.7 5.9 3.4s2.1 3.8 2.1 6.3c0 4-1.4 7.2-4.3 9.8 -2.9 2.5-6.6 3.8-11.2 3.8 -2.4 0-4.7-0.3-7.1-1C117.8 54.7 115.5 53.7 113.1 52.4z"/><path d="M146.2 55.5V19.4h13.2v36H146.2z"/><path d="M170.5 55.5v-24.2h-7.2V19.4h27.4v11.8h-7.2v24.2H170.5z"/><path d="M195 55.5V19.4h13.2v36H195z"/><path d="M223.8 55.5l-13.8-36h14l3.8 13c0.6 1.9 1 3.5 1.2 4.8 0.3 1.3 0.4 2.5 0.5 3.7h0.2c0.2-1.2 0.4-2.5 0.7-3.8 0.3-1.3 0.7-2.8 1.2-4.4l4-13.3h13.8l-13.7 36H223.8z"/><path d="M251.2 55.5V19.4h24.1v9.8h-11.4v3.5h10.3v9.2h-10.3v3.8h11.7v9.8H251.2z"/><path d="M302.3 51.1l5.9-14.4c2.6 1.9 5 3.2 7.1 4.1 2.1 0.9 4 1.3 5.8 1.3 1.3 0 2.3-0.2 3-0.7 0.7-0.5 1.1-1.1 1.1-2 0-1.4-1.8-2.5-5.4-3.3 -1.2-0.3-2.1-0.5-2.7-0.6 -3.8-0.9-6.8-2.6-8.8-5s-3.1-5.4-3.1-8.9c0-5.5 2-10 5.9-13.5 4-3.5 9.2-5.2 15.6-5.2 3 0 5.9 0.4 8.7 1.2s5.7 1.9 8.6 3.5l-5.6 13.5c-1.8-1.3-3.6-2.3-5.4-3 -1.8-0.7-3.5-1-5.2-1 -1.3 0-2.3 0.2-3 0.7 -0.7 0.4-1.1 1-1.1 1.8 0 1.5 2.6 2.7 7.7 3.8 0.8 0.2 1.5 0.3 1.9 0.4 3.5 0.8 6.3 2.4 8.4 4.9s3.1 5.4 3.1 8.9c0 5.7-2.1 10.3-6.2 14 -4.1 3.6-9.5 5.4-16 5.4 -3.4 0-6.7-0.5-10.1-1.4S305.6 53 302.3 51.1z"/><path d="M347.7 55.5V19.4h12.7v15.4l8.2-15.4h14.7l-10.9 17.7 12.4 18.3h-15.7l-8.7-15.1v15.1H347.7z"/><path d="M386.4 55.5V19.4h13.2v36H386.4z"/><path d="M404.1 55.5V19.4h12.7l11.2 18.9c-0.1-0.8-0.3-1.8-0.3-2.8 -0.1-1-0.1-2.3-0.1-4V19.4h12.5v36h-12.8l-11.1-18.7c0.1 0.8 0.2 1.7 0.3 2.6 0.1 0.9 0.1 2 0.1 3.1v13H404.1z"/></svg>
							</h1>-->

					<!-- Search -->

					      <div id="search-bar" class="collapse">
					        <div class="container">
					          <div class="row">
					            <div class="search">
					            	<a class="search-closer" data-toggle="collapse" data-target="#search-bar"><i class="fa fa-times"></i></a>
					              <form method="get" role="form" action="<?php bloginfo('wpurl'); ?>">
					                <div class="form-group">
					                  <input type="text" class="form-control input-lg" name="s" onfocus="this.placeholder=''" onblur="this.placeholder='Type in search here'" placeholder="Type in search here">
					                </div>
					              </form>
					              
					            </div><!-- search -->
					          </div><!-- row -->
					        </div><!-- container -->
					      </div><!-- search-bar -->

						   <div id="signup-bar" class="collapse">
					         <h4>Join our mailing list<span class="pull-right">
					         	<a class="search-closer" data-toggle="collapse" data-target="#signup-bar">
					         	<i class="fa fa-times"></i></a></span>
							</h4>

					           <?php include('inc/mailchimp-signup-form.php');?>

					        </div><!-- signup-bar -->

					</div><!-- navbar-header -->

					<div id="collapsing-navbar" class="navbar-collapse collapse navbar-responsive-collapse">
						<?php

						$args = array(
							'theme_location' => 'primary',
							'depth'      => 2,
							'container'  => false,
							'menu_class'     => 'nav navbar-nav navbar-right',
							'walker'     => new Bootstrap_Walker_Nav_Menu()
							);

						if (has_nav_menu('primary')) {
							wp_nav_menu($args);
						}

						?>
						<ul class="nav navbar-nav navbar-right">
						<li class="hidden-xs">
					          <a data-toggle="collapse" data-target="#signup-bar"  aria-expanded="false" id="large-signup-btn">
					            <i class="circl crl-left">
					              <i class="fa fa-user"></i>
					            </i>
					          </a>
					        </li>
					        <li class="hidden-xs">
					          <a data-toggle="collapse" data-target="#search-bar" aria-expanded="false" id="large-search-btn">
					            <i class="circl">
					              <i class="fa fa-search" ></i>
					            </i>
					          </a>
					       
					        </li>
					    </ul>
					<br/>
						<!-- </div> -->


					</div><!-- navbar-collapse -->
					
				</div><!-- container-fluid -->   

			</nav>

		</header><!-- #masthead -->

	<div id="content" class="site-content page-transition">

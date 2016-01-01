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
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="container" data-spy="scroll" data-target=".navbar-brand" data-offset="50">
		<div id="page" class="hfeed site">
<!-- 	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sensitive-skin-bootstrap' ); ?></a>
 -->	<header>
			<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid navbar-static-top" ><!-- class="navbar navbar-static-top navbar-inverse" -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>

						</button>
						<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
							<img id="logo" src="http://www.sensitiveskinmagazine.com/wp-content/images/SSMLogo.svg" width="600" height="auto" />
						</a>

							<!-- <div id="awesome-social-buttons"> -->
								
							
								<!-- <a class="btn btn-social-icon btn-sm " href="http://www.twitter.com/sensitivemag">
			    					<span class="fa fa-twitter"></span>
			  					</a>
			  					<a class="btn btn-social-icon btn-sm" href="http://www.facebook.com/sensitiveskin">
								    <span class="fa fa-facebook"></span>
								</a>
								<a class="btn btn-social-icon btn-sm btn-google-plus" <a href="//plus.google.com/100022193362098500932?prsrc=3">
								    <span class="fa fa-google-plus"></span>
								</a> -->
							
		  					<!-- </div> -->
		<!-- 					<a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
		 -->					<!-- <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a> -->
					</div><!-- navbar-header -->

					<div class="navbar-collapse collapse navbar-responsive-collapse">
						<!-- <div class="row"> -->


						
				   	   	<!-- href="javascript::"onclick="document.getElementById('search-field').className='show';
				   	   	document.getElementById('search_btn').className='hide';" -->
				   	   	<a id="search_btn"   class="btn btn-default search-button" data-toggle="collapse" data-target="#search-row">
				        	<span class="fa fa-search" ></span></a>

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
						<!-- </div> -->


					</div><!-- navbar-collapse -->
					
				</div><!-- container-fluid -->   

			</nav>
			<div class="container">
				<div id="search-row" class="collapse row">
						<form method="get" class="navbar-form navbar-left form-search" role="search" action="http://www.sensitiveskinmagazine.com">
				        	<div class="form-group" id="search-field" >
				          		<input type="text" class="form-control search-query" name="s" placeholder="Search">
				        	</div>
				        	
				   	   	</form>
					  </div>
			</div><!-- container -->

		</header><!-- #masthead -->

	<div id="content" class="site-content">

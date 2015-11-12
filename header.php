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
	<div id="container">
<div id="page" class="hfeed site">
<!-- 	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sensitive-skin-bootstrap' ); ?></a>
 -->

<!--  	<div id="headerimage">
                    	
                        <?php if (is_home()) { ?> 
                        	<h1>Sensitive Skin Magazine</h1>
                        <?php } else { ?>
                        	<h3>Sensitive Skin Magazine</h3>
                        <?php } ?>
                        <figure id="figure-logo">
                        <a href="<?php bloginfo('url'); ?>" >
                        	<img src="http://www.sensitiveskinmagazine.com/wp-content/images/SSMLogo.svg" />
                        </a>
                        </figure>
                    </div> -->

		<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid navbar-static-top" ><!-- class="navbar navbar-static-top navbar-inverse" -->
<!-- 			<div class="container">
 -->				<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>

					</button>
					<a class="navbar-brand" href="#">
						<img src="http://www.sensitiveskinmagazine.com/wp-content/images/SSMLogo.svg" width="200" height="auto" />
					</a>

					<!-- <div id="awesome-social-buttons">
						
					
						<a class="btn btn-social-icon btn-sm " href="http://www.twitter.com/sensitivemag">
	    					<span class="fa fa-twitter"></span>
	  					</a>
	  					<a class="btn btn-social-icon btn-sm" href="http://www.facebook.com/sensitiveskin">
						    <span class="fa fa-facebook"></span>
						</a>
						<a class="btn btn-social-icon btn-sm btn-google-plus" <a href="//plus.google.com/100022193362098500932?prsrc=3">
						    <span class="fa fa-google-plus"></span>
						</a>
					
  					</div> -->
<!-- 					<a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
 -->					<!-- <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a> -->
				</div>
				
				<div class="navbar-collapse collapse navbar-responsive-collapse">

					<form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control search-query" name="s" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default" id="searchsubmit" value="Search">
			        <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
			      </form>

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
				</div>

			<!-- </div> -->
		</div>           
	</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

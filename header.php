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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<!-- 	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sensitive-skin-bootstrap' ); ?></a>
 -->


		<div id="headerimage">

            <?php if (is_home()) { ?> 
            	<h1>Sensitive Skin Magazine</h1>
            <?php } else { ?>
            	<h3>Sensitive Skin Magazine</h3>
            <?php } ?>
            <!--LOGO-->
            <figure id="figure-logo">
            	<a href="<?php bloginfo('url'); ?>" ><img src="http://www.sensitiveskinmagazine.com/wp-content/images/SensitiveSkinLogo_trimmed_halfsize.png" alt="SensitiveSkinLogo" /></a>
            </figure>
        </div>

		<nav role="navigation">
		<div class="navbar navbar-static-top navbar-inverse">
			<div class="container">
				<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
<!-- 					<a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
 -->					<!-- <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a> -->
				</div>

				<div class="navbar-collapse collapse navbar-responsive-collapse">
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
			</div>
		</div>           
	</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

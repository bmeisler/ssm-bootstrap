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
<meta name="google-site-verification" content="UpakgIyAoYefwPTgGM5pZZTlvlljudV-Bhb7nDaw4No" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

<!--  Handles the emails in the footer -->
     <script>function maillink(lhs,rhs){document.write("<a href=\"mailto");document.write(":" + lhs + "@");document.write(rhs + "\" >" + lhs + "@" + rhs + "<\/a>");}</script>


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
						  <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
								<img id="logo" src="<?php bloginfo('wpurl'); ?>/wp-content/images/SSMLogo.svg" width="200" height="28" alt="sensitive skin magazine logo" />
						  </a>

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

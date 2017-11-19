<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>



<aside id="secondary" class="widget-area col-md-4 col-lg-4" role="complementary">
	<div class="well no-stack">
		
		<?php include ('inc/sidebar-litbreaker.php'); ?>

		<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
		<?php endif; ?>
		<?php include ('inc/sidebar-books.php'); ?>
		<?php include ('inc/sidebar-back-issues.php'); ?>

		<?php //include ('inc/sidebar-Animated.php'); ?>
		<?php //include ('inc/sidebar-social.php'); ?>
		<?php //include ('inc/sidebar-TOC.php'); ?>
	</div>	
</aside><!-- .sidebar .widget-area -->
</div><!-- #row -->
</div><!-- #container -->

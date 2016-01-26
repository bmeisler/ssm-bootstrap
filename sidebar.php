<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sensitive_Skin_Bootstrap
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-md-4 col-lg-4" role="complementary">
	<div class="well no-stack">
		
		<?php include ('inc/sidebar-litbreaker.php'); ?>
		<?php include ('inc/sidebar-Animated.php'); ?>
		<?php include ('inc/sidebar-social.php'); ?>
		<?php include ('inc/sidebar-TOC.php'); ?>
	</div>	
</div><!-- #secondary -->

</div><!-- #row -->
</div><!-- #container -->

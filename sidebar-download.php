<?php
/**
 * The sidebar containing the download sidebar widget area.
 *
 * @package bootstrapwp
 */

if ( ! is_active_sidebar( 'download' ) ) {
	return;
}
?>


<div id="secondary" class="widget-area col-md-4 col-lg-4" role="complementary">
	<div class="well no-stack">
<a class="btn btn-primary" role="button" href="<?php bloginfo('url'); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>"><?php edd_price($post->ID);?> Buy the PDF</a>

		<?php dynamic_sidebar( 'download' ); ?>
		<?php include ('inc/sidebar-Animated.php'); ?>
		<?php include ('inc/sidebar-social.php'); ?>
	</div><!-- .well -->
</div><!-- #secondary -->

</div> <!-- .row -->
</div> <!-- .container -->
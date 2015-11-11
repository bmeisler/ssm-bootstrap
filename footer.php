<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sensitive_Skin_Bootstrap
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row five-column-container">
				<div class="col-md-12 col-lg-12">
					<?php include('inc/recentPostsFiveCol.php');?>
				</div>
			</div><!-- .row -->
			<div class="row blogroll">
				<div class="col-md-12 col-lg-12">
					<?php include('inc/blogRoll.php');?>
				</div>
			</div><!-- .row -->
			<div class="row bottom-row">
				<div class="col-md-6 col-lg-6">
					<?php if (has_nav_menu('footer-menu', 'sensitive-skin-bootstrap')) { ?>
		            <nav role="navigation">
		            <?php wp_nav_menu(array(
		              'container'       => '',
		              'menu_class'      => 'footer-menu',
		              'theme_location'  => 'footer-menu')
		            ); 
		            ?>
		          </nav>
            	<?php } ?>
				</div>
				<div class="col-md-6 col-lg-6">
				<p class="copyright">&copy; <?php _e('Copyright', 'bootstrapwp'); ?> <?php echo date('Y'); ?> - <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

</div> <!-- end #container -->

<?php wp_footer(); ?>
   <script src="<?php bloginfo('wpurl'); ?>/wp-content/js/googleanalytics.js" type="text/javascript"></script>

    <?php if( $_SERVER['SERVER_ADDR'] != '127.0.0.1'){ ?>
            <?php   echo '<script src="//static.getclicky.com/js" type="text/javascript"></script>';?>
            <?php   echo '<script type="text/javascript">try{ clicky.init(66421456); }catch(e){}</script>';?>
            <?php   echo '<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/66421456ns.gif" /></p></noscript>'; }?>
</body>
</html>

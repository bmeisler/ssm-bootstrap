<?php
/**
 * The template for displaying Book posts.
 * *
 * @package Sensitive_Skin_Bootstrap
 */

get_header(); ?>
<div class="container">
	<div class="row">
	<div id="primary" class="col-md-8 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content-books', 'single' ); ?>

			<?php 
			// the_post_navigation(); 
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php get_footer(); ?>
</div> <!-- end #content -->
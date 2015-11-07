<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sensitive_Skin_Bootstrap
 */

get_header(); ?>
<div class="container">
	<div class="row">
	<div id="primary" class="col-md-8 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'download' ); ?>

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

<?php get_sidebar('download'); ?>
<?php get_footer(); ?>

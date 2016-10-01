<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sensitive_Skin_Bootstrap
 */

get_header(); ?>
<div class="container">
	<div class="row">
	<div id="primary" class="col-md-8 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					// the_archive_title( '<h1 class="page-title">', '</h1>' );

					 the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				<?php if (is_category()) { ?>
						    <h1 class="archive-title h2">
							    <?php single_cat_title(); ?>
					    	</h1>
					    
					    <?php } elseif (is_tag()) { ?> 
						    <h1 class="archive-title h2"> 
							   <?php single_tag_title(); ?>
						    </h1>
					    
					    <?php } elseif (is_author()) { 
					    	global $post;
					    	$author_id = $post->post_author;
					    }?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					// get_template_part( 'template-parts/content-archive', get_post_format() );
					get_template_part( 'template-parts/content-frontpage-lazy', get_post_format() );
				?>

			<?php endwhile; ?>

			<!--<?php the_posts_navigation(); ?>-->
			<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content-archive', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

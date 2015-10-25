<?php
/**
 * Template Name: Books Template
 *
 * This is the template that displays all the custom Books posts.
 *
 * @package Sensitive_Skin_Bootstrap
 */
?>
<?php


get_header(); ?>

<div class="container">
	<div class="row issues">

	<div id="primary" class="col-md-12 col-lg-12">
		<main id="main" class="site-main" role="main">

			<?php 
			// the query
			$the_query = new WP_Query( array('post_type' => 'issues') ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

				<div class="row">
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
				
					<div class="col-sm-6 col-md-3">
						<a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('large'); ?>
							
						</a> 
						<h2><?php the_title(); ?></h2>
						<p><?php the_excerpt(); ?></p>
						
					</div><!-- .col -->
				
				<?php endwhile; ?>
				<!-- end of the loop -->
				</div><!-- .row -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

			
		</main><!-- #main -->
	</div><!-- #primary -->

	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>

<?php
/**
 * Template Name: Downloads Template
 *
 * This is the template that displays all the custom Books posts.
 *
 * @package Sensitive_Skin_Bootstrap
 */
?>
<?php


get_header(); ?>

<div class="container">
	<div class="row">

	<div id="primary" class="col-md-12 col-lg-12">
		<main id="main" class="site-main books" role="main">

			<?php 
			// the query
			$the_query = new WP_Query( array('post_type' => 'download', 'download_category'=>'print-issues-volume-2') ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

				<div class="row">
					<div id="book-items">

					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<div class="col-sm-6 col-md-4 item">
						<div class="book-item">
							<a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('large'); ?>
							</a>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
							<p><?php the_field('brief_description') ?></p>
							<!-- <a href="<?php the_permalink(); ?>" class="btn btn-primary">More info</a></br> -->
							      	<a role="button" class="btn btn-primary" role="button" href="<?php the_field('amazon_print_link') ?>" >Buy it on Amazon</a>
   		<a role="button" class="btn btn-primary offset5" role="button" href="<?php the_field('kindle_link') ?>" >Buy it on Kindle</a>

						</div>
					</div>
					<?php endwhile; ?>
					<!-- end of the loop -->
				</div> <!-- .book-items -->
				</div> <!-- .row -->
				

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

			
		</main><!-- #main -->
	</div><!-- #primary -->

	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>

<?php
/**
 * Template Name: Original Print Issues Template
 *
 * This is the template that displays all the Peau Sensible issues in a grid.
 *
 * @package Sensitive_Skin_Bootstrap
 */
?>
<?php


get_header(); ?>

<div class="container">
	<div class="row">
	<div id="primary" class="col-md-12 col-lg-12">
		<main id="main" class="site-main books">
			<div class="row">
				<div class="col-md-12 col-lg-12">
				<h2>Peau Sensible</h2>
				<p class="description">Here they are, warts and all - scanned versions of the original print run of <em>Peau Sensible/Sensitive Skin</em>, from 1991 - 1994. 8.5" x 11", in glorious black and white, these look great on an iPad or whatever, or you can print them out for yourself, if that's the sort of thing you like to do.

<p class="description">Jam-packed with downtown NYC superstars, writers, musicians and artists, including <strong>Richard Hell, Herbert Huncke, Ann Rower, Richard Kern, Chris Kraus, Eileen Myles, Jack Micheline, Emily XYZ, Patrick McGrath, Taylor Mead</strong> and many, many more. Check out the individual issues for more details.
<br style:clear="both">
				</div><!-- col -->
				</div><!-- row -->
			<?php 
			// the query
			$the_query = new WP_Query( array('post_type' => 'download', 'download_category'=>'original-print-issues', 'posts_per_page'=>10) ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
				
				<div class="row">
					<div id="book-items">

					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<div class="col-sm-6 col-md-4 item">
						<div class="book-item">
							<a class="thumbnail the-display" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('large'); ?>
							</a>
							<h4 class="issue-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
							<?php the_field('brief_description') ?>
							<!-- <a href="<?php the_permalink(); ?>" class="btn btn-primary">More info</a></br> -->
							<?php if (get_field('books_amazon_print_link') !== ''){?>
								<a role="button" class="btn btn-primary" href="<?php the_field('books_amazon_print_link') ?>" >Buy print version</a>
							<?php } ?>

							 
							      	
   					<a role="button" class="btn btn-primary offset5"  href="<?php bloginfo('url'); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>"><?php edd_price($post->ID);?> Buy  PDF</a>


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

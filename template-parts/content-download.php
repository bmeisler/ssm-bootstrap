<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sensitive_Skin_Bootstrap
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="page-title download-title">', '</h1>' ); 
		
        ?>
		<!--<div class="entry-meta">

			<?php sensitive_skin_bootstrap_posted_on(); ?>
			
		</div> .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-content single-content clearfix">
		<?php the_post_thumbnail('large'); ?>

		<?php the_content(); ?>
			<a class="btn btn-primary" role="button" href="<?php bloginfo('url'); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>"><?php edd_price($post->ID);?> Buy the PDF</a>
			<a class="btn btn-primary" href="<?php the_field('amazon_print_link') ?>" >Buy print edition</a>

			<p id="history" class="description"><em>Sensitive Skin,</em> an anthology of post-beat, pre-apocalyptic art, writing, music and whatnot, features work by both world-famous and new-and-emerging artists, writers, and musicians from around the globe.
		
		<p class="description"><em>Sensitive Skin</em> began as a print venture from New York’s Lower East Side in the 1990s, and published such literary luminaries as Richard Hell, Steve Cannon, Jack Micheline, Penny Arcade, Eileen Myles, Lynne Tillman, Patrick McGrath, Bob Holman, Maggie Estep, Emily XYZ, Herbert Huncke and Joel Rose, with art by Andres Serrano, Ari Marcopolis, Andrew Castrucci and James Romberger, to name but a few….

		<p id="bottom" class="description"><em>Sensitive Skin</em> was reborn in the summer of 2010, and has presented original work by such esteemed writers, artists and musicians as Samuel R. Delaney, John Lurie, Gary Indiana, Sharon Mesmer, Charles Gatewood, Gretchen Faust, Alex Katz, Peter Blauner, Hal Sirowitz, Arthur Nersesian, Maggie Estep, Fred Frith, Evelyn Bencicova, Steve Dalachinsky, Marty Thau, Justine Frischmann, Craig Clevenger, Darius James, Stewart Home, Michael A. Gonzales, Drew Hubner, Jonathan Shaw, Melissa Febos, Stephen Lack, Max Blagg, Patricia Eakins, Díre McCain, Rob Roberge, Kurt Wolf, Erika Schickel, John S. Hall, Kevin Rafferty, Elliott Sharp, Mike Hudson, James Greer, Ruby Ray, William S. Burroughs and Allen Ginsberg.

		<p class="description">
		<?php the_terms( $post->ID, 'download_tag', 'Tags: ', ', ', '' );?>
	</br>
		<?php the_terms( $post->ID, 'download_category', 'Categories: ', ', ', '' );	?>
	</p>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sensitive-skin-bootstrap' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php sensitive_skin_bootstrap_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


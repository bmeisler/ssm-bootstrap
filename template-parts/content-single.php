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
		<?php the_title( '<h1 class="entry-title single-title">', '</h1>' ); 
		$subtitle = get_post_meta($post->ID, 'subtitle', true);
            if (!$subtitle)
            {
                echo '<h1 id="author">'.bones_get_the_author_posts_link().'</h1>';
            }
            else if ($subtitle)
            {
                echo '<h1 id="author">'.$subtitle.'</h1>';
            }
            ?>
		<!--<div class="entry-meta">

			<?php sensitive_skin_bootstrap_posted_on(); ?>
			
		</div> .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-content single-content clearfix">
		
		<?php the_content(); ?>
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


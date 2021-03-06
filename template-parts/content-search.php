<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sensitive_Skin_Bootstrap
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
fooo
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php 
			// sensitive_skin_bootstrap_posted_on(); 
			$subtitle = get_post_meta($post->ID, 'subtitle', true);
            if (!$subtitle)
            {
                echo 'by <span class="author">'.get_the_author().'</span>';
            }
            else if ($subtitle)
            {
                echo 'by <span class="author">'.$subtitle.'</span>';
            }
            ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php sensitive_skin_bootstrap_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


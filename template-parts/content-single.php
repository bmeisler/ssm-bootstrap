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
                echo '<h1 id="author">'.get_the_author().'</h1>';
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
		<?php		
		// custom code to add JetPack social buttons before content
		if ( function_exists( 'sharing_display' ) ) {
		    sharing_display( '', true );
		}
		 
		if ( class_exists( 'Jetpack_Likes' ) ) {
		    $custom_likes = new Jetpack_Likes;
		    echo $custom_likes->post_likes( '' );
		}
		?>
		<?php the_content(); ?>
		<?php		
		// custom code to add JetPack social buttons after content too!
		if ( function_exists( 'sharing_display' ) ) {
		    sharing_display( '', true );
		}
		 
		if ( class_exists( 'Jetpack_Likes' ) ) {
		    $custom_likes = new Jetpack_Likes;
		    echo $custom_likes->post_likes( '' );
		}
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sensitive-skin-bootstrap' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php comments_template(); ?>

	<footer class="entry-footer">
		<?php //sensitive_skin_bootstrap_entry_footer(); ?>
        <!--custom function based on core to exclude featured-->
        <?php sensitive_skin_bootstrap_entry_excluded_tag_footer() ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


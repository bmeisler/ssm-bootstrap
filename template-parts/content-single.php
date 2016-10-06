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
		<?php the_title( '<h1 class="entry-title single-title margBotLg">', '</h1>' ); 
		$subtitle = get_post_meta($post->ID, 'subtitle', true);
            if (!$subtitle)
            {
                echo ('<h1 class="the-author margTopLg paddingTopLg link-color">');
				the_author_posts_link();
				echo ('</h1>');
            }
            else if ($subtitle)
            {
                echo '<h1 class="the-author margTopLg paddingTopLg">'.$subtitle.'</h1>';
            }
            ?>
		<!--<div class="entry-meta">

			<?php sensitive_skin_bootstrap_posted_on(); ?>
			
		</div> .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-content single-content clearfix margBotLg">
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
	

	<footer class="entry-footer">
		<?php //sensitive_skin_bootstrap_entry_footer(); ?>
        <!--custom function based on core to exclude featured-->
        <?php sensitive_skin_bootstrap_entry_excluded_tag_footer() ?>
		<?php comments_template(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


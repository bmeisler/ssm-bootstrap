<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sensitive_Skin_Bootstrap
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="archive-content">
	<header class="entry-header">


		<?php the_title( sprintf( '<h2 class="entry-title archive-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	 	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php 
			// sensitive_skin_bootstrap_posted_on(); 
			
			$subtitle = get_post_meta($post->ID, 'subtitle', true);
            if (!$subtitle)
            {
                echo '<div class="archive-author">'.bones_get_the_author_posts_link().'</div>';
            }
            else if ($subtitle)
            {
                echo '<div class="archive-author">'.$subtitle.'</div>';
            }?>
		</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			'goo'
			<?php if ( has_post_thumbnail() ) { ?>
                                <figure class="post-img-thumb">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    	<?php the_post_thumbnail('thumbnail');?>
                                    </a>
                                </figure>

                                <?php } else { ?>
                                <?php $postimageurl = get_post_meta($post->ID, 'post-img', true);
                                if ($postimageurl) { ?>
                                    <figure class="post-img">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php  bloginfo( 'wpurl' ); ?>/wp-content/images/tns/<?php echo $postimageurl; ?>" alt="Post Pic"  /></a>
                                    </figure>
                                    <?php } ?>

                                <?php } ?>
			</a>
		<?php endif; ?>
            <div class="entry">
	              <?php the_excerpt() ?>
	        </div>

			<?php
			// the_content( sprintf(
			// 	/* translators: %s: Name of current post. */
			// 	wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'sensitive-skin-bootstrap' ), array( 'span' => array( 'class' => array() ) ) ),
			// 	the_title( '<span class="screen-reader-text">"', '"</span>', false )
			// ) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sensitive-skin-bootstrap' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php 
		// sensitive_skin_bootstrap_entry_footer(); 
		?>
	</footer><!-- .entry-footer -->
</div>
</article><!-- #post-## -->

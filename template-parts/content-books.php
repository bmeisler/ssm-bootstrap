<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<div id="content">
				<div id="inner-content" class="wrap clearfix">
				
				    <div id="main" class="eightcol first clearfix" role="main">
				
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
					    ?>
						    <h1 class="archive-title h2">

						    	<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>

						    </h1>
					    <?php } elseif (is_day()) { ?>
						    <h1 class="archive-title h2">
	    						<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
						    </h1>
		
		    			<?php } elseif (is_month()) { ?>
			    		    <h1 class="archive-title h2">
				    	    	<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
					        </h1>
					
					    <?php } elseif (is_year()) { ?>
					        <h1 class="archive-title h2">
					    	    <span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
					        </h1>
					    <?php } ?>

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
					     <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                            <div class="archive-content clearfix">

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

                                <div class="archive-post-title">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </div>
                                 <?php $subtitle = get_post_meta($post->ID, 'subtitle', true);
                                        if (!$subtitle)
                                        {
/*                                             echo '<div class="archive-author">'.get_the_author().'</div>'; */
                                            echo '<div class="archive-author">'.bones_get_the_author_posts_link().'</div>';
                                        }
                                        else if ($subtitle)
                                        {
                                            echo '<div class="archive-author">'.$subtitle.'</div>';
                                        }
                                        ?>

                                <div class="entry">
                                    <?php the_excerpt() ?>
                                </div>

                            </div>
                            <?php
                            	$args = array(
		'post_type' => 'testimonials', // enter your custom post type
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page'=> '12',  // overrides posts per page in theme settings
	);
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ):
				
		while( $loop->have_posts() ): $loop->the_post(); global $post;
		echo '<div id="testimonials">';
			echo '<div class="one-fourth first">';
			echo '<div class="quote-obtuse"><div class="pic">'. get_the_post_thumbnail( $id, array(150,150) ).'</div></div>';
			echo '<div style="margin-top:20px;line-height:20px;text-align:right;"><cite>'.genesis_get_custom_field( '_cd_client_name' ).'</cite><br />'.genesis_get_custom_field( '_cd_client_title' ).'</div>';
			echo '</div>';	
			echo '<div class="three-fourths" style="border-bottom:1px solid #DDD;">';
			echo '<h3>' . get_the_title() . '</h3>';
			echo '<blockquote><p>' . get_the_content() . '</p></blockquote>';	
			echo '</div>';
		echo '</div>';
		
		endwhile;
		
	endif;?>
					
					    </article> <!-- end article -->
					
					    <?php endwhile; ?>	
					    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
					    <?php endif; ?>
					        			
    				</div> <!-- end #main -->
    
	    			<?php get_sidebar(); ?>
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

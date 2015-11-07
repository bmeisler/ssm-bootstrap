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

		<?php
			 if (has_tag( 'featured')) { //If this is a featured post, try to use as large a preview image as possible
      			//echo 'featured<br>';
      			
                $img_path =  catch_that_image();
                
                if ($img_path != '' && $img_path != null){ //if there is an image in the post, use it and style it according to size
                //	echo $img_path;
                	$sizes = getimagesize($img_path);
                    $width = $sizes[0];
                    $height = $sizes[1];
                    //echo 'width: '.$width;
                // 
                    if ($width>=200 & $width < 400 || $height > $width){
                    	//echo "medium";
                    	if ($currentAlignment=="right"){
                           $currentAlignment = "left";
                    	?>
                    	<figure class="post-img-medium">
	                        <a href="<?php the_permalink(); ?>" rel="bookmark">
	                            <img src="<?php echo $img_path; ?>"  />
	                         </a>
                        </figure>
                        <?php
                        }else{ 
	                       	$currentAlignment = "right";
	                       	?>
	                       	<figure class="post-img-medium-right">
	                            <a href="<?php the_permalink(); ?>" rel="bookmark">
	                                <img src="<?php echo $img_path; ?>"  />
	                             </a>
                            </figure>
                        <?php
                    	}
                        ?>
                    <?php
                    } else if ($width >= 400){ ?>
                    	<figure class="post-img-large">
	                        <a href="<?php the_permalink(); ?>" rel="bookmark">
	                            <img src="<?php echo $img_path; ?>"  />
	                        </a>
                        </figure>
                    <?php 
                	}          
                }else{//no image found in post, use small thumbnail - eg Hardin's Drone loops
                	//echo "no image found in post, use thumbnail";
                	if ( has_post_thumbnail() ) { ?>
                
                	<figure class="post-img-medium">
	                    <a href="<?php the_permalink(); ?>" rel="bookmark">
	                        <?php the_post_thumbnail('archive-thumb');?>
	                    </a>
                	</figure> 

            	<?php 
            		
                	}else{
                		//echo "try something else";
                	}
                }
            } else {//NOT A FEATURED POST - use a small image
                 //USE A FEATURED IMAGE IF ONE EXISTS
         		//echo 'not featured';
                $postimageurl = get_post_meta($post->ID, 'post-img', true);//DOES IT HAVE A TN?
                //echo $postimageurl;
                if ( has_post_thumbnail() ) { ?>
                
                	<figure class="post-img-medium">
	                    <a href="<?php the_permalink(); ?>" rel="bookmark">
	                        <?php the_post_thumbnail('archive-thumb');?>
	                    </a>
                	</figure> 

            	<?php 
            	}else{
            		//echo "get an image";
            		$img_path =  catch_that_image();
                
	                if ($img_path != '' && $img_path != null){ //if there is an image in the post, use it and style it according to size
	                	//echo $img_path;
	                	$sizes = getimagesize($img_path);
	                    $width = $sizes[0];
	                    $height = $sizes[1];
	                    //echo 'width: '.$width;
	                    ?>
	                    <figure class="post-img-medium">
	                        <a href="<?php the_permalink(); ?>" rel="bookmark">
	                            <img src="<?php echo $img_path; ?>"  />
	                         </a>
                        </figure>
                    <?php    
	                }else{
	                	if ($postimageurl){ ?>
                         <figure class="post-img-medium-right">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php  bloginfo( 'wpurl' ); ?>/wp-content/images/tns/<?php echo $postimageurl; ?>" alt="Post Pic"  /></a>
                         </figure>
                      <?php 
                  		}
	                }
            	}
            }?>
		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title archive-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		 	<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php 
				// sensitive_skin_bootstrap_posted_on(); 
				
				$subtitle = get_post_meta($post->ID, 'subtitle', true);
	            if (!$subtitle)
	            {
	                echo '<div class="archive-author">'.get_the_author().'</div>';
	            }
	            else if ($subtitle)
	            {
	                echo '<div class="archive-author">'.$subtitle.'</div>';
	            }?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content clearfix">
			
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

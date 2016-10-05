<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sensitive_Skin_Bootstrap
 */


?>
<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="archive-content">
		<?php
             $post_img_large = false;
             $currentAlignment = "left";
			 if (has_tag( 'featured')) { //If this is a featured post, try to use as large a preview image as possible
      			//echo 'featured<br>';
      			
                $img_path =  catch_that_image();
                //echo '</br>$image_path: '.$img_path;
               

                
                if ($img_path != '' && $img_path != null){ //if there is an image in the post, use it and style it according to size
                	$sizes = getimagesize($img_path);
                    $width = $sizes[0];
                    $height = $sizes[1];
                    //echo 'width: '.$width;
                // 
                    if ($width>=200 & $width < 400 || $height > $width){
                    	//echo "medium";
                    	// if ($currentAlignment=="right"){
                        //    $currentAlignment = "left";
                    	?>
                    	<figure class="post-img-medium">
	                        <a href="<?php the_permalink(); ?>" class="the-display" rel="bookmark">
	                            <img src="<?php echo $img_path; ?>"  />
	                         </a>
                        </figure>
                        <?php
                        
                    } else if ($width >= 400){ ?>
                    	<figure class="post-img-large">
	                        <a href="<?php the_permalink(); ?>" class="the-display" rel="bookmark">
	                            <img src="<?php echo $img_path; $post_img_large=true;?>"  />
	                        </a>
                        </figure>
                    <?php 
                	}          
                }else{//no image found in post, use small thumbnail - eg Hardin's Drone loops
                	//echo "no image found in post, use thumbnail";
                	if ( has_post_thumbnail() ) { 
                		//echo 'use thumbnail'
                		?>

                
                	<figure class="post-img-large">
	                    <a href="<?php the_permalink(); ?>" class="the-display" rel="bookmark">
	                        <?php the_post_thumbnail('large'); $post_img_large=true;?>
	                    </a>
                	</figure> 

            	<?php 
					}
                }
            } else {//NOT A FEATURED POST - use a small image
                 //USE A FEATURED IMAGE IF ONE EXISTS
         		 //echo 'not a featured post';
                $postimageurl = get_post_meta($post->ID, 'post-img', true);//DOES IT HAVE A TN?
            	$img_path =  catch_that_image();

            	
            	if ( has_post_thumbnail() ) { 
            		//echo 'has a thumbnail, use that';
            		?>
                	
                	<figure class="post-img-medium">
	                    <a href="<?php the_permalink(); ?>" class="the-display" rel="bookmark">
	                        <?php the_post_thumbnail('category-medium');?>
	                    </a>
                	</figure> 
                <?php    
	            }
                else if //($img_path != '' && $img_path != null){//if there is an image in the post, use it and style it according to size
	                	(@getimagesize($img_path)){
	                	//echo 'using $img_path';

	                    ?>
	                    <figure class="post-img-medium">
	                        <a href="<?php the_permalink(); ?>" class="the-display" rel="bookmark">
	                            <img src="<?php echo $img_path; ?>"  />
	                         </a>
                        </figure>
                    <?php    
	                

            	//}else if (file_exists(content_url().'/images/tns/'.$postimageurl)){ 
            		}else if (@getimagesize(content_url().'/images/tns/'.$postimageurl)){ 
					//echo 'using postimageurl'
            		?>

                         <figure class="post-img-medium-right">
                            <a href="<?php the_permalink(); $post_img_large=true;?>" class="the-display" rel="bookmark"><img src="<?php  bloginfo( 'wpurl' ); ?>/wp-content/images/tns/<?php echo $postimageurl; ?>" alt="Post Pic"  /></a>
                         </figure>
                      <?php 
                }
            	
            }?>
		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="thumb-title"><a class="link-color" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
			
			?>

		 	<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php 
				// sensitive_skin_bootstrap_posted_on(); 
				
				$subtitle = get_post_meta($post->ID, 'subtitle', true);
	            if (!$subtitle)
	            {
	                echo '<div class="thumb-author">'.get_the_author().'</div>';
	            }
	            else if ($subtitle)
	            {
	                echo '<div class="thumb-author">'.$subtitle.'</div>';
	            }?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="archive-entry-content clearfix">
			
	            <div class="thumb-excerpt paddingRtSm">
                        <div class="entry paddingRtSm">
						<?php
						$the_excerpt = get_excerpt_by_id($post_ID);
						echo $the_excerpt; ?>
						<a href="' . $permalink . '"><div class="read-more margTopLg">Read More</div></a>
                        </div>
                        
					</div>

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

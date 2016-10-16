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
	<div class="thumb-content">
		<?php
             
			 	//$post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post_ID));
				$post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium')[0];
				
				 //$post_thumb = get_the_thumbnail('category-medium');
                  if(!$post_thumb){
                     $img_path = catch_that_image();

                      if ($img_path != '' && $img_path != null){ //if there is an image in the post, use it and style it according to size
                        $post_thumb =  $img_path;
                      }
                    else{
						$post_thumb = null; 
                      }
                 }
				  $permalink = get_the_permalink($post_ID);
				 if ($post_thumb !== null){
					 $img_content = '<a href="' . $permalink . '">
						<span class="post-thumb-medium lazy margRtLg" style="background-image: url(' . $post_thumb . ');"  data-original="' . $post_thumb .  ' </span>
					</a>';
				 }else{
					 $img_content = '';
				 }
				 
                
                 $post_title = get_the_title($post_ID);
                 //$the_excerpt = get_the_excerpt();
                 $the_excerpt = get_excerpt_by_id($post_ID, 224);
                 //$tag_footer = sensitive_skin_bootstrap_archive_entry_footer();
                 $subtitle = get_post_meta($post->ID, 'subtitle', true);
	            if (!$subtitle)
	            {
	               $the_author = get_the_author();
	            }
	            else if ($subtitle)
	            {
	                $the_author = $subtitle;
	            }
				
				 
				$rp .= '
			    <div class="floatLt post-thumb-image-container">' . $img_content . '

					
				
				
                </div>
                <div class="floatRt">
                    <div>
						<a href="' . $permalink . '">
							<h2 class="thumb-title link-color MargBotSm MargTopLg paddingRtLg span-1-1">' . $post_title . '</h2>
						</a>
                    </div>

                    <div class="thumb-author paddingRtLg">'.$the_author.'</div>
                    <div class="thumb-excerpt">
                        <div class="entry paddingRtLg">
						' . $the_excerpt . '
						<a href="' . $permalink . '"><div class="read-more margTopSm">Read More</div></a>
                        </div>
                        
					</div>
                    
			    </div>';

		echo $rp;
		

			 ?>
		</header><!-- .entry-header -->
        
		<div class="clearfix">
			
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

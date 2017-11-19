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
		$post_ID = get_the_ID();
		        if (has_tag( 'featured-art')) {
					$image_size = 'large';
					$title_content = '<h3 class="thumb-title-featured link-color MargBotSm paddingRtLg span-1-1">';
					$author_content ='<h2 class="thumb-author-featured paddingRtLg">';
					$excerpt_content = '<div class="thumb-excerpt-featured margRtLg margBotXLg">';
					$readmore_content = '<div class="read-more margTopSm margRtLg"><a class="link-color" href="';
				}else{
					$image_size = 'medium';
					$title_content = '<h3 class="thumb-title link-color MargBotSm paddingRtLg span-1-1">';
					$author_content ='<h2 class="thumb-author paddingRtLg">';
					$excerpt_content = '<div class="thumb-excerpt margRtXLg">';
					$readmore_content = '<div class="read-more margTopSm margRtLg"><a class="link-color" href="';
				}
				$title_link = '<a class="link-color" href=';
				$post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $image_size)[0];
				
                  if(!$post_thumb){
                     $img_path = catch_that_image();

                      if ($img_path != '' && $img_path != null){ //if there is an image in the post, use it and style it according to size
                        $post_thumb =  $img_path;
                      }
                    else{
						$post_thumb = ''; 
                      }
                 }
				  $permalink = get_the_permalink($post_ID);
				if ($post_thumb !== ''){
					 if ($image_size === 'medium'){
						 $img_content = '<div class="floatLt post-thumb-image-container"><a href="' . $permalink . '">
            <span class="post-thumb-medium lazy margRtLg" style="background-image: url(' . $post_thumb . ');">
            </span>
            </a>
            </div>';
					 }else{
						  $img_content = '<div class="post-thumb-image-container-large"><a href="' . $permalink . '">
            <span class="post-thumb-large lazy" style="background-image: url(' . $post_thumb . ');">
            </span>
            </a>
            </div>';					
					 }
					 
				}else{
					$img_content = '<div class="floatLt post-thumb-image-container paddingRtSm">';
				 }
				 
                
                 $post_title = get_the_title($post_ID);
                 $the_excerpt = get_excerpt_by_id($post_ID, 224);
                 $subtitle = get_post_meta($post->ID, 'subtitle', true);
	            if (!$subtitle)
	            {
	               $the_author = get_the_author();
	            }
	            else if ($subtitle)
	            {
	                $the_author = $subtitle;
	            }
				
				  $rp = $img_content . $title_content . $title_link . $permalink . '>' . $post_title . '</a></h3>'. $author_content . $the_author. '</h2>' .
            $excerpt_content . $the_excerpt .  ' </div>' . $readmore_content . $permalink . '">More...</a></div>';

		echo $rp;
		

			 ?>
        
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

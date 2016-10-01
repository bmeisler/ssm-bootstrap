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

			 
			 	$post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post_ID));
                 $permalink = get_the_permalink($post_ID);
                 $post_title = get_the_title($post_ID);
                 $the_excerpt = get_the_excerpt();
                 //$the_excerpt = self::get_excerpt_by_id($post_ID);
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
			    <div class="floatLt paddingRtSm">
				
					<a href="' . $permalink . '">
						<span class="post-thumb-medium lazy" style="background-image: url(' . $post_thumb . ');"  data-original="' . $post_thumb .  ' </span>
					</a>
				
                </div>
                <div class="margBotSm floatRt">
                    <div>
						<a href="' . $permalink . '">
							<h2 class="thumb-title noMargTop MargBotSm span-1-1">' . $post_title . '</h2>
						</a>
                    </div>

                    <div class="thumb-author" paddingRtSm>'.$the_author.'</div>
                    <div class="thumb-excerpt paddingRtSm">
                        <div class="entry paddingRtSm">
						' . $the_excerpt . '
						<a href="' . $permalink . '">' . __('Read More', 'glassdoor-blog') . '</a>
                        </div>
                        
					</div>
                    
                    
                    
				
			</div>';
        
    
        //$rp .= "</div>";
        //$rp .= "</div>";

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

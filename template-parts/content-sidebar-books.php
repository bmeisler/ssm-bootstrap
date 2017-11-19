
    <aside>
        <div class="thumb-content-tiny">
			<?php 
			$image_size = 'tiny-thumb';
            $title_content = '<h4 class="thumb-title-tiny link-color paddingRtLg">';
            $title_link = '<a class="link-color" href=';
            $author_content ='<h3 class="thumb-author-tiny paddingRtLg">';
            $excerpt_content = '<div class="thumb-excerpt-tiny">';

            $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $image_size)[0];
            $post_ID = get_the_ID();
            $permalink = get_the_permalink($post_ID);
            $img_content = '<div class="floatLt post-thumb-image-container"><a href="' . $permalink . '">
            <span class="post-thumb-tiny lazy margRtLg" style="background-image: url(' . $post_thumb . ');">
            </span>
            </a>
            </div>';

            $post_title = get_the_title($post_ID);

            $the_author = get_field('books_author');
            
            $rp = $img_content . $title_content . $title_link . $permalink . '>' . $post_title . '</a></h4>'. $author_content . $the_author. '</h3>' .
            $excerpt_content  . get_field('tag_line'). ' </div>';

            echo $rp;
            ?>
            
           <div class="tiny-btn-container clear-both">

            <?php include 'content-tiny-buttons.php'; ?>

            </div>

                   
                    
                   

			</div>
		</aside>
<?php $current_issue_query = new WP_Query('showposts=5&tag=featured&orderby=rand');?>

<div class="flexbox-container">

    <?php 
    $tnCount = 0;
    while ($current_issue_query->have_posts() && $tnCount < 5) : $current_issue_query->the_post(); 
    $postimageurl = get_post_meta($post->ID, 'post-img', true);
    $tnCount++;
    $the_excerpt = get_excerpt_by_id($post->ID, 180);//in functions.php
    $permalink = get_the_permalink($post->ID);
    ?>
    
	<div class="flex-grid">
       <?php if ($postimageurl) { ?>
            <a class="the-display" href="<?php the_permalink(); ?>" rel="bookmark">
                <img class="img-responsive" src="<?php  bloginfo( 'wpurl' ); ?>/wp-content/images/tns/<?php echo $postimageurl; ?>" alt="Post Pic" />
            </a>

        <?php } else if ( has_post_thumbnail() ) { ?>
            <a class="the-display" href="<?php the_permalink(); ?>" rel="bookmark">
            <?php
                the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive' ) ); 
            ?>
            </a>
            <?php
            }else { ?>
            <a class="the-display" href="<?php the_permalink(); ?>" rel="bookmark">
                <img class="img-responsive" src="/wp-content/images/tns/default-img_inverted.jpg" />
            </a>
            
        <?php } ?>
        <div class="thumb-title-small margTopSm margBotSm">
            <a class="link-color" href="<?php echo $permalink ?>"><?php echo the_title(); ?></a>
        </div> 
        <?php $subtitle = get_post_meta($post->ID, 'subtitle', true);
            if (!$subtitle)
            {
                echo '<div class="thumb-author-small margRtSm">'.get_the_author().'</div>';
            }
            else if ($subtitle)
            {
                echo '<div class="thumb-author-small margRtSm">'.$subtitle.'</div>';
            }
        ?>
        <div class="thumb-excerpt-small margTopSm margBotSm">
							
            <?php echo $the_excerpt .
            '<div class="read-more-small"><a class="link-color" href="' . $permalink . '">More...</a></div>'?>
        </div>
    </div><!--grid item-->
	    <?php endwhile; ?>
</div><!--flexbox container-->


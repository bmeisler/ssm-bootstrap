<?php
$tnCount = 0;
?>
<div id="FiveColumnContainerTop">
Previously, on Sensitive Skin!
</div>
<div class="grid">
<!-- <div id="colcontainer">
 -->		<?php $current_issue_query = new WP_Query('showposts=5&tag=featured&orderby=rand');?>
		<?php while ($current_issue_query->have_posts()) : $current_issue_query->the_post(); 
		$postimageurl = get_post_meta($post->ID, 'post-img', true);
		$tnCount++;?>
			
<!-- 			<div id="column<?php echo $tnCount; ?>" >
 -->			
 					<div class="grid-item">
						<?php if ($postimageurl) { ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<img class="img-responsive" src="<?php  bloginfo( 'wpurl' ); ?>/wp-content/images/tns/<?php echo $postimageurl; ?>" alt="Post Pic" />
							</a>

						<?php } else if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php
								the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive' ) ); 
							?>
							</a>
							<?php
							}else { ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<img class="img-responsive" src="/wp-content/images/tns/default-img_inverted.jpg" />
							</a>
							
						<?php } ?>
						<div class="bottom-links-title">
							<a href="<?php the_permalink() ?>"><?php echo the_title(); ?></a>
						</div> 		
					    <?php $subtitle = get_post_meta($post->ID, 'subtitle', true);
						if($subtitle) echo '<div id="SmallArchiveAuthor">'.$subtitle.'</div>'; ?>
						<div class="archive-copy">
							<?php the_excerpt(25) ?>
						</div>
				</div><!-- grid item -->
 			
			<?php endwhile; ?>
</div><!-- grid -->
				
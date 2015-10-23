<aside id="TOC" class="widget widget-TOC">
	<h4 class="widget-title">
		Popular Posts
	</h4>
<?php global $orig_post; //print_r($orig_post->ID); ?>
<?php $current_issue_query = new WP_Query('showposts=25&tag=featured&orderby=rand');?>
<?php if ($current_issue_query->have_posts()) : while ($current_issue_query->have_posts()) : $current_issue_query->the_post(); 
//print_r($post->ID);
//print_r($orig_post->ID);
 ?>
<?php if( $post->ID == $orig_post->ID ){
	//echo 'match'; 
	?>
	<ul class="toc"
<?php post_class() ?>
	id="post- 
<?php the_ID(); ?>
	">
	<li class="currentStoryTitle">
<em><?php $subtitle = get_post_meta($post->ID, 'subtitle', true);
					if($subtitle) echo $subtitle.' - ';?>  </em>
<?php echo the_title(); ?>
	</li>
</ul>
<?php
}else { ?>
<ul 
<?php post_class() ?>
id="post- 
<?php the_ID(); ?>
">
<li class="storytitle">
<em><?php $subtitle = get_post_meta($post->ID, 'subtitle', true);
					if($subtitle) echo $subtitle.' - ';?>  </em>
	<a href="<?php the_permalink() ?>" rel="bookmark">
<?php the_title(); ?>
	</a>
</li>
</ul>
<?php } ?>
<?php endwhile; else: ?>
<p>
	Sorry, no posts matched your criteria. 
</p>
<?php endif; ?>


<?php rewind_posts(); ?>
</aside>
<!--end div for TOC sidebar-->

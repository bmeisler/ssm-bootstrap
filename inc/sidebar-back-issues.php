<aside class="widget widget-TOC">
	<h4 class="widget-title">
		Sensitive Skin Back Issues
	</h4>
    
			<?php 
			// the query
			$mags_array = ['7735', '7375', '7066', '5796', '5480','5384'];//issues with a tag_line field entry
			$args = array(
				'post_type' => 'download', 
				'download_category'=>'print-issues-volume-2',
				'post__in' => $mags_array,
				'posts_per_page'=>3,
				'orderby'=>'rand'
			);
	        $the_query = new WP_Query($args); ?>


			<?php if ( $the_query->have_posts() ) : ?>



					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                       
					<?php get_template_part( 'template-parts/content-sidebar-back-issues', 'single' ); ?>
					<?php endwhile; ?>
					<!-- end of the loop -->
				

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

			
		</aside>
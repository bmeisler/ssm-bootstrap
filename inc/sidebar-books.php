<aside class="widget widget-TOC">
	<h4 class="widget-title">
		Sensitive Skin Books
	</h4>
    
			<?php 
			// the query
			//$books_array = ['10252', '9211', '7982', '8010', '8008', '5480','7679'];//ids of books to show

			//10802 - Ron Kolm
			//10252- NY Sin Phoney
			//9211 - Paris Scratch
			//7982 - Music Muse
			//8010 - Bowery
			//8008 - Neem Karoli
			//7679 - Backwards

			$books_array = ['10802', '10252', '9211', '8010', '8008','7679'];//ids of books to show

			$args = array(
				'post_type' => 'books', 
				'post__in' => $books_array,
				'posts_per_page'=>3,
				'orderby'=>'rand'
			);
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>



					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                       
					<?php get_template_part( 'template-parts/content-sidebar-books', 'single' ); ?>
					<?php endwhile; ?>
					<!-- end of the loop -->
				

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

			
		</aside>
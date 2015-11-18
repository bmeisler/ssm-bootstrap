<?php
/**
 * The template for displaying posts in the Book post format
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header">
	
		<h2 class="book-title"><?php the_title(); ?></h2>
    	<!-- <h2 class="book-author"><?php the_field('books_prefix'); ?><?php the_author(); ?></h2> -->
    
     
		<!-- <div class="btn-group"> -->
      	<a role="button" class="btn btn-primary" role="button" href="<?php the_field('books_amazon_print_link') ?>" >Buy in print</a>
   		<a role="button" class="btn btn-primary offset5" role="button" href="<?php the_field('kindle_link') ?>" >Buy PDF</a>
    	<!-- </div> -->
   

	</header> <!-- end article header -->
		
	<section class="entry-content clearfix" itemprop="articleBody">
		<?php the_post_thumbnail('large'); ?>

		<?php the_content(); ?>


		<div class="row">
			<div id="primary" class="col-md-12 col-lg-12">
				

				<div id="book-info"><p class="description"><?php the_field('books_paper')?> | 
				<?php the_field('books_dimensions') ?> | 
				<?php the_field('books_num_pages') ?> pgs. | 
				<?php the_field('books_isbn') ?> | 
				<?php the_field('books_list') ?> | 
				release date: <?php the_field('books_release_date') ?>
				</div>
		        <figure class="figure-50-left"><img src="<?php bloginfo('url'); ?>/wp-content/images/BooksLogosBlack-White_small.jpg" width="268" height="32" alt="Sensitive Skin Books" title="Sensitive Skin Books" /></figure>
    </div>
							
	</section> <!-- end article section -->
	
</article> <!-- end article -->

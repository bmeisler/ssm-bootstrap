<?php
/**
 * The template for displaying individual posts (books) in the Book post format
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">			
	<header class="article-header">
	
		<h2 class="book-title"><?php the_title(); ?></h2>
    	<h1 class="book-author"><?php the_field('books_author'); ?></h1>

		<!-- <div class="btn-group"> -->
		<?php if (get_field('books_amazon_print_link') !== ''){?>
      		<a role="button" class="btn btn-primary" href="<?php the_field('books_amazon_print_link') ?>" >Buy it on Amazon</a>
   		<?php } ?>

   		<?php if (get_field('kindle_link') !== ''){?>
				<a role="button" class="btn btn-primary offset5" href="<?php the_field('kindle_link') ?>" >Buy it on Kindle</a>
		<?php } ?>

		<?php if (get_field('pdf_link') !== ''){//enter the download ID in the pdf_link field for the book
									$postID = get_field('pdf_link');
									?>
									<a class="btn btn-primary" role="button" href="<?php bloginfo('url'); ?>/checkout?edd_action=add_to_cart&download_id=<?php the_field('pdf_link') ?>; ?>"><?php edd_price($postID);?> Buy the PDF</a>
							<?php } ?>
		
		<?php if (get_field('manual_link') !== ''){?>
				<?php the_field('manual_link') ?>
		<?php } ?>
    	<!-- </div> -->


	</header> <!-- end article header -->
		
	<section class="entry-content clearfix" itemprop="articleBody">
		 <!-- <div><figure class='figure-50-left'><img src="<?php the_field('cover_image') ?>" /></figure></div> -->
		<div><figure class='figure-50-left'> <a class="the-display" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('large'); ?>
				</a></figure></div>

		<?php the_content(); ?>


		<div class="row">
			<div id="primary" class="col-md-12 col-lg-12">
				<div id="author-block">
					<div>
						<figure class='figure-small-left'><img src="<?php the_field('books_author_photo') ?>" /></figure>
						<p><?php the_field('books_author_bio') ?></p>
					</div>
				

					<div>
						<?php if (get_field('books_co_author_bio') !== ''){?><!-- Testing for co_author_bio instead of picture - have to have it if there's a 2nd author -->
							<figure class='figure-small-left'><img src="<?php the_field('books_co_author_photo') ?>" /></figure>
						<?php } ?>
						<?php if (get_field('books_co_author_bio') !== ''){?>
							<p><?php the_field('books_co_author_bio') ?></p>
						<?php } ?>
					</div>
				</div>

				<div id="book-info"><p class="description"><?php the_field('books_paper')?> | 
				<?php the_field('books_dimensions') ?> | 
				<?php the_field('books_num_pages') ?> pgs. | 
				<?php the_field('books_isbn') ?> | 
				<?php the_field('books_list') ?> | 
				release date: <?php the_field('books_release_date') ?>
				</div>
		        <figure class="figure-50-left"><img src="<?php bloginfo('url'); ?>/wp-content/images/BooksLogosBlack-White_small.jpg" width="268" height="32" alt="Sensitive Skin Books" title="Sensitive Skin Books" /></figure>
        </div>
    </div>
							
	</section> <!-- end article section -->
	
</article> <!-- end article -->

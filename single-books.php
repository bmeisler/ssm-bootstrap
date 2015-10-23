<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="eightcol first clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
								<header class="article-header">
								
								<h1 id="book-title"><?php the_title(); ?></h1>
                                 <h2 id="book-author"><?php the_field('books_prefix'); ?><?php echo get_post_meta($post->ID, 'subtitle', true); ?></h2>
                                
                                 
									<div class="btn-group">
                                  	<a role="button" class="btn btn-primary" href="<?php the_field('amazon_print_link') ?>" >Buy it on Amazon</a>
                               		<a role="button" class="btn btn-primary" href="<?php the_field('kindle_link') ?>" >Get the Kindle version</a>
                                	</div>
                               

								</header> <!-- end article header -->
								
								<section class="entry-content clearfix" itemprop="articleBody">
									 <div><figure class='figure-50-left'><img src="<?php the_field('cover_image') ?>" /></figure></div>

									<?php the_content(); ?>



									<div id="author-block">
									<div><figure class='figure-small-left'><img src="<?php the_field('books_author_photo') ?>" /></figure></div>
									<div ><?php the_field('books_author_bio') ?></div>
									</div>

									<div id="book-info"><p class="description"><?php the_field('books_paper')?> | 
									<?php the_field('books_dimensions') ?> | 
									<?php the_field('books_num_pages') ?> pgs. | 
									<?php the_field('books_isbn') ?> | 
									$<?php the_field('books_list') ?> | 
									release date: <?php the_field('books_release_date') ?>
								</div>
                <figure class="figure-50-left"><img src="<?php bloginfo('url'); ?>/wp-content/images/BooksLogosBlack-White_small.jpg" width="268" height="32" alt="Sensitive Skin Books" title="Sensitive Skin Books" /></figure>
            
								</section> <!-- end article section -->
								
								<?php // end article section ?>

               
					
							</article> <!-- end article -->
                       
                       <?php if( function_exists( do_sociable() ) ){ do_sociable(); }    ?>
                       
					<?php comments_template(); ?>
						<?php endwhile; ?>			
					
						<?php else : ?>
					
							<article id="post-not-found" class="hentry clearfix">
					    		<header class="article-header">
					    			<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					    		</header>
					    		<section class="entry-content">
					    			<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					    		</section>
					    		<footer class="article-footer">
					    		    <p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
					    		</footer>
							</article>
					
						<?php endif; ?>

					</div> <!-- end #main  -->
    			<?php 
    			 if (!in_array("musicdownload", $classes)) {//don't show 'more like this' for downloads - or else show more downloads, not articles! 
                        	 get_sidebar();
                 }else{
					
    			 } 
    			?>
				</div> <!-- end #inner-content -->

<?php get_footer(); ?>
</div> <!-- end #content -->
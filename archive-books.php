<?php
/*
Template Name: Books Template
 */
 ?>
<?php get_header(); ?>
 
         
<div id="content">

                <div id="inner-content" class="wrap clearfix">
            
                    <div id="main" class="first clearfix" role="main">


 <header class="archive-header"> <h1 class="archive-title">
<?php  single_cat_title( '', false ) ); ?>
</h1>
<?php
// Show an optional term description. 
$term_description = term_description(); if ( ! empty( $term_description ) ) :
printf( '<div class="taxonomy-description">%s</div>', $term_description ); endif;
?> </header>

$set_number_of_columns = 2; // enter numbers of columns here;
$set_number_of_rows = 4; // enter numbers of rows here
$set_showpost = $set_number_of_columns * $set_number_of_rows ;

if ( have_posts() ) :
// Start the Loop.
while ( have_posts() ) : the_post();?>
    <section class="entry-content clearfix" itemprop="articleBody">
        
    </section> <!-- end article section -->

 <?php global $post;

￼   print_r( $post ); //view all data stored in the $post array ?>

<?php /*

* Include the post format-specific template for the content.
If you want to
* use this in a child theme, then include a file
called called content-___.php
* (where ___ is the post format) and that will be used
instead.
Understanding the Loop ❘ 85
￼
86 ❘
CHAPTER 5
THE LOOP
￼*/
//get_template_part( 'content', get_post_format() );

endwhile;
// Previous/next post navigation. twentyfourteen_paging_nav();
else :
// If no content, include the "No posts found" template. get_template_part( 'content', 'none' );
endif; ?>
</div>
</div>



<?php get_footer(); ?>
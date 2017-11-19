<?php if (get_field('books_amazon_print_link') !== ''){?>
      		<a role="button" class="btn btn-primary tiny-btn" href="<?php the_field('books_amazon_print_link') ?>" >Buy it on Amazon</a>
<?php } ?>

<?php if (get_field('kindle_link') !== ''){?>
        <a role="button" class="btn btn-primary tiny-btn offset5" href="<?php the_field('kindle_link') ?>" >Buy it on Kindle</a>
<?php } ?>

<?php if (get_field('pdf_link') !== ''){//enter the download ID in the pdf_link field for the book
    $postID = get_field('pdf_link');

    if(function_exists('edd_price')){?>
        <a class="btn btn-primary tiny-btn" role="button" href="<?php bloginfo('url'); ?>/checkout?edd_action=add_to_cart&download_id=<?php the_field('pdf_link') ?>"><?php $edd_price;?> Buy the PDF</a>
<?php }
}?>
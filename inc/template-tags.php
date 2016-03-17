<?php

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Sensitive_Skin_Bootstrap
 */


if ( ! function_exists( 'sensitive_skin_bootstrap_posts_navigation' ) ) :
function sensitive_skin_bootstrap_posts_navigation( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'prev_text'          => '%title',
		'next_text'          => '%title',
		'screen_reader_text' => __( 'Post navigation' ),
	) );

	$navigation = '';
	$previous   = get_previous_post_link( '<div class="nav-previous">%link</div>', $args['prev_text'] );
	$next       = get_next_post_link( '<div class="nav-next">%link</div>', $args['next_text'] );

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
		$navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
	}

	return $navigation;
}
endif;

if ( ! function_exists( 'sensitive_skin_bootstrap_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function sensitive_skin_bootstrap_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'sensitive-skin-bootstrap' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'sensitive-skin-bootstrap' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'sensitive_skin_bootstrap_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 * ORIGINALLY dded to the bottom of every individual post and the bottom of front page and excerpts - now use two functions below instead, respectively
 */
function sensitive_skin_bootstrap_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		echo '<br/>';
		/* translators: used between list items, there is a space after the comma */
		//$categories_list = get_the_category_list( esc_html__( ', ', 'sensitive-skin-bootstrap' ) );
		$categories_list = get_the_category_list( esc_html__( ' ', 'sensitive-skin-bootstrap' ) );
		if ( $categories_list && sensitive_skin_bootstrap_categorized_blog() ) {
			// printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'sensitive-skin-bootstrap' ) . '</span></br>', $categories_list );
			printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'sensitive-skin-bootstrap' ) . '</span><br/>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		//$tags_list = get_the_tag_list( '', esc_html__( ', ', 'sensitive-skin-bootstrap' ) );
		$tags_list = get_the_tag_list( '', esc_html__( ' ', 'sensitive-skin-bootstrap' ) );
		if ( $tags_list ) {
			//printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'sensitive-skin-bootstrap' ) . '</span></br>', $tags_list ); 
			printf( '<span class="tags-links">' . esc_html__( ' %1$s', 'sensitive-skin-bootstrap' ) . '</span><br/>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'sensitive-skin-bootstrap' ), esc_html__( '1 Comment', 'sensitive-skin-bootstrap' ), esc_html__( '% Comments', 'sensitive-skin-bootstrap' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'sensitive-skin-bootstrap' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

 /* the function that get_the_tag_list looks for - we can exclude tags by id */
 function exclude_cats($terms) {
    $exclude_terms = array(806, 10); //put cat ids here to remove! - Art and Writing
    if (!empty($terms) && is_array($terms)) {
        foreach ($terms as $key => $term) {
            if (in_array($term->term_id, $exclude_terms)) {
                unset($terms[$key]);
            }
        }
    }

    return $terms;
}

if ( ! function_exists( 'sensitive_skin_bootstrap_archive_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories only - FOR FRONT PAGE AND ARCHIVES.
 * Can exclude certain categories! CURRENTLY EXCLUDES 'ART' AND 'WRITING'
 * Used for excerpts of posts on the front page and archive sections
 */
function sensitive_skin_bootstrap_archive_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		echo '<br/>';
		/* translators: used between list items, there is a space after the comma */
        add_filter('get_the_terms', 'exclude_cats');
		$categories_list = get_the_category_list( esc_html__( ' ', 'sensitive-skin-bootstrap' ) );
        remove_filter('get_the_terms', 'exclude_cats');
		//$categories_list = get_the_category_list_excludedCat( esc_html__( ' ', 'sensitive-skin-bootstrap' ) );
		if ( $categories_list && sensitive_skin_bootstrap_categorized_blog() ) {
			// printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'sensitive-skin-bootstrap' ) . '</span></br>', $categories_list );
			printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'sensitive-skin-bootstrap' ) . '</span><br/>', $categories_list );
		}

	}

}
endif;

if ( ! function_exists( 'sensitive_skin_bootstrap_entry_excluded_tag_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments. EXCLUDES 'FEATURED' TAG
 * Added to the bottom of every individual post
 */
 
 /* the function that get_the_tag_list looks for - we can exclude tags by id */
 function exclude_terms($terms) {
    $exclude_terms = array(220); //put term ids here to remove!
    if (!empty($terms) && is_array($terms)) {
        foreach ($terms as $key => $term) {
            if (in_array($term->term_id, $exclude_terms)) {
                unset($terms[$key]);
            }
        }
    }

    return $terms;
}

function sensitive_skin_bootstrap_entry_excluded_tag_footer() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		echo '<br/>';
		
        /* translators: used between list items, there is a space after the comma */
		//$categories_list = get_the_category_list( esc_html__( ', ', 'sensitive-skin-bootstrap' ) );
		$categories_list = get_the_category_list( esc_html__( ' ', 'sensitive-skin-bootstrap' ) );
		if ( $categories_list && sensitive_skin_bootstrap_categorized_blog() ) {
			// printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'sensitive-skin-bootstrap' ) . '</span></br>', $categories_list );
			printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'sensitive-skin-bootstrap' ) . '</span><br/>', $categories_list );
		}
        
		/* translators: used between list items, there is a space after the comma */
        
        add_filter('get_the_terms', 'exclude_terms');
		$tags_list = get_the_tag_list( '', esc_html__( ' ', 'sensitive-skin-bootstrap' ) );
        remove_filter('get_the_terms', 'exclude_terms');
        
        
		if ( $tags_list ) {
            
            
			//printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'sensitive-skin-bootstrap' ) . '</span></br>', $tags_list ); 
			printf( '<span class="tags-links">' . esc_html__( ' %1$s', 'sensitive-skin-bootstrap' ) . '</span><br/>', $tags_list ); // WPCS: XSS OK.
		}
	}
    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'sensitive-skin-bootstrap' ), esc_html__( '1 Comment', 'sensitive-skin-bootstrap' ), esc_html__( '% Comments', 'sensitive-skin-bootstrap' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'sensitive-skin-bootstrap' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function sensitive_skin_bootstrap_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'sensitive_skin_bootstrap_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'sensitive_skin_bootstrap_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so sensitive_skin_bootstrap_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so sensitive_skin_bootstrap_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in sensitive_skin_bootstrap_categorized_blog.
 */
function sensitive_skin_bootstrap_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'sensitive_skin_bootstrap_categories' );
}
add_action( 'edit_category', 'sensitive_skin_bootstrap_category_transient_flusher' );
add_action( 'save_post',     'sensitive_skin_bootstrap_category_transient_flusher' );

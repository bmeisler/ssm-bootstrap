<?php

$issue = new CPT(array(
    'post_type_name' => 'issues',
    'singular' => __('Issue'),
    'plural' => __('Issues'),
    'slug' => 'issues'
),
	array(
    'supports' => array('title', 'editor', 'author', 'thumbnail'),
    'menu_icon' => 'dashicons-book'
));

// $book->register_taxonomy(array(
//     'taxonomy_name' => 'genre',
//     'singular' => __('Genre'),
//     'plural' => __('Genres'),
//     'slug' => 'genre'
// ));
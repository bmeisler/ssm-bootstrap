<?php

$book = new CPT(array(
    'post_type_name' => 'books',
    'singular' => __('Book'),
    'plural' => __('Books'),
    'slug' => 'books'
),
	array(
    'supports' => array('title', 'editor', 'author', 'thumbnail'),
    'menu_icon' => 'dashicons-book'
));

$book->register_taxonomy(array(
    'taxonomy_name' => 'genre',
    'singular' => __('Genre'),
    'plural' => __('Genres'),
    'slug' => 'genre'
));
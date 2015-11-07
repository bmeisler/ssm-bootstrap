<?php
function set_download_labels($labels) {
	$labels = array(
		'name' => _x('Downloads', 'post type general name', 'sensitive-skin-bootstrap'),
		'singular_name' => _x('Download', 'post type singular name', 'sensitive-skin-bootstrap'),
		'add_new' => __('Add New', 'sensitive-skin-bootstrap'),
		'add_new_item' => __('Add New Download', 'sensitive-skin-bootstrap'),
		'edit_item' => __('Edit Download', 'sensitive-skin-bootstrap'),
		'new_item' => __('New Download', 'sensitive-skin-bootstrap'),
		'all_items' => __('All Downloads', 'sensitive-skin-bootstrap'),
		'view_item' => __('View Download', 'sensitive-skin-bootstrap'),
		'search_items' => __('Search Downloads', 'sensitive-skin-bootstrap'),
		'not_found' =>  __('No Downloads found', 'sensitive-skin-bootstrap'),
		'not_found_in_trash' => __('No Downloads found in Trash', 'sensitive-skin-bootstrap'), 
		'parent_item_colon' => '',
		'menu_name' => __('Downloads', 'sensitive-skin-bootstrap')
	);
	return $labels;
}
add_filter('edd_download_labels', 'set_download_labels');
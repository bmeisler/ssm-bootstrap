<?php
function set_download_labels($labels) {
	$labels = array(
		'name' => _x('Thangs', 'post type general name', 'sensitive-skin-bootstrap'),
		'singular_name' => _x('Thang', 'post type singular name', 'sensitive-skin-bootstrap'),
		'add_new' => __('Add New', 'sensitive-skin-bootstrap'),
		'add_new_item' => __('Add New Thang', 'sensitive-skin-bootstrap'),
		'edit_item' => __('Edit Thang', 'sensitive-skin-bootstrap'),
		'new_item' => __('New Thang', 'sensitive-skin-bootstrap'),
		'all_items' => __('All Thangs', 'sensitive-skin-bootstrap'),
		'view_item' => __('View Thang', 'sensitive-skin-bootstrap'),
		'search_items' => __('Search Thangs', 'sensitive-skin-bootstrap'),
		'not_found' =>  __('No Thangs found', 'sensitive-skin-bootstrap'),
		'not_found_in_trash' => __('No Thangs found in Trash', 'sensitive-skin-bootstrap'), 
		'parent_item_colon' => '',
		'menu_name' => __('Thangs', 'sensitive-skin-bootstrap')
	);
	return $labels;
}
add_filter('edd_download_labels', 'set_download_labels');
<?php 

function cptui_register_my_cpts() {

/**
 * Post Type: Work Samples.
 */

$labels = [
    "name" => __( "Work Samples", "custom-post-type-ui" ),
    "singular_name" => __( "Work Sample", "custom-post-type-ui" ),
    "menu_name" => __( "Portfolio", "custom-post-type-ui" ),
    "all_items" => __( "All Work Samples", "custom-post-type-ui" ),
    "add_new" => __( "Add New Work Sample", "custom-post-type-ui" ),
];

$args = [
    "label" => __( "Work Samples", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => false,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "work_sample", "with_front" => true ],
    "query_var" => true,
    "menu_position" => 7,
    "menu_icon" => "dashicons-portfolio",
    "supports" => [ "title", "thumbnail", "custom-fields" ],
    "show_in_graphql" => false,
];

register_post_type( "work_sample", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );

function brians_theme_scripts() {
	wp_enqueue_style('main_styles', get_template_directory_uri() . '/style.css', array(), false);
	wp_enqueue_script('my_scripts');
}
add_action('wp_enqueue_scripts', 'brians_theme_scripts');  

add_action( 'after_setup_theme', function() {
	add_theme_support( 'title-tag' );
	remove_all_filters( 'wp_title' );
	remove_all_filters( 'wpseo_title' );
	remove_all_actions('wp_head', 'theme_slug_render_title');
	add_filter( 'wp_title', 'sp_remove_title', 9999999999999, 2 );

}, 99999999999999);

function sp_remove_title( $title, $sep ) { 
	return false;
}

add_action('wp_loaded', 'buffer_start');
function buffer_start() { 
	ob_start("sp_remove_empty_title");
}

function sp_remove_empty_title($buffer) {
	$buffer = str_replace('<title></title>','',$buffer);
	return $buffer;
}

?>

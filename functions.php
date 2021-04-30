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

function brians_theme_scripts(){
    wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), false);
}
add_action('wp_enqueue_scripts', 'brians_theme_scripts');
?>
<?php 
// Remove junk from head -----------------------------------------------------------
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

add_action( 'widgets_init', 'remove_recent_comments_style' );
function remove_recent_comments_style() {  
    global $wp_widget_factory;  
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
}  

// Custom image sizes ------------------------------------------------------------
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'page-portrait', 290, 9999 ); //290 pixels wide (and unlimited height)
	add_image_size( 'project-thumb', 275, 330, true ); //(cropped)
	add_image_size( 'project-gallery', 500, 9999 ); //(cropped)
}

// Get post by title ------------------------------------------------------------
function get_post_by_title($page_title, $output = OBJECT) {
    global $wpdb;
        $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='projects'", $page_title ));
        if ( $post )
            return get_post($post, $output);

    return null;
}
// Customize media upload tabs --------------------------------------------------
add_filter( 'media_upload_tabs', 'hejazi_media_upload_tabs');
add_filter( 'media_upload_default_tab', 'hejazi_media_upload_default_tab');
// remove from cumpter, gallery and remote url tab in file select
function hejazi_media_upload_tabs($arr_tabs) {
	if ( (isset($_GET["simple_fields_action"]) || isset($_GET["simple_fields_action"]) ) && ($_GET["simple_fields_action"] == "select_file" || $_GET["simple_fields_action"] == "select_file_for_tiny") ) {
		unset($arr_tabs["type"], $arr_tabs["gallery"], $arr_tabs["type_url"]);
	return $arr_tabs;
	}
}
function hejazi_media_upload_default_tab($tab) {
	$tab = 'library';
	return $tab;
}
?>
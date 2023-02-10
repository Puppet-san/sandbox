function get_custom_post_type_template($template) {
    global $post;

    if ($post->post_type == 'question') {
        $template = dirname( __FILE__ ) . '/archive-my_custom_post_type.php';
    }
    return $template;
}

//add_filter( "single_template", "get_custom_post_type_template" ); //for single page
add_filter( "archive_template", "get_custom_post_type_template" ); //for archive
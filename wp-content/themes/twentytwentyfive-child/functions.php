<?php
// Enqueue parent and child theme styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'twentytwentyfive-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'twentytwentyfive-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'twentytwentyfive-style' ),
        wp_get_theme()->get('Version')
    );
});

function add_class_to_first_paragraph($content) {
    if (is_singular('post') || is_home() || is_archive()) {
        // Use regex to find the first <p> tag and inject a class
        $content = preg_replace('/<p(\s+|>)/', '<p class="first-paragraph"$1', $content, 1);
    }
    return $content;
}
add_filter('the_content', 'add_class_to_first_paragraph');

function enqueue_open_sans_font() {
    wp_enqueue_style(
        'open-sans-font',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap',
        false
    );
}
add_action('wp_enqueue_scripts', 'enqueue_open_sans_font');

function relative_post_time_shortcode() {
    return sprintf( '%s ago', human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
}
add_shortcode( 'relative_time', 'relative_post_time_shortcode' );

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

// function enqueue_open_sans_font() {
//     wp_enqueue_style(
//         'open-sans-font',
//         'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap',
//         false
//     );
// }
// add_action('wp_enqueue_scripts', 'enqueue_open_sans_font');

function relative_post_time_shortcode() {
    return sprintf( '%s ago', human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
}
add_shortcode( 'relative_time', 'relative_post_time_shortcode' );


// Css & JS Remove
function pm_remove_all_scripts() {
    global $wp_scripts;
    $wp_scripts->queue = array();
}
add_action('wp_print_scripts', 'pm_remove_all_scripts', 100);
function pm_remove_all_styles() {
    global $wp_styles;
    $wp_styles->queue = array();
}
add_action('wp_print_styles', 'pm_remove_all_styles', 100);
// Css & JS Remove

// emojis
function disable_emojis() {
   remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
   remove_action( 'wp_print_styles', 'print_emoji_styles' );
   remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
   remove_action( 'admin_print_styles', 'print_emoji_styles' );
   remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
   remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
   remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );
// emojis


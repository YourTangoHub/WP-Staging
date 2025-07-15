<?php
// -----------------------------
// Selectively remove CSS & JS
// -----------------------------
function pm_remove_all_scripts() {
    global $wp_scripts;

    // Keep only selected script handles if needed
    $allowed_scripts = array(); // Add script handles here if needed

    foreach ($wp_scripts->queue as $key => $handle) {
        if (!in_array($handle, $allowed_scripts)) {
            unset($wp_scripts->queue[$key]);
        }
    }
}
add_action('wp_print_scripts', 'pm_remove_all_scripts', 5); // Run early

function pm_remove_all_styles() {
    global $wp_styles;

    // Keep only these style handles
    $allowed_styles = array(
        'common-style',
        'header-style',
        'footer-style',
        'article-style',
        'listing-style',
        'home-style',
    );

    foreach ($wp_styles->queue as $key => $handle) {
        if (!in_array($handle, $allowed_styles)) {
            unset($wp_styles->queue[$key]);
        }
    }
}
add_action('wp_print_styles', 'pm_remove_all_styles', 5); // Run early

// -----------------------------
// Enqueue styles
// -----------------------------
add_action('wp_enqueue_scripts', function () {
    // Load base styles (always needed)
    wp_enqueue_style(
        'twentytwentyfive-style',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'twentytwentyfive-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('twentytwentyfive-style'),
        wp_get_theme()->get('Version')
    );

    // Load always-required styles
    wp_enqueue_style(
        'common-style',
        get_stylesheet_directory_uri() . '/assets/scss/common.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/scss/common.css')
    );
    wp_enqueue_style(
        'header-style',
        get_stylesheet_directory_uri() . '/assets/scss/header.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/scss/header.css')
    );
    wp_enqueue_style(
        'footer-style',
        get_stylesheet_directory_uri() . '/assets/scss/footer.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/scss/footer.css')
    );

    // Only load this style on the homepage
    if (is_front_page() || is_home()) {
        wp_enqueue_style(
            'home-style',
            get_stylesheet_directory_uri() . '/assets/scss/home.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/scss/home.css')
        );
    }

    // Load article page styles
    if (is_single()) {
        wp_enqueue_style(
            'article-style',
            get_stylesheet_directory_uri() . '/assets/scss/article.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/scss/article.css')
        );
    }

    // Load listing page styles (e.g., archives, categories)
    if (is_archive() || is_category() || is_tag()) {
        wp_enqueue_style(
            'listing-style',
            get_stylesheet_directory_uri() . '/assets/scss/listing.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/scss/listing.css')
        );
    }
}, 1000);

// -----------------------------
// Shortcode for "x time ago"
// -----------------------------
function relative_post_time_shortcode() {
    return sprintf('%s ago', human_time_diff(get_the_time('U'), current_time('timestamp')));
}
add_shortcode('relative_time', 'relative_post_time_shortcode');

// -----------------------------
// Disable emoji scripts/styles
// -----------------------------
function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis');
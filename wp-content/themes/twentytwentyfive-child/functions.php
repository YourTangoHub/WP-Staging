<?php
// -----------------------------
// Remove All Frontend Scripts (Except Allowed)
// -----------------------------
function pm_remove_all_scripts() {
    if (is_admin() || is_preview()) return; // Prevent removal in admin/editor/preview

    global $wp_scripts;
    $allowed_scripts = array(); // Add allowed script handles here

    foreach ($wp_scripts->queue as $key => $handle) {
        if (!in_array($handle, $allowed_scripts)) {
            unset($wp_scripts->queue[$key]);
        }
    }
}
add_action('wp_print_scripts', 'pm_remove_all_scripts', 5);

// -----------------------------
// Remove All Frontend Styles (Except Allowed)
// -----------------------------
function pm_remove_all_styles() {
    if (is_admin() || is_preview()) return; // Prevent removal in admin/editor/preview

    global $wp_styles;
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
add_action('wp_print_styles', 'pm_remove_all_styles', 5);

// -----------------------------
// Enqueue Styles on Frontend
// -----------------------------
add_action('wp_enqueue_scripts', function () {
    // Base styles
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

    // Common styles
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

    // Conditional page styles
    if (is_front_page() || is_home() || is_preview()) {
        wp_enqueue_style(
            'home-style',
            get_stylesheet_directory_uri() . '/assets/scss/home.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/scss/home.css')
        );
    }

    if (is_single() || is_preview()) {
        wp_enqueue_style(
            'article-style',
            get_stylesheet_directory_uri() . '/assets/scss/article.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/scss/article.css')
        );
    }

    if (is_archive() || is_category() || is_tag() || is_preview()) {
        wp_enqueue_style(
            'listing-style',
            get_stylesheet_directory_uri() . '/assets/scss/listing.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/scss/listing.css')
        );
    }
}, 1000);

// -----------------------------
// Load Styles Inside Block Editor (FSE + Post Editor)
// -----------------------------
function pm_enqueue_block_editor_styles() {
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

    wp_enqueue_style(
        'home-style',
        get_stylesheet_directory_uri() . '/assets/scss/home.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/scss/home.css')
    );

    wp_enqueue_style(
        'article-style',
        get_stylesheet_directory_uri() . '/assets/scss/article.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/scss/article.css')
    );

    wp_enqueue_style(
        'listing-style',
        get_stylesheet_directory_uri() . '/assets/scss/listing.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/scss/listing.css')
    );
}
add_action('enqueue_block_editor_assets', 'pm_enqueue_block_editor_styles');

// -----------------------------
// Shortcode: [relative_time]
// -----------------------------
function relative_post_time_shortcode() {
    return sprintf('%s ago', human_time_diff(get_the_time('U'), current_time('timestamp')));
}
add_shortcode('relative_time', 'relative_post_time_shortcode');

// -----------------------------
// Disable Emoji Scripts/Styles
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


// Function to get moon phase symbol
function get_moon_phase_icon() {
    return '🌖';
}
function show_day_moon_date() {
    $day = date('D');
    $date = date('m-d-y');
    $moon = get_moon_phase_icon();
    return $day . ' ' . $moon . ' ' . $date;
}
add_shortcode('current_day_moon_date', 'show_day_moon_date');


// Hide if no manual excerpt
function hide_auto_generated_excerpt($excerpt) {
    if (is_singular('post') && !has_excerpt()) {
        return ''; // Hide excerpt only on single post page if it's auto-generated
    }
    return $excerpt;
}
add_filter('get_the_excerpt', 'hide_auto_generated_excerpt');



// TOC
function toc_meta_box() {
    add_meta_box(
        'toc_meta_box_id',
        'Table of Contents Descriptions',
        'toc_meta_box_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'toc_meta_box');

function toc_meta_box_callback($post) {
    $zodiacs = [
        'aries', 'taurus', 'gemini', 'cancer', 'leo', 'virgo',
        'libra', 'scorpio', 'sagittarius', 'capricorn', 'aquarius', 'pisces'
    ];

    $stored = get_post_meta($post->ID, '_toc_descriptions', true);
    if (!is_array($stored)) {
        $stored = [];
    }

    foreach ($zodiacs as $sign) {
        $value = isset($stored[$sign]) ? $stored[$sign] : '';
        echo '<div style="margin-bottom:30px">';
        echo '<h4 style="margin:0;padding:5px 0 20px; font-size:22px;">' . ucfirst($sign) . '</h4>';
        wp_editor($value, 'toc_' . $sign, [
            'textarea_name' => 'toc_descriptions[' . $sign . ']',
            'textarea_rows' => 5,
        ]);
        echo '</div>';
    }
}

function save_toc_descriptions($post_id) {
    if (isset($_POST['toc_descriptions']) && is_array($_POST['toc_descriptions'])) {
        update_post_meta($post_id, '_toc_descriptions', $_POST['toc_descriptions']);
    }
}
add_action('save_post', 'save_toc_descriptions');

function insert_table_of_contents($content) {
    if (is_singular('post')) {
        $descriptions = get_post_meta(get_the_ID(), '_toc_descriptions', true);

        if (!is_array($descriptions)) return $content;

        $zodiacs = [
            'aries', 'taurus', 'gemini', 'cancer', 'leo', 'virgo',
            'libra', 'scorpio', 'sagittarius', 'capricorn', 'aquarius', 'pisces'
        ];

        $toc = '<div class="custom-toc"><h3>Table of Contents</h3><ul>';
        $output = '';
        $hasToc = false;

        foreach ($zodiacs as $sign) {
            if (!empty($descriptions[$sign])) {
                $toc .= '<li><a href="#' . esc_attr($sign) . '">' . ucfirst($sign) . '</a></li>';
                $output .= '<h2 id="' . esc_attr($sign) . '">' . ucfirst($sign) . '</h2>';
                $output .= wpautop(do_shortcode($descriptions[$sign]));
                $hasToc = true;
            }
        }

        $toc .= '</ul></div>';

        return ($hasToc ? $toc : '') . $content . $output;
    }

    return $content;
}
add_filter('the_content', 'insert_table_of_contents');

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
        get_stylesheet_directory_uri() . '/assets/css/common.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/common.css')
    );

    wp_enqueue_style(
        'header-style',
        get_stylesheet_directory_uri() . '/assets/css/header.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/header.css')
    );

    wp_enqueue_style(
        'footer-style',
        get_stylesheet_directory_uri() . '/assets/css/footer.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/footer.css')
    );

    // Conditional page styles
    if (is_front_page() || is_home() || is_preview()) {
        wp_enqueue_style(
            'home-style',
            get_stylesheet_directory_uri() . '/assets/css/home.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/css/home.css')
        );
    }

    if (is_single() || is_preview()) {
        wp_enqueue_style(
            'article-style',
            get_stylesheet_directory_uri() . '/assets/css/article.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/css/article.css')
        );
    }

    if (is_archive() || is_category() || is_tag() || is_preview()) {
        wp_enqueue_style(
            'listing-style',
            get_stylesheet_directory_uri() . '/assets/css/listing.css',
            array(),
            filemtime(get_stylesheet_directory() . '/assets/css/listing.css')
        );
    }
}, 1000);

// -----------------------------
// Load Styles Inside Block Editor (FSE + Post Editor)
// -----------------------------
function pm_enqueue_block_editor_styles() {
    wp_enqueue_style(
        'common-style',
        get_stylesheet_directory_uri() . '/assets/css/common.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/common.css')
    );

    wp_enqueue_style(
        'header-style',
        get_stylesheet_directory_uri() . '/assets/css/header.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/header.css')
    );

    wp_enqueue_style(
        'footer-style',
        get_stylesheet_directory_uri() . '/assets/css/footer.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/footer.css')
    );

    wp_enqueue_style(
        'home-style',
        get_stylesheet_directory_uri() . '/assets/css/home.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/home.css')
    );

    wp_enqueue_style(
        'article-style',
        get_stylesheet_directory_uri() . '/assets/css/article.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/article.css')
    );

    wp_enqueue_style(
        'listing-style',
        get_stylesheet_directory_uri() . '/assets/css/listing.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/listing.css')
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
    $timestamp = time();
    $synodic_month = 29.53058867;
    $known_new_moon = strtotime('2000-01-06 18:14:00');
    $days_since_new = ($timestamp - $known_new_moon) / 86400;
    $current_phase = fmod($days_since_new, $synodic_month);

    if ($current_phase < 1.84566) return '🌑';
    elseif ($current_phase < 5.53699) return '🌒';
    elseif ($current_phase < 9.22831) return '🌓';
    elseif ($current_phase < 12.91963) return '🌔';
    elseif ($current_phase < 16.61096) return '🌕';
    elseif ($current_phase < 20.30228) return '🌖';
    elseif ($current_phase < 23.99361) return '🌗';
    elseif ($current_phase < 27.68493) return '🌘';
    else return '🌑';
}

// Original shortcode: "Tue 🌘 07-22-25"
function show_day_moon_date() {
    $day  = date('D');
    $date = date('m-d-y');
    $moon = get_moon_phase_icon();
    return esc_html("$day $moon $date");
}
add_shortcode('current_day_moon_date', 'show_day_moon_date');

// New shortcode: "Tuesday 🌘 Jul 22, 2025"
function show_full_day_moon_date() {
    $day  = date('l');
    $date = date('M d, Y');
    $moon = get_moon_phase_icon();
    return esc_html("$day $moon $date");
}
add_shortcode('full_day_moon_date', 'show_full_day_moon_date');


// Function to calculate days until next full moon
function get_days_until_full_moon() {
    $timestamp = time();
    $synodic_month = 29.53058867;
    $known_new_moon = strtotime('2000-01-06 18:14:00');

    $days_since_new = ($timestamp - $known_new_moon) / 86400;
    $current_phase = fmod($days_since_new, $synodic_month);

    $full_moon_day = 14.765;

    if ($current_phase <= $full_moon_day) {
        $days_until_full = $full_moon_day - $current_phase;
    } else {
        $days_until_full = $synodic_month - $current_phase + $full_moon_day;
    }

    return round($days_until_full);
}

function show_full_moon_countdown() {
    $days = get_days_until_full_moon();
    return esc_html("Full moon in $days days");
}

add_shortcode('full_moon_countdown', 'show_full_moon_countdown');


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

    // Zodiac Fields
    foreach ($zodiacs as $sign) {
        $editor_value = isset($stored[$sign]) ? $stored[$sign] : '';

        echo '<div style="margin-bottom:30px">';
        echo '<h4 style="margin:0;padding:5px 0 10px; font-size:20px;">' . ucfirst($sign) . '</h4>';

        // Editor
        wp_editor($editor_value, 'toc_' . $sign, [
            'textarea_name' => 'toc_descriptions[' . $sign . ']',
            'textarea_rows' => 5,
        ]);

        echo '</div>';
    }
}



function save_toc_descriptions($post_id) {
    // Save TOC descriptions
    if (isset($_POST['toc_subtitle'])) {
        update_post_meta($post_id, '_toc_subtitle', sanitize_text_field($_POST['toc_subtitle']));
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

// Table of Contents Shortcode
function zodiac_toc_shortcode($atts) {

    $tag_slug = 'tarotscope';

    $args = array(
        'tag'            => $tag_slug,
        'posts_per_page' => 1,
        'post_status'    => 'publish'
    );
    $post_link = null;
    $post_id=null;
    $latest_post = new WP_Query($args);

    if ($latest_post->have_posts()) {
        $latest_post->the_post();
        $post_id = get_the_ID();
        $post_link = get_permalink();
        wp_reset_postdata();
    }

    $zodiac_icons = [
        'aries' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 594.4 516.54"><path d="M37.72,222c18.97,17.39,43.56,26.84,71.12,27.32l.7-39.99c-17.89-.31-32.96-5.97-44.79-16.81-10.84-9.94-18.56-23.87-22.31-40.29-10.19-44.59,11.03-81.3,37.25-94.51,19.74-9.95,41.44-14.59,61.11-13.07,21.2,1.64,39.05,9.99,53.04,24.83,17.58,18.64,29.48,47.14,36.39,87.14,2.82,16.33,5.72,32.67,8.78,49.97,17.55,99.03,37.44,211.28,39.21,308.87l39.94,1.08c1.35-18.65,2.78-41.77,4.15-64.14,1.37-22.26,2.79-45.27,4.12-63.7,5.44-75.01,17.62-147.88,31.81-228.55,4.74-26.96,15.6-53.23,30.59-73.97,16.01-22.15,36.1-37.23,58.1-43.61,15.9-4.61,36.03-3.02,55.22,4.36,19.17,7.37,34.6,19.53,42.32,33.36,13.9,24.9,13.03,59-2.15,84.86-11.51,19.61-35.99,43-87.18,43v40c54.71,0,97.92-22.28,121.68-62.75,22.46-38.26,23.47-87.17,2.58-124.6C554.26,15.75,487.16-10.72,435.81,4.16c-30.65,8.88-58.1,29.15-79.39,58.6-18.46,25.54-31.79,57.67-37.56,90.47-8.94,50.83-17.09,98.63-23.33,146.01-5.5-34-11.44-67.5-17.13-99.63-3.06-17.25-5.94-33.55-8.75-49.8-8.29-47.99-23.57-83.25-46.71-107.78C202.21,20.04,174.87,7.15,143.89,4.76c-26.84-2.07-56.03,4.05-82.2,17.24-24.48,12.34-42.87,33.33-53.17,60.7C-.71,107.21-2.51,135.07,3.45,161.14c5.57,24.37,17.42,45.42,34.27,60.87Z"></path></svg>',
        'taurus' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 628.34 501.99"><path d="M539.73,.54c-24.31,2.52-46.15,13.56-64.92,32.81-14.92,15.31-26.4,32.39-37.5,48.91-11.86,17.65-23.06,34.31-37.63,47.83-20.6,19.11-51.46,30.19-85.23,30.61-33.95-.32-65.08-11.39-85.78-30.61-14.57-13.52-25.77-30.19-37.63-47.84-11.1-16.52-22.58-33.6-37.5-48.91C134.77,14.1,112.92,3.07,88.61,.54,61.06-2.32,31.25,6.1,0,25.56L21.14,59.52c42.72-26.61,76.66-26.03,103.74,1.76,12.39,12.71,22.38,27.57,32.95,43.3,12.61,18.76,25.65,38.16,43.62,54.84,10.28,9.54,22.31,17.58,35.6,23.97-54.31,28.05-91.52,84.73-91.52,149.95,0,92.99,75.65,168.65,168.65,168.65s168.65-75.65,168.65-168.65c0-65.22-37.22-121.91-91.52-149.95,13.28-6.39,25.32-14.43,35.6-23.97,17.97-16.68,31.01-36.08,43.62-54.84,10.57-15.73,20.56-30.59,32.95-43.3,27.08-27.79,61.01-28.36,103.74-1.76l21.14-33.95c-31.25-19.46-61.06-27.88-88.61-25.02Zm-96.91,332.8c0,70.94-57.71,128.65-128.65,128.65s-128.65-57.71-128.65-128.65,57.71-128.65,128.65-128.65,128.65,57.71,128.65,128.65Z"></path></svg>',
        'gemini' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 489.72 483.27"><path d="M103.55,423.29c-34.85,5.34-69.43,12.41-103.55,21.26l10.03,38.72c153.18-39.69,315.83-42.7,470.38-8.69l8.6-39.07c-40.19-8.84-80.9-15.28-121.85-19.31-7.39-109.71-8.69-239.23-3.52-353.02,42.48-5.57,84.63-13.72,126.09-24.46L479.69,0C326.51,39.69,163.86,42.7,9.31,8.69L.72,47.75c35.31,7.77,71.02,13.66,106.94,17.72,5.16,115.7,3.66,247.36-4.11,357.82ZM226.18,72.15c32.45,0,64.9-1.5,97.21-4.48-4.82,111.64-3.55,237.52,3.46,345.36-60.93-3.65-122.18-2.02-182.83,4.87,7.26-108.41,8.66-235.74,3.86-348.68,26.05,1.93,52.18,2.92,78.31,2.92Z"></path></svg>',
        'cancer' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 589.6 427.09"><path d="M476.48,150.03c-62.37,0-113.12,50.74-113.12,113.12,0,48.2,30.3,89.44,72.86,105.71-61.56,18.38-129.1,22.9-201.06,13.39-68.37-9.03-139.74-30.97-206.4-63.45l-17.52,35.96c70.48,34.34,146.1,57.56,218.68,67.14,26.21,3.46,51.9,5.19,77.02,5.19,55.67,0,108.53-8.48,157.84-25.38,22.5-7.71,48.59-17.99,71.52-35.75,20.48-15.86,35.22-35.33,44.06-58.09,5.93-13.73,9.23-28.85,9.23-44.72,0-62.37-50.74-113.12-113.12-113.12Zm72.48,122.6l-.31-.05c-1.16,7.24-2.96,13.89-5.28,20.03-11.36,25.68-37.06,43.65-66.89,43.65-40.32,0-73.12-32.8-73.12-73.12s32.8-73.12,73.12-73.12,73.12,32.8,73.12,73.12c0,3.22-.23,6.38-.64,9.49Z"></path><path d="M113.12,277.06c62.37,0,113.12-50.74,113.12-113.12,0-48.2-30.3-89.44-72.86-105.71,61.56-18.38,129.1-22.9,201.06-13.39,68.37,9.03,139.74,30.97,206.4,63.45l17.52-35.96C507.88,37.99,432.26,14.77,359.68,5.19,275.41-5.94,196.38,.85,124.81,25.38c-22.5,7.71-48.59,17.99-71.52,35.75-20.48,15.86-35.23,35.33-44.06,58.09C3.29,132.95,0,148.07,0,163.94c0,62.37,50.74,113.12,113.12,113.12ZM40.64,154.46l.31,.05c1.16-7.24,2.96-13.89,5.27-20.03,11.36-25.68,37.06-43.65,66.89-43.65,40.32,0,73.12,32.8,73.12,73.12s-32.8,73.12-73.12,73.12-73.12-32.8-73.12-73.12c0-3.22,.23-6.38,.64-9.49Z"></path></svg>',
        'leo' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 435.62 550.16"><path d="M347.69,374.64l30.55-49.98c27.04-44.23,64.07-104.8,56.35-170.36-2.34-19.92-10.48-58.49-38.64-93.07C367.77,26.62,326.61,5.7,276.9,.73c-50.2-5.02-100.15,16.05-133.6,56.35-15.32,18.45-26.22,40.17-31.54,62.81-5.78,24.59-5.08,49.44,2.08,73.87,4.32,14.76,9.23,28.98,15.92,43.72-5.4-.79-10.91-1.21-16.52-1.21C50.8,236.28,0,287.07,0,349.51s50.8,113.23,113.23,113.23,113.23-50.8,113.23-113.23c0-27.2-9.64-52.18-25.68-71.72l.14-.11c-28.26-37.28-39.59-64.05-48.7-95.16-10.12-34.55-2.15-70.96,21.86-99.89,24.94-30.06,61.89-45.8,98.84-42.1,39.44,3.94,70.4,19.4,92.01,45.95,21.76,26.73,28.09,56.89,29.93,72.49,5.64,47.92-19.65,93.94-50.76,144.82l-30.55,49.98c-14.93,24.43-31.86,52.12-37.51,84.24-6.85,38.95,6.42,76.79,33.8,96.39,14.38,10.29,32.77,15.75,52.59,15.75,3.38,0,6.8-.16,10.25-.48,21.26-1.97,40.92-9.68,55.67-16.17l-16.11-36.61c-12.73,5.6-27.82,11.52-43.26,12.95-14.11,1.31-26.84-1.52-35.86-7.97-16.99-12.16-21.13-37.36-17.68-56.93,4.34-24.65,18.52-47.86,32.24-70.31Zm-234.45,48.09c-40.38,0-73.23-32.85-73.23-73.23s32.85-73.23,73.23-73.23,73.23,32.85,73.23,73.23-32.85,73.23-73.23,73.23Z"></path></svg>',
        'virgo' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 508.94 598.84"><path d="M507.33,297.45c-4.33-27.66-18.34-47.21-38.45-53.63-12.56-4.01-25.42-2.91-37.17,3.2-21.21,11.02-38.77,38.33-52.19,81.19-1.2,3.84-2.31,7.78-3.32,11.81,2.34-22.44,6.1-45.22,9.97-68.65,3.67-22.22,7.46-45.19,9.93-67.99,.72-6.63,1.93-14.84,3.21-23.54,3.9-26.51,8.76-59.51,6.47-88.96-1.39-17.81-5.18-32.22-11.59-44.05-8.3-15.32-20.67-25.67-36.75-30.76-22.97-7.27-45.96-2.82-66.51,12.88-12.14,9.28-21.48,20.93-28.22,31.32-2.31-6.57-5.05-12.45-8.21-17.68-11.52-19.03-29.19-29.82-51.11-31.19-16.56-1.04-40.39,3.62-59.87,31.7-5.11,7.36-9.32,15.46-12.87,23.46-1.48-8.74-3.92-17.13-7.88-24.51C111.89,21.74,92.14,8.15,65.68,2.73,41.34-2.26,16.53,.52,0,3.73L7.62,42.99c30.77-5.97,67.92-4.39,79.93,17.98,5.61,10.45,5.45,32.23,5.34,48.14-.03,4-.06,7.77-.01,11.39,.45,36.76-1.51,72.38-4.49,108.3-3.58,25.69-6.4,52.86-8.99,82.35l-.99,11.28c-3.29,37.23-6.39,72.4-7.77,109.67l39.96,1.76c2.35-45.7,6.69-88.77,10.89-130.43,2.39-23.74,4.73-46.98,6.67-70.14,6.17-43.83,14.65-82.94,28.31-121.79,.51-1.45,1.04-2.97,1.58-4.52,10.44-30.09,21.61-56.99,42.87-55.67,8.84,.55,14.64,4.13,19.38,11.98,6.35,10.49,10.27,27.69,11.65,51.1,1.11,18.89,1.17,37.23,.53,55.33-7.61,67-15.35,135.74-17.06,204.54-.69,18.84-.76,38.25,.13,58.39l39.97-1.51c-.58-18.31-.58-36.71-.13-55.16,1.31-35.84,4.99-69.93,8.59-103.27,3.49-32.33,7.06-65.36,8.37-99.61,.05-.45,.1-.91,.16-1.36l1.44-12.7c2.52-22.28,6.16-47.79,17.41-68.67,3.89-7.23,12.18-20.69,23.88-29.64,13.33-10.18,23.59-8.6,30.14-6.53,17.88,5.66,19.81,30.46,20.53,39.79,1.94,24.97-2.55,55.5-6.16,80.03-1.34,9.08-2.6,17.67-3.4,25.05-2.36,21.69-6.05,44.11-9.63,65.79-7.78,47.13-15.82,95.86-11.85,144.9,2.37,29.28,17.09,64.63,41.99,89.03-19.04,15.9-42.14,30.71-69.71,41.43-2.75,1.07-5.5,2.16-8.26,3.25-21.22,8.41-41.27,16.35-60.99,15.27l-2.17,39.94c1.99,.11,3.96,.16,5.92,.16,26.06,0,49.37-9.23,71.97-18.18,2.68-1.06,5.36-2.12,8.03-3.16,36.56-14.22,66.24-34.55,89.81-55.81,10.3,3.96,20.8,5.57,31.37,5.57,20.52,0,41.28-6.05,61.29-12.69l-12.59-37.97c-16.6,5.51-32.75,10.33-47.13,10.62,12.43-15.05,21.87-29.14,28.58-40.31,22.22-37,41.82-101.96,34.38-149.45Zm-68.68,128.86c-6.25,10.41-15.19,23.71-27.08,37.82-6.09-49.88-4.05-91.51,6.12-123.97,11.25-35.91,24.14-53.33,32.45-57.64,1.39-.72,2.58-1.07,3.84-1.07,.85,0,1.74,.16,2.73,.48,4.85,1.55,9.31,10.28,11.1,21.71,5.68,36.31-10.71,91.95-29.16,122.67Z"></path></svg>',
        'libra' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 559.71 447.03"><path d="M187.27,268.81c-26.15-25.31-40.56-59.29-40.56-95.68,0-73.41,59.72-133.14,133.14-133.14s133.14,59.72,133.14,133.14c0,35.97-14.56,69.74-40.99,95.09l13.82,34.43,172.39,.21,.05-40-130.68-.16c16.57-26.76,25.41-57.48,25.41-89.58C452.98,77.67,375.31,0,279.85,0S106.71,77.67,106.71,173.14c0,32.32,8.74,63.17,25.11,89.98l-130.3-.24-.07,40,171.87,.31,13.95-34.37Z"></path><rect y="407.03" width="559.71" height="40"></rect></svg>',
        'scorpio' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 497.81 524.92"><path d="M407.12,482.43c-16.39-7.71-35.32-26.65-32.38-73.02,2.52-39.68,10.82-94.16,18.85-146.85,5.72-37.53,11.13-72.98,14.25-101.73,.48-4.4,1.03-8.89,1.61-13.64,2.8-22.79,5.97-48.61,1.32-71.73-6.05-30.12-24-50.1-53.34-59.39-17.67-5.59-36.18-3.48-53.53,6.12-13.63,7.54-26.17,19.66-36,34.17-11.49-27.92-33.06-43-64.51-44.96-24.33-1.52-46.54,8.85-64.27,29.99-4.08,4.87-7.63,9.96-10.7,15.01-1.41-5.06-3.24-9.89-5.64-14.35C111.89,21.75,92.14,8.15,65.68,2.73,41.34-2.26,16.53,.52,0,3.73L7.63,43c30.76-5.98,67.91-4.39,79.93,17.98,5.61,10.45,5.45,32.23,5.34,48.13-.03,4-.06,7.77-.01,11.39,.73,60.58-5.06,118.07-11.19,178.94-4.25,42.13-8.64,85.7-11.03,132.38l39.92,2.54c.19-2.52,19.44-253.22,39.98-328.98,5.67-20.9,22.66-55.79,50.36-54.06,13.11,.82,35.06,2.19,36.71,58.72,.97,33.22-6.62,135.85-13.15,216.01-4.54,51.05-7.99,93.15-8.88,104.1l39.85,3.42c.39-4.34,4.32-48.02,8.78-102.58,8.28-92.88,19.09-204.11,24.73-225.83,5.17-19.93,19.28-39.65,34.33-47.98,7.72-4.27,14.95-5.25,22.1-2.99,15.23,4.82,23.07,13.54,26.2,29.14,3.37,16.78,.74,38.24-1.81,58.98-.57,4.68-1.17,9.52-1.68,14.2-3.03,27.89-8.37,62.92-14.02,100.01-8.16,53.54-16.6,108.91-19.23,150.35-3.4,53.69,16.22,93.37,55.26,111.74,9.1,4.28,19.19,6.3,29.56,6.3,29.25,0,60.71-16.06,78.16-42.7l-33.46-21.92c-12.63,19.27-40.44,30.03-57.22,22.13Z"></path></svg>',
        'sagittarius' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 517.42 508.96"><path d="M0,481.16l28.76,27.8c50.58-52.32,101.86-104.4,153.68-156.09l83.7,87.55,28.91-27.64-84.24-88.12c87.6-86.81,176.67-172.44,266.48-256.18l.14,196.04,40-.03-.18-262.4-20.02,.04c-12.96,.02-26.4,.08-40.17,.13-68.86,.26-146.92,.55-211.88-2.27l-1.74,39.96c62.6,2.72,136.62,2.59,203.28,2.35-88.81,82.87-176.9,167.57-263.55,253.44l-95.25-99.63-28.91,27.64,95.79,100.2C102.6,376.02,50.94,428.46,0,481.16Z"></path></svg>',
        'capricorn' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 435.5 593.2"><path d="M75.72,45.36c29.94,20.76,36.75,101.31,27.96,166.56-2.87,21.31-7.13,54.36-11.09,85.35-4.81,35.2-8.52,65.08-10.21,80.68l39.73,4.65c.08-.66,4.85-38.61,10.16-80.25,3.11-22.72,6.69-47.68,10.48-72.45,15.94-104.04,23.64-126.11,25.62-130.4,10.59-22.94,32.38-49.19,61.78-54.08,10.76-1.79,21.13-.22,28.45,4.3,12.27,7.58,20.03,25.01,23.73,53.27,5.54,42.39-4.03,86.01-14.17,132.2-12.39,56.43-25.2,114.78-8.67,172.28,6.97,24.26,16.53,46.9,27.48,65.38-1.03,2.67-2.07,5.36-3.1,8.07-6.9,17.97-14.03,36.54-20.16,45.66-4.5,6.7-28.65,39.2-62.57,21.16l-18.78,35.32c12.68,6.74,25.8,10.13,38.91,10.13,10.2,0,20.39-2.05,30.36-6.17,17.57-7.26,33.65-20.8,45.3-38.14,6.75-10.05,12.86-24.32,19.05-40.08,12.21,10.52,27.46,18.65,45.43,18.65,24.62,0,46.64-10.38,60.42-28.47,12.8-16.81,16.87-38.3,11.17-58.96-6.25-22.65-25.03-40.52-49.02-46.62-23.9-6.08-48.31,.82-65.3,18.44-3.72,3.86-7.19,8.63-10.48,14.09-3.79-9.14-7.25-19.04-10.26-29.52-13.73-47.77-2.55-98.72,9.29-152.66,10.43-47.51,21.21-96.64,14.76-145.96-3.42-26.12-11.53-63.05-42.37-82.11-15.67-9.68-35.56-13.13-56.03-9.73-35,5.82-66.77,30.59-86.63,67.03-8.13-28.14-20.99-48.43-38.43-60.52C85.51,3.48,70.43-.69,53.7,.09,37.36,.86,19.3,6.49,0,16.84L18.91,52.09c24.88-13.35,44-15.61,56.81-6.73ZM347.46,439.62c9.57-9.93,20.8-8.92,26.64-7.43,9.94,2.53,17.92,9.78,20.32,18.49,2.39,8.65,.81,17.2-4.44,24.09-6.15,8.08-16.57,12.71-28.59,12.71-9.3,0-19.55-7.09-29.41-19.38,5.3-12.52,10.72-23.54,15.47-28.47Z"></path></svg>',
        'aquarius' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 806.82 499.43"><polygon points="218.62 70.84 277.96 185.43 458.26 60.31 513.89 184.03 709.04 59.2 772.31 167.15 806.82 146.92 722.51 3.1 531.37 125.37 475 0 292.55 126.62 234.68 14.88 0 153.63 20.36 188.06 218.62 70.84"></polygon><polygon points="531.37 436.74 475 311.37 292.55 437.99 234.68 326.25 0 465 20.36 499.43 218.62 382.21 277.96 496.8 458.26 371.68 513.89 495.4 708.76 370.75 770.16 479.26 804.97 459.56 722.78 314.29 531.37 436.74"></polygon></svg>',
        'pisces' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 419.96 553.22"><path d="M418.42,243.33c-40.11,1.55-80.39,2.81-120.74,3.81,6.76-84.03,44.82-163.77,104.71-217.32L375.73,0c-68.42,61.18-111.54,152.42-118.22,248.04-37.14,.75-74.31,1.26-111.45,1.55C139.74,153.41,96.52,61.51,27.73,0L1.07,29.82c60.52,54.12,98.75,134.99,104.91,220-35.29,.11-70.51,0-105.62-.3l-.36,40c26.14,.23,52.34,.35,78.59,.35,9.29,0,18.6-.04,27.9-.07-1.79,39.9-10.36,79.81-25.56,118.87-16.8,43.16-40.76,83.02-71.23,118.49l30.34,26.06c33.42-38.9,59.71-82.66,78.16-130.04,17.05-43.8,26.54-88.67,28.32-133.6,36.77-.28,73.57-.78,110.35-1.52,1.63,45.44,11.14,90.82,28.38,135.12,18.44,47.38,44.74,91.14,78.16,130.04l30.34-26.06c-30.46-35.46-54.43-75.33-71.22-118.49-15.54-39.92-24.13-80.72-25.66-121.5,41.14-1.01,82.2-2.29,123.09-3.87l-1.54-39.97Z"></path></svg>'
    ];

    $zodiac_dates = [
        'aries' => 'Mar 21—Apr 19',
        'taurus' => 'Apr 20—May 20',
        'gemini' => 'May 21—Jun 20',
        'cancer' => 'Jun 21—Jul 22',
        'leo' => 'Jul 23—Aug 22',
        'virgo' => 'Aug 23—Sep 22',
        'libra' => 'Sep 23—Oct 22',
        'scorpio' => 'Oct 23—Nov 21',
        'sagittarius' => 'Nov 22—Dec 21',
        'capricorn' => 'Dec 22—Jan 19',
        'aquarius' => 'Jan 20—Feb 18',
        'pisces' => 'Feb 19—Mar 20'
    ];

    $toc = '<div class="custom-toc"><ul>';
    $hasToc = false;

    foreach ($zodiac_icons as $sign => $icon) {
        $toc_descriptions = get_post_meta($post_id, '_toc_descriptions', true);
        $date = $zodiac_dates[$sign];
        $title = ucfirst($sign);
        $aries_title = isset($toc_descriptions[$sign . '_title']) ? $toc_descriptions[$sign . '_title'] : '';

        $toc .= '<li><a href="' . esc_url($post_link) . '#' . esc_attr($sign) . '">'
             . $icon . ' '
             . '<span class="zodiac-title">' . esc_html($title . ' ' . $aries_title) . '</span> '
             . '<span class="zodiac-date">' . esc_html($date) . '</span>'
             . '</a></li>';

        $hasToc = true;
    }

    $toc .= '</ul></div>';

    return $hasToc ? $toc : '';
}
add_shortcode('zodiac_toc', 'zodiac_toc_shortcode');



// User Profile Social Links
function add_custom_author_social_links($contactmethods) {
    $contactmethods['instagram'] = 'Instagram Username';
    $contactmethods['tiktok'] = 'TikTok Username';
    $contactmethods['twitter'] = 'Twitter Username';
    $contactmethods['facebook'] = 'Facebook Username or URL';
    $contactmethods['custom_link'] = 'Custom Link (Website, Portfolio, etc.)';
    return $contactmethods;
}
add_filter('user_contactmethods', 'add_custom_author_social_links');

function author_social_links_shortcode($atts) {
    // Get current post's author ID
    $author_id = get_post_field('post_author', get_the_ID());

    // Fetch social usernames
    $instagram = get_the_author_meta('instagram', $author_id);
    $tiktok = get_the_author_meta('tiktok', $author_id);
    $twitter = get_the_author_meta('twitter', $author_id);
    $facebook = get_the_author_meta('facebook', $author_id);
    $custom_link = get_the_author_meta('custom_link', $author_id);
    // Start output
    $output = '<ul class="author-social-links">';
    if ($instagram) {
        $output .= '<li><a target="_blank" href="https://www.instagram.com/' . esc_attr($instagram) . '" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M12,4.622c2.403,0,2.688,0.009,3.637,0.052c0.877,0.04,1.354,0.187,1.671,0.31c0.42,0.163,0.72,0.358,1.035,0.673 c0.315,0.315,0.51,0.615,0.673,1.035c0.123,0.317,0.27,0.794,0.31,1.671c0.043,0.949,0.052,1.234,0.052,3.637 s-0.009,2.688-0.052,3.637c-0.04,0.877-0.187,1.354-0.31,1.671c-0.163,0.42-0.358,0.72-0.673,1.035 c-0.315,0.315-0.615,0.51-1.035,0.673c-0.317,0.123-0.794,0.27-1.671,0.31c-0.949,0.043-1.233,0.052-3.637,0.052 s-2.688-0.009-3.637-0.052c-0.877-0.04-1.354-0.187-1.671-0.31c-0.42-0.163-0.72-0.358-1.035-0.673 c-0.315-0.315-0.51-0.615-0.673-1.035c-0.123-0.317-0.27-0.794-0.31-1.671C4.631,14.688,4.622,14.403,4.622,12 s0.009-2.688,0.052-3.637c0.04-0.877,0.187-1.354,0.31-1.671c0.163-0.42,0.358-0.72,0.673-1.035 c0.315-0.315,0.615-0.51,1.035-0.673c0.317-0.123,0.794-0.27,1.671-0.31C9.312,4.631,9.597,4.622,12,4.622 M12,3 C9.556,3,9.249,3.01,8.289,3.054C7.331,3.098,6.677,3.25,6.105,3.472C5.513,3.702,5.011,4.01,4.511,4.511 c-0.5,0.5-0.808,1.002-1.038,1.594C3.25,6.677,3.098,7.331,3.054,8.289C3.01,9.249,3,9.556,3,12c0,2.444,0.01,2.751,0.054,3.711 c0.044,0.958,0.196,1.612,0.418,2.185c0.23,0.592,0.538,1.094,1.038,1.594c0.5,0.5,1.002,0.808,1.594,1.038 c0.572,0.222,1.227,0.375,2.185,0.418C9.249,20.99,9.556,21,12,21s2.751-0.01,3.711-0.054c0.958-0.044,1.612-0.196,2.185-0.418 c0.592-0.23,1.094-0.538,1.594-1.038c0.5-0.5,0.808-1.002,1.038-1.594c0.222-0.572,0.375-1.227,0.418-2.185 C20.99,14.751,21,14.444,21,12s-0.01-2.751-0.054-3.711c-0.044-0.958-0.196-1.612-0.418-2.185c-0.23-0.592-0.538-1.094-1.038-1.594 c-0.5-0.5-1.002-0.808-1.594-1.038c-0.572-0.222-1.227-0.375-2.185-0.418C14.751,3.01,14.444,3,12,3L12,3z M12,7.378 c-2.552,0-4.622,2.069-4.622,4.622S9.448,16.622,12,16.622s4.622-2.069,4.622-4.622S14.552,7.378,12,7.378z M12,15 c-1.657,0-3-1.343-3-3s1.343-3,3-3s3,1.343,3,3S13.657,15,12,15z M16.804,6.116c-0.596,0-1.08,0.484-1.08,1.08 s0.484,1.08,1.08,1.08c0.596,0,1.08-0.484,1.08-1.08S17.401,6.116,16.804,6.116z"></path></svg></a></li>';
    }
    if ($tiktok) {
        $output .= '<li><a target="_blank" href="https://www.tiktok.com/@' . esc_attr($tiktok) . '" target="_blank"><svg class="tiktok" width="24" height="24" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M16.708 0.027c1.745-0.027 3.48-0.011 5.213-0.027 0.105 2.041 0.839 4.12 2.333 5.563 1.491 1.479 3.6 2.156 5.652 2.385v5.369c-1.923-0.063-3.855-0.463-5.6-1.291-0.76-0.344-1.468-0.787-2.161-1.24-0.009 3.896 0.016 7.787-0.025 11.667-0.104 1.864-0.719 3.719-1.803 5.255-1.744 2.557-4.771 4.224-7.88 4.276-1.907 0.109-3.812-0.411-5.437-1.369-2.693-1.588-4.588-4.495-4.864-7.615-0.032-0.667-0.043-1.333-0.016-1.984 0.24-2.537 1.495-4.964 3.443-6.615 2.208-1.923 5.301-2.839 8.197-2.297 0.027 1.975-0.052 3.948-0.052 5.923-1.323-0.428-2.869-0.308-4.025 0.495-0.844 0.547-1.485 1.385-1.819 2.333-0.276 0.676-0.197 1.427-0.181 2.145 0.317 2.188 2.421 4.027 4.667 3.828 1.489-0.016 2.916-0.88 3.692-2.145 0.251-0.443 0.532-0.896 0.547-1.417 0.131-2.385 0.079-4.76 0.095-7.145 0.011-5.375-0.016-10.735 0.025-16.093z"></path></svg></a></li>';
    }
    if ($twitter) {
        $output .= '<li><a target="_blank" href="https://twitter.com/' . esc_attr($twitter) . '" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M22.23,5.924c-0.736,0.326-1.527,0.547-2.357,0.646c0.847-0.508,1.498-1.312,1.804-2.27 c-0.793,0.47-1.671,0.812-2.606,0.996C18.324,4.498,17.257,4,16.077,4c-2.266,0-4.103,1.837-4.103,4.103 c0,0.322,0.036,0.635,0.106,0.935C8.67,8.867,5.647,7.234,3.623,4.751C3.27,5.357,3.067,6.062,3.067,6.814 c0,1.424,0.724,2.679,1.825,3.415c-0.673-0.021-1.305-0.206-1.859-0.513c0,0.017,0,0.034,0,0.052c0,1.988,1.414,3.647,3.292,4.023 c-0.344,0.094-0.707,0.144-1.081,0.144c-0.264,0-0.521-0.026-0.772-0.074c0.522,1.63,2.038,2.816,3.833,2.85 c-1.404,1.1-3.174,1.756-5.096,1.756c-0.331,0-0.658-0.019-0.979-0.057c1.816,1.164,3.973,1.843,6.29,1.843 c7.547,0,11.675-6.252,11.675-11.675c0-0.178-0.004-0.355-0.012-0.531C20.985,7.47,21.68,6.747,22.23,5.924z"></path></svg></a></li>';
    }
    if ($facebook) {
        $output .= '<li><a target="_blank" href="https://facebook.com/' . esc_attr($facebook) . '" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M12 2C6.5 2 2 6.5 2 12c0 5 3.7 9.1 8.4 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.3v7C18.3 21.1 22 17 22 12c0-5.5-4.5-10-10-10z"></path></svg></a></li>';
    }
    if ($custom_link) {
        $output .= '<li><a target="_blank" href="' . esc_attr($custom_link) . '" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M15.6,7.2H14v1.5h1.6c2,0,3.7,1.7,3.7,3.7s-1.7,3.7-3.7,3.7H14v1.5h1.6c2.8,0,5.2-2.3,5.2-5.2,0-2.9-2.3-5.2-5.2-5.2zM4.7,12.4c0-2,1.7-3.7,3.7-3.7H10V7.2H8.4c-2.9,0-5.2,2.3-5.2,5.2,0,2.9,2.3,5.2,5.2,5.2H10v-1.5H8.4c-2,0-3.7-1.7-3.7-3.7zm4.6.9h5.3v-1.5H9.3v1.5z"></path></svg></a></li>';
    }
    $output .= '</ul>';
    return $output;
}
add_shortcode('author_social_links', 'author_social_links_shortcode');


// Removed Current Post from Related Article
function exclude_current_post_in_secondary_queries($query) {
    if (is_singular('post') && !$query->is_main_query()) {
        $current_post_id = get_the_ID();
        $existing_exclude = $query->get('post__not_in');
        if (!is_array($existing_exclude)) {
            $existing_exclude = [];
        }
        $existing_exclude[] = $current_post_id;
        $query->set('post__not_in', $existing_exclude);
    }
}
add_action('pre_get_posts', 'exclude_current_post_in_secondary_queries');



function limit_uploaded_image_size($metadata) {
    if (!empty($metadata['width']) && $metadata['width'] > 1280) {
        $metadata['width'] = 1280;
    }
    return $metadata;
}
add_filter('wp_generate_attachment_metadata', 'limit_uploaded_image_size');

<?php
/**
 * wp-staging functions and definitions
 *
 * @package wp-staging
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Theme setup.
 */
function wp_staging_setup() {
	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Register primary menu
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wp-staging' ),
		)
	);

	// Enable HTML5 markup
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Enable custom logo
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wp_staging_setup' );

/**
 * Set content width.
 */
function wp_staging_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_staging_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_staging_content_width', 0 );

/**
 * Register sidebar widget area.
 */
function wp_staging_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-staging' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-staging' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_staging_widgets_init' );

/**
 * Enqueue styles and scripts.
 */
function wp_staging_scripts() {
	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	// Main theme CSS (after Bootstrap)
	wp_enqueue_style( 'wp-staging-style', get_stylesheet_uri(), array('bootstrap-css'), _S_VERSION );

	// Theme JS
	wp_enqueue_script( 'wp-staging-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Bootstrap JS (includes Popper)
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );

	// Feather Icons
	wp_enqueue_script( 'feather-icons', 'https://unpkg.com/feather-icons', array(), null, true );

	// Inline script to activate feather.replace()
	wp_add_inline_script( 'feather-icons', 'feather.replace();' );

	// Comment reply (if needed)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_staging_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


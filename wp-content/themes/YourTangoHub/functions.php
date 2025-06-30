<?php

/**
 * Register Block Pattern Category
 */

// Hook
add_action('init', 'fresh_blog_lite_block_pattern_category');

// Callback
if (! function_exists('fresh_blog_lite_block_pattern_category')) :
  function fresh_blog_lite_block_pattern_category()
  {

    register_block_pattern_category(
      'fresh-blog-lite-patterns',
      array(
        'label'       => __('Fresh Blog Lite Patterns', 'fresh-blog-lite'),
        'description' => __('Patterns for Fresh Blog Lite', 'fresh-blog-lite'),
      )
    );
  }
endif;

/**
 * Register Block Styles
 */

// Hook
add_action('init', 'fresh_blog_lite_block_styles');

// Callback
if (! function_exists('fresh_blog_lite_block_styles')) :
  function fresh_blog_lite_block_styles()
  {
    // Block: core/image, core/post-featured-image
    // Style: Shine
    // Via: Block Style
    register_block_style(
      ['core/image', 'core/post-featured-image'],
      array(
        'name'  => 'image-shine',
        'label' => __('Shine', 'fresh-blog-lite'),
      )
    );

    // Block: core/image, core/post-featured-image
    // Style: Shine 2
    // Via: Block Style
    register_block_style(
      ['core/image', 'core/post-featured-image'],
      array(
        'name'  => 'image-shine-2',
        'label' => __('Shine 2', 'fresh-blog-lite'),
      )
    );
  }
endif;

/**
 * Enqueue Block Stylesheets.
 */

// Hook
add_action('init', 'fresh_blog_lite_block_stylesheets');

// Callback
if (! function_exists('fresh_blog_lite_block_stylesheets')) :
  function fresh_blog_lite_block_stylesheets()
  {

    // Block: core/button
    $asset = include get_parent_theme_file_path('public/css/button.asset.php');
    wp_enqueue_block_style(
      'core/button',
      array(
        'handle' => 'fresh-blog-lite-button-style',
        'src'    => get_parent_theme_file_uri('public/css/button.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/button.css'),
      )
    );

    // Block: core/columns
    $asset = include get_parent_theme_file_path('public/css/columns.asset.php');
    wp_enqueue_block_style(
      'core/columns',
      array(
        'handle' => 'fresh-blog-lite-columns-style',
        'src'    => get_parent_theme_file_uri('public/css/columns.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/columns.css'),
      )
    );

    // Block: core/cover
    $asset = include get_parent_theme_file_path('public/css/cover.asset.php');
    wp_enqueue_block_style(
      'core/cover',
      array(
        'handle' => 'fresh-blog-lite-cover-style',
        'src'    => get_parent_theme_file_uri('public/css/cover.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/cover.css'),
      )
    );

    // Block: core/group
    $asset = include get_parent_theme_file_path('public/css/group.asset.php');
    wp_enqueue_block_style(
      'core/group',
      array(
        'handle' => 'fresh-blog-lite-group-style',
        'src'    => get_parent_theme_file_uri('public/css/group.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/group.css'),
      )
    );

    // Block: core/image
    $asset = include get_parent_theme_file_path('public/css/image.asset.php');
    wp_enqueue_block_style(
      'core/image',
      array(
        'handle' => 'fresh-blog-lite-image-style',
        'src'    => get_parent_theme_file_uri('public/css/image.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/image.css'),
      )
    );

    // Block: core/navigation
    $asset = include get_parent_theme_file_path('public/css/navigation.asset.php');
    wp_enqueue_block_style(
      'core/navigation',
      array(
        'handle' => 'fresh-blog-lite-navigation-style',
        'src'    => get_parent_theme_file_uri('public/css/navigation.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/navigation.css'),
      )
    );

    // Block: core/paragraph
    $asset = include get_parent_theme_file_path('public/css/paragraph.asset.php');
    wp_enqueue_block_style(
      'core/paragraph',
      array(
        'handle' => 'fresh-blog-lite-paragraph-style',
        'src'    => get_parent_theme_file_uri('public/css/paragraph.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/paragraph.css'),
      )
    );

    // Block: core/post-featured-image
    $asset = include get_parent_theme_file_path('public/css/post-featured-image.asset.php');
    wp_enqueue_block_style(
      'core/post-featured-image',
      array(
        'handle' => 'fresh-blog-lite-post-featured-image-style',
        'src'    => get_parent_theme_file_uri('public/css/post-featured-image.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/post-featured-image.css'),
      )
    );

    // Block: core/spacer
    $asset = include get_parent_theme_file_path('public/css/spacer.asset.php');
    wp_enqueue_block_style(
      'core/spacer',
      array(
        'handle' => 'fresh-blog-lite-spacer-style',
        'src'    => get_parent_theme_file_uri('public/css/spacer.css'),
        'deps'   => $asset['dependencies'],
        'ver'    => $asset['version'],
        'path'   => get_parent_theme_file_path('public/css/spacer.css'),
      )
    );
  }
endif;

/**
 * Load front-end assets.
 */

// Hook
add_action('wp_enqueue_scripts', 'fresh_blog_lite_assets');

// Callback
if (! function_exists('fresh_blog_lite_assets')) :
  function fresh_blog_lite_assets()
  {
    $asset = include get_parent_theme_file_path('public/css/screen.asset.php');

    wp_enqueue_style(
      'fresh-blog-lite-style',
      get_parent_theme_file_uri('public/css/screen.css'),
      $asset['dependencies'],
      $asset['version']
    );
  }
endif;

/**
 * Load back-end assets.
 * enqueue_block_editor_assets: Throw Warning in FSE
 */

// Hook
//add_action('enqueue_block_editor_assets', 'fresh_blog_lite_block_editor_assets');
add_action('enqueue_block_assets', 'fresh_blog_lite_block_editor_assets');

// Callback
if (! function_exists('fresh_blog_lite_block_editor_assets')) :
  function fresh_blog_lite_block_editor_assets()
  {
    $style_asset = include get_parent_theme_file_path('public/css/editor.asset.php');

    wp_enqueue_style(
      'fresh-blog-lite-editor',
      get_parent_theme_file_uri('public/css/editor.css'),
      $style_asset['dependencies'],
      $style_asset['version']
    );
  }
endif;

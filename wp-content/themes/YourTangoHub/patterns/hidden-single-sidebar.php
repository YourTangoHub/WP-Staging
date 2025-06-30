<?php

/**
 * Title: Hidden Single Sidebar
 * Slug: fresh-blog-lite/hidden-single-sidebar
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|52"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group"><!-- wp:post-terms {"term":"category","textAlign":"center","className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} /-->

    <!-- wp:post-title {"textAlign":"center","level":1} /-->

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group"><!-- wp:post-date {"isLink":true} /-->

      <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-800"}}}},"textColor":"secondary-800","fontSize":"18"} -->
      <p class="has-secondary-800-color has-text-color has-link-color has-18-font-size"><?php esc_html_e('·', 'fresh-blog-lite'); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|4"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
      <div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-text-aware-1","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-800"}}}},"textColor":"secondary-800","fontSize":"minute"} -->
        <p class="is-style-text-aware-1 has-secondary-800-color has-text-color has-link-color has-minute-font-size"><?php esc_html_e('by', 'fresh-blog-lite'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:post-author-name {"isLink":true} /-->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->

  <!-- wp:post-featured-image {"aspectRatio":"21/9","align":"wide","className":"is-style-image-comic is-style-default","style":{"border":{"radius":"12px"}}} /-->

  <!-- wp:post-content {"lock":{"move":false,"remove":false},"align":"full","layout":{"type":"constrained"}} /-->

  <!-- wp:group {"layout":{"type":"default"}} -->
  <div class="wp-block-group"><!-- wp:post-terms {"term":"post_tag","separator":"  ","className":"is-style-post-terms-1 is-style-post-terms-2"} /--></div>
  <!-- /wp:group -->

  <!-- wp:group {"layout":{"type":"default"}} -->
  <div class="wp-block-group"><!-- wp:group {"tagName":"nav","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"ariaLabel":"Posts"} -->
    <nav aria-label="Posts" class="wp-block-group"><!-- wp:post-navigation-link {"type":"previous","label":"Previous: ","showTitle":true,"linkLabel":true,"arrow":"arrow","className":"is-style-default"} /-->

      <!-- wp:post-navigation-link {"textAlign":"right","label":"Next: ","showTitle":true,"linkLabel":true,"arrow":"arrow","className":"is-style-default"} /-->
    </nav>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->

  <!-- wp:comments -->
  <div class="wp-block-comments"><!-- wp:heading -->
    <h2 class="wp-block-heading"><?php esc_html_e('Comments', 'fresh-blog-lite'); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:comments-title {"level":3} /-->

    <!-- wp:comment-template -->
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|16"}}}} -->
    <div class="wp-block-columns"><!-- wp:column {"width":"40px"} -->
      <div class="wp-block-column" style="flex-basis:40px"><!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /--></div>
      <!-- /wp:column -->

      <!-- wp:column -->
      <div class="wp-block-column"><!-- wp:comment-author-name /-->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:comment-date /-->

          <!-- wp:comment-edit-link /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:comment-content /-->

        <!-- wp:comment-reply-link /-->
      </div>
      <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
    <!-- /wp:comment-template -->

    <!-- wp:comments-pagination {"className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:comments-pagination-previous /-->

    <!-- wp:comments-pagination-numbers /-->

    <!-- wp:comments-pagination-next /-->
    <!-- /wp:comments-pagination -->

    <!-- wp:post-comments-form /-->
  </div>
  <!-- /wp:comments -->
</section>
<!-- /wp:group -->

<!-- wp:spacer {"height":"1px","className":"is-style-spacer-none-up-lg","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|52"}}}} -->
<div style="margin-bottom:var(--wp--preset--spacing--52);height:1px" aria-hidden="true" class="wp-block-spacer is-style-spacer-none-up-lg"></div>
<!-- /wp:spacer -->

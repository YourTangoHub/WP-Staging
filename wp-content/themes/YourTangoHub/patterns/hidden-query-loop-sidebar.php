<?php

/**
 * Title: Hidden Query Loop, Sidebar
 * Slug: fresh-blog-lite/hidden-query-loop-sidebar
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Main QL"},"layout":{"type":"default"}} -->
<section class="wp-block-group"><!-- wp:query {"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"perPage":10},"layout":{"type":"default"}} -->
  <div class="wp-block-query"><!-- wp:post-template {"className":"is-style-default","style":{"spacing":{"blockGap":"var:preset|spacing|32"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"300px"}} -->
    <!-- wp:group {"className":"is-style-default","style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
    <div class="wp-block-group is-style-default" style="min-height:100%"><!-- wp:group {"className":"is-style-default","style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"default"}} -->
      <div class="wp-block-group is-style-default"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","align":"center","className":"is-style-image-shine","style":{"border":{"radius":"12px"}}} /-->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|12","padding":{"right":"var:preset|spacing|24","left":"var:preset|spacing|24"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:post-terms {"term":"category","className":"is-style-default","style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} /-->

          <!-- wp:post-title {"isLink":true,"fontSize":"diminutive"} /-->

          <!-- wp:post-date {"format":"M j, Y","isLink":true,"fontSize":"minute"} /-->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|6","padding":{"bottom":"var:preset|spacing|24","right":"var:preset|spacing|24","left":"var:preset|spacing|24"}},"border":{"bottom":{"color":"var:preset|color|secondary-200","style":"dashed","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
      <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--secondary-200);border-bottom-style:dashed;border-bottom-width:1px;padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:post-excerpt {"excerptLength":10} /--></div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"paginationArrow":"arrow","className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:query-pagination-previous {"label":"Prev"} /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next {"label":"Next"} /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('No posts were found.', 'fresh-blog-lite'); ?></p>
    <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
  </div>
  <!-- /wp:query -->

  <!-- wp:spacer {"height":"1px","className":"is-style-spacer-none-up-lg","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|52"}}}} -->
  <div style="margin-bottom:var(--wp--preset--spacing--52);height:1px" aria-hidden="true" class="wp-block-spacer is-style-spacer-none-up-lg"></div>
  <!-- /wp:spacer -->
</section>
<!-- /wp:group -->

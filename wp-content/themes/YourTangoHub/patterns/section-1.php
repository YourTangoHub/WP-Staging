<?php

/**
 * Title: Section 1
 * Slug: fresh-blog-lite/section-1
 * Categories: query, fresh-blog-lite-patterns
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|52"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--52)"><!-- wp:query {"queryId":0,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
  <div class="wp-block-query"><!-- wp:post-template -->
    <!-- wp:cover {"useFeaturedImage":true,"isUserOverlayColor":true,"gradient":"black-fadeup","contentPosition":"bottom left","style":{"border":{"radius":"16px"},"dimensions":{"aspectRatio":"19/9"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="border-radius:16px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-black-fadeup-gradient-background"></span>
      <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16","padding":{"right":"var:preset|spacing|32"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--32)"><!-- wp:post-terms {"term":"category","separator":"","className":"is-style-post-terms"} /-->

          <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"constrained"}} -->
          <div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-50"}}}},"textColor":"secondary-50"} /-->

            <!-- wp:post-date {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-200"}}}},"textColor":"secondary-200"} /-->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
      </div>
    </div>
    <!-- /wp:cover -->
    <!-- /wp:post-template -->
  </div>
  <!-- /wp:query -->
</div>
<!-- /wp:group -->

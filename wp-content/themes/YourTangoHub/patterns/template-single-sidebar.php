<?php

/**
 * Title: Single Sidebar ( Fresh Blog )
 * Slug: fresh-blog-lite/template-single-sidebar
 * Template Types: single
 * Viewport width: 1440
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","area":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0">

  <!-- wp:columns {"metadata":{"name":"Layout"},"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|52"},"margin":{"top":"var:preset|spacing|52","bottom":"var:preset|spacing|52"}}}} -->
  <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--52);margin-bottom:var(--wp--preset--spacing--52)"><!-- wp:column {"width":"70%","style":{"spacing":{"blockGap":"0"}}} -->
    <div class="wp-block-column" style="flex-basis:70%">
      <!-- wp:pattern {"slug":"fresh-blog-lite/hidden-single-sidebar"} /-->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"30%","style":{"spacing":{"blockGap":"0"}}} -->
    <div class="wp-block-column" style="flex-basis:30%">
      <!-- wp:template-part {"slug":"sidebar","tagName":"aside","area":"uncategorized"} /-->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","area":"footer"} /-->

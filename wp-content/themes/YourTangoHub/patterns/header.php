<?php

/**
 * Title: Header Default ( Fresh Blog )
 * Slug: fresh-blog-lite/header
 * Categories: header, fresh-blog-lite-patterns
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Header","categories":["header","fresh-blog-lite-patterns"],"patternName":"fresh-blog-lite/header"},"align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32"}},"border":{"bottom":{"color":"var:preset|color|secondary-100","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-default" style="border-bottom-color:var(--wp--preset--color--secondary-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32)"><!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
  <div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:site-title {"level":0} /-->

      <!-- wp:site-tagline /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group"><!-- wp:navigation {"className":"is-style-navigation-basic is-style-navigation-d-large","layout":{"type":"flex"}} -->
      <!-- wp:navigation-link {"label":"<?php esc_html_e('Home', 'fresh-blog-lite'); ?>","url":"<?php echo esc_url(home_url('/')); ?>","kind":"custom"} /-->
      <!-- wp:navigation-link {"label":"<?php esc_html_e('Blog', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
      <!-- wp:navigation-link {"label":"<?php esc_html_e('About', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
      <!-- wp:navigation-link {"label":"<?php esc_html_e('Contact', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
      <!-- /wp:navigation -->

      <!-- wp:buttons -->
      <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-button-size-1"} -->
        <div class="wp-block-button is-style-button-size-1"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('Subscribe', 'fresh-blog-lite'); ?></a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->

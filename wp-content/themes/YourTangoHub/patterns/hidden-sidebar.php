<?php

/**
 * Title: Hidden Sidebar
 * Slug: fresh-blog-lite/hidden-sidebar
 * Inserter: no
 */
?>
<!-- wp:group {"metadata":{"name":"Sidebar"},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"is-style-section-2","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24","right":"var:preset|spacing|24"}}},"layout":{"type":"default"}} -->
  <div class="wp-block-group is-style-section-2" style="border-radius:12px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:group {"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-heading-basic is-style-text-label-2"} -->
      <h3 class="wp-block-heading is-style-heading-basic is-style-text-label-2"><?php esc_html_e('About', 'fresh-blog-lite'); ?></h3>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"typography":{"lineHeight":"1"},"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group" style="line-height:1"><!-- wp:group {"className":"is-style-section-3","style":{"border":{"radius":"50%"},"spacing":{"padding":{"top":"var:preset|spacing|4","bottom":"var:preset|spacing|4","left":"var:preset|spacing|4","right":"var:preset|spacing|4"}}},"layout":{"type":"default"}} -->
      <div class="wp-block-group is-style-section-3" style="border-radius:50%;padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--4);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--4)"><!-- wp:image {"width":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","className":"is-style-rounded"} -->
        <figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/avatar-lite.webp" alt="" style="aspect-ratio:1;object-fit:cover;width:60px" /></figure>
        <!-- /wp:image -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|6"}},"layout":{"type":"default"}} -->
      <div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-text-summary","style":{"typography":{"lineHeight":"1.2"}}} -->
        <p class="is-style-text-summary" style="line-height:1.2"><?php esc_html_e('Emily Scott', 'fresh-blog-lite'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"is-style-text-aware-1 is-style-text-note","style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
        <p class="is-style-text-aware-1 is-style-text-note has-secondary-color has-text-color has-link-color" style="line-height:1"><?php esc_html_e('CEO &amp; Founder', 'fresh-blog-lite'); ?></p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-text-aware-1 is-style-text-note","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-800"}}}},"textColor":"secondary-800"} -->
      <p class="is-style-text-aware-1 is-style-text-note has-secondary-800-color has-text-color has-link-color"><?php esc_html_e('Founder of a lifestyle blog. Sharing tips on fashion, travel, wellness &amp; everyday inspiration! Follow along for a stylish &amp; balanced life!', 'fresh-blog-lite'); ?></p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:social-links {"iconColor":"secondary-800","iconColorValue":"#3f4666","size":"has-small-icon-size","className":"is-style-sm-aware-1 is-style-social-links-1"} -->
      <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-sm-aware-1 is-style-social-links-1"><!-- wp:social-link {"url":"#!","service":"x"} /-->

        <!-- wp:social-link {"url":"#!","service":"linkedin"} /-->

        <!-- wp:social-link {"url":"#!","service":"instagram"} /-->
      </ul>
      <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"className":"is-style-section-2","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24","right":"var:preset|spacing|24"}}},"layout":{"type":"default"}} -->
  <div class="wp-block-group is-style-section-2" style="border-radius:12px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:group {"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-heading-basic is-style-text-label-2"} -->
      <h3 class="wp-block-heading is-style-heading-basic is-style-text-label-2"><?php esc_html_e('Popular Posts', 'fresh-blog-lite'); ?></h3>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
    <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":null,"minimumColumnWidth":"10rem"}} -->
      <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
      <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3.5","style":{"border":{"radius":"12px"}}} /--></div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|4"}},"layout":{"type":"default"}} -->
          <div class="wp-block-group"><!-- wp:post-title {"isLink":true,"fontSize":"tiny"} /-->

            <!-- wp:post-date {"format":"M j, Y","isLink":true,"fontSize":"minute"} /-->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
      </div>
      <!-- /wp:columns -->
      <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"className":"is-style-section-2","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24","right":"var:preset|spacing|24"}}},"layout":{"type":"default"}} -->
  <div class="wp-block-group is-style-section-2" style="border-radius:12px;padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:group {"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-heading-basic is-style-text-label-2"} -->
      <h3 class="wp-block-heading is-style-heading-basic is-style-text-label-2"><?php esc_html_e('Tags', 'fresh-blog-lite'); ?></h3>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:tag-cloud {"numberOfTags":10,"className":"is-style-outline"} /-->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->

<?php

/**
 * Title: Footer Basic ( Fresh Blog )
 * Slug: fresh-blog-lite/footer-basic
 * Categories: footer, fresh-blog-lite-patterns
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"metadata":{"name":"Footer"},"align":"full","className":"is-style-default","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-default"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|52","bottom":"var:preset|spacing|52"}},"border":{"top":{"color":"var:preset|color|secondary-100","width":"1px"},"right":[],"bottom":[],"left":[]}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--secondary-100);border-top-width:1px;padding-top:var(--wp--preset--spacing--52);padding-bottom:var(--wp--preset--spacing--52)"><!-- wp:group {"align":"wide","className":"is-style-group-plain-links","style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide is-style-group-plain-links"><!-- wp:group {"className":"is-style-row-wrap-sm-down row-child-100","style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
      <div class="wp-block-group is-style-row-wrap-sm-down row-child-100"><!-- wp:navigation {"overlayMenu":"never","style":{"spacing":{"blockGap":"var:preset|spacing|12"}},"fontSize":"minute"} -->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('Copyright', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('Refund', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('Compliance', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
        <!-- /wp:navigation -->

        <!-- wp:social-links {"size":"has-small-icon-size","className":"is-style-sm-aware-1 is-style-social-links-1","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|12"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <ul class="wp-block-social-links has-small-icon-size is-style-sm-aware-1 is-style-social-links-1"><!-- wp:social-link {"url":"#!","service":"facebook","label":""} /-->

          <!-- wp:social-link {"url":"#!","service":"twitter","label":""} /-->

          <!-- wp:social-link {"url":"#!","service":"wordpress"} /-->
        </ul>
        <!-- /wp:social-links -->
      </div>
      <!-- /wp:group -->

      <!-- wp:separator {"className":"is-style-default"} -->
      <hr class="wp-block-separator has-alpha-channel-opacity is-style-default" />
      <!-- /wp:separator -->

      <!-- wp:group {"className":"is-style-row-wrap-sm-down row-child-100","style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
      <div class="wp-block-group is-style-row-wrap-sm-down row-child-100"><!-- wp:paragraph {"className":"is-style-text-aware-1 is-style-link-aware-1 is-style-text-note-2","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-800"}}}},"textColor":"secondary-800"} -->
        <p class="is-style-text-aware-1 is-style-link-aware-1 is-style-text-note-2 has-secondary-800-color has-text-color has-link-color">
          <?php
          printf(
            '%1$s %2$s <a href="%3$s">%4$s</a>. %5$s',
            esc_html__('&copy;', 'fresh-blog-lite'),
            esc_html(date_i18n(__('Y', 'fresh-blog-lite'))),
            esc_url(home_url('/')),
            esc_html(get_bloginfo('name')),
            esc_html__('All rights reserved.', 'fresh-blog-lite')
          );
          ?>
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"is-style-text-aware-1 is-style-link-aware-1 is-style-text-note-2","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-800"}}}},"textColor":"secondary-800"} -->
        <p class="is-style-text-aware-1 is-style-link-aware-1 is-style-text-note-2 has-secondary-800-color has-text-color has-link-color">
          <?php
          echo sprintf(
            '<a href="%1$s" target="_blank">%2$s</a> &sdot; %3$s <a href="%4$s" target="_blank">%5$s</a>',
            esc_url('https://designorbital.com/wordpress-theme/free-personal-blog-wordpress-theme-fresh-blog/'),
            esc_html__('Fresh Blog Lite Theme', 'fresh-blog-lite'),
            esc_html__('Powered by', 'fresh-blog-lite'),
            esc_url(__('https://wordpress.org/', 'fresh-blog-lite')),
            esc_html__('WordPress', 'fresh-blog-lite')
          );
          ?>
        </p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->

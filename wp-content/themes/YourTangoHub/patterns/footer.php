<?php

/**
 * Title: Footer Default ( Fresh Blog )
 * Slug: fresh-blog-lite/footer
 * Categories: footer, fresh-blog-lite-patterns
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"metadata":{"name":"Footer"},"align":"full","className":"is-style-default","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-default"><!-- wp:group {"tagName":"section","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}},"border":{"top":{"color":"var:preset|color|secondary-100","width":"1px"},"right":[],"bottom":[],"left":[]}},"layout":{"type":"constrained"}} -->
  <section class="wp-block-group is-style-default" style="border-top-color:var(--wp--preset--color--secondary-100);border-top-width:1px;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
      <div class="wp-block-column" style="flex-basis:50%"><!-- wp:group {"layout":{"type":"default"}} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"default"}} -->
          <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:site-logo {"width":40} /-->

              <!-- wp:site-title {"level":0} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:site-tagline /-->
          </div>
          <!-- /wp:group -->

          <!-- wp:group {"layout":{"type":"constrained","contentSize":"500px","justifyContent":"left"}} -->
          <div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-text-aware-1 is-style-text-summary","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-800"}}}},"textColor":"secondary-800"} -->
            <p class="is-style-text-aware-1 is-style-text-summary has-secondary-800-color has-text-color has-link-color"><?php esc_html_e('Plunge into a tapestry of multi-faceted blogging! Uncover skillfully woven content spanning diverse topics, crafted to inspire and enthrall inquisitive minds worldwide.', 'fresh-blog-lite'); ?></p>
            <!-- /wp:paragraph -->
          </div>
          <!-- /wp:group -->

          <!-- wp:group {"layout":{"type":"default"}} -->
          <div class="wp-block-group"><!-- wp:social-links {"size":"has-small-icon-size","className":"is-style-sm-aware-1 is-style-social-links-1","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|12"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <ul class="wp-block-social-links has-small-icon-size is-style-sm-aware-1 is-style-social-links-1"><!-- wp:social-link {"url":"#!","service":"facebook","label":""} /-->

              <!-- wp:social-link {"url":"#!","service":"x"} /-->

              <!-- wp:social-link {"url":"#!","service":"instagram"} /-->

              <!-- wp:social-link {"url":"#!","service":"wordpress"} /-->
            </ul>
            <!-- /wp:social-links -->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:column -->

      <!-- wp:column {"width":"20%"} -->
      <div class="wp-block-column" style="flex-basis:20%"><!-- wp:group {"layout":{"type":"default"}} -->
        <div class="wp-block-group"><!-- wp:heading {"level":4,"className":"is-style-text-label-2"} -->
          <h4 class="wp-block-heading is-style-text-label-2"><?php esc_html_e('Quick Links', 'fresh-blog-lite'); ?></h4>
          <!-- /wp:heading -->

          <!-- wp:navigation {"textColor":"secondary-800","overlayMenu":"never","style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"flex","orientation":"vertical"}} -->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('About Us', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Contact Us', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Privacy Policy', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Disclaimer', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Sitemap', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Categories', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
          <!-- wp:navigation-link {"label":"<?php esc_html_e('Subscribe', 'fresh-blog-lite'); ?>","url":"#!","kind":"custom"} /-->
          <!-- /wp:navigation -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:column -->

      <!-- wp:column {"width":"30%"} -->
      <div class="wp-block-column" style="flex-basis:30%"><!-- wp:group {"layout":{"type":"default"}} -->
        <div class="wp-block-group"><!-- wp:heading {"level":4,"className":"is-style-text-label-2"} -->
          <h4 class="wp-block-heading is-style-text-label-2"><?php esc_html_e('Recent Posts', 'fresh-blog-lite'); ?></h4>
          <!-- /wp:heading -->

          <!-- wp:query {"queryId":6,"query":{"perPage":2,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
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
      </div>
      <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
  </section>
  <!-- /wp:group -->

  <!-- wp:group {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|52","bottom":"var:preset|spacing|52"}},"border":{"top":{"color":"var:preset|color|secondary-100","width":"1px"},"right":[],"bottom":[],"left":[]}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group is-style-default" style="border-top-color:var(--wp--preset--color--secondary-100);border-top-width:1px;padding-top:var(--wp--preset--spacing--52);padding-bottom:var(--wp--preset--spacing--52)"><!-- wp:group {"align":"wide","className":"is-style-group-plain-links","style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide is-style-group-plain-links"><!-- wp:group {"className":"is-style-row-wrap-sm-down row-child-100","style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
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

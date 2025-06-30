<?php
get_header(); ?>

<main id="primary" class="site-main">
    <section class="">
        <!-- Latest Posts -->
        <?php
        $related_posts = get_posts(array(
            'numberposts' => 3,
            'post_status' => 'publish',
        ));
        ?>
        <div class="related-posts py-5">
            <div class="container">
                <h2 class="mb-4">Top Related Posts</h2>
                <div class="row">
                    <?php foreach ( $related_posts as $index => $post ) : setup_postdata( $post ); ?>
                        <?php
                        // Get first category
                        $category = get_the_category();
                        $category_name = !empty($category) ? $category[0]->name : '';
                        
                        // Estimate reading time: 200 words per minute
                        $word_count = str_word_count(strip_tags(get_the_content()));
                        $reading_time = ceil($word_count / 200);
                        ?>
                        
                        <?php if ( $index === 0 ) : ?>
                            <!-- Large Left Post -->
                            <div class="col-md-8">
                                <div class="card h-100">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="img-fluid object-fit-cover" loading="lazy" src="<?php the_post_thumbnail_url('large'); ?>" class="card-img-top" alt="<?php the_title(); ?>" width="" height="400">
                                        </a>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <!-- Category & Reading Time -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="badge bg-secondary"><?php echo esc_html($category_name); ?></span>
                                            <span class="text-muted small"><?php echo $reading_time; ?> min read</span>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="card-title">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>

                                        <!-- Excerpt -->
                                        <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 150); ?></p>

                                        <!-- Author + Meta -->
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="text-muted small">
                                                By <?php the_author(); ?> | 
                                                <?php echo 'Updated ' . human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
                                            </span>
                                            <span class="text-muted small">
                                                <i style="width: 16px; height: 16px;" data-feather="share-2"></i> Share |
                                                <i style="width: 16px; height: 16px;" data-feather="eye"></i> <?php echo get_post_meta(get_the_ID(), 'post_views_count', true) ?: 0; ?> views
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Right Column Start -->
                            <div class="col-md-4 d-flex flex-column gap-4">
                            <?php else : ?>
                                <!-- Smaller Right Posts -->
                                <div class="card h-100">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="img-fluid object-fit-cover" loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>" width="" height="200">
                                        </a>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <!-- Category & Reading Time -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="badge bg-secondary"><?php echo esc_html($category_name); ?></span>
                                            <span class="text-muted small"><?php echo $reading_time; ?> min read</span>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="card-title">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h5>

                                        <!-- Excerpt -->
                                        <!-- <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p> -->

                                        <!-- Author + Meta -->
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="text-muted small">
                                                By <?php the_author(); ?> | 
                                                <?php echo 'Updated ' . human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
                                            </span>
                                            <span class="text-muted small">
                                                <i style="width: 16px; height: 16px;" data-feather="share-2"></i> Share |
                                                <i style="width: 16px; height: 16px;" data-feather="eye"></i> <?php echo get_post_meta(get_the_ID(), 'post_views_count', true) ?: 0; ?> views
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; wp_reset_postdata(); ?>
                        </div><!-- end right column -->
                </div><!-- end row -->
            </div>
        </div>
        <!-- Latest Posts -->

        <!-- Get posts for this category -->
        <?php
        $categories = get_categories();

        foreach ( $categories as $category ) :
            // Skip Uncategorized
            if ( $category->slug === 'uncategorized' ) {
                continue;
            }

            $cat_posts = new WP_Query(array(
                'cat'            => $category->term_id,
                'posts_per_page' => -1,
                'offset'         => 3,
                'post_status'    => 'publish'
            ));

            if ( $cat_posts->have_posts() ) :
        ?>
            <div class="container py-4">
                <h3 class="mb-3"><?php echo esc_html($category->name); ?></h3>
                <div class="row">
                    <?php while ( $cat_posts->have_posts() ) : $cat_posts->the_post(); ?>
                        <?php
                        $category_data = get_the_category();
                        $cat_name = !empty($category_data) ? $category_data[0]->name : '';

                        $word_count = str_word_count(strip_tags(get_the_content()));
                        $reading_time = ceil($word_count / 200);
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                             class="card-img-top img-fluid object-fit-cover"
                                             alt="<?php the_title(); ?>"
                                             width="400"
                                             height="200"
                                             style="width: 100%; height: 200px;">
                                    </a>
                                <?php endif; ?>
                                <div class="card-body">
                                    <!-- Category & Reading Time -->
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-secondary"><?php echo esc_html($cat_name); ?></span>
                                        <span class="text-muted small"><?php echo $reading_time; ?> min read</span>
                                    </div>

                                    <!-- Title -->
                                    <h5 class="card-title">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>

                                    <!-- Description -->
                                    <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>

                                    <!-- Author & Meta -->
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="text-muted small">
                                            By <?php the_author(); ?> | 
                                            <?php echo 'Updated ' . human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
                                        </span>
                                        <span class="text-muted small">
                                            <i style="width: 16px; height: 16px;" data-feather="share-2"></i> Share |
                                            <i style="width: 16px; height: 16px;" data-feather="eye"></i> <?php echo get_post_meta(get_the_ID(), 'post_views_count', true) ?: 0; ?> views
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php
            endif;
        endforeach;
        ?>
        <!-- Get posts for this category -->
    </section>
</main>

<?php
get_footer();
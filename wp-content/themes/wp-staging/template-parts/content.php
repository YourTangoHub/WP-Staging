<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-staging
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('my-5'); ?>>

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">

                <!-- Title -->
                <h1 class="mb-3"><?php the_title(); ?></h1>

                <!-- Meta Info -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="text-muted small">
                        <?php
                        $category = get_the_category();
                        $cat_name = !empty($category) ? $category[0]->name : 'Uncategorized';

                        echo '<span class="badge bg-secondary me-2">' . esc_html($cat_name) . '</span>';

                        echo 'By ' . get_the_author() . ' | ';
                        echo 'Updated ' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
                        ?>
                    </div>
                    <div class="text-muted small">
                        <?php
                        $content_words = str_word_count(strip_tags(get_the_content()));
                        $read_time = ceil($content_words / 200);
                        ?>
                        <i style="width: 16px; height: 16px;" data-feather="clock"></i> <?php echo $read_time; ?> min read &nbsp; <i style="width: 16px; height: 16px;" data-feather="share-2"></i> Share | <i style="width: 16px; height: 16px;" data-feather="eye"></i> <?php echo get_post_meta(get_the_ID(), 'post_views_count', true) ?: 0; ?> views
                    </div>
                </div>

                <!-- Featured Image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>"
                         class="img-fluid object-fit-cover mb-4"
                         alt="<?php the_title(); ?>"
                         width="1000"
                         height="500"
                         style="width: 100%; height: auto;">
                <?php endif; ?>

                <!-- Post Content -->
                <div class="entry-content">
                    <?php the_content(); ?>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'wp-staging'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <!-- Tags / Footer -->
                <footer class="entry-footer mt-4">
                    <?php the_tags('<span class="badge bg-light text-dark me-1">', '</span><span class="badge bg-light text-dark me-1">', '</span>'); ?>
                </footer>

            </div>
        </div>
    </div>

</article>


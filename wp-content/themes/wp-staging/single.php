<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp-staging
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'wp-staging' ) . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'wp-staging' ) . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;



		endwhile; // End of the loop.
		?>

		<?php
// Get current post categories
$current_categories = get_the_category();

if ( !empty( $current_categories ) ) :
    foreach ( $current_categories as $category ) :
        $related_posts = new WP_Query( array(
            'cat'            => $category->term_id,
            'post__not_in'   => array( get_the_ID() ), // Exclude current post
            'posts_per_page' => 3,
            'post_status'    => 'publish',
        ) );

        if ( $related_posts->have_posts() ) :
?>
        <div class="container my-5">
            <h4 class="mb-4">More from "<?php echo esc_html( $category->name ); ?>"</h4>
            <div class="row">
                <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url( 'medium' ); ?>"
                                         class="card-img-top object-fit-cover"
                                         width="400"
                                         height="250"
                                         alt="<?php the_title(); ?>">
                                </a>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>
                                <p class="text-muted small mb-2">
                                    By <?php the_author(); ?> |
                                    Updated <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> ago
                                </p>
                                <p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
<?php
        endif;
    endforeach;
endif;
?>


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

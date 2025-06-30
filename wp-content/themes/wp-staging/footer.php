<?php
/**
 * The template for displaying the footer
 *
 * @package wp-staging
 */
?>

<footer id="colophon" class="site-footer bg-white text-dark pt-5 border-top">
    <div class="container">
        <div class="row">

            <!-- Column 1: Logo, Description, Social -->
            <div class="col-md-4 mb-4">
                <div class="mb-3">
                    <?php
                    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . esc_url( home_url() ) . '" class="navbar-brand h4 text-dark text-decoration-none">' . get_bloginfo( 'name' ) . '</a>';
                    }
                    ?>
                </div>
                <p class="small text-muted">
                    Welcome to our blog where we share ideas, stories, tutorials, and insights.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="text-dark"><i data-feather="facebook"></i></a>
                    <a href="#" class="text-dark"><i data-feather="twitter"></i></a>
                    <a href="#" class="text-dark"><i data-feather="instagram"></i></a>
                    <a href="#" class="text-dark"><i data-feather="linkedin"></i></a>
                </div>
            </div>

            <!-- Column 2: Dynamic Quick Links -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Quick Links</h5>
                <?php
				$locations = get_nav_menu_locations();

				if ( isset( $locations['menu-1'] ) ) {
				    $menu_id   = $locations['menu-1'];
				    $menu_obj  = wp_get_nav_menu_object( $menu_id );
				    $menu_name = $menu_obj ? $menu_obj->name : '';

				    wp_nav_menu( array(
				        'theme_location' => 'menu-1',
				        'menu_class'     => 'list-unstyled',
				        'container'      => false,
				        'walker'         => new class extends Walker_Nav_Menu {
				            function start_lvl( &$output, $depth = 0, $args = null ) {}
				            function end_lvl( &$output, $depth = 0, $args = null ) {}
				            function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
				                $output .= '<li class="mb-2"><a class="text-dark text-decoration-none" href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a></li>';
				            }
				            function end_el( &$output, $item, $depth = 0, $args = null ) {}
				        },
				    ) );

				} else {
				    echo '<p class="small text-muted">Assign a menu to the "Primary" (menu-1) location in Appearance > Menus.</p>';
				}
				?>
            </div>

            <!-- Column 3: Recent Posts -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Recent Posts</h5>
                <ul class="list-unstyled">
                    <?php
                    $recent_posts = wp_get_recent_posts( array(
                        'numberposts' => 3,
                        'post_status' => 'publish',
                    ) );
                    foreach ( $recent_posts as $post ) :
                        ?>
                        <li class="mb-2">
                            <a href="<?php echo get_permalink( $post['ID'] ); ?>" class="text-dark text-decoration-none">
                                <?php echo esc_html( $post['post_title'] ); ?>
                            </a><br>
                            <small class="text-muted"><?php echo get_the_date( '', $post['ID'] ); ?></small>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            </div>

        </div>

        <!-- Bottom -->
        <div class="text-center py-3 mt-3 border-top small text-muted">
            &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Template Name: Blog Full Width
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eplano
 */


get_header(); ?>

<?php get_template_part('header/blog'); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div id="csi-page-wrapper" class="csi-page-wrapper">
                <div class="container">
                    <div class="blog-area">
                        <div class="csi-card-wrapper">
                            <div class="csi-col-width">
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                query_posts(array( 'post_type'=> 'post','paged' => $paged ));
                                if ( have_posts() ) :
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post();
                                        /*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
                                        get_template_part( 'template-parts/post-loop/content', get_post_format() );
                                    endwhile;
                                    ?>

                                <?php
                                else :
                                    get_template_part( 'template-parts/post-loop/content', 'none' );
                                endif;  ?>
                            </div>

                            <div class="csi-pagination clearfix">
                                <?php eplano_pagination(); wp_reset_query(); ?>
                            </div>

                        </div>

                    </div><!-- //. Area  -->
                </div>
            </div>
        </main>
    </div>

<?php get_footer();
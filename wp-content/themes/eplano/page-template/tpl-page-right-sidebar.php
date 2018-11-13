<?php
/**
 * Template Name: Page Right Sidebar
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

$eplano_pag_sidbr = get_post_meta(get_the_ID(),'__lgx__page_sidebar',true);

get_header(); ?>

<?php get_template_part('header/blog'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div id="csi-page-wrapper" class="csi-page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content','page');

                            // If comments are open or we have at least one comment, load up the comment template.

                        endwhile; // End of the loop.
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <!-- Start: Sidebar -->
                        <?php get_sidebar(); ?>
                        <!-- End: Sidebar -->
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<?php get_footer();
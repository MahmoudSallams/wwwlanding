<?php
/**
 * Template Name: Coming Soon
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


get_header('alternative'); ?>



<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div id="csi-page-coming-soon" class="csi-home-coming-soon">
            <div class="container">
                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content','page');

                    // If comments are open or we have at least one comment, load up the comment template.

                endwhile; // End of the loop.
                ?>

            </div>
        </div>
    </main>
</div>

<?php get_footer('alternative');
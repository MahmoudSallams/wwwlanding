
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

<?php get_footer();
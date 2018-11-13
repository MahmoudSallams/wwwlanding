<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Eplano
 */

get_header(); ?>
<?php get_template_part('header/post-banner'); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div id="csi-post-wrapper" class="csi-post-wrapper csi-single-item">
                <div class="container">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'post-format/content-single', 'speaker'  );

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();

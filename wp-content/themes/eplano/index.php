<?php

$eplano_opt = new LgxFrameworkOpt();
$eplano_blogbar = $eplano_opt->eplano_blogSidebar();

get_header();

?>

<?php get_template_part('header/blog'); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" >

            <div class="csi-inner csi-page-wrapper">

                <div class="container">
                    <div class="blog-area">
                        <div class="row">


                            <div class="col-sm-12">
                                <div class="csi-card-wrapper">
                                    <div class="csi-col-width">
                                        <?php
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
                                        endif; ?>
                                    </div>
                                </div>

                                <div class="csi-pagination clearfix">
                                    <?php eplano_pagination(); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- //.CONTAINER -->


            </div><!-- //.INNER -->



        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();     ?>


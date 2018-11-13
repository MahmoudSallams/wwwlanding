<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eplano
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('csi-single-post'); ?>>
    <header>

        <div class="text-area">

            <?php $lgx_gallery_items = get_post_meta(get_the_ID(),'__vcx__post-format-gallery',true); ?>

            <?php if(!empty($lgx_gallery_items)): ?>
                <div class="csx-featured-wrap csx-post-gallery">
                    <div class="slider-container">
                        <div class="slider">
                            <?php foreach ( (array) $lgx_gallery_items as $attachment_id => $attachment_url ) { ?>
                                <div class="slider__item">
                                    <img src="<?php echo esc_url($attachment_url); ?>" alt="<?php esc_attr_e('lgx gallery','eplano'); ?>">
                                </div>
                            <?php } ?>

                        </div>
                        <div class="slider__switch slider__switch--prev" data-ikslider-dir="prev">
                            <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.89 17.418c.27.272.27.71 0 .98s-.7.27-.968 0l-7.83-7.91c-.268-.27-.268-.706 0-.978l7.83-7.908c.268-.27.7-.27.97 0s.267.71 0 .98L6.75 10l7.14 7.418z"/></svg></span>
                        </div>
                        <div class="slider__switch slider__switch--next" data-ikslider-dir="next">
                            <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.25 10L6.11 2.58c-.27-.27-.27-.707 0-.98.267-.27.7-.27.968 0l7.83 7.91c.268.27.268.708 0 .978l-7.83 7.908c-.268.27-.7.27-.97 0s-.267-.707 0-.98L13.25 10z"/></svg></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <h1 class="title"><?php the_title(); ?></h1>
            <div class="hits-area">
                <div class="date">
                    <a href="javascript:void(0)"><i class="fa fa-user"></i> <?php the_author(); ?></a>
                    <?php
                    $catList = get_the_category_list(', ');
                    echo (!empty($catList) ? '<a href="javascript:void(0)"><i class="fa fa-folder" aria-hidden="true"></i>'.$catList.'</a>' : '' );
                    ?>
                    <a href="javascript:void(0)"><i class="fa fa-calendar"></i> <?php echo date_i18n(get_option('date_format'), false, false);; ?></a>
                    <a href="javascript:void(0)"><i class="fa fa-comment"></i>
                        <?php comments_popup_link(
                            esc_html__( 'No Comment', 'eplano' ),
                            esc_html__( '1 Comment', 'eplano' ),
                            esc_html__( '% Comments', 'eplano' ),
                           '',
                            esc_html__( 'Comments Closed', 'eplano' )
                        ); ?>
                    </a>
                </div>
            </div>
        </div>

    </header>

    <section>
        <?php the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'eplano' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ) );

        global $numpages;
        if ( is_singular() && $numpages > 1 ) {
            if ( is_singular( 'attachment' ) ) {
                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'eplano' ),
                ) );
            } elseif ( is_singular( 'post' ) ) {
                // Previous/next post navigation.
                the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'eplano' ) . '</span> ' .
                        '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'eplano' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'eplano' ) . '</span> ' .
                        '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'eplano' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                ) );
            }
        }
        ?>
    </section>

    <footer>
        <?php do_action("eplano_single_post_footer");  ?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>
    </footer>

</article>


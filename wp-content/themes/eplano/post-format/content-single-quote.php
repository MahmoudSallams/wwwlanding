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

            <?php $csx_post_quote = esc_html(get_post_meta(get_the_ID(),'__vcx__post-format-quote',true)); ?>
            <?php $csx_post_quote_author = esc_html(get_post_meta(get_the_ID(),'__vcx__post-format-quote-author',true)); ?>

            <?php if(!empty($csx_post_quote)): ?>
                <div class="csx-featured-wrap csx-post-quote">
                    <blockquote>
                        <p><?php echo esc_html($csx_post_quote); ?></p>

                        <?php if(!empty($csx_post_quote_author)): ?>

                        <footer><?php echo esc_html($csx_post_quote_author); ?></footer>

                        <?php endif; ?>

                    </blockquote>
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


<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eplano
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('csi-post-list'); ?>>

    <div class="single-news single-news-list csi-single-card csi-single-news">

        <?php $csx_post_video = get_post_meta(get_the_ID(),'__vcx__post-format-video',true);  ?>

        <?php if(!empty($csx_post_video)): ?>
            <div class="csx-featured-wrap csx-post-video">

                <?php echo balanceTags(wp_kses_post($csx_post_video)); ?>

            </div>
        <?php endif; ?>

        <div class="news-content">
            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php   if ( is_sticky() ) {
                printf( '<span class="featured-post">%s</span>', esc_html__( 'Featured', 'eplano' ) );
            } ?>

            <?php the_excerpt(); ?>
            <a class="readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More ...', 'eplano'); ?> </a>
        </div>

    </div>
</article>

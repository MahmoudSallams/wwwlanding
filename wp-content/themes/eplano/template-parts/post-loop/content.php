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

        <figure>
            <?php if ( has_post_thumbnail() ) :  $no_image_class = 'vcx-image-date'; ?>
                <div class="csx-featured-wrap csx-post-img">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('eplano-blog'); ?>
                    </a>
                </div>
            <?php else: $no_image_class = 'vcx-no-image-date'; ?>

            <?php endif; ?>

            <figcaption class="<?php echo esc_attr($no_image_class); ?>">
                <h4 class="date">
                    <?php echo date_i18n(get_option('date_format'), false, false); ?>
                </h4>
            </figcaption>
        </figure>

        <div class="news-content">
            <div class="news-info">
                <h4 class="csi-post-author"><?php the_author(); ?></h4>
                <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <a class="csi-btn csi-btn-sm csi-btn-white" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'eplano') ?></a>
            </div>
            <?php  if ( is_sticky() ) {
                printf( '<span class="featured-post">%s</span>', esc_html__( 'Featured', 'eplano' ) );
            }; ?>
        </div>
    </div>

</article>
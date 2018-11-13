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

        <?php if(has_post_thumbnail()): ?>
        <div class="csx-featured-wrap csx-post-img">
            <figure>

                <?php the_post_thumbnail('eplano-blog'); ?>

                <?php // echo get_the_post_thumbnail(get_the_ID(), 'eplano-thumbnails'); ?>

            </figure>
        </div>
        <?php endif; ?>

        <?php

        $speaker_id = get_the_ID();

        if(!empty($speaker_id)) {
            $spekears_designation   = get_post_meta($speaker_id,'__vcx__speaker-designation',true);
            $spekears_facebook      = get_post_meta($speaker_id,'__vcx__speaker-facebook',true);
            $spekears_twitter       = get_post_meta($speaker_id,'__vcx__speaker-twitter',true);
            $spekears_instagram     = get_post_meta($speaker_id,'__vcx__speaker-instagram',true);
            $spekears_linkedin      = get_post_meta($speaker_id,'__vcx__speaker-linkedin',true);
            $spekears_vimeo         = get_post_meta($speaker_id,'__vcx__speaker-vimeo',true);
            $spekears_behance       = get_post_meta($speaker_id,'__vcx__speaker-behance',true);
            $spekears_dribbble      = get_post_meta($speaker_id,'__vcx__speaker-dribbble',true);

        }

        ?>



        <div class="text-area">
            <h1 class="title"><?php the_title(); ?></h1>

            <h3 class="subtitle">  <?php echo esc_html($spekears_designation); ?> </h3>

            <ul class="list-inline csi-social">
                <?php echo (!empty($spekears_facebook) ?  '<li><a class="sp-fb" href="'.esc_url($spekears_facebook).'"><i class="fa fa-facebook"></i></a></li>' : ''); ?>
                <?php echo (!empty($spekears_twitter) ?  '<li><a class="sp-tw" href="'.esc_url($spekears_twitter).'"><i class="fa fa-twitter"></i></a></li>' : ''); ?>
                <?php echo (!empty($spekears_instagram) ? '<li><a class="sp-insta" href="'.esc_url($spekears_instagram).'"><i class="fa fa-instagram"></i></a></li>' : ''); ?>
                <?php echo (!empty($spekears_linkedin) ?  '<li><a class="sp-in" href="'.esc_url($spekears_linkedin).'"><i class="fa fa-linkedin"></i></a></li>' : ''); ?>
                <?php echo (!empty($spekears_vimeo) ?  '<li><a class="sp-vm" href="'.esc_url($spekears_vimeo).'"><i class="fa fa-vimeo"></i></a></li>' : ''); ?>
                <?php echo (!empty($spekears_behance) ?  '<li><a class="sp-be" href="'.esc_url($spekears_behance).'"><i class="fa fa-behance"></i></a></li>' : ''); ?>
                <?php echo (!empty($spekears_dribbble) ?  '<li><a class="sp-dr" href="'.esc_url($spekears_dribbble).'"><i class="fa fa-dribbble"></i></a></li>' : ''); ?>
            </ul>

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

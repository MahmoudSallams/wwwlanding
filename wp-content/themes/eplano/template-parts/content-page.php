<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eplano
 */

?>

<article id="post-<?php the_ID(); ?>" >

        <?php eplano_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content(); 
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'eplano' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'eplano' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) ); 
		?>
		<footer>
			<?php 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
             ?>
		</footer>	
	</div><!-- .entry-content --> 
</article><!-- #post-## -->

<?php
/**
 * Created by PhpStorm.
 * User: httpcoder
 * Time: 1:18 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/************************************************************************
 * //  Custom Excerpt
 *************************************************************************/

function eplano_excerpt($count){
	//$permalink = get_permalink($postid);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	//$excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
	return $excerpt;
}

/************************************************************************
 * //Custom Excerpt End
 *************************************************************************/


/**=====================================================================
 * wp event point Pagination
 =====================================================================*/

if ( ! function_exists( 'eplano_pagination' ) ){


    function eplano_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $GLOBALS['wp_query']->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 3,
    		'show_all'  => False,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
			'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			'type'      => 'list',
            'before_page_number' => '<b>',
            'after_page_number' => '</b>'
		) );

		if ( $links ) :
		 printf(esc_html__('%s','eplano'),$links);
		endif;
	}
}


/**=====================================================================
 * wp event post views
 =====================================================================*/
function eplano_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);


    if($count==0) {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }else{
    	return $count;
    }
}
function eplano_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/**=====================================================================
 * Comment form field order change
=====================================================================*/

add_action( 'comment_form_after_fields', 'eplano_form_order_textarea' );
add_action( 'comment_form_logged_in_after', 'eplano_form_order_textarea' );

function eplano_form_order_textarea()
{
    echo '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . esc_attr__( "Enter Comment Here...", "eplano" ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
}

/**=====================================================================
 *  Comment args change
=====================================================================*/

add_filter( 'comment_form_defaults', 'eplano_comment_form_allowed_tags' );
function eplano_comment_form_allowed_tags( $defaults ) {      $defaults['comment_field'] = '';
	$defaults['label_submit'] =  esc_html__( 'Submit','eplano' );
	return $defaults;

}

/**=====================================================================
 *  BreadCrumb
=====================================================================*/
function eplano_breadcrumb(){

	global $post,$eplano;

	if(isset($eplano['blog-title'])){
		$eplano_blog_title=  $eplano['blog-title'];
	}else{
		$eplano_blog_title=  esc_html__('Blog','eplano');
	}

	if(is_front_page() && is_home()){
		echo esc_html($eplano_blog_title);

	}elseif(is_home() || is_page()){
		if(is_page()){
		    if(''!=get_post_meta($post->ID,'__lgx__page_banner_title',true)){
		        $eplano_ptitle = get_post_meta($post->ID,'__lgx__page_banner_title',true);
			}else{
				$eplano_ptitle =  get_the_title();
			}
		}else{
			$eplano_ptitle =  $eplano_blog_title;

		}
	  printf( esc_html__('%s','eplano'),$eplano_ptitle);

	}elseif(is_single()){
		if(isset($eplano['single-title']) && (''!=$eplano['single-title'])){
			printf(  $eplano['single-title'] );
		}else{
			the_title();
		}
	}elseif(is_search()){
		if(isset($eplano['srch-title']) && (''!=$eplano['srch-title'])){
			printf( $eplano['srch-title'] );
		}else{
			printf( get_search_query()  );
		}
	}elseif(is_category() || is_tag()) {
		if(isset($eplano['archv-title']) && (''!=$eplano['archv-title'])){
			printf(esc_html__('%s','eplano'),$eplano['archv-title']);
		}else{
			single_cat_title("", true);
		}
	}elseif(is_archive()){

 		if ( class_exists('WooCommerce' ) ){
 			if(is_shop() || is_product_category() || is_product_tag() ){
	 			if(isset($eplano['shop-title']) && (''!=$eplano['shop-title'])){
					printf($eplano['shop-title']);
				}else{
	 				woocommerce_page_title();
	 			}
 			}else{ echo get_the_date('F Y'); }
 		}else{
 			if(isset($eplano['archv-title']) && (''!=$eplano['archv-title'])){
				printf($eplano['archv-title']);
			}else{
 				echo get_the_date('F Y');
 			}
		}
	}elseif(is_404()){ esc_html_e('404 Error','eplano');}
	else{ the_title();}
}



/**=====================================================================
 *  Menu Function
=====================================================================*/
function eplano_main_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'mainmenu',
		'depth'             => 4,
		'container'         => false,
		'menu_id'        	=> 'csi-nav',
		'menu_class'        => 'nav navbar-nav csi-nav',
		'fallback_cb'       => 'eplano_menu',
		'walker'			=> new eplano_navwalker()
	));
}

/**=====================================================================
 *  Fall back Menu Function
=====================================================================*/
if(is_user_logged_in()):
	function eplano_menu() {
		?>
	    <ul class="nav navbar-nav csi-nav">
	    	<li><a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e( 'Add Menu', 'eplano' ); ?></a></li>
		</ul>
		<?php
	}
endif;

/**=====================================================================
 *  User Custom Field
=====================================================================*/
add_action( 'show_user_profile', 'eplano_extra_profile_fields' );
add_action( 'edit_user_profile', 'eplano_extra_profile_fields' );

function eplano_extra_profile_fields( $user ) { ?>

	<h3><?php esc_html_e('Extra profile information','eplano'); ?></h3>

	<table class="form-table">

		<tr>
			<th><label for="user_position"><?php esc_html_e('Position','eplano'); ?></label></th>

			<td>
				<input type="text" name="user_position" id="user_position" value="<?php echo esc_attr( get_the_author_meta( 'user_position', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php esc_html_e('Please enter your position here.','eplano'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="company_name"><?php esc_html_e('Company Name','eplano'); ?></label></th>

			<td>
				<input type="text" name="company_name" id="company_name" value="<?php echo esc_attr( get_the_author_meta( 'company_name', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php esc_html_e('Please enter your company name here.','eplano'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="company_url"><?php esc_html_e('Company Url','eplano'); ?></label></th>

			<td>
				<input type="text" name="company_url" id="company_url" value="<?php echo esc_attr( get_the_author_meta( 'company_url', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php esc_html_e('Please enter your company url here.','eplano'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="follows_url"><?php esc_html_e('Follow','eplano'); ?></label></th>

			<td>
				<input type="text" name="follows_url" id="follows_url" value="<?php echo esc_attr( get_the_author_meta( 'follows_url', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php esc_html_e('Please enter your social url here.','eplano'); ?></span>
			</td>
		</tr>

	</table>
<?php }


/**=====================================================================
 *  User Custom Field Data SAve
=====================================================================*/
add_action( 'personal_options_update', 'eplano_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'eplano_save_extra_profile_fields' );

function eplano_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'user_position', $_POST['user_position'] );
	update_user_meta( $user_id, 'company_name', $_POST['company_name'] );
	update_user_meta( $user_id, 'company_url', $_POST['company_url'] );
	update_user_meta( $user_id, 'follows_url', $_POST['follows_url'] );
}

/**=====================================================================
 *  hexa to rgb color converter
=====================================================================*/
function eplano_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec($hex[0].$hex[0]);
      $g = hexdec($hex[1].$hex[1]);
      $b = hexdec($hex[2].$hex[2]);
   } else {
      $r = hexdec($hex[0].$hex[1]);
      $g = hexdec($hex[2].$hex[3]);
      $b = hexdec($hex[4].$hex[5]);
   }
   return implode(', ',array($r, $g, $b));
}


/**=====================================================================
 *  body class added
=====================================================================*/

add_filter( 'body_class', 'eplano_custom_class' );

function eplano_custom_class( $classes ) {
    if (  is_home() ) {
        $classes[] = 'page page-template';
    }
    return $classes;
}


// remove empty p tag
add_filter( 'the_content', 'eplano_remove_ptag' );
function eplano_remove_ptag( $content ) {
    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );
}



function eplano_update_comment_fields_placeholder( $fields ) {

    $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );
    $label     = $req ? '*' : ' ' . __( '(optional)', 'eplano' );
    $aria_req  = $req ? "aria-required='true'" : '';

    $fields['author'] =
        '<p class="comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Your Name", "eplano" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30" ' . $aria_req . ' />
		</p>';

    $fields['email'] =
        '<p class="comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Your Email", "eplano" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
        '" size="30" ' . $aria_req . ' />
		</p>';

    $fields['url'] =
        '<p class="comment-form-url">
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "Website", "eplano" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30" />
			</p>';

    return $fields;
}
add_filter( 'comment_form_default_fields', 'eplano_update_comment_fields_placeholder' );
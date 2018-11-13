<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php global $eplano_options; ?>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) : ?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon"/>
    <?php endif; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php

$eplano_logo = '';

$eplano_opt = new LgxFrameworkOpt();
$eplano_logo = $eplano_opt->eplano_logo();

$eplano_addcls_header = '';
if ( is_user_logged_in() ) {
    $eplano_addcls_header = 'hdrtop';
}

// Menu Variations Control

$eplano_menu_style = get_post_meta(get_the_ID(),'__vcx__menu_style',true);
$eplano_menu_style = ( !empty($eplano_menu_style) ? $eplano_menu_style : 'default');

$eplano_menu_width = get_post_meta(get_the_ID(),'__vcx__menu_width',true);
$eplano_menu_width = ( !empty($eplano_menu_width) ? $eplano_menu_width : 'container');


?>

<!-- Pre Loader -->
<?php if(isset($eplano_options['pre_loader_en']) && $eplano_options['pre_loader_en']==1):  ?>
    <div id="vcx-preloader"></div>
<?php endif;  ?>


<div id="csipage" class="csisite csi-page-christmas">

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eplano' ); ?></a>

    <header>
        <div id="csi-header" class="csi-header csi-banner-header csi-header-christmas">
            <div id="csi-header-bottom" class="csi-header-bottom <?php echo esc_attr($eplano_addcls_header); ?> csi-header-bottom-<?php echo esc_attr($eplano_menu_style);?>">
                <div class="<?php echo esc_attr($eplano_menu_width);?>">
                    <div class="row">
                        <div class="col-xs-12">
                            <nav class="navbar navbar-default csi-navbar">
                                <div class="csicontainer">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                data-target=".navbar-collapse">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <div class="csi-logo">
                                            <a href="<?php echo esc_url(home_url('/')); ?>" class="csi-scroll">
                                                <img src="<?php echo esc_url($eplano_logo); ?>" alt="<?php esc_attr(bloginfo()); ?>"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse navbar-collapse">
                                        <?php eplano_main_menu(); ?>
                                    </div><!--/.nav-collapse -->
                                </div>
                            </nav>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div>
        </div>
    </header>

    <div id="content" class="site-content site-content-christmas">
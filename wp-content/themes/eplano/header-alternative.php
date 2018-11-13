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

<!-- Pre Loader -->
<?php if(isset($eplano_options['pre_loader_en']) && $eplano_options['pre_loader_en']==1):  ?>
    <div id="vcx-preloaderw"></div>
<?php endif;  ?>


<div id="page" class="site">

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eplano' ); ?></a>

    <div id="content" class="site-content">
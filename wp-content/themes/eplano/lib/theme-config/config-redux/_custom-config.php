<?phpif ( ! class_exists( 'Redux' ) ) {    return;}// This is your option name where all the Redux data is stored.$opt_name = 'eplano_options';$theme = wp_get_theme(); // For use with some settings. Not necessary.$args = array(    // TYPICAL -> Change these values as you need/desire    'opt_name'             => $opt_name,    // This is where your data is stored in the database and also becomes your global variable name.    'display_name'         => $theme->get( 'Name' ),    // Name that appears at the top of your panel    'display_version'      => $theme->get( 'Version' ),    // Version that appears at the top of your panel    'menu_type'            => 'menu',    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)    'allow_sub_menu'       => true,    // Show the sections below the admin menu item or not    'menu_title'           => esc_html__( 'Theme Options', 'eplano' ),    'page_title'           => esc_html__( 'Theme Options', 'eplano' ),    // You will need to generate a Google API key to use this feature.    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth    'google_api_key'       => 'AIzaSyDkzIagGU2T5IzTG3sfgCIeU0EAIl-VQCk',    // Set it you want google fonts to update weekly. A google_api_key value is required.    'google_update_weekly' => false,    // Must be defined to add google fonts to the typography module    'async_typography'     => true,    // Use a asynchronous font on the front end or font string    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader    'admin_bar'            => true,    // Show the panel pages on the admin bar    'admin_bar_icon'       => 'dashicons-portfolio',    // Choose an icon for the admin bar menu    'admin_bar_priority'   => 50,    // Choose an priority for the admin bar menu    'global_variable'      => '',    // Set a different name for your global variable other than the opt_name    'dev_mode'             => true,    // Show the time the page took to load, etc    'update_notice'        => true,    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo    'customizer'           => true,    // Enable basic customizer support    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field    // OPTIONAL -> Give you extra features    'page_priority'        => null,    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.    'page_parent'          => 'themes.php',    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters    'page_permissions'     => 'manage_options',    // Permissions needed to access the options panel.    'menu_icon'          => get_template_directory_uri() . '/assets/images/icon-opt.png',    // Specify a custom URL to an icon    'last_tab'             => '',    // Force your panel to always open to a specific tab (by id)    'page_icon'            => 'icon-themes',    // Icon displayed in the admin panel next to your menu_title    'page_slug'            => 'event_options',    // Page slug used to denote the panel    'save_defaults'        => true,    // On load save the defaults to DB before user clicks save or not    'default_show'         => false,    // If true, shows the default value next to each field that is not the default value.    'default_mark'         => '',    // What to print by the field's title if the value shown is default. Suggested: *    'show_import_export'   => true,    // Shows the Import/Export panel when not used as a field.    // CAREFUL -> These options are for advanced use only    'transient_time'       => 60 * MINUTE_IN_SECONDS,    'output'               => true,    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output    'output_tag'           => true,    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.    'database'             => '',    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!    'use_cdn'              => true,    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.    //'compiler'             => true,);$args['share_icons'][] = array(    'url'   => esc_url('http://themeforest.net/user/httpcoder/'),    'title' => 'Visit Our Live Demo',    'icon'  => 'el el-screen');$args['share_icons'][] = array(    'url'   => esc_url('http://themeforest.net/user/httpcoder'),    'title' => 'Buy Now',    'icon'  => 'el el-download-alt');$args['share_icons'][] = array(    'url'   => esc_url('http://httpcoder.com/demo/wordpress/eplano/doc'),    'title' => 'Live Doc',    'icon'  => 'el el-list-alt');$args['share_icons'][] = array(    'url'   => esc_url('http://httpcoder.com/'),    'title' => 'Support',    'icon'  => 'el el-question-sign');// Panel Intro text -> before the formif ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {    if ( ! empty( $args['global_variable'] ) ) {        $v = $args['global_variable'];    } else {        $v = str_replace( '-', '_', $args['opt_name'] );    }    //$args['intro_text'] = sprintf( esc_html__( '', 'eplano' ), $v );    $args['intro_text'] = '';} else {    //$args['intro_text'] = esc_html__( '', 'eplano' );    $args['intro_text'] = '';}// Add content after the form.//$args['footer_text'] = esc_html__( '', 'eplano' );=$args['footer_text'] = '';Redux::setArgs( $opt_name, $args );/* * ---> END ARGUMENTS *//* * ---> START HELP TABS */$tabs = array(    array(        'id'      => 'redux-help-tab-1',        'title'   => esc_html__( 'Theme Information 1', 'eplano' ),        'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'eplano' )    ),    array(        'id'      => 'redux-help-tab-2',        'title'   => esc_html__( 'Theme Information 2', 'eplano' ),        'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'eplano' )    ));Redux::setHelpTab( $opt_name, $tabs );// Set the help sidebar$content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'eplano' );Redux::setHelpSidebar( $opt_name, $content );// -> START Basic FieldsRedux::setSection( $opt_name, array(    'title'      => esc_html__( 'General Setting', 'eplano' ),    'id'         => 'general-settings',    'icon'      => 'el el-cog',    'icon_class' => 'el-icon-large',    'fields'     => array(        array(            'id'       => 'logo-up',            'type'     => 'media',            'compiler' => true,            'title'    => esc_html__( 'Upload Logo', 'eplano' ),            'desc'    => esc_html__( 'Best Size is (115 X 38) px', 'eplano' ),        ),        array(            'id'       => 'logo-width',            'type'     => 'text',            'title'    => esc_html__( 'Logo Width', 'eplano' ),            'desc'    => esc_html__( 'Put a numeric value with px. Such As: 190px ', 'eplano' ),            'default'    => '190px'        ),        array(            'id'       => 'custom_color_en',            'type'     => 'button_set',            'title'    => __('Use Custom Brand and Button Color', 'eplano'),            'options' => array(                '1' => 'Yes',                '0' => 'No'            ),            'default' => '0'        ),        array(            'id'       => 'color-opt',            'type'     => 'color',            'title'    => esc_html__( 'Brand Color', 'eplano' ),            'desc'    => esc_html__( 'Select a color you like for your theme..', 'eplano' ),        ),        array(            'id'       => 'btncolor-opt',            'type'     => 'color',            'title'    => esc_html__( 'Brand Button Color', 'eplano' ),            'desc'    => esc_html__( 'Select a color you like for your theme..', 'eplano' ),        ),        array(            'id'       => 'page-header-opt',            'type'     => 'color',            'title'    => esc_html__( 'Page Header Color', 'eplano' ),            'desc'    => esc_html__( 'Select a color you like for your theme..', 'eplano' ),        ),        array(            'id'       => 'pre_loader_en',            'type'     => 'button_set',            'title'    => __('Show Loader Icon', 'eplano'),            'options' => array(                '1' => 'Yes',                '0' => 'No'            ),            'default' => '1'        ),        array(            'id'       => 'breadcrumb_en',            'type'     => 'button_set',            'title'    => __('Show Breadcrumb', 'eplano'),            'options' => array(                '1' => 'Yes',                '0' => 'No'            ),            'default' => '1'        ),        array(            'id'       => 'pre_loader_img',            'type'     => 'media',            'compiler' => true,            'title'    => esc_html__( 'Upload Pre Loader Image', 'eplano' ),            'desc'    => esc_html__( 'Best Size is (150 X 150) px', 'eplano' ),        ),        array(            'id'       => 'pre_loader_width',            'type'     => 'text',            'title'    => esc_html__( 'Loader Image Width', 'eplano' ),            'desc'    => esc_html__( 'Put a numeric value with px. Such As: 150px ', 'eplano' ),            'default'    => '150px'        ),        array(            'id'       => 'custom_css',            'type'     => 'ace_editor',            'title'    => esc_html__('Custom CSS', 'eplano'),            'subtitle' => esc_html__('Paste your CSS code here.', 'eplano'),            'mode'     => 'css',            'theme'    => 'monokai',            'default'  => "#example{\n  margin: 0 auto;\n}"        ),    ),) );Redux::setSection( $opt_name, array(    'icon'      => 'el-icon-font',    'icon_class' => 'el-icon-large',    'title'     => __('Typography', 'eplano'),    'fields'    => array(        array(            'id'            => 'body-font',            'type'          => 'typography',            'title'         => __('Body Font', 'eplano'),            'compiler'      => false,  // Use if you want to hook in your own CSS compiler            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key            'font-backup'   => false,    // Select a backup non-google font in addition to a google font            'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare            'subsets'       => true, // Only appears if google is true and subsets not set to false            //'font-size'     => ture,            // 'text-align'    => false,            'line-height'   => false,            'word-spacing'  => false,  // Defaults to false            'letter-spacing'=> false,  // Defaults to false            'color'         => true,            'preview'       => true, // Disable the previewer            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page            'output'        =>array('body'),            'units'         => 'rem', // Defaults to px            'subtitle'      => __('Select your website Body Font', 'eplano'),            'default'       => array(                'color'         => '#272338',                'font-weight'    => '400',                'font-family'   => 'Poppins',                'google'        => true,                'font-size'     => '1.6'),        ),        array(            'id'            => 'vcx_title_h13',            'type'          => 'typography',            'title'         => __('Headings Font h1', 'eplano'),            'compiler'      => false,  // Use if you want to hook in your own CSS compiler            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key            'font-backup'   => false,    // Select a backup non-google font in addition to a google font            'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare            'subsets'       => true, // Only appears if google is true and subsets not set to false            'font-size'     => true,            // 'text-align'    => false,            'line-height'   => false,            'word-spacing'  => false,  // Defaults to false            'letter-spacing'=> false,  // Defaults to false            'color'         => true,            'preview'       => true, // Disable the previewer            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page            'output'        =>array('h1'),            'units'         => 'rem', // Defaults to px            'subtitle'      => __('Select your website Headings Font', 'eplano'),            'default'       => array(                'color'         => '#272338',                'font-weight'    => '700',                'font-family'   => 'Oswald',                'google'        => true,                'font-size'     => '6.8'),        ),        array(            'id'            => 'vcx_title_h2',            'type'          => 'typography',            'title'         => __('Headings Font h2', 'eplano'),            'compiler'      => false,  // Use if you want to hook in your own CSS compiler            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key            'font-backup'   => false,    // Select a backup non-google font in addition to a google font            'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare            'subsets'       => true, // Only appears if google is true and subsets not set to false            'font-size'     => true,            // 'text-align'    => false,            'line-height'   => false,            'word-spacing'  => false,  // Defaults to false            'letter-spacing'=> false,  // Defaults to false            'color'         => true,            'preview'       => true, // Disable the previewer            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page            'output'        =>array('h2'),            'units'         => 'rem', // Defaults to px            'subtitle'      => __('Select your website Headings Font', 'eplano'),            'default'       => array(                'color'         => '#272338',                'font-weight'    => '500',                'font-family'   => 'Oswald',                'google'        => true,                'font-size'     => '4.2'),        ),        array(            'id'            => 'vcx_title_h3',            'type'          => 'typography',            'title'         => __('Headings Font h3', 'eplano'),            'compiler'      => false,  // Use if you want to hook in your own CSS compiler            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key            'font-backup'   => false,    // Select a backup non-google font in addition to a google font            'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare            'subsets'       => true, // Only appears if google is true and subsets not set to false            'font-size'     => true,            // 'text-align'    => false,            'line-height'   => false,            'word-spacing'  => false,  // Defaults to false            'letter-spacing'=> false,  // Defaults to false            'color'         => true,            'preview'       => true, // Disable the previewer            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page            'output'        =>array('h3'),            'units'         => 'rem', // Defaults to px            'subtitle'      => __('Select your website Headings Font', 'eplano'),            'default'       => array(                'color'         => '#272338',                'font-weight'    => '700',                'font-family'   => 'Oswald',                'google'        => true,                'font-size'     => '2.6'),        ),        array(            'id'            => 'vcx_title_h4',            'type'          => 'typography',            'title'         => __('Headings Font h4', 'eplano'),            'compiler'      => false,  // Use if you want to hook in your own CSS compiler            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key            'font-backup'   => false,    // Select a backup non-google font in addition to a google font            'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare            'subsets'       => true, // Only appears if google is true and subsets not set to false            'font-size'     => true,            // 'text-align'    => false,            'line-height'   => false,            'word-spacing'  => false,  // Defaults to false            'letter-spacing'=> false,  // Defaults to false            'color'         => true,            'preview'       => true, // Disable the previewer            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page            'output'        =>array('h4'),            'units'         => 'rem', // Defaults to px            'subtitle'      => __('Select your website Headings Font', 'eplano'),            'default'       => array(                'color'         => '#272338',                'font-weight'    => '700',                'font-family'   => 'Oswald',                'google'        => true,                'font-size'     => '2'),        ),        array(            'id'            => 'vcx_title_h5',            'type'          => 'typography',            'title'         => __('Headings Font h5', 'eplano'),            'compiler'      => false,  // Use if you want to hook in your own CSS compiler            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key            'font-backup'   => false,    // Select a backup non-google font in addition to a google font            'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare            'subsets'       => true, // Only appears if google is true and subsets not set to false            'font-size'     => true,            // 'text-align'    => false,            'line-height'   => false,            'word-spacing'  => false,  // Defaults to false            'letter-spacing'=> false,  // Defaults to false            'color'         => true,            'preview'       => true, // Disable the previewer            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page            'output'        =>array('h5'),            'units'         => 'rem', // Defaults to px            'subtitle'      => __('Select your website Headings Font', 'eplano'),            'default'       => array(                'color'         => '#272338',                'font-weight'    => '700',                'font-family'   => 'Oswald',                'google'        => true,                'font-size'     => '1.8'),        ),        array(            'id'            => 'vcx_title_h6',            'type'          => 'typography',            'title'         => __('Headings Font h6', 'eplano'),            'compiler'      => false,  // Use if you want to hook in your own CSS compiler            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key            'font-backup'   => false,    // Select a backup non-google font in addition to a google font            'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare            'subsets'       => true, // Only appears if google is true and subsets not set to false            'font-size'     => true,            // 'text-align'    => false,            'line-height'   => false,            'word-spacing'  => false,  // Defaults to false            'letter-spacing'=> false,  // Defaults to false            'color'         => true,            'preview'       => true, // Disable the previewer            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page            'output'        =>array('h5'),            'units'         => 'rem', // Defaults to px            'subtitle'      => __('Select your website Headings Font', 'eplano'),            'default'       => array(                'color'         => '#272338',                'font-weight'    => '700',                'font-family'   => 'Oswald',                'google'        => true,                'font-size'     => '1.6'),        ),    )) );Redux::setSection( $opt_name, array(    'title'      => esc_html__( 'Page Banner', 'eplano' ),    'id'         => 'page-banner',    'icon'      => 'el el-website-alt',    'icon_class' => 'el-icon-large',    'fields'     => array(        array(            'id'       => 'opt_page_banner_bg_type',            'type'     => 'button_set',            'title'    => esc_html__('Header Banner Background Type', 'eplano'),            'options' => array(                '1' => 'Image',                '0' => 'Color'            ),            'default' => '1'        ),        array(            'id'       => 'csx_page_banner_img',            'type'     => 'media',            'title'    => esc_html__( 'Background Image', 'eplano' ),            'desc'  => esc_html__( 'Upload Image for Page banner. Default image size is 1920*613', 'eplano' ),        ),        array(            'id'       => 'csx_page_banner_color',            'type'     => 'color',            'title'    => esc_html__( 'Background Color', 'eplano' ),            'default'  => '#222222'        ),    )) );Redux::setSection( $opt_name, array(    'title'      => esc_html__( 'Blog Page', 'eplano' ),    'id'         => 'blog-page',    'icon'      => 'el el-website',    'icon_class' => 'el-icon-large',    'fields'     => array(        array(            'id'       => 'blog-title',            'type'     => 'text',            'title'    => esc_html__( 'Blog Title', 'eplano' ),            'default'  => esc_html__( 'Latest Blog', 'eplano' ),            'desc'    => esc_html__( 'If you put empty this field, it will display Default Value', 'eplano' ),        ),        array(            'id'       => 'blog-sidebar',            'type'     => 'select',            'title'    => esc_html__( 'Blog Sidebar', 'eplano' ),            'options'  => array(                'left' => esc_html__( 'Left', 'eplano' ),                'right' => esc_html__( 'Right', 'eplano' ),            ),            'default'  => 'right'        )    )) );Redux::setSection( $opt_name, array(    'title'      => esc_html__( 'Search Page', 'eplano' ),    'id'         => 'search-page',    'icon'      => 'el el-search-alt',    'icon_class' => 'el-icon-large',    'fields'     => array(        array(            'id'       => 'srch-title',            'type'     => 'text',            'title'    => esc_html__( 'Search Title', 'eplano' ),            'default'  => esc_html__( 'Search Post', 'eplano' ),            'desc'    => esc_html__( 'If you put empty this field, it will display Search text', 'eplano' ),        ),        array(            'id'       => 'srch-sidebar',            'type'     => 'select',            'title'    => esc_html__( 'Search Sidebar', 'eplano' ),            'options'  => array(                'left' => esc_html__( 'Left', 'eplano' ),                'right' => esc_html__( 'Right', 'eplano' ),            ),            'default'  => 'right'        ),    )) );Redux::setSection( $opt_name, array(    'title'      => esc_html__( 'Archive Page', 'eplano' ),    'id'         => 'archive-page',      'icon'      => 'el el-briefcase',    'icon_class' => 'el-icon-large',    'fields'     => array(        array(            'id'       => 'archv-title',            'type'     => 'text',            'title'    => esc_html__( 'Archive Title', 'eplano' ),            'default'  => esc_html__( 'Archive Post', 'eplano' ),            'desc'    => esc_html__( 'If you put empty this field, it will display Category,Tag, Date as Archive Title', 'eplano' ),        ),        array(            'id'       => 'archv-sidebar',            'type'     => 'select',            'title'    => esc_html__( 'Archive Sidebar', 'eplano' ),            'options'  => array(                'left' => esc_html__( 'Left', 'eplano' ),                'right' => esc_html__( 'Right', 'eplano' ),            ),            'default'  => 'right'        ),    )) );Redux::setSection( $opt_name, array(    'title'      => esc_html__( 'Social Media', 'eplano' ),    'id'         => 'social-media',    'icon'      => 'el el-share',    'icon_class' => 'el-icon-large',    'fields'     => array(        array(            'id'       => 'call-action-sc',            'type'     => 'info',            'style'    => 'success',            'icon'     => 'el el-info-circle',            'title'    => esc_html__( 'Social Icon', 'eplano' )        ),        array(            'id'       => 'facebook',            'type'     => 'text',            'title'    => esc_html__( 'Facebook Url', 'eplano' ),            'default'  => '#'        ),        array(            'id'       => 'twitter',            'type'     => 'text',            'title'    => esc_html__( 'Twitter Url', 'eplano' ),            'default'  => '#'        ),        array(            'id'       => 'google-plus',            'type'     => 'text',            'title'    => esc_html__( 'Google Plus Url', 'eplano' ),            'default'  => '#'        ),        array(            'id'       => 'linkedin',            'type'     => 'text',            'title'    => esc_html__( 'Linkedin Url', 'eplano' ),            'default'  => '#'        ),        array(            'id'       => 'soundcloud',            'type'     => 'text',            'title'    => esc_html__( 'SoundCloud Url', 'eplano' ),            'default'  => '#'        ),        array(            'id'       => 'instagram',            'type'     => 'text',            'title'    => esc_html__( 'Instagram Url', 'eplano' )        ),        array(            'id'       => 'pinterest',            'type'     => 'text',            'title'    => esc_html__( 'Pinterest Url', 'eplano' )        ),        array(            'id'       => 'flickr',            'type'     => 'text',            'title'    => esc_html__( 'Flicker Url', 'eplano' )        ),        array(            'id'       => 'tumblr',            'type'     => 'text',            'title'    => esc_html__( 'Tumblr Url', 'eplano' )        ),        array(            'id'       => 'youtube',            'type'     => 'text',            'title'    => esc_html__( 'Youtube Url', 'eplano' )        ),        array(            'id'       => 'vimeo',            'type'     => 'text',            'title'    => esc_html__( 'Vimeo Url', 'eplano' )        ),        array(            'id'       => 'behance',            'type'     => 'text',            'title'    => esc_html__( 'Behance Url', 'eplano' )        ),        array(            'id'       => 'dribbble',            'type'     => 'text',            'title'    => esc_html__( 'Dribbble Url', 'eplano' )        ),    )) );Redux::setSection( $opt_name, array(    'title'      => esc_html__( 'Footer Options', 'eplano' ),    'id'         => 'footer-options',    'icon'      => 'el el-website-alt',    'icon_class' => 'el-icon-large',    'fields'     => array(        array(            'id'       => 'footer-logo',            'type'     => 'media',            'title'    => esc_html__( 'Footer Logo', 'eplano' )        ),        array(            'id'       => 'call-action-bgc',            'type'     => 'info',            'style'    => 'success',            'icon'     => 'el el-info-circle',            'title'    => esc_html__( 'Footer Settings', 'eplano' )        ),        array(            'id'       => 'opt_footer_bg_type',            'type'     => 'button_set',            'title'    => __('Top Footer Background Type', 'eplano'),            'options' => array(                '1' => 'Image',                '0' => 'Color'            ),            'default' => '1'        ),        array(            'id'       => 'csx_footer_bg_img',            'type'     => 'media',            'title'    => esc_html__( 'Background Image', 'eplano' ),            'desc'  => esc_html__( 'Upload Image for Page banner. Default image size is 1920*613', 'eplano' ),        ),        array(            'id'       => 'csx_footer_bg_color',            'type'     => 'color',            'title'    => esc_html__( 'Background Color', 'eplano' ),            'default'  => '#222222'        ),        array(            'id'       => 'call-action-fl',            'type'     => 'info',            'style'    => 'success',            'icon'     => 'el el-info-circle',            'title'    => esc_html__( 'Location', 'eplano' )        ),        array(            'id'       => 'opt_footer_location_en',            'type'     => 'button_set',            'title'    => __('Show Location', 'eplano'),            'options' => array(                '1' => 'Yes',                '0' => 'No'            ),            'default' => '0'        ),        array(            'id'       => 'location_title',            'type'     => 'text',            'title'    => esc_html__( 'Location Title', 'eplano' ),            'default'    => 'Event Plan Info'        ),        array(            'id'       => 'location_date',            'type'     => 'text',            'title'    => esc_html__( 'Event Date', 'eplano' ),            'default'    => '18 - 21 DECEMBER, 2019'        ),        array(            'id'       => 'location_address',            'type'     => 'text',            'title'    => esc_html__( 'Event Address', 'eplano' ),            'default'    => '51 Francis Street, Darlinghurst NSW 2010, United States'        ),        array(            'id'       => 'location_map_text',            'type'     => 'text',            'title'    => esc_html__( 'Location URL Text', 'eplano' ),            'default'    => 'VIEW MAP LOCATION'        ),        array(            'id'       => 'location_map_icon',            'type'     => 'text',            'title'    => esc_html__( 'Location Map Icon Name', 'eplano' ),            'default'    => 'fa-map-marker'        ),        array(            'id'       => 'location_map_url',            'type'     => 'text',            'title'    => esc_html__( 'Location Map URL', 'eplano' ),            'default'    => '#'        ),        array(            'id'       => 'call-action-fs',            'type'     => 'info',            'style'    => 'success',            'icon'     => 'el el-info-circle',            'title'    => esc_html__( 'Social Media Settings', 'eplano' )        ),        array(            'id'       => 'opt_footer_social_en',            'type'     => 'button_set',            'title'    => __('Show Social Icon', 'eplano'),            'options' => array(                '1' => 'Yes',                '0' => 'No'            ),            'default' => '0'        ),        array(            'id'       => 'social_title',            'type'     => 'text',            'title'    => esc_html__( 'Social Area Title', 'eplano' ),            'default'    => 'Social Update'        ),        array(            'id'       => 'social_text',            'type'     => 'text',            'title'    => esc_html__( 'Social Area Text', 'eplano' ),            'default'    => 'You should connect social area for Any update'        ),        array(            'id'       => 'call-action-fs',            'type'     => 'info',            'style'    => 'success',            'icon'     => 'el el-info-circle',            'title'    => esc_html__( 'Subscription Area', 'eplano' )        ),        array(            'id'       => 'subscription_en',            'type'     => 'button_set',            'title'    => __('Show Subscription', 'eplano'),            'options' => array(                '1' => 'Yes',                '0' => 'No'            ),            'default' => '0'        ),        array(            'id'       => 'subscription_title',            'type'     => 'text',            'title'    => esc_html__( 'Subscription Title', 'eplano' ),            'default'    => 'Subscribe & Stay Updated'        ),        array(            'id'       => 'mailchimp-text',            'type'     => 'text',            'title'    => esc_html__( 'Mailchimp Shortcode', 'eplano' ),            'subtitle' => esc_html__( 'Put mailchimp shortcode here', 'eplano' )        ),        array(            'id'       => 'call-action-fc',            'type'     => 'info',            'style'    => 'success',            'icon'     => 'el el-info-circle',            'title'    => esc_html__( 'Copyright Area', 'eplano' )        ),        array(            'id'       => 'copyright-text',            'type'     => 'editor',            'title'    => esc_html__( 'Copyright Text', 'eplano' ),            'subtitle' => esc_html__( 'Put Copyright Text Here', 'eplano' ),            'default'  => '© 2018 EPLANO IS PROUDLY POWERED BY <a href="'.esc_url('https://www.httpcoder.com/').'">HTTPCODER.COM</a>',            'args'   => array(                'teeny'            => true,                'textarea_rows'    => 5            )        ),    )) );
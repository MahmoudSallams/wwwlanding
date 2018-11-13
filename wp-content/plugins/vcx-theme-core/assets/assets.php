<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Enqueue Themential scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'vcx_theme_core_scripts' );

if(!function_exists('vcx_theme_core_scripts')){
    function vcx_theme_core_scripts() {

        //LOAD SCRIPT
        wp_enqueue_script('vcx_magnific_popup',plugins_url('js/jquery.magnific-popup.js',__FILE__), array('jquery'));
        wp_enqueue_script('vcx_countdown',plugins_url('js/countdown.js',__FILE__), array('jquery'));
        wp_enqueue_script('vcx_particles',plugins_url('js/particles.min.js',__FILE__), array('jquery'));
        wp_enqueue_script('vcx_lgxsnow',plugins_url('js/lgxsnow.js',__FILE__), array('jquery'));
        wp_enqueue_script('vcx-script',plugins_url('js/theme-core-script.js',__FILE__), array('jquery'));

    }
}






/**
 * Post Formate Display Procedure.
 */
add_action('admin_print_scripts', 'vcx_theme_core_display_procedure', 1000);

function vcx_theme_core_display_procedure(){ ?>
    <?php if(get_post_type() == 'post') : ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){

                // Default Variation

                var id = jQuery( 'input[name="post_format"]:checked' ).attr('id');

                if(id == 'post-format-video'){
                    $('.cmb2-id---vcx--post-format-video').show();
                }else{
                    $('.cmb2-id---vcx--post-format-video').hide();
                }

                if(id == 'post-format-audio'){
                    $('.cmb2-id---vcx--post-format-audio').show();
                }else{
                    $('.cmb2-id---vcx--post-format-audio').hide();
                }

                if(id == 'post-format-quote'){
                    $('.cmb2-id---vcx--post-format-quote').show();
                    $('.cmb2-id---vcx--post-format-quote-author').show();
                }else{
                    $('.cmb2-id---vcx--post-format-quote').hide();
                    $('.cmb2-id---vcx--post-format-quote-author').hide();
                }

                if(id == 'post-format-gallery'){
                    $('.cmb2-id---vcx--post-format-gallery').show();
                }else{
                    $('.cmb2-id---vcx--post-format-gallery').hide();
                }

                if(id == 'post-format-link'){
                    $('.cmb2-id---vcx--post-format-link').show();
                }else{
                    $('.cmb2-id---vcx--post-format-link').hide();
                }


                // On Change 
                $( 'input[name="post_format"]' ).change(function(){

                    var id = $( 'input[name="post_format"]:checked' ).attr('id');
                    $('.cmb2-id---vcx--post-format-video').hide();
                    $('.cmb2-id---vcx--post-format-audio').hide();
                    $('.cmb2-id---vcx--post-format-quote').hide();
                    $('.cmb2-id---vcx--post-format-quote-author').hide();
                    $('.cmb2-id---vcx--post-format-gallery').hide();
                    $('.cmb2-id---vcx--post-format-link').hide();

                    if(id == 'post-format-video'){
                        $('.cmb2-id---vcx--post-format-video').show();
                    }
                    if(id == 'post-format-audio'){
                        $('.cmb2-id---vcx--post-format-audio').show();
                    }

                    if(id == 'post-format-quote'){
                        $('.cmb2-id---vcx--post-format-quote').show();
                        $('.cmb2-id---vcx--post-format-quote-author').show();
                    }

                    if(id == 'post-format-gallery'){
                        $('.cmb2-id---vcx--post-format-gallery').show();
                    }

                    if(id == 'post-format-link'){
                        $('.cmb2-id---vcx--post-format-link').show();
                    }

                });
            })
        </script>
    <?php endif; ?>



<?php }
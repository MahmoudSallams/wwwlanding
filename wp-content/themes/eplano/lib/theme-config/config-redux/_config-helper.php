<?php

class LgxFrameworkOpt{

    // logo
    public function eplano_logo(){
        global $eplano_options;
        if((isset($eplano_options['logo-up']['url'])) && !empty($eplano_options['logo-up']['url'])){
            return $eplano_options['logo-up']['url'];
        }else{
            return get_template_directory_uri()."/assets/img/logo.png";
        }
    }

    // Page Banner image 
    function eplano_page_banner(){
        global $eplano_options;

        if(!empty($eplano_options['csx_page_banner_img']['url'])){
            return $eplano_options['csx_page_banner_img']['url'];
        }else{
            return get_template_directory_uri()."/assets/img/inner-banner-bg.jpg";
        }
    }

    // Footer Banner image
    function eplano_footer_bg_img(){
        global $eplano_options;

        if(!empty($eplano_options['csx_footer_bg_img']['url'])){
            return $eplano_options['csx_footer_bg_img']['url'];
        }else{
            return get_template_directory_uri()."/assets/img/footer-bg.jpg";
        }
    }



    function eplano_pre_loader_img(){
        global $eplano_options;

        if(!empty($eplano_options['pre_loader_img']['url'])){
            return $eplano_options['pre_loader_img']['url'];
        }else{
            return get_template_directory_uri()."/assets/img/pre-loader.svg";
        }
    }


    // blog sidebar options
    public function eplano_blogSidebar(){
        global $eplano_options;
        if(isset($eplano_options['blog-sidebar']) ){
            return $eplano_options['blog-sidebar'];
        }else{
            return "right";
        }

    }
    // archive sidebar options
    public function eplano_archiveSidebar(){
        global $eplano_options;
        if(isset($eplano_options['archv-sidebar']) ){
            return $eplano_options['archv-sidebar'];
        }else{
            return "right";
        }

    }
    // archive sidebar options
    public function eplano_shopSidebar(){
        global $eplano_options;
        if(isset($eplano_options['shop-sidebar']) ){
            return $eplano_options['shop-sidebar'];
        }else{
            return "full";
        }

    }


    // search sidebar options
    public function eplano_searchSidebar(){
        global $eplano_options;
        if(isset($eplano_options['srch-sidebar']) ){
            return $eplano_options['srch-sidebar'];
        }else{
            return "right";
        }
    }

// footer


    // footer title
    public function eplano_footer_title(){
        global $eplano_options;
        if(isset($eplano_options['footer-title']) ){
            return $eplano_options['footer-title'];
        }else{
            return "";
        }
    }




    // mailchimp shortcode
    public function eplano_footer_subscribe(){
        global $eplano_options;
        if(isset($eplano_options['mailchimp-text']) ){
            return $eplano_options['mailchimp-text'];
        }else{
            return "";
        }
    }

    // Get
    public function eplano_enable_status($type) {
        global $eplano_options;

        $output = false;
        if( !empty($eplano_options[$type]) && $eplano_options[$type] == 1) {
            $output = true;
        }
        return $output;
    }


}



/**=====================================================================
 * Social icon
=====================================================================*/

function eplano_social_profile ($icon) {
    global $eplano_options;

    $output = '';
    if(!empty($eplano_options[$icon])) {
        $output = '<li><a href="'.esc_url($eplano_options[$icon]).'" target="_blank" ><i class="fa fa-'.esc_attr($icon).'" aria-hidden="true"></i></a></li>';
    }

    return $output;
}



// footer logo
function eplano_footer_logo_url(){
    global $eplano_options;

    if(!empty($eplano_options['footer-logo']['url'])){
        return $eplano_options['footer-logo']['url'];
    }else{
        return get_template_directory_uri()."/assets/img/logo.png";
    }
}

<?php

add_action ('wp_head','vcx_style_hook_inHeader');



function vcx_style_hook_inHeader() {;


    global $eplano_options;



    if(isset($eplano_options['custom_color_en'])) {
        $custom_color_en = intval($eplano_options['custom_color_en']);

        $vcx_brand_color = (!empty($eplano_options['color-opt'])) ? $eplano_options['color-opt'] : '#9c359b' ;

        $vcx_brand_btn_color  = (!empty($eplano_options['btncolor-opt'])) ? $eplano_options['btncolor-opt'] : '#f7b205' ;

        $vcx_page_header_color = (!empty($eplano_options['page-header-opt'])) ? $eplano_options['page-header-opt'] : '#fff' ;

    }

    if ($custom_color_en != 1)  {
        return;
    }




    ?>
    <style type="text/css">
        a,  a:focus, a:hover,
        a.active   {
            color: <?php echo $vcx_brand_color; ?>;
        }

        h3 a:hover,
        .h3 a:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }

        h4 a:hover,
        .h4 a:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }

        blockquote:after {
            color: <?php echo $vcx_brand_color; ?>;

        }
        .csi-social li:hover a {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-post-wrapper .csi-single-post form input[type='submit'] {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-post-wrapper .csi-single-post form input[type='submit']:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }

        .widget.widget_rss ul li a {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-heading .subheading {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-subheading {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-btn {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-btn-highlight {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-btn-brand2 {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-header .csi-navbar .csi-nav li a:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-header .csi-navbar .csi-nav .csi-btn {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-header .csi-navbar .csi-nav .csi-btn:hover,
        .csi-header .csi-navbar .csi-nav .csi-btn:focus,
        .csi-header .csi-navbar .csi-nav .csi-btn:active {
            background: <?php echo $vcx_brand_color; ?>;
        }

        .csi-header .csi-navbar .csi-nav .active a {
            color: <?php echo $vcx_brand_color; ?>;
        }


        .csi-header .csi-navbar .csi-nav .dropdown-menu {
            background: <?php echo $vcx_brand_color; ?>;
            border: 0;
            border-radius: 0;
        }

        .csi-header .csi-header-bottom-brand-tp {
            background: <?php echo $vcx_brand_color; ?>;
        }

        .csi-header .csi-header-bottom-brand-tp .csi-navbar .csi-nav .active a {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-header .csi-header-bottom-brand-container .csi-navbar {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-header .csi-header-bottom-brand-container .csi-navbar .csi-nav {
            margin-top: 3rem;
        }
        .csi-header .csi-header-bottom-brand-container .csi-navbar .csi-nav .active a {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }


        .csi-header .csi-header-bottom-normal .csi-navbar .csi-nav .active a {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-header .menu-onscroll .csi-toggle {
            color: <?php echo $vcx_brand_color; ?>;
        }


        .csi-slider .owl-controls .owl-nav [class*=owl-] {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-slider .owl-controls .owl-nav [class*=owl-]:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-slider .owl-prev:before,
        .csi-slider .owl-next:before {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-slider .owl-theme .owl-controls .owl-prev i,
        .csi-slider .owl-theme .owl-controls .owl-next i {
            font-size: 26px;
        }
        .csi-slider .owl-theme .owl-controls .owl-prev:hover,
        .csi-slider .owl-theme .owl-controls .owl-next:hover {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-about .csi-heading .subheading {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-single-service .text-area .title {
            margin-top: 0;
        }
        .csi-single-service .text-area .title a {
            color: inherit;
        }
        .csi-single-service-white {
            padding: 1rem;
            background: rgba(255, 255, 255, 0.2);
        }
        .csi-single-service-white .icon i {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-single-speaker figure figcaption {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-single-speaker figure figcaption a {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-single-speaker .social-group a:hover {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-single-speaker .speaker-info .subtitle {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-single-speaker:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-single-speaker2 figure figcaption a {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-single-speaker2 .social-group a {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-single-speaker2 .social-group a:hover {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-single-speaker2 .speaker-info .subtitle {

            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-tab .nav-pills {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-tab .nav-pills .active:before {
            background: <?php echo $vcx_brand_btn_color; ?>;

        }
        .csi-panel .csi-single-schedule .author img {
            border: 2px solid <?php echo $vcx_brand_color; ?>;
        }
        .csi-panel .csi-single-schedule .schedule-info .time span {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-panel .csi-single-schedule .schedule-info .author-info span {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-panel .panel-body .location strong {
            font-weight: 700;
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-panel .panel-body .location span {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .sponsors-area .single-border-style:hover {
            background: <?php echo $vcx_brand_color; ?>;
            background: rgba(156, 53, 155, 0.1);
        }
        .sponsors-area .single-background-style:hover {
            border: 5px solid <?php echo $vcx_brand_color; ?>;
        }

        .csi-registration-area .csi-single-registration .single-top .price {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area .csi-single-registration .single-bottom ul li .fa-times {
            color: #b71c1c;
        }
        .csi-registration-area .csi-single-registration .single-bottom ul li .fa-check {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-registration-area .csi-single-registration:hover .single-top .title {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area .csi-single-registration:hover .single-top .title a {
            color: inherit;
        }
        .csi-registration-area .csi-single-registration:hover .single-top .price {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-registration-area .recommended {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area .recommended .csi-single-registration-inner {
            padding: 9rem 2rem;
        }

        .csi-registration-area .recommended .single-top .title a {
            color: inherit;
        }
        .csi-registration-area .recommended .single-top .price {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-registration-area .recommended .single-bottom ul li .fa-times {
            color: #b71c1c;
        }
        .csi-registration-area .recommended .single-bottom ul li .fa-check {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area .recommended .csi-btn {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area .recommended .csi-btn:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(1) {
            background: <?php echo $vcx_brand_color; ?>;
        }

        .csi-registration-area-colorful .csi-single-registration:nth-child(1) .single-top .price {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(1) .single-bottom ul li .fa-times {
            color: #b71c1c;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(1) .single-bottom ul li .fa-check {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(1) .csi-btn {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(1) .csi-btn:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(2) .single-bottom ul li .fa-times {
            color: #b71c1c;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(2) .single-bottom ul li .fa-check {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(2) .csi-btn {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(2) .csi-btn:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(3) {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-registration-area-colorful .csi-single-registration:nth-child(3) .single-top .price {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-registration-area-colorful .csi-single-registration:nth-child(3) .single-bottom ul li .fa-times {
            color: #b71c1c;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(3) .single-bottom ul li .fa-check {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(3) .csi-btn {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(3) .csi-btn:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(4) {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(4) .single-top .price {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-registration-area-colorful .csi-single-registration:nth-child(4) .single-bottom ul li .fa-times {
            color: #b71c1c;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(4) .single-bottom ul li .fa-check {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(4) .csi-btn {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-colorful .csi-single-registration:nth-child(4) .csi-btn:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-registration-area-colorful .csi-single-registration:hover .single-top .title {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-registration-area-colorful .csi-single-registration:hover .single-top .price {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-registration-area-simple .csi-single-registration:hover {
            border: 8px solid <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area-simple .csi-single-registration:hover .single-top .title {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-registration-area-simple .csi-single-registration:hover .single-top .title a {
            color: inherit;
        }
        .csi-registration-area-simple .csi-single-registration:hover .single-top .price {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-registration-area-simple .recommended {
            border: 8px solid <?php echo $vcx_brand_color; ?>;
        }

        .csi-registration-area-simple .recommended .single-top .title {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .vcx-registration-box input.wpcf7-form-control:focus,
        .vcx-registration-box input.form-control:focus {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .vcx-registration-box select.wpcf7-select option,
        .vcx-registration-box select.lgx-select option {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .vcx-registration-box .wpcf7-form-control.wpcf7-submit,
        .vcx-registration-box .wpcf7-form-control.lgx-submit,
        .vcx-registration-box .wpcf7-submit,
        .vcx-registration-box .lgx-submit {
            width: 100%;
        }
        .vcx-registration-box .wpcf7-form-control.wpcf7-submit:hover,
        .vcx-registration-box .wpcf7-form-control.lgx-submit:hover,
        .vcx-registration-box .wpcf7-submit:hover,
        .vcx-registration-box .lgx-submit:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-video-area figure figcaption .video-icon:hover i {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-subscribe-form .form-control:hover,
        .csi-subscribe-form .form-control:focus {
            border: 2px solid <?php echo $vcx_brand_color; ?>;
        }
        .csi-subscribe-form .csi-submit {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-subscribe-form .csi-submit:hover {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-countdown-area .csi-countdown .csi-days {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-countdown-area .csi-countdown .csi-hr {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-countdown-area .csi-countdown .csi-min {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-countdown-area .csi-countdown .csi-sec {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-countdown-area-circle_right .csi-countdown .csi-days,
        .csi-countdown-area-circle_left .csi-countdown .csi-days,
        .csi-countdown-area-circle_center .csi-countdown .csi-days,
        .csi-countdown-area-squre_left .csi-countdown .csi-days,
        .csi-countdown-area-squre_right .csi-countdown .csi-days,
        .csi-countdown-area-squre_center .csi-countdown .csi-days {
            border: 3px solid <?php echo $vcx_brand_color; ?>;
        }
        .csi-countdown-area-circle_right .csi-countdown .csi-hr,
        .csi-countdown-area-circle_left .csi-countdown .csi-hr,
        .csi-countdown-area-circle_center .csi-countdown .csi-hr,
        .csi-countdown-area-squre_left .csi-countdown .csi-hr,
        .csi-countdown-area-squre_right .csi-countdown .csi-hr,
        .csi-countdown-area-squre_center .csi-countdown .csi-hr {
            border: 3px solid <?php echo $vcx_brand_color; ?>;
        }
        .csi-countdown-area-circle_right .csi-countdown .csi-min,
        .csi-countdown-area-circle_left .csi-countdown .csi-min,
        .csi-countdown-area-circle_center .csi-countdown .csi-min,
        .csi-countdown-area-squre_left .csi-countdown .csi-min,
        .csi-countdown-area-squre_right .csi-countdown .csi-min,
        .csi-countdown-area-squre_center .csi-countdown .csi-min {
            border: 3px solid <?php echo $vcx_brand_color; ?>;
        }
        .csi-countdown-area-circle_right .csi-countdown .csi-sec,
        .csi-countdown-area-circle_left .csi-countdown .csi-sec,
        .csi-countdown-area-circle_center .csi-countdown .csi-sec,
        .csi-countdown-area-squre_left .csi-countdown .csi-sec,
        .csi-countdown-area-squre_right .csi-countdown .csi-sec,
        .csi-countdown-area-squre_center .csi-countdown .csi-sec {
            border: 3px solid <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-countdown-area-squre_right .csi-countdown .csi-days,
        .csi-countdown-area-squre_left .csi-countdown .csi-days,
        .csi-countdown-area-squre_center .csi-countdown .csi-days {
            background: <?php echo $vcx_brand_color; ?>;
        }

        .csi-countdown-area-squre_right .csi-countdown .csi-min,
        .csi-countdown-area-squre_left .csi-countdown .csi-min,
        .csi-countdown-area-squre_center .csi-countdown .csi-min {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-countdown-area-squre_right .csi-countdown .csi-sec,
        .csi-countdown-area-squre_left .csi-countdown .csi-sec,
        .csi-countdown-area-squre_center .csi-countdown .csi-sec {
            background: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-countdown-style-about.csi-countdown-area-circle_right .csi-countdown .csi-days,
        .csi-countdown-style-about.csi-countdown-area-circle_left .csi-countdown .csi-days,
        .csi-countdown-style-about.csi-countdown-area-circle_center .csi-countdown .csi-days {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-countdown-style-about.csi-countdown-area-circle_right .csi-countdown .csi-hr,
        .csi-countdown-style-about.csi-countdown-area-circle_left .csi-countdown .csi-hr,
        .csi-countdown-style-about.csi-countdown-area-circle_center .csi-countdown .csi-hr {
            background: rgba(255, 0, 90, 0.8);
        }
        .csi-countdown-style-about.csi-countdown-area-circle_right .csi-countdown .csi-min,
        .csi-countdown-style-about.csi-countdown-area-circle_left .csi-countdown .csi-min,
        .csi-countdown-style-about.csi-countdown-area-circle_center .csi-countdown .csi-min {
            background: rgba(137, 93, 255, 0.8);
        }
        .csi-countdown-style-about.csi-countdown-area-circle_right .csi-countdown .csi-sec,
        .csi-countdown-style-about.csi-countdown-area-circle_left .csi-countdown .csi-sec,
        .csi-countdown-style-about.csi-countdown-area-circle_center .csi-countdown .csi-sec {
            background: rgba(247, 178, 5, 0.8);
        }

        .csi-countdowns3 .csi-inner {
            background: rgba(247, 178, 5, 0.8);
        }
        .csi-countdown-area3 #csi-countdown .csi-days {
            color: #fff200;
        }
        .csi-countdown-area3 #csi-countdown .csi-hr {
            color: #ff8a00;
        }
        .csi-countdown-area3 #csi-countdown .csi-min {
            color: #00b9ff;
        }
        .csi-countdown-area3 #csi-countdown .csi-sec {
            color: #8dc63f;
        }

        .csi-footer-single .date {
            color: <?php echo $vcx_brand_color; ?>;

        }

        .csi-footer-single .map-link {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-footer-single .map-link:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-social li:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-testimonials .csi-review-slider .item .csi-client-image img {
            display: inline-block;
        }
        .csi-testimonials .csi-review-slider .item .csi-client-image figcaption {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-testimonials .csi-review-slider .item .csi-client-image figcaption i {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-testimonials .csi-review-slider .item .csi-client-image:hover figcaption i {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-testimonials .csi-review-slider .owl-controls .owl-nav [class*=owl-] i {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-testimonials .csi-review-slider .owl-controls .owl-nav [class*=owl-]:hover {
            background-color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-testimonials .csi-review-slider .owl-controls .owl-nav [class*=owl-]:hover i {
            color: #fff;
        }
        .csi-testimonials .csi-review-slider .owl-controls .owl-nav .owl-prev,
        .csi-testimonials .csi-review-slider .owl-controls .owl-nav .owl-next {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-testimonials .csi-review-slider .owl-controls .owl-nav .owl-prev:hover,
        .csi-testimonials .csi-review-slider .owl-controls .owl-nav .owl-next:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }

        .csi-testimonials .csi-review-slider2 .item .csi-client-image figcaption,
        .csi-testimonials .csi-review-slider3 .item .csi-client-image figcaption {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-testimonials .csi-review-slider2 .item .csi-client-image figcaption i,
        .csi-testimonials .csi-review-slider3 .item .csi-client-image figcaption i {
            color: <?php echo $vcx_brand_color; ?>;
            font-size: 26px;
            line-height: 46px;
        }
        .csi-testimonials .csi-review-slider2 .item .csi-client-image:hover img,
        .csi-testimonials .csi-review-slider3 .item .csi-client-image:hover img {
            border-color: #fff;
        }
        .csi-testimonials .csi-review-slider2 .item .csi-client-image:hover figcaption,
        .csi-testimonials .csi-review-slider3 .item .csi-client-image:hover figcaption {
            background-color: #fff;
        }
        .csi-testimonials .csi-review-slider2 .item .csi-client-image:hover figcaption i,
        .csi-testimonials .csi-review-slider3 .item .csi-client-image:hover figcaption i {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-testimonials .csi-review-slider2 .item .csi-client-name span,
        .csi-testimonials .csi-review-slider3 .item .csi-client-name span {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-testimonials .csi-review-slider2 .item:hover,
        .csi-testimonials .csi-review-slider3 .item:hover {
            background: <?php echo $vcx_brand_color; ?>;
            border-radius: 8px;
        }

        .csi-testimonials .csi-review-slider2 .owl-controls .owl-nav [class*=owl-] i,
        .csi-testimonials .csi-review-slider3 .owl-controls .owl-nav [class*=owl-] i {
            font-size: 40px;
            color: <?php echo $vcx_brand_color; ?>;
            font-weight: 400;
        }
        .csi-testimonials .csi-review-slider2 .owl-controls .owl-nav [class*=owl-]:hover,
        .csi-testimonials .csi-review-slider3 .owl-controls .owl-nav [class*=owl-]:hover {
            background-color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-testimonials .csi-review-slider2 .owl-controls .owl-nav .owl-prev,
        .csi-testimonials .csi-review-slider3 .owl-controls .owl-nav .owl-prev,
        .csi-testimonials .csi-review-slider2 .owl-controls .owl-nav .owl-next,
        .csi-testimonials .csi-review-slider3 .owl-controls .owl-nav .owl-next {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-testimonials .csi-review-slider2 .owl-controls .owl-nav .owl-prev:hover,
        .csi-testimonials .csi-review-slider3 .owl-controls .owl-nav .owl-prev:hover,
        .csi-testimonials .csi-review-slider2 .owl-controls .owl-nav .owl-next:hover,
        .csi-testimonials .csi-review-slider3 .owl-controls .owl-nav .owl-next:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }

        #vcx-particle-section .heading {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-banner-content .csi-title b {
            color: <?php echo $vcx_brand_btn_color; ?>;
            font-weight: 800;
        }
        .csi-banner-content .csi-title i {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-banner-content .csi-title2 b {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-banner-content .csi-title2 i {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-banner-content .date b {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }


        article footer #comments .comment-reply-link {
            border: 1px solid <?php echo $vcx_brand_color; ?>;
            color: <?php echo $vcx_brand_color; ?>;
        }
        article footer #comments .comment-reply-link:hover {
            background: <?php echo $vcx_brand_color; ?>;
            border: 1px solid <?php echo $vcx_brand_color; ?>;

        }
        article footer #comments .edit-link {

            color: <?php echo $vcx_brand_color; ?>;
        }
        article footer #comments .edit-link a {
            border: 1px solid <?php echo $vcx_brand_color; ?>;
        }
        article footer #comments .edit-link:hover a {
            background: <?php echo $vcx_brand_color; ?>;

        }

        article footer #comments #respond .comment-notes .requi<?php echo $vcx_brand_color; ?> {
            color: <?php echo $vcx_brand_color; ?>;
        }

        article footer #comments #respond form label .requi<?php echo $vcx_brand_color; ?> {
            color: <?php echo $vcx_brand_color; ?>;
        }

        article footer #comments input:hover,
        article footer #comments textarea:hover,
        article footer #comments input:active,
        article footer #comments textarea:active,
        article footer #comments input:focus,
        article footer #comments textarea:focus {
            border: 1px solid <?php echo $vcx_brand_color; ?> !important;
        }
        article footer #comments .form-submit {
            background: <?php echo $vcx_brand_color; ?>;

        }

        article footer #comments .form-submit:hover {
            background: <?php echo $vcx_brand_color; ?>;

        }

        .post-password-form input[type=submit] {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .post-password-form input[type=submit]:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }

        .wpcf7-submit {
            background: <?php echo $vcx_brand_color; ?>;
        }


        .csi-contact-box .address .title {
            color: <?php echo $vcx_brand_color; ?>;
            font-weight: 400;
            letter-spacing: normal;
            margin: 0;
        }

        .csi-box .csi-icon i {
            font-size: 35px;
            color: <?php echo $vcx_brand_color; ?>;
            line-height: 43px;
        }
        .csi-nav-pills-area .csi-nav-pills li.active > a,
        .csi-nav-pills-area .csi-nav-pills li.active > a:focus,
        .csi-nav-pills-area .csi-nav-pills li.active > a:hover {
            color: <?php echo $vcx_brand_color; ?>;
            border: 2px solid <?php echo $vcx_brand_color; ?>;
        }

        .csi-tab-content .tab-pane .csi-single-tab .menu-content .csi-info .title-area .price {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-tab-content .tab-pane .csi-single-tab:hover .menu-content .csi-info .title-area {
            background: <?php echo $vcx_brand_color; ?>;
        }


        ul.page-numbers li:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }
        ul.page-numbers li:hover a,
        ul.page-numbers li:hover span {
            color: #fff;
        }

        .page-links span {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .breadcrumb .active {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .form-control:hover,
        .form-control:focus {
            border: 2px solid <?php echo $vcx_brand_color; ?>;
        }

        .csi-single-item .csi-singleitem-content .subtitle {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-single-item .csi-singleitem-content .price span {
            color: <?php echo $vcx_brand_color; ?>;
        }

        .csi-post-wrapper header .text-area .subtitle {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }
        .csi-post-wrapper header .text-area .hits-area .date a i {
            color: <?php echo $vcx_brand_btn_color; ?>;
        }

        .csi-post-wrapper footer .title {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-post-wrapper footer .csi-share {
            margin-left: 0;
        }
        .csi-post-wrapper footer .csi-share li a {

            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-post-wrapper footer .csi-share li a:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .post-navigation .nav-links .nav-previous a,
        .post-navigation .nav-links .nav-next a {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .post-navigation .nav-links .nav-previous a:hover,
        .post-navigation .nav-links .nav-next a:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }
        aside .widget .widget-title {
            color: <?php echo $vcx_brand_color; ?>;
        }
        aside .widget ul li a:hover {
            color: <?php echo $vcx_brand_color; ?>;
        }
        aside .widget_tag_cloud .tagcloud a:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .search-submit {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .search-submit:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }
        @media (max-width: 480px) {
            .csi-tab .nav-pills .active {
                background: <?php echo $vcx_brand_btn_color; ?>;
            }
        }

        .csi-testimonials .csi-review-slider .item .csi-client-name span {
            color: <?php echo $vcx_brand_color; ?>;
        }
        .csi-btn:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }
        .csi-btn-white {
            background: #f1f1f1;
            color: <?php echo $vcx_brand_color; ?>;
        }

        ul.page-numbers li .current, ul.page-numbers li:hover {
            background: <?php echo $vcx_brand_color; ?>;

        }
        .csi-header .csi-navbar .csi-nav li a:hover {
            color: #fff;
        }

        .csi-registration-area-colorful .csi-single-registration:nth-child(2), .csi-registration-area-colorful .csi-single-registration:nth-child(2) .csi-btn {
            background: #895dff;
        }

        .csi-header .csi-navbar .csi-nav li a:hover {
            color:<?php echo $vcx_brand_color; ?>;
        }

        .csi-header .csi-navbar .csi-nav .dropdown-menu li a {
            color: #fff;
        }

        .csi-btn-sp, .form-submit, .csi-btn-sp:hover, .form-submit:hover {
            background: <?php echo $vcx_brand_color; ?>;
        }

        .csi-single-service .text-area .title {
            color:<?php echo $vcx_brand_color; ?>;
        }

        .widget-area input[type=search], input[type=search] {
            border-color: <?php echo $vcx_brand_color; ?>;;
        }


        #content .csi-banner-wrapper .csi-heading-area .csi-heading {
            color: <?php echo $vcx_page_header_color ?>;
        }




    </style>
<?php }
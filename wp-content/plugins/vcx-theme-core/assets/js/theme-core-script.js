(function($) {
    "use strict";
    $(document).ready(function() {

        /*=========================================================================
       ===  TESTIMONIAL SLIDER
       ========================================================================== */
        if ($('.csi-review-slider').length) {
            $(".csi-review-slider").owlCarousel({
                margin: 0,
                items: 1,
                loop: true,
                rtl: false,
                autoplay:true,
                dots: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplayTimeout: 2000,
                autoplaySpeed: 500,
                autoplayHoverPause: true,
                nav: true,
                addClassActive : true
            });
        }

        if ($('.csi-review-slider2').length) {
            $(".csi-review-slider2").owlCarousel({
                margin: 0,
                loop: true,
                rtl: false,
                autoplay:true,
                dots: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplayTimeout: 2000,
                autoplaySpeed: 500,
                autoplayHoverPause: true,
                nav: true,
                addClassActive : true,
                responsive:{
                    // Item in Mobile Devices (Less than 768px)
                    0:{
                        items:1,
                    },
                    // Item in Tablets Devices (768px and Up)
                    768:{
                        items:1,
                    },
                    // Item in Desktops Devices (Desktops 992px)

                    992:{
                        items:2,
                    },
                    // Item in Large Desktops Devices (1200px and Up)
                    1200:{
                        items:2,
                    }
                }

            });
        }

        if ($('.csi-review-slider3').length) {
            $(".csi-review-slider3").owlCarousel({
                margin: 0,
                loop: true,
                rtl: false,
                autoplay:true,
                dots: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplayTimeout: 2000,
                autoplaySpeed: 500,
                nav: true,
                addClassActive : true,
                autoplayHoverPause: true,
                responsive:{
                    // Item in Mobile Devices (Less than 768px)
                    0:{
                        items:1,
                    },
                    // Item in Tablets Devices (768px and Up)
                    768:{
                        items:1,
                    },
                    // Item in Desktops Devices (Desktops 992px)

                    992:{
                        items:3,
                    },
                    // Item in Large Desktops Devices (1200px and Up)
                    1200:{
                        items:3,
                    }
                }

            });
        }


        /*=========================================================================
         ===  TESTIMONIAL SLIDER END
         ========================================================================== */


        /*=========================================================================
        ===  Modal Video
        ========================================================================== */
        /* Get iframe src attribute value i.e. YouTube video url
         and store it in a variable */
        var url = $("#modalvideo").attr('src');

        /* Remove iframe src attribute on page load to
         prevent autoplay in background */
        $("#modalvideo").attr('src', '');

        /* Assign the initially stored url back to the iframe src
         attribute when modal is displayed */
        $("#csi-modal").on('shown.bs.modal', function(){
            $("#modalvideo").attr('src', url);
        });

        /* Assign empty url value to the iframe src attribute when
         modal hide, which stop the video playing */
        $("#csi-modal").on('hide.bs.modal', function(){
            $("#modalvideo").attr('src', '');
        });
        /*=========================================================================
         ===  Modal Video END
         ========================================================================== */


        /*=========================================================================
         ===  magnific popup
         ========================================================================== */
        if ( $('#csi-gallery').length ) {
            $('#csi-gallery').magnificPopup({
                delegate: '.csi-single-photo', // child items selector, by clicking on it popup will open
                type: 'image',
                gallery: {
                    enabled: true
                },
                image: {
                    titleSrc: 'title'
                }
                // other options
            });
        }

        /*=========================================================================
         ===  magnific popup END
         ========================================================================== */


        /*=========================================================================
          ===  countdown
        ========================================================================== */

        if ( $('.csi-countdowntop').length ) {

            var vday = $('.csi-countdowntop').data("vday");
            var vhour = $('.csi-countdowntop').data("vhour");
            var vmin = $('.csi-countdowntop').data("vmin");
            var vsec = $('.csi-countdowntop').data("vsec");

            var dataTime = $('.csi-countdowntop').data('date'); // Date Format : Y/m/d

            $('.csi-countdowntop').countdown(dataTime, function(event) {
                var $this = $(this).html(event.strftime(''
                    + '<span class="csi-days">%D <i> '+vday+' </i></span> '
                    + '<span class="csi-hr">%H <i> '+vhour+'</i></span> '
                    + '<span class="csi-min">%M <i> '+vmin+'</i></span> '
                    + '<span class="csi-sec">%S <i> '+vsec+ '</i></span>'
                ));
            });
        }




        if($('.csi-countdown-section').length) {

            var vday2 = $('.csi-countdown-section').data("vday2");
            var vhour2 = $('.csi-countdown-section').data("vhour2");
            var vmin2 = $('.csi-countdown-section').data("vmin2");
            var vsec2 = $('.csi-countdown-section').data("vsec2");

            var dataTime2 = $('.csi-countdown-section').data('date2');

            $('.csi-countdown-section').countdown(dataTime2, function(event) {
                var $this = $(this).html(event.strftime(''
                    + '<span class="csi-days">%D <i> '+vday2+' </i></span> '
                    + '<span class="csi-hr">%H <i> '+vhour2+'</i></span> '
                    + '<span class="csi-min">%M <i> '+vmin2+'</i></span> '
                    + '<span class="csi-sec">%S <i> '+vsec2+ '</i></span>'
                ));
            });

        }



        /*=========================================================================
         ===  Particle
         ========================================================================== */


        if ($(".csi-banner-particle").length) {
            particlesJS("csi-banner-particle", {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 600
                        }
                    },
                    "color": {
                        "value": "#f7b205"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 2,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#9c359b",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        }



        if ($(".vcx-particle-section").length) {
            particlesJS("vcx-particles-inner", {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 600
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 2,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        }

        /*=========================================================================
         ===  Particle END
         ========================================================================== */


        if ($("#vcxSnowfall").length) {

            lgxSnow.autoStart         = true;
            lgxSnow.snowCharacter     = "•";
            lgxSnow.snowColor         = "#ffffff";
            lgxSnow.followMouse       = true;
            lgxSnow.animationInterval = 33;
            lgxSnow.flakesMax         = 500;
            lgxSnow.flakesMaxActive   = 250;
            lgxSnow.freezeOnBlur      = true;
            lgxSnow.snowStick         = true;
            lgxSnow.useMeltEffect     = true;
            lgxSnow.useTwinkleEffect  = true;
            lgxSnow.flakeBottom       = null;
            lgxSnow.targetElement     = 'vcxSnowfall';


        } else {
            lgxSnow.stop();
        }

    });//DOM READY

})(jQuery);





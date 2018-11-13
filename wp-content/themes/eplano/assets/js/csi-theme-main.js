(function($) {
    "use strict";

    $(document).ready(function() {



        /*=========================================================================
         ===  MENU SCROLL FIXED
         ========================================================================== */
        // var s = $(".csi-header");
        var s = $('#csi-header-bottom');
        var pos = s.position();

        $(window).on('scroll', function () {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top) {
                s.addClass("menu-onscroll");
            } else {
                s.removeClass("menu-onscroll");
            }
        });
        /*=========================================================================
         ===  MENU SCROLL FIXED END
         ========================================================================== */
        /*=========================================================================
         ===  MENU SCROLL FIXED
         ========================================================================== */


        //Effective For Mobile Device

        $('.navbar-collapse ul li a:not(.dropdown-toggle)').on('click', function () {
            $('.navbar-toggle:visible').click();
        });

        /*=========================================================================
         ===  MENU SCROLL FIXED END
         ========================================================================== */


        /*=========================================================================
         ===  SMOOTH SCROLL - REQUIRES JQUERY EASING PLUGIN
         ========================================================================== */
        if ( $('.csi-scroll').length ) {

            $( '.csi-scroll > a' ).on( 'click', function(event) {
                var $anchor = $(this);
                var topTo   = $( $anchor.attr('href') ).offset().top;

                if ( window.innerWidth < 768 ) {
                    topTo = ( topTo - 90 );
                }

                $( 'html, body' ).stop().animate({
                    scrollTop: topTo
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
                return false;
            } );
        }


        /*=========================================================================
         ===  SMOOTH SCROLL - REQUIRES JQUERY EASING PLUGIN END
         ========================================================================== */

        // gallery slider
        if ( $('.slider-container').length ) {
            $(".slider-container").ikSlider({
                speed: 500
            });
        }

    });//DOM READY

})(jQuery);





(function($) {
    "use strict";
    $(document).ready(function() {
        function bs_fix_vc_full_width_row(){
            var $elements = $('[data-vc-full-width="true"]');
            $.each($elements, function () {
                var $el = $(this);
                $el.css('right', $el.css('left')).css('left', '');
            });
        }

        // Fixes rows in RTL
        $(document).on('vc-full-width-row', function () {
            bs_fix_vc_full_width_row();
        });

        // Run one time because it was not firing in Mac/Firefox and Windows/Edge some times
        bs_fix_vc_full_width_row();

    });//DOM READY

})(jQuery);


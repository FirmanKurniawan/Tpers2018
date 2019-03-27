// -----------------------------

//   js index
/* =================== */
/*  
    

    

*/
// -----------------------------


(function($) {
    "use strict";



    /*---------------------
    preloader
    --------------------- */

    $(window).on('load', function() {
        $('#preloader').fadeOut('slow', function() { $(this).remove(); });
    });

    /*------------------------------
         counter
    ------------------------------ */
    
    $('.counter-up').counterUp({
        delay: 10,
        time: 1000
    });


}(jQuery));
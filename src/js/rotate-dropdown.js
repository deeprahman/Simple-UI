import jQuery from 'jquery';

(function($){

    $('.site-stat__credits-dropdown').on('click', function(e){
   
        $(this).toggleClass('flip');
    });

})(jQuery);
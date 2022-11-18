(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);
            
            _navHeight = jQuery('div').data('ondemand','menu').height();
            _ftrHeight = jQuery('footer').data('ondemand','footer').height();
            _window    = jQuery(window).height() - ( _navHeight + _ftrHeight + 70 );
            _window2    = jQuery(window).height();
            _topNews   = jQuery('.news-list').height();

            if ( _window <= _topNews ) {
                jQuery('.my-properties').find('.property-list').css('height',_window);
            } else {
                jQuery('.my-properties').find('.property-list').css('height',_topNews);
            }

        }
    }, 100);

})(jQuery);
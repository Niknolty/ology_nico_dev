$(window).scroll(function () {
    var backtoOlogyVisible = isScrolledIntoView('.backto-ology');
    var gapBetweenTopMenuBottomAndBackToOlogyTop = $('.backto-ology').offset().top - $('#topmenu').height() - 13;
    
    if (backtoOlogyVisible == false){
        $('#post-sidebar').css('position', 'fixed');
        $('#post-sidebar').css('margin-top', -gapBetweenTopMenuBottomAndBackToOlogyTop);
    }
    else{
        $('#post-sidebar').css('position', '');
        $('#post-sidebar').css('margin-top', '0');
    }
    
});

function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop(),
    docViewBottom = docViewTop + $(window).height(),
    elemTop = $(elem).offset().top,
    elemBottom = elemTop + $(elem).height(),
    elemHeight = $(elem).height();
    
    return ((elemBottom <= docViewBottom) && (elemTop >= (docViewTop + elemHeight)));
}



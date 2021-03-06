var scrollTimer = null;

$(window).scroll(function () {
    if (scrollTimer) {
        clearTimeout(scrollTimer);   // clear any previous pending timer
    }
    scrollTimer = setTimeout(twoThirdScrollHomePage, 500);   // set new timer
});



function twoThirdScrollHomePage(){
    scrollTimer = null;
    var load = "<div class='loading'><img src='http://s3.amazonaws.com/ology/bundles/ologysocial/img/ajax-loader.gif'>Loading More</div>";
    var end = "<div id='end'>You've reached the end of the internets<div>";
    var scrollPosition = $(window).scrollTop();
    var conditionPosition = ((($(document).height() * 2) / 3) - ($(window).height() / 2));
    
    if ($(window).height() > 700)
        conditionPosition = conditionPosition - 100;
    
    if  (scrollPosition >= conditionPosition){
        if ($(".navigation").length) {
            $(load).appendTo("body").css("display","block");
            $.get( $(".navigation").attr("href"), function(data) { 
                $(".navigation").remove();
                $('#posts-box-home,#posts-box-ology, #posts-box').append( data ).linkify( function (links){links.attr('target', '_blank');} ).masonry( 'reload' );
                $("abbr.timeago").timeago();
                
            });
            $(".loading").delay(900).fadeOut();
        } else {
          $(".loading").delay(900).fadeOut();
          $(end).appendTo("body").css("display","block").hide().fadeIn().delay(800).fadeOut();
        }
    }

};
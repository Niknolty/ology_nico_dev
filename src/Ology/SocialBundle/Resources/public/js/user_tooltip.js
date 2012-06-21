$(document).ready(function(){
    $(".user-popupable").live("mouseover", function(e){
        var userId = $(this).attr("pid");
        var url = "/follow/" + userId + "/tooltip";
        var linkOffet = $(this).offset();
        var popupDiv = $('#tt-' + userId);
        setTimeout(function() {

            if (popupDiv.length == 0) {
                $('body').append("<div id='tt-" + userId + "' class='user-tooltip-container'><img src='/bundles/ologysocial/img/ajax-loader.gif' /></div>");
                popupDiv = $('#tt-' + userId);
                popupDiv.hide();
                linkOffet.top -= 145;
                if (linkOffet.left + 300 >= $('body').innerWidth()) {
                    linkOffet.left = $('body').innerWidth() - 350;
                }
                popupDiv.css(linkOffet);
                popupDiv.load(url , function() {
                            setTimeout(function() {
                                $('#tt-' + userId).show();
                                $('#tt-' + userId).mouseout(function() {$('#tt-' + userId).hide()});
                                $('#tt-' + userId).mouseover(function() {$('#tt-' + userId).show()});
                                $(".user-popupable").mouseout(function() {$('#tt-' + userId).hide()});
                                $("button").button();
                                $(".tt-display-full-sum").click("click", function() {
                                    $('#tt-' + userId).find('.tt-sum-part').hide();
                                    $('#tt-' + userId).find('.tt-sum-full').show();
                                });
                    }, 30);
                });
            } else {
                linkOffet.top -= 120;
                popupDiv.css(linkOffet);
            }

            popupDiv.show(); 
        }, 1420);
        
        e.preventDefault();
    });
    
    $("#user-tooltip-follow-button").live("click", function(){
        var button = $(this);
        var tooltip = $(this).closest(".user-tooltip").parent();
        var link = $(this).attr("href");
        
        if (button.hasClass("following-button")) {
            button.addClass("follow-button2").removeClass("following-button");
        } else {
            button.addClass("following-button").removeClass("follow-button2");
        }
        
        $.get(link, function(){
            if (button.hasClass("following-button")) {
                link = button.attr("href").replace('follow', 'unfollow');
            } else {
                link = button.attr("href").replace('unfollow', 'follow');
            }
            button.attr("href", link);
            tooltip.fadeOut("slow");
        });
    });
    
});
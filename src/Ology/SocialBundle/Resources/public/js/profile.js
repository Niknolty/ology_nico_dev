var stashDivToHide = null;

$(document).ready(function(){
    $(".show-ologies a").live("click", function(e) {
        var url = $(this).attr("href");
        $.get(url, function(data) {
            $('#profile-ologies-ology-container').css("display", "none");
            $('#profile-ologies-ology-container-aj').hide("slow");
            $('#profile-ologies-ology-container-aj').html(data);
            $('#profile-ologies-ology-container-aj').slideDown();
        });

        $(this).parent().removeClass("show-ologies");
        $(this).parent().addClass("hide-ologies");
        $('#ology-down-arr').hide();
        $('#ology-up-arr').show();

        e.preventDefault();
        return false;
    });

    $(".hide-ologies a").live("click", function(e) {
        $('#profile-ologies-ology-container-aj').slideUp();
        $('#profile-ologies-ology-container').show("slow");

        $(this).parent().removeClass("hide-ologies");
        $(this).parent().addClass("show-ologies");
        $('#ology-down-arr').show();
        $('#ology-up-arr').hide();

        e.preventDefault();
        return false;
    });

    $(".show-stashes a").live("click", function(e) {
        var url = $(this).attr("href");
        $.get(url, function(data) {
            $('#profile-stashes-stash-container').css("display", "none");
            $('#profile-stashes-stash-container-aj').hide("slow");
            $('#profile-stashes-stash-container-aj').html(data);
            $('#profile-stashes-stash-container-aj').slideDown();
        });

        $(this).parent().removeClass("show-stashes");
        $(this).parent().addClass("hide-stashes");
        $('#stash-down-arr').hide();
        $('#stash-up-arr').show();

        e.preventDefault();
        return false;
    });

    $(".hide-stashes a").live("click", function(e) {
        $('#profile-stashes-stash-container').css("display", "block");
        $('#profile-stashes-stash-container-aj').slideUp();
        $('#profile-stashes-stash-container').show("slow");

        $(this).parent().removeClass("hide-stashes");
        $(this).parent().addClass("show-stashes");
        $('#stash-down-arr').show();
        $('#stash-up-arr').hide();

        e.preventDefault();
        return false;
    });


    $("#profile-posts-post-container").masonry({
        itemSelector : '.post',
        columnWidth : 218,
        isFitWidth: true,
        reload: true
    });
    
    $(".stash-preview").live({
        mouseover: function() {
            $(this).find(".stash-delete").show();
        },
        mouseout: function() {
            $(this).find(".stash-delete").hide();
        }
    });
    
    $(".stash-delete-link").live("click", function(e) {
        stashDivToHide = $(this).closest('.stash-preview');
        var link = $(this).attr("href");
        $("#hiddenConfirmUrl").val(link);
        $("#stash-delete-confirm").show();
        e.preventDefault();
        return false;
    });
    
    $("#alert-confirm-button").live("click", function(e) {
        $("#stash-delete-confirm").hide();
        var link = $("#hiddenConfirmUrl").val();        
        $.get(link, function() {
            stashDivToHide.animate({width:'hide'}, 300);
        });

        e.preventDefault();
    });
    
    $("#alert-cancel-button").live("click", function(e) {
        $("#stash-delete-confirm").hide();
        e.preventDefault();
        return false;
    });

    $(window).scroll(function(){
        var load = "<div class='loading'><img src='http://s3.amazonaws.com/ology/bundles/ologysocial/img/ajax-loader.gif'>Loading More</div>";
        var end = "<div id='end'>You've reached the end of the internets<div>";

        if  ($(window).scrollTop() == $(document).height() - $(window).height()){
            if ($(".navigation").length) {
                $(load).appendTo("body").css("display","block");
                $.get( $(".navigation").attr("href"), function(data) {
                    $(".navigation").remove();
                    $('#profile-posts-post-container').append(data);
                    $('#profile-posts-post-container').linkify( function (links){links.attr('target', '_blank');} );
                    $("abbr.timeago").timeago();
                    $('#profile-posts-post-container').masonry('reload');
                });
                $(".loading").delay(900).fadeOut();
            } else {
                $(".loading").delay(900).fadeOut();
                $(end).appendTo("body").css("display","block").hide().fadeIn().delay(800).fadeOut();

            }
        }
    });
    
    $("#follow-button").live("click", function(){
        // Close other opened popup
        $("#follow-user-popup").dialog("close");
        
        var link = $(this).attr("href");
        
        $("#follow-popup").load(link, function(){
            // This active the ology-theme button
            $("input:submit").button();
            $("#follow-user-popup").dialog({
                show: "fade",
                hide: "fade",
                minWidth: 450,
                minHeight:250
            });
        });
    });
    
    $(".follow-ologies .not-selected, .follow-stashes .not-selected").live("click", function(){
        $(this).removeClass("not-selected").addClass("is-selected");
    });

    $(".follow-stashes .is-selected, .follow-ologies .is-selected").live("click", function(){
        $(this).removeClass("is-selected").addClass("not-selected");
    });
    
    $("#follow-submit").live("click", function(e){

        var parent = $("#follow-user-popup");
        var followeeId = parent.find("#followee-id").val();
        var stashesIds = [];
        var ologiesIds = [];
        
        $(parent).dialog("destroy");
        
        $(parent).find(".follow-ologies .is-selected").each(function() {
            var ologyId = $(this).attr("ology-id");
            if (ologyId != null){
                ologiesIds.push( +ologyId );
            }
        });
        
        $(parent).find(".follow-stashes .is-selected").each(function() {
            var stashId = $(this).attr("stash-id");
            if (stashId != null){
                stashesIds.push( +stashId );
            }
        });

        var serializedStashesIds = stashesIds.join('-');
        var link = "/svc/follow/" + followeeId + "/stashes/" + serializedStashesIds;
        $.get(link, function(){
            // Second call for ologies
            var serializedOlogiesIds = ologiesIds.join('-');
            var ologiesLink = "/svc/follow/" + followeeId + "/ologies/" + serializedOlogiesIds;
            $.get(ologiesLink);
            
            $("#follow-user-popup").fadeOut("slow", function() {
                $(this).dialog("destroy");
                $("#follow-user-popup").remove();
            });
        });
        
        e.preventDefault();
        
    });
    
    profileRightContentSave = "";
    
    $("#followees-page-link, #followers-page-link").live("click", function(e){
        var link = $(this).attr("href");
        var profileRight = $("#profile-right");

        profileRight.hide('slide', {}, 400, function() {
            $.get(link, function (data) {
                profileRightContentSave = profileRight.html();
                profileRight.html( data );
                profileRight.show('slide', {}, 400);
                
                $("#close-followees-page").button({
                    icons: {primary: "ui-icon-closethick"},
                    text: false
                });
            });
        });
        
        e.preventDefault();
    });
    
    $("#close-followees-page").live("click", function(){
        var profileRight = $("#profile-right");
        profileRight.hide('slide', {}, 400, function() {
            profileRight.html( profileRightContentSave );
            profileRight.show('slide', {}, 400);
        });
    });
    
    $("#follow-everything").live("click", function(){       
        if ($("#follow-everything").hasClass("is-selected")) {
            $(this).removeClass("is-selected").addClass("not-selected");
            $(".follow-stashes .is-selected").removeClass("is-selected").addClass("not-selected");
            $(".follow-ologies .is-selected").removeClass("is-selected").addClass("not-selected");
        } else if ($("#follow-everything").hasClass("not-selected")) {
            $(this).removeClass("not-selected").addClass("is-selected");
            $(".follow-stashes .not-selected").removeClass("not-selected").addClass("is-selected");
            $(".follow-ologies .not-selected").removeClass("not-selected").addClass("is-selected");
        } 
    });
    
});
/**
 * We use this js in a card and in a post.
 * So to get the different elements, we need to get the parent node.
 */
function getParent(node) {
    var parent = node.closest(".post-content");
    
    if (parent.length == 0) { // We are not in a card
        parent = $("#post-sidebar-infos");
    }
    
    return parent;
}

$("#reologize-submit").live("click", function(){

    var parent = $(".reologize-popup");
    var postId = parent.find("#post-id").val();
    var stashesIds = parent.find("#hidden-stash").val();
    var ologiesIds = parent.find("#hidden-ology").val();
    var link = "/reologize/" + postId + "/" + stashesIds + '/' + ologiesIds;

    parent.dialog("close");
    if (stashesIds != 0 || ologiesIds != 0 ) {
        // Call Ajax to save the reologizing, then call the success popup
        $.get(link, function() {
            parent.load("/reologize/popup/success/" + postId, function(){
                var $popup = parent.find(".success-popup");
                $popup.dialog({
                    resizable: false,
                    show: "fade",
                    hide: "fade",
                    height: 110,
                    width:  350
                });
            });
        });
    }
});

$(".reologize-link").live("click", function(e){
    // Close other opened popup
    $(".reologize-popup").dialog("close");
    $(".success-popup").dialog("close");
    
    var buttonPosition = $(this);
    var link = $(this).attr("href");
    var $myparent = getParent($(this));
    
    $myparent.find(".mypopup").load(link, function(){
        // This active the ology-theme button
        $("input:submit").button();
        
        var $popup = $(this).find(".reologize-popup");
        $popup.dialog({
            resizable: false,
            show: "fade",
            hide: "fade",
            minWidth: 300,
            minHeight: 350
        });
        $popup.dialog("widget").position({
           my: 'center top',
           at: 'center top',
           of: buttonPosition,
           offset: '-10px'
        });
    });
    e.preventDefault();
});

$(".success-popup .popup-close").live("click", function(e){
    $(".success-popup").fadeOut();
});

$(".post-content").live({
    mouseover: function() {
        $(this).find(".reologize-card").css("display", "block");
    },
    mouseout: function() {
        $(this).find(".reologize-card").css("display", "none");
    }
});

$("#reologize-form .not-selected").live("click", function(e){
    $(this).removeClass("not-selected").addClass("is-selected");
    var type = $(this).attr("ologyOrStash");
    var id = $(this).attr(type + "-id");
    var hiddenField = $(".reologize-popup").find("#hidden-"+type);
    hiddenField.val( hiddenField.val() + '-' + id );
    
    e.preventDefault();
    return false;
});

$("#reologize-form .is-selected").live("click", function(e){
    $(this).removeClass("is-selected").addClass("not-selected");
    var type = $(this).attr("ologyOrStash");
    var id = $(this).attr(type + "-id");
    
    var hiddenField = $(".reologize-popup").find("#hidden-"+type);
    hiddenField.val(hiddenField.val().replace("-" + id, ""));
});

$(".reologize-text-button a").live("click", function(e){
    var link = $(this).attr("href");

    $.get(link);
    
    // Delete the all text related to reologized
    $(this).closest(".unreologize").fadeOut("slow", function(){
        $(this).closest(".unreologize").remove();
    })

    e.preventDefault();
});

$(".reologize-text-button").live({
    mouseover: function() {
        $(this).find(".undo-reologize").text("Undo ReOlogize");
    },
    mouseout: function() {
        $(this).find(".undo-reologize").text("ReOlogized");
    }
});

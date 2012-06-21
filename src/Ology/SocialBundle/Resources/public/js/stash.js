/**
  * @author raphael
  */
 
 /**
  * This function is used in create and edit stash.
  */
function activateTagitInput() {
    
    $("#ology_socialbundle_stashform_tagsStashes").tagit({
        caseSensitive:  false,
        allowSpaces:    false,
        minLength:      2,
        removeConfirmation: true,
        tagSource:      function( request, response ) {
            $.ajax({
                url: "/svc/tag/getAjaxTags", 
                data: {tag:request.term},
                dataType: "json",
                success: function( data ) {
                    response( $.map( data, function( item ) {
                        return {
                            label: item.label,
                            value: item.value
                        }
                    }));
                }
            });
        }
    });
    
    $(".ui-autocomplete-input").attr("placeholder", "Ex: Music, traveling, design, sports, etc.").attr("id", "input-with-placeholder");
}

var ologyDivToHide = null;

$(document).ready(function(){
    $(".create-stash").click(function() {
        $("#content").load("/create/stash", activateTagitInput())        
    });

    $(".create-ology").click(function() {
        $("#content").load("/create/ology");
    });

    $("#edit-stash").live("click", function() {
        $("#edit-stash").replaceWith("<div id='save-edit'><b>Save</b></div>");
        $("#stash-title").addClass("editable");

        // Edit Tags
        var tags = $("#stash-stats").text();
        tags = tags.replace(/\s+/g,","); // Remove f*****g spaces
        $("#stash-stats").replaceWith("<input type='text' id='ology_socialbundle_stashform_tagsStashes' name='ology_socialbundle_stashform[tagsStashes]' required='required' value='" + tags + "'>");
        activateTagitInput();

        // Edit title
        var title = $("#editable-title").text();
        $("#editable-title").replaceWith("<input type type='text' id='new-title' value='" + title + "'>");

    });

    $("#save-edit").live("click", function() {
        var stashId = $("#stashId").attr("stashId");
        var tags = $("#ology_socialbundle_stashform_tagsStashes").val();
        var name = $("#new-title").val();
        var link = "/svc/stash/edit/" + stashId + "/" + name + "/" + tags;

        if (tags != "") {
            $("#stash-title").replaceWith("<div id='stash-title'><h2 id='editable-title'>" + $("#new-title").val() + "</h2>"+
            "<div id='stash-stats'>" + tags.replace(/,/g, " ") + "</div></div>");

            $("#save-edit").replaceWith("<div id='edit-stash'><b> Edit</b></div>");

            $.get(link);
        } else {
            alert('You must have at least one tag!');
        }

    });

    $(".stash-delete-card-link").live("click", function(e) {
        var link = $(this).attr("href");
        $("#hiddenConfirmUrl").val(link);
        ologyDivToHide = $(this).closest('.post');
        $("#stash-delete-confirm").show();
        e.preventDefault();
        return false;
    });

    $("#alert-confirm-button").live("click", function(e) {
        $("#stash-delete-confirm").hide();
        var url = $("#hiddenConfirmUrl").val();
        $.get(url, function() {
            ologyDivToHide.fadeOut("slow", function() {
                ologyDivToHide.remove();
                setTimeout(function(){
                    $('#posts-box-stash').masonry('reload');
                }, 300);
            });
        });
        e.preventDefault();
        return false;
    });

    $("#alert-cancel-button").live("click", function(e) {
        $("#stash-delete-confirm").hide();
        e.preventDefault();
        return false;
    });

    $(".post").live({
        mouseover: function() {
            $(this).find(".stash-delete-card").show();
        },
        mouseout: function() {
            $(this).find(".stash-delete-card").hide();
        }
    });

    $("#posts-box-stash").masonry({
        itemSelector : '.post',
        isFitWidth: false,
        reload: true
    });

    activateTagitInput();
});
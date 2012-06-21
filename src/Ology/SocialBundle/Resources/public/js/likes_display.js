$(".post").live({
    mouseover: function() {
        $(this).find(".likes-card").css("display", "block");
    },
    mouseout: function() {
        $(this).find(".likes-card").css("display", "none");
    }
});

function resetCardLikes($likesNode) {
    $likesNode.find(".love-card-clicked").removeClass("love-card-clicked").addClass("love-card");
    $likesNode.find(".hate-card-clicked").removeClass("hate-card-clicked").addClass("hate-card");
    $likesNode.find(".hmm-card-clicked").removeClass("hmm-card-clicked").addClass("hmm-card");
}

function resetCardLinks($likesNode) {
    try{
        var link = $likesNode.find(".love-card").attr('href');
        link = link ? $likesNode.find(".love-card").attr('href', link.replace('unlove', 'love')): '';

        link = $likesNode.find(".hate-card").attr('href');
        link = link ? $likesNode.find(".hate-card").attr('href', link.replace('unhate', 'hate')): '';
  
        link = $likesNode.find(".hmm-card").attr('href');
        link = link ? $likesNode.find(".hmm-card").attr('href', link.replace('unhmm', 'hmm')): '';
    }
    catch(err){
    }
}

function resetPostLikes($likesNode) {
    $likesNode.find(".love-post-clicked").removeClass("love-post-clicked").addClass("love-post");
    $likesNode.find(".hate-post-clicked").removeClass("hate-post-clicked").addClass("hate-post");
    $likesNode.find(".hmm-post-clicked").removeClass("hmm-post-clicked").addClass("hmm-post");
}

function resetPostLinks($likesNode) {
    try{
        var link = $likesNode.find(".love-post").attr('href');
        link = link ? $likesNode.find(".love-post").attr('href', link.replace('unlove', 'love')): '';

        link = $likesNode.find(".hate-post").attr('href');
        link = link ? $likesNode.find(".hate-post").attr('href', link.replace('unhate', 'hate')): '';
  
        link = $likesNode.find(".hmm-post").attr('href');
        link = link ? $likesNode.find(".hmm-post").attr('href', link.replace('unhmm', 'hmm')): '';
    }
    catch(err){
    }
}

// CARD

function likesCount(currentNode, likesClass, likeType, isInc){
    var timesLiked = currentNode.attr("id");
    if (isInc){
        timesLiked++;
        if (timesLiked == 1){
            currentNode.closest(".post-content").find(likesClass).show().html(" " + timesLiked + " " + likeType + " ");
        }
        else
            currentNode.closest(".post-content").find(likesClass).html(" " + timesLiked + " " + likeType + 's');
    }
    else{
        if (timesLiked == 2)
           currentNode.closest(".post-content").find(likesClass).html(" " + timesLiked + " " + likeType);    
        else if (timesLiked > 2)
           currentNode.closest(".post-content").find(likesClass).html(" " + timesLiked + " " + likeType + 's');
        else
            currentNode.closest(".post-content").find(likesClass).remove();
    }
}

$(".love-card").live("click", function(event){
    resetCardLikes($(this).closest(".likes-card"));
    
    likesCount($(this), ".loves-count", "love", true);
    
    var link = $(this).attr("href");
    
    $(this).removeClass("love-card").addClass("love-card-clicked");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('love', 'unlove');
    resetCardLinks($(this).closest(".likes-card")); 
    
});

$(".love-card-clicked").live("click", function(event){
    var link = $(this).attr("href");
    
    likesCount($(this), ".loves-count", "love", false);
    $(this).removeClass("love-card-clicked").addClass("love-card");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('unlove', 'love');
});

$(".hate-card").live("click", function(event){
    resetCardLikes($(this).closest(".likes-card"));
    likesCount($(this), ".hates-count", "hate", true);    
    var link = $(this).attr("href");

    $(this).removeClass("hate-card").addClass("hate-card-clicked");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('hate', 'unhate');
    
    resetCardLinks($(this).closest(".likes-card"));
});

$(".hate-card-clicked").live("click", function(event){
    var link = $(this).attr("href");
    likesCount($(this), ".hates-count", "hate", false);
 
    $(this).removeClass("hate-card-clicked").addClass("hate-card");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('unhate', 'hate');
});

$(".hmm-card").live("click", function(event){
    resetCardLikes($(this).closest(".likes-card"));
    likesCount($(this), ".hmms-count", "hmm", true);    
    var link = $(this).attr("href");
    
    $(this).removeClass("hmm-card").addClass("hmm-card-clicked");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('hmm', 'unhmm');
    
    resetCardLinks($(this).closest(".likes-card"));
});

$(".hmm-card-clicked").live("click", function(event){
    var link = $(this).attr("href");
    likesCount($(this), ".hmms-count", "hmm", false);
    
    $(this).removeClass("hmm-card-clicked").addClass("hmm-card");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('unhmm', 'hmm');
});

// POST

$(".love-post").live("click", function(event){
    resetPostLikes($(this).closest(".likes-post"));

    var link = $(this).attr("href");
    $(this).removeClass("love-post").addClass("love-post-clicked");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('love', 'unlove');
    
    $("#like-feedback-prompt-box").css("display", "block");
    $("#like-feedback-prompt-title").html("<h2>Nice feedback.</h2>")
    $('#like-feedback-prompt-sentence').html("<p>Now, wanna share it?</p>");
    
    resetPostLinks($(this).closest(".likes-post"));
});

$(".love-post-clicked").live("click", function(event){
    var link = $(this).attr("href");
    $(this).removeClass("love-post-clicked").addClass("love-post");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('unlove', 'love');
});

$(".hate-post").live("click", function(event){
    resetPostLikes($(this).closest(".likes-post"));
        
    var link = $(this).attr("href");
    $(this).removeClass("hate-post").addClass("hate-post-clicked");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('hate', 'unhate');
    
    $("#like-feedback-prompt-box").css("display", "block");
    $("#like-feedback-prompt-title").html("<h2>Nice feedback.</h2>")
    $('#like-feedback-prompt-sentence').html("<p>Now, wanna share it?</p>");
    
    resetPostLinks($(this).closest(".likes-post"));
});

$(".hate-post-clicked").live("click", function(event){
    var link = $(this).attr("href");
    $(this).removeClass("hate-post-clicked").addClass("hate-post");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('unhate', 'hate');
});

$(".hmm-post").live("click", function(event){
    resetPostLikes($(this).closest(".likes-post"));
        
    var link = $(this).attr("href");
    $(this).removeClass("hmm-post").addClass("hmm-post-clicked");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('hmm', 'unhmm');
    
    $("#like-feedback-prompt-box").css("display", "block");
    $("#like-feedback-prompt-title").html("<h2>Nice feedback.</h2>")
    $('#like-feedback-prompt-sentence').html("<p>Now, wanna share it?</p>");
    
    resetPostLinks($(this).closest(".likes-post"));
});

$(".hmm-post-clicked").live("click", function(event){
    var link = $(this).attr("href");
    $(this).removeClass("hmm-post-clicked").addClass("hmm-post");
    $.post(link);
    event.preventDefault();
    this.href = this.href.replace('unhmm', 'hmm');
});
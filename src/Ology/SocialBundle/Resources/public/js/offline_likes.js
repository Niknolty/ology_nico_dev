function OfflineLikesCount(currentNode, likesClass, likeType){
    var timesLiked = currentNode.val();
    timesLiked++;

    if (timesLiked == 1)
        currentNode.closest(".post-content").find(likesClass).html(" " + timesLiked + " " + likeType);
    else
        currentNode.closest(".post-content").find(likesClass).html(" " + timesLiked + " " + likeType + 's');
}

$(".love-click-offline").live("click", function(){  
    var post_id = $(this).attr("id");

    OfflineLikesCount($(this), ".loves-count", "love");
    
    $.post("/svc/likes/offline_love", {pid: post_id});
    $('#register-prompt-title').html("<h2>Nice Feedback.</h2>");    
    $('#register-prompt-sentence').html("<p>Awesome, glad you're a fan! Now log in and we'll show you even more cool stuff.</p>");
    $("#register-prompt-div").addClass("register-prompt-open");
    $("#register-prompt-box").css("display", "block");
    event.preventDefault();
});
$(".hate-click-offline").live("click", function(){
    var post_id = $(this).attr("id"); 
   
    OfflineLikesCount($(this), ".hates-count", "hate");
    
    $.post("/svc/likes/offline_hate",
        {pid: post_id});
    $('#register-prompt-title').html("<h2>Nice Feedback.</h2>");
    $('#register-prompt-sentence').html("<p>Clearly someone has an opinion! Why not log in and share your thoughts on the topic?</p>");
    $("#register-prompt-div").addClass("register-prompt-open");
    $("#register-prompt-box").css("display", "block");
    event.preventDefault();
});
$(".hmm-click-offline").live("click", function(){
    var post_id = $(this).attr("id"); 
    
    OfflineLikesCount($(this), ".hmms-count", "hmm");
    
    $.post("/svc/likes/offline_hmm",
        {pid: post_id});
    $('#register-prompt-title').html("<h2>Nice Feedback.</h2>");
    $('#register-prompt-sentence').html("<p>Not sure how you felt? Log in and find more stuff that might pique your interest.</p>");
    $("#register-prompt-div").addClass("register-prompt-open");
    $("#register-prompt-box").css("display", "block");
    event.preventDefault();
});




$(".comment-button-prompt").live("click", function(e){
    e.preventDefault();
    var com_token = $("#commentForm__token").val();
    var com_content = $("#commentForm_content").val();
    var com_pid = $("#commentForm_postId").val();
    //$.post("http://ology4.com/app_dev.php/svc/comment/rcom",
    $.post("/svc/comment/rcom",
           { token: com_token, c: com_content, p: com_pid });
    $('#register-prompt-title').html("<h2>You're so close!</h2>");       
    $('#register-prompt-sentence').html("<p>We will post your comment as soon as you...</p>");
    $("#register-prompt-div").addClass("register-prompt-open");
    $("#register-prompt-box").css("display", "block");
});
$("#post-button-prompt").click(function(){
    var post_token = $("#postForm__token").val();
    var post_title = $("#postForm_title").val();
    var post_textContent = $("#postForm_textContent").val();
    var post_imageFile = $("#postForm_imageFile").val();
    var post_imageUrl = $("#postForm_imageUrl").val();
    var post_videoUrl = $("#postForm_videoUrl").val();
    var post_audioFile = $("#postForm_audioFile").val();
    var post_postTypeId = $("#postForm_postTypeId").val();
    var post_firstOlogyId = $("#postForm_firstOlogyId").val();
 
    //$.post("http://ology4.com/app_dev.php/svc/post/rpost",
    $.post("/svc/post/rpost",
           { token: post_token, title: post_title, textC: post_textContent, imgF: post_imageFile,
           imgUrl: post_imageUrl, videoUrl: post_videoUrl, audioF: post_audioFile, postTypeId: post_postTypeId,
            ology_id: post_firstOlogyId});
    $('#register-prompt-title').html("<h2>You're so close!</h2>"); 
    $('#register-prompt-sentence').html("<p>You will see your post as soon as you...</p>");
    $("#register-prompt-div").addClass("register-prompt-open");
    $("#register-prompt-box").css("display", "block");
    event.preventDefault();
});
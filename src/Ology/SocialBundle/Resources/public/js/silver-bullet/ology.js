$(document).ready(function(){            
      $(".comment-form-card textarea").live({
        focusin: function() {
            if (this.value == 'Comment'){this.value = '';} 
        },
        focusout: function() {
            if (this.value == ''){this.value = 'Comment';}
        }
      });
          
      
      $("abbr.timeago").timeago();
      $('#posts-box-main, #container-splash, #container-ology, #posts-box-main-home, #profile-content').linkify( function (links){links.attr('target', '_blank');} );
      // $('#posts-box').isotope({
      //   // options
      //   itemSelector : '.post',
      //   columnWidth : 340,
      //   isAnimated: true,
      //   reLayout: true 
      // });

      $.ajaxSetup({
        error: function(xhr, status, error) {
          //$('body').append('<div class="error">We\'re experimenting some technological differences - X</div>' );
          //$('body').append('<div class="error">' + xhr.responseText + '</div>' ); // Dev debug mod
        }
      });
      
      // This active the ology-theme style on <button></button>
      $("button").button();
      
      $(".clink").live("click", function(e){
          e.preventDefault();
          var foo = $(this).attr("href") + " .inline-comments";
          $(this).parent().html("<div class='comment-load'></div>  Loading...").load( foo , function(){
            setTimeout(function(){$("abbr.timeago").timeago() , $('#posts-box-home,#posts-box-ology, #posts-box, #container-splash').masonry()}, 100), $('#posts-box-main, #container-splash, #container-ology, #posts-box-main-home, #profile-content').linkify( function (links){links.attr('target', '_blank');} );
          });
      });
      
      
      $(".get-previous-post").live("click", function(e){
        var previous_post_link = $(this).attr("href");
        $(this).closest("#container-post").fadeOut(1000);
        location.href= previous_post_link; 
      });
      
      $(".back-to-current-ology").live("click", function(e){
        var ology_link = $(this).attr("href");
        location.href= ology_link; 
      });
      
      $(".get-next-post").live("click", function(e){
        var next_post_link = $(this).attr("href");
        $(this).closest("#container-post").fadeOut(1000);
        location.href= next_post_link; 
      });
      
      $(".show-postcard-comments").live("click", function(e){
          $(this).removeClass("show-postcard-comments").addClass("hide-postcard-comments");
          $(this).closest(".post").find(".two-first-comment").hide();
          var foo = $(this).attr("href") + " .inline-comments";
          $(this).parent().html("<div class='comment-load'></div>  Loading...").load(foo , function(){
            setTimeout(function(){$("abbr.timeago").timeago() , $('#profile-posts-post-container, #posts-box-home,#posts-box-ology, #posts-box, #container-splash, #profile-posts, #channel-posts, #posts-box-main-stash').masonry()}, 100), $('#posts-box-main, #container-splash, #container-ology, #posts-box-main-home, #profile-content').linkify( function (links){links.attr('target', '_blank');});
          });
          e.preventDefault();
      });
      
      
      $(".hide-postcard-comments").live("click", function(e){
          var link = $(this).attr("href");
          $('html,body').animate({scrollTop: $(this).closest(".post").offset().top - 70}, 1000);
          $(this).parent().removeClass("inline-comments");
          $(this).closest(".post").find(".two-first-comment").show();
          $(this).parent().parent().html("<div class=\"show-postcard-comments\" href=\""+link+"\">show comments</div>");
          e.preventDefault();
      });
     
     // Add by Nicolas Le Deaut 05/09/2012, modified 05/15/2012, automatic scroll when a user click on comments in a pro or user post page
     $("#scrollUpToCommentBox").live("click", function(e){
        $('html,body').animate({scrollTop: $(".comments").offset().top - 70}, 1000);
     });
     
     
     $("#scroll-when-post-comment").live("click", function(e){
        $('html,body').animate({scrollTop: $("#comment-scroll").offset().top - 350}, 1000);
     });
     // End   
      
     $("#form-comment-inline").live("submit",function(event){
          var action = $(this).attr("action");
          var post = $(this).serialize();  
          var show_comment = $(this).closest(".post").find(".show-postcard-comments");
          var hide_comment = $(this).closest(".post").find(".hide-postcard-comments");
          
          
          var comments = $(this).closest(".post").find(".show-comments");
          if (show_comment.length > 0){
            href = show_comment.attr("href"); 
            var load_comments = href  + ".inline-comments";
            show_comment.removeClass("show-postcard-comments").addClass("hide-postcard-comments");
            $(this).closest(".post").find(".two-first-comment").hide();
            comments.html("<div class='comment-load'></div>  Loading...").load(load_comments);
          }
          else{
            href = hide_comment.attr("href");
            var load_comments = href + ".inline-comments";
            $(this).closest(".post").find(".two-first-comment").hide();
          }
          
          
          $.get(action, post, function(data){
              comments.html(data);
              $("abbr.timeago").timeago();
              setTimeout(function(){$('#posts-box-home,#posts-box-ology, #posts-box, #container-splash, #posts-box-main-stash').masonry()}, 100), $('#posts-box-main, #container-splash, #container-ology, #posts-box-main-home, #profile-content').linkify( function (links){links.attr('target', '_blank');} );
          });
          
          event.preventDefault();
      });
        
     
     $("#form-comment-inline #commentForm_content").live("keypress", function(event){   
            if(event.which == 13) {
                $(this).parent().parent().submit();
                $(this).val("");
            }
      });
     
     
     $("#offline-form-comment-inline #commentForm_content").live("click", function(){
        $(this).keypress(function(e) {
            if(e.which == 13) {
                var com_token = $("#commentForm__token").val();
                var com_content = $("#commentForm_content").val();
                var com_pid = $("#commentForm_postId").val();
                //$.post("http://ology4.com/app_dev.php/svc/comment/rcom",
                $.post("/svc/comment/rcom",
                    {token: com_token, c: com_content, p: com_pid});
                    
                $('#register-prompt-title').html("<h2>You're so close!</h2>");       
                $('#register-prompt-sentence').html("<p>We will post your comment as soon as you...</p>");
                $("#register-prompt-div").addClass("register-prompt-open");
                $("#register-prompt-box").css("display", "block");
                $(this).val("");
            }
        });
      });
      
      
      $("#offline-form-comment #commentForm_content").live("click", function(){
        $(this).keypress(function(e) {
            if(e.which == 13) {
                var com_token = $("#commentForm__token").val();
                var com_content = $("#commentForm_content").val();
                var com_pid = $("#commentForm_postId").val();
                //$.post("http://ology4.com/app_dev.php/svc/comment/rcom",
                $.post("/svc/comment/rcom",
                    {token: com_token, c: com_content, p: com_pid});
                    
                $('#register-prompt-title').html("<h2>You're so close!</h2>");       
                $('#register-prompt-sentence').html("<p>We will post your comment as soon as you...</p>");
                $("#register-prompt-div").addClass("register-prompt-open");
                $("#register-prompt-box").css("display", "block");
                $(this).val("");
            }
        });
      });
      
          
     $("#form-comment").submit(function(event){
        event.preventDefault();
        var action = $("#form-comment").attr("action");
        var comment = $("#form-comment").serialize();
        $.get(action, comment, function(data){
             $("#comments").html(data); 
             $("abbr.timeago").timeago();
             setTimeout(function(){$('#posts-box-home,#posts-box-ology, #posts-box, #container-splash').masonry()}, 100), $('#posts-box-main, #container-splash, #container-ology, #posts-box-main-home, #profile-content').linkify( function (links){links.attr('target', '_blank');} );
          });
        $("#commentForm_content").val("");
      });
     
     
    $("#form-comment #commentForm_content").live("click", function(){
        $(this).keypress(function(e) {
          if(e.which == 13) {
              $(this).parent().parent().submit();
              $(this).val("");
          }
        });
     }); 
     
     
    $(document).keyup(function(e) {
      if (e.which == 27) {
      $(".login-link").addClass("login-open");
      $(".login-box").css("display", "block");
      $("#username").focus();
       }
    });

      $("#filters a").live("click", function(){
          var cat = $(this).attr("data-filter").substring(1);
          var url = '/splash/0/15/'.concat(cat);
          $.get(url, function(data) {
            $('#container-splash').html( data );
            $('#container-splash').masonry('reload');
            $("abbr.timeago").timeago();
          });
          $("#filters a").removeClass("on");
          $(this).toggleClass("on");
      });

      $('#post-filters a').click(function(){
        var selector = $(this).attr('data-filter');
        $('#posts-box').isotope({filter: selector});
        return false;
      });

      // homepage post something
      $(".post-something, .post-ology").click( function(){
        $(this).stop().addClass( "post-open", 400);
      });

      $(".cancel").click(function(event){
        event.stopPropagation();
        $(".post-something,.post-ology").removeClass("post-open", 200);
        $(".media-box").css("display","block");
        $("#image_field, #video_field, #audio_field").css("display","none");
        $("#postForm_postTypeId").val("2");
        $("#postForm_imageFile, #postForm_videoUrl, #postForm_audioFile").val(null);
        $("#postForm_title").val("Title");
        $("#postForm_textContent").val("Write something...");
        $('.post-button').removeAttr('disabled');
        
        $('#img-web').css("display", "block");
        $('#img-or').css("display", "block");
        $('#img-upload').css("display", "block");
        $('#input-img-grabber').val("");
        $('#postForm_imageUrl').val("");
        $('#grabbed-image').html("");
      });

      $(".cancel-edit").click(function(event){
        event.stopPropagation();
        var posttype = $("#ptype").html();
        $(".media-box-edit").css("display","none");
        $("#image_field, #video_field, #audio_field").css("display","none");
        $("#postForm_postTypeId").val(posttype);
        $("#postForm_imageFile, #postForm_videoUrl, #postForm_audioFile").val(null);
        $("#edit-box").css("display", "none");
        $('.post-button').removeAttr('disabled');
        $("#post-main, #edit-buttons, #remove-post-icon, .delete-item, .space-item, .edit-item, .delete-item-yes").css("display", "block");   
      });

      $(".cancel-edit-x").click(function(){
        var posttype = $("#ptype").html();

        $(".media-box-edit").css("display","block");
        $("#image_field, #video_field, #audio_field").css("display","none");
        $("#postForm_postTypeId").val("2");
        $('.post-button').removeAttr('disabled');
          if ( ($("#postForm_title").val() == "Picture This") || ($("#postForm_title").val() == "Listen Up") || ($("#postForm_title").val() == "Watch This") ){
              $("#postForm_title").val("Title");
            }
      });

      $("#remove-post-icon").click(function(){
        $(this).css("display","none");
        $("#postForm_postTypeId").val("2");
        $(".media-box-edit").css("display","block");
        $("#postForm_imageFile, #postForm_videoUrl, #postForm_audioFile").val(null);
      });

      $(".edit-item").live("click", function(event){
        event.preventDefault();
        var posttype = $("#ptype").html();
        $("#edit-box").css("display", "block");
        $("#post-main, #edit-buttons, .delete-item, .space-item, .edit-item, .delete-item-yes").css("display", "none");    
          if (posttype == '2'){  
            $(".media-box-edit").css("display","block");
            $("#remove-post-icon").css("display","none");
          }           
      });

      $("#postForm_title").focus(function(){
          if (this.value == 'Title'){this.value = '';} 
        }).blur(function(){
          if (this.value == ''){this.value = 'Title';} 
      });

      $("#postForm_textContent").focus(function(){
          if (this.value == 'Write something...'){this.value = '';$('.post-button').removeAttr('disabled');} 
        }).blur(function(){
          if (this.value == ''){this.value = 'Write something...';$('.post-button').removeAttr('disabled');} 
      });

      $(".cancel-x").click(function(){
        $(".media-box").css("display","block");
        $("#image_field, #video_field, #audio_field").css("display","none");
        $("#postForm_postTypeId").val("2");
        $("#postForm_imageFile, #postForm_videoUrl, #postForm_audioFile").val(null);
        $('.post-button').removeAttr('disabled');
        if ( ($("#postForm_title").val() == "Picture This") || ($("#postForm_title").val() == "Listen Up") || ($("#postForm_title").val() == "Watch This") ){
              $("#postForm_title").val("Title");
            }
        $('#img-web').css("display", "block");
        $('#img-or').css("display", "block");
        $('#img-upload').css("display", "block");
        $('#input-img-grabber').val("");
        $('#postForm_imageUrl').val("");
        $('#grabbed-image').html("");
      });

      $(".add-image").click( function(){
        var imgval = $("#postForm_imageFile").val();
        $(".media-box, .media-box-edit").css("display","none");
        $("#image_field").css("display","block");
        $("#postForm_postTypeId").val("3");
        if (imgval == ""){  
          $('.post-button').attr('disabled', 'disabled');
        }
          if ($("#postForm_title").val() == "Title" ){  
              $("#postForm_title").val("Picture This");
          }
      });

      $("#postForm_imageFile, #ologyForm_imageFile").change(function(){
          var val = $(this).val();
          switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
              case 'gif': case 'jpg': case 'jpeg': case 'png':
                  $('.post-button').removeAttr('disabled');
                  break;
              default:
                  $(this).val('');
                  // error message here
                  $('body').append('<div class="error">Please select an image file |  X</div>' );
                  $('.post-button').attr('disabled', 'disabled');
                  break;
          }
      });

      $("#postForm_audioFile").change(function(){
          var val = $(this).val();
          switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
              case 'mp3': case 'wav':
                  $('.post-button').removeAttr('disabled');
                  break;
              default:
                  $(this).val('');
                  // error message here
                  $('body').append('<div class="error">Please select an audio file |  X</div>' );
                  $('.post-button').attr('disabled', 'disabled');
                  break;
          }
      });

      $(".add-video").click( function(){
        var videoval = $("#postForm_videoUrl").val();
        $(".media-box, .media-box-edit").css("display","none");
        $("#video_field").css("display","block");
        $("#postForm_postTypeId").val("4");
        if (videoval == ""){
          $('.post-button').attr('disabled', 'disabled');
        }
          if ($("#postForm_title").val() == "Title" ){
              $("#postForm_title").val("Watch This");
          }
      });

      $("#postForm_videoUrl").focus(function(){
          $('.post-button').removeAttr('disabled');
        }).blur(function(){
          if ($("#postForm_videoUrl").val() == ""){
            $('.post-button').attr('disabled', 'disabled');
        }
      });

      $(".add-audio").click( function(){
        var audioval = $("#postForm_audioFile").val();
        $(".media-box, .media-box-edit").css("display","none");
        $("#audio_field").css("display","block");
        $("#postForm_postTypeId").val("5");
        if (audioval == ""){
          $('.post-button').attr('disabled', 'disabled');
        }
        if ( $("#postForm_title").val() == "Title" ){$("#postForm_title").val("Listen Up");}
      });
      $("form#form-post").live("submit", function(e){
        if ( $("#postForm_postTypeId").val() == "2" ){
          if ( $("#postForm_textContent").val() == "Write something..."){  
            e.preventDefault();
            $('.post-button').attr('disabled', 'disabled');
            $("#postForm_textContent").effect("highlight", 2000);
          }  
        }
      });

      // error popup close
      $(".error, #megre-error").live("click", function() {
        $(this).remove();
      });

      // set up the options to be used for jqDock...
      var dockOptions =
        {align: 'top'
        , labels: 'bc'
        }
      $('#menu').jqDock(dockOptions);

      $(".follow").live("click", function(event){
        var link = $(this).attr("href");
        $(this).removeClass("follow").addClass("unfollow");
        $.post(link);
        event.preventDefault();
        this.href = this.href.replace('join', 'leave');
        this.href = this.href.replace('subscription', 'unsubscription');
      });
      
      $(".unfollow").live("click", function(event){
        var link = $(this).attr("href");
        $(this).removeClass("unfollow");
        $(this).addClass("follow");
        $.post(link);
        event.preventDefault();
        this.href = this.href.replace('leave', 'join');
        this.href = this.href.replace('unsubscription', 'subscription');
      });
      $(".login-link").click(function(event){
          $(this).addClass("login-open");
          $(".login-box").css("display", "block");
          event.preventDefault();
      });
      $(".login-close").click(function(){
          $(".login-link").removeClass("login-open");
          $(".login-box").css("display", "none");
      });
      // Author: Nicolas
      // Begin
      // Display the register prompt when a sign out user follows something.
      $(".sign").click(function(event){
          var link = $(this).attr("href");
          $.post(link);
          $('#register-prompt-title').html("<h2>You're so close!</h2>"); 
          $("#register-prompt-div").addClass("register-prompt-open");
          $('#register-prompt-sentence').html("<p>You will be following this ology as soon as you...</p>"); 
          $("#register-prompt-box").css("display", "block");
          event.preventDefault();
      });
      
      $(".register-prompt-link").live('click', function(event){
          $(this).addClass("register-prompt-open");
          $("#register-prompt-box").css("display", "block");
          event.preventDefault();
      });
      
      $(".register-prompt-close").click(function(){
          $(".register-prompt-link").removeClass("register-prompt-open");
          $("#register-prompt-box").css("display", "none");
      });
      
      $(".almost-there-popup-open").live("click", function(){
        $(".register-prompt-link").removeClass("register-prompt-open");
        $("#register-prompt-box").css("display", "none");
        $("#almost-prompt-div").addClass("almost-prompt-open");
        $('#almost-prompt-title').html("<h2>Almost there!</h2>");
        $('#almost-prompt-sentence').html("<p>Enter your info and you'll be all set...</p>");
        $("#almost-register-prompt-box").css("display", "block");
        event.preventDefault();
      });
      
      $(".go-on-register-prompt").live("click", function(){
        $(".almost-prompt-link").removeClass("almost-prompt-open");
        $("#almost-register-prompt-box").css("display", "none");
        $(".register-prompt-link").addClass("register-prompt-open");
        $("#register-prompt-box").css("display", "block");
        event.preventDefault();
      });
      
      
      $(".almost-register-prompt-close").click(function(){
          $(".almost-prompt-link").removeClass("almost-prompt-open");
          $("#almost-register-prompt-box").css("display", "none");
      });
      
      $(".like-feedback-prompt-close").click(function(){
          $("#like-feedback-prompt-box").css("display", "none");
      });
        
    
      // End
      $(".channels-link, .channels-box-lo, .channels-box-li, .channels-box-ed").live("mouseover",function(event){
          $(".channels-box-lo, .channels-box-li, .channels-box-ed").css("display", "block");
      });
      $(".channels-link, .channels-box-lo, .channels-box-li, .channels-box-ed").live("mouseout", function(){
        $(".channels-box-lo, .channels-box-li, .channels-box-ed").css("display", "none");
      });
      $(".account-link, .account-box").live("mouseover",function(event){
          $(".account-box").css("display", "block");
      });
      $(".account-link-editor, .account-box-editor").live("mouseover",function(event){
          $(".account-box-editor").css("display", "block");
      });
      $(".account-link, .account-box").live("mouseout", function(){
        $(".account-box").css("display", "none");
      });
      $(".account-link-editor, .account-box-editor").live("mouseout", function(){
        $(".account-box-editor").css("display", "none");
      });
      $(".editor-link, .editor-box").live("mouseover",function(event){
          $(".editor-box").css("display", "block");
      });
      $(".editor-link, .editor-box").live("mouseout", function(){
        $(".editor-box").css("display", "none");
      });

      $(".delete-item").live("click", function(event){
        $(this).text("Yes, delete now!").removeClass("delete-item").addClass("delete-item-yes");
        event.preventDefault();
      });
      
      $(".delete-item-yes").live("click", function(event){
        var dlink = $(this).attr("href");
        $.post(dlink);
        event.preventDefault();
        $(this).parent().fadeOut();
      });

      $("#ologyForm_name, #ologyFormEdit_name, #ology_socialbundle_stashform_name").charCount({
        allowed: 24,    
        warning: 18,
        counterText: 'Characters left: '
      });

      $("#ologyForm_description").charCount({
        allowed: 75,    
        warning: 20,
        counterText: 'Characters left: '  
      });

      $("#userForm_summary, #ologyFormEdit_description").charCount({
        allowed: 100,    
        warning: 20,
        counterText: 'Characters left: '  
      });

      $(".show-notifications, .skip-reg").live("click", function(){
        $("#user-settings").css("display", "none");        
        $("#user-notifications").css("display", "block");
        $("#user-ologize").css("display", "none");
      });

      $(".show-account").live("click", function(){
        $("#user-settings").css("display", "block");
        $("#user-notifications").css("display", "none");
        $("#user-ologize").css("display", "none");
      });
      
      $(".show-notifications").live("click", function(){
        $("#user-notifications").css("display", "block");
        $("#user-settings").css("display", "none");
      });

      $(".show-ologize").live("click", function(){
        $("#user-settings").css("display", "none");
        $("#user-notifications").css("display", "none");
        $("#user-ologize").css("display", "block");
      });      

      $("#filters-explore a").live("click", function(){
          var cat = $(this).attr("data-filter").substring(1);
          var url = '/explore/0/15/'.concat(cat);
          $.get(url, function(data) { 
            $('#container-splash').html( data ); 
            $('#container-splash').masonry('reload'); 
            $("abbr.timeago").timeago();
          });
          $("#filters-explore a").removeClass("on");
          $(this).toggleClass("on");
      });

      $("#update-ology-icon").click(function(){
        $("#update-ology-icon").css("display", "none");
        $("#update-ology-icon-form").css("display", "block");
      });

      $(".update-ology-icon-close").click(function(){
        $("#update-ology-icon-form").css("display", "none");
        $("#update-ology-icon").css("display", "block");
        $("#ologyFormEdit_imageFile").val(null);
      });

      $(".show-post").live("click", function(event){
        event.preventDefault();
        $("#profile-content").css("display", "none");
        $("#profile-posts").css("display", "block").masonry({reload: true});
      });
      $(".show-info").live("click", function(event){
        event.preventDefault();
        $("#profile-content").css("display", "block");
        $("#profile-posts").css("display", "none");
      });

      $("#container-explore").masonry({
        itemSelector : '.post', 
        isFitWidth: true,
        reload: true 
      });

      $("#container-splash").masonry({
        itemSelector : '.post', 
        columnWidth : 290,
        isFitWidth: true,
        reload: true 
      });
      
      $('#posts-box-home, #posts-box-ology').masonry({
        itemSelector : '.post', 
        columnWidth : 225,
        isFitWidth: true,
        reload: true 
      });
    $('#channel-posts').masonry({
        itemSelector : '.post',
        reload: true 
      });
      $.reject({  
        reject: {msie5:true, msie6:true, msie7:true, firefox1:true, firefox2:true, firefox3:true, firefox4:true, firefox5:true, firefox6:true},
        imagePath: '/bundles/ologysocial/img/'
      });


/*    $(".circle").mouseenter(function(){
      $(this).addClass("circle-open", 200);
    });

    $(".circle").mouseleave(function(){
      $(this).removeClass("circle-open", 200);
    });
*/

    var buttons = "#channel-featured-post1, #channel-featured-post2, #channel-featured-post3, #channel-featured-post4, #channel-featured-post5"; 

    $("#channel-featured-thumb1").live("mouseover", function(){
      $(buttons).removeClass("ononon");
      $("#channel-featured-post1").toggleClass("ononon");
    });

    $("#channel-featured-thumb2").live("mouseover", function(){
      $(buttons).removeClass("ononon");
      $("#channel-featured-post2").toggleClass("ononon");
    });

    $("#channel-featured-thumb3").live("mouseover", function(){
      $(buttons).removeClass("ononon");
      $("#channel-featured-post3").toggleClass("ononon");
    });

    $("#channel-featured-thumb4").live("mouseover", function(){
      $(buttons).removeClass("ononon");
      $("#channel-featured-post4").toggleClass("ononon");
    });

    $("#channel-featured-thumb5").live("mouseover", function(){
      $(buttons).removeClass("ononon");
      $("#channel-featured-post5").toggleClass("ononon");
    });

    $("#twitter-popup-content").load("/twitter/register");
    $("#facebook-popup-content").load("/facebook/register");
    
    $(".popup-close").click(function(){
      $(".popup").css("display", "none");
    });
    
    $('.fb-fake-button').click(function () {
//        $('.fb_button').triggerHandler('click');
        FB.login();
    });
      
    $('.upload-button').click(function () {
        $('#onboarding-form #userForm_imageFile[type=file]').trigger('click');
    });
    
    $('#onboarding-form #userForm_imageFile[type=file]').change(function () {
        $('#onboarding-form #onboarding-submit').click();
    });
    
    $(".dock-bar").delay(1500).slideDown("fast");
    
});

function grab(imgUrl) {
    if (((imgUrl.indexOf("http://") != -1) || (imgUrl.indexOf("https://") != -1)) &&
        ((imgUrl.indexOf(".jpg") != -1) || (imgUrl.indexOf(".jpeg") != -1) || (imgUrl.indexOf(".png") != -1) || (imgUrl.indexOf(".bmp") != -1) || (imgUrl.indexOf(".gif") != -1)))
        {       
        $('#grabbed-image').html("<div style='text-align: center;'><img src='http://s3.amazonaws.com/ology/bundles/ologysocial/img/ajax-loader.gif'/></div>");
        var upurl = '/post/up/pic/';
        var getp = '?u=' + encodeURIComponent(imgUrl);
        $.get(upurl + getp, function(data) {
            $('#postForm_imageUrl').val(data);
            $('#grabbed-image').html("<img src='http://s3.amazonaws.com/ology/bundles/ologysocial/up/img/post/post_small/" + data + "'/>");
        });
    } else {
        
    }
}

$('#input-img-grabber').keypress(function() {
    setTimeout(function() {
        grab($('#input-img-grabber').val());
    }, 100);
    $('#img-or').css("display", "none");
    $('#img-upload').css("display", "none");
    $('.post-button').removeAttr('disabled');
});

$("#input-img-grabber").bind('paste', function(e) {
    setTimeout(function() {
        grab($('#input-img-grabber').val());
    }, 100);
    $('#img-or').css("display", "none");
    $('#img-upload').css("display", "none");
    $('.post-button').removeAttr('disabled');
});

$('#postForm_imageFile').change(function() {
    $('#img-or').css("display", "none");
    $('#img-web').css("display", "none");
    $('.post-button').removeAttr('disabled');
});
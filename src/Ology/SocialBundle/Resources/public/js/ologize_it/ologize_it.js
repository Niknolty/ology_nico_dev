$(document).ready(function(){
    $.fn.extend({
            customSelect : function(options) {
                if(!$.browser.msie || ($.browser.msie&&$.browser.version>6)){
                    return this.each(function() {

                                    var currentSelected = $(this).find(':selected');
                                    $(this).after('<span class="customStyleSelectBox"><span class="customStyleSelectBoxInner">'+currentSelected.text()+'</span></span>').css({position:'absolute', opacity:0,fontSize:$(this).next().css('font-size')});
                                    var selectBoxSpan = $(this).next();
                                    var selectBoxWidth = parseInt($(this).width()) - parseInt(selectBoxSpan.css('padding-left')) -parseInt(selectBoxSpan.css('padding-right'));			
                                    var selectBoxSpanInner = selectBoxSpan.find(':first-child');
                                    selectBoxSpan.css({display:'inline-block'});
                                    selectBoxSpanInner.css({width:selectBoxWidth, display:'inline-block'});
                                    var selectBoxHeight = parseInt(selectBoxSpan.height()) + parseInt(selectBoxSpan.css('padding-top')) + parseInt(selectBoxSpan.css('padding-bottom'));
                                    $(this).height(selectBoxHeight).change(function(){
                                    selectBoxSpanInner.text($(this).find(':selected').text()).parent().addClass('changed');
                                    });

                    });
                }
            }
    });

    $('.fb-fake-button').click(function () {
        $('.fb_button').triggerHandler('click');
        //window.close();
    });

    $('.facebook_share_button').click(function () {
        $('.facebook-share-button').triggerHandler('click');
    });
    $('.twitter_share_button').click(function () {
        $('.twitter-share-button').triggerHandler('click');
    });

    $("#postForm_title").focus(function(){
          if (this.value == 'Post Title'){this.value = '';} 
        }).blur(function(){
          if (this.value == ''){this.value = 'Post Title';} 
    });
    $("#postForm_textContent").focus(function(){
          if (this.value == 'Add your thoughts...'){this.value = '';$('.post-button').removeAttr('disabled');}
        }).blur(function(){
          if (this.value == ''){this.value = 'Add your thoughts...';$('.post-button').removeAttr('disabled');}
    });
      
    $("#form-post").live("submit", function(e){
        if ( $("#postForm_title").val() == "Post Title"){  
            e.preventDefault();
            $("#postForm_title").effect("highlight", 2000);
            $('#postForm_title').focus();
        }
        else if ( $("#postForm_textContent").val() == "Add your thoughts..."){
            e.preventDefault();
            $("#postForm_textContent").effect("highlight", 2000);
            $('#postForm_textContent').focus();
        }
        else if ($("#postForm_firstOlogy").val() == -1) {
            e.preventDefault();
            $(".customStyleSelectBox").effect("shake", { times:2 }, 200);
        }
    });
    
    $("#postForm_firstOlogy option[value=]").val(-1);
    $("#postForm_firstOlogy").val(0).val(-1);
    $('#postForm_firstOlogy').customSelect();

    $('#post_link').click( function() {
        window.open( $(this).attr('href') );
        self.close();
        return false;
    });
    $('#ology_link').click( function() {
        window.open( $(this).attr('href') );
        self.close();
        return false;
    });

});

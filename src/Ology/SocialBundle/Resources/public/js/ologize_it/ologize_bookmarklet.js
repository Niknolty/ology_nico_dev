javascript:(function(e,a,g,h,f,c,b,d){
    if(!(f=e.jQuery)||g>f.fn.jquery||h(f)){
        c=a.createElement("script");
        c.type="text/javascript";
        c.src="http://ajax.googleapis.com/ajax/libs/jquery/"+g+"/jquery.min.js";
        c.onload=c.onreadystatechange=function(){
            if(!b&&(!(d=this.readyState)||d=="loaded"||d=="complete")){
                h((f=e.jQuery).noConflict(1),b=1);
                f(c).remove()
            }
        };

        a.getElementsByTagName('head')[0].appendChild(c)
    }
})
    (window,document,"1.3.2",function($,L){

        function remove_pi_containers(){
            $('#iframe_pi_bg').remove();
            $('#div_pi_bg').remove();
            $('#div_pi_container').remove();
            $('#ologize_top_part').remove();
        }
        // get ology url
        var script_url = $("script[title=ologize_it]").attr("src");
        var script_domain = ((script_url||'')+'').match(/^http:\/\/[^/]+/);
        var ology_domain = script_domain ? script_domain[0] : 'http://ology.com';

        // save page scroll position
        var sp = $(window).height();
        $(window).scrollTop(0);

        // remove divs if they exist
        remove_pi_containers();

        //create iframe. it will cover flash.
        var iframe_pi_bg = $(document.createElement('iframe'));
        iframe_pi_bg.attr('id', 'iframe_pi_bg').width('100%').height('100%');
        // create main div
        var div_pi_bg = $(document.createElement('div'));
        div_pi_bg.attr('id', 'div_pi_bg');
        // create div for image preview
        var div_pi_container = $(document.createElement('div'));
        div_pi_container.attr('id', 'div_pi_container');
        // create div for top menu
        var ologize_top_part = $(document.createElement('div'));
        ologize_top_part.attr('id', 'ologize_top_part').html('<div class="ologize_logo"><a href="' + ology_domain + '" target="_blank" class="ologize_logo"><img src="' + ology_domain + '/bundles/ologysocial/js/ologize_it/ologize_post_logo.png"/></a></div><div class="ologize_top_text"><span>Select what you want to ologize...</span></div><div class="ologize_close"><img src="' + ology_domain + '/bundles/ologysocial/js/ologize_it/ologize_post_close.png"/></div>');
        // create img element
        var pi_img = $(document.createElement('img'));
        pi_img.addClass('img_pi_img');
        // create element for image link
        var a_pi_img = $(document.createElement('a'));
        a_pi_img.attr('class', 'a_pi_img').html('<span class="ologize_it">Ologize it</span>');
        // create div for image
        var div_pi_img = $(document.createElement('div'));
        div_pi_img.attr('class', 'div_pi_img');

        // create css styles
        div_pi_bg.append('<style>'
            +'#iframe_pi_bg {background-color: #F2F2F2; position: fixed; bottom: 0; left: 0; right: 0; top: 0; z-index: 100000000; opacity: 0.80; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80); -moz-opacity: 0.80; -khtml-opacity: 0.80;}'
            +'#div_pi_bg {background-color: #F2F2F2; position: fixed; bottom: 0; left: 0; right: 0; top: 0; z-index: 100000001; opacity: 0.80; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80); -moz-opacity: 0.80; -khtml-opacity: 0.80;}'

            +' #ologize_top_part {position: fixed; top:0; left:0; height:45px; width:100%; z-index: 100000006;  background-color:#222222; border-bottom: 4px solid #DBFA78; padding:0; margin:0;}'
            +' #ologize_top_part div {padding:0; margin:0; display:block;}'
            +' #ologize_top_part .ologize_top_text {position:absolute; top:13px; left:0; z-index: 100000007; width:100%; text-align: center;}'
            +' #ologize_top_part .ologize_top_text  span {color:#ffffff; font-family: Verdana; font-size:18px;}'
            +' #ologize_top_part .ologize_logo {position:absolute; top:0px; left:0; z-index: 100000008; padding:0 0 0 22px;}'
            +' #ologize_top_part .ologize_close {position:absolute; top:0px; right:0; z-index: 100000008; cursor:pointer;}'

            +' #div_pi_container {position: absolute; right: 0; left: 0; top: 0; bottom:0; z-index: 100000005; padding:55px 20px 20px 20px; margin:0;}'
            +' #div_pi_container div {padding:0; margin:0; display:block;}'
            +' #div_pi_container .div_pi_img {width:200px; height:200px; position:relative; float:left; border:1px solid #CCC; vertical-align:middle; text-align:center;}'
            +' #div_pi_container .a_pi_img {cursor: pointer; height:200px; width:200px; position:absolute; top:0; left:0; display:block; z-index: 10000009; text-decoration:none; }'
            +' #div_pi_container .a_pi_img:hover {display:block;}'
            +' #div_pi_container .a_pi_img:hover .ologize_it {position:relative; top:85px; left:35px; display: block; width:130px; height:35px; box-shadow: 0 0 3px 3px #AAAAAA; -webkit-box-shadow: 0 0 3px 3px #AAAAAA; background-color:#ffffff; color:#686868; font-size:14px; line-height: 35px;}'
            +' #div_pi_container .a_pi_img .ologize_it {display: none;}'

            +' #div_pi_container .img_pi_img {max-height:200px; max-width:200px; z-index: 100000008;}'
            +'</style>');


        var imgsArray = [] ;
        var imgs = $("*[src]");
        imgs.each(function () {
            if($(this).css('display') == 'none'){
                return;
            }
            if($.inArray( $(this).attr('src'), imgsArray) != -1){
                return;
            }
            // create image object for getting width and hight
            var immagine = new Image;
            immagine.src = $(this).attr('src');

            if (immagine.height >= 120 & immagine.width >= 120 ){
                // creat image clone
                imgsArray.push( $(this).attr('src'));
                img_clone = pi_img.clone();
                img_clone.attr('src',$(this).attr('src'));

                a_pi_img_clone = a_pi_img.clone();
                div_pi_img_clone = div_pi_img.clone();

                div_pi_img_clone.append(a_pi_img_clone);
                div_pi_img_clone.append(img_clone);
                div_pi_container.append(div_pi_img_clone);
            }

        });
/*
 $.fn.log = function (msg) {
 console.log("%s: %o", msg, this);
 return this;
 };
 //$(this).log("return");
        // get videos from yuotube
        var embed = $("embed");
        embed.each(function () {
            // creat image clone
            //  aaa = $(this).attr("src");
            embed_flashvars = $(this).attr("flashvars");
            // preg_match('/itemId=([a-zA-Z0-9]+)/', $result, $matches);
            // $output = $matches[1];
            embeded_video_id = embed_src.split("video_id=")[1];
            embeded_id = embeded_video_id.split("&")[0];
            //  alert(embeded_id);
            // ((script_url||'')+'').match(/^http:\/\/[^/]+/);
            // create image object
            var image = $(document.createElement('image'));
            image.attr('src', 'http://img.youtube.com/vi/' + embeded_id + '/0.jpg');
            image.addClass('img_pi_img');

            a_pi_img_clone = a_pi_img.clone();
            div_pi_img_clone = div_pi_img.clone();

            div_pi_img_clone.append(a_pi_img_clone);
            div_pi_img_clone.append(image);
            div_pi_container.append(div_pi_img_clone);
        });

        var embed = $("iframe");
        embed.each(function () {
            // creat image clone
            //  aaa = $(this).attr("src");
            embed_src = $(this).attr("src");
            if(!embed_src.match(/^http:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9\-_]+)/) ){
                return;
            }

                // preg_match('/itemId=([a-zA-Z0-9]+)/', $result, $matches);
                // $output = $matches[1];
                embeded_video_id = embed_src.split("?")[0].split("#")[0].split("/");
                embeded_id = embeded_video_id.pop();
                //  alert(embeded_id);
                // ((script_url||'')+'').match(/^http:\/\/[^/]+/);
                // create image object
                var image = $(document.createElement('image'));
                image.attr('src', 'http://img.youtube.com/vi/' + embeded_id + '/0.jpg');
                image.addClass('img_pi_img');

                a_pi_img_clone = a_pi_img.clone();
                div_pi_img_clone = div_pi_img.clone();

                div_pi_img_clone.append(a_pi_img_clone);
                div_pi_img_clone.append(image);
                div_pi_container.append(div_pi_img_clone);

        });
*/
        // insert created divs to page
        $('body').append(div_pi_bg);
        $('body').prepend(iframe_pi_bg);
        $('body').append(div_pi_container);
        $('body').append(ologize_top_part);

        $('#ologize_top_part .ologize_close').bind('click', function() {
            remove_pi_containers()
            $(window).scrollTop(sp);
        });

        $('#div_pi_container .a_pi_img').bind('click', function() {
            image_src = $(this).next().attr('src');
            // get title and description from special tags
            if($('meta[property="og:title"]').length > 0){
                title = $('meta[property="og:title"]').attr("content");
            }
            else if($('title').length > 0){
                title = $('title').html();
            }
            else{
                title = '';
            }
            if($('meta[property="og:description"]').length > 0){
                description = $('meta[property="og:description"]').attr("content");
            }
            else if($('meta[name="description"]').length > 0){
                description = $('meta[name="description"]').attr("content");
            }
            else{
                description = '';
            }

            window.open(ology_domain + "/ologize_post?" + "s=" + encodeURIComponent(image_src) + "&l=" + encodeURIComponent(window.location) + "&t=" + encodeURIComponent(title) + "&d=" + encodeURIComponent(description),"mywindow","menubar=1,resizable=1,width=600,height=370");
            remove_pi_containers();
            $(window).scrollTop(sp);
        });

    });


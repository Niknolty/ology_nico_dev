<?php

/* OlogySocialBundle:Editorial:create_post.html.twig */
class __TwigTemplate_111e33c859ed0ceefa3730073a2fb2da extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'page_header' => array($this, 'block_page_header'),
            'title' => array($this, 'block_title'),
            'pagestylesheets' => array($this, 'block_pagestylesheets'),
            'body' => array($this, 'block_body'),
            'pagescripts' => array($this, 'block_pagescripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OlogySocialBundle:FrontEnd:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_page_header($context, array $blocks = array())
    {
        // line 3
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/editors.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "New Article | My.Ology";
    }

    // line 7
    public function block_pagestylesheets($context, array $blocks = array())
    {
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/editors.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "<div id=\"container\">
    <form action=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_store"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "postForm"));
        echo " id=\"form-post\">
        
        ";
        // line 14
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "postForm"));
        echo "
            
        ";
        // line 16
        if ($this->getAttribute($this->getContext($context, "post"), "isDraft")) {
            // line 17
            echo "            <div id=\"post-ology-text\">Last saved: ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "lastSaved"), "F j, Y, g:i a"), "html", null, true);
            echo "</div>
        ";
        }
        // line 19
        echo "
        <h3>New Post</h3>
    \t<div class=\"article-ology-text\">
            ";
        // line 22
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "htmlTitle"), "Title");
        echo "
            ";
        // line 23
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "htmlTitle"), array("attr" => array("class" => "title")));
        echo "
    \t</div>

        <div class=\"lead-image\">
            ";
        // line 27
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "imageFile"), "Lead Image");
        echo "
            ";
        // line 28
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "imageFile"));
        echo "

            ";
        // line 30
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "imageCaption"), "Caption");
        echo "
            ";
        // line 31
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "imageCaption"), array("attr" => array("class" => "caption")));
        echo "

            ";
        // line 33
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "imageAltText"), "ALT text for Search Engines");
        echo "
            ";
        // line 34
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "imageAltText"), array("attr" => array("class" => "alt")));
        echo "
            
            ";
        // line 36
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "image1File"), "Image to display in the BUZZ area on channels");
        echo "
            ";
        // line 37
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "image1File"));
        echo "
            
            ";
        // line 39
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "image2File"), "Image to display below buzz on channels");
        echo "
            ";
        // line 40
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "image2File"));
        echo "
        </div>
        
        <div class=\"article-ology-text\">
            ";
        // line 44
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "summary"), "Summary");
        echo "
            ";
        // line 45
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "summary"), array("attr" => array("class" => "summary")));
        echo "

            ";
        // line 47
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "htmlContent"), array("attr" => array("class" => "mceEditor")));
        echo "

            <div class=\"upload-pic\">
                To add a picture in your post, select and upload it, copy the URL, click the image icon in the editor and paste it into the URL field.<br/>
                <div id=\"article-pic-upload\">
                    <iframe src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_pic_form"), "html", null, true);
        echo "\" width=\"400\" height=\"100\"></iframe>
                </div>
                <hr> <input type=\"button\" value=\"Multiple Images\" id=\"new-pic-button\" />        
            </div>

    \t</div>
        
        <div class=\"seo\">
            ";
        // line 60
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "tags"), "SEO Tags");
        echo "
            ";
        // line 61
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "tags"), array("attr" => array("class" => "seo-tags")));
        echo "

            ";
        // line 63
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "metaTitle"), "Meta Title");
        echo "
            ";
        // line 64
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "metaTitle"), array("attr" => array("class" => "meta-title")));
        echo "

            ";
        // line 66
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "metaKeywords"), "Meta Keywords");
        echo "
            ";
        // line 67
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "metaKeywords"), array("attr" => array("class" => "meta-keywords")));
        echo "

            ";
        // line 69
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "metaDescription"), "Meta Description");
        echo "
            ";
        // line 70
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "metaDescription"), array("attr" => array("class" => "meta-description")));
        echo "
        </div>

        <div class=\"post-type\">
            <div class=\"article-ology-text\">
                ";
        // line 75
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "postType"), "Post Type");
        echo "
                ";
        // line 76
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "postType"));
        echo "
            </div>

            <div id=\"rating\" style=\"display: none;\" >
                ";
        // line 80
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "rating"));
        echo "
            </div>

            <div id=\"movie-stuff\" style=\"display: none;\">
                ";
        // line 84
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "movieGenre"), "Genre");
        echo "
                ";
        // line 85
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "movieGenre"), array("attr" => array("class" => "movie-genre")));
        echo "
                <br /><br />

                ";
        // line 88
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "movieParentalRating"), "Parental Rating");
        echo "
                ";
        // line 89
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "movieParentalRating"), array("attr" => array("class" => "movie-rating")));
        echo "
                <br /><br />

                ";
        // line 92
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "movieDirector"), "Director");
        echo "
                ";
        // line 93
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "movieDirector"), array("attr" => array("class" => "movie-director")));
        echo "

                ";
        // line 95
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "movieStarring"), "Starring");
        echo "
                ";
        // line 96
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "movieStarring"), array("attr" => array("class" => "movie-starring")));
        echo "

                ";
        // line 98
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "movieOpeningDate"), "Opening Date");
        echo "
                ";
        // line 99
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "movieOpeningDate"), array("attr" => array("class" => "movie-date")));
        echo "

                ";
        // line 101
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "movieRuntime"), "Runtime");
        echo "
                ";
        // line 102
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "movieRuntime"), array("attr" => array("class" => "movie-runtime")));
        echo "
            </div>

            <div id=\"album-stuff\" style=\"display: none;\">

                ";
        // line 107
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "albumArtist"), "Artist");
        echo "
                ";
        // line 108
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "albumArtist"), array("attr" => array("class" => "album-artist")));
        echo "

                ";
        // line 110
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "albumTitle"), "Album Title");
        echo "
                ";
        // line 111
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "albumTitle"), array("attr" => array("class" => "album-title")));
        echo "

                ";
        // line 113
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "albumLabel"), "Label");
        echo "
                ";
        // line 114
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "albumLabel"), array("attr" => array("class" => "album-label")));
        echo "

                ";
        // line 116
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "albumReleaseDate"), "Release Date");
        echo "
                ";
        // line 117
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "albumReleaseDate"), array("attr" => array("class" => "album-date")));
        echo "

            </div>
            
        </div>

        <div class=\"cite\">
            ";
        // line 124
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "citeImage"), "Cite Image");
        echo "
            ";
        // line 125
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "citeImage"), array("attr" => array("class" => "cite-image")));
        echo "

            ";
        // line 127
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "citeTitle"), "Cite Title");
        echo "
            ";
        // line 128
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "citeTitle"), array("attr" => array("class" => "cite-title")));
        echo "
        
            ";
        // line 130
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "citeUrl"), "Cite URL");
        echo "
            ";
        // line 131
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "citeUrl"), array("attr" => array("class" => "cite-url")));
        echo "
        </div>


        <br/>
        
        ";
        // line 137
        if (array_key_exists("postPublish", $context)) {
            // line 138
            echo "            ";
            echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "isPostPublishEdit"));
            echo "
        ";
        } else {
            // line 140
            echo "        <div class=\"article-ology-text\">
    \t\t";
            // line 141
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "scheduledPublish"));
            echo "

            ";
            // line 143
            echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "firstOlogy"), "Pick an Ology");
            echo "
            ";
            // line 144
            echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "firstOlogy"), array("attr" => array("class" => "pick-ology")));
            echo "

            ";
            // line 146
            echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "postForm"), "channelposts"), "Automatically promote to a channel page");
            echo "
            ";
            // line 147
            echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "channelposts"), array("attr" => array("class" => "pro-post-channel")));
            echo "
    \t</div>
        ";
        }
        // line 150
        echo "        
            ";
        // line 151
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "isDraft"));
        echo "
            ";
        // line 152
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "id"));
        echo "
        
        ";
        // line 154
        if ((!array_key_exists("postPublish", $context))) {
            // line 155
            echo "        <div id=\"submit-div\">
            <input type=\"button\" value=\"Publish Now\" id=\"post-button-editor\" class=\"post-button\" />
            <input type=\"button\" value=\"Schedule\" id=\"schedule-button-editor\" class=\"post-button\" />
            <input type=\"button\" value=\"Save as draft\" id=\"save-button-editor\" class=\"post-button\" />
        </div>
        ";
        } else {
            // line 161
            echo "        <div id=\"submit-div\">
            <input type=\"submit\" value=\"Edit\" id=\"edit-button-editor\" class=\"post-button\" />
        </div>
        ";
        }
        // line 165
        echo "
        <div id=\"scheduled-div\" style=\"display: none\">
            Schedule <br />
                
            <select id=\"sm\"><option value=\"1\">January</option><option value=\"2\">February</option><option value=\"3\">March</option><option value=\"4\">April</option><option value=\"5\">May</option><option value=\"6\">June</option><option value=\"7\">July</option><option value=\"8\">August</option><option value=\"9\">September</option><option value=\"10\">October</option><option value=\"11\">November</option><option value=\"12\">December</option></select>
            <select id=\"sd\"><option value=\"\"></option><option value=\"1\">1</option><option value=\"2\">2</option><option value=\"3\">3</option><option value=\"4\">4</option><option value=\"5\">5</option><option value=\"6\">6</option><option value=\"7\">7</option><option value=\"8\">8</option><option value=\"9\">9</option><option value=\"10\" selected=\"selected\">10</option><option value=\"11\">11</option><option value=\"12\">12</option><option value=\"13\">13</option><option value=\"14\">14</option><option value=\"15\">15</option><option value=\"16\">16</option><option value=\"17\">17</option><option value=\"18\">18</option><option value=\"19\">19</option><option value=\"20\">20</option><option value=\"21\">21</option><option value=\"22\">22</option><option value=\"23\">23</option><option value=\"24\">24</option><option value=\"25\">25</option><option value=\"26\">26</option><option value=\"27\">27</option><option value=\"28\">28</option><option value=\"29\">29</option><option value=\"30\">30</option><option value=\"31\">31</option></select>
            <select id=\"sy\" >
                <option value=\"2012\">2012</option>
                <option value=\"2013\">2013</option>
                <option value=\"2014\">2014</option>
                <option value=\"2015\">2015</option>
                <option value=\"2016\">2016</option>
                <option value=\"2017\">2017</option>
                <option value=\"2018\">2018</option>
                <option value=\"2019\">2019</option>
                <option value=\"2020\">2020</option>
            </select>
            <input id=\"shh\" type=\"text\" value=\"hh\"/>:<input id=\"smm\" type=\"text\" value=\"mm\"/> (24h format)
            <input type=\"button\" value=\"Cancel\" id=\"schedule-cancel-button-editor\" class=\"post-button\" />
            <input type=\"button\" value=\"OK\" id=\"schedule-ok-button-editor\" class=\"post-button\" />
        </div>
    </form>
<br/><br/><br/><br/>
</div>

";
    }

    // line 192
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 193
        echo "
";
        // line 200
        echo "<script src=\"/bundles/ologysocial/js/tiny_mce/tiny_mce.js\" type=\"text/javascript\"></script>
<script type=\"text/javascript\">
\ttinyMCE.init({
\t\t// General options
\t\tmode : \"exact\",
                elements : \"professionalPostForm_htmlContent\",
\t\ttheme : \"advanced\",
\t\tplugins : \"tinyautosave,autolink,lists,pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave\",

\t\ttheme_advanced_buttons1 : \"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect,forecolor,link,unlink, image,\",
\t\ttheme_advanced_buttons2 : \"tinyautosave,|,undo,redo,|,cut,copy,pasteword,,|,bullist,numlist,|,outdent,indent,|,code,|charmap|,ltr,rtl,|,backcolor,fullscreen\",
\t\ttheme_advanced_buttons3 : \"\",
\t\ttheme_advanced_toolbar_location : \"top\",
\t\ttheme_advanced_toolbar_align : \"left\",
\t\ttheme_advanced_statusbar_location : \"bottom\",
        height : \"500\",
        width : \"550\",
\t\ttheme_advanced_resizing : true,
                relative_urls : false,
\t\tcontent_css : \"";
        // line 219
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/tiny_mce/content.css"), "html", null, true);
        echo "\",

\t\t// Style formats
\t\tstyle_formats : [
\t\t\t{title : 'Bold text', inline : 'b'},
\t\t\t{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
\t\t\t{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
\t\t\t{title : 'Example 1', inline : 'span', classes : 'example1'},
\t\t\t{title : 'Example 2', inline : 'span', classes : 'example2'},
\t\t\t{title : 'Table styles'},
\t\t\t{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
\t\t],
                
                tinyautosave_key: ";
        // line 232
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "id"), "html", null, true);
        echo ",
                tinyautosave_interval_seconds: 15,
                tinyautosave_retention_minutes: 1440,
\t});
</script>

<script type=\"text/javascript\">
    \$('#professionalPostForm_postType option[value=\"1\"]').html('Standard post');
    \$('#professionalPostForm_postType option[value=\"2\"]').remove();
    \$('#professionalPostForm_postType option[value=\"3\"]').remove();
    \$('#professionalPostForm_postType option[value=\"4\"]').remove();
    \$('#professionalPostForm_postType option[value=\"5\"]').remove();
    \$('#professionalPostForm_postType option[value=\"7\"]').remove();
    \$('#professionalPostForm_postType').change(function() {
        switch (parseInt(\$(this).val())) {
            case 1:
                \$(\"#rating\").css(\"display\", \"none\");
                \$(\"#movie-stuff\").css(\"display\", \"none\");
                \$(\"#album-stuff\").css(\"display\", \"none\");
                break;
            
            case 6:
                \$(\"#rating\").css(\"display\", \"block\");
                \$(\"#movie-stuff\").css(\"display\", \"none\");
                \$(\"#album-stuff\").css(\"display\", \"none\");
                break;
                
            case 8:
                \$(\"#rating\").css(\"display\", \"block\");
                \$(\"#movie-stuff\").css(\"display\", \"block\");
                \$(\"#album-stuff\").css(\"display\", \"none\");
                break;
                
            case 9:
                \$(\"#rating\").css(\"display\", \"block\");
                \$(\"#movie-stuff\").css(\"display\", \"none\");
                \$(\"#album-stuff\").css(\"display\", \"block\");
                break;
        }
    });
    \$('#professionalPostForm_firstOlogy').prepend( \$('<option></option>').val(-1).html('Pick an Ology'));
    \$(\"#professionalPostForm_firstOlogy\").val(-1);
    
    \$(\"#save-button-editor\").click(function() {
        \$(\"#professionalPostForm_isDraft\").val(1);
        \$(\"form#form-post\").submit();
    });
    \$(\"#post-button-editor\").click(function() {
        if (\$(\"#professionalPostForm_firstOlogy\").val() == -1) {
            \$(\"#professionalPostForm_firstOlogy\").effect(\"shake\", { times:2 }, 300);
            return;
        }
        \$(\"#professionalPostForm_isDraft\").val(0);        
        if (confirm('Are you sure you want to publish now?'))
            \$(\"form#form-post\").submit();
    });
    \$('#schedule-button-editor').click(function() {
        \$(\"#submit-div\").css(\"display\", \"none\");
        \$(\"#scheduled-div\").css(\"display\", \"block\");
    });
    
    \$(\"#schedule-ok-button-editor\").click(function() {
        var ddd = new Date(\$(\"#sy\").val(), \$(\"#sm\").val() - 1, \$(\"#sd\").val(), \$(\"#shh\").val(), \$(\"#smm\").val(), 0, 0);
        if (!isValidDate(ddd) || parseInt(\$(\"#shh\").val()) > 23 || parseInt(\$(\"#smm\").val()) > 59) {
            alert('the date is invalid');
            return;
        }
        if (\$(\"#professionalPostForm_firstOlogy\").val() == -1) {
            \$(\"#professionalPostForm_firstOlogy\").effect(\"shake\", { times:2 }, 300);
            return;
        }

        \$(\"#professionalPostForm_scheduledPublish\").val(ddd.getTime()/1000);
        \$(\"#professionalPostForm_isDraft\").val(1);
        var sd = \"on \" + \$(\"#sm\").val() + \"-\" + \$(\"#sd\").val() + \"-\" + \$(\"#sy\").val() + \" at \" + \$(\"#shh\").val() + \":\" + \$(\"#smm\").val();
        if (confirm('Are you sure you want to publish ' + sd + '?'))
            \$(\"form#form-post\").submit();
        else {
            \$(\"#submit-div\").css(\"display\", \"block\");
            \$(\"#scheduled-div\").css(\"display\", \"none\");
        }
    });
    \$(\"#schedule-cancel-button-editor\").click(function() {
        \$(\"#submit-div\").css(\"display\", \"block\");
        \$(\"#scheduled-div\").css(\"display\", \"none\");
    });
    
    function isValidDate(d) {
      if ( Object.prototype.toString.call(d) !== \"[object Date]\" )
        return false;
      return !isNaN(d.getTime());
    }
</script>

<script type=\"text/javascript\">
    \$('#new-pic-button').click(
        function() {
            \$('#article-pic-upload').append('<iframe src=\"";
        // line 329
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_pic_form"), "html", null, true);
        echo "\" width=\"400\" height=\"100\"></iframe>'); 
    });
</script>

<script type=\"text/javascript\">
    ";
        // line 334
        if (($this->getAttribute($this->getContext($context, "post"), "postType") != null)) {
            // line 335
            echo "    \$('#professionalPostForm_postType').val(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id"), "html", null, true);
            echo ");
    ";
        }
        // line 337
        echo "    ";
        if (($this->getAttribute($this->getContext($context, "post"), "firstOlogy") != null)) {
            // line 338
            echo "    \$('#professionalPostForm_firstOlogy').val(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "html", null, true);
            echo ");
    ";
        }
        // line 340
        echo "    ";
        if (($this->getAttribute($this->getContext($context, "post"), "firstChannel") != null)) {
            // line 341
            echo "    \$('#professionalPostForm_firstChannel').val(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstChannel"), "id"), "html", null, true);
            echo ");
    ";
        }
        // line 343
        echo "</script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Editorial:create_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  629 => 343,  623 => 341,  620 => 340,  614 => 338,  611 => 337,  605 => 335,  603 => 334,  595 => 329,  495 => 232,  479 => 219,  458 => 200,  455 => 193,  452 => 192,  423 => 165,  417 => 161,  409 => 155,  407 => 154,  402 => 152,  398 => 151,  395 => 150,  389 => 147,  385 => 146,  380 => 144,  376 => 143,  371 => 141,  368 => 140,  362 => 138,  360 => 137,  351 => 131,  347 => 130,  342 => 128,  338 => 127,  333 => 125,  329 => 124,  319 => 117,  315 => 116,  310 => 114,  306 => 113,  301 => 111,  297 => 110,  292 => 108,  288 => 107,  280 => 102,  276 => 101,  271 => 99,  267 => 98,  262 => 96,  258 => 95,  253 => 93,  249 => 92,  243 => 89,  239 => 88,  233 => 85,  229 => 84,  222 => 80,  215 => 76,  211 => 75,  203 => 70,  199 => 69,  194 => 67,  190 => 66,  185 => 64,  181 => 63,  176 => 61,  172 => 60,  161 => 52,  153 => 47,  148 => 45,  144 => 44,  137 => 40,  133 => 39,  128 => 37,  124 => 36,  119 => 34,  115 => 33,  110 => 31,  106 => 30,  101 => 28,  97 => 27,  90 => 23,  86 => 22,  81 => 19,  75 => 17,  73 => 16,  68 => 14,  61 => 12,  58 => 11,  55 => 10,  46 => 7,  40 => 5,  33 => 3,  30 => 2,);
    }
}

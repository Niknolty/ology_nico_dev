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
        return array (  603 => 334,  595 => 329,  423 => 165,  385 => 146,  351 => 131,  306 => 113,  288 => 107,  388 => 152,  384 => 151,  269 => 95,  747 => 248,  742 => 247,  739 => 246,  733 => 243,  729 => 242,  725 => 241,  721 => 240,  718 => 239,  711 => 235,  708 => 234,  705 => 233,  703 => 232,  698 => 231,  695 => 230,  687 => 224,  684 => 223,  678 => 220,  675 => 219,  673 => 218,  656 => 216,  653 => 215,  644 => 212,  641 => 211,  617 => 208,  615 => 207,  608 => 203,  597 => 196,  583 => 195,  580 => 194,  563 => 193,  555 => 189,  541 => 188,  538 => 187,  520 => 186,  512 => 181,  505 => 176,  491 => 175,  488 => 174,  457 => 165,  451 => 164,  429 => 150,  425 => 149,  403 => 143,  379 => 133,  372 => 131,  365 => 129,  341 => 120,  313 => 110,  172 => 60,  502 => 177,  494 => 175,  483 => 167,  470 => 161,  465 => 170,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 121,  371 => 141,  368 => 140,  362 => 138,  359 => 116,  350 => 113,  295 => 105,  258 => 95,  144 => 44,  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 158,  434 => 154,  432 => 147,  417 => 161,  408 => 144,  404 => 140,  401 => 130,  398 => 151,  389 => 147,  382 => 131,  380 => 144,  376 => 143,  370 => 127,  345 => 121,  239 => 88,  231 => 79,  674 => 231,  670 => 217,  665 => 228,  654 => 220,  650 => 214,  647 => 213,  639 => 214,  637 => 213,  631 => 211,  629 => 343,  623 => 341,  620 => 340,  614 => 338,  611 => 337,  605 => 335,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 190,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 171,  464 => 166,  461 => 141,  458 => 200,  455 => 193,  452 => 192,  450 => 137,  439 => 150,  433 => 131,  431 => 130,  413 => 122,  410 => 134,  406 => 119,  392 => 153,  360 => 137,  342 => 128,  337 => 107,  273 => 83,  260 => 93,  244 => 87,  236 => 84,  293 => 99,  246 => 72,  242 => 83,  173 => 53,  354 => 114,  319 => 117,  311 => 109,  303 => 106,  278 => 106,  262 => 96,  198 => 65,  334 => 119,  321 => 101,  308 => 109,  297 => 110,  284 => 87,  267 => 98,  264 => 99,  222 => 80,  201 => 58,  426 => 149,  415 => 146,  412 => 136,  409 => 155,  407 => 154,  400 => 129,  395 => 150,  375 => 132,  361 => 131,  357 => 124,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 111,  298 => 106,  271 => 99,  266 => 102,  240 => 85,  230 => 67,  216 => 84,  213 => 72,  339 => 108,  329 => 124,  316 => 149,  310 => 114,  305 => 108,  302 => 107,  291 => 103,  261 => 101,  252 => 86,  234 => 86,  223 => 80,  348 => 118,  340 => 129,  336 => 118,  332 => 110,  327 => 104,  324 => 108,  318 => 106,  315 => 116,  309 => 109,  304 => 102,  300 => 142,  290 => 102,  287 => 109,  279 => 97,  226 => 66,  149 => 55,  136 => 51,  125 => 33,  115 => 33,  100 => 43,  130 => 44,  251 => 94,  247 => 87,  238 => 84,  194 => 67,  191 => 55,  168 => 56,  128 => 37,  294 => 114,  286 => 101,  283 => 102,  280 => 102,  277 => 85,  268 => 80,  263 => 94,  255 => 89,  243 => 89,  208 => 92,  202 => 73,  199 => 69,  186 => 69,  183 => 55,  181 => 63,  163 => 49,  140 => 53,  170 => 73,  121 => 34,  112 => 33,  118 => 33,  106 => 30,  157 => 47,  232 => 68,  228 => 79,  220 => 79,  210 => 72,  207 => 69,  159 => 54,  151 => 52,  147 => 61,  105 => 33,  85 => 34,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 176,  495 => 232,  492 => 159,  489 => 158,  484 => 168,  479 => 219,  476 => 164,  474 => 154,  471 => 173,  469 => 152,  466 => 151,  463 => 150,  453 => 155,  445 => 161,  442 => 145,  438 => 157,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 137,  411 => 145,  405 => 132,  402 => 152,  399 => 131,  396 => 154,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 130,  364 => 116,  358 => 113,  355 => 127,  349 => 112,  346 => 132,  343 => 116,  338 => 127,  333 => 125,  330 => 117,  328 => 103,  325 => 114,  323 => 108,  320 => 100,  317 => 112,  307 => 96,  299 => 105,  296 => 100,  292 => 108,  289 => 89,  281 => 107,  275 => 96,  272 => 82,  270 => 104,  265 => 91,  259 => 94,  256 => 92,  250 => 90,  248 => 76,  235 => 83,  227 => 79,  218 => 78,  212 => 60,  206 => 60,  197 => 68,  187 => 57,  184 => 55,  182 => 55,  174 => 63,  150 => 44,  119 => 34,  110 => 31,  53 => 15,  91 => 26,  66 => 24,  98 => 29,  96 => 29,  166 => 53,  160 => 51,  154 => 49,  143 => 60,  138 => 35,  101 => 28,  58 => 11,  36 => 7,  65 => 26,  18 => 1,  352 => 126,  347 => 130,  344 => 110,  282 => 100,  276 => 101,  274 => 104,  257 => 99,  253 => 93,  249 => 92,  245 => 93,  241 => 71,  237 => 91,  233 => 85,  229 => 84,  225 => 81,  221 => 76,  217 => 74,  214 => 62,  203 => 70,  180 => 54,  175 => 44,  169 => 51,  167 => 62,  164 => 71,  155 => 53,  139 => 45,  114 => 36,  83 => 24,  76 => 22,  72 => 19,  68 => 14,  64 => 19,  56 => 14,  21 => 3,  209 => 70,  205 => 71,  196 => 70,  192 => 58,  189 => 80,  178 => 54,  176 => 61,  165 => 57,  161 => 52,  152 => 45,  148 => 45,  145 => 66,  141 => 53,  134 => 51,  132 => 53,  127 => 38,  123 => 51,  109 => 30,  93 => 39,  90 => 23,  54 => 13,  133 => 39,  124 => 36,  111 => 32,  107 => 28,  80 => 23,  63 => 16,  60 => 16,  69 => 24,  61 => 12,  52 => 16,  50 => 12,  45 => 10,  43 => 16,  34 => 8,  224 => 65,  215 => 76,  211 => 75,  204 => 73,  200 => 66,  195 => 57,  193 => 69,  190 => 66,  188 => 50,  185 => 64,  179 => 54,  177 => 49,  171 => 47,  162 => 55,  158 => 55,  156 => 68,  153 => 47,  146 => 43,  142 => 42,  137 => 40,  131 => 43,  126 => 41,  120 => 34,  117 => 37,  103 => 32,  99 => 37,  74 => 29,  47 => 14,  32 => 6,  39 => 10,  26 => 5,  97 => 27,  95 => 36,  88 => 27,  82 => 31,  78 => 30,  75 => 17,  71 => 25,  22 => 4,  44 => 7,  30 => 2,  20 => 2,  25 => 4,  49 => 9,  42 => 10,  40 => 5,  23 => 14,  27 => 4,  17 => 1,  92 => 35,  86 => 22,  79 => 28,  77 => 32,  57 => 21,  46 => 7,  37 => 10,  33 => 3,  29 => 6,  24 => 3,  19 => 2,  135 => 44,  129 => 55,  122 => 40,  116 => 30,  113 => 46,  108 => 34,  104 => 44,  102 => 26,  94 => 35,  89 => 31,  87 => 33,  84 => 21,  81 => 19,  73 => 16,  70 => 20,  67 => 16,  62 => 23,  59 => 15,  55 => 10,  51 => 11,  48 => 18,  41 => 11,  38 => 9,  35 => 6,  31 => 7,  28 => 4,);
    }
}

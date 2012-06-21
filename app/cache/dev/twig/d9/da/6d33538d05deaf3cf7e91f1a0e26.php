<?php

/* OlogySocialBundle:FrontEnd:post.html.twig */
class __TwigTemplate_d9da6d33538d05deaf3cf7e91f1a0e26 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'fb_title' => array($this, 'block_fb_title'),
            'fb_description' => array($this, 'block_fb_description'),
            'fb_image' => array($this, 'block_fb_image'),
            'title' => array($this, 'block_title'),
            'page_header' => array($this, 'block_page_header'),
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

    // line 3
    public function block_fb_title($context, array $blocks = array())
    {
        echo "<meta property=\"og:title\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
        echo "\" />";
    }

    // line 4
    public function block_fb_description($context, array $blocks = array())
    {
        echo "<meta property=\"og:description\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "textContent"), "html", null, true);
        echo "\" />";
    }

    // line 5
    public function block_fb_image($context, array $blocks = array())
    {
        // line 6
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 3)) {
            // line 7
            echo "<meta property=\"og:image\" content=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))), "html", null, true);
            echo "\" />
";
        } else {
            // line 9
            echo "<meta property=\"og:image\" content=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_large_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))), "html", null, true);
            echo "\" />
";
        }
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
        echo " | Ology";
    }

    // line 14
    public function block_page_header($context, array $blocks = array())
    {
        // line 15
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/post.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 20
            echo "<div id='page'>
    ";
            // line 21
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:dock.html.twig")->display($context);
            // line 22
            echo "</div>
";
        }
        // line 24
        echo "
<div id=\"container-post\">
    ";
        // line 26
        $this->env->loadTemplate("OlogySocialBundle:Post:post_sidebar.html.twig")->display($context);
        // line 27
        echo "    ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:like-feedback-prompt.html.twig")->display($context);
        // line 28
        echo "
    <div id=\"postbox\">
        <div id=\"posts-box-main\">
            <div class=\"backto-ology\">
                ";
        // line 32
        if (($this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "previousPostExist", array(), "array") != "false")) {
            // line 33
            echo "                    <input class=\"get-previous-post\" type=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "previousPostId", array(), "array"), "slug" => $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "previousPostSlug", array(), "array"))), "html", null, true);
            echo "\" ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "previousPostTitle", array(), "array")) < 50)) {
                echo " value=\"<< ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "previousPostTitle", array(), "array"), "html", null, true);
                echo "\" ";
            } else {
                echo " value=\"<< ";
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "previousPostTitle", array(), "array"), 50, false, "..."), "html", null, true);
                echo "\"";
            }
            echo "/>
                ";
        } else {
            // line 35
            echo "                    <input class=\"no-previous-post\" type=\"button\" value=\"\"/>
                ";
        }
        // line 37
        echo "                <input class=\"back-to-current-ology\" type=\"button\" value=\"Back To All Things &#10 ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "Name"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
        echo "\"/>
                ";
        // line 38
        if (($this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "nextPostExist", array(), "array") != "false")) {
            // line 39
            echo "                    <input class=\"get-next-post\" type=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "nextPostId", array(), "array"), "slug" => $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "nextPostSlug", array(), "array"))), "html", null, true);
            echo "\" ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "nextPostTitle", array(), "array")) < 50)) {
                echo " value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "nextPostTitle", array(), "array"), "html", null, true);
                echo " >>\" ";
            } else {
                echo " value=\"";
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "nextPostTitle", array(), "array"), 50, false, "..."), "html", null, true);
                echo " >>\"";
            }
            echo "/>
                ";
        } else {
            // line 41
            echo "                    <input class=\"no-next-post\" type=\"button\" value=\"\"/>
                ";
        }
        // line 43
        echo "            </div>
                
            <div id=\"post-box\">
                ";
        // line 46
        if ($this->getContext($context, "canDeletePost")) {
            // line 47
            echo "                    ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:post_edit_tip.html.twig")->display($context);
            // line 48
            echo "                    <div id=\"edit-box\">
                        ";
            // line 49
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:edit_post.html.twig")->display($context);
            // line 50
            echo "                    </div>
                    <a href=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_delete", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\" class=\"delete-post-item\">x</a>
                    <span class=\"space-item\"> | </span>
                    <div class=\"edit-item\">Edit</div>
                ";
        }
        // line 55
        echo "
                <div id=\"post-main\">
                    <h2><a href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
        echo "\" class=\"post-link\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
        echo "</a></h2>
                    ";
        // line 58
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 3)) {
            // line 59
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "post"), "imageSourceUrl") != null)) {
                // line 60
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "imageSourceUrl"), "html", null, true);
                echo "\" target=\"_blank\">";
                echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
                echo "</a>
                        ";
            } else {
                // line 62
                echo "                            ";
                echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
                echo "
                        ";
            }
            // line 64
            echo "                    ";
        }
        // line 65
        echo "                    ";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 4)) {
            // line 66
            echo "                        <iframe width=\"590\" src=\"http://www.youtube.com/embed/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "videoUrl"), "html", null, true);
            echo "?wmode=transparent\" frameborder=\"0\" allowfullscreen></iframe>
                    ";
        }
        // line 68
        echo "                    ";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 5)) {
            // line 69
            echo "                        <audio controls=\"true\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_audio_path") . $this->getAttribute($this->getContext($context, "post"), "audioUrl"))), "html", null, true);
            echo "\" type=\"audio/mpeg\" style=\"width:100%;\">
                                Your browser does not support the audio element.
                        </audio>
                    ";
        }
        // line 73
        echo "
                    <div class=\"post-user\">
                        <div class=\"user-img\">
                            <a class=\"user-popupable\" pid=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "imageUrl"))), "html", null, true);
        echo "\" class=\"user-pic\"></a>
                        </div>
                        <div class=\"small\">
                            <div id=\"user-name\">by <a class=\"user-popupable\" pid=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"), "html", null, true);
        echo "</a></div><br />
                            On ";
        // line 80
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "creationDate"), "M d, Y"), "html", null, true);
        echo "<br />
                            ";
        // line 82
        echo "                            ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologized.html.twig")->display(array_merge($context, array("inAPost" => "true")));
        // line 83
        echo "                        </div>
                    </div>
                        
                    <p>";
        // line 86
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "textContent"), "html", null, true));
        echo "</p>
                    ";
        // line 87
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 3)) {
            // line 88
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "post"), "imageSourceUrl") != null)) {
                // line 89
                echo "                            <div class=\"via-site-name\">Via ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "imageSourceUrl"), "html", null, true);
                echo "</div>
                        ";
            }
            // line 91
            echo "                    ";
        }
        // line 92
        echo "                          
                <div id=\"comments-main\">
                    <div class=\"comments\">
                        <img src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment_icon_grey.png"), "html", null, true);
        echo "\"/>
                        ";
        // line 96
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") <= 1)) {
            // line 97
            echo "                                 ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
            echo " Comment
                        ";
        } else {
            // line 99
            echo "                                 ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
            echo " Comments
                        ";
        }
        // line 101
        echo "                    </div>
                    
                    ";
        // line 103
        if ($this->getContext($context, "loggedIn")) {
            // line 104
            echo "                        ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:create.html.twig")->display(array_merge($context, array("form" => $this->getContext($context, "commentForm"))));
            // line 105
            echo "                    ";
        } else {
            // line 106
            echo "                        ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:create.html.twig")->display(array_merge($context, array("form" => $this->getContext($context, "commentForm"), "showprompt" => true)));
            // line 107
            echo "                        ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display(array_merge($context, array("prompt_action" => "1")));
            // line 108
            echo "                        ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:almost-register-prompt.html.twig")->display($context);
            // line 109
            echo "                    ";
        }
        // line 110
        echo "                    <br/>
                    
                    <div id=\"comments\">
                        ";
        // line 113
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 114
            echo "                        <div class=\"comment\"> <a name=\"comments\"></a>
                        ";
            // line 115
            if ($this->getContext($context, "loggedIn")) {
                // line 116
                echo "                            ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id") == $this->getAttribute($this->getContext($context, "user"), "id"))) {
                    // line 117
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_comment_delete", array("id" => $this->getAttribute($this->getContext($context, "comment"), "id"))), "html", null, true);
                    echo "\" class=\"delete-item\">x</a>
                            ";
                }
                // line 119
                echo "                        ";
            }
            // line 120
            echo "                            <div class=\"user-img\">
                                <a href=\"";
            // line 121
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
            echo "\"></a>
                            </div>
                            <p style=\"padding-left:50px\"><a href=\"";
            // line 123
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
            echo "</a> - ";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
            echo "
                                <span class=\"small\">
                                    <br /> Commented <abbr class=\"timeago\" title=\"";
            // line 125
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "creationDate"), "c"), "html", null, true);
            echo "\"></abbr>
                                </span>
                            </p>
                        </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 130
        echo "                    </div>
                    
                    ";
        // line 132
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") > 0)) {
            // line 133
            echo "                        <div id=\"comment-scroll\">
                            <span>Go ahead, tell us what you really think.</span><img id=\"scrollUpToCommentBox\" src=\"";
            // line 134
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment_button_big.png"), "html", null, true);
            echo "\" />
                        </div>
                    ";
        }
        // line 137
        echo "                    
                </div>
            </div>
        </div>
        ";
        // line 141
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_bottom.html.twig")->display($context);
        // line 142
        echo "    </div>
</div>

    <div id=\"post-right\">
        ";
        // line 146
        $this->env->loadTemplate("OlogySocialBundle:Tips:whats_new_tip.html.twig")->display($context);
        // line 147
        echo "        ";
        if ($this->getContext($context, "loggedIn")) {
            // line 148
            echo "        <div class=\"whats-new-user-post\">
            <h2>What's Happening?</h2><br />
            ";
            // line 150
            if ((twig_length_filter($this->env, $this->getContext($context, "notifications")) > 0)) {
                // line 151
                echo "                ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:notifications.html.twig")->display($context);
                // line 152
                echo "            ";
            } else {
                // line 153
                echo "                <h3><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
                echo "\">Looks like nothing new is going on in your ologies.</a></h3>
                <br />
                <a href=\"";
                // line 155
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
                echo "\">Why don’t you explore and find some new ones to join!</a>
            ";
            }
            // line 157
            echo "        </div>
        ";
        }
        // line 158
        echo "     
        ";
        // line 159
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:feature.html.twig")->display(array_merge($context, array("proPost" => $this->getContext($context, "proPost1"), "userPosts" => $this->getContext($context, "userPosts1"))));
        // line 160
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:feature.html.twig")->display(array_merge($context, array("proPost" => $this->getContext($context, "proPost2"), "userPosts" => $this->getContext($context, "userPosts2"))));
        // line 161
        echo "    </div>
</div>
";
    }

    // line 164
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 165
        echo "<script type=\"text/javascript\" src=\"http://platform.tumblr.com/v1/share.js\"></script>
<script type=\"text/javascript\" src=\"//platform.twitter.com/widgets.js\"></script>
<script src=\"";
        // line 167
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/postscroll.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script src=\"";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_comment.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" src=\"//assets.pinterest.com/js/pinit.js\"></script>
<script type=\"text/javascript\">
\$('#commentForm_content').val(\"\");
</script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  502 => 177,  498 => 176,  494 => 175,  483 => 167,  479 => 165,  476 => 164,  470 => 161,  467 => 160,  465 => 159,  462 => 158,  458 => 157,  453 => 155,  447 => 153,  444 => 152,  441 => 151,  439 => 150,  435 => 148,  432 => 147,  430 => 146,  424 => 142,  422 => 141,  416 => 137,  410 => 134,  407 => 133,  405 => 132,  401 => 130,  390 => 125,  381 => 123,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  357 => 115,  354 => 114,  350 => 113,  345 => 110,  342 => 109,  339 => 108,  336 => 107,  333 => 106,  330 => 105,  327 => 104,  325 => 103,  321 => 101,  315 => 99,  309 => 97,  307 => 96,  303 => 95,  298 => 92,  295 => 91,  289 => 89,  286 => 88,  284 => 87,  280 => 86,  275 => 83,  272 => 82,  268 => 80,  258 => 79,  248 => 76,  243 => 73,  235 => 69,  232 => 68,  226 => 66,  223 => 65,  220 => 64,  214 => 62,  206 => 60,  203 => 59,  201 => 58,  195 => 57,  191 => 55,  182 => 51,  179 => 50,  177 => 49,  174 => 48,  171 => 47,  169 => 46,  164 => 43,  160 => 41,  144 => 39,  142 => 38,  135 => 37,  131 => 35,  115 => 33,  113 => 32,  107 => 28,  104 => 27,  102 => 26,  98 => 24,  94 => 22,  92 => 21,  89 => 20,  87 => 19,  84 => 18,  77 => 15,  74 => 14,  67 => 12,  59 => 9,  53 => 7,  51 => 6,  48 => 5,  40 => 4,  32 => 3,);
    }
}

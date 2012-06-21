<?php

/* OlogySocialBundle:FrontEnd:professional_post.html.twig */
class __TwigTemplate_7d4a4ecf5531a6512082eff07fe3763a extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "htmlTitle"), "html", null, true);
        echo "\" />";
    }

    // line 4
    public function block_fb_description($context, array $blocks = array())
    {
        echo "<meta property=\"og:description\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "summary"), "html", null, true);
        echo "\" />";
    }

    // line 5
    public function block_fb_image($context, array $blocks = array())
    {
        echo "<meta property=\"og:image\" content=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))), "html", null, true);
        echo "\" />";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "htmlTitle"), "html", null, true);
        echo " | Ology";
    }

    // line 9
    public function block_page_header($context, array $blocks = array())
    {
        // line 10
        echo "<meta name=\"title\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "metaTitle"), "html", null, true);
        echo "\" />
<meta name=\"keywords\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "metaKeywords"), "html", null, true);
        echo "\" />
<meta name=\"description\" content=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "metaDescription"), "html", null, true);
        echo "\" />
<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/post.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 18
            echo "<div id='page'>
        ";
            // line 19
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:dock.html.twig")->display($context);
            // line 20
            echo "</div>
";
        }
        // line 22
        echo "
<div id=\"container-post\">
    ";
        // line 24
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:like-feedback-prompt.html.twig")->display($context);
        // line 25
        echo "    ";
        if ($this->getAttribute($this->getContext($context, "channel"), "ad1")) {
            // line 26
            echo "        <div id=\"ad-one\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad1");
            echo "</div>
    ";
        }
        // line 28
        echo "    
    ";
        // line 29
        $this->env->loadTemplate("OlogySocialBundle:Post:post_sidebar.html.twig")->display($context);
        echo " 
    <div id=\"postbox\">
        <div id=\"posts-box-main\">            
            <div class=\"backto-ology\">
                ";
        // line 33
        if (($this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "previousPostExist", array(), "array") != "false")) {
            // line 34
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
            // line 36
            echo "                    <input class=\"no-previous-post\" type=\"button\" value=\"\"/>
                ";
        }
        // line 38
        echo "                <input class=\"back-to-current-ology\" type=\"button\" value=\"Back To All Things &#10 ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "Name"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
        echo "\"/>
                ";
        // line 39
        if (($this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "nextPostExist", array(), "array") != "false")) {
            // line 40
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
            // line 42
            echo "                    <input class=\"no-next-post\" type=\"button\" value=\"\"/>
                ";
        }
        // line 44
        echo "            </div>            

            <div id=\"post-box\">
                <div id=\"post-main\">
                    <h2><a href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
        echo "\" class=\"post-link\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "htmltitle"), "html", null, true);
        echo "</a></h2>
                    <div id=\"lead-image\">
                        ";
        // line 50
        echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
        echo "
                            ";
        // line 51
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 8)) {
            // line 52
            echo "                            <div id=\"post-grade\">
                                <br />
                                ";
            // line 54
            if ($this->getAttribute($this->getContext($context, "post"), "movieGenre")) {
                // line 55
                echo "                                        <h1>Film Rundown:</h1>
                                        <h2>Genre: </h2>
                                        <p>";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "movieGenre"), "name"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 59
            echo "                                ";
            if ($this->getAttribute($this->getContext($context, "post"), "movieParentalRating")) {
                // line 60
                echo "                                        <h2>Parental Rating:</h2>
                                        <p>";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "movieParentalRating"), "name"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 63
            echo "
                                ";
            // line 64
            if ($this->getAttribute($this->getContext($context, "post"), "moviedirector")) {
                // line 65
                echo "                                        <h2>Director:</h2>
                                        <p>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "moviedirector"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 68
            echo "
                                ";
            // line 69
            if ($this->getAttribute($this->getContext($context, "post"), "movieStarring")) {
                // line 70
                echo "                                        <h2>Starring:</h2>
                                        <p>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "movieStarring"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 72
            echo "\t\t\t\t

                                ";
            // line 74
            if ($this->getAttribute($this->getContext($context, "post"), "movieRuntime")) {
                // line 75
                echo "                                        <h2>Runtime:</h2>
                                        <p>";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "movieRuntime"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 78
            echo "
                                ";
            // line 79
            if ($this->getAttribute($this->getContext($context, "post"), "rating")) {
                // line 80
                echo "                                        <h2>Our rating:</h2>
                                        <p> <span class=\"movie-rating\">";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "rating"), "name"), "html", null, true);
                echo "</span></p>
                                ";
            }
            // line 83
            echo "                            </div>
                            ";
        }
        // line 85
        echo "                            
                        </div>
                    
                        <div class=\"post-caption\">";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "imageCaption"), "html", null, true);
        echo "</div>
                        
                        <div class=\"post-user\">
                            <div class=\"user-img\">
                                <a class=\"user-popupable\" pid=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "imageUrl"))), "html", null, true);
        echo "\" class=\"user-pic\"></a>
                            </div>
                            <div class=\"pro-small\">
                                <div id=\"user-name\">by <a class=\"user-popupable\" pid=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"), "html", null, true);
        echo "</a></div><br />
                                ";
        // line 96
        if (twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "editorTitle"))) {
            // line 97
            echo "                                ";
        } else {
            // line 98
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "editorTitle"), "html", null, true);
            echo " <br />
                                ";
        }
        // line 100
        echo "                                On ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "creationDate"), "M d, Y"), "html", null, true);
        echo "
                                ";
        // line 102
        echo "                                ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologized.html.twig")->display(array_merge($context, array("inAPost" => "true")));
        // line 103
        echo "                            </div>
                        </div>
                        ";
        // line 105
        echo $this->getAttribute($this->getContext($context, "post"), "htmlContent");
        echo "

                        ";
        // line 107
        if ($this->getAttribute($this->getContext($context, "post"), "citeUrl")) {
            // line 108
            echo "                            <div id=\"cite-link\">
                                Via: <a href=\"";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "citeUrl"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "citeTitle"), "html", null, true);
            if ($this->getAttribute($this->getContext($context, "post"), "citeImage")) {
                echo "<img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "citeImage"), "html", null, true);
                echo "\"/>";
            }
            echo "</a>
                            </div>
                        ";
        }
        // line 112
        echo "
                        ";
        // line 113
        if ((array_key_exists("tags", $context) && (twig_length_filter($this->env, $this->getContext($context, "tags")) > 0))) {
            // line 114
            echo "                        <div id=\"check-out-more\">Check Out More:</div>
                            <div id=\"tags\" style=\"font-size: 11px\">
                                ";
            // line 116
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tags"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 117
                echo "                                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_search_all_link", array("term" => twig_urlencode_filter($this->getContext($context, "tag")))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "tag"), "html", null, true);
                echo "</a>";
                if ($this->getAttribute($this->getContext($context, "loop"), "last")) {
                    echo ".";
                } else {
                    echo ",";
                }
                // line 118
                echo "                                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 119
            echo "                            </div>
                        ";
        }
        // line 121
        echo "                    
                        ";
        // line 122
        if (($this->getContext($context, "loggedIn") && $this->env->getExtension('security')->isGranted("ROLE_EDITOR"))) {
            // line 123
            echo "                            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_edit_pp_form", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"), "postPublish" => true)), "html", null, true);
            echo "\">EDIT</a>
                        ";
        }
        // line 125
        echo "                </div>
                      
                <div id=\"comments-main\">
                        <div class=\"comments\">
                            <img src=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment_icon_grey.png"), "html", null, true);
        echo "\"/>
                            ";
        // line 130
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") <= 1)) {
            // line 131
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
            echo " Comment
                            ";
        } else {
            // line 133
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
            echo " Comments
                            ";
        }
        // line 134
        echo "         
                        </div>

                        ";
        // line 137
        if ($this->getContext($context, "loggedIn")) {
            // line 138
            echo "                            ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:create.html.twig")->display(array_merge($context, array("form" => $this->getContext($context, "commentForm"))));
            // line 139
            echo "                        ";
        } else {
            // line 140
            echo "                            ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:create.html.twig")->display(array_merge($context, array("form" => $this->getContext($context, "commentForm"), "showprompt" => true)));
            // line 141
            echo "                            ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display(array_merge($context, array("prompt_action" => "1")));
            // line 142
            echo "                        ";
        }
        // line 143
        echo "                        <br/>
                            
                        <div id=\"comments\">
                            ";
        // line 146
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 147
            echo "                            <div class=\"comment\"> <a name=\"comments\">
                            ";
            // line 148
            if ($this->getContext($context, "loggedIn")) {
                // line 149
                echo "                                    ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id") == $this->getAttribute($this->getContext($context, "user"), "id"))) {
                    // line 150
                    echo "                                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_comment_delete", array("id" => $this->getAttribute($this->getContext($context, "comment"), "id"))), "html", null, true);
                    echo "\" class=\"delete-item\">x</a> 
                                    ";
                }
                // line 152
                echo "                            ";
            }
            // line 153
            echo "                                    <div class=\"user-img\">
                                            <a href=\"";
            // line 154
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
            echo "\"></a>
                                    </div>

                                    <p style=\"padding-left:50px\"><a href=\"";
            // line 157
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
            echo "</a> - ";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
            echo "
                                            <span class=\"small\">
                                                    <br /> Commented on ";
            // line 159
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "creationDate"), "m d, Y"), "html", null, true);
            echo "
                                            </span>
                                    </p>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 164
        echo "
                            <div class=\"goto-post\">
                                    <a href=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
        echo "\" class=\"post-link\">Go to post »</a>
                            </div>
                        </div>
                        ";
        // line 169
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") > 0)) {
            // line 170
            echo "                            <div id=\"comment-scroll\">
                                <span>Go ahead, tell us what you really think.</span><img id=\"scrollUpToCommentBox\" src=\"";
            // line 171
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment_button_big.png"), "html", null, true);
            echo "\" />
                            </div>
                        ";
        }
        // line 174
        echo "                </div>
                   
    </div>           
    ";
        // line 177
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_bottom.html.twig")->display(array_merge($context, array("pro" => true)));
        // line 178
        echo "   </div>
  </div>  
     
  <div id=\"pro-post-right\">
        ";
        // line 182
        if ($this->getAttribute($this->getContext($context, "channel"), "ad2")) {
            // line 183
            echo "        <div id=\"ad-two\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad2");
            echo "</div>
        ";
        }
        // line 185
        echo "        ";
        if ($this->getContext($context, "loggedIn")) {
            // line 186
            echo "        <div class=\"whats-new-pro-post\">
            <h2>What's Happening?</h2><br />
            ";
            // line 188
            if ((twig_length_filter($this->env, $this->getContext($context, "notifications")) > 0)) {
                // line 189
                echo "                ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:notifications.html.twig")->display($context);
                // line 190
                echo "            ";
            } else {
                // line 191
                echo "                <h3><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
                echo "\">Looks like nothing new is going on in your ologies.</a></h3>
                <br />
                <a href=\"";
                // line 193
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
                echo "\">Why don’t you explore and find some new ones to join!</a>
            ";
            }
            // line 195
            echo "        </div>
        ";
        }
        // line 197
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:feature.html.twig")->display(array_merge($context, array("proPost" => $this->getContext($context, "proPost1"), "userPosts" => $this->getContext($context, "userPosts1"))));
        // line 198
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:most_viewed_post.html.twig")->display(array_merge($context, array("mostViewedPosts" => $this->getContext($context, "mostViewedPosts"))));
        // line 199
        echo "        ";
        if ($this->getAttribute($this->getContext($context, "channel", true), "video", array(), "any", true, true)) {
            // line 200
            echo "            <div id=\"ad-video\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "video");
            echo "</div>
        ";
        }
        // line 202
        echo "        ";
        if ($this->getAttribute($this->getContext($context, "channel"), "ad3")) {
            // line 203
            echo "        <div id=\"ad-three\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad3");
            echo "</div>
        ";
        }
        // line 205
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:feature.html.twig")->display(array_merge($context, array("proPost" => $this->getContext($context, "proPost2"), "userPosts" => $this->getContext($context, "userPosts2"))));
        // line 206
        echo "  </div>   
</div>
    
    
";
        // line 210
        if ($this->getAttribute($this->getContext($context, "channel"), "ad4")) {
            // line 211
            echo "    <div id=\"ad-four\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad4");
            echo "</div>
";
        }
        // line 213
        if ($this->getAttribute($this->getContext($context, "channel"), "ad5")) {
            // line 214
            echo "    <div id=\"ad-five\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad5");
            echo "</div>
";
        }
    }

    // line 217
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 218
        echo "<script type=\"text/javascript\" src=\"http://platform.tumblr.com/v1/share.js\"></script>
<script type=\"text/javascript\" src=\"//platform.twitter.com/widgets.js\"></script>
<script src=\"";
        // line 220
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
        // line 228
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_comment.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" src=\"//assets.pinterest.com/js/pinit.js\"></script>
<script src=\"";
        // line 230
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script type=\"text/javascript\">
\$('#commentForm_content').val(\"\");
</script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:professional_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  674 => 231,  670 => 230,  665 => 228,  654 => 220,  650 => 218,  647 => 217,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 206,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 182,  552 => 178,  550 => 177,  545 => 174,  539 => 171,  536 => 170,  534 => 169,  528 => 166,  524 => 164,  496 => 154,  493 => 153,  490 => 152,  481 => 149,  472 => 146,  467 => 143,  464 => 142,  461 => 141,  458 => 140,  455 => 139,  452 => 138,  450 => 137,  439 => 133,  433 => 131,  431 => 130,  413 => 122,  410 => 121,  406 => 119,  392 => 118,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 78,  244 => 112,  236 => 69,  293 => 111,  246 => 72,  242 => 89,  173 => 64,  354 => 137,  319 => 122,  311 => 97,  303 => 115,  278 => 106,  262 => 101,  198 => 54,  334 => 119,  321 => 124,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 123,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 111,  230 => 67,  216 => 62,  213 => 61,  339 => 108,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 75,  234 => 86,  223 => 64,  348 => 120,  340 => 129,  336 => 128,  332 => 105,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 96,  304 => 94,  300 => 142,  290 => 108,  287 => 109,  279 => 84,  226 => 84,  149 => 68,  136 => 49,  125 => 48,  115 => 46,  100 => 40,  130 => 44,  251 => 94,  247 => 95,  238 => 70,  194 => 52,  191 => 70,  168 => 80,  128 => 49,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 85,  268 => 81,  263 => 79,  255 => 76,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 69,  183 => 75,  181 => 48,  163 => 57,  140 => 53,  170 => 30,  121 => 46,  112 => 41,  118 => 34,  106 => 37,  157 => 58,  232 => 109,  228 => 66,  220 => 63,  210 => 76,  207 => 61,  159 => 45,  151 => 27,  147 => 55,  105 => 25,  85 => 16,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 164,  504 => 157,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 150,  479 => 148,  476 => 147,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 134,  442 => 145,  438 => 143,  435 => 142,  427 => 129,  421 => 125,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 117,  373 => 120,  367 => 119,  364 => 116,  358 => 113,  355 => 112,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 131,  330 => 104,  328 => 103,  325 => 102,  323 => 108,  320 => 100,  317 => 112,  307 => 116,  299 => 95,  296 => 112,  292 => 99,  289 => 92,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 80,  259 => 94,  256 => 88,  250 => 74,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 60,  206 => 78,  197 => 54,  187 => 74,  184 => 80,  182 => 67,  174 => 64,  150 => 49,  119 => 45,  110 => 48,  53 => 8,  91 => 39,  66 => 10,  98 => 37,  96 => 41,  166 => 61,  160 => 56,  154 => 28,  143 => 54,  138 => 46,  101 => 25,  58 => 19,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 88,  276 => 105,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 68,  229 => 84,  225 => 65,  221 => 84,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 44,  169 => 59,  167 => 61,  164 => 67,  155 => 40,  139 => 62,  114 => 28,  83 => 15,  76 => 20,  72 => 27,  68 => 20,  64 => 12,  56 => 7,  21 => 2,  209 => 59,  205 => 81,  196 => 71,  192 => 51,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 69,  148 => 54,  145 => 66,  141 => 58,  134 => 51,  132 => 24,  127 => 53,  123 => 49,  109 => 40,  93 => 19,  90 => 18,  54 => 15,  133 => 48,  124 => 33,  111 => 37,  107 => 47,  80 => 27,  63 => 9,  60 => 17,  69 => 21,  61 => 9,  52 => 10,  50 => 16,  45 => 6,  43 => 10,  34 => 5,  224 => 65,  215 => 61,  211 => 80,  204 => 57,  200 => 55,  195 => 68,  193 => 67,  190 => 68,  188 => 50,  185 => 67,  179 => 65,  177 => 32,  171 => 42,  162 => 59,  158 => 58,  156 => 57,  153 => 39,  146 => 38,  142 => 36,  137 => 52,  131 => 50,  126 => 34,  120 => 22,  117 => 29,  103 => 24,  99 => 22,  74 => 28,  47 => 11,  32 => 3,  39 => 7,  26 => 5,  97 => 31,  95 => 20,  88 => 17,  82 => 33,  78 => 26,  75 => 12,  71 => 11,  22 => 3,  44 => 9,  30 => 11,  20 => 2,  25 => 7,  49 => 9,  42 => 10,  40 => 4,  23 => 5,  27 => 5,  17 => 1,  92 => 34,  86 => 16,  79 => 13,  77 => 31,  57 => 16,  46 => 11,  37 => 8,  33 => 7,  29 => 6,  24 => 5,  19 => 2,  135 => 25,  129 => 35,  122 => 42,  116 => 30,  113 => 49,  108 => 26,  104 => 35,  102 => 18,  94 => 40,  89 => 30,  87 => 35,  84 => 34,  81 => 33,  73 => 24,  70 => 26,  67 => 13,  62 => 16,  59 => 19,  55 => 8,  51 => 14,  48 => 5,  41 => 5,  38 => 17,  35 => 6,  31 => 8,  28 => 6,);
    }
}

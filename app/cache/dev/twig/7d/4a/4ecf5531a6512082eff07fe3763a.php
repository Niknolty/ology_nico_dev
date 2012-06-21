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
        echo "    
    ";
        // line 26
        if ($this->getAttribute($this->getContext($context, "channel"), "ad1")) {
            // line 27
            echo "     <div id=\"ad-one\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad1");
            echo "</div>
    ";
        }
        // line 29
        echo "
    ";
        // line 30
        $this->env->loadTemplate("OlogySocialBundle:Post:post_sidebar.html.twig")->display($context);
        echo " 
    <div id=\"postbox\">
        <div id=\"posts-box-main\">            
            <div class=\"backto-ology\">
                ";
        // line 34
        if (($this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "previousPostExist", array(), "array") != "false")) {
            // line 35
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
            // line 37
            echo "                    <input class=\"no-previous-post\" type=\"button\" value=\"\"/>
                ";
        }
        // line 39
        echo "                <input class=\"back-to-current-ology\" type=\"button\" value=\"Back To All Things &#10 ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "Name"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
        echo "\"/>
                ";
        // line 40
        if (($this->getAttribute($this->getContext($context, "getPreviousAndNextPostInfos"), "nextPostExist", array(), "array") != "false")) {
            // line 41
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
            // line 43
            echo "                    <input class=\"no-next-post\" type=\"button\" value=\"\"/>
                ";
        }
        // line 45
        echo "            </div>            

            <div id=\"post-box\">
                <div id=\"post-main\">
                    <h2><a href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
        echo "\" class=\"post-link\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "htmltitle"), "html", null, true);
        echo "</a></h2>
                    <div id=\"lead-image\">
                        ";
        // line 51
        echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
        echo "
                            ";
        // line 52
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 8)) {
            // line 53
            echo "                            <div id=\"post-grade\">
                                <br />
                                ";
            // line 55
            if ($this->getAttribute($this->getContext($context, "post"), "movieGenre")) {
                // line 56
                echo "                                        <h1>Film Rundown:</h1>
                                        <h2>Genre: </h2>
                                        <p>";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "movieGenre"), "name"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 60
            echo "                                ";
            if ($this->getAttribute($this->getContext($context, "post"), "movieParentalRating")) {
                // line 61
                echo "                                        <h2>Parental Rating:</h2>
                                        <p>";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "movieParentalRating"), "name"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 64
            echo "
                                ";
            // line 65
            if ($this->getAttribute($this->getContext($context, "post"), "moviedirector")) {
                // line 66
                echo "                                        <h2>Director:</h2>
                                        <p>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "moviedirector"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 69
            echo "
                                ";
            // line 70
            if ($this->getAttribute($this->getContext($context, "post"), "movieStarring")) {
                // line 71
                echo "                                        <h2>Starring:</h2>
                                        <p>";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "movieStarring"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 73
            echo "\t\t\t\t

                                ";
            // line 75
            if ($this->getAttribute($this->getContext($context, "post"), "movieRuntime")) {
                // line 76
                echo "                                        <h2>Runtime:</h2>
                                        <p>";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "movieRuntime"), "html", null, true);
                echo "</p>
                                ";
            }
            // line 79
            echo "
                                ";
            // line 80
            if ($this->getAttribute($this->getContext($context, "post"), "rating")) {
                // line 81
                echo "                                        <h2>Our rating:</h2>
                                        <p> <span class=\"movie-rating\">";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "rating"), "name"), "html", null, true);
                echo "</span></p>
                                ";
            }
            // line 84
            echo "                            </div>
                            ";
        }
        // line 86
        echo "                            
                        </div>
                    
                        <div class=\"post-caption\">";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "imageCaption"), "html", null, true);
        echo "</div>
                        
                        <div class=\"post-user\">
                            <div class=\"user-img\">
                                <a class=\"user-popupable\" pid=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "imageUrl"))), "html", null, true);
        echo "\" class=\"user-pic\"></a>
                            </div>
                            <div class=\"pro-small\">
                                <div id=\"user-name\">by <a class=\"user-popupable\" pid=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"), "html", null, true);
        echo "</a></div><br />
                                ";
        // line 97
        if (twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "editorTitle"))) {
            // line 98
            echo "                                ";
        } else {
            // line 99
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "editorTitle"), "html", null, true);
            echo " <br />
                                ";
        }
        // line 101
        echo "                                On ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "creationDate"), "M d, Y"), "html", null, true);
        echo "
                                ";
        // line 103
        echo "                                ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologized.html.twig")->display(array_merge($context, array("inAPost" => "true")));
        // line 104
        echo "                            </div>
                        </div>
                        ";
        // line 106
        echo $this->getAttribute($this->getContext($context, "post"), "htmlContent");
        echo "

                        ";
        // line 108
        if ($this->getAttribute($this->getContext($context, "post"), "citeUrl")) {
            // line 109
            echo "                            <div id=\"cite-link\">
                                Via: <a href=\"";
            // line 110
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
        // line 113
        echo "
                        ";
        // line 114
        if ((array_key_exists("tags", $context) && (twig_length_filter($this->env, $this->getContext($context, "tags")) > 0))) {
            // line 115
            echo "                        <div id=\"check-out-more\">Check Out More:</div>
                            <div id=\"tags\" style=\"font-size: 11px\">
                                ";
            // line 117
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
                // line 118
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
                // line 119
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
            // line 120
            echo "                            </div>
                        ";
        }
        // line 122
        echo "                    
                        ";
        // line 123
        if (($this->getContext($context, "loggedIn") && $this->env->getExtension('security')->isGranted("ROLE_EDITOR"))) {
            // line 124
            echo "                            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_edit_pp_form", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"), "postPublish" => true)), "html", null, true);
            echo "\">EDIT</a>
                        ";
        }
        // line 126
        echo "                </div>
                      
                <div id=\"comments-main\">
                        <div class=\"comments\">
                            <img src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment_icon_grey.png"), "html", null, true);
        echo "\"/>
                            ";
        // line 131
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") <= 1)) {
            // line 132
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
            echo " Comment
                            ";
        } else {
            // line 134
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
            echo " Comments
                            ";
        }
        // line 135
        echo "         
                        </div>

                        ";
        // line 138
        if ($this->getContext($context, "loggedIn")) {
            // line 139
            echo "                            ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:create.html.twig")->display(array_merge($context, array("form" => $this->getContext($context, "commentForm"))));
            // line 140
            echo "                        ";
        } else {
            // line 141
            echo "                            ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:create.html.twig")->display(array_merge($context, array("form" => $this->getContext($context, "commentForm"), "showprompt" => true)));
            // line 142
            echo "                            ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display(array_merge($context, array("prompt_action" => "1")));
            // line 143
            echo "                        ";
        }
        // line 144
        echo "                        <br/>
                            
                        <div id=\"comments\">
                            ";
        // line 147
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 148
            echo "                            <div class=\"comment\"> <a name=\"comments\">
                            ";
            // line 149
            if ($this->getContext($context, "loggedIn")) {
                // line 150
                echo "                                    ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id") == $this->getAttribute($this->getContext($context, "user"), "id"))) {
                    // line 151
                    echo "                                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_comment_delete", array("id" => $this->getAttribute($this->getContext($context, "comment"), "id"))), "html", null, true);
                    echo "\" class=\"delete-item\">x</a> 
                                    ";
                }
                // line 153
                echo "                            ";
            }
            // line 154
            echo "                                    <div class=\"user-img\">
                                            <a href=\"";
            // line 155
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
            echo "\"></a>
                                    </div>

                                    <p style=\"padding-left:50px\"><a href=\"";
            // line 158
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
            echo "</a> - ";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
            echo "
                                            <span class=\"small\">
                                                    <br /> Commented on ";
            // line 160
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
        // line 165
        echo "
                            <div class=\"goto-post\">
                                    <a href=\"";
        // line 167
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
        echo "\" class=\"post-link\">Go to post »</a>
                            </div>
                        </div>
                        ";
        // line 170
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") > 0)) {
            // line 171
            echo "                            <div id=\"comment-scroll\">
                                <span>Go ahead, tell us what you really think.</span><img id=\"scrollUpToCommentBox\" src=\"";
            // line 172
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment_button_big.png"), "html", null, true);
            echo "\" />
                            </div>
                        ";
        }
        // line 175
        echo "                </div>
                   
    </div>           
    ";
        // line 178
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_bottom.html.twig")->display(array_merge($context, array("pro" => true)));
        // line 179
        echo "   </div>
  </div>
     
     
  <div id=\"pro-post-right\">
        ";
        // line 184
        if ($this->getAttribute($this->getContext($context, "channel"), "ad2")) {
            // line 185
            echo "        <div id=\"ad-two\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad2");
            echo "</div>
        ";
        }
        // line 187
        echo "        ";
        if ($this->getContext($context, "loggedIn")) {
            // line 188
            echo "        <div class=\"whats-new-pro-post\">
            <h2>What's Happening?</h2><br />
            ";
            // line 190
            if ((twig_length_filter($this->env, $this->getContext($context, "notifications")) > 0)) {
                // line 191
                echo "                ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:notifications.html.twig")->display($context);
                // line 192
                echo "            ";
            } else {
                // line 193
                echo "                <h3><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
                echo "\">Looks like nothing new is going on in your ologies.</a></h3>
                <br />
                <a href=\"";
                // line 195
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
                echo "\">Why don’t you explore and find some new ones to join!</a>
            ";
            }
            // line 197
            echo "        </div>
        ";
        }
        // line 199
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:feature.html.twig")->display(array_merge($context, array("proPost" => $this->getContext($context, "proPost1"), "userPosts" => $this->getContext($context, "userPosts1"))));
        // line 200
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:most_viewed_post.html.twig")->display(array_merge($context, array("mostViewedPosts" => $this->getContext($context, "mostViewedPosts"))));
        // line 201
        echo "        ";
        if ($this->getAttribute($this->getContext($context, "channel", true), "video", array(), "any", true, true)) {
            // line 202
            echo "            <div id=\"ad-video\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "video");
            echo "</div>
        ";
        }
        // line 204
        echo "        ";
        if ($this->getAttribute($this->getContext($context, "channel"), "ad3")) {
            // line 205
            echo "        <div id=\"ad-three\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad3");
            echo "</div>
        ";
        }
        // line 207
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:feature.html.twig")->display(array_merge($context, array("proPost" => $this->getContext($context, "proPost2"), "userPosts" => $this->getContext($context, "userPosts2"))));
        // line 208
        echo "  </div>   
</div>
    
    
";
        // line 212
        if ($this->getAttribute($this->getContext($context, "channel"), "ad4")) {
            // line 213
            echo "    <div id=\"ad-four\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad4");
            echo "</div>
";
        }
        // line 215
        if ($this->getAttribute($this->getContext($context, "channel"), "ad5")) {
            // line 216
            echo "    <div id=\"ad-five\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad5");
            echo "</div>
";
        }
    }

    // line 219
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 220
        echo "<script type=\"text/javascript\" src=\"http://platform.tumblr.com/v1/share.js\"></script>
<script type=\"text/javascript\" src=\"//platform.twitter.com/widgets.js\"></script>
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script src=\"";
        // line 229
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_comment.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" src=\"//assets.pinterest.com/js/pinit.js\"></script>
<script src=\"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 232
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
        return array (  673 => 232,  669 => 231,  664 => 229,  653 => 220,  650 => 219,  642 => 216,  640 => 215,  634 => 213,  632 => 212,  626 => 208,  623 => 207,  617 => 205,  614 => 204,  608 => 202,  605 => 201,  602 => 200,  599 => 199,  595 => 197,  590 => 195,  584 => 193,  581 => 192,  578 => 191,  576 => 190,  572 => 188,  569 => 187,  563 => 185,  561 => 184,  554 => 179,  552 => 178,  547 => 175,  541 => 172,  538 => 171,  536 => 170,  530 => 167,  526 => 165,  515 => 160,  506 => 158,  498 => 155,  495 => 154,  492 => 153,  486 => 151,  483 => 150,  481 => 149,  478 => 148,  474 => 147,  469 => 144,  466 => 143,  463 => 142,  460 => 141,  457 => 140,  454 => 139,  452 => 138,  447 => 135,  441 => 134,  435 => 132,  433 => 131,  429 => 130,  423 => 126,  417 => 124,  415 => 123,  412 => 122,  408 => 120,  394 => 119,  383 => 118,  366 => 117,  362 => 115,  360 => 114,  357 => 113,  344 => 110,  341 => 109,  339 => 108,  334 => 106,  330 => 104,  327 => 103,  322 => 101,  316 => 99,  313 => 98,  311 => 97,  301 => 96,  291 => 93,  284 => 89,  279 => 86,  275 => 84,  270 => 82,  267 => 81,  265 => 80,  262 => 79,  257 => 77,  254 => 76,  252 => 75,  248 => 73,  243 => 72,  240 => 71,  238 => 70,  235 => 69,  230 => 67,  227 => 66,  225 => 65,  222 => 64,  217 => 62,  214 => 61,  211 => 60,  206 => 58,  202 => 56,  200 => 55,  196 => 53,  194 => 52,  190 => 51,  183 => 49,  177 => 45,  173 => 43,  157 => 41,  155 => 40,  148 => 39,  144 => 37,  128 => 35,  126 => 34,  119 => 30,  116 => 29,  110 => 27,  108 => 26,  105 => 25,  103 => 24,  99 => 22,  95 => 20,  93 => 19,  90 => 18,  88 => 17,  85 => 16,  79 => 13,  75 => 12,  71 => 11,  66 => 10,  63 => 9,  56 => 7,  48 => 5,  40 => 4,  32 => 3,);
    }
}

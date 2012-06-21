<?php

/* OlogySocialBundle:FrontEnd:post_card.html.twig */
class __TwigTemplate_ea2a5dff2ce1cc7bae7acdf51b633cd0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 2)) {
            // line 2
            echo "<div class=\"post text ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "html", null, true);
            echo "\" >
";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 3)) {
            // line 4
            echo "<div class=\"post pics ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "html", null, true);
            echo "\">
";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 4)) {
            // line 6
            echo "<div class=\"post video ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "html", null, true);
            echo "\">
";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 5)) {
            // line 8
            echo "<div class=\"post audio ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "html", null, true);
            echo "\">
";
        } else {
            // line 10
            echo "<div class=\"post text ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            echo " usernotype ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "html", null, true);
            echo "\">     
";
        }
        // line 11
        echo " 
        <div class=\"post-content\">
        ";
        // line 13
        if ((array_key_exists("unStashable", $context) && $this->getContext($context, "unStashable"))) {
            // line 14
            echo "            <div class=\"stash-delete-card\"><a class=\"stash-delete-card-link\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stash_unstash", array("stashId" => $this->getContext($context, "stashId"), "postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/close_button.png"), "html", null, true);
            echo "\"/></a></div>
        ";
        }
        // line 16
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologize_button.html.twig")->display($context);
        // line 17
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:Likes:ShowLikesCard.html.twig")->display($context);
        // line 18
        echo "        
        ";
        // line 19
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 2)) {
            // line 20
            echo "            ";
            if (array_key_exists("displayology", $context)) {
                // line 21
                echo "            <div class=\"";
                if (array_key_exists("large", $context)) {
                    echo "ology";
                } else {
                    echo "channel";
                }
                echo "-overlay-text\">
                Posted in <a href=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
                echo "</a>
            </div>
            ";
            }
            // line 25
            echo "        ";
        }
        // line 26
        echo "            
        ";
        // line 27
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 3)) {
            // line 28
            echo "            ";
            if (array_key_exists("displayology", $context)) {
                // line 29
                echo "            <div class=\"";
                if (array_key_exists("large", $context)) {
                    echo "ology";
                } else {
                    echo "channel";
                }
                echo "-overlay\">
                Posted in <a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
                echo "</a>
            </div>
            ";
            }
            // line 33
            echo "            <div style=\"overflow-x: hidden\">
                ";
            // line 34
            if (array_key_exists("large", $context)) {
                // line 35
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_medium_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
                echo "</a>
                ";
            } else {
                // line 37
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
                echo "</a>
                ";
            }
            // line 39
            echo "            </div>
        ";
        }
        // line 41
        echo "
        ";
        // line 42
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 4)) {
            // line 43
            echo "            ";
            if (array_key_exists("displayology", $context)) {
                // line 44
                echo "            <div class=\"";
                if (array_key_exists("large", $context)) {
                    echo "ology";
                } else {
                    echo "channel";
                }
                echo "-overlay-video\">
                Posted in <a href=\"";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
                echo "</a>
            </div>
            ";
            }
            // line 48
            echo "            <iframe width=\"560\" src=\"http://www.youtube.com/embed/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "videoUrl"), "html", null, true);
            echo "?wmode=transparent\" frameborder=\"0\" allowfullscreen></iframe>
        ";
        }
        // line 50
        echo "
        ";
        // line 51
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 5)) {
            // line 52
            echo "            ";
            if (array_key_exists("displayology", $context)) {
                // line 53
                echo "            <div class=\"";
                if (array_key_exists("large", $context)) {
                    echo "ology";
                } else {
                    echo "channel";
                }
                echo "-overlay-audio\">
                Posted in <a href=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
                echo "</a>
            </div>
            ";
            }
            // line 57
            echo "            <audio controls=\"true\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_audio_path") . $this->getAttribute($this->getContext($context, "post"), "audioUrl"))), "html", null, true);
            echo "\" type=\"audio/mpeg\" style=\"width:100%;\">
                Your browser does not support the audio element.
            </audio>
        ";
        }
        // line 61
        echo "
        <h3><a href=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
        echo "</a></h3>
        
        <p class=\"card-txt\">
            ";
        // line 65
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "textContent"), "html", null, true));
        echo "
            ";
        // line 66
        if ($this->getAttribute($this->getContext($context, "post"), "isTextContentStripped")) {
            // line 67
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
            echo "\">...</a>
                ";
            // line 68
            $this->env->loadTemplate("OlogySocialBundle:Tips:read_more_tip.html.twig")->display($context);
            // line 69
            echo "            ";
        }
        // line 70
        echo "        </p>
        <hr align=\"center\" width=\"90%\" color=\"C5C5C5\" size=\"1\"/>
        <div class=\"user-img\">
            <a href=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "imageUrl"))), array("class" => "user-pic"));
        echo "</a>
        </div>

        <div class=\"small\">
            Posted by
            <a href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\" class=\"user-popupable\" pid=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\">          
                ";
        // line 79
        $context["firstname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"));
        // line 80
        echo "                ";
        $context["lastname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"));
        // line 81
        echo "                ";
        if ((($this->getContext($context, "firstname_length") + $this->getContext($context, "lastname_length")) >= 15)) {
            echo " 
                    ";
            // line 82
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName") . " ") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName")), 15, false, "..."), "html", null, true);
            echo "
                ";
        } else {
            // line 83
            echo "   
                    ";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"), "html", null, true);
            echo "
                ";
        }
        // line 85
        echo "      
            </a><br />
            in <a href=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
        echo "</a><br/>
        </div>
        
        ";
        // line 91
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologized.html.twig")->display($context);
        // line 92
        echo "        
        ";
        // line 94
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:Likes:ShowStats.html.twig")->display($context);
        // line 95
        echo "        
    </div> 
               
    ";
        // line 98
        if ($this->getContext($context, "loggedIn")) {
            // line 99
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "commentForm", true), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array", true, true)) {
                // line 100
                echo "            <div id=\"comment-form-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
                echo "\" class=\"inline-comment-form\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post_ajax_comments", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                echo "\">
                ";
                // line 101
                $this->env->loadTemplate("OlogySocialBundle:Comment:inline_create.html.twig")->display(array_merge($context, array("form" => $this->getAttribute($this->getContext($context, "commentForm"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"))));
                // line 102
                echo "            </div>
        ";
            }
            // line 104
            echo "    ";
        } else {
            // line 105
            echo "        ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:inline_create.html.twig")->display(array_merge($context, array("form" => $this->getAttribute($this->getContext($context, "commentForm"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"), "showprompt" => true)));
            // line 106
            echo "    ";
        }
        // line 107
        echo "    
        
        
    ";
        // line 110
        if ($this->getAttribute($this->getContext($context, "commentPost", true), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array", true, true)) {
            // line 111
            echo "        <div class=\"two-first-comment\">
        ";
            // line 112
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "commentPost"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 113
                echo "            <div class=\"post-card-comment\"> <a name=\"comments\">
                <div class=\"user-img\">
                    <a href=\"";
                // line 115
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 116
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
                echo "\">
                    </a>
                </div>
                <p class=\"commentp\"><a href=\"";
                // line 119
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
                echo "</a> 
                ";
                // line 120
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content")) <= 140)) {
                    // line 121
                    echo "                    ";
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
                    echo "
                ";
                } else {
                    // line 123
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), 140, false, "..."), "html", null, true);
                    echo " 
                ";
                }
                // line 125
                echo "                </p>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 127
            echo "  
        </div>        
    ";
        }
        // line 129
        echo "    
        
        
        
    <div class=\"show-comments\">
        ";
        // line 134
        if ((array_key_exists("cardNumber", $context) && ($this->getContext($context, "cardNumber") == 2))) {
            // line 135
            echo "            ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:comment_tip.html.twig")->display($context);
            // line 136
            echo "        ";
        }
        // line 137
        echo "          ";
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") > 2)) {
            // line 138
            echo "            <div href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post_ajax_comments", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
            echo "\" class=\"show-postcard-comments\">
                show comments
            </div>
          ";
        }
        // line 142
        echo "    </div> 
        
 </div>
       



";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:post_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  426 => 142,  418 => 138,  415 => 137,  412 => 136,  409 => 135,  395 => 127,  387 => 125,  381 => 123,  375 => 121,  373 => 120,  367 => 119,  353 => 113,  339 => 107,  333 => 105,  330 => 104,  326 => 102,  317 => 100,  314 => 99,  312 => 98,  301 => 92,  298 => 91,  279 => 84,  271 => 82,  263 => 80,  261 => 79,  255 => 78,  235 => 68,  230 => 67,  224 => 65,  213 => 61,  205 => 57,  197 => 54,  166 => 45,  145 => 39,  116 => 30,  88 => 22,  55 => 13,  95 => 36,  90 => 34,  71 => 18,  66 => 23,  45 => 16,  43 => 10,  25 => 4,  58 => 16,  50 => 14,  46 => 13,  36 => 33,  32 => 8,  21 => 3,  38 => 11,  30 => 11,  996 => 291,  991 => 290,  989 => 289,  986 => 288,  970 => 284,  948 => 283,  946 => 282,  943 => 281,  931 => 276,  927 => 275,  922 => 274,  920 => 273,  917 => 272,  908 => 266,  902 => 264,  899 => 263,  894 => 262,  892 => 261,  889 => 260,  882 => 255,  873 => 253,  869 => 252,  866 => 251,  863 => 250,  861 => 249,  858 => 248,  850 => 244,  848 => 243,  845 => 242,  838 => 237,  835 => 236,  827 => 231,  823 => 230,  819 => 229,  816 => 228,  814 => 227,  811 => 226,  803 => 222,  801 => 221,  798 => 220,  790 => 214,  788 => 213,  785 => 212,  777 => 208,  774 => 207,  772 => 206,  769 => 205,  748 => 201,  745 => 200,  742 => 199,  739 => 198,  737 => 197,  734 => 196,  726 => 190,  723 => 189,  721 => 188,  718 => 187,  711 => 184,  708 => 183,  705 => 182,  697 => 178,  694 => 177,  692 => 176,  689 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 98,  502 => 92,  498 => 91,  494 => 90,  490 => 89,  485 => 88,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  455 => 79,  453 => 78,  450 => 77,  434 => 73,  432 => 72,  429 => 71,  419 => 65,  416 => 64,  413 => 63,  407 => 134,  405 => 60,  400 => 129,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  378 => 53,  374 => 51,  366 => 49,  361 => 116,  349 => 112,  335 => 39,  323 => 37,  304 => 94,  300 => 32,  295 => 31,  292 => 30,  287 => 29,  285 => 28,  272 => 23,  267 => 21,  259 => 17,  256 => 16,  250 => 14,  248 => 13,  219 => 288,  216 => 62,  211 => 280,  206 => 271,  201 => 260,  196 => 248,  193 => 247,  191 => 242,  188 => 53,  183 => 51,  178 => 226,  173 => 220,  170 => 219,  162 => 211,  157 => 44,  152 => 42,  149 => 41,  147 => 187,  144 => 186,  132 => 168,  129 => 35,  127 => 34,  124 => 33,  119 => 153,  112 => 141,  99 => 26,  97 => 114,  87 => 33,  82 => 77,  79 => 21,  77 => 71,  69 => 24,  67 => 27,  62 => 21,  357 => 115,  354 => 137,  346 => 111,  340 => 129,  336 => 106,  332 => 127,  327 => 126,  324 => 101,  319 => 35,  311 => 117,  307 => 95,  303 => 115,  299 => 113,  297 => 112,  290 => 87,  286 => 85,  278 => 105,  270 => 22,  266 => 81,  262 => 101,  247 => 95,  226 => 4,  223 => 3,  220 => 86,  198 => 259,  181 => 65,  176 => 63,  165 => 212,  154 => 43,  150 => 49,  142 => 182,  138 => 46,  130 => 44,  122 => 154,  115 => 38,  104 => 28,  102 => 27,  93 => 29,  85 => 27,  78 => 26,  75 => 25,  70 => 23,  65 => 16,  63 => 18,  59 => 20,  47 => 13,  35 => 9,  27 => 6,  23 => 14,  19 => 2,  61 => 23,  53 => 17,  22 => 3,  20 => 13,  17 => 1,  352 => 46,  347 => 44,  344 => 110,  282 => 27,  276 => 83,  274 => 104,  257 => 100,  253 => 15,  249 => 96,  245 => 73,  241 => 92,  237 => 69,  233 => 6,  229 => 89,  225 => 74,  221 => 73,  217 => 85,  214 => 281,  209 => 272,  203 => 269,  200 => 41,  195 => 40,  190 => 68,  185 => 52,  180 => 50,  175 => 225,  169 => 59,  167 => 217,  164 => 158,  161 => 70,  158 => 69,  155 => 196,  153 => 67,  148 => 65,  139 => 181,  126 => 43,  120 => 45,  117 => 147,  114 => 146,  111 => 37,  109 => 140,  92 => 35,  89 => 97,  83 => 20,  80 => 19,  76 => 20,  68 => 17,  64 => 26,  56 => 14,  52 => 13,  48 => 17,  44 => 11,  40 => 14,  33 => 32,  31 => 6,  26 => 1,  244 => 112,  240 => 70,  236 => 110,  232 => 109,  228 => 66,  186 => 67,  179 => 65,  174 => 48,  171 => 60,  163 => 56,  160 => 205,  146 => 48,  143 => 54,  140 => 53,  137 => 37,  134 => 174,  131 => 50,  113 => 49,  110 => 48,  107 => 29,  105 => 46,  96 => 25,  94 => 113,  91 => 28,  84 => 82,  81 => 33,  74 => 19,  72 => 43,  60 => 15,  57 => 14,  54 => 15,  51 => 11,  49 => 2,  42 => 12,  37 => 8,  34 => 10,  28 => 22,);
    }
}

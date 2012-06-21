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
        return array (  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 115,  353 => 113,  326 => 102,  314 => 99,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 81,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 143,  291 => 140,  261 => 79,  252 => 117,  234 => 103,  223 => 99,  348 => 135,  340 => 133,  336 => 106,  332 => 131,  327 => 130,  324 => 101,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 87,  287 => 111,  279 => 84,  226 => 86,  149 => 41,  136 => 40,  125 => 36,  115 => 31,  100 => 31,  130 => 38,  251 => 82,  247 => 81,  238 => 90,  194 => 68,  191 => 67,  168 => 64,  128 => 45,  294 => 114,  286 => 85,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 163,  186 => 66,  183 => 51,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  121 => 29,  112 => 26,  118 => 41,  106 => 29,  157 => 44,  232 => 88,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 111,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 100,  307 => 95,  299 => 102,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 48,  150 => 57,  119 => 49,  110 => 36,  53 => 11,  91 => 34,  66 => 20,  98 => 29,  96 => 25,  166 => 45,  160 => 47,  154 => 43,  143 => 54,  138 => 54,  101 => 25,  58 => 13,  36 => 4,  65 => 16,  18 => 1,  352 => 117,  347 => 160,  344 => 110,  282 => 99,  276 => 83,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 73,  241 => 91,  237 => 69,  233 => 76,  229 => 102,  225 => 100,  221 => 78,  217 => 72,  214 => 76,  203 => 71,  180 => 50,  175 => 8,  169 => 74,  167 => 61,  164 => 60,  155 => 49,  139 => 41,  114 => 51,  83 => 24,  76 => 20,  72 => 19,  68 => 17,  64 => 14,  56 => 12,  21 => 3,  209 => 85,  205 => 57,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 75,  165 => 63,  161 => 69,  152 => 42,  148 => 56,  145 => 39,  141 => 60,  134 => 62,  132 => 43,  127 => 34,  123 => 51,  109 => 37,  93 => 39,  90 => 24,  54 => 12,  133 => 31,  124 => 33,  111 => 45,  107 => 29,  80 => 27,  63 => 17,  60 => 22,  69 => 24,  61 => 21,  52 => 10,  50 => 13,  45 => 11,  43 => 10,  34 => 3,  224 => 65,  215 => 90,  211 => 88,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 53,  185 => 52,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 50,  156 => 49,  153 => 64,  146 => 55,  142 => 42,  137 => 37,  131 => 40,  126 => 57,  120 => 33,  117 => 48,  103 => 40,  99 => 26,  74 => 19,  47 => 10,  32 => 6,  39 => 5,  26 => 4,  97 => 40,  95 => 35,  88 => 22,  82 => 23,  78 => 26,  75 => 27,  71 => 18,  22 => 3,  44 => 7,  30 => 9,  20 => 2,  25 => 4,  49 => 12,  42 => 6,  40 => 7,  23 => 5,  27 => 2,  17 => 1,  92 => 29,  86 => 23,  79 => 21,  77 => 20,  57 => 14,  46 => 7,  37 => 8,  33 => 7,  29 => 5,  24 => 6,  19 => 2,  135 => 57,  129 => 35,  122 => 56,  116 => 30,  113 => 31,  108 => 36,  104 => 28,  102 => 27,  94 => 25,  89 => 30,  87 => 33,  84 => 25,  81 => 21,  73 => 20,  70 => 20,  67 => 22,  62 => 15,  59 => 14,  55 => 13,  51 => 11,  48 => 8,  41 => 5,  38 => 4,  35 => 3,  31 => 6,  28 => 2,);
    }
}

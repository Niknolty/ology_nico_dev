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
        return array (  426 => 142,  418 => 138,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  387 => 125,  381 => 123,  375 => 121,  373 => 120,  367 => 119,  361 => 116,  357 => 115,  353 => 113,  349 => 112,  346 => 111,  344 => 110,  339 => 107,  336 => 106,  333 => 105,  330 => 104,  326 => 102,  324 => 101,  317 => 100,  314 => 99,  312 => 98,  307 => 95,  304 => 94,  301 => 92,  298 => 91,  290 => 87,  286 => 85,  279 => 84,  276 => 83,  263 => 80,  261 => 79,  255 => 78,  235 => 68,  230 => 67,  224 => 65,  213 => 61,  188 => 53,  183 => 51,  157 => 44,  154 => 43,  149 => 41,  145 => 39,  129 => 35,  104 => 28,  102 => 27,  99 => 26,  88 => 22,  79 => 21,  32 => 6,  67 => 16,  61 => 15,  53 => 12,  39 => 7,  30 => 6,  71 => 18,  58 => 17,  55 => 13,  47 => 11,  45 => 14,  29 => 6,  27 => 5,  22 => 3,  19 => 2,  138 => 35,  128 => 34,  125 => 33,  103 => 27,  97 => 23,  43 => 10,  35 => 7,  21 => 3,  285 => 101,  277 => 97,  274 => 96,  271 => 82,  268 => 94,  266 => 81,  259 => 88,  254 => 86,  246 => 84,  234 => 80,  226 => 78,  220 => 75,  216 => 62,  212 => 72,  208 => 71,  205 => 57,  197 => 54,  194 => 66,  191 => 65,  187 => 63,  178 => 61,  173 => 59,  166 => 45,  152 => 42,  147 => 46,  132 => 43,  127 => 34,  124 => 33,  122 => 40,  116 => 30,  106 => 34,  98 => 29,  90 => 26,  87 => 22,  85 => 24,  82 => 23,  73 => 20,  69 => 17,  65 => 16,  62 => 15,  46 => 10,  41 => 12,  25 => 4,  23 => 4,  17 => 1,  323 => 132,  318 => 131,  315 => 130,  270 => 87,  264 => 85,  262 => 84,  257 => 82,  253 => 81,  249 => 80,  245 => 73,  241 => 78,  237 => 69,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  209 => 68,  203 => 69,  200 => 68,  195 => 40,  190 => 39,  185 => 52,  180 => 50,  175 => 60,  169 => 134,  167 => 130,  164 => 129,  161 => 70,  158 => 69,  155 => 68,  153 => 67,  148 => 65,  139 => 59,  126 => 49,  120 => 45,  117 => 31,  114 => 40,  111 => 39,  109 => 38,  92 => 23,  89 => 22,  83 => 20,  80 => 19,  76 => 20,  68 => 17,  64 => 18,  56 => 11,  52 => 11,  48 => 10,  44 => 9,  40 => 8,  33 => 7,  31 => 6,  26 => 3,  244 => 112,  240 => 70,  236 => 110,  232 => 79,  228 => 66,  186 => 69,  179 => 65,  174 => 48,  171 => 63,  163 => 54,  160 => 53,  146 => 55,  143 => 54,  140 => 45,  137 => 37,  134 => 51,  131 => 50,  113 => 49,  110 => 29,  107 => 29,  105 => 28,  96 => 25,  94 => 40,  91 => 39,  84 => 21,  81 => 33,  74 => 19,  72 => 16,  60 => 14,  57 => 14,  54 => 12,  51 => 11,  49 => 13,  42 => 9,  37 => 8,  34 => 5,  28 => 5,);
    }
}

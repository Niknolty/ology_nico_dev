<?php

/* OlogySocialBundle:FrontEnd:pro_post_card.html.twig */
class __TwigTemplate_f922ab70ab1858cdf5c94f96710246e8 extends Twig_Template
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
        echo "<div class=\"pro post pics ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "html", null, true);
        echo "\">
    <div class=\"post-content\">
        ";
        // line 3
        if (array_key_exists("large", $context)) {
            // line 4
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_medium_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
            echo "</a>
        ";
        } else {
            // line 6
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
            echo "</a>
        ";
        }
        // line 8
        echo "        
        ";
        // line 9
        if ((array_key_exists("unStashable", $context) && $this->getContext($context, "unStashable"))) {
            // line 10
            echo "            <div class=\"stash-delete-card\"><a class=\"stash-delete-card-link\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stash_unstash", array("stashId" => $this->getContext($context, "stashId"), "postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/close_button.png"), "html", null, true);
            echo "\"/></a></div>
        ";
        }
        // line 12
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologize_button.html.twig")->display($context);
        // line 13
        echo "        
        ";
        // line 14
        if (array_key_exists("displayology", $context)) {
            // line 15
            echo "            ";
            if (array_key_exists("large", $context)) {
                // line 16
                echo "            <div class=\"large-overlay\">
            ";
            } else {
                // line 18
                echo "            <div class=\"channel-overlay\">
            ";
            }
            // line 20
            echo "            Posted in <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
            echo "</a>
            </div>
        ";
        }
        // line 23
        echo "        \t
        ";
        // line 24
        $this->env->loadTemplate("OlogySocialBundle:Likes:ShowLikesCard.html.twig")->display($context);
        // line 25
        echo "        
        <h3><a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
        echo "\">";
        echo $this->getAttribute($this->getContext($context, "post"), "htmlTitle");
        echo "</a></h3>
        
        <p class=\"card-txt\">
            ";
        // line 29
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "summary"), "html", null, true));
        echo "
        </p>

        <hr align=\"center\" width=\"90%\" color=\"C5C5C5\" size=\"1\"/>
        <div class=\"user-img\">
            <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "imageUrl"))), array("class" => "user-pic"));
        echo "</a>
        </div>

        <div class=\"pro-small\">
            Posted by
            <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\" class=\"user-popupable\" pid=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\">
                ";
        // line 40
        $context["firstname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"));
        // line 41
        echo "                ";
        $context["lastname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"));
        // line 42
        echo "                ";
        if ((($this->getContext($context, "firstname_length") + $this->getContext($context, "lastname_length")) >= 15)) {
            echo " 
                    ";
            // line 43
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName") . " ") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName")), 15, false, "..."), "html", null, true);
            echo "
                ";
        } else {
            // line 44
            echo "   
                    ";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"), "html", null, true);
            echo "
                ";
        }
        // line 46
        echo "      
            </a><br />
            ";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "editorTitle"), "html", null, true);
        echo "<br />
            in <a href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
        echo "</a><br/>
        </div>
        
        ";
        // line 53
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologized.html.twig")->display($context);
        // line 54
        echo "        
        ";
        // line 56
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:Likes:ShowStats.html.twig")->display($context);
        echo "     
    </div>
                    
                    
                    
                    
                    
                    
    ";
        // line 64
        if ($this->getContext($context, "loggedIn")) {
            // line 65
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "commentForm", true), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array", true, true)) {
                // line 66
                echo "            <div id=\"comment-form-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
                echo "\" class=\"inline-comment-form\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post_ajax_comments", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                echo "\">
                ";
                // line 67
                $this->env->loadTemplate("OlogySocialBundle:Comment:inline_create.html.twig")->display(array_merge($context, array("form" => $this->getAttribute($this->getContext($context, "commentForm"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"))));
                // line 68
                echo "            </div>
        ";
            }
            // line 70
            echo "    ";
        } else {
            // line 71
            echo "        ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:inline_create.html.twig")->display(array_merge($context, array("form" => $this->getAttribute($this->getContext($context, "commentForm"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"), "showprompt" => true)));
            // line 72
            echo "    ";
        }
        // line 73
        echo "    
                    
    ";
        // line 75
        if ($this->getAttribute($this->getContext($context, "commentPost", true), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array", true, true)) {
            // line 76
            echo "        <div class=\"two-first-comment\">
        ";
            // line 77
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "commentPost"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 78
                echo "            <div class=\"post-card-comment\"> <a name=\"comments\">
                <div class=\"user-img\">
                    <a href=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 81
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
                echo "\">
                    </a>
                </div>
                <p class=\"commentp\"><a href=\"";
                // line 84
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
                echo "</a> 
                ";
                // line 85
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content")) <= 140)) {
                    // line 86
                    echo "                    ";
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
                    echo "
                ";
                } else {
                    // line 88
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), 140, false, "..."), "html", null, true);
                    echo " 
                ";
                }
                // line 90
                echo "                </p>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 92
            echo "  
        </div>        
    ";
        }
        // line 94
        echo "    
        
        
        
    <div class=\"show-comments\">
        ";
        // line 99
        if ((array_key_exists("cardNumber", $context) && ($this->getContext($context, "cardNumber") == 2))) {
            // line 100
            echo "            ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:comment_tip.html.twig")->display($context);
            // line 101
            echo "        ";
        }
        // line 102
        echo "          ";
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") > 2)) {
            // line 103
            echo "            <div  class=\"show-postcard-comments\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post_ajax_comments", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
            echo "\">
                show comments
            </div>
          ";
        }
        // line 107
        echo "    </div>                 
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:pro_post_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  294 => 107,  283 => 102,  280 => 101,  277 => 100,  275 => 99,  268 => 94,  243 => 86,  212 => 75,  208 => 73,  202 => 71,  199 => 70,  151 => 48,  106 => 34,  98 => 29,  73 => 20,  39 => 7,  41 => 8,  29 => 6,  128 => 34,  125 => 33,  103 => 27,  24 => 3,  426 => 142,  418 => 138,  415 => 137,  412 => 136,  409 => 135,  395 => 127,  387 => 125,  381 => 123,  375 => 121,  373 => 120,  367 => 119,  353 => 113,  339 => 107,  333 => 105,  330 => 104,  326 => 102,  317 => 100,  314 => 99,  312 => 98,  301 => 92,  298 => 91,  279 => 84,  271 => 82,  263 => 92,  261 => 79,  255 => 90,  235 => 84,  230 => 67,  224 => 65,  213 => 61,  205 => 72,  197 => 54,  166 => 54,  145 => 39,  116 => 39,  88 => 22,  55 => 16,  95 => 36,  90 => 26,  71 => 20,  66 => 23,  45 => 14,  43 => 9,  25 => 4,  58 => 17,  50 => 14,  46 => 10,  36 => 33,  32 => 6,  21 => 3,  38 => 11,  30 => 6,  996 => 291,  991 => 290,  989 => 289,  986 => 288,  970 => 284,  948 => 283,  946 => 282,  943 => 281,  931 => 276,  927 => 275,  922 => 274,  920 => 273,  917 => 272,  908 => 266,  902 => 264,  899 => 263,  894 => 262,  892 => 261,  889 => 260,  882 => 255,  873 => 253,  869 => 252,  866 => 251,  863 => 250,  861 => 249,  858 => 248,  850 => 244,  848 => 243,  845 => 242,  838 => 237,  835 => 236,  827 => 231,  823 => 230,  819 => 229,  816 => 228,  814 => 227,  811 => 226,  803 => 222,  801 => 221,  798 => 220,  790 => 214,  788 => 213,  785 => 212,  777 => 208,  774 => 207,  772 => 206,  769 => 205,  748 => 201,  745 => 200,  742 => 199,  739 => 198,  737 => 197,  734 => 196,  726 => 190,  723 => 189,  721 => 188,  718 => 187,  711 => 184,  708 => 183,  705 => 182,  697 => 178,  694 => 177,  692 => 176,  689 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 98,  502 => 92,  498 => 91,  494 => 90,  490 => 89,  485 => 88,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  455 => 79,  453 => 78,  450 => 77,  434 => 73,  432 => 72,  429 => 71,  419 => 65,  416 => 64,  413 => 63,  407 => 134,  405 => 60,  400 => 129,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  378 => 53,  374 => 51,  366 => 49,  361 => 116,  349 => 112,  335 => 39,  323 => 37,  304 => 94,  300 => 32,  295 => 31,  292 => 30,  287 => 29,  285 => 28,  272 => 23,  267 => 21,  259 => 17,  256 => 16,  250 => 14,  248 => 13,  219 => 288,  216 => 62,  211 => 280,  206 => 271,  201 => 260,  196 => 248,  193 => 67,  191 => 242,  188 => 53,  183 => 65,  178 => 226,  173 => 220,  170 => 219,  162 => 211,  157 => 44,  152 => 42,  149 => 41,  147 => 46,  144 => 186,  132 => 43,  129 => 35,  127 => 42,  124 => 41,  119 => 153,  112 => 141,  99 => 26,  97 => 23,  87 => 25,  82 => 23,  79 => 21,  77 => 71,  69 => 18,  67 => 16,  62 => 15,  357 => 115,  354 => 137,  346 => 111,  340 => 129,  336 => 106,  332 => 127,  327 => 126,  324 => 101,  319 => 35,  311 => 117,  307 => 95,  303 => 115,  299 => 113,  297 => 112,  290 => 87,  286 => 103,  278 => 105,  270 => 22,  266 => 81,  262 => 101,  247 => 95,  226 => 4,  223 => 3,  220 => 86,  198 => 259,  181 => 64,  176 => 63,  165 => 212,  154 => 43,  150 => 49,  142 => 182,  138 => 35,  130 => 44,  122 => 40,  115 => 38,  104 => 28,  102 => 27,  93 => 29,  85 => 24,  78 => 26,  75 => 25,  70 => 23,  65 => 16,  63 => 18,  59 => 20,  47 => 11,  35 => 7,  27 => 5,  23 => 3,  19 => 2,  61 => 15,  53 => 12,  22 => 3,  20 => 13,  17 => 1,  352 => 46,  347 => 44,  344 => 110,  282 => 27,  276 => 83,  274 => 104,  257 => 100,  253 => 15,  249 => 88,  245 => 73,  241 => 85,  237 => 69,  233 => 6,  229 => 81,  225 => 80,  221 => 78,  217 => 77,  214 => 76,  209 => 272,  203 => 269,  200 => 41,  195 => 68,  190 => 68,  185 => 52,  180 => 50,  175 => 225,  169 => 56,  167 => 217,  164 => 158,  161 => 70,  158 => 69,  155 => 49,  153 => 67,  148 => 65,  139 => 181,  126 => 43,  120 => 45,  117 => 31,  114 => 146,  111 => 37,  109 => 140,  92 => 35,  89 => 97,  83 => 20,  80 => 19,  76 => 19,  68 => 17,  64 => 18,  56 => 11,  52 => 13,  48 => 17,  44 => 9,  40 => 14,  33 => 6,  31 => 6,  26 => 3,  244 => 112,  240 => 70,  236 => 110,  232 => 109,  228 => 66,  186 => 66,  179 => 65,  174 => 48,  171 => 60,  163 => 53,  160 => 205,  146 => 48,  143 => 54,  140 => 45,  137 => 44,  134 => 174,  131 => 50,  113 => 49,  110 => 29,  107 => 29,  105 => 28,  96 => 25,  94 => 113,  91 => 28,  84 => 21,  81 => 33,  74 => 19,  72 => 43,  60 => 14,  57 => 13,  54 => 12,  51 => 11,  49 => 2,  42 => 12,  37 => 10,  34 => 10,  28 => 5,);
    }
}

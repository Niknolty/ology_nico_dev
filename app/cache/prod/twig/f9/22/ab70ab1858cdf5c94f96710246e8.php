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
        return array (  294 => 107,  286 => 103,  283 => 102,  280 => 101,  277 => 100,  268 => 94,  263 => 92,  255 => 90,  243 => 86,  208 => 73,  202 => 71,  199 => 70,  186 => 66,  183 => 65,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  121 => 29,  112 => 26,  118 => 36,  106 => 34,  157 => 41,  232 => 67,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 99,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 84,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  91 => 20,  66 => 19,  98 => 29,  96 => 29,  166 => 54,  160 => 47,  154 => 36,  143 => 54,  138 => 38,  101 => 33,  58 => 10,  36 => 8,  65 => 16,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 84,  241 => 85,  237 => 77,  233 => 76,  229 => 81,  225 => 80,  221 => 78,  217 => 77,  214 => 76,  203 => 72,  180 => 22,  175 => 8,  169 => 56,  167 => 159,  164 => 158,  155 => 49,  139 => 32,  114 => 27,  83 => 24,  76 => 19,  72 => 21,  68 => 19,  64 => 18,  56 => 10,  21 => 3,  209 => 74,  205 => 72,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 40,  152 => 58,  148 => 43,  145 => 56,  141 => 41,  134 => 39,  132 => 43,  127 => 42,  123 => 44,  109 => 37,  93 => 31,  90 => 26,  54 => 12,  133 => 31,  124 => 41,  111 => 31,  107 => 27,  80 => 27,  63 => 17,  60 => 14,  69 => 18,  61 => 23,  52 => 21,  50 => 16,  45 => 30,  43 => 12,  34 => 6,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 68,  193 => 67,  190 => 60,  188 => 77,  185 => 46,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 39,  137 => 44,  131 => 40,  126 => 43,  120 => 35,  117 => 28,  103 => 33,  99 => 32,  74 => 20,  47 => 13,  32 => 4,  39 => 8,  26 => 2,  97 => 21,  95 => 37,  88 => 24,  82 => 23,  78 => 21,  75 => 17,  71 => 17,  22 => 4,  44 => 9,  30 => 4,  20 => 2,  25 => 4,  49 => 10,  42 => 14,  40 => 7,  23 => 3,  27 => 4,  17 => 1,  92 => 27,  86 => 24,  79 => 18,  77 => 27,  57 => 13,  46 => 10,  37 => 14,  33 => 6,  29 => 3,  24 => 5,  19 => 2,  135 => 52,  129 => 50,  122 => 40,  116 => 39,  113 => 31,  108 => 24,  104 => 42,  102 => 41,  94 => 28,  89 => 30,  87 => 25,  84 => 32,  81 => 28,  73 => 20,  70 => 20,  67 => 18,  62 => 15,  59 => 16,  55 => 22,  51 => 14,  48 => 20,  41 => 8,  38 => 7,  35 => 7,  31 => 9,  28 => 5,);
    }
}

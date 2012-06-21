<?php

/* OlogySocialBundle:FrontEnd:feature.html.twig */
class __TwigTemplate_aa9504bab5f86e373c28853f4db44f82 extends Twig_Template
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
        echo "<div id=\"featured-boxes\">
    ";
        // line 2
        if (($this->getContext($context, "proPost") != null)) {
            // line 3
            echo "     <figure class=\"featured-box\" style=\"background-image:url('/bundles/ologysocial/up/img/post/post_medium/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "proPost"), "imageUrl"), "html", null, true);
            echo "');\">
         <figcaption>
            <div style=\"text-align: center; color: white; padding-top: 80px;\">
            <div class=\"ology-name\">
                Posted in <a style=\"color: white\" href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "proPost"), "firstOlogyId"), "slug" => $this->getAttribute($this->getContext($context, "proPost"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "proPost"), "firstOlogy"), "html", null, true);
            echo "</a><br />
            </div>
                    
            <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "id"))), "html", null, true);
            echo "\">
                <img src=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_large/" . $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "imageUrl"))), "html", null, true);
            echo "\"   />
            </a>        
                              
           <div class=\"author-info-date\">
                by <b>
                <a style=\"color: white\" href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "id"))), "html", null, true);
            echo "\">
                    ";
            // line 17
            $context["firstname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "firstName"));
            // line 18
            echo "                    ";
            $context["lastname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "lastName"));
            // line 19
            echo "                        ";
            if ((($this->getContext($context, "firstname_length") + $this->getContext($context, "lastname_length")) >= 15)) {
                echo " 
                            ";
                // line 20
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "firstName") . " ") . $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "lastName")), 15, false, "..."), "html", null, true);
                echo "
                        ";
            } else {
                // line 21
                echo "   
                            ";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "firstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "lastName"), "html", null, true);
                echo "
                        ";
            }
            // line 24
            echo "                </a>
                </b><br />
                ";
            // line 26
            if (twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "editorTitle"))) {
                // line 27
                echo "                ";
            } else {
                // line 28
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "proPost"), "author"), "editorTitle"), "html", null, true);
                echo " <br />
                ";
            }
            // line 30
            echo "                <br />
                ";
            // line 31
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "proPost"), "creationDate"), "M d, Y"), "html", null, true);
            echo "<br />
            </div><br />
                 <b>
                    ";
            // line 34
            if (($this->getAttribute($this->getContext($context, "proPost"), "timesCommented") == 1)) {
                // line 35
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "proPost"), "timesCommented"), "html", null, true);
                echo " comment
                    ";
            } elseif (($this->getAttribute($this->getContext($context, "proPost"), "timesCommented") > 1)) {
                // line 37
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "proPost"), "timesCommented"), "html", null, true);
                echo " comments
                    ";
            }
            // line 39
            echo "                 </b>
            </div>
        </figcaption>

        <div class=\"featured-box-overlay\">
            <a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "proPost"), "id"), "slug" => $this->getAttribute($this->getContext($context, "proPost"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "proPost"), "title"), "html", null, true);
            echo "</a>
        </div>
    </figure>
    ";
        }
        // line 48
        echo "        
    ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "userPosts"));
        foreach ($context['_seq'] as $context["_key"] => $context["relatedPost"]) {
            // line 50
            echo "    <figure class=\"featured-box-small\" style=\"background-image:url('/bundles/ologysocial/up/img/post/post_medium/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "relatedPost"), "imageUrl"), "html", null, true);
            echo "');\">
        <figcaption>
            <div style=\"text-align: center; color: white; padding-top: 12px;\" >
            <div class=\"ology-name\">
               Posted in <a style=\"color: white\" href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "relatedPost"), "FirstOlogyId"), "slug" => $this->getAttribute($this->getContext($context, "relatedPost"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "relatedPost"), "firstOlogy"), "html", null, true);
            echo "</a><br />
            </div>
            <div class=\"author-info-date\">
                by <b>
                    <a style=\"color: white\" href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "relatedPost"), "author"), "id"))), "html", null, true);
            echo "\">
                        ";
            // line 59
            $context["firstname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "relatedPost"), "author"), "firstName"));
            // line 60
            echo "                        ";
            $context["lastname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "relatedPost"), "author"), "lastName"));
            // line 61
            echo "                            ";
            if ((($this->getContext($context, "firstname_length") + $this->getContext($context, "lastname_length")) >= 15)) {
                echo " 
                                ";
                // line 62
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "relatedPost"), "author"), "firstName") . " ") . $this->getAttribute($this->getAttribute($this->getContext($context, "relatedPost"), "author"), "lastName")), 15, false, "..."), "html", null, true);
                echo "
                            ";
            } else {
                // line 63
                echo "   
                                ";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "relatedPost"), "author"), "firstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "relatedPost"), "author"), "lastName"), "html", null, true);
                echo "
                            ";
            }
            // line 66
            echo "                    </a>
                </b><br />
                ";
            // line 68
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "relatedPost"), "creationDate"), "M d, Y"), "html", null, true);
            echo "<br />
            </div>
                <b style=\"font-size: 10px\">
                    ";
            // line 71
            if (($this->getAttribute($this->getContext($context, "relatedPost"), "timesCommented") == 1)) {
                // line 72
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "relatedPost"), "timesCommented"), "html", null, true);
                echo " comment
                    ";
            } elseif (($this->getAttribute($this->getContext($context, "relatedPost"), "timesCommented") > 1)) {
                // line 74
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "relatedPost"), "timesCommented"), "html", null, true);
                echo " comments
                    ";
            }
            // line 76
            echo "                 </b>
            </div>
        </figcaption>

        <div class=\"featured-box-small-overlay\">
            <a href=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "relatedPost"), "id"), "slug" => $this->getAttribute($this->getContext($context, "relatedPost"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "relatedPost"), "title"), "html", null, true);
            echo "</a>
        </div>
    </figure>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['relatedPost'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 84
        echo "      
    <div style=\"clear:both;\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:feature.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 111,  246 => 91,  242 => 89,  173 => 64,  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 106,  262 => 101,  198 => 72,  334 => 119,  321 => 124,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 117,  234 => 86,  223 => 83,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 118,  304 => 94,  300 => 142,  290 => 108,  287 => 109,  279 => 84,  226 => 84,  149 => 68,  136 => 49,  125 => 48,  115 => 46,  100 => 40,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 70,  168 => 80,  128 => 49,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 98,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 66,  183 => 75,  181 => 65,  163 => 60,  140 => 50,  170 => 70,  121 => 46,  112 => 41,  118 => 34,  106 => 37,  157 => 58,  232 => 88,  228 => 86,  220 => 86,  210 => 76,  207 => 61,  159 => 45,  151 => 47,  147 => 55,  105 => 35,  85 => 27,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 131,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 112,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 80,  206 => 78,  197 => 54,  187 => 74,  184 => 80,  182 => 67,  174 => 71,  150 => 49,  119 => 45,  110 => 36,  53 => 10,  91 => 36,  66 => 34,  98 => 37,  96 => 39,  166 => 61,  160 => 58,  154 => 57,  143 => 64,  138 => 46,  101 => 25,  58 => 19,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 105,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 84,  225 => 100,  221 => 84,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  139 => 62,  114 => 51,  83 => 26,  76 => 20,  72 => 22,  68 => 20,  64 => 20,  56 => 18,  21 => 3,  209 => 79,  205 => 81,  196 => 71,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 69,  148 => 54,  145 => 66,  141 => 58,  134 => 45,  132 => 50,  127 => 53,  123 => 49,  109 => 40,  93 => 29,  90 => 24,  54 => 17,  133 => 48,  124 => 44,  111 => 37,  107 => 47,  80 => 27,  63 => 19,  60 => 20,  69 => 21,  61 => 17,  52 => 15,  50 => 16,  45 => 12,  43 => 10,  34 => 5,  224 => 65,  215 => 81,  211 => 80,  204 => 74,  200 => 75,  195 => 68,  193 => 67,  190 => 68,  188 => 69,  185 => 67,  179 => 64,  177 => 64,  171 => 62,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 48,  142 => 53,  137 => 37,  131 => 37,  126 => 43,  120 => 46,  117 => 39,  103 => 34,  99 => 26,  74 => 39,  47 => 11,  32 => 6,  39 => 7,  26 => 5,  97 => 31,  95 => 41,  88 => 28,  82 => 33,  78 => 26,  75 => 34,  71 => 18,  22 => 3,  44 => 9,  30 => 7,  20 => 2,  25 => 7,  49 => 13,  42 => 11,  40 => 9,  23 => 4,  27 => 4,  17 => 1,  92 => 34,  86 => 38,  79 => 24,  77 => 31,  57 => 15,  46 => 11,  37 => 6,  33 => 5,  29 => 2,  24 => 3,  19 => 2,  135 => 51,  129 => 35,  122 => 42,  116 => 30,  113 => 32,  108 => 36,  104 => 35,  102 => 34,  94 => 30,  89 => 30,  87 => 35,  84 => 32,  81 => 41,  73 => 24,  70 => 26,  67 => 17,  62 => 16,  59 => 19,  55 => 11,  51 => 19,  48 => 11,  41 => 5,  38 => 10,  35 => 3,  31 => 8,  28 => 3,);
    }
}

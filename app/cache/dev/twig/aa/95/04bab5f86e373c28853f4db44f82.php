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
        return array (  229 => 84,  210 => 76,  204 => 74,  198 => 72,  186 => 66,  163 => 60,  140 => 50,  136 => 49,  133 => 48,  117 => 39,  111 => 37,  94 => 30,  83 => 26,  72 => 22,  69 => 21,  64 => 20,  54 => 17,  50 => 16,  42 => 11,  20 => 2,  348 => 120,  321 => 114,  314 => 111,  308 => 109,  302 => 107,  297 => 105,  287 => 102,  264 => 99,  261 => 98,  251 => 94,  232 => 88,  228 => 86,  223 => 85,  199 => 71,  191 => 68,  185 => 67,  181 => 65,  176 => 63,  166 => 61,  158 => 58,  156 => 57,  142 => 53,  138 => 51,  130 => 49,  122 => 47,  120 => 46,  115 => 43,  109 => 41,  106 => 40,  96 => 38,  70 => 24,  68 => 23,  60 => 18,  52 => 13,  27 => 3,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  471 => 153,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  352 => 117,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 112,  307 => 104,  299 => 106,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  272 => 93,  259 => 89,  256 => 88,  253 => 87,  250 => 86,  245 => 93,  241 => 82,  221 => 84,  218 => 76,  212 => 75,  209 => 79,  203 => 72,  197 => 70,  192 => 69,  187 => 68,  184 => 67,  182 => 66,  179 => 64,  174 => 63,  171 => 62,  161 => 59,  153 => 58,  150 => 57,  146 => 55,  143 => 54,  135 => 50,  129 => 50,  124 => 44,  113 => 45,  107 => 43,  104 => 39,  102 => 41,  97 => 31,  91 => 35,  87 => 33,  84 => 33,  82 => 32,  77 => 29,  62 => 19,  59 => 19,  57 => 14,  53 => 13,  46 => 10,  41 => 10,  38 => 10,  36 => 6,  31 => 4,  29 => 6,  22 => 3,  17 => 1,  43 => 16,  37 => 15,  30 => 7,  28 => 9,  18 => 1,  677 => 233,  673 => 232,  668 => 230,  657 => 222,  653 => 220,  650 => 219,  642 => 216,  640 => 215,  634 => 213,  632 => 212,  626 => 208,  623 => 207,  617 => 205,  614 => 204,  608 => 202,  605 => 201,  602 => 200,  599 => 199,  595 => 197,  590 => 195,  584 => 193,  581 => 192,  578 => 191,  576 => 190,  572 => 188,  569 => 187,  563 => 185,  561 => 184,  554 => 179,  552 => 178,  547 => 175,  541 => 172,  538 => 171,  536 => 170,  530 => 167,  526 => 165,  515 => 160,  506 => 158,  498 => 161,  495 => 160,  492 => 159,  486 => 151,  483 => 150,  481 => 149,  478 => 148,  474 => 154,  469 => 152,  466 => 151,  463 => 150,  460 => 141,  457 => 140,  454 => 139,  452 => 138,  447 => 135,  441 => 134,  435 => 142,  433 => 131,  429 => 130,  423 => 126,  417 => 124,  415 => 123,  412 => 122,  408 => 120,  394 => 129,  383 => 118,  366 => 117,  362 => 115,  360 => 114,  357 => 113,  344 => 110,  341 => 109,  339 => 108,  334 => 119,  330 => 111,  327 => 115,  322 => 101,  316 => 99,  313 => 98,  311 => 97,  301 => 96,  291 => 104,  284 => 101,  279 => 86,  275 => 94,  270 => 92,  267 => 100,  265 => 91,  262 => 79,  257 => 77,  254 => 76,  252 => 75,  248 => 85,  243 => 72,  240 => 71,  238 => 89,  235 => 81,  230 => 67,  227 => 79,  225 => 65,  222 => 64,  217 => 81,  214 => 61,  211 => 80,  206 => 73,  202 => 56,  200 => 71,  196 => 71,  194 => 69,  190 => 68,  183 => 49,  177 => 64,  173 => 43,  157 => 58,  155 => 40,  148 => 54,  144 => 37,  128 => 35,  126 => 49,  119 => 47,  116 => 29,  110 => 44,  108 => 26,  105 => 35,  103 => 34,  99 => 22,  95 => 37,  93 => 19,  90 => 18,  88 => 28,  85 => 27,  79 => 24,  75 => 12,  71 => 11,  66 => 10,  63 => 9,  56 => 18,  48 => 12,  40 => 7,  32 => 3,);
    }
}

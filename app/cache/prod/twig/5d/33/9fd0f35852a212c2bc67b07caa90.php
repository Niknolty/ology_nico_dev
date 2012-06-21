<?php

/* OlogySocialBundle:FrontEnd:search_post.html.twig */
class __TwigTemplate_5d339fd0f35852a212c2bc67b07caa90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        echo "Search | Ology";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        if (($this->getContext($context, "loggedIn") == true)) {
            // line 7
            echo "\t<div id='page'>
            ";
            // line 8
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:dock.html.twig")->display($context);
            // line 9
            echo "\t</div>
";
        }
        // line 11
        echo "
<div id=\"container\">
    <div id=\"search-mainbar\">
    <input>
    </div>

    <div id=\"search-ologist\">
    <h2>Members:</h2>
        ";
        // line 19
        if ((twig_length_filter($this->env, $this->getContext($context, "users")) == 0)) {
            // line 20
            echo "            Couldn't find any users matching your search
        ";
        } else {
            // line 22
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "users"));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 23
                echo "                <div class=\"ologist-search-img\">
                    <img src=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_medium_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
                echo "\" />
                </div>
                <p class=\"ologist-search-desc\">
                    <span class=\"ologist-search-name\">
                        <a href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "user"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "lastName"), "html", null, true);
                echo "</a>
                        <span class=\"ologist-search-location\">
                            ";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "location"), "html", null, true);
                echo "
                        </span>
                    </span>
                    ";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "summary"), "html", null, true);
                echo "
                </p>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 36
            echo "        ";
        }
        // line 37
        echo "    </div>

    <div id=\"search-posts-box\">
        <div id=\"search-box-main\">
            <h2>Search Results for ";
        // line 41
        echo twig_escape_filter($this->env, $this->getContext($context, "term"), "html", null, true);
        echo "</h2>
            <h3>Posts:</h3>
            
                <div id=\"search-posts-box\">
                    ";
        // line 45
        if ((twig_length_filter($this->env, $this->getContext($context, "posts")) == 0)) {
            // line 46
            echo "                        Couldn't find any posts matching your search
                    ";
        } else {
            // line 48
            echo "
                        ";
            // line 49
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 50
                echo "                        <div class=\"post\">
                            <h2><a href=\"";
                // line 51
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
                echo "</a></h2>
                              <div class=\"user-img\">
                                <a href=\"#\"><img src=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_medium_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "imageUrl"))), "html", null, true);
                echo "\" class=\"user-pic\"></a>
                              </div>
                              <h3><a href=\"";
                // line 55
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
                echo "</a></h3>
                              <div class=\"small\">
                                posted by <a href=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
                echo "</a>
                                On ";
                // line 58
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "creationDate"), "m d, Y"), "html", null, true);
                echo "
                              </div>
                                <p>
                                    ";
                // line 61
                echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "textContent"), "html", null, true));
                echo "
                                </p>
                              ";
                // line 63
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 3)) {
                    // line 64
                    echo "                              <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))), "html", null, true);
                    echo "\"/>
                              ";
                }
                // line 66
                echo "                              ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 4)) {
                    // line 67
                    echo "                              <iframe width=\"560\" height=\"360\" src=\"http://www.youtube.com/embed/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "videoUrl"), "html", null, true);
                    echo "?wmode=transparent\" frameborder=\"0\" allowfullscreen></iframe>
                              ";
                }
                // line 69
                echo "                              ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 5)) {
                    // line 70
                    echo "                                <audio controls=\"true\" src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_audio_path") . $this->getAttribute($this->getContext($context, "post"), "audioUrl"))), "html", null, true);
                    echo "\" type=\"audio/mpeg\" style=\"width:100%;\">
                                  Your browser does not support the audio element.
                                </audio>

                              ";
                }
                // line 75
                echo "
                              <div class=\"left\">
                                ";
                // line 77
                if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") == 0)) {
                    // line 78
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                    echo "#comments\">comment &raquo;</a>
                                ";
                }
                // line 80
                echo "                                ";
                if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") == 1)) {
                    // line 81
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                    echo "#comments\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
                    echo " comment &raquo;</a>
                                ";
                }
                // line 83
                echo "                                ";
                if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") > 1)) {
                    // line 84
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                    echo "#comments\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
                    echo " comments &raquo;</a>
                                ";
                }
                // line 86
                echo "                              </div>
                        </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 89
            echo "
                    ";
        }
        // line 91
        echo "                </div>
        </div>
    </div>


    <div id=\"search-ologies\">
    <h2>Ologies:</h2>
        ";
        // line 98
        if ((twig_length_filter($this->env, $this->getContext($context, "ologies")) == 0)) {
            // line 99
            echo "            Couldn't find any ologies matching your search
        ";
        } else {
            // line 101
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "ologies"));
            foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
                // line 102
                echo "
                <div class=\"ology-search-img\">
                    <a href=\"";
                // line 104
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_small_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))), "html", null, true);
                echo "\" /></a>
                    ";
                // line 105
                if ($this->getContext($context, "loggedIn")) {
                    // line 106
                    echo "                        ";
                    if ($this->getAttribute($this->getContext($context, "memberships"), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array")) {
                        // line 107
                        echo "                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                        echo "\" class=\"unfollow\"></a>
                        ";
                    } else {
                        // line 109
                        echo "                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                        echo "\" class=\"follow\"></a>
                        ";
                    }
                    // line 111
                    echo "                    ";
                }
                // line 112
                echo "
                </div>
                <p class=\"ology-search-desc\">
                    <span class=\"ology-search-name\">
                        <a href=\"";
                // line 116
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
                echo "</a>
                    </span>
                    ";
                // line 118
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
                echo "
                </p>



            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 124
            echo "        ";
        }
        // line 125
        echo "    </div>



</div>
";
    }

    // line 131
    public function block_pagescripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:search_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 111,  246 => 91,  242 => 89,  173 => 64,  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 106,  262 => 101,  198 => 71,  334 => 119,  321 => 124,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 117,  234 => 86,  223 => 83,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 118,  304 => 94,  300 => 142,  290 => 108,  287 => 109,  279 => 84,  226 => 84,  149 => 68,  136 => 40,  125 => 48,  115 => 46,  100 => 40,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 70,  168 => 80,  128 => 49,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 98,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 67,  183 => 75,  181 => 65,  163 => 56,  140 => 63,  170 => 70,  121 => 46,  112 => 41,  118 => 34,  106 => 37,  157 => 72,  232 => 88,  228 => 86,  220 => 86,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 55,  105 => 42,  85 => 32,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 131,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 112,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 80,  206 => 78,  197 => 54,  187 => 74,  184 => 80,  182 => 67,  174 => 71,  150 => 49,  119 => 45,  110 => 36,  53 => 10,  91 => 36,  66 => 34,  98 => 37,  96 => 39,  166 => 61,  160 => 58,  154 => 57,  143 => 64,  138 => 46,  101 => 25,  58 => 19,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 105,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 89,  225 => 100,  221 => 84,  217 => 85,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  139 => 62,  114 => 51,  83 => 37,  76 => 20,  72 => 24,  68 => 20,  64 => 22,  56 => 15,  21 => 3,  209 => 79,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 69,  148 => 67,  145 => 66,  141 => 58,  134 => 45,  132 => 50,  127 => 53,  123 => 49,  109 => 40,  93 => 29,  90 => 24,  54 => 13,  133 => 31,  124 => 33,  111 => 48,  107 => 47,  80 => 27,  63 => 19,  60 => 20,  69 => 23,  61 => 17,  52 => 15,  50 => 12,  45 => 12,  43 => 10,  34 => 5,  224 => 65,  215 => 81,  211 => 80,  204 => 77,  200 => 75,  195 => 68,  193 => 67,  190 => 68,  188 => 69,  185 => 67,  179 => 66,  177 => 64,  171 => 63,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 48,  142 => 53,  137 => 37,  131 => 37,  126 => 43,  120 => 46,  117 => 46,  103 => 36,  99 => 26,  74 => 39,  47 => 11,  32 => 6,  39 => 7,  26 => 5,  97 => 40,  95 => 41,  88 => 30,  82 => 33,  78 => 26,  75 => 34,  71 => 18,  22 => 3,  44 => 9,  30 => 6,  20 => 2,  25 => 7,  49 => 13,  42 => 8,  40 => 9,  23 => 4,  27 => 4,  17 => 1,  92 => 34,  86 => 38,  79 => 28,  77 => 31,  57 => 15,  46 => 11,  37 => 6,  33 => 5,  29 => 2,  24 => 3,  19 => 2,  135 => 51,  129 => 35,  122 => 42,  116 => 30,  113 => 32,  108 => 36,  104 => 35,  102 => 34,  94 => 33,  89 => 30,  87 => 35,  84 => 32,  81 => 41,  73 => 24,  70 => 26,  67 => 17,  62 => 16,  59 => 24,  55 => 11,  51 => 19,  48 => 11,  41 => 5,  38 => 4,  35 => 3,  31 => 8,  28 => 3,);
    }
}

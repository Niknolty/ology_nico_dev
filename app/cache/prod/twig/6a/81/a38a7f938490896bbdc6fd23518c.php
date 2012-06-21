<?php

/* OlogySocialBundle:FrontEnd:search_user.html.twig */
class __TwigTemplate_6a81a38a7f938490896bbdc6fd23518c extends Twig_Template
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
        Posts
        <br /><br />
            ";
        // line 15
        if ((twig_length_filter($this->env, $this->getContext($context, "posts")) == 0)) {
            // line 16
            echo "                Couldn't find any post matching your search
            ";
        } else {
            // line 18
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 19
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstname"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastname"), "html", null, true);
                echo "
                    ";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 22
            echo "            ";
        }
        // line 23
        echo "        <br /><br />
        === Ologist ===
        <br /><br />
            ";
        // line 26
        if ((twig_length_filter($this->env, $this->getContext($context, "users")) == 0)) {
            // line 27
            echo "                Couldn't find any user matching your search
            ";
        } else {
            // line 29
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "users"));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 30
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "lastName"), "html", null, true);
                echo " LOCATION ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "summary"), "html", null, true);
                echo " TOP1 TOP2 TOP3
                <img src=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
                echo "\" width=\"20\" />
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 33
            echo "            ";
        }
        // line 34
        echo "        <br /><br />
        Ologies
        <br /><br />
            ";
        // line 37
        if ((twig_length_filter($this->env, $this->getContext($context, "ologies")) == 0)) {
            // line 38
            echo "                Couldn't find any ology matching your search
            ";
        } else {
            // line 40
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "ologies"));
            foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
                // line 41
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
                echo "
                    ";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
                echo " FOLLOW
                <img src=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_small_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))), "html", null, true);
                echo "\" width=\"20\" />
                    ";
                // line 44
                if ($this->getContext($context, "loggedIn")) {
                    // line 45
                    echo "                        <p>
                        ";
                    // line 46
                    if ($this->getAttribute($this->getContext($context, "memberships"), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array")) {
                        // line 47
                        echo "                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                        echo "\" class=\"unfollow\"></a>
                        ";
                    } else {
                        // line 49
                        echo "                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                        echo "\" claSS=\"follow\"></a>
                        ";
                    }
                    // line 51
                    echo "                        </p>
                    ";
                }
                // line 53
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 54
            echo "            ";
        }
        // line 55
        echo "</div>
";
    }

    // line 57
    public function block_pagescripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:search_user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  388 => 152,  384 => 151,  269 => 95,  747 => 248,  742 => 247,  739 => 246,  733 => 243,  729 => 242,  725 => 241,  721 => 240,  718 => 239,  711 => 235,  708 => 234,  705 => 233,  703 => 232,  698 => 231,  695 => 230,  687 => 224,  684 => 223,  678 => 220,  675 => 219,  673 => 218,  656 => 216,  653 => 215,  644 => 212,  641 => 211,  617 => 208,  615 => 207,  608 => 203,  597 => 196,  583 => 195,  580 => 194,  563 => 193,  555 => 189,  541 => 188,  538 => 187,  520 => 186,  512 => 181,  505 => 176,  491 => 175,  488 => 174,  457 => 165,  451 => 164,  429 => 150,  425 => 149,  403 => 143,  379 => 133,  372 => 131,  365 => 129,  341 => 120,  313 => 110,  172 => 62,  502 => 177,  494 => 175,  483 => 167,  470 => 161,  465 => 170,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  350 => 113,  295 => 105,  258 => 90,  144 => 39,  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 158,  434 => 154,  432 => 147,  417 => 145,  408 => 144,  404 => 140,  401 => 130,  398 => 138,  389 => 137,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 121,  239 => 82,  231 => 79,  674 => 231,  670 => 217,  665 => 228,  654 => 220,  650 => 214,  647 => 213,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 210,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 190,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 171,  464 => 166,  461 => 141,  458 => 157,  455 => 139,  452 => 160,  450 => 137,  439 => 150,  433 => 131,  431 => 130,  413 => 122,  410 => 134,  406 => 119,  392 => 153,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 93,  244 => 87,  236 => 84,  293 => 99,  246 => 72,  242 => 83,  173 => 53,  354 => 114,  319 => 112,  311 => 109,  303 => 106,  278 => 106,  262 => 101,  198 => 65,  334 => 119,  321 => 101,  308 => 109,  297 => 112,  284 => 87,  267 => 94,  264 => 99,  222 => 76,  201 => 58,  426 => 149,  415 => 146,  412 => 136,  409 => 135,  407 => 133,  400 => 129,  395 => 127,  375 => 132,  361 => 131,  357 => 124,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 106,  271 => 95,  266 => 102,  240 => 85,  230 => 67,  216 => 84,  213 => 72,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 108,  302 => 107,  291 => 103,  261 => 101,  252 => 86,  234 => 86,  223 => 80,  348 => 118,  340 => 129,  336 => 118,  332 => 110,  327 => 104,  324 => 108,  318 => 106,  315 => 99,  309 => 109,  304 => 102,  300 => 142,  290 => 102,  287 => 109,  279 => 97,  226 => 66,  149 => 55,  136 => 51,  125 => 41,  115 => 37,  100 => 43,  130 => 44,  251 => 94,  247 => 87,  238 => 84,  194 => 52,  191 => 55,  168 => 50,  128 => 38,  294 => 114,  286 => 101,  283 => 102,  280 => 86,  277 => 85,  268 => 80,  263 => 94,  255 => 89,  243 => 73,  208 => 92,  202 => 73,  199 => 72,  186 => 69,  183 => 55,  181 => 63,  163 => 49,  140 => 53,  170 => 73,  121 => 34,  112 => 35,  118 => 33,  106 => 33,  157 => 47,  232 => 68,  228 => 79,  220 => 79,  210 => 72,  207 => 69,  159 => 69,  151 => 48,  147 => 61,  105 => 37,  85 => 23,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 176,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 165,  476 => 164,  474 => 154,  471 => 173,  469 => 152,  466 => 151,  463 => 150,  453 => 155,  445 => 161,  442 => 145,  438 => 157,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 137,  411 => 145,  405 => 132,  402 => 132,  399 => 131,  396 => 154,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 130,  364 => 116,  358 => 113,  355 => 127,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 106,  330 => 117,  328 => 103,  325 => 114,  323 => 108,  320 => 100,  317 => 112,  307 => 96,  299 => 105,  296 => 100,  292 => 103,  289 => 89,  281 => 107,  275 => 96,  272 => 82,  270 => 104,  265 => 91,  259 => 94,  256 => 92,  250 => 90,  248 => 76,  235 => 83,  227 => 79,  218 => 78,  212 => 60,  206 => 60,  197 => 68,  187 => 57,  184 => 55,  182 => 55,  174 => 63,  150 => 44,  119 => 42,  110 => 31,  53 => 7,  91 => 18,  66 => 9,  98 => 24,  96 => 29,  166 => 53,  160 => 51,  154 => 49,  143 => 60,  138 => 42,  101 => 30,  58 => 17,  36 => 6,  65 => 19,  18 => 1,  352 => 126,  347 => 123,  344 => 110,  282 => 100,  276 => 99,  274 => 104,  257 => 99,  253 => 91,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 82,  229 => 84,  225 => 81,  221 => 76,  217 => 74,  214 => 62,  203 => 67,  180 => 54,  175 => 44,  169 => 51,  167 => 62,  164 => 71,  155 => 46,  139 => 59,  114 => 28,  83 => 30,  76 => 20,  72 => 17,  68 => 10,  64 => 14,  56 => 16,  21 => 2,  209 => 70,  205 => 71,  196 => 70,  192 => 58,  189 => 80,  178 => 54,  176 => 61,  165 => 57,  161 => 70,  152 => 45,  148 => 55,  145 => 66,  141 => 53,  134 => 51,  132 => 40,  127 => 38,  123 => 46,  109 => 40,  93 => 28,  90 => 26,  54 => 15,  133 => 47,  124 => 46,  111 => 32,  107 => 28,  80 => 36,  63 => 8,  60 => 18,  69 => 22,  61 => 13,  52 => 11,  50 => 14,  45 => 9,  43 => 5,  34 => 5,  224 => 65,  215 => 77,  211 => 80,  204 => 73,  200 => 66,  195 => 57,  193 => 69,  190 => 59,  188 => 50,  185 => 66,  179 => 54,  177 => 49,  171 => 47,  162 => 48,  158 => 55,  156 => 68,  153 => 67,  146 => 43,  142 => 42,  137 => 41,  131 => 35,  126 => 37,  120 => 22,  117 => 44,  103 => 38,  99 => 37,  74 => 20,  47 => 15,  32 => 6,  39 => 7,  26 => 8,  97 => 44,  95 => 43,  88 => 34,  82 => 22,  78 => 19,  75 => 34,  71 => 11,  22 => 3,  44 => 9,  30 => 9,  20 => 2,  25 => 4,  49 => 9,  42 => 8,  40 => 4,  23 => 4,  27 => 3,  17 => 1,  92 => 27,  86 => 30,  79 => 14,  77 => 27,  57 => 12,  46 => 6,  37 => 6,  33 => 6,  29 => 6,  24 => 3,  19 => 2,  135 => 58,  129 => 55,  122 => 35,  116 => 30,  113 => 42,  108 => 40,  104 => 31,  102 => 26,  94 => 35,  89 => 31,  87 => 19,  84 => 21,  81 => 29,  73 => 12,  70 => 16,  67 => 15,  62 => 20,  59 => 13,  55 => 16,  51 => 13,  48 => 11,  41 => 7,  38 => 14,  35 => 6,  31 => 8,  28 => 3,);
    }
}

<?php

/* OlogySocialBundle:FrontEnd:search_ology.html.twig */
class __TwigTemplate_76365c915e77f416b98b891d898a7f03 extends Twig_Template
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
        <br /><br />
        Posts123
        <br /><br />
            ";
        // line 16
        if ((twig_length_filter($this->env, $this->getContext($context, "posts")) == 0)) {
            // line 17
            echo "                Couldn't find any posts matching your search
            ";
        } else {
            // line 19
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 20
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstname"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastname"), "html", null, true);
                echo "
                    ";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 23
            echo "            ";
        }
        // line 24
        echo "        <br /><br />
        Ologist
        <br /><br />
            ";
        // line 27
        if ((twig_length_filter($this->env, $this->getContext($context, "users")) == 0)) {
            // line 28
            echo "                Couldn't find any users matching your search
            ";
        } else {
            // line 30
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "users"));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 31
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "lastName"), "html", null, true);
                echo " LOCATION ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "summary"), "html", null, true);
                echo "
                <img src=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_small_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
                echo "\" width=\"20\" />
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 34
            echo "            ";
        }
        // line 35
        echo "        <br /><br />
        === Ologies ===
        <br /><br />
            ";
        // line 38
        if ((twig_length_filter($this->env, $this->getContext($context, "ologies")) == 0)) {
            // line 39
            echo "                Couldn't find any ologies matching your search
            ";
        } else {
            // line 41
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "ologies"));
            foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
                // line 42
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastName"), "html", null, true);
                echo "
                    ";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
                echo " STATS FOLLOW
                <img src=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
                echo "\" width=\"20\" />
                ";
                // line 45
                if ($this->getContext($context, "loggedIn")) {
                    // line 46
                    echo "                    <p>
                    ";
                    // line 47
                    if ($this->getAttribute($this->getContext($context, "memberships"), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array")) {
                        // line 48
                        echo "                            <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                        echo "\" class=\"unfollow\"></a>
                    ";
                    } else {
                        // line 50
                        echo "                            <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                        echo "\" class=\"follow\"></a>
                    ";
                    }
                    // line 52
                    echo "                    </p>
                ";
                }
                // line 54
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 55
            echo "            ";
        }
        // line 56
        echo "</div>
";
    }

    // line 58
    public function block_pagescripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:search_ology.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 156,  434 => 154,  432 => 153,  417 => 145,  408 => 141,  404 => 140,  401 => 139,  398 => 138,  389 => 134,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 117,  239 => 82,  231 => 79,  674 => 231,  670 => 230,  665 => 228,  654 => 220,  650 => 218,  647 => 217,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 206,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 238,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 182,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 143,  464 => 166,  461 => 141,  458 => 162,  455 => 139,  452 => 160,  450 => 137,  439 => 133,  433 => 131,  431 => 130,  413 => 122,  410 => 142,  406 => 119,  392 => 118,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 89,  244 => 84,  236 => 69,  293 => 99,  246 => 72,  242 => 83,  173 => 64,  354 => 120,  319 => 122,  311 => 97,  303 => 115,  278 => 106,  262 => 101,  198 => 54,  334 => 119,  321 => 107,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 87,  201 => 79,  426 => 149,  415 => 123,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 123,  357 => 160,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 111,  230 => 67,  216 => 84,  213 => 80,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 86,  234 => 86,  223 => 77,  348 => 118,  340 => 129,  336 => 128,  332 => 110,  327 => 126,  324 => 108,  318 => 106,  315 => 124,  309 => 96,  304 => 102,  300 => 142,  290 => 98,  287 => 109,  279 => 95,  226 => 78,  149 => 55,  136 => 51,  100 => 43,  130 => 44,  251 => 94,  247 => 85,  238 => 70,  194 => 52,  191 => 70,  168 => 50,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 85,  268 => 92,  263 => 90,  255 => 76,  243 => 80,  208 => 92,  202 => 73,  199 => 72,  186 => 69,  183 => 75,  181 => 63,  163 => 57,  140 => 53,  170 => 30,  112 => 35,  118 => 37,  106 => 33,  157 => 46,  232 => 109,  228 => 66,  220 => 63,  210 => 72,  207 => 61,  159 => 59,  151 => 44,  147 => 43,  105 => 25,  85 => 34,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 148,  476 => 147,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 134,  442 => 145,  438 => 143,  435 => 142,  427 => 129,  421 => 125,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 117,  373 => 128,  367 => 119,  364 => 116,  358 => 113,  355 => 112,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 131,  330 => 104,  328 => 103,  325 => 102,  323 => 108,  320 => 100,  317 => 112,  307 => 103,  299 => 95,  296 => 100,  292 => 99,  289 => 92,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 74,  248 => 85,  235 => 68,  227 => 79,  218 => 75,  212 => 60,  206 => 78,  197 => 68,  187 => 56,  184 => 55,  182 => 67,  174 => 52,  150 => 49,  119 => 34,  110 => 48,  53 => 8,  66 => 20,  98 => 37,  166 => 61,  160 => 47,  154 => 28,  143 => 48,  138 => 42,  101 => 31,  36 => 5,  65 => 21,  18 => 1,  352 => 119,  347 => 160,  344 => 110,  282 => 96,  276 => 94,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 68,  229 => 84,  225 => 65,  221 => 76,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 44,  169 => 59,  167 => 62,  164 => 67,  155 => 45,  114 => 28,  83 => 23,  76 => 20,  72 => 24,  68 => 22,  64 => 15,  56 => 15,  21 => 2,  209 => 59,  205 => 71,  196 => 71,  192 => 58,  189 => 65,  178 => 54,  176 => 61,  165 => 57,  161 => 60,  152 => 51,  148 => 54,  145 => 66,  141 => 53,  134 => 51,  132 => 50,  127 => 38,  123 => 40,  109 => 40,  93 => 28,  90 => 18,  54 => 14,  133 => 41,  124 => 46,  111 => 32,  80 => 27,  60 => 17,  61 => 19,  52 => 10,  45 => 6,  34 => 5,  224 => 65,  215 => 61,  211 => 80,  204 => 57,  200 => 69,  195 => 68,  193 => 67,  190 => 68,  188 => 50,  185 => 71,  179 => 62,  177 => 66,  171 => 42,  162 => 48,  158 => 55,  156 => 57,  153 => 39,  146 => 49,  142 => 36,  137 => 46,  126 => 34,  120 => 22,  117 => 44,  103 => 32,  74 => 20,  47 => 11,  32 => 3,  26 => 3,  97 => 30,  95 => 20,  88 => 27,  78 => 26,  71 => 11,  22 => 3,  25 => 7,  42 => 8,  40 => 4,  23 => 5,  17 => 1,  92 => 34,  86 => 24,  79 => 13,  29 => 3,  24 => 2,  19 => 2,  69 => 21,  63 => 9,  58 => 19,  49 => 9,  43 => 10,  37 => 6,  20 => 2,  139 => 62,  131 => 43,  128 => 49,  125 => 41,  121 => 45,  115 => 46,  107 => 47,  99 => 22,  96 => 41,  91 => 27,  82 => 33,  77 => 21,  75 => 21,  57 => 17,  50 => 16,  46 => 11,  44 => 9,  39 => 7,  33 => 7,  30 => 11,  27 => 5,  135 => 45,  129 => 39,  122 => 35,  116 => 30,  113 => 49,  108 => 26,  104 => 35,  102 => 31,  94 => 40,  89 => 35,  87 => 35,  84 => 34,  81 => 23,  73 => 24,  70 => 26,  67 => 13,  62 => 20,  59 => 13,  55 => 16,  51 => 14,  48 => 11,  41 => 5,  38 => 17,  35 => 6,  31 => 8,  28 => 3,);
    }
}

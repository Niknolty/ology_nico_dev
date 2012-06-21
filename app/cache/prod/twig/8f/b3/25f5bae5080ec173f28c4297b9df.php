<?php

/* OlogySocialBundle:FrontEnd:import_likes.html.twig */
class __TwigTemplate_8fb325f5bae5080ec173f28c4297b9df extends Twig_Template
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Suggest Ologies | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
<div id=\"container\">
    <div id=\"featured\">
        <h2>Import Facebook Likes</h2>
        Based on your facebook likes, you might want to join the following ologies:<br/>
        ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "ologies"));
        foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
            // line 10
            echo "            <div>
                <a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_small_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))));
            echo "</a>
                ";
            // line 12
            if ($this->getAttribute($this->getContext($context, "memberships", true), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array", true, true)) {
                // line 13
                echo "                  <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\" class=\"unfollow\"></a>
                ";
            } else {
                // line 15
                echo "                  <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\" class=\"follow\"></a>
                ";
            }
            // line 17
            echo "            </div>
            <p>
                <span class=\"ology-featured-name\"><a href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
            echo "</a></span>
                ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
            echo "
            </p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 23
        echo "    </div>
</div>
";
    }

    // line 27
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 28
        echo "
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:import_likes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  747 => 248,  742 => 247,  739 => 246,  733 => 243,  729 => 242,  725 => 241,  721 => 240,  718 => 239,  711 => 235,  708 => 234,  705 => 233,  703 => 232,  698 => 231,  695 => 230,  687 => 224,  684 => 223,  678 => 220,  675 => 219,  673 => 218,  656 => 216,  653 => 215,  644 => 212,  641 => 211,  617 => 208,  615 => 207,  608 => 203,  597 => 196,  583 => 195,  580 => 194,  563 => 193,  555 => 189,  541 => 188,  538 => 187,  520 => 186,  512 => 181,  505 => 176,  491 => 175,  488 => 174,  457 => 165,  451 => 164,  429 => 150,  425 => 149,  403 => 143,  379 => 133,  372 => 131,  365 => 129,  341 => 120,  313 => 111,  172 => 62,  502 => 177,  494 => 175,  483 => 167,  470 => 161,  465 => 170,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  350 => 113,  295 => 104,  258 => 90,  144 => 39,  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 158,  434 => 154,  432 => 147,  417 => 145,  408 => 144,  404 => 140,  401 => 130,  398 => 138,  389 => 137,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 110,  239 => 82,  231 => 79,  674 => 231,  670 => 217,  665 => 228,  654 => 220,  650 => 214,  647 => 213,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 210,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 190,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 171,  464 => 166,  461 => 141,  458 => 157,  455 => 139,  452 => 160,  450 => 137,  439 => 150,  433 => 131,  431 => 130,  413 => 122,  410 => 134,  406 => 119,  392 => 138,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 89,  244 => 86,  236 => 84,  293 => 99,  246 => 72,  242 => 83,  173 => 64,  354 => 114,  319 => 122,  311 => 97,  303 => 106,  278 => 106,  262 => 101,  198 => 71,  334 => 119,  321 => 101,  308 => 109,  297 => 112,  284 => 87,  267 => 94,  264 => 99,  222 => 87,  201 => 58,  426 => 149,  415 => 146,  412 => 136,  409 => 135,  407 => 133,  400 => 129,  395 => 127,  375 => 132,  361 => 123,  357 => 124,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 92,  271 => 95,  266 => 102,  240 => 111,  230 => 67,  216 => 84,  213 => 80,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 86,  234 => 86,  223 => 80,  348 => 118,  340 => 129,  336 => 107,  332 => 110,  327 => 104,  324 => 108,  318 => 106,  315 => 99,  309 => 109,  304 => 102,  300 => 142,  290 => 102,  287 => 109,  279 => 97,  226 => 66,  149 => 55,  136 => 51,  125 => 41,  115 => 33,  100 => 43,  130 => 44,  251 => 94,  247 => 87,  238 => 70,  194 => 52,  191 => 55,  168 => 50,  128 => 46,  294 => 114,  286 => 101,  283 => 102,  280 => 86,  277 => 85,  268 => 80,  263 => 93,  255 => 89,  243 => 73,  208 => 92,  202 => 73,  199 => 72,  186 => 69,  183 => 75,  181 => 63,  163 => 59,  140 => 53,  170 => 30,  121 => 45,  112 => 35,  118 => 37,  106 => 33,  157 => 46,  232 => 68,  228 => 66,  220 => 79,  210 => 72,  207 => 74,  159 => 59,  151 => 44,  147 => 43,  105 => 37,  85 => 34,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 176,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 165,  476 => 164,  474 => 154,  471 => 173,  469 => 152,  466 => 151,  463 => 150,  453 => 155,  445 => 161,  442 => 145,  438 => 157,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 137,  411 => 145,  405 => 132,  402 => 132,  399 => 131,  396 => 139,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 130,  364 => 116,  358 => 113,  355 => 112,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 106,  330 => 105,  328 => 103,  325 => 103,  323 => 108,  320 => 100,  317 => 112,  307 => 96,  299 => 105,  296 => 100,  292 => 103,  289 => 89,  281 => 107,  275 => 96,  272 => 82,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 74,  248 => 76,  235 => 69,  227 => 79,  218 => 78,  212 => 60,  206 => 60,  197 => 68,  187 => 67,  184 => 55,  182 => 65,  174 => 63,  150 => 49,  119 => 42,  110 => 48,  53 => 7,  91 => 27,  66 => 20,  98 => 24,  96 => 27,  166 => 61,  160 => 41,  154 => 28,  143 => 52,  138 => 42,  101 => 35,  58 => 17,  36 => 9,  65 => 15,  18 => 1,  352 => 119,  347 => 123,  344 => 110,  282 => 96,  276 => 94,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 83,  229 => 84,  225 => 81,  221 => 76,  217 => 81,  214 => 62,  203 => 59,  180 => 50,  175 => 44,  169 => 61,  167 => 62,  164 => 43,  155 => 45,  139 => 50,  114 => 28,  83 => 23,  76 => 20,  72 => 22,  68 => 22,  64 => 18,  56 => 17,  21 => 2,  209 => 75,  205 => 71,  196 => 70,  192 => 58,  189 => 65,  178 => 54,  176 => 61,  165 => 57,  161 => 58,  152 => 51,  148 => 55,  145 => 66,  141 => 53,  134 => 51,  132 => 50,  127 => 38,  123 => 44,  109 => 40,  93 => 28,  90 => 23,  54 => 14,  133 => 47,  124 => 46,  111 => 32,  107 => 28,  80 => 27,  63 => 19,  60 => 14,  69 => 21,  61 => 19,  52 => 15,  50 => 14,  45 => 11,  43 => 10,  34 => 3,  224 => 65,  215 => 77,  211 => 80,  204 => 73,  200 => 69,  195 => 57,  193 => 69,  190 => 68,  188 => 50,  185 => 66,  179 => 50,  177 => 49,  171 => 47,  162 => 48,  158 => 55,  156 => 56,  153 => 39,  146 => 49,  142 => 38,  137 => 46,  131 => 35,  126 => 45,  120 => 22,  117 => 44,  103 => 32,  99 => 28,  74 => 27,  47 => 15,  32 => 6,  39 => 5,  26 => 3,  97 => 30,  95 => 33,  88 => 27,  82 => 33,  78 => 25,  75 => 19,  71 => 17,  22 => 3,  44 => 9,  30 => 8,  20 => 2,  25 => 5,  49 => 9,  42 => 8,  40 => 4,  23 => 4,  27 => 5,  17 => 1,  92 => 21,  86 => 30,  79 => 13,  77 => 15,  57 => 12,  46 => 11,  37 => 4,  33 => 7,  29 => 6,  24 => 3,  19 => 2,  135 => 37,  129 => 39,  122 => 35,  116 => 30,  113 => 39,  108 => 38,  104 => 27,  102 => 26,  94 => 22,  89 => 31,  87 => 19,  84 => 29,  81 => 20,  73 => 24,  70 => 26,  67 => 20,  62 => 20,  59 => 13,  55 => 16,  51 => 11,  48 => 10,  41 => 10,  38 => 8,  35 => 6,  31 => 8,  28 => 2,);
    }
}

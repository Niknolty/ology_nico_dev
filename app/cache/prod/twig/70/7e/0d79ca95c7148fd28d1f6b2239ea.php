<?php

/* OlogySocialBundle:FrontEnd:post_comments.html.twig */
class __TwigTemplate_707e0d79ca95c7148fd28d1f6b2239ea extends Twig_Template
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
        echo "<div id=\"comments\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 3
            echo "    <div class=\"comment\"> <a name=\"comments\"></a>
    ";
            // line 4
            if ($this->getContext($context, "loggedIn")) {
                // line 5
                echo "        ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id") == $this->getAttribute($this->getContext($context, "user"), "id"))) {
                    // line 6
                    echo "        <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_comment_delete", array("id" => $this->getAttribute($this->getContext($context, "comment"), "id"))), "html", null, true);
                    echo "\" class=\"delete-item\">x</a>
        ";
                }
                // line 8
                echo "    ";
            }
            // line 9
            echo "        <div class=\"user-img\">
            <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
            echo "\"></a>
        </div>
        <p style=\"padding-left:50px\"><a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
            echo "</a> - ";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
            echo "
            <span class=\"small\">
                <br /> Commented <abbr class=\"timeago\" title=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "creationDate"), "c"), "html", null, true);
            echo "\"></abbr>
            </span>
        </p>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 19
        echo "
";
        // line 27
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:post_comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  502 => 177,  494 => 175,  483 => 167,  470 => 161,  465 => 159,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  350 => 113,  295 => 91,  258 => 79,  144 => 39,  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 156,  434 => 154,  432 => 147,  417 => 145,  408 => 141,  404 => 140,  401 => 130,  398 => 138,  389 => 134,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 110,  239 => 82,  231 => 79,  674 => 231,  670 => 230,  665 => 228,  654 => 220,  650 => 218,  647 => 217,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 206,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 238,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 182,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 160,  464 => 166,  461 => 141,  458 => 157,  455 => 139,  452 => 160,  450 => 137,  439 => 150,  433 => 131,  431 => 130,  413 => 122,  410 => 134,  406 => 119,  392 => 118,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 89,  244 => 84,  236 => 69,  293 => 99,  246 => 72,  242 => 83,  173 => 64,  354 => 114,  319 => 122,  311 => 97,  303 => 95,  278 => 106,  262 => 101,  198 => 54,  334 => 119,  321 => 101,  308 => 109,  297 => 112,  284 => 87,  267 => 100,  264 => 99,  222 => 87,  201 => 58,  426 => 149,  415 => 123,  412 => 136,  409 => 135,  407 => 133,  400 => 129,  395 => 127,  375 => 121,  361 => 123,  357 => 115,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 92,  271 => 82,  266 => 102,  240 => 111,  230 => 67,  216 => 84,  213 => 80,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 86,  234 => 86,  223 => 65,  348 => 118,  340 => 129,  336 => 107,  332 => 110,  327 => 104,  324 => 108,  318 => 106,  315 => 99,  309 => 97,  304 => 102,  300 => 142,  290 => 98,  287 => 109,  279 => 95,  226 => 66,  149 => 55,  136 => 51,  125 => 41,  115 => 33,  100 => 43,  130 => 44,  251 => 94,  247 => 85,  238 => 70,  194 => 52,  191 => 55,  168 => 50,  128 => 49,  294 => 114,  286 => 88,  283 => 102,  280 => 86,  277 => 85,  268 => 80,  263 => 90,  255 => 76,  243 => 73,  208 => 92,  202 => 73,  199 => 72,  186 => 69,  183 => 75,  181 => 63,  163 => 57,  140 => 53,  170 => 30,  121 => 45,  112 => 35,  118 => 37,  106 => 33,  157 => 46,  232 => 68,  228 => 66,  220 => 64,  210 => 72,  207 => 61,  159 => 59,  151 => 44,  147 => 43,  105 => 25,  85 => 34,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 176,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 165,  476 => 164,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 155,  445 => 134,  442 => 145,  438 => 143,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 137,  411 => 135,  405 => 132,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 119,  364 => 116,  358 => 113,  355 => 112,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 106,  330 => 105,  328 => 103,  325 => 103,  323 => 108,  320 => 100,  317 => 112,  307 => 96,  299 => 95,  296 => 100,  292 => 99,  289 => 89,  281 => 107,  275 => 83,  272 => 82,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 74,  248 => 76,  235 => 69,  227 => 79,  218 => 75,  212 => 60,  206 => 60,  197 => 68,  187 => 56,  184 => 55,  182 => 51,  174 => 48,  150 => 49,  119 => 34,  110 => 48,  53 => 7,  91 => 27,  66 => 20,  98 => 24,  96 => 41,  166 => 61,  160 => 41,  154 => 28,  143 => 48,  138 => 42,  101 => 31,  58 => 19,  36 => 5,  65 => 21,  18 => 1,  352 => 119,  347 => 160,  344 => 110,  282 => 96,  276 => 94,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 68,  229 => 84,  225 => 65,  221 => 76,  217 => 81,  214 => 62,  203 => 59,  180 => 50,  175 => 44,  169 => 46,  167 => 62,  164 => 43,  155 => 45,  139 => 62,  114 => 28,  83 => 23,  76 => 20,  72 => 24,  68 => 22,  64 => 15,  56 => 15,  21 => 2,  209 => 59,  205 => 71,  196 => 71,  192 => 58,  189 => 65,  178 => 54,  176 => 61,  165 => 57,  161 => 60,  152 => 51,  148 => 54,  145 => 66,  141 => 53,  134 => 51,  132 => 50,  127 => 38,  123 => 40,  109 => 40,  93 => 28,  90 => 18,  54 => 14,  133 => 41,  124 => 46,  111 => 32,  107 => 28,  80 => 27,  63 => 9,  60 => 14,  69 => 21,  61 => 19,  52 => 10,  50 => 16,  45 => 6,  43 => 10,  34 => 5,  224 => 65,  215 => 61,  211 => 80,  204 => 57,  200 => 69,  195 => 57,  193 => 67,  190 => 68,  188 => 50,  185 => 71,  179 => 50,  177 => 49,  171 => 47,  162 => 48,  158 => 55,  156 => 57,  153 => 39,  146 => 49,  142 => 38,  137 => 46,  131 => 35,  126 => 34,  120 => 22,  117 => 44,  103 => 32,  99 => 22,  74 => 27,  47 => 11,  32 => 6,  39 => 7,  26 => 3,  97 => 30,  95 => 20,  88 => 27,  82 => 33,  78 => 26,  75 => 21,  71 => 19,  22 => 3,  44 => 10,  30 => 11,  20 => 2,  25 => 7,  49 => 9,  42 => 8,  40 => 4,  23 => 5,  27 => 4,  17 => 1,  92 => 21,  86 => 24,  79 => 13,  77 => 15,  57 => 17,  46 => 11,  37 => 6,  33 => 7,  29 => 5,  24 => 3,  19 => 2,  135 => 37,  129 => 39,  122 => 35,  116 => 30,  113 => 32,  108 => 26,  104 => 27,  102 => 26,  94 => 22,  89 => 20,  87 => 19,  84 => 18,  81 => 23,  73 => 24,  70 => 26,  67 => 12,  62 => 20,  59 => 9,  55 => 16,  51 => 12,  48 => 5,  41 => 9,  38 => 8,  35 => 6,  31 => 8,  28 => 3,);
    }
}

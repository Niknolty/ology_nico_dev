<?php

/* ::base.html.twig */
class __TwigTemplate_5e26c23011c68490bfe79ee86b9709b2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  996 => 291,  991 => 290,  989 => 289,  986 => 288,  970 => 284,  948 => 283,  946 => 282,  943 => 281,  931 => 276,  927 => 275,  922 => 274,  920 => 273,  917 => 272,  908 => 266,  902 => 264,  899 => 263,  894 => 262,  892 => 261,  889 => 260,  882 => 255,  873 => 253,  869 => 252,  866 => 251,  863 => 250,  861 => 249,  858 => 248,  850 => 244,  848 => 243,  845 => 242,  838 => 237,  835 => 236,  827 => 231,  823 => 230,  819 => 229,  816 => 228,  814 => 227,  811 => 226,  803 => 222,  801 => 221,  798 => 220,  790 => 214,  788 => 213,  785 => 212,  777 => 208,  774 => 207,  772 => 206,  769 => 205,  748 => 201,  745 => 200,  737 => 197,  734 => 196,  726 => 190,  723 => 189,  697 => 178,  694 => 177,  692 => 176,  689 => 175,  677 => 171,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  645 => 157,  642 => 156,  640 => 155,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  600 => 137,  584 => 130,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  543 => 115,  540 => 114,  532 => 108,  525 => 103,  511 => 98,  485 => 88,  419 => 65,  397 => 58,  386 => 54,  378 => 53,  366 => 49,  335 => 39,  285 => 28,  219 => 288,  254 => 108,  603 => 334,  595 => 135,  423 => 165,  385 => 146,  351 => 131,  306 => 113,  288 => 107,  388 => 55,  384 => 151,  269 => 95,  747 => 248,  742 => 199,  739 => 198,  733 => 243,  729 => 242,  725 => 241,  721 => 188,  718 => 187,  711 => 184,  708 => 183,  705 => 182,  703 => 232,  698 => 231,  695 => 230,  687 => 224,  684 => 223,  678 => 220,  675 => 219,  673 => 218,  656 => 162,  653 => 161,  644 => 212,  641 => 211,  617 => 208,  615 => 207,  608 => 141,  597 => 136,  583 => 195,  580 => 194,  563 => 193,  555 => 189,  541 => 188,  538 => 187,  520 => 186,  512 => 181,  505 => 176,  491 => 175,  488 => 174,  457 => 165,  451 => 164,  429 => 71,  425 => 149,  403 => 143,  379 => 133,  372 => 131,  365 => 129,  341 => 120,  313 => 110,  172 => 68,  502 => 92,  494 => 90,  483 => 167,  470 => 161,  465 => 170,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 51,  371 => 141,  368 => 140,  362 => 138,  359 => 116,  350 => 113,  295 => 31,  258 => 95,  144 => 186,  598 => 237,  571 => 213,  542 => 188,  530 => 104,  522 => 178,  516 => 100,  514 => 99,  487 => 169,  449 => 159,  443 => 157,  440 => 158,  434 => 73,  432 => 72,  417 => 161,  408 => 144,  404 => 140,  401 => 130,  398 => 151,  389 => 147,  382 => 131,  380 => 144,  376 => 143,  370 => 127,  345 => 121,  239 => 88,  231 => 96,  674 => 170,  670 => 217,  665 => 228,  654 => 220,  650 => 214,  647 => 213,  639 => 214,  637 => 154,  631 => 211,  629 => 150,  623 => 341,  620 => 340,  614 => 338,  611 => 142,  605 => 335,  602 => 199,  599 => 198,  596 => 197,  592 => 134,  587 => 193,  581 => 129,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 190,  552 => 178,  550 => 177,  545 => 116,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 89,  481 => 167,  472 => 146,  467 => 171,  464 => 166,  461 => 141,  458 => 200,  455 => 79,  452 => 192,  450 => 77,  439 => 150,  433 => 131,  431 => 130,  413 => 63,  410 => 134,  406 => 119,  392 => 153,  360 => 137,  342 => 128,  337 => 107,  273 => 83,  260 => 93,  244 => 87,  236 => 108,  293 => 99,  246 => 72,  242 => 83,  173 => 220,  354 => 114,  319 => 35,  311 => 109,  303 => 106,  278 => 106,  262 => 96,  198 => 259,  334 => 119,  321 => 133,  308 => 130,  297 => 110,  284 => 121,  267 => 21,  264 => 99,  222 => 100,  201 => 260,  426 => 149,  415 => 146,  412 => 136,  409 => 155,  407 => 61,  400 => 59,  395 => 150,  375 => 132,  361 => 48,  357 => 47,  353 => 113,  326 => 102,  314 => 98,  312 => 131,  301 => 111,  298 => 106,  271 => 99,  266 => 102,  240 => 101,  230 => 67,  216 => 287,  213 => 72,  339 => 108,  329 => 124,  316 => 149,  310 => 114,  305 => 108,  302 => 127,  291 => 103,  261 => 110,  252 => 86,  234 => 86,  223 => 3,  348 => 118,  340 => 129,  336 => 118,  332 => 110,  327 => 134,  324 => 108,  318 => 106,  315 => 116,  309 => 109,  304 => 33,  300 => 32,  290 => 102,  287 => 29,  279 => 97,  226 => 4,  149 => 193,  136 => 40,  100 => 27,  130 => 48,  251 => 119,  247 => 106,  238 => 100,  194 => 76,  191 => 242,  168 => 56,  294 => 124,  286 => 122,  283 => 102,  280 => 119,  277 => 85,  268 => 80,  263 => 122,  255 => 89,  243 => 89,  208 => 84,  202 => 81,  199 => 69,  186 => 76,  183 => 236,  181 => 72,  163 => 57,  140 => 52,  170 => 219,  112 => 141,  118 => 36,  106 => 30,  157 => 204,  232 => 68,  228 => 5,  220 => 79,  210 => 71,  207 => 70,  159 => 52,  151 => 53,  147 => 187,  105 => 37,  85 => 28,  537 => 172,  533 => 170,  527 => 169,  519 => 101,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 91,  495 => 232,  492 => 159,  489 => 158,  484 => 168,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  469 => 152,  466 => 151,  463 => 150,  453 => 78,  445 => 161,  442 => 145,  438 => 157,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 64,  411 => 145,  405 => 60,  402 => 152,  399 => 131,  396 => 154,  394 => 57,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 130,  364 => 116,  358 => 113,  355 => 127,  349 => 45,  346 => 132,  343 => 116,  338 => 127,  333 => 125,  330 => 135,  328 => 103,  325 => 114,  323 => 37,  320 => 100,  317 => 112,  307 => 96,  299 => 126,  296 => 125,  292 => 30,  289 => 89,  281 => 107,  275 => 96,  272 => 23,  270 => 22,  265 => 91,  259 => 17,  256 => 16,  250 => 14,  248 => 13,  235 => 83,  227 => 79,  218 => 88,  212 => 60,  206 => 271,  197 => 68,  187 => 57,  184 => 61,  182 => 55,  174 => 63,  150 => 43,  119 => 153,  110 => 39,  53 => 13,  66 => 21,  98 => 28,  166 => 53,  160 => 205,  154 => 54,  143 => 52,  138 => 48,  101 => 33,  36 => 6,  65 => 17,  18 => 1,  352 => 46,  347 => 44,  344 => 43,  282 => 27,  276 => 101,  274 => 115,  257 => 109,  253 => 15,  249 => 107,  245 => 12,  241 => 71,  237 => 7,  233 => 6,  229 => 104,  225 => 81,  221 => 76,  217 => 74,  214 => 281,  203 => 269,  180 => 235,  175 => 225,  169 => 51,  167 => 217,  164 => 59,  155 => 196,  114 => 146,  83 => 28,  76 => 25,  72 => 43,  68 => 20,  64 => 26,  56 => 14,  21 => 1,  209 => 272,  205 => 71,  196 => 248,  192 => 63,  189 => 73,  178 => 226,  176 => 61,  165 => 212,  161 => 58,  152 => 195,  148 => 45,  145 => 49,  141 => 49,  134 => 174,  132 => 168,  127 => 161,  123 => 38,  109 => 140,  93 => 28,  90 => 31,  54 => 11,  133 => 49,  124 => 160,  111 => 33,  80 => 26,  60 => 14,  61 => 16,  52 => 13,  45 => 12,  34 => 5,  224 => 92,  215 => 96,  211 => 280,  204 => 82,  200 => 66,  195 => 57,  193 => 247,  190 => 66,  188 => 241,  185 => 239,  179 => 72,  177 => 67,  171 => 47,  162 => 211,  158 => 57,  156 => 56,  153 => 56,  146 => 44,  142 => 182,  137 => 175,  126 => 39,  120 => 37,  117 => 147,  103 => 28,  74 => 70,  47 => 15,  32 => 5,  26 => 3,  97 => 114,  95 => 35,  88 => 30,  78 => 24,  71 => 20,  22 => 3,  25 => 5,  42 => 11,  40 => 10,  23 => 3,  17 => 1,  92 => 98,  86 => 30,  79 => 76,  29 => 5,  24 => 3,  19 => 1,  69 => 42,  63 => 17,  58 => 26,  49 => 2,  43 => 8,  37 => 6,  20 => 2,  139 => 181,  131 => 39,  128 => 33,  125 => 36,  121 => 41,  115 => 33,  107 => 134,  99 => 125,  96 => 31,  91 => 27,  82 => 77,  77 => 71,  75 => 21,  57 => 6,  50 => 13,  46 => 11,  44 => 10,  39 => 7,  33 => 7,  30 => 4,  27 => 5,  135 => 41,  129 => 167,  122 => 154,  116 => 37,  113 => 40,  108 => 38,  104 => 133,  102 => 126,  94 => 113,  89 => 97,  87 => 83,  84 => 82,  81 => 24,  73 => 23,  70 => 18,  67 => 11,  62 => 10,  59 => 20,  55 => 14,  51 => 5,  48 => 12,  41 => 9,  38 => 11,  35 => 7,  31 => 6,  28 => 3,);
    }
}

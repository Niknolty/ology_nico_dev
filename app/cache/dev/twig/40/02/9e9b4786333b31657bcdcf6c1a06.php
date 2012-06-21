<?php

/* FOSUserBundle:Resetting:email.txt.twig */
class __TwigTemplate_40029e9b4786333b31657bcdcf6c1a06 extends Twig_Template
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
        echo "
    Ology Password Reset Request
    <img src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/emailheader.jpg"), "html", null, true);
        echo "\" />
    <p>
    Hey ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "lastname"), "html", null, true);
        echo ", forgot your password? No worries, you can <a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "confirmationUrl"), "html", null, true);
        echo "\">reset it here</a>.
    <br/> <br/>
    (<i>And now a really bad joke...</i>)<br/>
    Us: Knock, Knock<br/>
    You: Who's there?<br/>
    Us: I forget<br/>
    You: Did you forget your password too?<br/>
    Us: Yes.
    </p>
    - The Ology Team.

";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:email.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  603 => 334,  595 => 329,  423 => 165,  385 => 146,  351 => 131,  306 => 113,  288 => 107,  388 => 152,  384 => 151,  269 => 95,  747 => 248,  742 => 247,  739 => 246,  733 => 243,  729 => 242,  725 => 241,  721 => 240,  718 => 239,  711 => 235,  708 => 234,  705 => 233,  703 => 232,  698 => 231,  695 => 230,  687 => 224,  684 => 223,  678 => 220,  675 => 219,  673 => 218,  656 => 216,  653 => 215,  644 => 212,  641 => 211,  617 => 208,  615 => 207,  608 => 203,  597 => 196,  583 => 195,  580 => 194,  563 => 193,  555 => 189,  541 => 188,  538 => 187,  520 => 186,  512 => 181,  505 => 176,  491 => 175,  488 => 174,  457 => 165,  451 => 164,  429 => 150,  425 => 149,  403 => 143,  379 => 133,  372 => 131,  365 => 129,  341 => 120,  313 => 110,  172 => 60,  502 => 177,  494 => 175,  483 => 167,  470 => 161,  465 => 170,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 121,  371 => 141,  368 => 140,  362 => 138,  359 => 116,  350 => 113,  295 => 105,  258 => 95,  144 => 44,  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 158,  434 => 154,  432 => 147,  417 => 161,  408 => 144,  404 => 140,  401 => 130,  398 => 151,  389 => 147,  382 => 131,  380 => 144,  376 => 143,  370 => 127,  345 => 121,  239 => 88,  231 => 79,  674 => 231,  670 => 217,  665 => 228,  654 => 220,  650 => 214,  647 => 213,  639 => 214,  637 => 213,  631 => 211,  629 => 343,  623 => 341,  620 => 340,  614 => 338,  611 => 337,  605 => 335,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 190,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 171,  464 => 166,  461 => 141,  458 => 200,  455 => 193,  452 => 192,  450 => 137,  439 => 150,  433 => 131,  431 => 130,  413 => 122,  410 => 134,  406 => 119,  392 => 153,  360 => 137,  342 => 128,  337 => 107,  273 => 83,  260 => 93,  244 => 87,  236 => 84,  293 => 99,  246 => 72,  242 => 83,  173 => 53,  354 => 114,  319 => 117,  311 => 109,  303 => 106,  278 => 106,  262 => 96,  198 => 65,  334 => 119,  321 => 101,  308 => 109,  297 => 110,  284 => 87,  267 => 98,  264 => 99,  222 => 80,  201 => 66,  426 => 149,  415 => 146,  412 => 136,  409 => 155,  407 => 154,  400 => 129,  395 => 150,  375 => 132,  361 => 131,  357 => 124,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 111,  298 => 106,  271 => 99,  266 => 102,  240 => 85,  230 => 67,  216 => 84,  213 => 72,  339 => 108,  329 => 124,  316 => 149,  310 => 114,  305 => 108,  302 => 107,  291 => 103,  261 => 101,  252 => 86,  234 => 86,  223 => 80,  348 => 118,  340 => 129,  336 => 118,  332 => 110,  327 => 104,  324 => 108,  318 => 106,  315 => 116,  309 => 109,  304 => 102,  300 => 142,  290 => 102,  287 => 109,  279 => 97,  226 => 66,  149 => 55,  136 => 40,  100 => 43,  130 => 44,  251 => 94,  247 => 87,  238 => 84,  194 => 79,  191 => 55,  168 => 56,  294 => 114,  286 => 101,  283 => 102,  280 => 102,  277 => 85,  268 => 80,  263 => 94,  255 => 89,  243 => 89,  208 => 92,  202 => 73,  199 => 69,  186 => 69,  183 => 55,  181 => 72,  163 => 57,  140 => 43,  170 => 59,  112 => 33,  118 => 39,  106 => 30,  157 => 48,  232 => 68,  228 => 79,  220 => 79,  210 => 71,  207 => 70,  159 => 54,  151 => 52,  147 => 61,  105 => 30,  85 => 21,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 176,  495 => 232,  492 => 159,  489 => 158,  484 => 168,  479 => 219,  476 => 164,  474 => 154,  471 => 173,  469 => 152,  466 => 151,  463 => 150,  453 => 155,  445 => 161,  442 => 145,  438 => 157,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 137,  411 => 145,  405 => 132,  402 => 152,  399 => 131,  396 => 154,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 130,  364 => 116,  358 => 113,  355 => 127,  349 => 112,  346 => 132,  343 => 116,  338 => 127,  333 => 125,  330 => 117,  328 => 103,  325 => 114,  323 => 108,  320 => 100,  317 => 112,  307 => 96,  299 => 105,  296 => 100,  292 => 108,  289 => 89,  281 => 107,  275 => 96,  272 => 82,  270 => 104,  265 => 91,  259 => 94,  256 => 92,  250 => 90,  248 => 76,  235 => 83,  227 => 79,  218 => 78,  212 => 60,  206 => 86,  197 => 68,  187 => 57,  184 => 61,  182 => 55,  174 => 63,  150 => 46,  119 => 35,  110 => 31,  53 => 13,  66 => 24,  98 => 28,  166 => 53,  160 => 51,  154 => 49,  143 => 52,  138 => 35,  101 => 28,  36 => 8,  65 => 16,  18 => 1,  352 => 126,  347 => 130,  344 => 110,  282 => 100,  276 => 101,  274 => 104,  257 => 99,  253 => 93,  249 => 92,  245 => 93,  241 => 71,  237 => 91,  233 => 85,  229 => 84,  225 => 81,  221 => 76,  217 => 74,  214 => 62,  203 => 85,  180 => 60,  175 => 69,  169 => 51,  167 => 58,  164 => 61,  155 => 53,  114 => 29,  83 => 20,  76 => 22,  72 => 20,  68 => 18,  64 => 15,  56 => 13,  21 => 3,  209 => 70,  205 => 71,  196 => 70,  192 => 63,  189 => 80,  178 => 54,  176 => 61,  165 => 57,  161 => 52,  152 => 43,  148 => 45,  145 => 66,  141 => 53,  134 => 46,  132 => 40,  127 => 38,  123 => 37,  109 => 32,  93 => 39,  90 => 22,  54 => 14,  133 => 40,  124 => 37,  111 => 32,  80 => 19,  60 => 13,  61 => 15,  52 => 12,  45 => 8,  34 => 2,  224 => 65,  215 => 76,  211 => 75,  204 => 73,  200 => 66,  195 => 57,  193 => 69,  190 => 66,  188 => 76,  185 => 64,  179 => 54,  177 => 49,  171 => 47,  162 => 55,  158 => 58,  156 => 68,  153 => 56,  146 => 44,  142 => 42,  137 => 41,  126 => 41,  120 => 38,  117 => 34,  103 => 29,  74 => 21,  47 => 10,  32 => 6,  26 => 4,  97 => 27,  95 => 24,  88 => 30,  78 => 25,  71 => 25,  22 => 4,  25 => 4,  42 => 10,  40 => 8,  23 => 3,  17 => 1,  92 => 35,  86 => 25,  79 => 21,  29 => 6,  24 => 3,  19 => 2,  69 => 16,  63 => 18,  58 => 12,  49 => 9,  43 => 9,  37 => 7,  20 => 2,  139 => 45,  131 => 39,  128 => 33,  125 => 33,  121 => 31,  115 => 33,  107 => 27,  99 => 29,  96 => 29,  91 => 31,  82 => 27,  77 => 32,  75 => 24,  57 => 15,  50 => 12,  46 => 10,  44 => 10,  39 => 8,  33 => 7,  30 => 2,  27 => 5,  135 => 41,  129 => 55,  122 => 36,  116 => 37,  113 => 37,  108 => 32,  104 => 44,  102 => 26,  94 => 27,  89 => 25,  87 => 33,  84 => 28,  81 => 23,  73 => 18,  70 => 19,  67 => 19,  62 => 23,  59 => 15,  55 => 10,  51 => 13,  48 => 11,  41 => 12,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}

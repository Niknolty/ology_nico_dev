<?php

/* OlogySocialBundle:FrontEnd:create_post_home.html.twig */
class __TwigTemplate_ed4cee8d121fc9617995cb275e076636 extends Twig_Template
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
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_store_obj"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "postForm"));
        echo " id=\"form-post\">
    ";
        // line 2
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_form_content.html.twig")->display($context);
        // line 3
        echo "    ";
        $this->env->loadTemplate("OlogySocialBundle:Tips:attach_media_tip.html.twig")->display($context);
        // line 4
        echo "    <div class=\"cancel\">Cancel</div>
    <input type=\"button\" value=\"Post (Ologize)\" id=\"post-button-home\" class=\"post-button\" />
</form>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:create_post_home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  674 => 231,  670 => 230,  665 => 228,  654 => 220,  650 => 218,  647 => 217,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 206,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 182,  552 => 178,  550 => 177,  545 => 174,  539 => 171,  536 => 170,  534 => 169,  528 => 166,  524 => 164,  496 => 154,  493 => 153,  490 => 152,  481 => 149,  472 => 146,  467 => 143,  464 => 142,  461 => 141,  458 => 140,  455 => 139,  452 => 138,  450 => 137,  439 => 133,  433 => 131,  431 => 130,  413 => 122,  410 => 121,  406 => 119,  392 => 118,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 78,  244 => 112,  236 => 69,  293 => 111,  246 => 72,  242 => 89,  173 => 64,  354 => 137,  319 => 122,  311 => 97,  303 => 115,  278 => 106,  262 => 101,  198 => 54,  334 => 119,  321 => 124,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 123,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 111,  230 => 67,  216 => 62,  213 => 61,  339 => 108,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 75,  234 => 86,  223 => 64,  348 => 120,  340 => 129,  336 => 128,  332 => 105,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 96,  304 => 94,  300 => 142,  290 => 108,  287 => 109,  279 => 84,  226 => 84,  149 => 68,  136 => 49,  125 => 48,  115 => 46,  100 => 40,  130 => 44,  251 => 94,  247 => 95,  238 => 70,  194 => 52,  191 => 70,  168 => 80,  128 => 49,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 85,  268 => 81,  263 => 79,  255 => 76,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 69,  183 => 75,  181 => 48,  163 => 57,  140 => 53,  170 => 30,  121 => 46,  112 => 41,  118 => 34,  106 => 37,  157 => 58,  232 => 109,  228 => 66,  220 => 63,  210 => 76,  207 => 61,  159 => 45,  151 => 27,  147 => 55,  105 => 25,  85 => 16,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 164,  504 => 157,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 150,  479 => 148,  476 => 147,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 134,  442 => 145,  438 => 143,  435 => 142,  427 => 129,  421 => 125,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 117,  373 => 120,  367 => 119,  364 => 116,  358 => 113,  355 => 112,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 131,  330 => 104,  328 => 103,  325 => 102,  323 => 108,  320 => 100,  317 => 112,  307 => 116,  299 => 95,  296 => 112,  292 => 99,  289 => 92,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 80,  259 => 94,  256 => 88,  250 => 74,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 60,  206 => 78,  197 => 54,  187 => 74,  184 => 80,  182 => 67,  174 => 64,  150 => 49,  119 => 45,  110 => 48,  53 => 8,  91 => 39,  66 => 10,  98 => 37,  96 => 41,  166 => 61,  160 => 56,  154 => 28,  143 => 54,  138 => 46,  101 => 25,  58 => 19,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 88,  276 => 105,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 68,  229 => 84,  225 => 65,  221 => 84,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 44,  169 => 59,  167 => 61,  164 => 67,  155 => 40,  139 => 62,  114 => 28,  83 => 15,  76 => 20,  72 => 27,  68 => 20,  64 => 12,  56 => 7,  21 => 2,  209 => 59,  205 => 81,  196 => 71,  192 => 51,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 69,  148 => 54,  145 => 66,  141 => 58,  134 => 51,  132 => 24,  127 => 53,  123 => 49,  109 => 40,  93 => 19,  90 => 18,  54 => 15,  133 => 48,  124 => 33,  111 => 37,  107 => 47,  80 => 27,  63 => 9,  60 => 17,  69 => 21,  61 => 9,  52 => 10,  50 => 16,  45 => 6,  43 => 10,  34 => 5,  224 => 65,  215 => 61,  211 => 80,  204 => 57,  200 => 55,  195 => 68,  193 => 67,  190 => 68,  188 => 50,  185 => 67,  179 => 65,  177 => 32,  171 => 42,  162 => 59,  158 => 58,  156 => 57,  153 => 39,  146 => 38,  142 => 36,  137 => 52,  131 => 50,  126 => 34,  120 => 22,  117 => 29,  103 => 24,  99 => 22,  74 => 28,  47 => 11,  32 => 3,  39 => 7,  26 => 3,  97 => 31,  95 => 20,  88 => 17,  82 => 33,  78 => 26,  75 => 12,  71 => 11,  22 => 3,  44 => 9,  30 => 11,  20 => 2,  25 => 7,  49 => 9,  42 => 10,  40 => 4,  23 => 5,  27 => 5,  17 => 1,  92 => 34,  86 => 16,  79 => 13,  77 => 31,  57 => 16,  46 => 11,  37 => 8,  33 => 7,  29 => 4,  24 => 2,  19 => 2,  135 => 25,  129 => 35,  122 => 42,  116 => 30,  113 => 49,  108 => 26,  104 => 35,  102 => 18,  94 => 40,  89 => 30,  87 => 35,  84 => 34,  81 => 33,  73 => 24,  70 => 26,  67 => 13,  62 => 16,  59 => 19,  55 => 8,  51 => 14,  48 => 5,  41 => 5,  38 => 17,  35 => 6,  31 => 8,  28 => 6,);
    }
}

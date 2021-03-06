<?php

/* OlogySocialBundle:FrontEnd:post_form_content.html.twig */
class __TwigTemplate_5d5a4e979d09faca2a8c7fc3384aea82 extends Twig_Template
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
        echo "                ";
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "postForm"));
        echo "
\t<div id=\"post-ology-title\">
\t\t";
        // line 3
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "title"));
        echo "
\t</div>

    <div id=\"post-ology-text\">";
        // line 6
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "textContent"));
        echo "</div>

    <div class=\"media-box\">
\t    <div class=\"attach-media\">Attach Media:</div>
\t    <div class=\"add-image\"></div>
\t    <div class=\"add-video\"></div>
\t    <div class=\"add-audio\"></div>
    </div>

    <div id=\"image_field\">
        <div class=\"cancel-x\">x</div>
        <div id=\"img-web\">
            <span class=\"egypt-med\">Paste image URL</span>
            <div id=\"web-link\">
                <input style=\"width: 80%; border: 1px solid #CCC;\" id=\"input-img-grabber\" type=\"text\"/>
                ";
        // line 21
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "imageUrl"));
        echo "
            </div>
            <div id=\"grabbed-image\"></div>
        </div>
        <div id=\"img-or\" style=\"display: none;\">
            -or-
        </div>
        <div id=\"img-upload\">
            <span class=\"egypt-med\">Select Image</span> ";
        // line 29
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "imageFile"));
        echo "
        </div>
    </div>

    <div id=\"video_field\">
        <span class=\"egypt-med\">Paste YouTube video link</span> ";
        // line 34
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "videoUrl"));
        echo "
        <div class=\"cancel-x\">x</div>
    </div>

    <div id=\"audio_field\">
    \t<span class=\"egypt-med\">Select Audio file</span> ";
        // line 39
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "audioFile"));
        echo "
        <div class=\"cancel-x\">x</div>
    </div>

    ";
        // line 43
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "postForm"));
        echo "

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:post_form_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 115,  353 => 113,  326 => 102,  314 => 99,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 81,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 143,  291 => 140,  261 => 79,  252 => 117,  234 => 103,  223 => 99,  348 => 135,  340 => 133,  336 => 106,  332 => 131,  327 => 130,  324 => 101,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 87,  287 => 111,  279 => 84,  226 => 86,  149 => 41,  136 => 40,  125 => 36,  115 => 31,  100 => 31,  130 => 38,  251 => 82,  247 => 81,  238 => 90,  194 => 68,  191 => 67,  168 => 64,  128 => 45,  294 => 114,  286 => 85,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 163,  186 => 66,  183 => 51,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  121 => 29,  112 => 26,  118 => 41,  106 => 29,  157 => 44,  232 => 88,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 111,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 100,  307 => 95,  299 => 102,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 48,  150 => 57,  119 => 49,  110 => 36,  53 => 11,  91 => 34,  66 => 34,  98 => 29,  96 => 25,  166 => 45,  160 => 47,  154 => 43,  143 => 54,  138 => 54,  101 => 25,  58 => 29,  36 => 9,  65 => 16,  18 => 1,  352 => 117,  347 => 160,  344 => 110,  282 => 99,  276 => 83,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 73,  241 => 91,  237 => 69,  233 => 76,  229 => 102,  225 => 100,  221 => 78,  217 => 72,  214 => 76,  203 => 71,  180 => 50,  175 => 8,  169 => 74,  167 => 61,  164 => 60,  155 => 49,  139 => 41,  114 => 51,  83 => 24,  76 => 20,  72 => 19,  68 => 17,  64 => 14,  56 => 14,  21 => 3,  209 => 85,  205 => 57,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 75,  165 => 63,  161 => 69,  152 => 42,  148 => 56,  145 => 39,  141 => 60,  134 => 62,  132 => 43,  127 => 34,  123 => 51,  109 => 37,  93 => 39,  90 => 24,  54 => 12,  133 => 31,  124 => 33,  111 => 45,  107 => 29,  80 => 27,  63 => 17,  60 => 15,  69 => 24,  61 => 21,  52 => 13,  50 => 13,  45 => 11,  43 => 10,  34 => 3,  224 => 65,  215 => 90,  211 => 88,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 53,  185 => 52,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 50,  156 => 49,  153 => 64,  146 => 55,  142 => 42,  137 => 37,  131 => 40,  126 => 57,  120 => 33,  117 => 48,  103 => 40,  99 => 26,  74 => 39,  47 => 21,  32 => 8,  39 => 5,  26 => 4,  97 => 40,  95 => 35,  88 => 22,  82 => 23,  78 => 26,  75 => 27,  71 => 18,  22 => 3,  44 => 11,  30 => 9,  20 => 2,  25 => 4,  49 => 12,  42 => 6,  40 => 10,  23 => 3,  27 => 2,  17 => 1,  92 => 29,  86 => 23,  79 => 21,  77 => 20,  57 => 14,  46 => 7,  37 => 8,  33 => 7,  29 => 6,  24 => 6,  19 => 2,  135 => 57,  129 => 35,  122 => 56,  116 => 30,  113 => 31,  108 => 36,  104 => 28,  102 => 27,  94 => 25,  89 => 30,  87 => 33,  84 => 25,  81 => 43,  73 => 20,  70 => 20,  67 => 22,  62 => 15,  59 => 14,  55 => 13,  51 => 11,  48 => 12,  41 => 5,  38 => 4,  35 => 3,  31 => 6,  28 => 7,);
    }
}

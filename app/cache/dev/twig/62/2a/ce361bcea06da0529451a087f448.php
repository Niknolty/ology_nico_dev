<?php

/* OlogySocialBundle:FrontEnd:ologize_settings.html.twig */
class __TwigTemplate_622ace361bcea06da0529451a087f448 extends Twig_Template
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
        echo "<div>
    <p>You can post from anywhere using the Ology bookmarklet!</p>
    <div id=\"ologize-button-box\">
        <a title=\"Ologize Button\" href=\"javascript:void((function(){var%20s=document.createElement('script');s.setAttribute('src','http://";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "host"), "html", null, true);
        echo "/bundles/ologysocial/js/ologize_it/ologize_bookmarklet.js?v='+Math.random()*100000);s.setAttribute('type','text/javascript');s.setAttribute('charset','UTF-8');s.setAttribute('title','ologize_it');document.body.appendChild(s)})());\" onclick=\"alert('Drag this button to your Bookmarks bar'); return false;\">
            Ologize it
        </a>
    </div>
    <p class='text-center'>Drag this button to your Bookmarks bar.</p>
    <p>Want to install the Ologize button in Chrome?</p>
    <ol>
        <li>Bring up your Bookmarks by clicking the <strong>Wrench Icon > Bookmarks > Show bookmarks bar</strong></li>
        <li>Drag the “Ologize it” button to your Bookmarks Bar</li>
        <li>If you see a cool picture or interesting story online, push the Ologize button to share it on Ology.</li>
    </ol>
    <p>The Ologize button allows you to take the images and articles you like from other websites and quickly post them on Ology. And don’t worry. We give credit where credit is due. When you ologize from another website, we always copy the source link so everyone knows where to find the original post.</p>
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:ologize_settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 44,  112 => 26,  118 => 36,  106 => 34,  157 => 41,  232 => 67,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 43,  147 => 35,  105 => 34,  85 => 19,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 94,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 81,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  66 => 19,  98 => 29,  166 => 43,  160 => 47,  154 => 36,  143 => 54,  138 => 38,  101 => 33,  36 => 8,  65 => 14,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 70,  245 => 84,  241 => 82,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 77,  217 => 71,  214 => 63,  203 => 72,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 44,  114 => 27,  83 => 24,  76 => 19,  72 => 21,  68 => 19,  64 => 18,  56 => 10,  21 => 3,  209 => 74,  205 => 82,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 40,  152 => 58,  148 => 43,  145 => 56,  141 => 41,  134 => 39,  132 => 34,  127 => 30,  123 => 44,  109 => 37,  93 => 31,  90 => 26,  54 => 17,  133 => 31,  124 => 48,  111 => 31,  80 => 27,  60 => 15,  61 => 23,  52 => 21,  45 => 30,  34 => 6,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 40,  193 => 79,  190 => 60,  188 => 77,  185 => 46,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 39,  137 => 40,  126 => 43,  120 => 35,  117 => 28,  103 => 33,  74 => 20,  47 => 13,  32 => 4,  26 => 2,  97 => 21,  95 => 37,  88 => 24,  78 => 21,  71 => 17,  22 => 4,  25 => 9,  42 => 14,  40 => 7,  23 => 3,  17 => 1,  92 => 27,  86 => 24,  79 => 18,  29 => 3,  24 => 5,  19 => 2,  69 => 15,  63 => 17,  58 => 10,  49 => 10,  43 => 12,  37 => 14,  20 => 2,  139 => 32,  131 => 40,  128 => 43,  125 => 42,  121 => 29,  115 => 39,  107 => 27,  99 => 32,  96 => 29,  91 => 20,  82 => 20,  77 => 27,  75 => 17,  57 => 13,  50 => 16,  46 => 15,  44 => 8,  39 => 8,  33 => 5,  30 => 4,  27 => 4,  135 => 52,  129 => 50,  122 => 37,  116 => 42,  113 => 31,  108 => 24,  104 => 42,  102 => 41,  94 => 28,  89 => 30,  87 => 33,  84 => 32,  81 => 28,  73 => 26,  70 => 20,  67 => 18,  62 => 9,  59 => 16,  55 => 22,  51 => 14,  48 => 20,  41 => 7,  38 => 7,  35 => 7,  31 => 9,  28 => 5,);
    }
}

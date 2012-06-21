<?php

/* OlogySocialBundle:FrontEnd:sitemap_page.html.twig */
class __TwigTemplate_127bd0081ebd5dc034d7df06e7f0d1be extends Twig_Template
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
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">
    ";
        // line 3
        if (array_key_exists("main_page", $context)) {
            // line 4
            echo "    <url>
        <loc>";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "main_page"), "loc"), "html", null, true);
            echo "</loc>
        <changefreq>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "main_page"), "changefreq"), "html", null, true);
            echo "</changefreq>
        <priority>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "main_page"), "priority"), "html", null, true);
            echo "</priority>
    </url>
    ";
        }
        // line 9
        echo "    
    ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 11
            echo "        <url>
            <loc>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "loc"), "html", null, true);
            echo "</loc>
            ";
            // line 13
            if ($this->getAttribute($this->getContext($context, "post", true), "lastmod", array(), "any", true, true)) {
                // line 14
                echo "            <lastmod>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "lastmod"), "html", null, true);
                echo "</lastmod>
            ";
            }
            // line 16
            echo "            <changefreq>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "changefreq"), "html", null, true);
            echo "</changefreq>
            <priority>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "priority"), "html", null, true);
            echo "</priority>
        </url>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "</urlset>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:sitemap_page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 105,  262 => 101,  198 => 71,  334 => 119,  321 => 114,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 107,  291 => 104,  261 => 98,  252 => 117,  234 => 103,  223 => 87,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 108,  287 => 102,  279 => 84,  226 => 88,  149 => 41,  136 => 40,  100 => 27,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 68,  168 => 64,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 67,  183 => 75,  181 => 65,  163 => 56,  140 => 63,  170 => 70,  112 => 48,  118 => 34,  106 => 40,  157 => 44,  232 => 88,  228 => 86,  220 => 86,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 60,  105 => 34,  85 => 32,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 103,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 49,  119 => 49,  110 => 36,  53 => 10,  66 => 34,  98 => 37,  166 => 60,  160 => 66,  154 => 50,  143 => 42,  138 => 46,  101 => 25,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 83,  274 => 104,  257 => 100,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 89,  225 => 100,  221 => 84,  217 => 85,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  114 => 51,  83 => 37,  76 => 20,  72 => 19,  68 => 20,  64 => 21,  56 => 14,  21 => 3,  209 => 79,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 42,  148 => 67,  145 => 66,  141 => 58,  134 => 45,  132 => 55,  127 => 34,  123 => 49,  109 => 40,  93 => 29,  90 => 24,  54 => 13,  133 => 31,  124 => 33,  111 => 48,  80 => 27,  60 => 18,  61 => 17,  52 => 15,  45 => 12,  34 => 7,  224 => 65,  215 => 90,  211 => 80,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 68,  188 => 53,  185 => 67,  179 => 65,  177 => 64,  171 => 60,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 48,  142 => 47,  137 => 37,  126 => 43,  120 => 46,  117 => 46,  103 => 45,  74 => 39,  47 => 11,  32 => 6,  26 => 5,  97 => 40,  95 => 41,  88 => 35,  78 => 26,  71 => 18,  22 => 3,  25 => 7,  42 => 6,  40 => 9,  23 => 4,  17 => 1,  92 => 34,  86 => 38,  79 => 31,  29 => 2,  24 => 3,  19 => 2,  69 => 22,  63 => 19,  58 => 17,  49 => 13,  43 => 10,  37 => 4,  20 => 2,  139 => 41,  131 => 37,  128 => 36,  125 => 36,  121 => 29,  115 => 38,  107 => 47,  99 => 26,  96 => 35,  91 => 35,  82 => 32,  77 => 35,  75 => 34,  57 => 15,  50 => 12,  46 => 11,  44 => 7,  39 => 5,  33 => 5,  30 => 6,  27 => 4,  135 => 50,  129 => 35,  122 => 42,  116 => 30,  113 => 32,  108 => 36,  104 => 35,  102 => 34,  94 => 26,  89 => 30,  87 => 33,  84 => 32,  81 => 41,  73 => 24,  70 => 23,  67 => 17,  62 => 16,  59 => 24,  55 => 11,  51 => 19,  48 => 9,  41 => 5,  38 => 4,  35 => 3,  31 => 8,  28 => 2,);
    }
}

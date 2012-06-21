<?php

/* OlogySocialBundle:FrontEnd:stash_preview.html.twig */
class __TwigTemplate_35160ec815618c5113167fb615821e58 extends Twig_Template
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
        echo "<div class=\"stash-preview\">
    ";
        // line 2
        if (($this->getContext($context, "loggedIn") && ($this->getContext($context, "profileId") == $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "id")))) {
            // line 3
            echo "    <div class=\"stash-delete\"><a class=\"stash-delete-link\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stash_delete", array("stashId" => $this->getAttribute($this->getContext($context, "stash"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/close_button.png"), "html", null, true);
            echo "\"/></a></div>
    ";
        }
        // line 5
        echo "    <div class=\"stash-name-overlay\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_stash", array("id" => $this->getAttribute($this->getContext($context, "stash"), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stash"), "name"), "html", null, true);
        echo "</a></div>
    <div class=\"stash-preview-post stash-ul\">";
        // line 6
        if (twig_in_filter(0, twig_get_array_keys_filter($this->getAttribute($this->getContext($context, "stash"), "posts")))) {
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "posts"), 0, array(), "array"), "imageUrl"))), "html", null, true);
            echo "\" height=\"100px\" width=\"100px\" />";
        }
        echo "</div>
    <div class=\"stash-preview-post stash-ur\">";
        // line 7
        if (twig_in_filter(2, twig_get_array_keys_filter($this->getAttribute($this->getContext($context, "stash"), "posts")))) {
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "posts"), 2, array(), "array"), "imageUrl"))), "html", null, true);
            echo "\" height=\"100px\" width=\"100px\" />";
        }
        echo "</div>
    <div class=\"stash-preview-post stash-bl\">";
        // line 8
        if (twig_in_filter(3, twig_get_array_keys_filter($this->getAttribute($this->getContext($context, "stash"), "posts")))) {
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "posts"), 3, array(), "array"), "imageUrl"))), "html", null, true);
            echo "\" height=\"100px\" width=\"100px\" />";
        }
        echo "</div>
    <div class=\"stash-preview-post stash-br\">";
        // line 9
        if (twig_in_filter(1, twig_get_array_keys_filter($this->getAttribute($this->getContext($context, "stash"), "posts")))) {
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "posts"), 1, array(), "array"), "imageUrl"))), "html", null, true);
            echo "\" height=\"100px\" width=\"100px\" />";
        }
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:stash_preview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 111,  246 => 91,  242 => 89,  173 => 64,  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 106,  262 => 101,  198 => 72,  334 => 119,  321 => 124,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 117,  234 => 86,  223 => 83,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 118,  304 => 94,  300 => 142,  290 => 108,  287 => 109,  279 => 84,  226 => 84,  149 => 68,  136 => 49,  100 => 40,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 70,  168 => 80,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 98,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 66,  183 => 75,  181 => 65,  163 => 60,  140 => 50,  170 => 70,  112 => 41,  118 => 34,  106 => 37,  157 => 58,  232 => 88,  228 => 86,  220 => 86,  210 => 76,  207 => 61,  159 => 45,  151 => 47,  147 => 55,  105 => 35,  85 => 27,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 131,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 112,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 80,  206 => 78,  197 => 54,  187 => 74,  184 => 80,  182 => 67,  174 => 71,  150 => 49,  119 => 45,  110 => 36,  53 => 8,  66 => 34,  98 => 37,  166 => 61,  160 => 58,  154 => 57,  143 => 64,  138 => 46,  101 => 25,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 105,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 84,  225 => 100,  221 => 84,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  114 => 51,  83 => 26,  76 => 20,  72 => 22,  68 => 20,  64 => 20,  56 => 18,  21 => 3,  209 => 79,  205 => 81,  196 => 71,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 69,  148 => 54,  145 => 66,  141 => 58,  134 => 45,  132 => 50,  127 => 53,  123 => 49,  109 => 40,  93 => 29,  90 => 24,  54 => 17,  133 => 48,  124 => 44,  111 => 37,  80 => 27,  60 => 20,  61 => 9,  52 => 15,  45 => 7,  34 => 5,  224 => 65,  215 => 81,  211 => 80,  204 => 74,  200 => 75,  195 => 68,  193 => 67,  190 => 68,  188 => 69,  185 => 67,  179 => 64,  177 => 64,  171 => 62,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 48,  142 => 53,  137 => 37,  126 => 43,  120 => 46,  117 => 39,  103 => 34,  74 => 39,  47 => 11,  32 => 6,  26 => 5,  97 => 31,  95 => 41,  88 => 28,  78 => 26,  71 => 18,  22 => 3,  25 => 7,  42 => 11,  40 => 9,  23 => 4,  17 => 1,  92 => 34,  86 => 38,  79 => 24,  29 => 2,  24 => 3,  19 => 2,  69 => 21,  63 => 19,  58 => 19,  49 => 13,  43 => 10,  37 => 6,  20 => 2,  139 => 62,  131 => 37,  128 => 49,  125 => 48,  121 => 46,  115 => 46,  107 => 47,  99 => 26,  96 => 39,  91 => 36,  82 => 33,  77 => 31,  75 => 34,  57 => 15,  50 => 16,  46 => 11,  44 => 9,  39 => 7,  33 => 5,  30 => 5,  27 => 4,  135 => 51,  129 => 35,  122 => 42,  116 => 30,  113 => 32,  108 => 36,  104 => 35,  102 => 34,  94 => 30,  89 => 30,  87 => 35,  84 => 32,  81 => 41,  73 => 24,  70 => 26,  67 => 17,  62 => 16,  59 => 19,  55 => 11,  51 => 19,  48 => 11,  41 => 5,  38 => 10,  35 => 3,  31 => 8,  28 => 3,);
    }
}

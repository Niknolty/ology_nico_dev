<?php

/* OlogySocialBundle:FrontEnd:inline_comments.html.twig */
class __TwigTemplate_bffaea80d28e550122f57a38ddf784eb extends Twig_Template
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
        echo "<div class=\"inline-comments\">
";
        // line 2
        $context["nbComments"] = "0";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 4
            echo "   ";
            $context["nbComments"] = ($this->getContext($context, "nbComments") + 1);
            echo " 
    <div class=\"post-card-comment\"> <a name=\"comments\">
        <div class=\"user-img\">
            <a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">
                <img src=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
            echo "\">
            </a>
        </div>
        <p class=\"commentp\"><a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
            echo "</a> 
        ";
            // line 12
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content")) <= 140)) {
                // line 13
                echo "            ";
                echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
                echo "
        ";
            } else {
                // line 15
                echo "            ";
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), 140, false, "..."), "html", null, true);
                echo " 
        ";
            }
            // line 17
            echo "        </p>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "
";
        // line 21
        if (($this->getContext($context, "nbComments") > 2)) {
            // line 22
            echo "    <div class=\"hide-postcard-comments\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post_ajax_comments", array("postId" => $this->getContext($context, "postId"), "slug" => $this->getContext($context, "postSlug"))), "html", null, true);
            echo "\">
        hide comments
    </div>
";
        }
        // line 25
        echo "  
</div>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:inline_comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  339 => 164,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 143,  291 => 140,  261 => 119,  252 => 117,  234 => 103,  223 => 99,  348 => 135,  340 => 133,  336 => 132,  332 => 131,  327 => 130,  324 => 129,  318 => 125,  315 => 124,  309 => 121,  304 => 119,  300 => 142,  290 => 112,  287 => 111,  279 => 133,  226 => 86,  149 => 63,  136 => 40,  125 => 36,  115 => 31,  100 => 31,  130 => 38,  251 => 82,  247 => 81,  238 => 90,  194 => 68,  191 => 67,  168 => 64,  128 => 45,  294 => 114,  286 => 138,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 92,  255 => 118,  243 => 80,  208 => 92,  202 => 89,  199 => 163,  186 => 66,  183 => 65,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  121 => 29,  112 => 26,  118 => 41,  106 => 29,  157 => 41,  232 => 88,  228 => 6,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 171,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 89,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 79,  187 => 74,  184 => 80,  182 => 66,  174 => 63,  150 => 57,  119 => 49,  110 => 36,  53 => 11,  91 => 34,  66 => 20,  98 => 29,  96 => 26,  166 => 54,  160 => 47,  154 => 36,  143 => 54,  138 => 54,  101 => 25,  58 => 13,  36 => 4,  65 => 24,  18 => 1,  352 => 117,  347 => 160,  344 => 134,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 84,  241 => 91,  237 => 77,  233 => 76,  229 => 102,  225 => 100,  221 => 78,  217 => 72,  214 => 76,  203 => 71,  180 => 22,  175 => 8,  169 => 74,  167 => 61,  164 => 60,  155 => 49,  139 => 41,  114 => 51,  83 => 24,  76 => 22,  72 => 19,  68 => 19,  64 => 14,  56 => 12,  21 => 3,  209 => 85,  205 => 72,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 75,  165 => 63,  161 => 69,  152 => 58,  148 => 56,  145 => 62,  141 => 60,  134 => 62,  132 => 43,  127 => 37,  123 => 51,  109 => 37,  93 => 39,  90 => 24,  54 => 12,  133 => 31,  124 => 44,  111 => 45,  107 => 27,  80 => 27,  63 => 17,  60 => 22,  69 => 24,  61 => 21,  52 => 10,  50 => 13,  45 => 11,  43 => 11,  34 => 3,  224 => 65,  215 => 90,  211 => 88,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 66,  185 => 73,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 50,  156 => 49,  153 => 64,  146 => 55,  142 => 42,  137 => 44,  131 => 40,  126 => 57,  120 => 33,  117 => 48,  103 => 40,  99 => 27,  74 => 21,  47 => 10,  32 => 6,  39 => 5,  26 => 4,  97 => 40,  95 => 35,  88 => 28,  82 => 23,  78 => 26,  75 => 27,  71 => 20,  22 => 3,  44 => 7,  30 => 9,  20 => 2,  25 => 4,  49 => 12,  42 => 6,  40 => 7,  23 => 5,  27 => 2,  17 => 1,  92 => 29,  86 => 23,  79 => 28,  77 => 20,  57 => 15,  46 => 7,  37 => 8,  33 => 7,  29 => 5,  24 => 6,  19 => 2,  135 => 57,  129 => 54,  122 => 56,  116 => 39,  113 => 31,  108 => 36,  104 => 28,  102 => 41,  94 => 25,  89 => 30,  87 => 33,  84 => 25,  81 => 21,  73 => 20,  70 => 20,  67 => 22,  62 => 15,  59 => 14,  55 => 14,  51 => 13,  48 => 8,  41 => 5,  38 => 4,  35 => 3,  31 => 6,  28 => 2,);
    }
}

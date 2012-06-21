<?php

/* OlogySocialBundle:FrontEnd:most_viewed_post.html.twig */
class __TwigTemplate_9df9cbf12905c89d5cb75f4b3b6deda9 extends Twig_Template
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
        echo "<div id=\"most-viewed-container\">
    <h2>Most Viewed in News:</h2>
    ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "mostViewedPosts"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["mostViewedPost"]) {
            // line 4
            echo "    <div class=\"most-viewed-item\">
        <div class=\"most-viewed-item-number\">";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo ".</div>
        <div class=\"most-viewed-item-image\"><img src=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getContext($context, "mostViewedPost"), "imageUrl"))), "html", null, true);
            echo "\" height=\"60\" width=\"60\"/></div>
        <div class=\"most-viewed-item-text\"><a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "mostViewedPost"), "id"), "slug" => $this->getAttribute($this->getContext($context, "mostViewedPost"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "mostViewedPost"), "htmlTitle"), "html", null, true);
            echo "</a>
            ";
            // line 8
            if (($this->getAttribute($this->getContext($context, "mostViewedPost"), "timesCommented") > 0)) {
                // line 9
                echo "                 <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "mostViewedPost"), "id"), "slug" => $this->getAttribute($this->getContext($context, "mostViewedPost"), "slug"))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment.png"), "html", null, true);
                echo "\" style=\"vertical-align: text-top; margin-left: 5px;\"/> (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "mostViewedPost"), "timesCommented"), "html", null, true);
                echo ")</a>
            ";
            }
            // line 11
            echo "        </div>
    </div><div style=\"clear:both;\"></div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mostViewedPost'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "        
    <div style=\"clear:both;\"></div>
</div>

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:most_viewed_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 111,  246 => 91,  242 => 89,  173 => 64,  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 106,  262 => 101,  198 => 72,  334 => 119,  321 => 124,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 117,  234 => 86,  223 => 83,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 118,  304 => 94,  300 => 142,  290 => 108,  287 => 109,  279 => 84,  226 => 84,  149 => 68,  136 => 49,  125 => 48,  115 => 46,  100 => 40,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 70,  168 => 80,  128 => 49,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 98,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 66,  183 => 75,  181 => 65,  163 => 60,  140 => 50,  170 => 70,  121 => 46,  112 => 41,  118 => 34,  106 => 37,  157 => 58,  232 => 88,  228 => 86,  220 => 86,  210 => 76,  207 => 61,  159 => 45,  151 => 47,  147 => 55,  105 => 35,  85 => 27,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 131,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 112,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 80,  206 => 78,  197 => 54,  187 => 74,  184 => 80,  182 => 67,  174 => 71,  150 => 49,  119 => 45,  110 => 36,  53 => 8,  91 => 36,  66 => 34,  98 => 37,  96 => 39,  166 => 61,  160 => 58,  154 => 57,  143 => 64,  138 => 46,  101 => 25,  58 => 19,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 105,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 84,  225 => 100,  221 => 84,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  139 => 62,  114 => 51,  83 => 14,  76 => 20,  72 => 22,  68 => 20,  64 => 20,  56 => 18,  21 => 3,  209 => 79,  205 => 81,  196 => 71,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 69,  148 => 54,  145 => 66,  141 => 58,  134 => 45,  132 => 50,  127 => 53,  123 => 49,  109 => 40,  93 => 29,  90 => 24,  54 => 17,  133 => 48,  124 => 44,  111 => 37,  107 => 47,  80 => 27,  63 => 19,  60 => 20,  69 => 21,  61 => 9,  52 => 15,  50 => 16,  45 => 6,  43 => 10,  34 => 5,  224 => 65,  215 => 81,  211 => 80,  204 => 74,  200 => 75,  195 => 68,  193 => 67,  190 => 68,  188 => 69,  185 => 67,  179 => 64,  177 => 64,  171 => 62,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 48,  142 => 53,  137 => 37,  131 => 37,  126 => 43,  120 => 46,  117 => 39,  103 => 34,  99 => 26,  74 => 39,  47 => 11,  32 => 6,  39 => 7,  26 => 5,  97 => 31,  95 => 41,  88 => 28,  82 => 33,  78 => 26,  75 => 34,  71 => 18,  22 => 3,  44 => 9,  30 => 5,  20 => 2,  25 => 7,  49 => 7,  42 => 11,  40 => 9,  23 => 4,  27 => 4,  17 => 1,  92 => 34,  86 => 38,  79 => 24,  77 => 31,  57 => 9,  46 => 11,  37 => 6,  33 => 5,  29 => 2,  24 => 3,  19 => 2,  135 => 51,  129 => 35,  122 => 42,  116 => 30,  113 => 32,  108 => 36,  104 => 35,  102 => 34,  94 => 30,  89 => 30,  87 => 35,  84 => 32,  81 => 41,  73 => 24,  70 => 26,  67 => 11,  62 => 16,  59 => 19,  55 => 8,  51 => 19,  48 => 11,  41 => 5,  38 => 4,  35 => 3,  31 => 8,  28 => 3,);
    }
}

<?php

/* OlogySocialBundle:FrontEnd:explore.html.twig */
class __TwigTemplate_8e9949d5d6987df8e3105f85b5f25a3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'pagescripts' => array($this, 'block_pagescripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OlogySocialBundle:FrontEnd:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Explore | Ology";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "  <div class=\"header-explore\">
   <h2>Find things you love by selecting a category.</h2>
  </div>


    <div id=\"filters-explore\">
      ";
        // line 12
        if (($this->getContext($context, "loggedIn") && ($this->getAttribute($this->getContext($context, "user"), "FbId") != null))) {
            // line 13
            echo "      <a href=\"#\" data-filter=\".you\" class=\"you\">";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))));
            echo "</a>

      ";
        }
        // line 16
        echo "      <a href=\"#\" data-filter=\".5\" class=\"art\"></a>
      <a href=\"#\" data-filter=\".6\" class=\"business\"></a>
      <a href=\"#\" data-filter=\".7\" class=\"celebs\"></a>
      <a href=\"#\" data-filter=\".8\" class=\"fashion\"></a>
      <a href=\"#\" data-filter=\".9\" class=\"film\"></a>
      <a href=\"#\" data-filter=\".10\" class=\"fitness\"></a>
      <a href=\"#\" data-filter=\".11\" class=\"food\"></a>
      <a href=\"#\" data-filter=\".3\" class=\"geek\"></a>
      <a href=\"#\" data-filter=\".4\" class=\"humor\"></a>
      <a href=\"#\" data-filter=\".12\" class=\"lit\"></a>
      <a href=\"#\" data-filter=\".1\" class=\"music\"></a>
      <a href=\"#\" data-filter=\".2\" class=\"news\"></a>
      <a href=\"#\" data-filter=\".15\" class=\"other\"></a>
      <a href=\"#\" data-filter=\".13\" class=\"politics\"></a>
      <a href=\"#\" data-filter=\".21\" class=\"religion\"></a>
      <a href=\"#\" data-filter=\".20\" class=\"romance\"></a>
      <a href=\"#\" data-filter=\".17\" class=\"sports\"></a>
      <a href=\"#\" data-filter=\".18\" class=\"travel\"></a>
      <a href=\"#\" data-filter=\".14\" class=\"tv\"></a>
      <input id=\"cat-filter\" type=\"hidden\" >
    </div>


  <div id=\"container-splash\">

    ";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "ologies"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
            // line 42
            echo "      <div class=\"post\">
        <div class=\"post-content\">
          <div class=\"post-cat-info\">
            <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\">
              ";
            // line 46
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_medium_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))));
            echo "
            </a>
            <h2><a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
            echo "</a></h2>
            ";
            // line 49
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "ologylabels")) > 0)) {
                // line 50
                echo "               <span class=\"category-small\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "ologylabels"), 0, array(), "array"), "label"), "name"), "html", null, true);
                echo "</span>
            ";
            }
            // line 52
            echo "          </div>

        ";
            // line 54
            if ($this->getContext($context, "loggedIn")) {
                // line 55
                echo "          ";
                if ($this->getAttribute($this->getContext($context, "memberships", true), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array", true, true)) {
                    // line 56
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                    echo "\" class=\"unfollow\"></a>
          ";
                } else {
                    // line 58
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                    echo "\" class=\"follow\"></a>
          ";
                }
                // line 60
                echo "        ";
            }
            // line 61
            echo "          <div class=\"explore-description\">
            <p>";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
            echo "</p>
          </div>

          <div class=\"founder-section\"><p>
          <a href=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"))), "html", null, true);
            echo "\">
            ";
            // line 67
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_medium_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "imageUrl"))));
            echo "
          </a>
            Founded by<br />
            <h3><a href=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"))), "html", null, true);
            echo "\">
              ";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstname"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastname"), "html", null, true);
            echo "
            </a></h3>
          </p>
          </div>
          ";
            // line 75
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:ology_stats.html.twig")->display(array_merge($context, array("stats" => $this->getAttribute($this->getContext($context, "statss"), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array"))));
            // line 76
            echo "      </div>
    </div>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 79
        echo "
    <div>
      <a href=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore_recent_pag", array("offset" => 1, "n" => $this->getContext($context, "n"))), "html", null, true);
        echo "\" class=\"navigation\">NEXT</a>
    </div>
  </div>

  ";
    }

    // line 88
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 92
        echo "  <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/splashscroll.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:explore.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 115,  353 => 113,  326 => 102,  314 => 99,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 81,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 143,  291 => 140,  261 => 79,  252 => 117,  234 => 103,  223 => 99,  348 => 135,  340 => 133,  336 => 106,  332 => 131,  327 => 130,  324 => 101,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 87,  287 => 111,  279 => 84,  226 => 86,  149 => 41,  136 => 40,  100 => 31,  130 => 54,  251 => 82,  247 => 81,  238 => 90,  194 => 68,  191 => 67,  168 => 64,  294 => 114,  286 => 85,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 163,  186 => 66,  183 => 75,  181 => 64,  163 => 53,  140 => 45,  170 => 70,  112 => 48,  118 => 49,  106 => 29,  157 => 44,  232 => 88,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 60,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 111,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 100,  307 => 95,  299 => 102,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 61,  119 => 49,  110 => 36,  53 => 11,  66 => 34,  98 => 42,  166 => 45,  160 => 66,  154 => 43,  143 => 54,  138 => 54,  101 => 25,  36 => 9,  65 => 16,  18 => 1,  352 => 117,  347 => 160,  344 => 110,  282 => 99,  276 => 83,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 73,  241 => 91,  237 => 69,  233 => 76,  229 => 102,  225 => 100,  221 => 78,  217 => 92,  214 => 88,  203 => 71,  180 => 50,  175 => 8,  169 => 74,  167 => 61,  164 => 67,  155 => 49,  114 => 51,  83 => 24,  76 => 20,  72 => 19,  68 => 17,  64 => 14,  56 => 14,  21 => 3,  209 => 85,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 75,  165 => 63,  161 => 69,  152 => 42,  148 => 56,  145 => 39,  141 => 58,  134 => 62,  132 => 55,  127 => 34,  123 => 51,  109 => 37,  93 => 39,  90 => 24,  54 => 16,  133 => 31,  124 => 33,  111 => 45,  80 => 27,  60 => 15,  61 => 21,  52 => 13,  45 => 12,  34 => 5,  224 => 65,  215 => 90,  211 => 88,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 53,  185 => 76,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 50,  156 => 49,  153 => 62,  146 => 55,  142 => 42,  137 => 37,  126 => 52,  120 => 50,  117 => 48,  103 => 45,  74 => 39,  47 => 13,  32 => 8,  26 => 4,  97 => 40,  95 => 35,  88 => 22,  78 => 26,  71 => 18,  22 => 3,  25 => 4,  42 => 6,  40 => 10,  23 => 3,  17 => 1,  92 => 29,  86 => 23,  79 => 21,  29 => 6,  24 => 6,  19 => 2,  69 => 24,  63 => 17,  58 => 29,  49 => 12,  43 => 10,  37 => 6,  20 => 2,  139 => 41,  131 => 40,  128 => 45,  125 => 36,  121 => 29,  115 => 31,  107 => 46,  99 => 26,  96 => 25,  91 => 34,  82 => 23,  77 => 20,  75 => 27,  57 => 14,  50 => 13,  46 => 7,  44 => 11,  39 => 5,  33 => 7,  30 => 9,  27 => 2,  135 => 56,  129 => 35,  122 => 56,  116 => 30,  113 => 31,  108 => 36,  104 => 28,  102 => 27,  94 => 25,  89 => 30,  87 => 33,  84 => 25,  81 => 41,  73 => 20,  70 => 20,  67 => 22,  62 => 15,  59 => 14,  55 => 13,  51 => 11,  48 => 12,  41 => 5,  38 => 4,  35 => 3,  31 => 6,  28 => 3,);
    }
}

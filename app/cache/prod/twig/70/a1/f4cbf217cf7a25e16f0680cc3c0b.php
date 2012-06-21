<?php

/* OlogySocialBundle:FrontEnd:onboarding_step2.html.twig */
class __TwigTemplate_70a1f4cbf217cf7a25e16f0680cc3c0b extends Twig_Template
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Onboarding | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
<div id=\"container\">
    <div id=\"onboarding-profile\">
        <h1>Hey ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "lastName"), "html", null, true);
        echo "!</h1>
        <h1>Congrats, you're in!</h1>
        <h2>Welcome to Ology.</h2>
        <h3>What's an ology?</h3>
        <p>
            An ology is an interest, a passion.<br>
            Stay in-the-know about your ologies by clicking the \"Follow\" buttons.    
        </p>
        <div class=\"profile-user\" style=\"background-image:url('";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_large_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
        echo "');\">
        </div>
        <span>
            Is this you? You can upload a new picture here.
        </span>
        <div class=\"upload-button\">
            Upload New Photo
        </div>
        <form action=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_onboarding", array("step" => 2)), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo " id=\"onboarding-form\">
            ";
        // line 24
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "imageFile"));
        echo "
            <input type=\"submit\" value=\"Update\" id=\"onboarding-submit\"/>
        </form>
    </div>
    <div id=\"onboarding-main\">
        <div id=\"onboarding-nav-bar\">
            <div class=\"ology-circle\">Step 1</div>
            <div class=\"ology-circle selected\">Step 2</div>
            <div class=\"ology-circle disabled\">Step 3</div>
            <div id=\"next-button\" class=\"disabled\">
                <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_onboarding", array("step" => 3)), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/button_next.png"), "html", null, true);
        echo "\"></img>
                </a>
            </div>
        </div>
        <p>
            Click \"Follow\" to get the latest news and conversation from each ology:
        </p>
        <div id=\"onboarding-ologies\">
        ";
        // line 43
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
            // line 44
            echo "            ";
            if ($this->getAttribute($this->getContext($context, "ology", true), "imageLogo", array(), "any", true, true)) {
                echo " ";
                // line 45
                echo "                ";
                $this->env->loadTemplate("OlogySocialBundle:Ology:core_ology.html.twig")->display(array_merge($context, array("coreOlogy" => $this->getContext($context, "ology"), "subscriptions" => $this->getContext($context, "subscriptions"))));
                // line 46
                echo "            ";
            } else {
                // line 47
                echo "            <div class=\"post\">
                <div class=\"post-content\">
                    <div class=\"post-cat-info\">
                        <a href=\"";
                // line 50
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
                echo "\">
                        ";
                // line 51
                echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_medium_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))));
                echo "
                        </a>
                        <h2><a href=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
                echo "</a></h2>
                        ";
                // line 54
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "ologylabels")) > 0)) {
                    // line 55
                    echo "                            <span class=\"category-small\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "ologylabels"), 0, array(), "array"), "label"), "name"), "html", null, true);
                    echo "</span>
                        ";
                }
                // line 57
                echo "                    </div>

                    ";
                // line 59
                if ($this->getAttribute($this->getContext($context, "memberships", true), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array", true, true)) {
                    // line 60
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                    echo "\" class=\"unfollow\"></a>
                    ";
                } else {
                    // line 62
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                    echo "\" class=\"follow\"></a>
                    ";
                }
                // line 64
                echo "                        
                    <div class=\"explore-description\">
                        <p>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
                echo "</p>
                    </div>
                </div>
            </div>
            ";
            }
            // line 71
            echo "        ";
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
        // line 72
        echo "            <div>
                <a href=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore_recent_pag", array("offset" => 1, "n" => 10)), "html", null, true);
        echo "\" class=\"navigation\">NEXT</a>
            </div>
        </div>
    </div>
</div>

";
    }

    // line 80
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 84
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/splashscroll.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script type=\"text/javascript\">
    ";
        // line 87
        echo "    if (\$('.unfollow').size() > 0){
        \$(\"#next-button\").removeClass(\"disabled\");
    }

    \$(\".unfollow\").live( 'click', function(){
        if (\$('.unfollow').size() <= 1){
            \$(\"#next-button\").addClass(\"disabled\");
        }
    });

    \$(\".follow\").live( 'click', function(){
        \$(\"#next-button\").removeClass(\"disabled\");
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:onboarding_step2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 156,  434 => 154,  432 => 153,  417 => 145,  408 => 141,  404 => 140,  401 => 139,  398 => 138,  389 => 134,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 117,  239 => 82,  231 => 79,  674 => 231,  670 => 230,  665 => 228,  654 => 220,  650 => 218,  647 => 217,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 206,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 238,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 182,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 143,  464 => 166,  461 => 141,  458 => 162,  455 => 139,  452 => 160,  450 => 137,  439 => 133,  433 => 131,  431 => 130,  413 => 122,  410 => 142,  406 => 119,  392 => 118,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 89,  244 => 84,  236 => 69,  293 => 99,  246 => 72,  242 => 83,  173 => 64,  354 => 120,  319 => 122,  311 => 97,  303 => 115,  278 => 106,  262 => 101,  198 => 54,  334 => 119,  321 => 107,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 87,  201 => 79,  426 => 149,  415 => 123,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 123,  357 => 160,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 111,  230 => 67,  216 => 84,  213 => 80,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 86,  234 => 86,  223 => 77,  348 => 118,  340 => 129,  336 => 128,  332 => 110,  327 => 126,  324 => 108,  318 => 106,  315 => 124,  309 => 96,  304 => 102,  300 => 142,  290 => 98,  287 => 109,  279 => 95,  226 => 78,  149 => 55,  136 => 51,  125 => 41,  115 => 46,  100 => 43,  130 => 44,  251 => 94,  247 => 85,  238 => 70,  194 => 52,  191 => 70,  168 => 58,  128 => 49,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 85,  268 => 92,  263 => 90,  255 => 76,  243 => 80,  208 => 92,  202 => 73,  199 => 72,  186 => 69,  183 => 75,  181 => 63,  163 => 57,  140 => 53,  170 => 30,  121 => 45,  112 => 35,  118 => 37,  106 => 33,  157 => 58,  232 => 109,  228 => 66,  220 => 63,  210 => 72,  207 => 61,  159 => 59,  151 => 27,  147 => 54,  105 => 25,  85 => 34,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 148,  476 => 147,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 134,  442 => 145,  438 => 143,  435 => 142,  427 => 129,  421 => 125,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 117,  373 => 128,  367 => 119,  364 => 116,  358 => 113,  355 => 112,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 131,  330 => 104,  328 => 103,  325 => 102,  323 => 108,  320 => 100,  317 => 112,  307 => 103,  299 => 95,  296 => 100,  292 => 99,  289 => 92,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 74,  248 => 85,  235 => 68,  227 => 79,  218 => 75,  212 => 60,  206 => 78,  197 => 68,  187 => 74,  184 => 64,  182 => 67,  174 => 64,  150 => 49,  119 => 45,  110 => 48,  53 => 8,  91 => 39,  66 => 23,  98 => 37,  96 => 41,  166 => 61,  160 => 56,  154 => 28,  143 => 48,  138 => 46,  101 => 31,  58 => 19,  36 => 5,  65 => 21,  18 => 1,  352 => 119,  347 => 160,  344 => 110,  282 => 96,  276 => 94,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 68,  229 => 84,  225 => 65,  221 => 76,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 44,  169 => 59,  167 => 62,  164 => 67,  155 => 57,  139 => 62,  114 => 28,  83 => 15,  76 => 20,  72 => 24,  68 => 22,  64 => 15,  56 => 15,  21 => 2,  209 => 59,  205 => 71,  196 => 71,  192 => 51,  189 => 65,  178 => 69,  176 => 61,  165 => 57,  161 => 60,  152 => 51,  148 => 54,  145 => 66,  141 => 53,  134 => 51,  132 => 50,  127 => 47,  123 => 40,  109 => 40,  93 => 29,  90 => 18,  54 => 14,  133 => 48,  124 => 46,  111 => 37,  107 => 47,  80 => 27,  63 => 9,  60 => 17,  69 => 21,  61 => 9,  52 => 10,  50 => 16,  45 => 6,  43 => 10,  34 => 3,  224 => 65,  215 => 61,  211 => 80,  204 => 57,  200 => 69,  195 => 68,  193 => 67,  190 => 68,  188 => 50,  185 => 71,  179 => 62,  177 => 66,  171 => 42,  162 => 59,  158 => 55,  156 => 57,  153 => 39,  146 => 49,  142 => 36,  137 => 46,  131 => 43,  126 => 34,  120 => 22,  117 => 44,  103 => 32,  99 => 22,  74 => 20,  47 => 11,  32 => 3,  39 => 6,  26 => 3,  97 => 30,  95 => 20,  88 => 27,  82 => 33,  78 => 26,  75 => 12,  71 => 11,  22 => 3,  44 => 8,  30 => 11,  20 => 2,  25 => 7,  49 => 9,  42 => 7,  40 => 4,  23 => 5,  27 => 5,  17 => 1,  92 => 34,  86 => 16,  79 => 13,  77 => 21,  57 => 12,  46 => 11,  37 => 4,  33 => 7,  29 => 3,  24 => 2,  19 => 2,  135 => 45,  129 => 35,  122 => 42,  116 => 30,  113 => 49,  108 => 26,  104 => 35,  102 => 18,  94 => 40,  89 => 35,  87 => 35,  84 => 34,  81 => 23,  73 => 24,  70 => 26,  67 => 13,  62 => 20,  59 => 13,  55 => 15,  51 => 14,  48 => 10,  41 => 5,  38 => 17,  35 => 6,  31 => 8,  28 => 2,);
    }
}

<?php

/* OlogySocialBundle:FrontEnd:stash.html.twig */
class __TwigTemplate_234b84dc6cbf28ff4af06857c9a9614b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stash"), "name"), "html", null, true);
        echo " | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "\t

";
        // line 9
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 10
            echo "<div id='page'>
    ";
            // line 11
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:dock.html.twig")->display($context);
            // line 12
            echo "</div>
";
        }
        // line 14
        echo "
<div id=\"stash-delete-confirm\">
    Are you sure you want to remove this post from your stash?<br/><br/>
    <a href=\"#\"><span id=\"alert-confirm-button\">Yes</span></a>
    <a href=\"#\"><span id=\"alert-cancel-button\">No</span></a>
    <input type=\"hidden\" id=\"hiddenConfirmUrl\" value=\"\"/>
</div>
    
<div id=\"container\">
    <div id=\"stash-bar\">
        <div id=\"stashId\" stashId=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stash"), "id"), "html", null, true);
        echo "\"></div>
        ";
        // line 25
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 26
            echo "            ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "founder"), "id") == $this->getAttribute($this->getContext($context, "user"), "id"))) {
                // line 27
                echo "                <div id=\"edit-stash\"><b> Edit</b></div>
            ";
            }
            // line 29
            echo "        ";
        }
        // line 30
        echo "        <div id=\"stash-title\">
            <h2 id=\"editable-title\">";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stash"), "name"), "html", null, true);
        echo "</h2>
            <div id=\"stash-stats\">
                ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tags"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 34
            echo "                    ";
            echo twig_escape_filter($this->env, $this->getContext($context, "tag"), "html", null, true);
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 36
        echo "            </div>
        </div>

        <div class=\"founder-section\">
            <a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "founder"), "id"))), "html", null, true);
        echo "\">
                <img src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_large_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "founder"), "imageUrl"))), "html", null, true);
        echo "\"   />
            </a>
            Stash by<br /> 
            <a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "founder"), "id"))), "html", null, true);
        echo "\">
                ";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "founder"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "founder"), "lastName"), "html", null, true);
        echo "
            </a>
        </div>
    </div>
        
    <div id=\"ology-posts-box-ology\" style=\"width: 100%;\">
        <div id=\"posts-box-main-stash\">
                <div id=\"posts-box-stash\">
                    ";
        // line 53
        if ((twig_length_filter($this->env, $this->getContext($context, "postsStashes")) == 0)) {
            // line 54
            echo "                    <div class=\"post text\">
                        ";
            // line 55
            if ((twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")) || ($this->getAttribute($this->getContext($context, "user"), "id") != $this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "founder"), "id")))) {
                // line 56
                echo "                            <p style=\"font-size: 14px\">Awww… ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stash"), "founder"), "firstName"), "html", null, true);
                echo " has not stashed anything in ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stash"), "name"), "html", null, true);
                echo " yet.</p>
                        ";
            } else {
                // line 58
                echo "                            <p style=\"font-size: 14px\">Congrats on creating a new stash!</p>
                            <p style=\"font-size: 14px\">You can now stash stuff you like by clicking the ReOlogize button on posts.</p>
                        ";
            }
            // line 61
            echo "                    </div>
                    ";
        }
        // line 63
        echo "                        
                    ";
        // line 64
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "postsStashes"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["postStash"]) {
            // line 65
            echo "                        ";
            $context["post"] = $this->getAttribute($this->getContext($context, "postStash"), "post");
            // line 66
            echo "                        ";
            if ($this->getAttribute($this->getContext($context, "post"), "isProfessional")) {
                // line 67
                echo "                            ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"), "unStashable" => $this->getContext($context, "unStashable"), "stashId" => $this->getAttribute($this->getContext($context, "stash"), "id"))));
                // line 68
                echo "                        ";
            } else {
                // line 69
                echo "                            ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"), "unStashable" => $this->getContext($context, "unStashable"), "stashId" => $this->getAttribute($this->getContext($context, "stash"), "id"))));
                // line 70
                echo "                        ";
            }
            // line 71
            echo "                    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['postStash'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 72
        echo "                </div>   
        </div>
    </div>
</div>
";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/jquery.tagit.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
";
    }

    // line 78
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 79
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/stash.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/tag-it.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\" charset=\"utf-8\"></script>
    <script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/homescroll.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:stash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 82,  247 => 81,  238 => 79,  194 => 68,  191 => 67,  168 => 64,  128 => 45,  294 => 107,  286 => 103,  283 => 102,  280 => 101,  277 => 100,  268 => 94,  263 => 92,  255 => 83,  243 => 80,  208 => 73,  202 => 71,  199 => 70,  186 => 66,  183 => 65,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  121 => 29,  112 => 26,  118 => 41,  106 => 34,  157 => 41,  232 => 67,  228 => 6,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 99,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 78,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 69,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 11,  91 => 20,  66 => 19,  98 => 29,  96 => 29,  166 => 54,  160 => 47,  154 => 36,  143 => 54,  138 => 38,  101 => 33,  58 => 10,  36 => 3,  65 => 24,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 84,  241 => 85,  237 => 77,  233 => 76,  229 => 81,  225 => 5,  221 => 78,  217 => 72,  214 => 76,  203 => 71,  180 => 22,  175 => 8,  169 => 56,  167 => 159,  164 => 158,  155 => 49,  139 => 32,  114 => 40,  83 => 24,  76 => 19,  72 => 21,  68 => 19,  64 => 18,  56 => 21,  21 => 3,  209 => 74,  205 => 72,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 61,  152 => 58,  148 => 56,  145 => 56,  141 => 53,  134 => 39,  132 => 43,  127 => 42,  123 => 44,  109 => 37,  93 => 31,  90 => 31,  54 => 12,  133 => 31,  124 => 44,  111 => 31,  107 => 27,  80 => 27,  63 => 17,  60 => 22,  69 => 18,  61 => 23,  52 => 20,  50 => 10,  45 => 18,  43 => 12,  34 => 6,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 70,  195 => 68,  193 => 67,  190 => 60,  188 => 66,  185 => 65,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 58,  153 => 58,  146 => 55,  142 => 39,  137 => 44,  131 => 40,  126 => 43,  120 => 35,  117 => 28,  103 => 33,  99 => 34,  74 => 20,  47 => 13,  32 => 4,  39 => 4,  26 => 8,  97 => 21,  95 => 33,  88 => 24,  82 => 23,  78 => 21,  75 => 25,  71 => 24,  22 => 4,  44 => 7,  30 => 9,  20 => 2,  25 => 4,  49 => 10,  42 => 5,  40 => 7,  23 => 3,  27 => 2,  17 => 1,  92 => 27,  86 => 24,  79 => 18,  77 => 26,  57 => 13,  46 => 10,  37 => 14,  33 => 3,  29 => 2,  24 => 6,  19 => 2,  135 => 52,  129 => 50,  122 => 40,  116 => 39,  113 => 31,  108 => 36,  104 => 42,  102 => 41,  94 => 28,  89 => 30,  87 => 30,  84 => 29,  81 => 28,  73 => 20,  70 => 20,  67 => 18,  62 => 15,  59 => 14,  55 => 12,  51 => 14,  48 => 9,  41 => 8,  38 => 7,  35 => 7,  31 => 9,  28 => 5,);
    }
}

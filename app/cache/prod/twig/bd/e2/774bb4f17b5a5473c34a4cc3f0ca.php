<?php

/* OlogySocialBundle:FrontEnd:ologist-right-box.html.twig */
class __TwigTemplate_bde2774bb4f17b5a5473c34a4cc3f0ca extends Twig_Template
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
        echo "<div class=\"ology-third-boxes-right\">    
        <div class=\"top-ologist\">
            <form action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_invite_from_ology", array("ologyId" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
        echo "\" method=\"post\">
                <input type=\"submit\" class=\"invite-friends-button\" value=\"invite friends\"/>
            </form>
            ";
        // line 6
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "TopOlogistsTab", true), 0, array(), "array", false, true), 0, array(), "array", true, true)) {
            echo "    
                Top Ologists:
            ";
        }
        // line 9
        echo "            ";
        $context["number"] = "0";
        // line 10
        echo "            ";
        $context["url"] = "";
        // line 11
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "TopOlogistsTab"));
        foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
            // line 12
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tab"));
            foreach ($context['_seq'] as $context["key2"] => $context["tab1"]) {
                // line 13
                echo "                    ";
                if (($this->getContext($context, "key2") == 0)) {
                    // line 14
                    echo "                        ";
                    $context["number"] = $this->getContext($context, "tab1");
                    // line 15
                    echo "                    ";
                } else {
                    // line 16
                    echo "                        ";
                    $context["url"] = $this->getContext($context, "tab1");
                    // line 17
                    echo "                    ";
                }
                // line 18
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key2'], $context['tab1'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 19
            echo "                ";
            if (($this->getContext($context, "number") != 0)) {
                // line 20
                echo "                    <a class=\"user-popupable\" pid=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "number"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "number"))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getContext($context, "url"))), "html", null, true);
                echo "\" class=\"user-pic\"></a>
                ";
            }
            // line 22
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "        
        </div>

        <div class=\"founder-box\">
            <a class=\"user-popupable\" pid=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"))), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_large/" . $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "imageUrl"))), "html", null, true);
        echo "\"   />
            </a>
            <div style=\"text-align: left\"><small>Founded by</small></div>
            <div style=\"text-align: left\">
                <a class=\"user-popupable\" pid=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"))), "html", null, true);
        echo "\">
                    ";
        // line 32
        $context["firstname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstName"));
        // line 33
        echo "                    ";
        $context["lastname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastName"));
        // line 34
        echo "                        ";
        if ((($this->getContext($context, "firstname_length") + $this->getContext($context, "lastname_length")) >= 20)) {
            echo " 
                            ";
            // line 35
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstName") . " ") . $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastName")), 20, false, "..."), "html", null, true);
            echo "
                        ";
        } else {
            // line 36
            echo "   
                            ";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastName"), "html", null, true);
            echo "
                        ";
        }
        // line 39
        echo "                </a>
            </div>
            <div style=\"text-align: left;\">
                on ";
        // line 42
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "creationDate"), "M d, Y"), "html", null, true);
        echo " 
            </div>
        </div>

        <div class=\"founder-stats\">
            ";
        // line 47
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:ology_stats.html.twig")->display($context);
        // line 48
        echo "        </div>
</div> ";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:ologist-right-box.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 115,  353 => 113,  326 => 102,  314 => 99,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 81,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 143,  291 => 140,  261 => 79,  252 => 117,  234 => 103,  223 => 99,  348 => 135,  340 => 133,  336 => 106,  332 => 131,  327 => 130,  324 => 101,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 87,  287 => 111,  279 => 84,  226 => 86,  149 => 41,  136 => 40,  125 => 36,  115 => 33,  100 => 27,  130 => 54,  251 => 82,  247 => 81,  238 => 90,  194 => 68,  191 => 67,  168 => 64,  128 => 36,  294 => 114,  286 => 85,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 163,  186 => 66,  183 => 75,  181 => 64,  163 => 53,  140 => 45,  170 => 70,  121 => 29,  112 => 48,  118 => 34,  106 => 29,  157 => 44,  232 => 88,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 60,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 111,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 100,  307 => 95,  299 => 102,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 61,  119 => 49,  110 => 36,  53 => 11,  91 => 34,  66 => 34,  98 => 42,  96 => 25,  166 => 45,  160 => 66,  154 => 43,  143 => 42,  138 => 39,  101 => 25,  58 => 16,  36 => 10,  65 => 16,  18 => 1,  352 => 117,  347 => 160,  344 => 110,  282 => 99,  276 => 83,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 73,  241 => 91,  237 => 69,  233 => 76,  229 => 102,  225 => 100,  221 => 78,  217 => 92,  214 => 88,  203 => 71,  180 => 50,  175 => 8,  169 => 74,  167 => 61,  164 => 67,  155 => 49,  139 => 41,  114 => 51,  83 => 22,  76 => 20,  72 => 19,  68 => 17,  64 => 18,  56 => 14,  21 => 3,  209 => 85,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 75,  165 => 63,  161 => 69,  152 => 42,  148 => 56,  145 => 39,  141 => 58,  134 => 62,  132 => 55,  127 => 34,  123 => 35,  109 => 37,  93 => 39,  90 => 24,  54 => 16,  133 => 31,  124 => 33,  111 => 45,  107 => 31,  80 => 27,  63 => 17,  60 => 15,  69 => 24,  61 => 17,  52 => 14,  50 => 13,  45 => 12,  43 => 10,  34 => 5,  224 => 65,  215 => 90,  211 => 88,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 53,  185 => 76,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 50,  156 => 49,  153 => 48,  146 => 55,  142 => 42,  137 => 37,  131 => 37,  126 => 52,  120 => 50,  117 => 48,  103 => 45,  99 => 26,  74 => 39,  47 => 13,  32 => 8,  39 => 11,  26 => 4,  97 => 40,  95 => 35,  88 => 22,  82 => 23,  78 => 26,  75 => 27,  71 => 18,  22 => 3,  44 => 12,  30 => 9,  20 => 2,  25 => 4,  49 => 13,  42 => 6,  40 => 10,  23 => 3,  27 => 6,  17 => 1,  92 => 29,  86 => 23,  79 => 21,  77 => 20,  57 => 14,  46 => 7,  37 => 6,  33 => 9,  29 => 6,  24 => 6,  19 => 2,  135 => 56,  129 => 35,  122 => 56,  116 => 30,  113 => 32,  108 => 36,  104 => 28,  102 => 27,  94 => 26,  89 => 30,  87 => 33,  84 => 25,  81 => 41,  73 => 20,  70 => 19,  67 => 22,  62 => 15,  59 => 14,  55 => 15,  51 => 11,  48 => 12,  41 => 5,  38 => 4,  35 => 3,  31 => 6,  28 => 3,);
    }
}

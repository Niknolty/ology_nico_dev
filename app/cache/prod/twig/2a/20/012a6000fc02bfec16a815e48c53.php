<?php

/* OlogySocialBundle:FrontEnd:merge_twitter.html.twig */
class __TwigTemplate_2a20012a6000fc02bfec16a815e48c53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
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
        echo "Ology is all about passion";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"container\">
    <div id=\"invite-box-main\" class=\"merge-form\">
        ";
        // line 8
        if (array_key_exists("mergeform", $context)) {
            // line 9
            echo "        <h2>Merge your logins </h2>
        <h3>Hey! We already have a user with this address.</h3>
            ";
            // line 11
            if (array_key_exists("error", $context)) {
                // line 12
                echo "                <div id=\"merge-error\">
                    ";
                // line 13
                echo twig_escape_filter($this->env, $this->getContext($context, "error"), "html", null, true);
                echo " 
                    <p>Please try again.</p>
                </div>
            ";
            } else {
                // line 17
                echo "            <div>
                Please enter your password and verify that it's you so we can link you to your old account.
            </div>
            ";
            }
            // line 21
            echo "        <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_merge_twitter"), "html", null, true);
            echo "\" method=\"post\" id=\"login-form\">
            ";
            // line 22
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "mergeform"), "plainPassword"));
            echo "
            <br />
            <input type=\"submit\" id=\"_submit-twitter\" name=\"_submit\" value=\"Merge my accounts\" /><br /><br /><br />
        </form>
        <div>
            <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_splash", array("openTwitterPopup" => true)), "html", null, true);
            echo "\">I don't want to merge, give me a chance to put a new email</a>
        </div>
        ";
        }
        // line 30
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:merge_twitter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 119,  321 => 114,  308 => 109,  297 => 105,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 115,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 81,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 107,  291 => 104,  261 => 98,  252 => 117,  234 => 103,  223 => 85,  348 => 120,  340 => 133,  336 => 106,  332 => 131,  327 => 115,  324 => 101,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 87,  287 => 102,  279 => 84,  226 => 86,  149 => 41,  136 => 40,  125 => 36,  115 => 43,  100 => 27,  130 => 49,  251 => 94,  247 => 81,  238 => 89,  194 => 69,  191 => 68,  168 => 64,  128 => 36,  294 => 114,  286 => 85,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 66,  183 => 75,  181 => 65,  163 => 53,  140 => 45,  170 => 70,  121 => 29,  112 => 48,  118 => 34,  106 => 40,  157 => 44,  232 => 88,  228 => 86,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 60,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 111,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 95,  299 => 106,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 61,  119 => 49,  110 => 36,  53 => 11,  91 => 34,  66 => 34,  98 => 42,  96 => 38,  166 => 60,  160 => 66,  154 => 43,  143 => 42,  138 => 51,  101 => 25,  58 => 17,  36 => 6,  65 => 16,  18 => 1,  352 => 117,  347 => 160,  344 => 110,  282 => 99,  276 => 83,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 93,  241 => 91,  237 => 69,  233 => 76,  229 => 102,  225 => 100,  221 => 84,  217 => 82,  214 => 88,  203 => 71,  180 => 50,  175 => 8,  169 => 74,  167 => 61,  164 => 67,  155 => 49,  139 => 41,  114 => 51,  83 => 30,  76 => 33,  72 => 19,  68 => 20,  64 => 21,  56 => 18,  21 => 3,  209 => 79,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 63,  161 => 59,  152 => 42,  148 => 54,  145 => 39,  141 => 58,  134 => 62,  132 => 55,  127 => 34,  123 => 35,  109 => 41,  93 => 39,  90 => 24,  54 => 15,  133 => 31,  124 => 33,  111 => 45,  107 => 31,  80 => 27,  63 => 18,  60 => 18,  69 => 22,  61 => 17,  52 => 13,  50 => 14,  45 => 12,  43 => 10,  34 => 10,  224 => 65,  215 => 90,  211 => 80,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 53,  185 => 67,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 55,  142 => 53,  137 => 37,  131 => 37,  126 => 52,  120 => 46,  117 => 48,  103 => 45,  99 => 26,  74 => 39,  47 => 13,  32 => 8,  39 => 11,  26 => 4,  97 => 40,  95 => 35,  88 => 35,  82 => 32,  78 => 26,  75 => 27,  71 => 18,  22 => 3,  44 => 12,  30 => 8,  20 => 2,  25 => 7,  49 => 13,  42 => 9,  40 => 8,  23 => 4,  27 => 3,  17 => 1,  92 => 29,  86 => 42,  79 => 31,  77 => 27,  57 => 14,  46 => 11,  37 => 10,  33 => 5,  29 => 8,  24 => 6,  19 => 2,  135 => 50,  129 => 35,  122 => 47,  116 => 30,  113 => 32,  108 => 36,  104 => 39,  102 => 27,  94 => 26,  89 => 30,  87 => 33,  84 => 33,  81 => 41,  73 => 20,  70 => 24,  67 => 22,  62 => 19,  59 => 14,  55 => 15,  51 => 13,  48 => 12,  41 => 11,  38 => 11,  35 => 3,  31 => 4,  28 => 9,);
    }
}

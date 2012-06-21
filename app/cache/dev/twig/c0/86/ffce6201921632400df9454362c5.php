<?php

/* OlogySocialBundle:Tips:ology_featured_tip.html.twig */
class __TwigTemplate_c086ffce6201921632400df9454362c5 extends Twig_Template
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
        if (((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user"))) && (!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "tipsList"))))) {
            // line 2
            echo "
<div id=\"tip11\" class=\"tips right\">
    Check out these interesting ologies. Also, be sure to visit the Explore page to see the full list of ologies you can follow.
    <span class=\"tip-close\">X</span>
    <a id=\"next-tip-button\" class=\"next-tip\">Next >></a>
</div>

";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Tips:ology_featured_tip.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 2,  74 => 39,  66 => 34,  58 => 29,  47 => 21,  23 => 3,  29 => 6,  26 => 3,  24 => 2,  17 => 1,  396 => 154,  392 => 153,  388 => 152,  384 => 151,  361 => 131,  355 => 127,  352 => 126,  345 => 121,  336 => 118,  330 => 117,  325 => 114,  319 => 112,  313 => 110,  311 => 109,  305 => 108,  302 => 107,  298 => 106,  295 => 105,  291 => 103,  282 => 100,  276 => 99,  269 => 95,  263 => 94,  260 => 93,  256 => 92,  253 => 91,  250 => 90,  244 => 87,  240 => 85,  238 => 84,  235 => 83,  233 => 82,  228 => 79,  222 => 76,  217 => 74,  213 => 72,  209 => 70,  207 => 69,  203 => 67,  200 => 66,  198 => 65,  190 => 59,  183 => 55,  180 => 54,  166 => 53,  163 => 52,  160 => 51,  157 => 50,  154 => 49,  151 => 48,  134 => 47,  126 => 41,  118 => 38,  115 => 37,  113 => 36,  108 => 33,  104 => 31,  101 => 30,  96 => 26,  94 => 25,  90 => 23,  84 => 21,  81 => 43,  78 => 19,  72 => 17,  70 => 16,  65 => 14,  61 => 13,  54 => 12,  52 => 11,  48 => 9,  44 => 7,  42 => 6,  39 => 5,  37 => 4,  34 => 3,  28 => 2,);
    }
}

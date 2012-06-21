<?php

/* OlogySocialBundle:Tips:post_create_tip.html.twig */
class __TwigTemplate_0f437038e0f35015706a500220ee2a58 extends Twig_Template
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
<div id=\"tip5\" class=\"tips top\">
    Posting (aka \"ologizing\") on Ology is simple! Click this box to share your stories, pictures, video, and more.
    <span class=\"tip-close\">X</span>
    <a id=\"next-tip-button\" class=\"next-tip\">Next >></a>
</div>

";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Tips:post_create_tip.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 2,  71 => 16,  67 => 15,  60 => 13,  54 => 12,  45 => 9,  25 => 4,  22 => 3,  20 => 2,  153 => 48,  151 => 47,  143 => 42,  138 => 39,  131 => 37,  128 => 36,  123 => 35,  118 => 34,  113 => 32,  107 => 31,  100 => 27,  83 => 22,  73 => 20,  70 => 19,  61 => 17,  55 => 15,  49 => 13,  44 => 12,  39 => 11,  36 => 10,  33 => 6,  27 => 6,  21 => 3,  17 => 1,  348 => 135,  344 => 134,  340 => 133,  336 => 132,  332 => 131,  327 => 130,  324 => 129,  318 => 125,  315 => 124,  309 => 121,  304 => 119,  300 => 117,  296 => 115,  294 => 114,  290 => 112,  287 => 111,  281 => 107,  279 => 106,  275 => 104,  272 => 103,  270 => 102,  259 => 94,  255 => 92,  241 => 91,  238 => 90,  235 => 89,  232 => 88,  229 => 87,  226 => 86,  209 => 85,  206 => 84,  202 => 82,  197 => 79,  192 => 76,  190 => 75,  187 => 74,  185 => 73,  178 => 69,  169 => 62,  167 => 61,  164 => 60,  162 => 59,  158 => 50,  156 => 49,  149 => 44,  145 => 43,  142 => 42,  139 => 41,  136 => 40,  130 => 38,  127 => 37,  125 => 36,  120 => 33,  117 => 32,  115 => 33,  111 => 30,  106 => 29,  104 => 28,  99 => 27,  96 => 26,  94 => 26,  90 => 24,  86 => 23,  81 => 21,  75 => 20,  69 => 17,  64 => 14,  58 => 16,  56 => 12,  52 => 14,  48 => 10,  46 => 7,  43 => 6,  41 => 7,  38 => 4,  35 => 3,  28 => 2,);
    }
}

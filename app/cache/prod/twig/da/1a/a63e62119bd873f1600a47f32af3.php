<?php

/* TwigBundle:Exception:error.css.twig */
class __TwigTemplate_da1aa63e62119bd873f1600a47f32af3 extends Twig_Template
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
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, $this->getContext($context, "status_code"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_text"), "html", null, true);
        echo "

*/
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.css.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 46,  120 => 45,  117 => 44,  103 => 36,  99 => 34,  74 => 27,  47 => 19,  32 => 11,  39 => 15,  26 => 3,  97 => 22,  95 => 21,  88 => 19,  82 => 18,  78 => 17,  75 => 16,  71 => 14,  22 => 3,  44 => 8,  30 => 4,  20 => 2,  25 => 4,  49 => 8,  42 => 7,  40 => 7,  23 => 5,  27 => 4,  17 => 1,  92 => 20,  86 => 6,  79 => 40,  77 => 28,  57 => 22,  46 => 14,  37 => 8,  33 => 5,  29 => 5,  24 => 6,  19 => 2,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 43,  108 => 40,  104 => 24,  102 => 37,  94 => 31,  89 => 29,  87 => 28,  84 => 27,  81 => 26,  73 => 21,  70 => 26,  67 => 12,  62 => 24,  59 => 23,  55 => 13,  51 => 11,  48 => 10,  41 => 6,  38 => 6,  35 => 7,  31 => 5,  28 => 3,);
    }
}

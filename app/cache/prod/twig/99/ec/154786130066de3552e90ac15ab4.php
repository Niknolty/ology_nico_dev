<?php

/* OlogySocialBundle:Comment:inline_create.html.twig */
class __TwigTemplate_99ec154786130066de3552e90ac15ab4 extends Twig_Template
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
        if (array_key_exists("showprompt", $context)) {
            // line 2
            echo "    <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_comment_store_ajax"), "html", null, true);
            echo "\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
            echo " id=\"offline-form-comment-inline\" class=\"comment-form-card\">
        ";
            // line 3
            echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
            echo "
    </form>
";
        } else {
            // line 6
            echo "    <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_comment_store_ajax"), "html", null, true);
            echo "\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
            echo " id=\"form-comment-inline\" class=\"comment-form-card\">
        ";
            // line 7
            echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
            echo "
    </form>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Comment:inline_create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 39,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  63 => 18,  60 => 16,  69 => 20,  61 => 15,  52 => 12,  50 => 13,  45 => 12,  43 => 11,  34 => 5,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 46,  120 => 39,  117 => 44,  103 => 36,  99 => 34,  74 => 27,  47 => 19,  32 => 6,  39 => 7,  26 => 3,  97 => 34,  95 => 21,  88 => 29,  82 => 27,  78 => 25,  75 => 24,  71 => 14,  22 => 3,  44 => 8,  30 => 4,  20 => 2,  25 => 4,  49 => 11,  42 => 7,  40 => 10,  23 => 4,  27 => 4,  17 => 1,  92 => 20,  86 => 28,  79 => 19,  77 => 25,  57 => 15,  46 => 10,  37 => 8,  33 => 5,  29 => 5,  24 => 6,  19 => 2,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 29,  87 => 28,  84 => 28,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 23,  55 => 13,  51 => 13,  48 => 10,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}

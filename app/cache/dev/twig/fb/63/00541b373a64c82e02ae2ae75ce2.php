<?php

/* OlogySocialBundle:Email:NewMember.html.twig */
class __TwigTemplate_fb6300541b373a64c82e02ae2ae75ce2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:Email:template.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OlogySocialBundle:Email:template.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "followerId"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "followerName"), "html", null, true);
        echo "</a> has started following your ology! Congrats! We always knew <a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getContext($context, "ologyId"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "ologyName"), "html", null, true);
        echo "</a> was a winner.

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Email:NewMember.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  114 => 40,  83 => 20,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  56 => 18,  21 => 3,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 65,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 39,  80 => 27,  60 => 19,  61 => 15,  52 => 12,  45 => 12,  34 => 4,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 55,  142 => 54,  137 => 51,  126 => 49,  120 => 45,  117 => 41,  103 => 36,  74 => 23,  47 => 7,  32 => 8,  26 => 2,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  71 => 14,  22 => 3,  25 => 4,  42 => 5,  40 => 8,  23 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 19,  29 => 3,  24 => 6,  19 => 2,  69 => 20,  63 => 10,  58 => 14,  49 => 11,  43 => 11,  37 => 7,  20 => 2,  139 => 59,  131 => 48,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 27,  77 => 25,  75 => 24,  57 => 15,  50 => 13,  46 => 10,  44 => 5,  39 => 12,  33 => 4,  30 => 4,  27 => 5,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 26,  87 => 32,  84 => 28,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 8,  55 => 8,  51 => 13,  48 => 10,  41 => 9,  38 => 4,  35 => 7,  31 => 4,  28 => 3,);
    }
}

<?php

/* OlogySocialBundle:Resetting:passwordAlreadyRequested.html.twig */
class __TwigTemplate_cea1fe3ac287a63a5fdbd62117310e51 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 4
        echo "<p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.password_already_requested", array(), "FOSUserBundle"), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Resetting:passwordAlreadyRequested.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  114 => 40,  83 => 20,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  56 => 18,  21 => 2,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 65,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 39,  80 => 27,  60 => 19,  61 => 15,  52 => 16,  45 => 12,  34 => 10,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 55,  142 => 54,  137 => 51,  126 => 49,  120 => 45,  117 => 41,  103 => 36,  74 => 23,  47 => 19,  32 => 5,  26 => 3,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  71 => 14,  22 => 3,  25 => 4,  42 => 7,  40 => 8,  23 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 19,  29 => 4,  24 => 6,  19 => 2,  69 => 20,  63 => 18,  58 => 9,  49 => 11,  43 => 11,  37 => 7,  20 => 2,  139 => 59,  131 => 48,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 27,  77 => 25,  75 => 24,  57 => 15,  50 => 13,  46 => 10,  44 => 14,  39 => 7,  33 => 5,  30 => 4,  27 => 8,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 26,  87 => 32,  84 => 28,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 23,  55 => 8,  51 => 13,  48 => 10,  41 => 9,  38 => 11,  35 => 7,  31 => 5,  28 => 3,);
    }
}

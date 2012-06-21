<?php

/* OlogySocialBundle:Post:create_audio.html.twig */
class __TwigTemplate_85abdaf109f6bb2ba6d0c99b7cadd845 extends Twig_Template
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
        echo "Create audio post

<form action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_store_audio"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo ">
    ";
        // line 4
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "

    <input type=\"submit\" />
</form>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:create_audio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 26,  96 => 25,  166 => 49,  160 => 47,  154 => 45,  143 => 41,  138 => 39,  101 => 27,  58 => 14,  36 => 5,  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 22,  72 => 16,  68 => 15,  64 => 18,  56 => 18,  21 => 3,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 43,  145 => 56,  141 => 40,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 24,  90 => 22,  54 => 14,  133 => 44,  124 => 41,  111 => 31,  107 => 30,  80 => 27,  63 => 12,  60 => 19,  69 => 15,  61 => 15,  52 => 12,  50 => 13,  45 => 12,  43 => 11,  34 => 4,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 42,  142 => 54,  137 => 51,  131 => 48,  126 => 49,  120 => 35,  117 => 41,  103 => 36,  99 => 34,  74 => 23,  47 => 17,  32 => 4,  39 => 12,  26 => 2,  97 => 26,  95 => 21,  88 => 29,  82 => 27,  78 => 18,  75 => 24,  71 => 14,  22 => 3,  44 => 6,  30 => 4,  20 => 2,  25 => 6,  49 => 8,  42 => 5,  40 => 5,  23 => 4,  27 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 19,  77 => 25,  57 => 10,  46 => 10,  37 => 12,  33 => 4,  29 => 7,  24 => 6,  19 => 2,  135 => 50,  129 => 47,  122 => 36,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 26,  87 => 21,  84 => 20,  81 => 26,  73 => 21,  70 => 20,  67 => 19,  62 => 24,  59 => 8,  55 => 9,  51 => 13,  48 => 10,  41 => 9,  38 => 6,  35 => 2,  31 => 4,  28 => 3,);
    }
}

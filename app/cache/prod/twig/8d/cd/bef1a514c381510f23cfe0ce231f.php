<?php

/* OlogySocialBundle:Email:template.html.twig */
class __TwigTemplate_8dcdbef1a514c381510f23cfe0ce231f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/emailheader.jpg"), "html", null, true);
        echo "\" />

<p>
";
        // line 4
        $this->displayBlock('body', $context, $blocks);
        // line 5
        echo "</p>

Follow what you love,<br/>
The Ology Team.<br/><br/>

<p>Want to stop receiving these notifications? <a href='{unsubscribe}'>Click here to unsubscribe</a></p>

";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Email:template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  56 => 18,  21 => 3,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 65,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 39,  107 => 36,  80 => 27,  63 => 18,  60 => 19,  69 => 20,  61 => 15,  52 => 7,  50 => 13,  45 => 12,  43 => 11,  34 => 10,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 49,  120 => 45,  117 => 41,  103 => 36,  99 => 34,  74 => 23,  47 => 19,  32 => 8,  39 => 12,  26 => 2,  97 => 34,  95 => 21,  88 => 29,  82 => 27,  78 => 25,  75 => 24,  71 => 14,  22 => 3,  44 => 5,  30 => 4,  20 => 2,  25 => 4,  49 => 11,  42 => 4,  40 => 8,  23 => 4,  27 => 5,  17 => 1,  92 => 23,  86 => 25,  79 => 19,  77 => 25,  57 => 15,  46 => 10,  37 => 7,  33 => 4,  29 => 3,  24 => 6,  19 => 2,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 26,  87 => 28,  84 => 28,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 23,  55 => 13,  51 => 13,  48 => 10,  41 => 9,  38 => 4,  35 => 7,  31 => 5,  28 => 3,);
    }
}

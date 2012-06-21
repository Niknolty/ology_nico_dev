<?php

/* OlogySocialBundle:Post:getPostsForOlogy.html.twig */
class __TwigTemplate_743357a7d5f59628b7e355c359cc8e26 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 2
            echo "<span style=\"display: inline-block; border: 1px solid #000000; width: 500px;\">
<h1 style=\"text-align: center;\">";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
            echo "</h1>
";
            // line 4
            if ($this->getAttribute($this->getContext($context, "post"), "postType")) {
                // line 5
                echo "<div style=\"text-align: center;\">
    <img src=\"";
                // line 6
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_original_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))), "html", null, true);
                echo "\"  />
</div>
";
            }
            // line 9
            echo "<p>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "textContent"), "html", null, true);
            echo "</p>
</span>
<br/><br/><br/>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:getPostsForOlogy.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 26,  96 => 25,  166 => 49,  160 => 47,  154 => 45,  143 => 41,  138 => 39,  101 => 27,  58 => 14,  36 => 8,  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 22,  72 => 16,  68 => 15,  64 => 18,  56 => 18,  21 => 2,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 43,  145 => 56,  141 => 40,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 47,  90 => 22,  54 => 14,  133 => 44,  124 => 41,  111 => 31,  107 => 53,  80 => 27,  63 => 29,  60 => 19,  69 => 15,  61 => 15,  52 => 21,  50 => 13,  45 => 12,  43 => 11,  34 => 4,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 42,  142 => 54,  137 => 51,  131 => 48,  126 => 49,  120 => 35,  117 => 41,  103 => 36,  99 => 50,  74 => 23,  47 => 17,  32 => 4,  39 => 9,  26 => 2,  97 => 26,  95 => 48,  88 => 29,  82 => 27,  78 => 18,  75 => 24,  71 => 34,  22 => 3,  44 => 6,  30 => 5,  20 => 2,  25 => 3,  49 => 8,  42 => 5,  40 => 5,  23 => 4,  27 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 39,  77 => 25,  57 => 10,  46 => 10,  37 => 12,  33 => 6,  29 => 7,  24 => 3,  19 => 2,  135 => 50,  129 => 47,  122 => 36,  116 => 42,  113 => 40,  108 => 40,  104 => 52,  102 => 51,  94 => 33,  89 => 26,  87 => 44,  84 => 20,  81 => 26,  73 => 21,  70 => 20,  67 => 19,  62 => 24,  59 => 8,  55 => 9,  51 => 13,  48 => 10,  41 => 9,  38 => 9,  35 => 2,  31 => 4,  28 => 4,);
    }
}

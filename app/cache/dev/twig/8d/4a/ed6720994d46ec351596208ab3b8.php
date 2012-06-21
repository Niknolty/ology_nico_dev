<?php

/* WebProfilerBundle:Profiler:toolbar_item.html.twig */
class __TwigTemplate_8d4aed6720994d46ec351596208ab3b8 extends Twig_Template
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
        if ($this->getContext($context, "link")) {
            // line 2
            echo "    ";
            ob_start();
            // line 3
            echo "        <a style=\"text-decoration: none; margin: 0; padding: 0;\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"), "panel" => $this->getContext($context, "name"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "icon"), "html", null, true);
            echo "</a>
    ";
            $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 6
        echo "<span style=\"white-space:nowrap; color:#2f2f2f; display:inline-block; min-height:24px; border-right:1px solid #cdcdcd; padding:5px 7px 5px 4px; \">
     ";
        // line 7
        echo twig_escape_filter($this->env, ((array_key_exists("icon", $context)) ? (_twig_default_filter($this->getContext($context, "icon"), "")) : ("")), "html", null, true);
        echo "
     ";
        // line 8
        echo twig_escape_filter($this->env, ((array_key_exists("text", $context)) ? (_twig_default_filter($this->getContext($context, "text"), "")) : ("")), "html", null, true);
        echo "
</span>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 2,  76 => 39,  64 => 35,  22 => 3,  17 => 1,  159 => 52,  95 => 35,  83 => 28,  136 => 40,  117 => 34,  209 => 84,  205 => 82,  192 => 78,  185 => 76,  178 => 71,  176 => 70,  171 => 67,  148 => 57,  134 => 50,  127 => 38,  109 => 39,  93 => 33,  78 => 25,  124 => 41,  88 => 30,  86 => 28,  80 => 27,  122 => 46,  116 => 42,  108 => 32,  102 => 37,  70 => 20,  51 => 23,  26 => 5,  150 => 43,  135 => 45,  129 => 50,  94 => 33,  85 => 28,  61 => 28,  47 => 11,  34 => 7,  157 => 55,  154 => 45,  140 => 52,  119 => 34,  113 => 40,  104 => 40,  79 => 28,  62 => 16,  59 => 15,  32 => 8,  29 => 4,  24 => 3,  73 => 21,  56 => 14,  54 => 14,  48 => 10,  45 => 9,  42 => 8,  36 => 8,  330 => 135,  327 => 134,  321 => 133,  319 => 132,  312 => 131,  308 => 130,  304 => 128,  302 => 127,  299 => 126,  296 => 125,  294 => 124,  286 => 122,  284 => 121,  280 => 119,  274 => 115,  270 => 113,  261 => 110,  257 => 109,  254 => 108,  247 => 106,  240 => 101,  238 => 100,  233 => 97,  231 => 96,  226 => 93,  224 => 92,  218 => 88,  214 => 86,  204 => 82,  202 => 81,  196 => 79,  194 => 76,  189 => 77,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  170 => 56,  164 => 59,  161 => 61,  158 => 57,  156 => 56,  151 => 53,  145 => 56,  142 => 48,  137 => 51,  132 => 49,  123 => 37,  118 => 36,  114 => 34,  111 => 37,  103 => 36,  100 => 39,  97 => 34,  92 => 37,  89 => 31,  72 => 22,  66 => 19,  52 => 12,  69 => 20,  63 => 18,  58 => 16,  37 => 6,  20 => 2,  139 => 47,  131 => 39,  128 => 43,  125 => 36,  121 => 41,  115 => 39,  99 => 34,  91 => 31,  82 => 43,  75 => 24,  67 => 19,  57 => 27,  50 => 12,  44 => 10,  39 => 8,  33 => 7,  30 => 7,  27 => 6,  272 => 125,  263 => 122,  259 => 121,  256 => 120,  251 => 119,  249 => 107,  236 => 108,  229 => 104,  222 => 100,  215 => 96,  208 => 84,  201 => 88,  186 => 76,  179 => 72,  172 => 68,  165 => 63,  155 => 56,  152 => 43,  144 => 50,  141 => 48,  138 => 48,  133 => 44,  130 => 43,  126 => 42,  120 => 39,  112 => 38,  110 => 37,  107 => 36,  101 => 39,  96 => 34,  90 => 32,  87 => 30,  84 => 28,  81 => 26,  77 => 25,  74 => 38,  71 => 37,  68 => 20,  65 => 18,  60 => 17,  55 => 14,  49 => 11,  46 => 10,  43 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 6,  28 => 3,);
    }
}

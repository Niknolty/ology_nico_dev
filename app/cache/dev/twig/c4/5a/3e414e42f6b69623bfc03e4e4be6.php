<?php

/* WebProfilerBundle:Collector:exception.html.twig */
class __TwigTemplate_c45a3e414e42f6b69623bfc03e4e4be6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
    ";
        // line 5
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
    }

    // line 8
    public function block_menu($context, array $blocks = array())
    {
        // line 9
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/exception.png"), "html", null, true);
        echo "\" alt=\"Exception\" /></span>
    <strong>Exception</strong>
    <span class=\"count\">
        ";
        // line 13
        if ($this->getAttribute($this->getContext($context, "collector"), "hasexception")) {
            // line 14
            echo "            <span>1</span>
        ";
        }
        // line 16
        echo "    </span>
</span>
";
    }

    // line 20
    public function block_panel($context, array $blocks = array())
    {
        // line 21
        echo "    <h2>Exception</h2>

    ";
        // line 23
        if ((!$this->getAttribute($this->getContext($context, "collector"), "hasexception"))) {
            // line 24
            echo "        <p>
            <em>No exception was thrown and uncaught during the request.</em>
        </p>
    ";
        } else {
            // line 28
            echo "        ";
            echo $this->env->getExtension('actions')->renderAction("WebProfilerBundle:Exception:show", array("exception" => $this->getAttribute($this->getContext($context, "collector"), "exception"), "format" => "html"), array());
            // line 29
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 23,  56 => 14,  54 => 13,  48 => 10,  45 => 9,  42 => 8,  36 => 5,  330 => 135,  327 => 134,  321 => 133,  319 => 132,  312 => 131,  308 => 130,  304 => 128,  302 => 127,  299 => 126,  296 => 125,  294 => 124,  286 => 122,  284 => 121,  280 => 119,  274 => 115,  270 => 113,  261 => 110,  257 => 109,  254 => 108,  247 => 106,  240 => 101,  238 => 100,  233 => 97,  231 => 96,  226 => 93,  224 => 92,  218 => 88,  214 => 86,  204 => 82,  202 => 81,  196 => 77,  194 => 76,  189 => 73,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  170 => 63,  164 => 59,  161 => 58,  158 => 57,  156 => 56,  151 => 53,  145 => 49,  142 => 48,  137 => 46,  132 => 43,  123 => 38,  118 => 36,  114 => 34,  111 => 33,  103 => 28,  100 => 27,  97 => 26,  92 => 23,  89 => 22,  72 => 17,  66 => 20,  52 => 13,  69 => 21,  63 => 10,  58 => 9,  37 => 12,  20 => 1,  139 => 47,  131 => 44,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  99 => 35,  91 => 33,  82 => 20,  75 => 24,  67 => 20,  57 => 15,  50 => 12,  44 => 10,  39 => 8,  33 => 5,  30 => 4,  27 => 6,  272 => 125,  263 => 122,  259 => 121,  256 => 120,  251 => 119,  249 => 107,  236 => 108,  229 => 104,  222 => 100,  215 => 96,  208 => 84,  201 => 88,  186 => 76,  179 => 72,  172 => 68,  165 => 64,  155 => 56,  152 => 55,  144 => 50,  141 => 49,  138 => 48,  133 => 45,  130 => 44,  126 => 39,  120 => 37,  112 => 38,  110 => 37,  107 => 36,  101 => 33,  96 => 34,  90 => 29,  87 => 32,  84 => 29,  81 => 28,  77 => 27,  74 => 21,  71 => 20,  68 => 19,  65 => 18,  60 => 16,  55 => 8,  49 => 6,  46 => 11,  43 => 15,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}

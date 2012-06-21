<?php

/* WebProfilerBundle:Profiler:base.html.twig */
class __TwigTemplate_bd264739fb9f2cdc6ea40ce313751891 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/favicon.ico"), "html", null, true);
        echo "\" />
        ";
        // line 8
        $this->displayBlock('head', $context, $blocks);
        // line 12
        echo "    </head>
    <body>
        ";
        // line 14
        $this->displayBlock('body', $context, $blocks);
        // line 15
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Profiler";
    }

    // line 8
    public function block_head($context, array $blocks = array())
    {
        // line 9
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/css/toolbar.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
            <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/css/profiler.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
        ";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        echo "";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 14,  63 => 10,  58 => 9,  37 => 12,  20 => 1,  139 => 26,  131 => 44,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  99 => 35,  91 => 33,  82 => 30,  75 => 26,  67 => 20,  57 => 15,  50 => 13,  44 => 10,  39 => 8,  33 => 5,  30 => 4,  27 => 6,  272 => 125,  263 => 122,  259 => 121,  256 => 120,  251 => 119,  249 => 118,  236 => 108,  229 => 104,  222 => 100,  215 => 96,  208 => 92,  201 => 88,  186 => 76,  179 => 72,  172 => 68,  165 => 64,  155 => 56,  152 => 55,  144 => 50,  141 => 49,  138 => 48,  133 => 45,  130 => 44,  126 => 42,  120 => 40,  112 => 38,  110 => 37,  107 => 36,  101 => 33,  96 => 34,  90 => 29,  87 => 32,  84 => 31,  81 => 26,  77 => 27,  74 => 21,  71 => 20,  68 => 19,  65 => 18,  60 => 16,  55 => 8,  49 => 6,  46 => 11,  43 => 15,  41 => 14,  38 => 8,  35 => 8,  31 => 7,  28 => 3,);
    }
}

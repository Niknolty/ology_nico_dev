<?php

/* WebProfilerBundle:Profiler:toolbar.html.twig */
class __TwigTemplate_47c313e16accbde6ef2ef1f895efa6ea extends Twig_Template
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
        echo "<!-- START of Symfony2 Web Debug Toolbar -->
";
        // line 2
        if (("normal" != $this->getContext($context, "position"))) {
            // line 3
            echo "    <div style=\"clear: both; height: 80px;\"></div>
";
        }
        // line 5
        echo "
<div class=\"sf-toolbarreset\"
    ";
        // line 7
        if (("normal" != $this->getContext($context, "position"))) {
            // line 8
            echo "    style=\"position: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "position"), "html", null, true);
            echo ";
        background-color: #f7f7f7;
            background-image: -moz-linear-gradient(-90deg, #e4e4e4, #ffffff);
            background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff));
            bottom: 0;
            left:0;
            margin:0;
            padding: 0;
            z-index: 6000000;
            width: 100%;
            border-top: 1px solid #bbb;
            font: 11px Verdana, Arial, sans-serif;
            text-align: left;
            color: #2f2f2f;\"
    ";
        }
        // line 23
        echo ">

    <span style=\"display: inline-block; min-height: 24px; width: 40px; float: right;\">&nbsp;</span>

    ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "templates"));
        foreach ($context['_seq'] as $context["name"] => $context["template"]) {
            // line 28
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "template"), "renderblock", array(0 => "toolbar", 1 => array("collector" => $this->getAttribute($this->getContext($context, "profile"), "getcollector", array(0 => $this->getContext($context, "name")), "method"), "profiler_url" => $this->getContext($context, "profiler_url"), "token" => $this->getAttribute($this->getContext($context, "profile"), "token"), "name" => $this->getContext($context, "name"), "verbose" => $this->getContext($context, "verbose"))), "method"), "html", null, true);
            // line 35
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['template'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 37
        echo "
    ";
        // line 38
        if (("normal" != $this->getContext($context, "position"))) {
            // line 39
            echo "        <span style=\"display:block; position:absolute; top:12px; right:10px; width:14px; height:14px; cursor: pointer;\">
            <img width=\"15\" height=\"15\" alt=\"Hide Toolbar\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6N0NEOTU1Mjc0OThFMTFFMDg3NzJBNTE2ODgwQzMxMzQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6N0NEOTU1Mjg0OThFMTFFMDg3NzJBNTE2ODgwQzMxMzQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo3Q0Q5NTUyNTQ5OEUxMUUwODc3MkE1MTY4ODBDMzEzNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3Q0Q5NTUyNjQ5OEUxMUUwODc3MkE1MTY4ODBDMzEzNCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PjHyj8cAAAFiSURBVHjajJPNSsNAFIVvfpZNFwXBkBACcdcqiFASNz6A4FYR4lYUX8ONb6C4EwRXvoFY4rYotCRLQwgk4CZSl/nx3mFSplmUHvjIzJk5YW5yRwqCADo6Rk6QA2QXmXJekTdxoyqMDeSeh0V5nBvkGblGfsXwNvKJbMF6nSNjZB/5k7n5uEGw1Q5yRwMKn4pHtSwLPM+Dfr/P5r1eD1zXZb6gKyqFwn7rSJIEuq6DoigwGo3YmJ6qqoJhGGxdkC/zj8HUNA2EYQhlWYIsy+A4DgvWdQ1RFLF1QWMKD0RnsVhAHMcrRSZJAkVRdGsfUPhHdDRNA9u2V3aZpsn8jnIKT8Sah8Ph8qh0AnrSnPxOzR8y//HLmrMsYzXPZjNI0xTm8zlUVQV5nndrfpF4e74jR7C5npCLtknOkO8Ng1PeotCGc2QPeVgTqpBb5JBas3sxyLjkR/L5rWo14f6X+LZ/AQYA+DZpzJCnQZ0AAAAASUVORK5CYII=\" onclick=\"this.parentNode.parentNode.style.display = 'none'; (this.parentNode.parentNode.previousElementSibling || this.parentNode.parentNode.previousSibling).style.display = 'none';\" />
        </span>
    ";
        }
        // line 43
        echo "</div>
<!-- END of Symfony2 Web Debug Toolbar -->
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 39,  64 => 35,  22 => 3,  17 => 1,  159 => 52,  95 => 35,  83 => 28,  136 => 40,  117 => 34,  209 => 84,  205 => 82,  192 => 78,  185 => 76,  178 => 71,  176 => 70,  171 => 67,  148 => 57,  134 => 50,  127 => 38,  109 => 39,  93 => 33,  78 => 25,  124 => 41,  88 => 30,  86 => 28,  80 => 27,  122 => 46,  116 => 42,  108 => 32,  102 => 37,  70 => 20,  51 => 23,  26 => 5,  150 => 43,  135 => 45,  129 => 50,  94 => 33,  85 => 28,  61 => 28,  47 => 11,  34 => 5,  157 => 55,  154 => 45,  140 => 52,  119 => 34,  113 => 40,  104 => 40,  79 => 28,  62 => 16,  59 => 15,  32 => 8,  29 => 4,  24 => 3,  73 => 21,  56 => 14,  54 => 14,  48 => 10,  45 => 9,  42 => 8,  36 => 8,  330 => 135,  327 => 134,  321 => 133,  319 => 132,  312 => 131,  308 => 130,  304 => 128,  302 => 127,  299 => 126,  296 => 125,  294 => 124,  286 => 122,  284 => 121,  280 => 119,  274 => 115,  270 => 113,  261 => 110,  257 => 109,  254 => 108,  247 => 106,  240 => 101,  238 => 100,  233 => 97,  231 => 96,  226 => 93,  224 => 92,  218 => 88,  214 => 86,  204 => 82,  202 => 81,  196 => 79,  194 => 76,  189 => 77,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  170 => 56,  164 => 59,  161 => 61,  158 => 57,  156 => 56,  151 => 53,  145 => 56,  142 => 48,  137 => 51,  132 => 49,  123 => 37,  118 => 36,  114 => 34,  111 => 37,  103 => 36,  100 => 39,  97 => 34,  92 => 37,  89 => 31,  72 => 22,  66 => 19,  52 => 12,  69 => 20,  63 => 18,  58 => 16,  37 => 6,  20 => 2,  139 => 47,  131 => 39,  128 => 43,  125 => 36,  121 => 41,  115 => 39,  99 => 34,  91 => 31,  82 => 43,  75 => 24,  67 => 19,  57 => 27,  50 => 12,  44 => 10,  39 => 8,  33 => 7,  30 => 7,  27 => 6,  272 => 125,  263 => 122,  259 => 121,  256 => 120,  251 => 119,  249 => 107,  236 => 108,  229 => 104,  222 => 100,  215 => 96,  208 => 84,  201 => 88,  186 => 76,  179 => 72,  172 => 68,  165 => 63,  155 => 56,  152 => 43,  144 => 50,  141 => 48,  138 => 48,  133 => 44,  130 => 43,  126 => 42,  120 => 39,  112 => 38,  110 => 37,  107 => 36,  101 => 39,  96 => 34,  90 => 32,  87 => 30,  84 => 28,  81 => 26,  77 => 25,  74 => 38,  71 => 37,  68 => 20,  65 => 18,  60 => 17,  55 => 14,  49 => 11,  46 => 10,  43 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}

<?php

/* DoctrineBundle:Collector:db.html.twig */
class __TwigTemplate_3dd7a5e1d4794337286e0af5c232636b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
    public function block_toolbar($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["icon"] = ('' === $tmp = "        <img width=\"20\" height=\"28\" alt=\"Database\" style=\"border-width: 0; vertical-align: middle; margin-right: 5px;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAcCAYAAABh2p9gAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAQRJREFUeNpi/P//PwM1ARMDlcGogZQDlpMnT7pxc3NbA9nhQKxOpL5rQLwJiPeBsI6Ozl+YBOOOHTv+AOllQNwtLS39F2owKYZ/gRq8G4i3ggxEToggWzvc3d2Pk+1lNL4fFAs6ODi8JzdS7mMRVyDVoAMHDsANdAPiOCC+jCQvQKqBQB/BDbwBxK5AHA3E/kB8nKJkA8TMQBwLxaBIKQbi70AvTADSBiSadwFXpCikpKQU8PDwkGTaly9fHFigkaKIJid4584dkiMFFI6jkTJII0WVmpHCAixZQEXWYhDeuXMnyLsVlEQKI45qFBQZ8eRECi4DBaAlDqle/8A48ip6gAADANdQY88Uc0oGAAAAAElFTkSuQmCC\"/>
    ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 7
        echo "    ";
        ob_start();
        // line 8
        echo "        <span title=\"";
        echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute($this->getContext($context, "collector"), "time") * 1000)), "html", null, true);
        echo " ms\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "querycount"), "html", null, true);
        echo "</span>
    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 10
        echo "    ";
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => $this->getContext($context, "profiler_url"))));
    }

    // line 13
    public function block_menu($context, array $blocks = array())
    {
        // line 14
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/db.png"), "html", null, true);
        echo "\" alt=\"\" /></span>
    <strong>Doctrine</strong>
    <span class=\"count\">
        <span>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "querycount"), "html", null, true);
        echo "</span>
        <span>";
        // line 19
        echo twig_escape_filter($this->env, sprintf("%0.0f", ($this->getAttribute($this->getContext($context, "collector"), "time") * 1000)), "html", null, true);
        echo " ms</span>
    </span>
</span>
";
    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        // line 25
        echo "    <h2>Queries</h2>

    ";
        // line 27
        if ((!$this->getAttribute($this->getContext($context, "collector"), "querycount"))) {
            // line 28
            echo "        <p>
            <em>No queries.</em>
        </p>
    ";
        } else {
            // line 32
            echo "        <ul class=\"alt\">
            ";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "queries"));
            foreach ($context['_seq'] as $context["i"] => $context["query"]) {
                // line 34
                echo "                <li class=\"";
                echo ((($this->getContext($context, "i") % 2 == 1)) ? ("odd") : ("even"));
                echo "\">
                    <div>
                        <code>";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "query"), "sql"), "html", null, true);
                echo "</code>
                    </div>
                    <small>
                        <strong>Parameters</strong>: ";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('yaml')->encode($this->getAttribute($this->getContext($context, "query"), "params")), "html", null, true);
                echo "<br />
                        <strong>Time</strong>: ";
                // line 40
                echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute($this->getContext($context, "query"), "executionMS") * 1000)), "html", null, true);
                echo " ms
                    </small>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['query'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 44
            echo "        </ul>
    ";
        }
        // line 46
        echo "
    <h2>Database Connections</h2>

    ";
        // line 49
        if ($this->getAttribute($this->getContext($context, "collector"), "connections")) {
            // line 50
            echo "        <table>
            <tr>
                <th>Name</th>
                <th>Service</th>
            </tr>
            ";
            // line 55
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "connections"));
            foreach ($context['_seq'] as $context["name"] => $context["service"]) {
                // line 56
                echo "                <tr>
                    <th>";
                // line 57
                echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
                echo "</th>
                    <td>";
                // line 58
                echo twig_escape_filter($this->env, $this->getContext($context, "service"), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['service'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 61
            echo "        </table>
    ";
        } else {
            // line 63
            echo "        <p>
            <em>No entity managers.</em>
        </p>
    ";
        }
        // line 67
        echo "
    <h2>Entity Managers</h2>

    ";
        // line 70
        if ($this->getAttribute($this->getContext($context, "collector"), "managers")) {
            // line 71
            echo "        <table>
            <tr>
                <th>Name</th>
                <th>Service</th>
            </tr>
            ";
            // line 76
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "managers"));
            foreach ($context['_seq'] as $context["name"] => $context["service"]) {
                // line 77
                echo "                <tr>
                    <th>";
                // line 78
                echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
                echo "</th>
                    <td>";
                // line 79
                echo twig_escape_filter($this->env, $this->getContext($context, "service"), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['service'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 82
            echo "        </table>
    ";
        } else {
            // line 84
            echo "        <p>
            <em>No entity managers.</em>
        </p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "DoctrineBundle:Collector:db.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 84,  205 => 82,  192 => 78,  185 => 76,  178 => 71,  176 => 70,  171 => 67,  148 => 57,  134 => 50,  127 => 46,  109 => 39,  93 => 33,  78 => 25,  124 => 41,  88 => 29,  86 => 28,  80 => 26,  122 => 46,  116 => 42,  108 => 40,  102 => 37,  70 => 20,  51 => 13,  26 => 3,  150 => 43,  135 => 54,  129 => 50,  94 => 33,  85 => 28,  61 => 17,  47 => 11,  34 => 5,  157 => 55,  154 => 45,  140 => 52,  119 => 34,  113 => 40,  104 => 38,  79 => 28,  62 => 16,  59 => 15,  32 => 6,  29 => 4,  24 => 3,  73 => 21,  56 => 14,  54 => 14,  48 => 10,  45 => 9,  42 => 10,  36 => 8,  330 => 135,  327 => 134,  321 => 133,  319 => 132,  312 => 131,  308 => 130,  304 => 128,  302 => 127,  299 => 126,  296 => 125,  294 => 124,  286 => 122,  284 => 121,  280 => 119,  274 => 115,  270 => 113,  261 => 110,  257 => 109,  254 => 108,  247 => 106,  240 => 101,  238 => 100,  233 => 97,  231 => 96,  226 => 93,  224 => 92,  218 => 88,  214 => 86,  204 => 82,  202 => 81,  196 => 79,  194 => 76,  189 => 77,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  170 => 56,  164 => 59,  161 => 61,  158 => 57,  156 => 56,  151 => 53,  145 => 56,  142 => 48,  137 => 51,  132 => 49,  123 => 44,  118 => 36,  114 => 34,  111 => 37,  103 => 36,  100 => 39,  97 => 34,  92 => 37,  89 => 29,  72 => 17,  66 => 19,  52 => 12,  69 => 20,  63 => 18,  58 => 16,  37 => 12,  20 => 1,  139 => 47,  131 => 44,  128 => 43,  125 => 36,  121 => 40,  115 => 39,  99 => 34,  91 => 31,  82 => 27,  75 => 24,  67 => 19,  57 => 15,  50 => 12,  44 => 10,  39 => 8,  33 => 7,  30 => 4,  27 => 6,  272 => 125,  263 => 122,  259 => 121,  256 => 120,  251 => 119,  249 => 107,  236 => 108,  229 => 104,  222 => 100,  215 => 96,  208 => 84,  201 => 88,  186 => 76,  179 => 72,  172 => 68,  165 => 63,  155 => 56,  152 => 58,  144 => 50,  141 => 55,  138 => 48,  133 => 44,  130 => 48,  126 => 39,  120 => 39,  112 => 38,  110 => 37,  107 => 36,  101 => 33,  96 => 34,  90 => 32,  87 => 28,  84 => 28,  81 => 26,  77 => 25,  74 => 21,  71 => 21,  68 => 20,  65 => 18,  60 => 16,  55 => 13,  49 => 11,  46 => 10,  43 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}

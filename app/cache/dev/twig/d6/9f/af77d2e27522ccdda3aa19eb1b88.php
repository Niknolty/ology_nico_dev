<?php

/* WebProfilerBundle:Collector:logger.html.twig */
class __TwigTemplate_d69faf77d2e27522ccdda3aa19eb1b88 extends Twig_Template
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
        if ($this->getAttribute($this->getContext($context, "collector"), "counterrors")) {
            // line 5
            echo "        ";
            $context["icon"] = ('' === $tmp = "            <img width=\"15\" height=\"28\" alt=\"Logs\" style=\"border-width: 0; vertical-align: middle; margin-right: 5px;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAcCAYAAAC+lOV/AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAQVJREFUeNpi/P//PwO5gImBAjBwmlm8vLyOf/v2zYJYDVxcXCe2bdvmeu7cuS+M9vb2ZIWYoKDgUrKcvWLFipWfP38OYcEmeeDAgQtA6gMQCzg4OBigy0tISHxhYmJiYMFh+EIgBhlgAMXo4DEwffzH5ewLwAA5ADUAG/g7lBMJNkFgCO8fGJsJxTNezUTEM15nE4rnAQ4wkjVraWm9BlK/wc62tLR8fOXKFZmmpqYHhoaGT4Fif/Do/Q7Ep/bt28fz+/dvDkZgKdI4ZcqUmMOHD0t8+vSJi1gXKCgoPGQE5ixTIBuExUjwKsiSpyDNnECGOBCLAjEnkeEA8vMbxqFZ6AMEGADoe2NON2x5yQAAAABJRU5ErkJggg==\"/>
        ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 8
            echo "        ";
            ob_start();
            // line 9
            echo "            <span>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "counterrors"), "html", null, true);
            echo "</span>
        ";
            $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 11
            echo "        ";
            $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => $this->getContext($context, "profiler_url"))));
            // line 12
            echo "    ";
        }
    }

    // line 15
    public function block_menu($context, array $blocks = array())
    {
        // line 16
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/logger.png"), "html", null, true);
        echo "\" alt=\"Logger\" /></span>
    <strong>Logs</strong>
    ";
        // line 19
        if ($this->getAttribute($this->getContext($context, "collector"), "counterrors")) {
            // line 20
            echo "        <span class=\"count\">
            <span>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "counterrors"), "html", null, true);
            echo "</span>
        </span>
    ";
        }
        // line 24
        echo "</span>
";
    }

    // line 27
    public function block_panel($context, array $blocks = array())
    {
        // line 28
        echo "    <h2>Logs</h2>

    ";
        // line 30
        if ($this->getAttribute($this->getContext($context, "collector"), "logs")) {
            // line 31
            echo "        <ul class=\"alt\">
            ";
            // line 32
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "logs"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 33
                echo "                <li class=\"";
                echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute($this->getContext($context, "loop"), "index")), "html", null, true);
                if ((("ERR" == $this->getAttribute($this->getContext($context, "log"), "priorityName")) || ("ERROR" == $this->getAttribute($this->getContext($context, "log"), "priorityName")))) {
                    echo " error";
                }
                echo "\">
                    ";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "log"), "message"), "html", null, true);
                echo "
                    ";
                // line 35
                if (($this->getAttribute($this->getContext($context, "log", true), "context", array(), "any", true, true) && (!twig_test_empty($this->getAttribute($this->getContext($context, "log"), "context"))))) {
                    // line 36
                    echo "                        <br />
                        <small>
                            <strong>Context</strong>: ";
                    // line 38
                    echo twig_escape_filter($this->env, $this->env->getExtension('yaml')->encode($this->getAttribute($this->getContext($context, "log"), "context")), "html", null, true);
                    echo "
                        </small>
                    ";
                }
                // line 41
                echo "                </li>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 43
            echo "        </ul>
    ";
        } else {
            // line 45
            echo "        <p>
            <em>No logs available.</em>
        </p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:logger.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 43,  135 => 41,  129 => 38,  94 => 32,  85 => 28,  61 => 17,  47 => 11,  34 => 5,  157 => 55,  154 => 45,  140 => 52,  119 => 34,  113 => 43,  104 => 40,  79 => 28,  62 => 22,  59 => 21,  32 => 6,  29 => 5,  24 => 3,  73 => 23,  56 => 14,  54 => 13,  48 => 10,  45 => 9,  42 => 8,  36 => 5,  330 => 135,  327 => 134,  321 => 133,  319 => 132,  312 => 131,  308 => 130,  304 => 128,  302 => 127,  299 => 126,  296 => 125,  294 => 124,  286 => 122,  284 => 121,  280 => 119,  274 => 115,  270 => 113,  261 => 110,  257 => 109,  254 => 108,  247 => 106,  240 => 101,  238 => 100,  233 => 97,  231 => 96,  226 => 93,  224 => 92,  218 => 88,  214 => 86,  204 => 82,  202 => 81,  196 => 77,  194 => 76,  189 => 73,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  170 => 56,  164 => 59,  161 => 58,  158 => 57,  156 => 56,  151 => 53,  145 => 49,  142 => 48,  137 => 51,  132 => 43,  123 => 35,  118 => 36,  114 => 34,  111 => 33,  103 => 28,  100 => 39,  97 => 38,  92 => 37,  89 => 30,  72 => 17,  66 => 19,  52 => 13,  69 => 21,  63 => 10,  58 => 16,  37 => 12,  20 => 1,  139 => 47,  131 => 44,  128 => 43,  125 => 36,  121 => 40,  115 => 39,  99 => 35,  91 => 31,  82 => 27,  75 => 26,  67 => 20,  57 => 15,  50 => 12,  44 => 10,  39 => 8,  33 => 5,  30 => 4,  27 => 6,  272 => 125,  263 => 122,  259 => 121,  256 => 120,  251 => 119,  249 => 107,  236 => 108,  229 => 104,  222 => 100,  215 => 96,  208 => 84,  201 => 88,  186 => 76,  179 => 72,  172 => 68,  165 => 64,  155 => 56,  152 => 55,  144 => 50,  141 => 49,  138 => 48,  133 => 49,  130 => 48,  126 => 39,  120 => 37,  112 => 38,  110 => 37,  107 => 36,  101 => 33,  96 => 34,  90 => 36,  87 => 32,  84 => 29,  81 => 29,  77 => 24,  74 => 21,  71 => 21,  68 => 20,  65 => 18,  60 => 16,  55 => 15,  49 => 6,  46 => 13,  43 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}

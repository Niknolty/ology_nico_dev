<?php

/* SncRedisBundle:Collector:redis.html.twig */
class __TwigTemplate_b861d33e43c1a7ad5289d7c0afcf3129 extends Twig_Template
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
        $context["icon"] = ('' === $tmp = "        <img width=\"20\" height=\"28\" alt=\"Redis\" style=\"border-width: 0; vertical-align: middle; margin-right: 5px;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAcCAYAAABh2p9gAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAv5JREFUeNrsVd9L01EUP9/tbm5ubtI2VqAOYpJP0WCYNOilQAiySbICHyp67CXqrf8jqKeejAVJ9GAUmUEMfYjSl5IYexqM1G3Mn1O3uT6fy+4QMV/yoQe/cLi7557zOZ/zOder1Ww25Tg/mxzzdwL4HwKqZDJ51Pkpy7JGtre3r9dqtbMul2vB4XBM4qp9gr962JVTBx0IcsIS+HkL64jP5zuTSqWkXq9LPp+/MDs7e1cp9QuAk4h5iZgfhwIioB8sxvb29m673e7z2Eu1WpVwOCwDAwMSi8VkZmZGcrmcFIvFc7u7u09sNttjgH8B6CvYW8AUrdHR0SvYPETA1Wg06hofH5dQKMQCUqlUZGJiQhYXFyWRSMj8/Lxsbm7KxsZG27q7u3W80+ksAeepWltbe9TZ2XmNLDs6OiQQCEhvb6/Y7Xa2r1uFhjI3Nycej0dQWPtZEJoKutGxOzs7ARRIWWjlPdCHASoQXAd4vV4N1NPTI0NDQxKJRHSR6elpSafTgjbboCxApltbW9JoNL4qv9//HVoNsz1WIksGoIgUCgXJZrPS19cny8vLMjU1pWOQqPUlCJi12fIWKLQRwSR1WwTiykACMolAmUxGF+LeALEDMu3q6tJSsDvkDqqlpaUg26ST4mLSWngmQV/BJDU4pq/P2Cr36EzLQ3aMLZfLZGtXSMgRgMZAApMxE8iGftMWWZIR2yPD9fV1fW7YImdBBYNBDydsWLESmXFINJxrzfi1psl7qKUhaxYhAbJFXL8qlUqnmcjKPDCsWJ3WElsDmiFQBiMTAenjUFHEr4D6e3V1VQ+EiYYV2yCwGQS1o/C8yIwhKP0rKyvmbjbhe8c/vQf48Rn7+wC4BBY2JjKJjM0NMBqyTRYnGIvCX4K9gT0D1jcrHo/vf8oGcXAP4DeQGKZmbI1mWjZsEfcTrhd8IGCF9puwD9A8ElxCSLqJ9Q7Wi3S3jhs4/4D1OewjrHrwtfoboLTeOjvsMmwMVoO9hmWOekCtk//L//z9EWAADA/Sh+MqnZ4AAAAASUVORK5CYII=\"/>
    ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 7
        echo "    ";
        ob_start();
        // line 8
        echo "        <span title=\"";
        echo twig_escape_filter($this->env, sprintf("%0.2f", $this->getAttribute($this->getContext($context, "collector"), "time")), "html", null, true);
        echo " ms\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "commandcount"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sncredis/images/redis.png"), "html", null, true);
        echo "\" alt=\"Redis\" /></span>
    <strong>Redis</strong>
    <span class=\"count\">
        <span>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "commandcount"), "html", null, true);
        echo "</span>
        <span>";
        // line 19
        echo twig_escape_filter($this->env, sprintf("%0.0f", $this->getAttribute($this->getContext($context, "collector"), "time")), "html", null, true);
        echo " ms</span>
    </span>
</span>
";
    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        // line 25
        echo "    <h2>Commands</h2>

    ";
        // line 27
        if ((!$this->getAttribute($this->getContext($context, "collector"), "commandcount"))) {
            // line 28
            echo "        <p><em>No commands.</em></p>
    ";
        } else {
            // line 30
            echo "        <ul class=\"alt\">
            ";
            // line 31
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "commands"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["command"]) {
                // line 32
                echo "                <li class=\"";
                echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute($this->getContext($context, "loop"), "index")), "html", null, true);
                if ($this->getAttribute($this->getContext($context, "command"), "error")) {
                    echo " error";
                }
                echo "\">
                    <div>
                        <code>";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "command"), "cmd"), "html", null, true);
                echo "</code>
                    </div>
                    <small>
                        <strong>Time</strong>: ";
                // line 37
                echo twig_escape_filter($this->env, sprintf("%0.2f", $this->getAttribute($this->getContext($context, "command"), "executionMS")), "html", null, true);
                echo " ms
                        <strong>Connection</strong>: ";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "command"), "conn"), "html", null, true);
                echo "
                        ";
                // line 39
                if ($this->getAttribute($this->getContext($context, "command"), "error")) {
                    echo "<strong>Error</strong>: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "command"), "error"), "html", null, true);
                }
                // line 40
                echo "                    </small>
                </li>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['command'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 43
            echo "        </ul>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SncRedisBundle:Collector:redis.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 40,  117 => 34,  209 => 84,  205 => 82,  192 => 78,  185 => 76,  178 => 71,  176 => 70,  171 => 67,  148 => 57,  134 => 50,  127 => 38,  109 => 39,  93 => 33,  78 => 25,  124 => 41,  88 => 30,  86 => 28,  80 => 26,  122 => 46,  116 => 42,  108 => 32,  102 => 37,  70 => 20,  51 => 13,  26 => 3,  150 => 43,  135 => 54,  129 => 50,  94 => 33,  85 => 28,  61 => 17,  47 => 11,  34 => 5,  157 => 55,  154 => 45,  140 => 52,  119 => 34,  113 => 40,  104 => 38,  79 => 28,  62 => 16,  59 => 15,  32 => 6,  29 => 4,  24 => 3,  73 => 21,  56 => 14,  54 => 14,  48 => 10,  45 => 9,  42 => 10,  36 => 8,  330 => 135,  327 => 134,  321 => 133,  319 => 132,  312 => 131,  308 => 130,  304 => 128,  302 => 127,  299 => 126,  296 => 125,  294 => 124,  286 => 122,  284 => 121,  280 => 119,  274 => 115,  270 => 113,  261 => 110,  257 => 109,  254 => 108,  247 => 106,  240 => 101,  238 => 100,  233 => 97,  231 => 96,  226 => 93,  224 => 92,  218 => 88,  214 => 86,  204 => 82,  202 => 81,  196 => 79,  194 => 76,  189 => 77,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  170 => 56,  164 => 59,  161 => 61,  158 => 57,  156 => 56,  151 => 53,  145 => 56,  142 => 48,  137 => 51,  132 => 49,  123 => 37,  118 => 36,  114 => 34,  111 => 37,  103 => 36,  100 => 39,  97 => 34,  92 => 37,  89 => 29,  72 => 17,  66 => 19,  52 => 12,  69 => 20,  63 => 18,  58 => 16,  37 => 12,  20 => 1,  139 => 47,  131 => 39,  128 => 43,  125 => 36,  121 => 40,  115 => 39,  99 => 34,  91 => 31,  82 => 27,  75 => 24,  67 => 19,  57 => 15,  50 => 12,  44 => 10,  39 => 8,  33 => 7,  30 => 4,  27 => 6,  272 => 125,  263 => 122,  259 => 121,  256 => 120,  251 => 119,  249 => 107,  236 => 108,  229 => 104,  222 => 100,  215 => 96,  208 => 84,  201 => 88,  186 => 76,  179 => 72,  172 => 68,  165 => 63,  155 => 56,  152 => 43,  144 => 50,  141 => 55,  138 => 48,  133 => 44,  130 => 48,  126 => 39,  120 => 39,  112 => 38,  110 => 37,  107 => 36,  101 => 33,  96 => 34,  90 => 32,  87 => 28,  84 => 28,  81 => 26,  77 => 25,  74 => 21,  71 => 21,  68 => 20,  65 => 18,  60 => 16,  55 => 13,  49 => 11,  46 => 10,  43 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}

<?php

/* OlogySocialBundle:Stats:post.html.twig */
class __TwigTemplate_cd5f0993ed2032254a9e9f3561ee06dd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:Stats:base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OlogySocialBundle:Stats:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<h1>Posts</h1>
<h2>General stats</h2>
<ul>
    <li>Total posts ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "total", array(), "array"), "html", null, true);
        echo " </li>
    <li>Text posts ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "text", array(), "array"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "textpercent", array(), "array"), "html", null, true);
        echo "%)</li>
    <li>Image posts ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "image", array(), "array"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "imagepercent", array(), "array"), "html", null, true);
        echo "%)</li>
    <li>Video posts ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "video", array(), "array"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "videopercent", array(), "array"), "html", null, true);
        echo "%)</li>
    <li>Audio posts ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "audio", array(), "array"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "stats"), "general", array(), "array"), "audiopercent", array(), "array"), "html", null, true);
        echo "%)</li>
</ul>

<h2>By categories</h2>
";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "stats"), "labels", array(), "array"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 15
            echo "<h3>";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "</h3>
<ul>
    <li>Total posts ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "total", array(), "array"), "html", null, true);
            echo " </li>
    <li>Text posts ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "text", array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "textpercent", array(), "array"), "html", null, true);
            echo "%)</li>
    <li>Image posts ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "image", array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "imagepercent", array(), "array"), "html", null, true);
            echo "%)</li>
    <li>Video posts ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "video", array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "videopercent", array(), "array"), "html", null, true);
            echo "%)</li>
    <li>Audio posts ";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "audio", array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "value"), "audiopercent", array(), "array"), "html", null, true);
            echo "%)</li>
</ul>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 24
        echo "
<h1>For Ology</h1>
";
        // line 26
        if (array_key_exists("ologyStats", $context)) {
            // line 27
            echo "    <ul>
        <li>Total posts ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "total", array(), "array"), "html", null, true);
            echo " </li>
        <li>Text posts ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "text", array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "textpercent", array(), "array"), "html", null, true);
            echo "%)</li>
        <li>Image posts ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "image", array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "imagepercent", array(), "array"), "html", null, true);
            echo "%)</li>
        <li>Video posts ";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "video", array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "videopercent", array(), "array"), "html", null, true);
            echo "%)</li>
        <li>Audio posts ";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "audio", array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyStats"), "audiopercent", array(), "array"), "html", null, true);
            echo "%)</li>
    </ul>
";
        } else {
            // line 35
            echo "<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_posts"), "html", null, true);
            echo "\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
            echo ">
    ";
            // line 36
            echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
            echo "
    <input type=\"submit\" value=\"OK\"/>
</form>
";
        }
        // line 40
        echo "
<h2>10 most popular posts</h2>
<ul>
    ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "stats"), "posts", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 44
            echo "    <li><b><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
            echo "</a></b> in ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
            echo " comments)</li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 46
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Stats:post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 44,  121 => 29,  112 => 26,  118 => 36,  106 => 34,  157 => 41,  232 => 67,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 43,  147 => 35,  105 => 34,  85 => 19,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 94,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 81,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  91 => 20,  66 => 19,  98 => 29,  96 => 29,  166 => 43,  160 => 47,  154 => 36,  143 => 54,  138 => 38,  101 => 33,  58 => 10,  36 => 8,  65 => 14,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 70,  245 => 84,  241 => 82,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 77,  217 => 71,  214 => 63,  203 => 72,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 44,  139 => 32,  114 => 27,  83 => 24,  76 => 19,  72 => 21,  68 => 19,  64 => 18,  56 => 10,  21 => 3,  209 => 74,  205 => 82,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 40,  152 => 58,  148 => 43,  145 => 56,  141 => 41,  134 => 39,  132 => 34,  127 => 30,  123 => 44,  109 => 37,  93 => 31,  90 => 26,  54 => 20,  133 => 31,  124 => 48,  111 => 31,  107 => 27,  80 => 27,  63 => 17,  60 => 15,  69 => 15,  61 => 23,  52 => 21,  50 => 9,  45 => 30,  43 => 12,  34 => 6,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 40,  193 => 79,  190 => 60,  188 => 77,  185 => 46,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 39,  137 => 40,  131 => 40,  126 => 43,  120 => 35,  117 => 28,  103 => 33,  99 => 32,  74 => 20,  47 => 13,  32 => 4,  39 => 8,  26 => 2,  97 => 21,  95 => 37,  88 => 24,  82 => 20,  78 => 21,  75 => 17,  71 => 17,  22 => 4,  44 => 8,  30 => 4,  20 => 2,  25 => 9,  49 => 10,  42 => 8,  40 => 7,  23 => 3,  27 => 4,  17 => 1,  92 => 27,  86 => 24,  79 => 18,  77 => 27,  57 => 13,  46 => 8,  37 => 14,  33 => 5,  29 => 3,  24 => 5,  19 => 1,  135 => 52,  129 => 50,  122 => 37,  116 => 42,  113 => 31,  108 => 24,  104 => 42,  102 => 41,  94 => 28,  89 => 30,  87 => 33,  84 => 32,  81 => 28,  73 => 26,  70 => 20,  67 => 18,  62 => 9,  59 => 16,  55 => 22,  51 => 14,  48 => 20,  41 => 7,  38 => 7,  35 => 7,  31 => 9,  28 => 5,);
    }
}

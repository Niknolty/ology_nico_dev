<?php

/* OlogySocialBundle:FrontEnd:rss.html.twig */
class __TwigTemplate_6027ae24ef85128b429d310514486ab4 extends Twig_Template
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
        echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><rss version=\"2.0\" xml:base=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "rss_link"), "html", null, true);
        echo "\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\">
  <channel>
    <title>";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, "rss_title"), "html", null, true);
        echo "</title>
    <link>";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, "rss_link"), "html", null, true);
        echo "</link>
    <description>";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, "rss_description"), "html", null, true);
        echo "</description>
    <language>";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, "rss_language"), "html", null, true);
        echo "</language>
    <lastBuildDate></lastBuildDate>    
    <pubDate></pubDate>
    <copyright></copyright>
    ";
        // line 10
        if ($this->getContext($context, "count_posts")) {
            // line 11
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 12
                echo "        <item>
            <title>";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
                echo "</title>
            <link>";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "link"), "html", null, true);
                echo "</link>
            <description>";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "description"), "html", null, true);
                echo "</description>
            ";
                // line 16
                if ($this->getAttribute($this->getContext($context, "post"), "leadImage")) {
                    // line 17
                    echo "                <leadImage>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "leadImage"), "html", null, true);
                    echo "</leadImage>
            ";
                }
                // line 19
                echo "            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "post"), "categories"));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 20
                    echo "                <category domain=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "category"), "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "category"), "title"), "html", null, true);
                    echo "</category>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 22
                echo "            <pubDate>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "pubDate"), "html", null, true);
                echo "</pubDate>
            <dc:creator>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "dc_creator"), "html", null, true);
                echo "</dc:creator>
            <guid isPermaLink=\"false\">";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "guid_isPermaLink"), "html", null, true);
                echo "</guid>
            ";
                // line 25
                if (($this->getAttribute($this->getContext($context, "count_comments"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") > 0)) {
                    // line 26
                    echo "            <comments>
                ";
                    // line 27
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "comments"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                        // line 28
                        echo "                    <comment date=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "date"), "html", null, true);
                        echo "\" author=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "user_firstname"), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "user_lastname"), "html", null, true);
                        echo "\" avatar=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "user_avatar"), "html", null, true);
                        echo "\">
                        ";
                        // line 29
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true);
                        echo "
                    </comment>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 32
                    echo "            </comments>
            ";
                }
                // line 34
                echo "        </item>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 36
            echo "    ";
        }
        echo "    
 </channel> 
</rss>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:rss.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 32,  251 => 82,  247 => 81,  238 => 79,  194 => 68,  191 => 67,  168 => 64,  294 => 107,  286 => 103,  283 => 102,  280 => 101,  277 => 100,  268 => 94,  263 => 92,  255 => 83,  243 => 80,  208 => 73,  202 => 71,  199 => 70,  186 => 66,  183 => 65,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  112 => 26,  118 => 41,  106 => 27,  157 => 41,  232 => 67,  228 => 6,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 99,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 78,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 69,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 28,  53 => 11,  66 => 17,  98 => 29,  166 => 54,  160 => 47,  154 => 36,  143 => 54,  138 => 38,  101 => 25,  36 => 3,  65 => 24,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 84,  241 => 85,  237 => 77,  233 => 76,  229 => 81,  225 => 5,  221 => 78,  217 => 72,  214 => 76,  203 => 71,  180 => 22,  175 => 8,  169 => 56,  167 => 159,  164 => 158,  155 => 49,  114 => 40,  83 => 24,  76 => 19,  72 => 19,  68 => 19,  64 => 16,  56 => 14,  21 => 3,  209 => 74,  205 => 72,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 61,  152 => 58,  148 => 56,  145 => 56,  141 => 36,  134 => 34,  132 => 43,  127 => 42,  123 => 44,  109 => 37,  93 => 23,  90 => 31,  54 => 12,  133 => 31,  124 => 44,  111 => 31,  80 => 27,  60 => 15,  61 => 23,  52 => 13,  45 => 18,  34 => 6,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 70,  195 => 68,  193 => 67,  190 => 60,  188 => 66,  185 => 65,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 58,  153 => 58,  146 => 55,  142 => 39,  137 => 44,  126 => 43,  120 => 35,  117 => 28,  103 => 26,  74 => 20,  47 => 13,  32 => 4,  26 => 8,  97 => 24,  95 => 33,  88 => 22,  78 => 21,  71 => 24,  22 => 4,  25 => 4,  42 => 10,  40 => 7,  23 => 3,  17 => 1,  92 => 27,  86 => 24,  79 => 18,  29 => 2,  24 => 6,  19 => 2,  69 => 18,  63 => 17,  58 => 10,  49 => 12,  43 => 12,  37 => 14,  20 => 2,  139 => 32,  131 => 40,  128 => 45,  125 => 42,  121 => 29,  115 => 39,  107 => 27,  99 => 34,  96 => 29,  91 => 20,  82 => 23,  77 => 20,  75 => 25,  57 => 13,  50 => 10,  46 => 10,  44 => 11,  39 => 4,  33 => 3,  30 => 9,  27 => 4,  135 => 52,  129 => 50,  122 => 40,  116 => 39,  113 => 31,  108 => 36,  104 => 42,  102 => 41,  94 => 28,  89 => 30,  87 => 30,  84 => 29,  81 => 28,  73 => 20,  70 => 20,  67 => 18,  62 => 15,  59 => 14,  55 => 12,  51 => 14,  48 => 9,  41 => 8,  38 => 7,  35 => 6,  31 => 5,  28 => 5,);
    }
}

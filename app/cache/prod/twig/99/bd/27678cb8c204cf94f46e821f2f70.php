<?php

/* OlogySocialBundle:Stats:users.html.twig */
class __TwigTemplate_99bd27678cb8c204cf94f46e821f2f70 extends Twig_Template
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
        echo "<h1>Users</h1>
<a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_all_users"), "html", null, true);
        echo "\">All users</a>

<h2>Activity</h2>
Average number of ologies created by user: ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "avg_ology_created_per_user", array(), "array"), "html", null, true);
        echo "<br />
Average number of ologies joined by user: ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "avg_ology_joined_per_user", array(), "array"), "html", null, true);
        echo "<br />

<br/>
Number of returning users this week: ";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nb_users_login_last_week", array(), "array"), "html", null, true);
        echo "<br />
Number of returning users this month: ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nb_users_login_last_month", array(), "array"), "html", null, true);
        echo "<br />
Number of returning users this year: ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nb_users_login_last_year", array(), "array"), "html", null, true);
        echo "<br />

<h2>Top 15 Ology Joiners</h2>
<ul>
";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "stats"), "best_joiners", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["ologyJoinStat"]) {
            // line 18
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ologyJoinStat"), 0, array(), "array"), "user"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ologyJoinStat"), 0, array(), "array"), "user"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ologyJoinStat"), 0, array(), "array"), "user"), "lastName"), "html", null, true);
            echo "</a>: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyJoinStat"), "n", array(), "array"), "html", null, true);
            echo " ologies joined</li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ologyJoinStat'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "</ul>

<h2>Top 15 Ology Founders</h2>
<ul>
";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "stats"), "best_founders", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["ologyCreateStat"]) {
            // line 25
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ologyCreateStat"), 0, array(), "array"), "founder"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ologyCreateStat"), 0, array(), "array"), "founder"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ologyCreateStat"), 0, array(), "array"), "founder"), "lastName"), "html", null, true);
            echo "</a>: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ologyCreateStat"), "n", array(), "array"), "html", null, true);
            echo " ologies founded</li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ologyCreateStat'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 27
        echo "</ul>

<h2>Top 15 Posters</h2>
<ul>
";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "stats"), "best_posters", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["postStat"]) {
            // line 32
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "postStat"), 0, array(), "array"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "postStat"), 0, array(), "array"), "author"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "postStat"), 0, array(), "array"), "author"), "lastName"), "html", null, true);
            echo "</a>: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "postStat"), "n", array(), "array"), "html", null, true);
            echo " posts</li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['postStat'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 34
        echo "</ul>

<h2>Top 15 Commenters</h2>
<ul>
";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "stats"), "best_commenters", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["commentStat"]) {
            // line 39
            echo "        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "commentStat"), 0, array(), "array"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "commentStat"), 0, array(), "array"), "author"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "commentStat"), 0, array(), "array"), "author"), "lastName"), "html", null, true);
            echo "</a>: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "commentStat"), "n", array(), "array"), "html", null, true);
            echo " comments</li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['commentStat'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 41
        echo "</ul>


";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Stats:users.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 41,  232 => 67,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 43,  147 => 42,  105 => 30,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 94,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 81,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  91 => 35,  66 => 10,  98 => 29,  96 => 29,  166 => 49,  160 => 47,  154 => 45,  143 => 54,  138 => 38,  101 => 29,  58 => 14,  36 => 8,  65 => 18,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 70,  245 => 84,  241 => 82,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 77,  217 => 71,  214 => 63,  203 => 72,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 44,  139 => 59,  114 => 40,  83 => 20,  76 => 19,  72 => 19,  68 => 19,  64 => 18,  56 => 13,  21 => 3,  209 => 74,  205 => 82,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 60,  152 => 58,  148 => 43,  145 => 56,  141 => 41,  134 => 39,  132 => 34,  127 => 46,  123 => 44,  109 => 37,  93 => 47,  90 => 26,  54 => 20,  133 => 44,  124 => 48,  111 => 31,  107 => 27,  80 => 27,  63 => 17,  60 => 19,  69 => 19,  61 => 17,  52 => 12,  50 => 13,  45 => 30,  43 => 12,  34 => 2,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 40,  193 => 79,  190 => 60,  188 => 77,  185 => 38,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 39,  137 => 40,  131 => 48,  126 => 43,  120 => 35,  117 => 32,  103 => 26,  99 => 28,  74 => 20,  47 => 13,  32 => 4,  39 => 11,  26 => 2,  97 => 38,  95 => 37,  88 => 24,  82 => 20,  78 => 21,  75 => 24,  71 => 15,  22 => 4,  44 => 10,  30 => 4,  20 => 2,  25 => 9,  49 => 10,  42 => 8,  40 => 9,  23 => 3,  27 => 4,  17 => 1,  92 => 25,  86 => 24,  79 => 22,  77 => 21,  57 => 13,  46 => 11,  37 => 8,  33 => 3,  29 => 3,  24 => 5,  19 => 1,  135 => 52,  129 => 50,  122 => 36,  116 => 42,  113 => 31,  108 => 40,  104 => 42,  102 => 41,  94 => 28,  89 => 26,  87 => 33,  84 => 32,  81 => 25,  73 => 20,  70 => 20,  67 => 18,  62 => 9,  59 => 16,  55 => 15,  51 => 14,  48 => 11,  41 => 10,  38 => 7,  35 => 10,  31 => 9,  28 => 5,);
    }
}

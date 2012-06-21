<?php

/* OlogySocialBundle:Stats:base.html.twig */
class __TwigTemplate_dfe68b602219a4cd22f69dea02ad860a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>The ugly (but useful) stats page | My.Ology</title>
        <link rel=\"shortcut icon\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/ology_favicon.png"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <table><tr>
            <td><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_general"), "html", null, true);
        echo "\">General</a></td>
            <td><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_users"), "html", null, true);
        echo "\">Users</td>
            <td><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_labels"), "html", null, true);
        echo "\">Labels</td>
            <td><a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_ologies"), "html", null, true);
        echo "\">Ologies</td>
            <td><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_posts"), "html", null, true);
        echo "\">Posts</td>
            <td><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_comments"), "html", null, true);
        echo "\">Comments</td>
            <td><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_invites"), "html", null, true);
        echo "\">Invites</td>
            <td><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_notifs"), "html", null, true);
        echo "\">Notifications</td>
            <td><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stats_follow"), "html", null, true);
        echo "\">Follows</td>
        </tr></table>
        ";
        // line 19
        $this->displayBlock('body', $context, $blocks);
        // line 20
        echo "    </body>
</html>
";
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Stats:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 36,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 94,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 81,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  91 => 35,  66 => 10,  98 => 26,  96 => 29,  166 => 49,  160 => 47,  154 => 45,  143 => 54,  138 => 39,  101 => 29,  58 => 14,  36 => 7,  65 => 13,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 80,  245 => 84,  241 => 82,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 77,  217 => 71,  214 => 70,  203 => 72,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 19,  72 => 19,  68 => 19,  64 => 10,  56 => 18,  21 => 3,  209 => 74,  205 => 82,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 60,  152 => 58,  148 => 43,  145 => 56,  141 => 40,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 37,  93 => 47,  90 => 22,  54 => 20,  133 => 44,  124 => 48,  111 => 31,  107 => 43,  80 => 27,  63 => 17,  60 => 19,  69 => 18,  61 => 8,  52 => 10,  50 => 13,  45 => 30,  43 => 12,  34 => 2,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 43,  120 => 35,  117 => 40,  103 => 36,  99 => 28,  74 => 16,  47 => 13,  32 => 4,  39 => 11,  26 => 2,  97 => 38,  95 => 37,  88 => 25,  82 => 31,  78 => 18,  75 => 24,  71 => 15,  22 => 4,  44 => 6,  30 => 4,  20 => 2,  25 => 9,  49 => 10,  42 => 11,  40 => 5,  23 => 3,  27 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 22,  77 => 21,  57 => 13,  46 => 11,  37 => 8,  33 => 3,  29 => 3,  24 => 5,  19 => 1,  135 => 52,  129 => 50,  122 => 36,  116 => 42,  113 => 39,  108 => 40,  104 => 42,  102 => 41,  94 => 28,  89 => 26,  87 => 33,  84 => 32,  81 => 25,  73 => 22,  70 => 20,  67 => 11,  62 => 9,  59 => 16,  55 => 15,  51 => 14,  48 => 12,  41 => 10,  38 => 5,  35 => 10,  31 => 9,  28 => 5,);
    }
}

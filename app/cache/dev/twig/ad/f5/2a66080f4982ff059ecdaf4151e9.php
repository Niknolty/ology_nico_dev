<?php

/* OlogySocialBundle:Stats:invite.html.twig */
class __TwigTemplate_adf52a66080f4982ff059ecdaf4151e9 extends Twig_Template
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
        echo "<h1>Invites</h1>
    <h2>Overall</h2>
        Total sent: ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "total"), "nbTotal"), "html", null, true);
        echo " <br />
        Total pending: ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "total"), "nbPending"), "html", null, true);
        echo "<br />
        Total accepted: ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "total"), "nbAccepted"), "html", null, true);
        echo "<br />

    <h2>Per Ology</h2>
    <table>
        <tr>
            <td></td><td># sent</td><td># accepted</td><td># pending</td>
        </tr>
        ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "total"), "arrayNbInvites"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 15
            echo "        <tr>
            <td>";
            // line 16
            if (($this->getContext($context, "key") != "general")) {
                // line 17
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "total"), "ologies"), $this->getContext($context, "key"), array(), "array"), "name"), "html", null, true);
                echo "<br/>
            ";
            } else {
                // line 19
                echo "                ";
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo "<br/>
            ";
            }
            // line 21
            echo "            </td>
            <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "total"), "arrayNbInvites"), $this->getContext($context, "key"), array(), "array"), "total", array(), "array"), "html", null, true);
            echo "</td>
            <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "total"), "arrayNbInvites"), $this->getContext($context, "key"), array(), "array"), "accepted", array(), "array"), "html", null, true);
            echo "</td>
            <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "total"), "arrayNbInvites"), $this->getContext($context, "key"), array(), "array"), "pending", array(), "array"), "html", null, true);
            echo "</td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 27
        echo "    </table>

    <h2>Per Users</h2>
    <table>
        <tr><td>From</td><td># sent</td><td># accepted</td><td># pending</td></tr>
    ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "perUser"));
        foreach ($context['_seq'] as $context["_key"] => $context["stat"]) {
            // line 33
            echo "        <tr>
            <td><a href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "stat"), 0, array(), "array"), "fromUser"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "stat"), 0, array(), "array"), "fromUser"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "stat"), 0, array(), "array"), "fromUser"), "lastName"), "html", null, true);
            echo "</a></td>
            <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stat"), "total", array(), "array"), "html", null, true);
            echo "</td>
            <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stat"), "accepted", array(), "array"), "html", null, true);
            echo "</td>
            <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stat"), "pending", array(), "array"), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stat'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 40
        echo "    </table>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Stats:invite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 36,  106 => 34,  157 => 41,  232 => 67,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 43,  147 => 42,  105 => 30,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 94,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 81,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  66 => 19,  98 => 29,  166 => 49,  160 => 47,  154 => 45,  143 => 54,  138 => 38,  101 => 29,  36 => 8,  65 => 18,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 70,  245 => 84,  241 => 82,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 77,  217 => 71,  214 => 63,  203 => 72,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 44,  114 => 35,  83 => 24,  76 => 19,  72 => 21,  68 => 19,  64 => 18,  56 => 13,  21 => 3,  209 => 74,  205 => 82,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 60,  152 => 58,  148 => 43,  145 => 56,  141 => 41,  134 => 39,  132 => 34,  127 => 46,  123 => 44,  109 => 37,  93 => 47,  90 => 26,  54 => 20,  133 => 44,  124 => 48,  111 => 31,  80 => 27,  60 => 17,  61 => 17,  52 => 10,  45 => 30,  34 => 2,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 40,  193 => 79,  190 => 60,  188 => 77,  185 => 38,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 39,  137 => 40,  126 => 43,  120 => 35,  117 => 32,  103 => 33,  74 => 20,  47 => 13,  32 => 4,  26 => 2,  97 => 38,  95 => 37,  88 => 24,  78 => 21,  71 => 15,  22 => 4,  25 => 9,  42 => 8,  40 => 9,  23 => 3,  17 => 1,  92 => 27,  86 => 24,  79 => 23,  29 => 3,  24 => 5,  19 => 1,  69 => 19,  63 => 17,  58 => 16,  49 => 10,  43 => 12,  37 => 6,  20 => 2,  139 => 59,  131 => 40,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  107 => 27,  99 => 32,  96 => 29,  91 => 35,  82 => 20,  77 => 21,  75 => 22,  57 => 13,  50 => 13,  46 => 11,  44 => 10,  39 => 8,  33 => 5,  30 => 4,  27 => 4,  135 => 52,  129 => 50,  122 => 37,  116 => 42,  113 => 31,  108 => 40,  104 => 42,  102 => 41,  94 => 28,  89 => 26,  87 => 33,  84 => 32,  81 => 25,  73 => 20,  70 => 20,  67 => 18,  62 => 9,  59 => 16,  55 => 15,  51 => 14,  48 => 11,  41 => 7,  38 => 7,  35 => 7,  31 => 9,  28 => 5,);
    }
}

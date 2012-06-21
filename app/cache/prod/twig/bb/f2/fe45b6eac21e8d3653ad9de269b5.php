<?php

/* OlogySocialBundle:Post:get.html.twig */
class __TwigTemplate_bbf2fe45b6eac21e8d3653ad9de269b5 extends Twig_Template
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
        echo "<span style=\"display: inline-block; border: 1px solid #000000;\">
<h1 style=\"text-align: center;\"><a href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_get", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
        echo "</a></h1>
<h3>Posted in <a href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_get", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
        echo "</a></h3>
<h3>Written by ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "author"), "html", null, true);
        echo " on ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "creationDate"), "m/d/Y H:m:s"), "html", null, true);
        echo " </h3>
";
        // line 5
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 3)) {
            // line 6
            echo "<div style=\"text-align: center;\">
    <img src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_medium_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))), "html", null, true);
            echo "\"  />
</div>
";
        }
        // line 10
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 4)) {
            // line 11
            echo "  <iframe src=\"http://www.youtube.com/embed/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "videoUrl"), "html", null, true);
            echo "\" frameborder=\"0\" allowfullscreen></iframe>
";
        }
        // line 13
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 5)) {
            // line 14
            echo "<audio controls=\"controls\">
  <source src=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_audio_path") . $this->getAttribute($this->getContext($context, "post"), "audioUrl"))), "html", null, true);
            echo "\" type=\"audio/ogg\" />
  Your browser does not support the audio element. Sorry.
</audio>
";
        }
        // line 18
        echo "                                              
    <p>";
        // line 19
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "textContent"), "html", null, true));
        echo "</p>
<br />
";
        // line 21
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "ologylabels")) > 0)) {
            // line 22
            echo "Category (label): ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "ologylabels"), 0, array(), "array"), "label"), "name"), "html", null, true);
            echo "
";
        }
        // line 24
        echo "<br />
Commented ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesCommented"), "html", null, true);
        echo " times
</span>

";
        // line 28
        if (array_key_exists("comments", $context)) {
            // line 29
            echo "<br /><br /><br /><br />
<table>
<tr>
    <td><b>User</b></td>
    <td><b>Comment</b></td>
    <td><b>Date</b></td>
</tr>
";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 37
                echo "<tr>
    <td>UserXXX</td>
    <td>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true);
                echo "</td>
    <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "creationDate"), "m/d/Y h:m:s"), "html", null, true);
                echo "</td>
</tr>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 43
            echo "</table>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:get.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 36,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 94,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 81,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  91 => 35,  66 => 10,  98 => 26,  96 => 29,  166 => 49,  160 => 47,  154 => 45,  143 => 54,  138 => 39,  101 => 29,  58 => 14,  36 => 8,  65 => 13,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 80,  245 => 84,  241 => 82,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 77,  217 => 71,  214 => 70,  203 => 72,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 22,  72 => 19,  68 => 14,  64 => 9,  56 => 18,  21 => 3,  209 => 74,  205 => 82,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 60,  152 => 58,  148 => 43,  145 => 56,  141 => 40,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 37,  93 => 47,  90 => 22,  54 => 20,  133 => 44,  124 => 48,  111 => 31,  107 => 43,  80 => 27,  63 => 29,  60 => 19,  69 => 18,  61 => 8,  52 => 21,  50 => 13,  45 => 12,  43 => 7,  34 => 7,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 43,  120 => 35,  117 => 40,  103 => 36,  99 => 28,  74 => 16,  47 => 17,  32 => 4,  39 => 9,  26 => 3,  97 => 38,  95 => 37,  88 => 25,  82 => 31,  78 => 18,  75 => 24,  71 => 15,  22 => 4,  44 => 15,  30 => 4,  20 => 2,  25 => 3,  49 => 10,  42 => 5,  40 => 6,  23 => 4,  27 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 22,  77 => 21,  57 => 13,  46 => 11,  37 => 3,  33 => 6,  29 => 6,  24 => 3,  19 => 2,  135 => 52,  129 => 50,  122 => 36,  116 => 42,  113 => 39,  108 => 40,  104 => 42,  102 => 41,  94 => 28,  89 => 26,  87 => 33,  84 => 32,  81 => 25,  73 => 22,  70 => 20,  67 => 10,  62 => 15,  59 => 14,  55 => 9,  51 => 11,  48 => 12,  41 => 10,  38 => 5,  35 => 9,  31 => 7,  28 => 5,);
    }
}

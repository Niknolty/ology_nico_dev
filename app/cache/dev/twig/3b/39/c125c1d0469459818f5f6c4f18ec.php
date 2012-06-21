<?php

/* OlogySocialBundle:Post:post_byology.html.twig */
class __TwigTemplate_3b39c125c1d0469459818f5f6c4f18ec extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 2
            if ($this->getAttribute($this->getContext($context, "post"), "isProfessional")) {
                // line 3
                echo "    ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
            } else {
                // line 5
                echo "    ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"), "displayology" => true)));
            }
            // line 6
            echo "     
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 8
        echo "
";
        // line 9
        if ($this->getContext($context, "scroll")) {
            // line 10
            echo "    <div>
      <a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_getforology", array("offset" => $this->getContext($context, "nextPage"), "n" => $this->getContext($context, "n"), "id" => $this->getContext($context, "ologyId"))), "html", null, true);
            echo "\" class=\"navigation\" >NEXT</a>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:post_byology.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 36,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 94,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 81,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  66 => 10,  98 => 26,  166 => 49,  160 => 47,  154 => 45,  143 => 54,  138 => 39,  101 => 29,  36 => 3,  65 => 13,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 80,  245 => 84,  241 => 82,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 77,  217 => 71,  214 => 70,  203 => 72,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  114 => 40,  83 => 20,  76 => 22,  72 => 19,  68 => 14,  64 => 10,  56 => 18,  21 => 3,  209 => 74,  205 => 82,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 60,  152 => 58,  148 => 43,  145 => 56,  141 => 40,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 37,  93 => 47,  90 => 22,  54 => 20,  133 => 44,  124 => 48,  111 => 31,  80 => 27,  60 => 19,  61 => 8,  52 => 21,  45 => 12,  34 => 2,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 54,  137 => 51,  126 => 43,  120 => 35,  117 => 40,  103 => 36,  74 => 16,  47 => 17,  32 => 4,  26 => 3,  97 => 38,  95 => 37,  88 => 25,  78 => 18,  71 => 15,  22 => 4,  25 => 3,  42 => 5,  40 => 5,  23 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 22,  29 => 6,  24 => 3,  19 => 2,  69 => 18,  63 => 29,  58 => 14,  49 => 10,  43 => 7,  37 => 8,  20 => 2,  139 => 59,  131 => 48,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  107 => 43,  99 => 28,  96 => 29,  91 => 35,  82 => 31,  77 => 21,  75 => 24,  57 => 13,  50 => 13,  46 => 11,  44 => 6,  39 => 9,  33 => 7,  30 => 4,  27 => 4,  135 => 52,  129 => 50,  122 => 36,  116 => 42,  113 => 39,  108 => 40,  104 => 42,  102 => 41,  94 => 28,  89 => 26,  87 => 33,  84 => 32,  81 => 25,  73 => 22,  70 => 20,  67 => 11,  62 => 9,  59 => 8,  55 => 9,  51 => 11,  48 => 12,  41 => 10,  38 => 5,  35 => 9,  31 => 7,  28 => 5,);
    }
}

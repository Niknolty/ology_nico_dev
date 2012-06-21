<?php

/* OlogySocialBundle:FrontEnd:dock.html.twig */
class __TwigTemplate_06040b1103188491216722514e0ae132 extends Twig_Template
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
        if ($this->getContext($context, "loggedIn")) {
            // line 2
            echo "<div id='menu'>
    ";
            // line 3
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "userOlogies"));
            foreach ($context['_seq'] as $context["_key"] => $context["userOlogy"]) {
                // line 4
                echo "        ";
                if ($this->getAttribute($this->getContext($context, "userOlogy", true), "stub", array(), "any", true, true)) {
                    // line 5
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => $this->getAttribute($this->getContext($context, "userOlogy"), "stub"))), "html", null, true);
                    echo "\">
                <img src=\"";
                    // line 6
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/img/channels/" . $this->getAttribute($this->getContext($context, "userOlogy"), "imageLogo"))), "html", null, true);
                    echo "\" width=\"50\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "userOlogy"), "name"), "html", null, true);
                    echo "\" />
            </a>
        ";
                } else {
                    // line 9
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "userOlogy"), "id"), "slug" => $this->getAttribute($this->getContext($context, "userOlogy"), "slug"))), "html", null, true);
                    echo "\">
                <img src=\"";
                    // line 10
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_medium_image_path") . $this->getAttribute($this->getContext($context, "userOlogy"), "imageUrl"))), "html", null, true);
                    echo "\" width=\"50\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "userOlogy"), "name"), "html", null, true);
                    echo "\" />
            </a>
        ";
                }
                // line 13
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userOlogy'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 14
            echo "</div>
";
            // line 15
            $this->env->loadTemplate("OlogySocialBundle:Tips:dock_tip.html.twig")->display($context);
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:dock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 13,  34 => 6,  29 => 5,  24 => 5,  996 => 291,  991 => 290,  989 => 289,  986 => 288,  970 => 284,  948 => 283,  946 => 282,  943 => 281,  931 => 276,  927 => 275,  922 => 274,  920 => 273,  917 => 272,  908 => 266,  902 => 264,  899 => 263,  894 => 262,  892 => 261,  889 => 260,  882 => 255,  873 => 253,  869 => 252,  866 => 251,  863 => 250,  861 => 249,  858 => 248,  850 => 244,  848 => 243,  845 => 242,  838 => 237,  835 => 236,  827 => 231,  823 => 230,  819 => 229,  816 => 228,  814 => 227,  811 => 226,  803 => 222,  801 => 221,  798 => 220,  790 => 214,  788 => 213,  785 => 212,  777 => 208,  774 => 207,  772 => 206,  769 => 205,  748 => 201,  745 => 200,  742 => 199,  739 => 198,  737 => 197,  734 => 196,  726 => 190,  723 => 189,  721 => 188,  718 => 187,  711 => 184,  708 => 183,  705 => 182,  697 => 178,  694 => 177,  692 => 176,  689 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 98,  490 => 89,  485 => 88,  474 => 84,  471 => 83,  455 => 79,  450 => 77,  434 => 73,  429 => 71,  419 => 65,  413 => 63,  400 => 59,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  378 => 53,  366 => 49,  361 => 48,  349 => 45,  335 => 39,  323 => 37,  304 => 33,  300 => 32,  292 => 30,  287 => 29,  285 => 28,  267 => 21,  259 => 17,  256 => 16,  250 => 14,  228 => 5,  219 => 288,  216 => 287,  211 => 280,  196 => 248,  193 => 247,  188 => 241,  183 => 236,  178 => 226,  173 => 220,  170 => 219,  162 => 211,  157 => 204,  152 => 195,  149 => 193,  147 => 187,  137 => 175,  132 => 168,  129 => 167,  127 => 161,  124 => 160,  119 => 153,  112 => 141,  99 => 125,  97 => 114,  82 => 77,  79 => 76,  69 => 42,  62 => 21,  57 => 12,  54 => 11,  49 => 2,  346 => 132,  340 => 129,  332 => 127,  324 => 125,  319 => 35,  311 => 117,  299 => 113,  297 => 112,  290 => 108,  278 => 105,  270 => 22,  266 => 102,  262 => 101,  247 => 95,  198 => 259,  186 => 67,  181 => 65,  176 => 63,  165 => 212,  163 => 56,  154 => 50,  150 => 49,  146 => 48,  138 => 46,  134 => 174,  130 => 44,  122 => 154,  96 => 30,  93 => 29,  91 => 28,  85 => 27,  78 => 26,  75 => 25,  70 => 23,  65 => 22,  63 => 21,  47 => 10,  35 => 9,  27 => 6,  23 => 4,  19 => 2,  61 => 14,  42 => 9,  28 => 6,  22 => 3,  20 => 2,  17 => 1,  352 => 46,  347 => 44,  344 => 43,  282 => 27,  276 => 97,  274 => 104,  257 => 100,  253 => 15,  249 => 96,  245 => 12,  241 => 92,  237 => 7,  233 => 6,  229 => 89,  225 => 74,  221 => 73,  217 => 85,  209 => 272,  200 => 41,  190 => 68,  185 => 239,  180 => 235,  175 => 225,  167 => 217,  161 => 70,  158 => 69,  155 => 196,  153 => 67,  148 => 65,  139 => 181,  126 => 43,  120 => 45,  117 => 147,  114 => 146,  111 => 37,  109 => 140,  83 => 20,  80 => 19,  76 => 17,  72 => 43,  68 => 15,  64 => 15,  60 => 13,  56 => 12,  52 => 3,  44 => 12,  37 => 10,  33 => 8,  31 => 8,  26 => 4,  502 => 92,  498 => 91,  494 => 90,  483 => 167,  479 => 86,  476 => 85,  470 => 161,  467 => 160,  465 => 159,  462 => 158,  458 => 157,  453 => 78,  447 => 153,  444 => 152,  441 => 151,  439 => 150,  435 => 148,  432 => 72,  430 => 146,  424 => 142,  422 => 141,  416 => 64,  410 => 134,  407 => 61,  405 => 60,  401 => 130,  390 => 125,  381 => 123,  374 => 51,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  357 => 47,  354 => 137,  350 => 113,  345 => 110,  342 => 109,  339 => 108,  336 => 128,  333 => 106,  330 => 105,  327 => 126,  325 => 103,  321 => 101,  315 => 99,  309 => 97,  307 => 116,  303 => 115,  298 => 92,  295 => 31,  289 => 89,  286 => 107,  284 => 87,  280 => 86,  275 => 83,  272 => 23,  268 => 80,  258 => 79,  248 => 13,  243 => 73,  235 => 69,  232 => 68,  226 => 4,  223 => 3,  220 => 86,  214 => 281,  206 => 271,  203 => 269,  201 => 260,  195 => 40,  191 => 242,  182 => 51,  179 => 50,  177 => 49,  174 => 48,  171 => 60,  169 => 59,  164 => 158,  160 => 205,  144 => 186,  142 => 182,  135 => 37,  131 => 35,  115 => 38,  113 => 32,  107 => 134,  104 => 133,  102 => 126,  98 => 24,  94 => 113,  92 => 98,  89 => 97,  87 => 83,  84 => 82,  77 => 71,  74 => 70,  67 => 27,  59 => 20,  53 => 17,  51 => 6,  48 => 10,  40 => 11,  32 => 3,);
    }
}

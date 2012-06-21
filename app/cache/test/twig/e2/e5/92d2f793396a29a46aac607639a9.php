<?php

/* OlogySocialBundle:FrontEnd:reologized.html.twig */
class __TwigTemplate_e2e592d2f793396a29a46aac607639a9 extends Twig_Template
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
        if (((!(null === $this->getAttribute($this->getContext($context, "post"), "postLink"))) && ($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postLink"), "containerId") != $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id")))) {
            // line 2
            echo "    <div class=\"unreologize\">
        <img src=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/reologize_icon_gray.jpg"), "html", null, true);
            echo "\">
        <div class=\"reologize-text-button\">
        ";
            // line 5
            if ($this->getAttribute($this->getContext($context, "post"), "canUnreOlogize")) {
                // line 6
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_unreologize", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "ologyId" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postLink"), "containerId"), "userId" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postLink"), "user"), "id"))), "html", null, true);
                echo "\">
                <span class=\"undo-reologize\">ReOlogized</span>
            </a>
        ";
            } else {
                // line 10
                echo "            <span>ReOlogized</span>
        ";
            }
            // line 12
            echo "        </div>
        <div class=\"reologize-text\">
            ";
            // line 14
            if ((array_key_exists("inAPost", $context) && ($this->getContext($context, "inAPost") == true))) {
                // line 15
                echo "                by <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postLink"), "user"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postLink"), "user"), "firstName"), "html", null, true);
                echo "</a><br>
            ";
            } else {
                // line 16
                echo "   
                by <a href=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postLink"), "user"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postLink"), "user"), "firstName"), "html", null, true);
                echo "</a><br>
                from <a href=\"";
                // line 18
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), 11, false, "..."), "html", null, true);
                echo "</a>
            ";
            }
            // line 20
            echo "        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:reologized.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 12,  29 => 6,  128 => 34,  125 => 33,  103 => 27,  24 => 3,  426 => 142,  418 => 138,  415 => 137,  412 => 136,  409 => 135,  395 => 127,  387 => 125,  381 => 123,  375 => 121,  373 => 120,  367 => 119,  353 => 113,  339 => 107,  333 => 105,  330 => 104,  326 => 102,  317 => 100,  314 => 99,  312 => 98,  301 => 92,  298 => 91,  279 => 84,  271 => 82,  263 => 80,  261 => 79,  255 => 78,  235 => 68,  230 => 67,  224 => 65,  213 => 61,  205 => 57,  197 => 54,  166 => 45,  145 => 39,  116 => 30,  88 => 22,  55 => 16,  95 => 36,  90 => 34,  71 => 20,  66 => 23,  45 => 14,  43 => 9,  25 => 4,  58 => 17,  50 => 14,  46 => 10,  36 => 33,  32 => 8,  21 => 3,  38 => 11,  30 => 11,  996 => 291,  991 => 290,  989 => 289,  986 => 288,  970 => 284,  948 => 283,  946 => 282,  943 => 281,  931 => 276,  927 => 275,  922 => 274,  920 => 273,  917 => 272,  908 => 266,  902 => 264,  899 => 263,  894 => 262,  892 => 261,  889 => 260,  882 => 255,  873 => 253,  869 => 252,  866 => 251,  863 => 250,  861 => 249,  858 => 248,  850 => 244,  848 => 243,  845 => 242,  838 => 237,  835 => 236,  827 => 231,  823 => 230,  819 => 229,  816 => 228,  814 => 227,  811 => 226,  803 => 222,  801 => 221,  798 => 220,  790 => 214,  788 => 213,  785 => 212,  777 => 208,  774 => 207,  772 => 206,  769 => 205,  748 => 201,  745 => 200,  742 => 199,  739 => 198,  737 => 197,  734 => 196,  726 => 190,  723 => 189,  721 => 188,  718 => 187,  711 => 184,  708 => 183,  705 => 182,  697 => 178,  694 => 177,  692 => 176,  689 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 98,  502 => 92,  498 => 91,  494 => 90,  490 => 89,  485 => 88,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  455 => 79,  453 => 78,  450 => 77,  434 => 73,  432 => 72,  429 => 71,  419 => 65,  416 => 64,  413 => 63,  407 => 134,  405 => 60,  400 => 129,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  378 => 53,  374 => 51,  366 => 49,  361 => 116,  349 => 112,  335 => 39,  323 => 37,  304 => 94,  300 => 32,  295 => 31,  292 => 30,  287 => 29,  285 => 28,  272 => 23,  267 => 21,  259 => 17,  256 => 16,  250 => 14,  248 => 13,  219 => 288,  216 => 62,  211 => 280,  206 => 271,  201 => 260,  196 => 248,  193 => 247,  191 => 242,  188 => 53,  183 => 51,  178 => 226,  173 => 220,  170 => 219,  162 => 211,  157 => 44,  152 => 42,  149 => 41,  147 => 187,  144 => 186,  132 => 168,  129 => 35,  127 => 34,  124 => 33,  119 => 153,  112 => 141,  99 => 26,  97 => 23,  87 => 22,  82 => 77,  79 => 21,  77 => 71,  69 => 17,  67 => 27,  62 => 15,  357 => 115,  354 => 137,  346 => 111,  340 => 129,  336 => 106,  332 => 127,  327 => 126,  324 => 101,  319 => 35,  311 => 117,  307 => 95,  303 => 115,  299 => 113,  297 => 112,  290 => 87,  286 => 85,  278 => 105,  270 => 22,  266 => 81,  262 => 101,  247 => 95,  226 => 4,  223 => 3,  220 => 86,  198 => 259,  181 => 65,  176 => 63,  165 => 212,  154 => 43,  150 => 49,  142 => 182,  138 => 35,  130 => 44,  122 => 154,  115 => 38,  104 => 28,  102 => 27,  93 => 29,  85 => 27,  78 => 26,  75 => 25,  70 => 23,  65 => 16,  63 => 18,  59 => 20,  47 => 15,  35 => 7,  27 => 5,  23 => 4,  19 => 2,  61 => 23,  53 => 17,  22 => 3,  20 => 13,  17 => 1,  352 => 46,  347 => 44,  344 => 110,  282 => 27,  276 => 83,  274 => 104,  257 => 100,  253 => 15,  249 => 96,  245 => 73,  241 => 92,  237 => 69,  233 => 6,  229 => 89,  225 => 74,  221 => 73,  217 => 85,  214 => 281,  209 => 272,  203 => 269,  200 => 41,  195 => 40,  190 => 68,  185 => 52,  180 => 50,  175 => 225,  169 => 59,  167 => 217,  164 => 158,  161 => 70,  158 => 69,  155 => 196,  153 => 67,  148 => 65,  139 => 181,  126 => 43,  120 => 45,  117 => 31,  114 => 146,  111 => 37,  109 => 140,  92 => 35,  89 => 97,  83 => 20,  80 => 19,  76 => 19,  68 => 17,  64 => 18,  56 => 11,  52 => 13,  48 => 17,  44 => 11,  40 => 14,  33 => 32,  31 => 6,  26 => 1,  244 => 112,  240 => 70,  236 => 110,  232 => 109,  228 => 66,  186 => 67,  179 => 65,  174 => 48,  171 => 60,  163 => 56,  160 => 205,  146 => 48,  143 => 54,  140 => 53,  137 => 37,  134 => 174,  131 => 50,  113 => 49,  110 => 29,  107 => 29,  105 => 28,  96 => 25,  94 => 113,  91 => 28,  84 => 21,  81 => 33,  74 => 19,  72 => 43,  60 => 15,  57 => 14,  54 => 15,  51 => 11,  49 => 2,  42 => 12,  37 => 10,  34 => 10,  28 => 5,);
    }
}

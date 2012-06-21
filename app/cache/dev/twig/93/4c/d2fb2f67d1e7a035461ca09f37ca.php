<?php

/* OlogySocialBundle:Likes:ShowLikesPost.html.twig */
class __TwigTemplate_934cd2fb2f67d1e7a035461ca09f37ca extends Twig_Template
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
        echo "<div class=\"likes-post\">
    <div class=\"show-love-post\">
    ";
        // line 3
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            echo "  
        ";
            // line 4
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isLoving", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == false)) {
                echo " 
            <a href=\"";
                // line 5
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_love", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"love-post\"></a>     
        ";
            } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isLoving", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == true)) {
                // line 7
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_unlove", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"love-post-clicked\"></a>
        ";
            }
            // line 9
            echo "    ";
        } else {
            // line 10
            echo "        <input id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/likes/love_post.png"), "html", null, true);
            echo "\" type=\"image\"  method=\"post\" class=\"love-click-offline\"/>
    ";
        }
        // line 11
        echo " 
    </div>
    <div class=\"show-hate-post\">
    ";
        // line 14
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 15
            echo "        ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHating", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == false)) {
                echo " 
            <a href=\"";
                // line 16
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_hate", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"hate-post\"></a>     
        ";
            } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHating", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == true)) {
                // line 18
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_unhate", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"hate-post-clicked\"></a>
        ";
            }
            // line 19
            echo "    
    ";
        } else {
            // line 21
            echo "        <input id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/likes/hate_post.png"), "html", null, true);
            echo "\" type=\"image\" method=\"post\" class=\"hate-click-offline\"/>
    ";
        }
        // line 23
        echo "    </div>

    <div class=\"show-hmm-post\">
    ";
        // line 26
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 27
            echo "        ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHmm", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == false)) {
                echo " 
            <a href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_hmm", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"hmm-post\"></a>     
        ";
            } elseif (((($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHmm", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == true) && ($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isLoving", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == false)) && ($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHating", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == false))) {
                // line 30
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_unhmm", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"hmm-post-clicked\"></a>
        ";
            }
            // line 32
            echo "    ";
        } else {
            // line 33
            echo "        <input id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/likes/hmm_post.png"), "html", null, true);
            echo "\" type=\"image\" method=\"post\" class=\"hmm-click-offline\"/>
    ";
        }
        // line 35
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Likes:ShowLikesPost.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 30,  86 => 23,  58 => 15,  43 => 10,  25 => 4,  21 => 3,  537 => 172,  533 => 170,  527 => 169,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  469 => 152,  466 => 151,  463 => 150,  445 => 146,  442 => 145,  438 => 143,  427 => 140,  421 => 138,  418 => 137,  411 => 135,  402 => 132,  399 => 131,  396 => 130,  391 => 128,  387 => 126,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  343 => 114,  338 => 113,  328 => 110,  320 => 107,  317 => 106,  296 => 101,  281 => 96,  265 => 91,  227 => 79,  218 => 76,  212 => 75,  197 => 70,  192 => 69,  187 => 68,  184 => 67,  143 => 54,  110 => 44,  95 => 37,  46 => 11,  41 => 10,  38 => 9,  36 => 8,  55 => 13,  34 => 7,  29 => 5,  24 => 3,  996 => 291,  991 => 290,  989 => 289,  986 => 288,  970 => 284,  948 => 283,  946 => 282,  943 => 281,  931 => 276,  927 => 275,  922 => 274,  920 => 273,  917 => 272,  908 => 266,  902 => 264,  899 => 263,  894 => 262,  892 => 261,  889 => 260,  882 => 255,  873 => 253,  869 => 252,  866 => 251,  863 => 250,  861 => 249,  858 => 248,  850 => 244,  848 => 243,  845 => 242,  838 => 237,  835 => 236,  827 => 231,  823 => 230,  819 => 229,  816 => 228,  814 => 227,  811 => 226,  803 => 222,  801 => 221,  798 => 220,  790 => 214,  788 => 213,  785 => 212,  777 => 208,  774 => 207,  772 => 206,  769 => 205,  748 => 201,  745 => 200,  742 => 199,  739 => 198,  737 => 197,  734 => 196,  726 => 190,  723 => 189,  721 => 188,  718 => 187,  711 => 184,  708 => 183,  705 => 182,  697 => 178,  694 => 177,  692 => 176,  689 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 167,  516 => 100,  514 => 99,  511 => 98,  490 => 89,  485 => 88,  474 => 154,  471 => 153,  455 => 79,  450 => 77,  434 => 73,  429 => 71,  419 => 65,  413 => 63,  400 => 59,  397 => 58,  394 => 129,  388 => 55,  386 => 54,  378 => 53,  366 => 49,  361 => 48,  349 => 116,  335 => 39,  323 => 108,  304 => 33,  300 => 32,  292 => 99,  287 => 29,  285 => 28,  267 => 21,  259 => 89,  256 => 88,  250 => 86,  228 => 5,  219 => 288,  216 => 287,  211 => 280,  196 => 248,  193 => 247,  188 => 241,  183 => 236,  178 => 226,  173 => 220,  170 => 219,  162 => 211,  157 => 204,  152 => 195,  149 => 193,  147 => 187,  137 => 175,  132 => 168,  129 => 50,  127 => 161,  124 => 48,  119 => 47,  112 => 33,  99 => 125,  97 => 38,  82 => 31,  79 => 30,  69 => 42,  62 => 16,  57 => 14,  54 => 11,  49 => 2,  346 => 115,  340 => 129,  332 => 127,  324 => 125,  319 => 35,  311 => 117,  299 => 102,  297 => 112,  290 => 108,  278 => 105,  270 => 92,  266 => 102,  262 => 101,  247 => 95,  198 => 259,  186 => 67,  181 => 65,  176 => 63,  165 => 212,  163 => 56,  154 => 50,  150 => 57,  146 => 55,  138 => 46,  134 => 174,  130 => 44,  122 => 154,  96 => 30,  93 => 27,  91 => 26,  85 => 27,  78 => 21,  75 => 25,  70 => 23,  65 => 22,  63 => 16,  47 => 10,  35 => 9,  27 => 6,  23 => 4,  19 => 2,  61 => 14,  42 => 9,  28 => 6,  22 => 4,  20 => 2,  17 => 1,  352 => 117,  347 => 44,  344 => 43,  282 => 27,  276 => 97,  274 => 104,  257 => 100,  253 => 87,  249 => 96,  245 => 84,  241 => 82,  237 => 7,  233 => 6,  229 => 89,  225 => 74,  221 => 77,  217 => 85,  209 => 74,  200 => 71,  190 => 68,  185 => 239,  180 => 235,  175 => 225,  167 => 217,  161 => 60,  158 => 69,  155 => 196,  153 => 58,  148 => 65,  139 => 181,  126 => 49,  120 => 35,  117 => 147,  114 => 146,  111 => 37,  109 => 32,  83 => 20,  80 => 19,  76 => 17,  72 => 43,  68 => 18,  64 => 15,  60 => 13,  56 => 14,  52 => 3,  44 => 12,  37 => 10,  33 => 8,  31 => 7,  26 => 4,  502 => 92,  498 => 161,  494 => 90,  483 => 167,  479 => 156,  476 => 155,  470 => 161,  467 => 160,  465 => 159,  462 => 158,  458 => 157,  453 => 148,  447 => 153,  444 => 152,  441 => 151,  439 => 150,  435 => 142,  432 => 72,  430 => 146,  424 => 142,  422 => 141,  416 => 136,  410 => 134,  407 => 61,  405 => 133,  401 => 130,  390 => 125,  381 => 125,  374 => 51,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  357 => 47,  354 => 137,  350 => 113,  345 => 110,  342 => 109,  339 => 108,  336 => 128,  333 => 112,  330 => 111,  327 => 126,  325 => 109,  321 => 101,  315 => 99,  309 => 97,  307 => 104,  303 => 115,  298 => 92,  295 => 31,  289 => 98,  286 => 107,  284 => 87,  280 => 86,  275 => 94,  272 => 93,  268 => 80,  258 => 79,  248 => 85,  243 => 73,  235 => 81,  232 => 68,  226 => 4,  223 => 3,  220 => 86,  214 => 281,  206 => 73,  203 => 72,  201 => 260,  195 => 40,  191 => 242,  182 => 66,  179 => 65,  177 => 64,  174 => 63,  171 => 62,  169 => 59,  164 => 158,  160 => 205,  144 => 186,  142 => 182,  135 => 52,  131 => 35,  115 => 38,  113 => 45,  107 => 43,  104 => 42,  102 => 41,  98 => 28,  94 => 113,  92 => 98,  89 => 97,  87 => 33,  84 => 32,  77 => 29,  74 => 19,  67 => 27,  59 => 15,  53 => 13,  51 => 11,  48 => 12,  40 => 9,  32 => 3,);
    }
}
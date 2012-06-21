<?php

/* OlogySocialBundle:FrontEnd:almost-register-prompt.html.twig */
class __TwigTemplate_676dca0802f024439cb1e9d8afd4452d extends Twig_Template
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
        if (twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user"))) {
            // line 2
            echo "<div id=\"almost-register-prompt-box\">
        <div class=\"register-prompt-splash\">
            <div id=\"almost-prompt-title\">
            </div>
            <div id=\"almost-prompt-sentence\">
            </div>    
        </div>
        <form action=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
            echo "\" class=\"form\" method=\"POST\" ";
            echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "almostForm"));
            echo ">
            ";
            // line 10
            echo $this->env->getExtension('form')->setTheme($this->getContext($context, "almostForm"), array("OlogySocialBundle:Form:formOlogyTheme.html.twig", ));
            echo "            
            ";
            // line 11
            echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "almostForm"));
            echo "
            ";
            // line 12
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "almostForm"), "email"));
            echo "
            ";
            // line 13
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "almostForm"), "plainPassword"));
            echo "
            ";
            // line 14
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "almostForm"), "firstName"));
            echo "
            ";
            // line 15
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "almostForm"), "lastName"));
            echo "
            ";
            // line 16
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "almostForm"), "termOfService"));
            echo " 
            <div class=\"terms\">
                <span>Agree to our </span><a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_terms"), "html", null, true);
            echo "\" target=\"_blank\" >Terms of Service</a>
            </div>
            ";
            // line 20
            echo $this->env->getExtension('form')->renderRest($this->getContext($context, "almostForm"));
            echo "
            <div id=\"finish-button-align\">
                <input type=\"submit\" value=\"Finish\" class=\"signup-button\" />
            </div>
        </form>
        <div id=\"sign-in-link\">
            <a class=\"go-on-register-prompt\"> or sign in with Facebook or Twitter</a>
        </div>
        <span class=\"almost-register-prompt-close\">x</span>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:almost-register-prompt.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 16,  50 => 14,  46 => 13,  36 => 9,  32 => 8,  21 => 3,  38 => 11,  30 => 11,  996 => 291,  991 => 290,  989 => 289,  986 => 288,  970 => 284,  948 => 283,  946 => 282,  943 => 281,  931 => 276,  927 => 275,  922 => 274,  920 => 273,  917 => 272,  908 => 266,  902 => 264,  899 => 263,  894 => 262,  892 => 261,  889 => 260,  882 => 255,  873 => 253,  869 => 252,  866 => 251,  863 => 250,  861 => 249,  858 => 248,  850 => 244,  848 => 243,  845 => 242,  838 => 237,  835 => 236,  827 => 231,  823 => 230,  819 => 229,  816 => 228,  814 => 227,  811 => 226,  803 => 222,  801 => 221,  798 => 220,  790 => 214,  788 => 213,  785 => 212,  777 => 208,  774 => 207,  772 => 206,  769 => 205,  748 => 201,  745 => 200,  742 => 199,  739 => 198,  737 => 197,  734 => 196,  726 => 190,  723 => 189,  721 => 188,  718 => 187,  711 => 184,  708 => 183,  705 => 182,  697 => 178,  694 => 177,  692 => 176,  689 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 98,  502 => 92,  498 => 91,  494 => 90,  490 => 89,  485 => 88,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  455 => 79,  453 => 78,  450 => 77,  434 => 73,  432 => 72,  429 => 71,  419 => 65,  416 => 64,  413 => 63,  407 => 61,  405 => 60,  400 => 59,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  378 => 53,  374 => 51,  366 => 49,  361 => 48,  349 => 45,  335 => 39,  323 => 37,  304 => 33,  300 => 32,  295 => 31,  292 => 30,  287 => 29,  285 => 28,  272 => 23,  267 => 21,  259 => 17,  256 => 16,  250 => 14,  248 => 13,  219 => 288,  216 => 287,  211 => 280,  206 => 271,  201 => 260,  196 => 248,  193 => 247,  191 => 242,  188 => 241,  183 => 236,  178 => 226,  173 => 220,  170 => 219,  162 => 211,  157 => 204,  152 => 195,  149 => 193,  147 => 187,  144 => 186,  132 => 168,  129 => 167,  127 => 161,  124 => 160,  119 => 153,  112 => 141,  99 => 125,  97 => 114,  87 => 83,  82 => 77,  79 => 76,  77 => 71,  69 => 42,  67 => 27,  62 => 21,  357 => 47,  354 => 137,  346 => 132,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  319 => 35,  311 => 117,  307 => 116,  303 => 115,  299 => 113,  297 => 112,  290 => 108,  286 => 107,  278 => 105,  270 => 22,  266 => 102,  262 => 101,  247 => 95,  226 => 4,  223 => 3,  220 => 86,  198 => 259,  181 => 65,  176 => 63,  165 => 212,  154 => 50,  150 => 49,  142 => 182,  138 => 46,  130 => 44,  122 => 154,  115 => 38,  104 => 133,  102 => 126,  93 => 29,  85 => 27,  78 => 26,  75 => 25,  70 => 23,  65 => 22,  63 => 18,  59 => 20,  47 => 13,  35 => 9,  27 => 6,  23 => 4,  19 => 2,  61 => 23,  53 => 17,  22 => 3,  20 => 2,  17 => 1,  352 => 46,  347 => 44,  344 => 43,  282 => 27,  276 => 97,  274 => 104,  257 => 100,  253 => 15,  249 => 96,  245 => 12,  241 => 92,  237 => 7,  233 => 6,  229 => 89,  225 => 74,  221 => 73,  217 => 85,  214 => 281,  209 => 272,  203 => 269,  200 => 41,  195 => 40,  190 => 68,  185 => 239,  180 => 235,  175 => 225,  169 => 59,  167 => 217,  164 => 158,  161 => 70,  158 => 69,  155 => 196,  153 => 67,  148 => 65,  139 => 181,  126 => 43,  120 => 45,  117 => 147,  114 => 146,  111 => 37,  109 => 140,  92 => 98,  89 => 97,  83 => 20,  80 => 19,  76 => 17,  68 => 20,  64 => 26,  56 => 14,  52 => 13,  48 => 12,  44 => 11,  40 => 10,  33 => 8,  31 => 8,  26 => 1,  244 => 112,  240 => 111,  236 => 110,  232 => 109,  228 => 5,  186 => 67,  179 => 65,  174 => 64,  171 => 60,  163 => 56,  160 => 205,  146 => 48,  143 => 54,  140 => 53,  137 => 175,  134 => 174,  131 => 50,  113 => 49,  110 => 48,  107 => 134,  105 => 46,  96 => 30,  94 => 113,  91 => 28,  84 => 82,  81 => 33,  74 => 70,  72 => 43,  60 => 15,  57 => 12,  54 => 15,  51 => 14,  49 => 2,  42 => 12,  37 => 10,  34 => 10,  28 => 9,);
    }
}

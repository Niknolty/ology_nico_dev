<?php

/* OlogySocialBundle:Form:formOlogyTheme.html.twig */
class __TwigTemplate_318002dc54d8536823060b06400cca61 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'field_widget' => array($this, 'block_field_widget'),
            'field_row' => array($this, 'block_field_row'),
            'form_row' => array($this, 'block_form_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 13
        echo "
";
        // line 14
        $this->displayBlock('field_widget', $context, $blocks);
        // line 20
        echo "    
    ";
        // line 22
        echo "
";
        // line 23
        $this->displayBlock('field_row', $context, $blocks);
        // line 32
        echo "
";
        // line 33
        $this->displayBlock('form_row', $context, $blocks);
    }

    // line 14
    public function block_field_widget($context, array $blocks = array())
    {
        // line 15
        ob_start();
        // line 16
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter($this->getContext($context, "type"), "text")) : ("text"));
        // line 17
        echo "    <input type=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "type"), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ((!twig_test_empty($this->getContext($context, "value")))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
            echo "\" ";
        }
        echo " placeholder=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "label"), "html", null, true);
        echo "\"/>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 23
    public function block_field_row($context, array $blocks = array())
    {
        // line 24
        ob_start();
        // line 25
        echo "    <div class=\"input-ology\">
     ";
        // line 27
        echo "        ";
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
        ";
        // line 28
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"), array("label" => ((array_key_exists("label", $context)) ? (_twig_default_filter($this->getContext($context, "label"), "")) : (""))));
        echo "
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 33
    public function block_form_row($context, array $blocks = array())
    {
        // line 34
        ob_start();
        // line 35
        echo "    <div>
        ";
        // line 36
        echo $this->env->getExtension('form')->renderLabel($this->getContext($context, "form"), ((array_key_exists("label", $context)) ? (_twig_default_filter($this->getContext($context, "label"), null)) : (null)));
        echo "
        ";
        // line 37
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Form:formOlogyTheme.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  95 => 36,  90 => 34,  71 => 25,  66 => 23,  45 => 16,  43 => 15,  25 => 20,  58 => 16,  50 => 14,  46 => 13,  36 => 33,  32 => 8,  21 => 3,  38 => 11,  30 => 11,  996 => 291,  991 => 290,  989 => 289,  986 => 288,  970 => 284,  948 => 283,  946 => 282,  943 => 281,  931 => 276,  927 => 275,  922 => 274,  920 => 273,  917 => 272,  908 => 266,  902 => 264,  899 => 263,  894 => 262,  892 => 261,  889 => 260,  882 => 255,  873 => 253,  869 => 252,  866 => 251,  863 => 250,  861 => 249,  858 => 248,  850 => 244,  848 => 243,  845 => 242,  838 => 237,  835 => 236,  827 => 231,  823 => 230,  819 => 229,  816 => 228,  814 => 227,  811 => 226,  803 => 222,  801 => 221,  798 => 220,  790 => 214,  788 => 213,  785 => 212,  777 => 208,  774 => 207,  772 => 206,  769 => 205,  748 => 201,  745 => 200,  742 => 199,  739 => 198,  737 => 197,  734 => 196,  726 => 190,  723 => 189,  721 => 188,  718 => 187,  711 => 184,  708 => 183,  705 => 182,  697 => 178,  694 => 177,  692 => 176,  689 => 175,  677 => 171,  674 => 170,  672 => 169,  669 => 168,  661 => 164,  658 => 163,  656 => 162,  653 => 161,  645 => 157,  642 => 156,  640 => 155,  637 => 154,  629 => 150,  626 => 149,  624 => 148,  621 => 147,  613 => 143,  611 => 142,  608 => 141,  600 => 137,  597 => 136,  595 => 135,  592 => 134,  584 => 130,  581 => 129,  579 => 128,  577 => 127,  574 => 126,  567 => 121,  559 => 120,  554 => 119,  548 => 117,  545 => 116,  543 => 115,  540 => 114,  532 => 108,  530 => 104,  525 => 103,  519 => 101,  516 => 100,  514 => 99,  511 => 98,  502 => 92,  498 => 91,  494 => 90,  490 => 89,  485 => 88,  479 => 86,  476 => 85,  474 => 84,  471 => 83,  455 => 79,  453 => 78,  450 => 77,  434 => 73,  432 => 72,  429 => 71,  419 => 65,  416 => 64,  413 => 63,  407 => 61,  405 => 60,  400 => 59,  397 => 58,  394 => 57,  388 => 55,  386 => 54,  378 => 53,  374 => 51,  366 => 49,  361 => 48,  349 => 45,  335 => 39,  323 => 37,  304 => 33,  300 => 32,  295 => 31,  292 => 30,  287 => 29,  285 => 28,  272 => 23,  267 => 21,  259 => 17,  256 => 16,  250 => 14,  248 => 13,  219 => 288,  216 => 287,  211 => 280,  206 => 271,  201 => 260,  196 => 248,  193 => 247,  191 => 242,  188 => 241,  183 => 236,  178 => 226,  173 => 220,  170 => 219,  162 => 211,  157 => 204,  152 => 195,  149 => 193,  147 => 187,  144 => 186,  132 => 168,  129 => 167,  127 => 161,  124 => 160,  119 => 153,  112 => 141,  99 => 37,  97 => 114,  87 => 33,  82 => 77,  79 => 28,  77 => 71,  69 => 24,  67 => 27,  62 => 21,  357 => 47,  354 => 137,  346 => 132,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  319 => 35,  311 => 117,  307 => 116,  303 => 115,  299 => 113,  297 => 112,  290 => 108,  286 => 107,  278 => 105,  270 => 22,  266 => 102,  262 => 101,  247 => 95,  226 => 4,  223 => 3,  220 => 86,  198 => 259,  181 => 65,  176 => 63,  165 => 212,  154 => 50,  150 => 49,  142 => 182,  138 => 46,  130 => 44,  122 => 154,  115 => 38,  104 => 133,  102 => 126,  93 => 29,  85 => 27,  78 => 26,  75 => 25,  70 => 23,  65 => 22,  63 => 18,  59 => 20,  47 => 13,  35 => 9,  27 => 6,  23 => 14,  19 => 2,  61 => 23,  53 => 17,  22 => 3,  20 => 13,  17 => 1,  352 => 46,  347 => 44,  344 => 43,  282 => 27,  276 => 97,  274 => 104,  257 => 100,  253 => 15,  249 => 96,  245 => 12,  241 => 92,  237 => 7,  233 => 6,  229 => 89,  225 => 74,  221 => 73,  217 => 85,  214 => 281,  209 => 272,  203 => 269,  200 => 41,  195 => 40,  190 => 68,  185 => 239,  180 => 235,  175 => 225,  169 => 59,  167 => 217,  164 => 158,  161 => 70,  158 => 69,  155 => 196,  153 => 67,  148 => 65,  139 => 181,  126 => 43,  120 => 45,  117 => 147,  114 => 146,  111 => 37,  109 => 140,  92 => 35,  89 => 97,  83 => 20,  80 => 19,  76 => 17,  68 => 20,  64 => 26,  56 => 14,  52 => 13,  48 => 17,  44 => 11,  40 => 14,  33 => 32,  31 => 23,  26 => 1,  244 => 112,  240 => 111,  236 => 110,  232 => 109,  228 => 5,  186 => 67,  179 => 65,  174 => 64,  171 => 60,  163 => 56,  160 => 205,  146 => 48,  143 => 54,  140 => 53,  137 => 175,  134 => 174,  131 => 50,  113 => 49,  110 => 48,  107 => 134,  105 => 46,  96 => 30,  94 => 113,  91 => 28,  84 => 82,  81 => 33,  74 => 27,  72 => 43,  60 => 15,  57 => 12,  54 => 15,  51 => 14,  49 => 2,  42 => 12,  37 => 10,  34 => 10,  28 => 22,);
    }
}

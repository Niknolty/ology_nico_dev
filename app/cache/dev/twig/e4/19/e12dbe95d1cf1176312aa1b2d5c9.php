<?php

/* OlogySocialBundle:FrontEnd:like-feedback-prompt.html.twig */
class __TwigTemplate_e419e12dbe95d1cf1176312aa1b2d5c9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'pagescripts' => array($this, 'block_pagescripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"like-feedback-prompt-box\">
    <div class=\"like-feedback-prompt-splash\">
        <div id=\"like-feedback-prompt-title\">
        </div>
        <div id=\"like-feedback-prompt-sentence\">
        </div>    
    </div>
    <div class=\"social_network_feedback_share\">
        ";
        // line 9
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:social_network_share.html.twig")->display($context);
        // line 10
        echo "    </div>  
    <span class=\"like-feedback-prompt-close\">x</span>
</div>


";
        // line 15
        $this->displayBlock('pagescripts', $context, $blocks);
    }

    public function block_pagescripts($context, array $blocks = array())
    {
        // line 16
        echo "<script type=\"text/javascript\" src=\"http://platform.tumblr.com/v1/share.js\"></script>
<script type=\"text/javascript\" src=\"//platform.twitter.com/widgets.js\"></script>
<script type=\"text/javascript\">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script type=\"text/javascript\" src=\"//assets.pinterest.com/js/pinit.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:like-feedback-prompt.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 16,  37 => 15,  30 => 10,  28 => 9,  18 => 1,  677 => 233,  673 => 232,  668 => 230,  657 => 222,  653 => 220,  650 => 219,  642 => 216,  640 => 215,  634 => 213,  632 => 212,  626 => 208,  623 => 207,  617 => 205,  614 => 204,  608 => 202,  605 => 201,  602 => 200,  599 => 199,  595 => 197,  590 => 195,  584 => 193,  581 => 192,  578 => 191,  576 => 190,  572 => 188,  569 => 187,  563 => 185,  561 => 184,  554 => 179,  552 => 178,  547 => 175,  541 => 172,  538 => 171,  536 => 170,  530 => 167,  526 => 165,  515 => 160,  506 => 158,  498 => 155,  495 => 154,  492 => 153,  486 => 151,  483 => 150,  481 => 149,  478 => 148,  474 => 147,  469 => 144,  466 => 143,  463 => 142,  460 => 141,  457 => 140,  454 => 139,  452 => 138,  447 => 135,  441 => 134,  435 => 132,  433 => 131,  429 => 130,  423 => 126,  417 => 124,  415 => 123,  412 => 122,  408 => 120,  394 => 119,  383 => 118,  366 => 117,  362 => 115,  360 => 114,  357 => 113,  344 => 110,  341 => 109,  339 => 108,  334 => 106,  330 => 104,  327 => 103,  322 => 101,  316 => 99,  313 => 98,  311 => 97,  301 => 96,  291 => 93,  284 => 89,  279 => 86,  275 => 84,  270 => 82,  267 => 81,  265 => 80,  262 => 79,  257 => 77,  254 => 76,  252 => 75,  248 => 73,  243 => 72,  240 => 71,  238 => 70,  235 => 69,  230 => 67,  227 => 66,  225 => 65,  222 => 64,  217 => 62,  214 => 61,  211 => 60,  206 => 58,  202 => 56,  200 => 55,  196 => 53,  194 => 52,  190 => 51,  183 => 49,  177 => 45,  173 => 43,  157 => 41,  155 => 40,  148 => 39,  144 => 37,  128 => 35,  126 => 34,  119 => 30,  116 => 29,  110 => 27,  108 => 26,  105 => 25,  103 => 24,  99 => 22,  95 => 20,  93 => 19,  90 => 18,  88 => 17,  85 => 16,  79 => 13,  75 => 12,  71 => 11,  66 => 10,  63 => 9,  56 => 7,  48 => 5,  40 => 4,  32 => 3,);
    }
}

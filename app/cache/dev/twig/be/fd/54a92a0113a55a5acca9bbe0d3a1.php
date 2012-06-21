<?php

/* OlogySocialBundle:FrontEnd:twitter_signin.html.twig */
class __TwigTemplate_befd54a92a0113a55a5acca9bbe0d3a1 extends Twig_Template
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
        echo "<a id=\"twitter-button\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_twitter_check"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/twitter_signin.png"), "html", null, true);
        echo "\"></a>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:twitter_signin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 17,  30 => 11,  17 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  209 => 68,  203 => 42,  200 => 41,  195 => 40,  190 => 39,  185 => 38,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  161 => 70,  158 => 69,  155 => 68,  153 => 67,  148 => 65,  139 => 59,  126 => 49,  120 => 45,  117 => 41,  114 => 40,  111 => 39,  109 => 38,  92 => 23,  89 => 22,  83 => 20,  80 => 19,  76 => 17,  68 => 15,  64 => 14,  56 => 12,  52 => 11,  48 => 10,  44 => 9,  40 => 18,  33 => 5,  31 => 4,  26 => 1,  244 => 112,  240 => 111,  236 => 110,  232 => 109,  228 => 108,  186 => 69,  179 => 65,  174 => 64,  171 => 63,  163 => 57,  160 => 56,  146 => 55,  143 => 54,  140 => 53,  137 => 52,  134 => 51,  131 => 50,  113 => 49,  110 => 48,  107 => 47,  105 => 46,  96 => 41,  94 => 40,  91 => 39,  84 => 34,  81 => 33,  74 => 28,  72 => 16,  60 => 13,  57 => 16,  54 => 15,  51 => 14,  49 => 13,  42 => 9,  37 => 7,  34 => 5,  28 => 10,);
    }
}

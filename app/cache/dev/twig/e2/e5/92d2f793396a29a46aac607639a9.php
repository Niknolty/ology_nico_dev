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
        return array (  71 => 20,  58 => 17,  55 => 16,  47 => 15,  45 => 14,  29 => 6,  27 => 5,  22 => 3,  19 => 2,  138 => 35,  128 => 34,  125 => 33,  103 => 27,  97 => 23,  43 => 9,  35 => 7,  21 => 3,  285 => 101,  277 => 97,  274 => 96,  271 => 95,  268 => 94,  266 => 93,  259 => 88,  254 => 86,  246 => 84,  234 => 80,  226 => 78,  220 => 75,  216 => 74,  212 => 72,  208 => 71,  205 => 70,  197 => 67,  194 => 66,  191 => 65,  187 => 63,  178 => 61,  173 => 59,  166 => 56,  152 => 49,  147 => 46,  132 => 43,  127 => 42,  124 => 41,  122 => 40,  116 => 39,  106 => 34,  98 => 29,  90 => 26,  87 => 22,  85 => 24,  82 => 23,  73 => 20,  69 => 17,  65 => 16,  62 => 15,  46 => 10,  41 => 12,  25 => 4,  23 => 4,  17 => 1,  323 => 132,  318 => 131,  315 => 130,  270 => 87,  264 => 85,  262 => 84,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  209 => 68,  203 => 69,  200 => 68,  195 => 40,  190 => 39,  185 => 62,  180 => 22,  175 => 60,  169 => 134,  167 => 130,  164 => 129,  161 => 70,  158 => 69,  155 => 68,  153 => 67,  148 => 65,  139 => 59,  126 => 49,  120 => 45,  117 => 31,  114 => 40,  111 => 39,  109 => 38,  92 => 23,  89 => 22,  83 => 20,  80 => 19,  76 => 19,  68 => 15,  64 => 18,  56 => 11,  52 => 11,  48 => 10,  44 => 9,  40 => 8,  33 => 6,  31 => 4,  26 => 1,  244 => 112,  240 => 82,  236 => 110,  232 => 79,  228 => 108,  186 => 69,  179 => 65,  174 => 64,  171 => 63,  163 => 54,  160 => 53,  146 => 55,  143 => 54,  140 => 45,  137 => 44,  134 => 51,  131 => 50,  113 => 49,  110 => 29,  107 => 47,  105 => 28,  96 => 41,  94 => 40,  91 => 39,  84 => 21,  81 => 33,  74 => 28,  72 => 16,  60 => 14,  57 => 13,  54 => 12,  51 => 14,  49 => 13,  42 => 9,  37 => 10,  34 => 5,  28 => 5,);
    }
}

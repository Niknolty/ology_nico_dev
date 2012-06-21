<?php

/* OlogySocialBundle:Likes:ShowLikesCard.html.twig */
class __TwigTemplate_94076fd1145a3ee2f3395048ebb8cb89 extends Twig_Template
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
        echo "<div class=\"likes-card\">
    <div class=\"show-love\">
    ";
        // line 3
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 4
            echo "        ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isLoving", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == false)) {
                echo " 
            <a id=\"";
                // line 5
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesLoved"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_love", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"love-card\"></a>
        ";
            } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isLoving", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == true)) {
                // line 7
                echo "            <a id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesLoved"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_unlove", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"love-card-clicked\"></a>
        ";
            }
            // line 9
            echo "    ";
        } else {
            // line 10
            echo "        <input id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesLoved"), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/likes/love_card.png"), "html", null, true);
            echo "\" type=\"image\" method=\"post\" class=\"love-click-offline\"/>
    ";
        }
        // line 11
        echo "   
    </div>

    <div class=\"show-hate\">
    ";
        // line 15
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 16
            echo "        ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHating", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == false)) {
                echo " 
            <a id=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesHated"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_hate", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"hate-card\"></a>     
        ";
            } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHating", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == true)) {
                // line 19
                echo "            <a id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesHated"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_unhate", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"hate-card-clicked\"></a>
        ";
            }
            // line 21
            echo "    ";
        } else {
            // line 22
            echo "        <input id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesHated"), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/likes/hate_card.png"), "html", null, true);
            echo "\" type=\"image\" method=\"post\" class=\"hate-click-offline\"/>
    ";
        }
        // line 23
        echo "    
    </div>

    <div class=\"show-hmm\">
    ";
        // line 27
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 28
            echo "        ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHmm", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == false)) {
                echo " 
            <a id=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesHmm"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_hmm", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"hmm-card\"></a>     
        ";
            } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "likes"), "isHmm", array(), "array"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array") == true)) {
                // line 31
                echo "            <a id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesHmm"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_unhmm", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\" class=\"hmm-card-clicked\"></a>
        ";
            }
            // line 33
            echo "    ";
        } else {
            // line 34
            echo "        <input id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "timesHmm"), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/likes/hmm_card.png"), "html", null, true);
            echo "\" type=\"image\" method=\"post\" class=\"hmm-click-offline\"/>
    ";
        }
        // line 35
        echo "    
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Likes:ShowLikesCard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 35,  128 => 34,  125 => 33,  103 => 27,  97 => 23,  43 => 9,  35 => 7,  21 => 3,  285 => 101,  277 => 97,  274 => 96,  271 => 95,  268 => 94,  266 => 93,  259 => 88,  254 => 86,  246 => 84,  234 => 80,  226 => 78,  220 => 75,  216 => 74,  212 => 72,  208 => 71,  205 => 70,  197 => 67,  194 => 66,  191 => 65,  187 => 63,  178 => 61,  173 => 59,  166 => 56,  152 => 49,  147 => 46,  132 => 43,  127 => 42,  124 => 41,  122 => 40,  116 => 39,  106 => 34,  98 => 29,  90 => 26,  87 => 22,  85 => 24,  82 => 23,  73 => 20,  69 => 17,  65 => 16,  62 => 15,  46 => 10,  41 => 8,  25 => 4,  23 => 4,  17 => 1,  323 => 132,  318 => 131,  315 => 130,  270 => 87,  264 => 85,  262 => 84,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  209 => 68,  203 => 69,  200 => 68,  195 => 40,  190 => 39,  185 => 62,  180 => 22,  175 => 60,  169 => 134,  167 => 130,  164 => 129,  161 => 70,  158 => 69,  155 => 68,  153 => 67,  148 => 65,  139 => 59,  126 => 49,  120 => 45,  117 => 31,  114 => 40,  111 => 39,  109 => 38,  92 => 23,  89 => 22,  83 => 20,  80 => 19,  76 => 19,  68 => 15,  64 => 16,  56 => 11,  52 => 11,  48 => 10,  44 => 9,  40 => 8,  33 => 6,  31 => 4,  26 => 1,  244 => 112,  240 => 82,  236 => 110,  232 => 79,  228 => 108,  186 => 69,  179 => 65,  174 => 64,  171 => 63,  163 => 54,  160 => 53,  146 => 55,  143 => 54,  140 => 45,  137 => 44,  134 => 51,  131 => 50,  113 => 49,  110 => 29,  107 => 47,  105 => 28,  96 => 41,  94 => 40,  91 => 39,  84 => 21,  81 => 33,  74 => 28,  72 => 16,  60 => 14,  57 => 13,  54 => 12,  51 => 14,  49 => 13,  42 => 9,  37 => 7,  34 => 5,  28 => 5,);
    }
}

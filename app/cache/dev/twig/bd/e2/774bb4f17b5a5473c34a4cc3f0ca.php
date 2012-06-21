<?php

/* OlogySocialBundle:FrontEnd:ologist-right-box.html.twig */
class __TwigTemplate_bde2774bb4f17b5a5473c34a4cc3f0ca extends Twig_Template
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
        echo "<div class=\"ology-third-boxes-right\">    
        <div class=\"top-ologist\">
            <form action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_invite_from_ology", array("ologyId" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
        echo "\" method=\"post\">
                <input type=\"submit\" class=\"invite-friends-button\" value=\"invite friends\"/>
            </form>
            ";
        // line 6
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "TopOlogistsTab", true), 0, array(), "array", false, true), 0, array(), "array", true, true)) {
            echo "    
                Top Ologists:
            ";
        }
        // line 9
        echo "            ";
        $context["number"] = "0";
        // line 10
        echo "            ";
        $context["url"] = "";
        // line 11
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "TopOlogistsTab"));
        foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
            // line 12
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tab"));
            foreach ($context['_seq'] as $context["key2"] => $context["tab1"]) {
                // line 13
                echo "                    ";
                if (($this->getContext($context, "key2") == 0)) {
                    // line 14
                    echo "                        ";
                    $context["number"] = $this->getContext($context, "tab1");
                    // line 15
                    echo "                    ";
                } else {
                    // line 16
                    echo "                        ";
                    $context["url"] = $this->getContext($context, "tab1");
                    // line 17
                    echo "                    ";
                }
                // line 18
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key2'], $context['tab1'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 19
            echo "                ";
            if (($this->getContext($context, "number") != 0)) {
                // line 20
                echo "                    <a class=\"user-popupable\" pid=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "number"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "number"))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getContext($context, "url"))), "html", null, true);
                echo "\" class=\"user-pic\"></a>
                ";
            }
            // line 22
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "        
        </div>

        <div class=\"founder-box\">
            <a class=\"user-popupable\" pid=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"))), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_large/" . $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "imageUrl"))), "html", null, true);
        echo "\"   />
            </a>
            <div style=\"text-align: left\"><small>Founded by</small></div>
            <div style=\"text-align: left\">
                <a class=\"user-popupable\" pid=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"))), "html", null, true);
        echo "\">
                    ";
        // line 32
        $context["firstname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstName"));
        // line 33
        echo "                    ";
        $context["lastname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastName"));
        // line 34
        echo "                        ";
        if ((($this->getContext($context, "firstname_length") + $this->getContext($context, "lastname_length")) >= 20)) {
            echo " 
                            ";
            // line 35
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstName") . " ") . $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastName")), 20, false, "..."), "html", null, true);
            echo "
                        ";
        } else {
            // line 36
            echo "   
                            ";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastName"), "html", null, true);
            echo "
                        ";
        }
        // line 39
        echo "                </a>
            </div>
            <div style=\"text-align: left;\">
                on ";
        // line 42
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "creationDate"), "M d, Y"), "html", null, true);
        echo " 
            </div>
        </div>

        <div class=\"founder-stats\">
            ";
        // line 47
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:ology_stats.html.twig")->display($context);
        // line 48
        echo "        </div>
</div> ";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:ologist-right-box.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 48,  151 => 47,  143 => 42,  138 => 39,  131 => 37,  128 => 36,  123 => 35,  118 => 34,  113 => 32,  107 => 31,  100 => 27,  83 => 22,  73 => 20,  70 => 19,  61 => 17,  55 => 15,  49 => 13,  44 => 12,  39 => 11,  36 => 10,  33 => 9,  27 => 6,  21 => 3,  17 => 1,  348 => 135,  344 => 134,  340 => 133,  336 => 132,  332 => 131,  327 => 130,  324 => 129,  318 => 125,  315 => 124,  309 => 121,  304 => 119,  300 => 117,  296 => 115,  294 => 114,  290 => 112,  287 => 111,  281 => 107,  279 => 106,  275 => 104,  272 => 103,  270 => 102,  259 => 94,  255 => 92,  241 => 91,  238 => 90,  235 => 89,  232 => 88,  229 => 87,  226 => 86,  209 => 85,  206 => 84,  202 => 82,  197 => 79,  192 => 76,  190 => 75,  187 => 74,  185 => 73,  178 => 69,  169 => 62,  167 => 61,  164 => 60,  162 => 59,  158 => 50,  156 => 49,  149 => 44,  145 => 43,  142 => 42,  139 => 41,  136 => 40,  130 => 38,  127 => 37,  125 => 36,  120 => 33,  117 => 32,  115 => 33,  111 => 30,  106 => 29,  104 => 28,  99 => 27,  96 => 26,  94 => 26,  90 => 24,  86 => 23,  81 => 21,  75 => 20,  69 => 17,  64 => 18,  58 => 16,  56 => 12,  52 => 14,  48 => 8,  46 => 7,  43 => 6,  41 => 5,  38 => 4,  35 => 3,  28 => 2,);
    }
}

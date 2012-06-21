<?php

/* OlogySocialBundle:FrontEnd:create_post_home.html.twig */
class __TwigTemplate_ed4cee8d121fc9617995cb275e076636 extends Twig_Template
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
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_store_obj"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "postForm"));
        echo " id=\"form-post\">
    ";
        // line 2
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_form_content.html.twig")->display($context);
        // line 3
        echo "    ";
        $this->env->loadTemplate("OlogySocialBundle:Tips:attach_media_tip.html.twig")->display($context);
        // line 4
        echo "    <div class=\"cancel\">Cancel</div>
    <input type=\"button\" value=\"Post (Ologize)\" id=\"post-button-home\" class=\"post-button\" />
</form>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:create_post_home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 4,  26 => 3,  24 => 2,  17 => 1,  396 => 154,  392 => 153,  388 => 152,  384 => 151,  361 => 131,  355 => 127,  352 => 126,  345 => 121,  336 => 118,  330 => 117,  325 => 114,  319 => 112,  313 => 110,  311 => 109,  305 => 108,  302 => 107,  298 => 106,  295 => 105,  291 => 103,  282 => 100,  276 => 99,  269 => 95,  263 => 94,  260 => 93,  256 => 92,  253 => 91,  250 => 90,  244 => 87,  240 => 85,  238 => 84,  235 => 83,  233 => 82,  228 => 79,  222 => 76,  217 => 74,  213 => 72,  209 => 70,  207 => 69,  203 => 67,  200 => 66,  198 => 65,  190 => 59,  183 => 55,  180 => 54,  166 => 53,  163 => 52,  160 => 51,  157 => 50,  154 => 49,  151 => 48,  134 => 47,  126 => 41,  118 => 38,  115 => 37,  113 => 36,  108 => 33,  104 => 31,  101 => 30,  96 => 26,  94 => 25,  90 => 23,  84 => 21,  81 => 20,  78 => 19,  72 => 17,  70 => 16,  65 => 14,  61 => 13,  54 => 12,  52 => 11,  48 => 9,  44 => 7,  42 => 6,  39 => 5,  37 => 4,  34 => 3,  28 => 2,);
    }
}

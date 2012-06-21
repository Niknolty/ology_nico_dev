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
        return array (  63 => 18,  58 => 16,  50 => 14,  46 => 13,  19 => 2,  36 => 9,  32 => 8,  21 => 3,  38 => 11,  30 => 11,  17 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  209 => 68,  203 => 42,  200 => 41,  195 => 40,  190 => 39,  185 => 38,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  161 => 70,  158 => 69,  155 => 68,  153 => 67,  148 => 65,  139 => 59,  126 => 49,  120 => 45,  117 => 41,  114 => 40,  111 => 39,  109 => 38,  92 => 23,  89 => 22,  83 => 20,  80 => 19,  76 => 17,  68 => 20,  64 => 14,  56 => 14,  52 => 13,  48 => 12,  44 => 11,  40 => 10,  33 => 5,  31 => 4,  26 => 1,  244 => 112,  240 => 111,  236 => 110,  232 => 109,  228 => 108,  186 => 69,  179 => 65,  174 => 64,  171 => 63,  163 => 57,  160 => 56,  146 => 55,  143 => 54,  140 => 53,  137 => 52,  134 => 51,  131 => 50,  113 => 49,  110 => 48,  107 => 47,  105 => 46,  96 => 41,  94 => 40,  91 => 39,  84 => 34,  81 => 33,  74 => 28,  72 => 16,  60 => 15,  57 => 16,  54 => 15,  51 => 14,  49 => 13,  42 => 12,  37 => 7,  34 => 10,  28 => 9,);
    }
}

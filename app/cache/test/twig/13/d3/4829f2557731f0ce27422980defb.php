<?php

/* FOSFacebookBundle::initialize.html.twig */
class __TwigTemplate_13d34829f2557731f0ce27422980defb extends Twig_Template
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
        echo "<div id=\"fb-root\"></div>
";
        // line 2
        if ((!$this->getContext($context, "async"))) {
            // line 3
            echo "<script type=\"text/javascript\" src=\"http://connect.facebook.net/";
            echo twig_escape_filter($this->env, $this->getContext($context, "culture"), "html", null, true);
            echo "/all.js\"></script>
";
        }
        // line 5
        echo "<script type=\"text/javascript\">
";
        // line 7
        if ($this->getContext($context, "async")) {
            // line 8
            echo "window.fbAsyncInit = function() {
";
        }
        // line 10
        echo "  FB.init(";
        echo twig_jsonencode_filter(array("appId" => $this->getContext($context, "appId"), "xfbml" => $this->getContext($context, "xfbml"), "oauth" => $this->getContext($context, "oauth"), "status" => $this->getContext($context, "status"), "cookie" => $this->getContext($context, "cookie"), "logging" => $this->getContext($context, "logging")));
        echo ");
";
        // line 11
        if ($this->getContext($context, "async")) {
            // line 12
            echo "  ";
            echo $this->getContext($context, "fbAsyncInit");
            echo "
};

(function() {
  var e = document.createElement('script');
  e.src = document.location.protocol + ";
            // line 17
            echo twig_jsonencode_filter(sprintf("//connect.facebook.net/%s/all.js", $this->getContext($context, "culture")));
            echo ";
  e.async = true;
  document.getElementById('fb-root').appendChild(e);
}());
";
        }
        // line 23
        echo "</script>
";
    }

    public function getTemplateName()
    {
        return "FOSFacebookBundle::initialize.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 23,  53 => 17,  22 => 3,  20 => 2,  17 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  209 => 68,  203 => 42,  200 => 41,  195 => 40,  190 => 39,  185 => 38,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  161 => 70,  158 => 69,  155 => 68,  153 => 67,  148 => 65,  139 => 59,  126 => 49,  120 => 45,  117 => 41,  114 => 40,  111 => 39,  109 => 38,  92 => 23,  89 => 22,  83 => 20,  80 => 19,  76 => 17,  68 => 15,  64 => 14,  56 => 12,  52 => 11,  48 => 10,  44 => 12,  40 => 8,  33 => 8,  31 => 7,  26 => 1,  244 => 112,  240 => 111,  236 => 110,  232 => 109,  228 => 108,  186 => 69,  179 => 65,  174 => 64,  171 => 63,  163 => 57,  160 => 56,  146 => 55,  143 => 54,  140 => 53,  137 => 52,  134 => 51,  131 => 50,  113 => 49,  110 => 48,  107 => 47,  105 => 46,  96 => 41,  94 => 40,  91 => 39,  84 => 34,  81 => 33,  74 => 28,  72 => 16,  60 => 13,  57 => 16,  54 => 15,  51 => 14,  49 => 13,  42 => 11,  37 => 10,  34 => 5,  28 => 5,);
    }
}

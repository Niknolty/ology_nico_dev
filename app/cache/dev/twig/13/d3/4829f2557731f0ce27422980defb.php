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
        return array (  61 => 23,  42 => 11,  28 => 5,  22 => 3,  20 => 2,  17 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  209 => 68,  200 => 41,  190 => 39,  185 => 38,  180 => 22,  175 => 8,  167 => 159,  161 => 70,  158 => 69,  155 => 68,  153 => 67,  148 => 65,  139 => 59,  126 => 49,  120 => 45,  117 => 41,  114 => 40,  111 => 39,  109 => 38,  83 => 20,  80 => 19,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  60 => 13,  56 => 12,  52 => 11,  44 => 12,  37 => 10,  33 => 8,  31 => 7,  26 => 1,  502 => 177,  498 => 176,  494 => 175,  483 => 167,  479 => 165,  476 => 164,  470 => 161,  467 => 160,  465 => 159,  462 => 158,  458 => 157,  453 => 155,  447 => 153,  444 => 152,  441 => 151,  439 => 150,  435 => 148,  432 => 147,  430 => 146,  424 => 142,  422 => 141,  416 => 137,  410 => 134,  407 => 133,  405 => 132,  401 => 130,  390 => 125,  381 => 123,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  357 => 115,  354 => 114,  350 => 113,  345 => 110,  342 => 109,  339 => 108,  336 => 107,  333 => 106,  330 => 105,  327 => 104,  325 => 103,  321 => 101,  315 => 99,  309 => 97,  307 => 96,  303 => 95,  298 => 92,  295 => 91,  289 => 89,  286 => 88,  284 => 87,  280 => 86,  275 => 83,  272 => 82,  268 => 80,  258 => 79,  248 => 76,  243 => 73,  235 => 69,  232 => 68,  226 => 66,  223 => 65,  220 => 64,  214 => 70,  206 => 60,  203 => 42,  201 => 58,  195 => 40,  191 => 55,  182 => 51,  179 => 50,  177 => 49,  174 => 48,  171 => 47,  169 => 163,  164 => 158,  160 => 41,  144 => 39,  142 => 38,  135 => 37,  131 => 35,  115 => 33,  113 => 32,  107 => 28,  104 => 27,  102 => 26,  98 => 24,  94 => 22,  92 => 23,  89 => 22,  87 => 19,  84 => 18,  77 => 15,  74 => 14,  67 => 12,  59 => 9,  53 => 17,  51 => 6,  48 => 10,  40 => 8,  32 => 3,);
    }
}

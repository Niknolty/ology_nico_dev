<?php

/* OlogySocialBundle:FrontEnd:splash.html.twig */
class __TwigTemplate_c889f3ef5d37180751534efa039229fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'pagescripts' => array($this, 'block_pagescripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OlogySocialBundle:FrontEnd:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Ology is all about passion | Ology";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<style type=\"text/css\">
  .circle{ display: none;}
</style>
<link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/ologysearch.css"), "html", null, true);
        echo "?v=1\" type=\"text/css\" rel=\"stylesheet\" />

    <div class=\"header-splash\">
        <div id=\"splash-signin\">
            ";
        // line 13
        if ((!$this->getContext($context, "loggedIn"))) {
            // line 14
            echo "                ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:facebook_signin.html.twig")->display($context);
            // line 15
            echo "                ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:twitter_signin.html.twig")->display($context);
            // line 16
            echo "            ";
        }
        // line 17
        echo "        </div>
        <div id=\"splash-message\">
            <h2>Ology is all about passions.</h2>
            <div id=\"content-search\">
                 <br/>
                 <input type=\"text\" id=\"content-search-input\" value=\"What's your passion?\"/><br/>
            </div>
        </div>
    </div>

    ";
        // line 27
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array(0 => "openTwitterPopup"), "method")) {
            // line 28
            echo "        <div id=\"twitter-popup\" class=\"popup\">
            <div id=\"twitter-popup-content\"></div>
            <span class=\"popup-close\">X</span>
        </div>
    ";
        }
        // line 33
        echo "    ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "query"), "get", array(0 => "openFacebookPopup"), "method")) {
            // line 34
            echo "        <div id=\"facebook-popup\" class=\"popup\">
            <div id=\"facebook-popup-content\"></div>
            <span class=\"popup-close\">X</span>
        </div>
    ";
        }
        // line 39
        echo "
    ";
        // line 40
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display(array_merge($context, array("prompt_action" => "1")));
        // line 41
        echo "    <div id='loading-splash' style='display: none;' class='loading-search'><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/ajax-loader.gif"), "html", null, true);
        echo "\" /><br/>
        All of our representatives are currently busy.<br/>
        Please stay on the line and your request will be answered by the next available representative.
    </div>
    <div id=\"container-splash\">
        ";
        // line 46
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:core_channels.html.twig")->display($context);
        // line 47
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display($context);
        // line 48
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:almost-register-prompt.html.twig")->display($context);
        // line 49
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 50
            echo "            ";
            if ($this->getAttribute($this->getContext($context, "post"), "isProfessional")) {
                // line 51
                echo "                ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"), "large" => true)));
                // line 52
                echo "            ";
            } else {
                // line 53
                echo "                ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"), "large" => true)));
                // line 54
                echo "            ";
            }
            // line 55
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 56
        echo "        <div>
          <a href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_splash_pag", array("offset" => 1, "n" => $this->getContext($context, "n"))), "html", null, true);
        echo "\" class=\"navigation\">NEXT</a>
        </div>
    </div>
  ";
    }

    // line 63
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 64
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/jquery.autocomplete-1.1.3/styles.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/jquery.autocomplete-1.1.3/jquery.autocomplete.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script type=\"text/javascript\">
var tbval = \"What's your passion?\";
var a = \$('#content-search-input').autocomplete({ 
    serviceUrl:'";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ologies_autocomplete_ajax"), "html", null, true);
        echo "',
    maxHeight:220,
    width:496,
    noCache: false,
  });


function searchOlogies() {
    setTimeout(function() {
        var val = \$('#content-search-input').val();
        tbval = val;
        var url = '/splash/0/15/'.concat(val);
        \$.get(url, function(data) {
            \$(\"#loading-splash\").hide();
            \$('#container-splash').html( data );
            \$('#container-splash').masonry('reload');
        });
    }, 50);
    \$(\"#loading-splash\").show();
}

\$('.autocomplete-w1').click(function() {
    searchOlogies();
});

\$(\"#content-search-input\").keyup(function(event){
    if(event.keyCode == 13){
        searchOlogies();
        event.preventDefault();
    }
});
    
\$(\"#content-search-input\").focus(function(){
    if (this.value == tbval){this.value = '';} 
}).blur(function(){
  if (this.value == ''){this.value = tbval;} 
});
</script>

<script src=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/jquery.reject.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/splashscroll.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_comment.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 111
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
  
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:splash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 112,  236 => 110,  293 => 111,  246 => 91,  242 => 89,  173 => 64,  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 106,  262 => 101,  198 => 72,  334 => 119,  321 => 124,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 111,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 117,  234 => 86,  223 => 83,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 118,  304 => 94,  300 => 142,  290 => 108,  287 => 109,  279 => 84,  226 => 84,  149 => 68,  136 => 49,  125 => 48,  115 => 46,  100 => 40,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 70,  168 => 80,  128 => 49,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 98,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 69,  183 => 75,  181 => 65,  163 => 57,  140 => 53,  170 => 70,  121 => 46,  112 => 41,  118 => 34,  106 => 37,  157 => 58,  232 => 109,  228 => 108,  220 => 86,  210 => 76,  207 => 61,  159 => 45,  151 => 47,  147 => 55,  105 => 46,  85 => 27,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 131,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 112,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 80,  206 => 78,  197 => 54,  187 => 74,  184 => 80,  182 => 67,  174 => 64,  150 => 49,  119 => 45,  110 => 48,  53 => 8,  91 => 39,  66 => 34,  98 => 37,  96 => 41,  166 => 61,  160 => 56,  154 => 57,  143 => 54,  138 => 46,  101 => 25,  58 => 19,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 105,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 84,  225 => 100,  221 => 84,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  139 => 62,  114 => 51,  83 => 14,  76 => 20,  72 => 27,  68 => 20,  64 => 20,  56 => 18,  21 => 3,  209 => 79,  205 => 81,  196 => 71,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 69,  148 => 54,  145 => 66,  141 => 58,  134 => 51,  132 => 50,  127 => 53,  123 => 49,  109 => 40,  93 => 29,  90 => 24,  54 => 15,  133 => 48,  124 => 44,  111 => 37,  107 => 47,  80 => 27,  63 => 19,  60 => 17,  69 => 21,  61 => 9,  52 => 15,  50 => 16,  45 => 6,  43 => 10,  34 => 5,  224 => 65,  215 => 81,  211 => 80,  204 => 74,  200 => 75,  195 => 68,  193 => 67,  190 => 68,  188 => 69,  185 => 67,  179 => 65,  177 => 64,  171 => 63,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 55,  142 => 53,  137 => 52,  131 => 50,  126 => 43,  120 => 46,  117 => 39,  103 => 34,  99 => 26,  74 => 28,  47 => 11,  32 => 6,  39 => 7,  26 => 5,  97 => 31,  95 => 41,  88 => 28,  82 => 33,  78 => 26,  75 => 34,  71 => 18,  22 => 3,  44 => 9,  30 => 11,  20 => 2,  25 => 7,  49 => 13,  42 => 9,  40 => 18,  23 => 4,  27 => 4,  17 => 1,  92 => 34,  86 => 38,  79 => 24,  77 => 31,  57 => 16,  46 => 11,  37 => 6,  33 => 5,  29 => 2,  24 => 3,  19 => 2,  135 => 51,  129 => 35,  122 => 42,  116 => 30,  113 => 49,  108 => 36,  104 => 35,  102 => 34,  94 => 40,  89 => 30,  87 => 35,  84 => 34,  81 => 33,  73 => 24,  70 => 26,  67 => 11,  62 => 16,  59 => 19,  55 => 8,  51 => 14,  48 => 11,  41 => 5,  38 => 17,  35 => 3,  31 => 8,  28 => 2,);
    }
}

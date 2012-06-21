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
        return array (  244 => 112,  240 => 111,  236 => 110,  232 => 109,  228 => 108,  186 => 69,  179 => 65,  174 => 64,  171 => 63,  163 => 57,  160 => 56,  146 => 55,  143 => 54,  140 => 53,  137 => 52,  134 => 51,  131 => 50,  113 => 49,  110 => 48,  107 => 47,  105 => 46,  96 => 41,  94 => 40,  91 => 39,  84 => 34,  81 => 33,  74 => 28,  72 => 27,  60 => 17,  57 => 16,  54 => 15,  51 => 14,  49 => 13,  42 => 9,  37 => 6,  34 => 5,  28 => 2,);
    }
}

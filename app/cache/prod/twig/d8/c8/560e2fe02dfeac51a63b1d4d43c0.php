<?php

/* OlogySocialBundle:FrontEnd:base.html.twig */
class __TwigTemplate_d8c8560e2fe02dfeac51a63b1d4d43c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'fb_title' => array($this, 'block_fb_title'),
            'fb_description' => array($this, 'block_fb_description'),
            'fb_image' => array($this, 'block_fb_image'),
            'page_header' => array($this, 'block_page_header'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
            'pagescripts' => array($this, 'block_pagescripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html xmlns:fb=\"http://www.facebook.com/2008/fbml\">
    <head>
        ";
        // line 4
        if (array_key_exists("noIndex", $context)) {
            // line 5
            echo "        <meta name=\"robots\" content=\"noindex\" />
        ";
        }
        // line 7
        echo "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"shortcut icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/ology_favicon.png"), "html", null, true);
        echo "\" />
        <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/user_tooltip.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/ology.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/likes.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/reologize.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/comments.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/stash.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/follow.css"), "html", null, true);
        echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/jquery-ui-1.8.20.ology.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        // line 19
        echo "        ";
        if (((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user"))) && (!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "tipsList"))))) {
            // line 20
            echo "            <link href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/tips.css"), "html", null, true);
            echo "?ologyv=11\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        }
        // line 22
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 23
        echo "        <script type=\"text/javascript\">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-5940052-4']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
        <script type=\"text/javascript\">var switchTo5x=true;</script>
        <script type=\"text/javascript\" src=\"http://w.sharethis.com/button/buttons.js\"></script>
        <script type=\"text/javascript\">stLight.options({publisher: \"a9e6fce8-401e-4d4f-8fe8-300569a0aaa5\", tracking: \"google\"}); </script>
        ";
        // line 38
        $this->displayBlock('fb_title', $context, $blocks);
        // line 39
        echo "        ";
        $this->displayBlock('fb_description', $context, $blocks);
        // line 40
        echo "        ";
        $this->displayBlock('fb_image', $context, $blocks);
        // line 41
        echo "        ";
        $this->displayBlock('page_header', $context, $blocks);
        // line 45
        echo "    </head>
    <body>
    <script>
        function goLogIn(){
            window.location.href = \"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_check"), "html", null, true);
        echo "\";
            return false;
        }

        function onFbInit() {
            if (typeof(FB) != 'undefined' && FB != null) {
                FB.Event.subscribe('auth.statusChange', function(response) {
                    if (response.session || response.authResponse) {
                        setTimeout(goLogIn, 500);
                    } else {
                        window.location.href = \"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_logout"), "html", null, true);
        echo "\";
                    }
                });
            }
        }
    </script>
    ";
        // line 65
        echo $this->env->getExtension('facebook')->renderInitialize(array("xfbml" => true, "fbAsyncInit" => "onFbInit();"));
        echo "

    ";
        // line 67
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:topmenu.html.twig")->display($context);
        // line 68
        echo "    ";
        $this->displayBlock('body', $context, $blocks);
        // line 69
        echo "    ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:footer.html.twig")->display($context);
        // line 70
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 158
        echo "     
    ";
        // line 159
        $this->displayBlock('pagescripts', $context, $blocks);
        // line 163
        echo "    </body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
    }

    // line 22
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 38
    public function block_fb_title($context, array $blocks = array())
    {
    }

    // line 39
    public function block_fb_description($context, array $blocks = array())
    {
    }

    // line 40
    public function block_fb_image($context, array $blocks = array())
    {
    }

    // line 41
    public function block_page_header($context, array $blocks = array())
    {
        // line 42
        echo "        <meta name=\"title\" content=\"Ology is all about passions.\" />
        <meta name=\"description\" content=\"Ology is a social network all about your passions.  Share yours and discover new ones today!\" />
        ";
    }

    // line 68
    public function block_body($context, array $blocks = array())
    {
    }

    // line 70
    public function block_javascripts($context, array $blocks = array())
    {
        // line 71
        echo "        <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\" type=\"text/javascript\"></script>
        <script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js\"></script>
        <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/jquery.masonry.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/jquery.reject.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/jquery.isotope.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/jquery.timeago.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/jquery.jqDock.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/jquery.linkify-1.0-min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/charCount.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/ology.js"), "html", null, true);
        echo "?v=11\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/reologize.js"), "html", null, true);
        echo "?v=11\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/user_tooltip.js"), "html", null, true);
        echo "?v=11\" type=\"text/javascript\"></script>
        
        
        <script type=\"text/javascript\" src=\"http://platform.tumblr.com/v1/share.js\"></script>
        <script type=\"text/javascript\" src=\"//platform.twitter.com/widgets.js\"></script>
        <script type=\"text/javascript\">
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
        </script>
        <script type=\"text/javascript\" src=\"//assets.pinterest.com/js/pinit.js\"></script>

        ";
        // line 96
        if (((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user"))) && (!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "tipsList"))))) {
            // line 97
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/tips.js"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
        ";
        }
        // line 99
        echo "
<!--
            <script type=\"text/javascript\" charset=\"utf-8\">
              var is_ssl = (\"https:\" == document.location.protocol);
              var asset_host = is_ssl ? \"https://s3.amazonaws.com/getsatisfaction.com/\" : \"http://s3.amazonaws.com/getsatisfaction.com/\";
              document.write(unescape(\"%3Cscript src='\" + asset_host + \"javascripts/feedback-v2.js' type='text/javascript'%3E%3C/script%3E\"));
            </script>
-->
            <script type=\"text/javascript\" charset=\"utf-8\">
              var feedback_widget_options = {};
              feedback_widget_options.display = \"overlay\";  
              feedback_widget_options.company = \"ology_media\";
              feedback_widget_options.placement = \"right\";
              feedback_widget_options.color = \"#222\";
              feedback_widget_options.style = \"idea\";
              var feedback_widget = new GSFN.feedback_widget(feedback_widget_options);
            </script>
            
            <!-- Begin comScore Tag -->
            <script>
              var _comscore = _comscore || [];
              _comscore.push({ c1: \"2\", c2: \"6421468\" });
              (function() {
                var s = document.createElement(\"script\"), el = document.getElementsByTagName(\"script\")[0]; s.async = true;
                s.src = (document.location.protocol == \"https:\" ? \"https://sb\" : \"http://b\") + \".scorecardresearch.com/beacon.js\";
                el.parentNode.insertBefore(s, el);
              })();
            </script>
            <noscript>
              <img src=\"http://b.scorecardresearch.com/p?c1=2&c2=6421468&cv=2.0&cj=1\" />
            </noscript>
            <!-- End comScore Tag -->
            <!-- Start Quantcast tag -->
            <script type=\"text/javascript\">
            _qoptions={
            qacct:\"p-f976NMbAcG7z-\"
            };
            </script>
            <script type=\"text/javascript\" src=\"http://edge.quantserve.com/quant.js\"></script>
            <noscript>
            <img src=\"http://pixel.quantserve.com/pixel/p-f976NMbAcG7z-.gif\" style=\"display: none;\" border=\"0\" height=\"1\" width=\"1\" alt=\"Quantcast\"/>
            </noscript>
            <!-- End Quantcast tag -->
            <script type=\"text/javascript\" src=\"http://s.skimresources.com/js/28564X865370.skimlinks.js\"></script>
            
            <!-- Start Alexa Certify Javascript -->
            <script type=\"text/javascript\" src=\"https://d31qbv1cthcecs.cloudfront.net/atrk.js\"></script><script type=\"text/javascript\">_atrk_opts = { atrk_acct: \"/IJGf1agkf008c\", domain:\"ology.com\"}; atrk ();</script><noscript><img src=\"https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=/IJGf1agkf008c\" style=\"display:none\" height=\"1\" width=\"1\" alt=\"\" /></noscript>
            <!-- End Alexa Certify Javascript -->
            
            <!-- Compete XL Code for ology.com -->
            <script type=\"text/javascript\">
            __compete_code = '8f859bd58ccb11a42a549a5bdf6a683e';
            /* Set control variables below this line. */ 
            </script>
            <script type=\"text/javascript\" src=\"//c.compete.com/bootstrap/s/8f859bd58ccb11a42a549a5bdf6a683e/ology-com/bootstrap.js\"></script>
            <noscript>
            <img width=\"1\" height=\"1\" src=\"https://ssl-ology-com-8f859b.c-col.com\"/>
            </noscript>
    ";
    }

    // line 159
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 160
        echo "         <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
         <script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  56 => 12,  21 => 2,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 65,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 39,  107 => 36,  80 => 19,  63 => 18,  60 => 13,  69 => 20,  61 => 15,  52 => 11,  50 => 13,  45 => 12,  43 => 11,  34 => 5,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 49,  120 => 45,  117 => 41,  103 => 36,  99 => 34,  74 => 27,  47 => 19,  32 => 6,  39 => 7,  26 => 1,  97 => 34,  95 => 21,  88 => 29,  82 => 27,  78 => 25,  75 => 24,  71 => 14,  22 => 3,  44 => 9,  30 => 4,  20 => 2,  25 => 4,  49 => 11,  42 => 7,  40 => 8,  23 => 4,  27 => 4,  17 => 2,  92 => 23,  86 => 28,  79 => 19,  77 => 25,  57 => 15,  46 => 10,  37 => 7,  33 => 5,  29 => 4,  24 => 6,  19 => 2,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 22,  87 => 28,  84 => 28,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 23,  55 => 13,  51 => 13,  48 => 10,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}

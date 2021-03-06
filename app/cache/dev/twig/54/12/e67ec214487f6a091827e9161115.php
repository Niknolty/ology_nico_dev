<?php

/* OlogySocialBundle:FrontEnd:ologize_login.html.twig */
class __TwigTemplate_5412e67ec214487f6a091827e9161115 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>Ology - Sign in</title>
        <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
        <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"http://code.jquery.com/ui/1.8.18/jquery-ui.min.js\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/ologize_it/ologize_it.js"), "html", null, true);
        echo "\"></script>
        <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/ologize_it/ologize_it.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    </head>
    <body>
        <script>
            function goLogIn(){
                window.location.href = \"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_check"), "html", null, true);
        echo "?s=";
        echo twig_escape_filter($this->env, $this->getContext($context, "src_dec"), "html", null, true);
        echo "&l=";
        echo twig_escape_filter($this->env, $this->getContext($context, "link_dec"), "html", null, true);
        echo "&t=";
        echo twig_escape_filter($this->env, $this->getContext($context, "title_dec"), "html", null, true);
        echo "&d=";
        echo twig_escape_filter($this->env, $this->getContext($context, "description_dec"), "html", null, true);
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
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_security_logout"), "html", null, true);
        echo "\";
                        }
                    });
                }
            }
        </script>
        ";
        // line 29
        echo $this->env->getExtension('facebook')->renderInitialize(array("xfbml" => true, "fbAsyncInit" => "onFbInit();"));
        echo "
        <div id=\"main_login\">
            
            <div class=\"login-box\">
                <div class=\"ology_logo\">
                    <img src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/ologize_it/ologize_post_logo.png"), "html", null, true);
        echo "\"/>
                </div>
                ";
        // line 36
        if (($this->getContext($context, "login_error") != "")) {
            // line 37
            echo "                    <div id=\"message_box\">
                        ";
            // line 38
            echo twig_escape_filter($this->env, $this->getContext($context, "login_error"), "html", null, true);
            echo "
                    </div>
                ";
        }
        // line 41
        echo "                <div id=\"signin-box\">
                    <div class=\"facebook-signin\">
                         ";
        // line 43
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:facebook_signin.html.twig")->display($context);
        // line 44
        echo "                    </div>
                    <div class=\"twitter-signin\">
                        <a id=\"twitter-button\" href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_twitter_check"), "html", null, true);
        echo "?s=";
        echo twig_escape_filter($this->env, $this->getContext($context, "src_dec"), "html", null, true);
        echo "&l=";
        echo twig_escape_filter($this->env, $this->getContext($context, "link_dec"), "html", null, true);
        echo "&t=";
        echo twig_escape_filter($this->env, $this->getContext($context, "title_dec"), "html", null, true);
        echo "&d=";
        echo twig_escape_filter($this->env, $this->getContext($context, "description_dec"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/twitter_signin.png"), "html", null, true);
        echo "\"></a>
                    </div>
                </div>
                <div class=\"or-line-breakup\">
                    <img id=\"line\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/line.png"), "html", null, true);
        echo "\"/>
                    <span id=\"or-word\">or</span>
                    <img id=\"line\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/line.png"), "html", null, true);
        echo "\"/>
                </div>
            
                <form action=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"post\" id=\"login-form\">
                    <input type=\"text\" id=\"username\" name=\"_username\" placeholder=\"Email address\" value=\"\" />
                    <input type=\"password\" id=\"password\" name=\"_password\" placeholder=\"Password\" value=\"\"/>
                    <input type=\"hidden\" id=\"l\" name=\"l\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" id=\"s\" name=\"s\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getContext($context, "src"), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" id=\"t\" name=\"t\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getContext($context, "title"), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" id=\"d\" name=\"d\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getContext($context, "description"), "html", null, true);
        echo "\" />

                    <div class=\"reset-pw\"><a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_reset"), "html", null, true);
        echo "\" target=\"_blank\">Forgot Password?</a></div>
                    <div id=\"remember-login-box\">
                        <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                        <label for=\"remember_me\" id=\"remember-me-label\">Remember me</label>
                    </div>    
                    <div id=\"login-submit\">
                        <input type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"Login\" />
                    </div>
                </form>                
            </div>
        </div>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:ologize_login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  388 => 152,  384 => 151,  269 => 95,  747 => 248,  742 => 247,  739 => 246,  733 => 243,  729 => 242,  725 => 241,  721 => 240,  718 => 239,  711 => 235,  708 => 234,  705 => 233,  703 => 232,  698 => 231,  695 => 230,  687 => 224,  684 => 223,  678 => 220,  675 => 219,  673 => 218,  656 => 216,  653 => 215,  644 => 212,  641 => 211,  617 => 208,  615 => 207,  608 => 203,  597 => 196,  583 => 195,  580 => 194,  563 => 193,  555 => 189,  541 => 188,  538 => 187,  520 => 186,  512 => 181,  505 => 176,  491 => 175,  488 => 174,  457 => 165,  451 => 164,  429 => 150,  425 => 149,  403 => 143,  379 => 133,  372 => 131,  365 => 129,  341 => 120,  313 => 110,  172 => 62,  502 => 177,  494 => 175,  483 => 167,  470 => 161,  465 => 170,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  350 => 113,  295 => 105,  258 => 90,  144 => 39,  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 158,  434 => 154,  432 => 147,  417 => 145,  408 => 144,  404 => 140,  401 => 130,  398 => 138,  389 => 137,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 121,  239 => 82,  231 => 79,  674 => 231,  670 => 217,  665 => 228,  654 => 220,  650 => 214,  647 => 213,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 210,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 190,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 171,  464 => 166,  461 => 141,  458 => 157,  455 => 139,  452 => 160,  450 => 137,  439 => 150,  433 => 131,  431 => 130,  413 => 122,  410 => 134,  406 => 119,  392 => 153,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 93,  244 => 87,  236 => 84,  293 => 99,  246 => 72,  242 => 83,  173 => 64,  354 => 114,  319 => 112,  311 => 109,  303 => 106,  278 => 106,  262 => 101,  198 => 65,  334 => 119,  321 => 101,  308 => 109,  297 => 112,  284 => 87,  267 => 94,  264 => 99,  222 => 76,  201 => 58,  426 => 149,  415 => 146,  412 => 136,  409 => 135,  407 => 133,  400 => 129,  395 => 127,  375 => 132,  361 => 131,  357 => 124,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 106,  271 => 95,  266 => 102,  240 => 85,  230 => 67,  216 => 84,  213 => 72,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 108,  302 => 107,  291 => 103,  261 => 101,  252 => 86,  234 => 86,  223 => 80,  348 => 118,  340 => 129,  336 => 118,  332 => 110,  327 => 104,  324 => 108,  318 => 106,  315 => 99,  309 => 109,  304 => 102,  300 => 142,  290 => 102,  287 => 109,  279 => 97,  226 => 66,  149 => 55,  136 => 51,  100 => 43,  130 => 44,  251 => 94,  247 => 87,  238 => 84,  194 => 52,  191 => 55,  168 => 50,  294 => 114,  286 => 101,  283 => 102,  280 => 86,  277 => 85,  268 => 80,  263 => 94,  255 => 89,  243 => 73,  208 => 92,  202 => 73,  199 => 72,  186 => 69,  183 => 55,  181 => 63,  163 => 52,  140 => 53,  170 => 30,  112 => 35,  118 => 50,  106 => 33,  157 => 50,  232 => 68,  228 => 79,  220 => 79,  210 => 72,  207 => 69,  159 => 59,  151 => 48,  147 => 61,  105 => 37,  85 => 38,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 176,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 165,  476 => 164,  474 => 154,  471 => 173,  469 => 152,  466 => 151,  463 => 150,  453 => 155,  445 => 161,  442 => 145,  438 => 157,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 137,  411 => 145,  405 => 132,  402 => 132,  399 => 131,  396 => 154,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 130,  364 => 116,  358 => 113,  355 => 127,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 106,  330 => 117,  328 => 103,  325 => 114,  323 => 108,  320 => 100,  317 => 112,  307 => 96,  299 => 105,  296 => 100,  292 => 103,  289 => 89,  281 => 107,  275 => 96,  272 => 82,  270 => 104,  265 => 91,  259 => 94,  256 => 92,  250 => 90,  248 => 76,  235 => 83,  227 => 79,  218 => 78,  212 => 60,  206 => 60,  197 => 68,  187 => 67,  184 => 55,  182 => 65,  174 => 63,  150 => 49,  119 => 42,  110 => 48,  53 => 7,  66 => 20,  98 => 24,  166 => 53,  160 => 51,  154 => 49,  143 => 60,  138 => 42,  101 => 46,  36 => 9,  65 => 14,  18 => 1,  352 => 126,  347 => 123,  344 => 110,  282 => 100,  276 => 99,  274 => 104,  257 => 99,  253 => 91,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 82,  229 => 84,  225 => 81,  221 => 76,  217 => 74,  214 => 62,  203 => 67,  180 => 54,  175 => 44,  169 => 61,  167 => 62,  164 => 43,  155 => 45,  114 => 28,  83 => 23,  76 => 20,  72 => 17,  68 => 22,  64 => 18,  56 => 17,  21 => 2,  209 => 70,  205 => 71,  196 => 70,  192 => 58,  189 => 65,  178 => 54,  176 => 61,  165 => 57,  161 => 58,  152 => 63,  148 => 55,  145 => 66,  141 => 53,  134 => 47,  132 => 50,  127 => 38,  123 => 52,  109 => 40,  93 => 28,  90 => 23,  54 => 12,  133 => 47,  124 => 46,  111 => 32,  80 => 36,  60 => 14,  61 => 13,  52 => 11,  45 => 11,  34 => 3,  224 => 65,  215 => 77,  211 => 80,  204 => 73,  200 => 66,  195 => 57,  193 => 69,  190 => 59,  188 => 50,  185 => 66,  179 => 50,  177 => 49,  171 => 47,  162 => 48,  158 => 55,  156 => 56,  153 => 39,  146 => 49,  142 => 38,  137 => 46,  126 => 41,  120 => 22,  117 => 44,  103 => 32,  74 => 27,  47 => 15,  32 => 6,  26 => 8,  97 => 44,  95 => 43,  88 => 27,  78 => 19,  71 => 17,  22 => 3,  25 => 5,  42 => 6,  40 => 4,  23 => 4,  17 => 1,  92 => 21,  86 => 30,  79 => 13,  29 => 6,  24 => 3,  19 => 2,  69 => 21,  63 => 19,  58 => 23,  49 => 9,  43 => 10,  37 => 4,  20 => 2,  139 => 59,  131 => 35,  128 => 46,  125 => 41,  121 => 45,  115 => 37,  107 => 28,  99 => 28,  96 => 26,  91 => 41,  82 => 37,  77 => 15,  75 => 34,  57 => 12,  50 => 14,  46 => 11,  44 => 7,  39 => 5,  33 => 7,  30 => 9,  27 => 5,  135 => 58,  129 => 55,  122 => 35,  116 => 30,  113 => 36,  108 => 33,  104 => 31,  102 => 26,  94 => 25,  89 => 31,  87 => 19,  84 => 21,  81 => 20,  73 => 24,  70 => 16,  67 => 29,  62 => 20,  59 => 13,  55 => 16,  51 => 11,  48 => 9,  41 => 10,  38 => 14,  35 => 6,  31 => 8,  28 => 2,);
    }
}

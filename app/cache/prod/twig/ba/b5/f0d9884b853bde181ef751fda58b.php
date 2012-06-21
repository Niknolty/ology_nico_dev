<?php

/* OlogySocialBundle:FrontEnd:topmenu.html.twig */
class __TwigTemplate_bab5f0d9884b853bde181ef751fda58b extends Twig_Template
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
        if ((array_key_exists("disabledTopMenu", $context) && ($this->getContext($context, "disabledTopMenu") == true))) {
            // line 2
            echo "    <div id=\"topmenu\" class=\"disabled\">
";
        } else {
            // line 4
            echo "    <div id=\"topmenu\">    
";
        }
        // line 6
        echo "    
        <div id=\"top\">
\t\t<a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_home"), "html", null, true);
        echo "\" id=\"ology-logo\"></a>
                ";
        // line 9
        if (array_key_exists("searchForm", $context)) {
            // line 10
            echo "                <div>
                    <form action=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_search"), "html", null, true);
            echo "\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "searchForm"));
            echo ">
                    <div id=\"top-search\">
                        ";
            // line 13
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "searchForm"), "search"));
            echo "
                    </div>
                    ";
            // line 15
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "searchForm"), "type"));
            echo "
                    </form>
                </div>
                ";
        }
        // line 19
        echo "
\t\t<div id=\"top-left\">
\t\t\t";
        // line 21
        if ((array_key_exists("loggedIn", $context) && ($this->getContext($context, "loggedIn") == false))) {
            // line 22
            echo "                                ";
            if ($this->getContext($context, "login_error")) {
                echo "\t
                                    <div>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "login_error"), "message"), "html", null, true);
                echo "</div>
                                ";
            }
            // line 25
            echo "\t\t\t";
        } elseif (array_key_exists("user", $context)) {
            // line 26
            echo "                                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "user"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
            echo "\"></a>
                                <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "user"), "id"))), "html", null, true);
            echo "\">Hi, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "firstname"), "html", null, true);
            echo " </a>
                                ";
            // line 28
            $this->env->loadTemplate("OlogySocialBundle:Tips:profile_tip.html.twig")->display($context);
            // line 29
            echo "\t\t\t";
        }
        // line 30
        echo "\t\t</div>

\t\t<div id=\"top-right\">

                    ";
        // line 34
        if (((!array_key_exists("loggedIn", $context)) || ($this->getContext($context, "loggedIn") == false))) {
            // line 35
            echo "                    <div id=\"top-right2\">
\t\t\t<a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_splash"), "html", null, true);
            echo "\">Home</a>
\t\t\t<a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_register"), "html", null, true);
            echo "\">Join</a>
\t\t\t<a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_faq"), "html", null, true);
            echo "\">FAQ</a>
                        <a href=\"#\" class=\"channels-link\">News</a>
                        <a href=\"#\" class=\"login-link\">Login</a>
\t\t\t<div class=\"channels-box-lo\">
                            <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "celebs")), "html", null, true);
            echo "\">Celebs</a>
                            <a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "fashion")), "html", null, true);
            echo "\">Fashion</a>
                            <a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "film")), "html", null, true);
            echo "\">Film</a>
                            <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "geek")), "html", null, true);
            echo "\">Geek</a>
                            <a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "humor")), "html", null, true);
            echo "\">Humor</a>
                            <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "music")), "html", null, true);
            echo "\">Music</a>
                            <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "politics")), "html", null, true);
            echo "\">Politics</a>
                            <a href=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "sports")), "html", null, true);
            echo "\">Sports</a>
                            <a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "tv")), "html", null, true);
            echo "\">TV</a>
                            
                        </div>
                        <div class=\"login-box\">
                            <div id=\"signin-box\">
                                <div class=\"facebook-signin\">
                                    ";
            // line 56
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:facebook_signin.html.twig")->display($context);
            // line 57
            echo "                                </div>
                                <div class=\"twitter-signin\">
                                    ";
            // line 59
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:twitter_signin.html.twig")->display($context);
            // line 60
            echo "                                </div>
                            </div>
                            <div class=\"or-line-breakup\">
                                <img id=\"line\" src=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/line.png"), "html", null, true);
            echo "\"/>
                                <span id=\"or-word\">or</span>
                                <img id=\"line\" src=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/line.png"), "html", null, true);
            echo "\"/>
                            </div>
                            <form action=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
            echo "\" method=\"post\" id=\"login-form\">
                                <input type=\"text\" id=\"username\" name=\"_username\" placeholder=\"Email address\" value=\"";
            // line 68
            if (array_key_exists("last_username", $context)) {
                echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
            }
            echo "\" />

                                <input type=\"password\" id=\"password\" name=\"_password\" placeholder=\"Password\"/>
                                <div class=\"reset-pw\"><a href=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_reset"), "html", null, true);
            echo "\">Forgot Password?</a></div> 

                                <div id=\"remember-login-box\">

                                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                                    <label for=\"remember_me\" id=\"remember-me-label\">Remember me</label>
                                    <input type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"Login\" />
                                </div>
                            </form>
                            <span class=\"login-close\">x</span> 
\t\t\t</div>
                    </div>
\t\t";
        } else {
            // line 84
            echo "                        ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:ology_create_tip.html.twig")->display($context);
            // line 85
            echo "                        ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:news_tip.html.twig")->display($context);
            // line 86
            echo "                        ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:settings_tip.html.twig")->display($context);
            // line 87
            echo "                        ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:invite_tip.html.twig")->display($context);
            // line 88
            echo "                    
                    \t<a href=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_home"), "html", null, true);
            echo "\">Home</a>
\t\t\t<a href=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_create"), "html", null, true);
            echo "\">Create</a>
\t\t\t<a href=\"";
            // line 91
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_splash"), "html", null, true);
            echo "\">Explore</a>
                        <a href=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_invite"), "html", null, true);
            echo "\">Invite</a>
                        <a href=\"#\" class=\"channels-link\">News</a>
                        
                        ";
            // line 95
            if ($this->env->getExtension('security')->isGranted("ROLE_EDITOR")) {
                // line 96
                echo "                        <div class=\"channels-box-ed\">
                        ";
            } else {
                // line 98
                echo "                        <div class=\"channels-box-li\">
                        ";
            }
            // line 100
            echo "                            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "celebs")), "html", null, true);
            echo "\">Celebs</a>
                            <a href=\"";
            // line 101
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "fashion")), "html", null, true);
            echo "\">Fashion</a>
                            <a href=\"";
            // line 102
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "film")), "html", null, true);
            echo "\">Film</a>
                            <a href=\"";
            // line 103
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "geek")), "html", null, true);
            echo "\">Geek</a>
                            <a href=\"";
            // line 104
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "humor")), "html", null, true);
            echo "\">Humor</a>
                            <a href=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "music")), "html", null, true);
            echo "\">Music</a>
                            <a href=\"";
            // line 106
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "politics")), "html", null, true);
            echo "\">Politics</a>
                            <a href=\"";
            // line 107
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "sports")), "html", null, true);
            echo "\">Sports</a>
                            <a href=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel", array("stub" => "tv")), "html", null, true);
            echo "\">TV</a>
                            
                        </div>
                        
                        ";
            // line 112
            if ($this->env->getExtension('security')->isGranted("ROLE_EDITOR")) {
                // line 113
                echo "                            <a href=\"#\" class=\"editor-link\">Editors</a>
                            <div class=\"editor-box\">
                                    <a href=\"";
                // line 115
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_form"), "html", null, true);
                echo "\">New Post</a>
                                    <a href=\"";
                // line 116
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_list"), "html", null, true);
                echo "\">My articles</a>
                                    <a href=\"";
                // line 117
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_channel_list"), "html", null, true);
                echo "\">News admin</a>
                            </div>
                        <a href=\"#\" class=\"account-link-editor\">Account</a>
\t\t\t<div class=\"account-box-editor\">
                        ";
            } else {
                // line 122
                echo "                        <a href=\"#\" class=\"account-link\">Account</a>
\t\t\t<div class=\"account-box\">
                        ";
            }
            // line 125
            echo "                                ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:faq_tip.html.twig")->display($context);
            // line 126
            echo "\t\t\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_settings"), "html", null, true);
            echo "\">Settings</a>
\t\t\t\t<a href=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "user"), "id"))), "html", null, true);
            echo "\">Profile</a>
\t\t\t\t<a href=\"";
            // line 128
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_faq"), "html", null, true);
            echo "\">FAQ</a>
\t\t\t\t<a href=\"";
            // line 129
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_manual_log_out"), "html", null, true);
            echo "\">Log Out</a>
\t\t\t</div>
\t\t";
        }
        // line 132
        echo "
\t\t</div>
\t</div>
</div>
";
        // line 136
        if (((!array_key_exists("loggedIn", $context)) || ($this->getContext($context, "loggedIn") == false))) {
            // line 137
            echo "\t";
        } else {
            // line 160
            echo "    ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:get_started_prompt.html.twig")->display($context);
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:topmenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 105,  262 => 101,  198 => 71,  334 => 119,  321 => 114,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 107,  291 => 104,  261 => 98,  252 => 117,  234 => 103,  223 => 87,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 108,  287 => 102,  279 => 84,  226 => 88,  149 => 41,  136 => 40,  125 => 36,  115 => 38,  100 => 27,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 68,  168 => 64,  128 => 36,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 67,  183 => 75,  181 => 65,  163 => 56,  140 => 45,  170 => 70,  121 => 29,  112 => 48,  118 => 34,  106 => 40,  157 => 44,  232 => 88,  228 => 86,  220 => 86,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 60,  105 => 34,  85 => 27,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 103,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 49,  119 => 49,  110 => 36,  53 => 11,  91 => 28,  66 => 34,  98 => 42,  96 => 30,  166 => 60,  160 => 66,  154 => 50,  143 => 42,  138 => 46,  101 => 25,  58 => 17,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 83,  274 => 104,  257 => 100,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 89,  225 => 100,  221 => 84,  217 => 85,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  139 => 41,  114 => 51,  83 => 30,  76 => 33,  72 => 19,  68 => 20,  64 => 21,  56 => 18,  21 => 3,  209 => 79,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 42,  148 => 54,  145 => 39,  141 => 58,  134 => 45,  132 => 55,  127 => 34,  123 => 35,  109 => 41,  93 => 29,  90 => 24,  54 => 15,  133 => 31,  124 => 33,  111 => 37,  107 => 36,  80 => 27,  63 => 21,  60 => 18,  69 => 22,  61 => 17,  52 => 15,  50 => 14,  45 => 12,  43 => 10,  34 => 10,  224 => 65,  215 => 90,  211 => 80,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 68,  188 => 53,  185 => 67,  179 => 65,  177 => 64,  171 => 60,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 48,  142 => 47,  137 => 37,  131 => 37,  126 => 43,  120 => 46,  117 => 48,  103 => 45,  99 => 26,  74 => 39,  47 => 13,  32 => 8,  39 => 11,  26 => 4,  97 => 40,  95 => 35,  88 => 35,  82 => 32,  78 => 26,  75 => 25,  71 => 18,  22 => 3,  44 => 12,  30 => 8,  20 => 2,  25 => 7,  49 => 13,  42 => 9,  40 => 11,  23 => 4,  27 => 6,  17 => 1,  92 => 29,  86 => 42,  79 => 31,  77 => 27,  57 => 14,  46 => 11,  37 => 10,  33 => 5,  29 => 8,  24 => 6,  19 => 2,  135 => 50,  129 => 35,  122 => 42,  116 => 30,  113 => 32,  108 => 36,  104 => 35,  102 => 34,  94 => 26,  89 => 30,  87 => 33,  84 => 33,  81 => 41,  73 => 20,  70 => 23,  67 => 22,  62 => 19,  59 => 19,  55 => 15,  51 => 13,  48 => 12,  41 => 11,  38 => 11,  35 => 9,  31 => 8,  28 => 9,);
    }
}

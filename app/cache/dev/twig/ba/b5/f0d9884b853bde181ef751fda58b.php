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
        return array (  346 => 132,  340 => 129,  332 => 127,  324 => 125,  319 => 122,  311 => 117,  299 => 113,  297 => 112,  290 => 108,  278 => 105,  270 => 103,  266 => 102,  262 => 101,  247 => 95,  198 => 71,  186 => 67,  181 => 65,  176 => 63,  165 => 57,  163 => 56,  154 => 50,  150 => 49,  146 => 48,  138 => 46,  134 => 45,  130 => 44,  122 => 42,  96 => 30,  93 => 29,  91 => 28,  85 => 27,  78 => 26,  75 => 25,  70 => 23,  65 => 22,  63 => 21,  47 => 13,  35 => 9,  27 => 6,  23 => 4,  19 => 2,  61 => 23,  42 => 11,  28 => 5,  22 => 3,  20 => 2,  17 => 1,  352 => 136,  347 => 160,  344 => 159,  282 => 106,  276 => 97,  274 => 104,  257 => 100,  253 => 98,  249 => 96,  245 => 79,  241 => 92,  237 => 91,  233 => 90,  229 => 89,  225 => 74,  221 => 73,  217 => 85,  209 => 68,  200 => 41,  190 => 68,  185 => 38,  180 => 22,  175 => 8,  167 => 159,  161 => 70,  158 => 69,  155 => 68,  153 => 67,  148 => 65,  139 => 59,  126 => 43,  120 => 45,  117 => 41,  114 => 40,  111 => 37,  109 => 38,  83 => 20,  80 => 19,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  60 => 13,  56 => 12,  52 => 15,  44 => 12,  37 => 10,  33 => 8,  31 => 8,  26 => 1,  502 => 177,  498 => 176,  494 => 175,  483 => 167,  479 => 165,  476 => 164,  470 => 161,  467 => 160,  465 => 159,  462 => 158,  458 => 157,  453 => 155,  447 => 153,  444 => 152,  441 => 151,  439 => 150,  435 => 148,  432 => 147,  430 => 146,  424 => 142,  422 => 141,  416 => 137,  410 => 134,  407 => 133,  405 => 132,  401 => 130,  390 => 125,  381 => 123,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  357 => 160,  354 => 137,  350 => 113,  345 => 110,  342 => 109,  339 => 108,  336 => 128,  333 => 106,  330 => 105,  327 => 126,  325 => 103,  321 => 101,  315 => 99,  309 => 97,  307 => 116,  303 => 115,  298 => 92,  295 => 91,  289 => 89,  286 => 107,  284 => 87,  280 => 86,  275 => 83,  272 => 82,  268 => 80,  258 => 79,  248 => 76,  243 => 73,  235 => 69,  232 => 68,  226 => 88,  223 => 87,  220 => 86,  214 => 84,  206 => 60,  203 => 42,  201 => 58,  195 => 40,  191 => 55,  182 => 51,  179 => 50,  177 => 49,  174 => 48,  171 => 60,  169 => 59,  164 => 158,  160 => 41,  144 => 39,  142 => 47,  135 => 37,  131 => 35,  115 => 38,  113 => 32,  107 => 36,  104 => 35,  102 => 34,  98 => 24,  94 => 22,  92 => 23,  89 => 22,  87 => 19,  84 => 18,  77 => 15,  74 => 14,  67 => 12,  59 => 19,  53 => 17,  51 => 6,  48 => 10,  40 => 11,  32 => 3,);
    }
}

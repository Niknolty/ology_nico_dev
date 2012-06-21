<?php

/* OlogySocialBundle:FrontEnd:settings.html.twig */
class __TwigTemplate_12f8f17093ea85328520019720a3af46 extends Twig_Template
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
        echo "Settings | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
<div id=\"container\">
    <div id=\"user-settings\">

    <div class=\"show-ologize\">Ologize<br /> Button</div>
    <div class=\"show-notifications\">Manage Notifications</div>
    <div class=\"show-account\">Account<br /> Info</div>

        <h2>Settings</h2>

        ";
        // line 14
        if ((($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "get", array(0 => "inRegistration"), "method") == true) && (!(null === $this->getAttribute($this->getContext($context, "user"), "fbid"))))) {
            // line 15
            echo "            <div id=\"fb-associated\">
                    <p>
                        Hey, thanks for signing up through Facebook--that was easy, right? If you had an account on here already and don't see your ologies and content, no big deal, you can merge your logins and that problem will disappear.
                    </p>
                    <a href=\"/mergeAccount\">Click here to enter the email address for your original account, and that's it! You'll be all set!</a> 
            </div>
        ";
        }
        // line 22
        echo "
            <form action=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_user_update"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo " id=\"settings-form\">
                ";
        // line 24
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Name:</div>
                    First Name";
        // line 27
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "firstName"));
        echo "
                    Last Name";
        // line 28
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "lastName"));
        echo "
            </div>

            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">3 Things I Love:</div>
                    ";
        // line 33
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "top1"));
        echo "
                    ";
        // line 34
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "top2"));
        echo "
                    ";
        // line 35
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "top3"));
        echo "
            </div>

            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Occupation:</div>
                    ";
        // line 40
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "occupation"));
        echo "
            </div>

            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">About Me:</div>
                    ";
        // line 45
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "summary"));
        echo "
            </div>

            ";
        // line 48
        if ($this->env->getExtension('security')->isGranted("ROLE_EDITOR")) {
            // line 49
            echo "            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Editorial Title:</div>
                    ";
            // line 51
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "editorTitle"));
            echo "

                    <div class=\"settings-tilte\">Twitter account:</div>
                    ";
            // line 54
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "editorTwitterId"));
            echo "

                    <div class=\"settings-tilte\">Main Channel:</div>
                    ";
            // line 57
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "mainChannel"));
            echo "
            </div>
            ";
        }
        // line 60
        echo "            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Websites:</div>
                    ";
        // line 62
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "website1"));
        echo "
                    ";
        // line 63
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "website2"));
        echo "
                    ";
        // line 64
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "website3"));
        echo "
            </div>

            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Sex:</div>
                    ";
        // line 69
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "sex"));
        echo "
            </div>

            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Birthday:</div>
            ";
        // line 74
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "bdayDay"));
        echo " ";
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "bdayMonth"));
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "bdayYear"));
        echo "
            ";
        // line 75
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "displayBday"));
        echo " Do Not Display on my Profile
            </div>

            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Location:</div>
                    ";
        // line 80
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "location"));
        echo "
            </div>

            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Email:</div>
                    ";
        // line 85
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "email"));
        echo "
                    ";
        // line 86
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "doNotEmail"));
        echo " Do not email me if I don't ask you to. Ever.
            </div>

            ";
        // line 89
        if ((null === $this->getAttribute($this->getContext($context, "user"), "twitterId"))) {
            // line 90
            echo "            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Change Password:</div>
                    Change Password ";
            // line 92
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "changePassword"));
            echo "
                    Confim Password";
            // line 93
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "confirmChangePassword"));
            echo "
            </div>
            ";
        }
        // line 96
        echo "
            <div class=\"settings-section\">
                    <div class=\"settings-tilte\">Photo:</div>
                    ";
        // line 99
        if ((!(null === $this->getAttribute($this->getContext($context, "user"), "fbId")))) {
            // line 100
            echo "                            <div id=\"refresh-fb\">Pull my profile pic from Facebook</div>
                    ";
        }
        // line 102
        echo "                    <img id=\"fb-pic\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_large_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
        echo "\">
                    ";
        // line 103
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "imageFile"));
        echo "
            </div>

            <input type=\"submit\" value=\"Update\" class=\"create-ology-button\"/>

            </form>
\t</div>

\t<div id=\"user-notifications\">
        <div class=\"show-ologize\">Ologize<br /> Button</div>
        <div class=\"show-notifications\">Manage Notifications</div>
        <div class=\"show-account\">Account<br /> Info</div>
        <h2>Settings</h2>
        ";
        // line 116
        $this->env->loadTemplate("OlogySocialBundle:Tips:notifications_tip.html.twig")->display($context);
        // line 117
        echo "        <div class=\"settings-tilte\">Notifications:</div>
        <form action=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_user_update_notification"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo ">
            ";
        // line 119
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "notificationForm"));
        echo "
            <input type=\"submit\" value=\"Update\" class=\"create-ology-button\"/>
        </form>
    </div>

    <div id=\"user-ologize\">

        <div class=\"show-ologize\">Ologize<br /> Button</div>
        <div class=\"show-notifications\">Manage Notifications</div>
        <div class=\"show-account\">Account<br /> Info</div>

        <h2>Settings</h2>
        <div class=\"settings-tilte\">Ologize:</div>
        ";
        // line 132
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:ologize_settings.html.twig")->display($context);
        // line 133
        echo "    </div>
</div>

";
    }

    // line 138
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 139
        if ($this->getContext($context, "loggedIn")) {
            // line 140
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/jquery.autocomplete-1.1.3/styles.css"), "html", null, true);
            echo "\" type=\"text/css\"/>
<script src=\"";
            // line 141
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/jquery.autocomplete-1.1.3/jquery.autocomplete.js"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
";
            // line 142
            if (($this->getAttribute($this->getContext($context, "user"), "FbId") != null)) {
                // line 143
                echo "<script type=\"text/javascript\">
     \$.ajax(\"";
                // line 144
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_fb_likes"), "html", null, true);
                echo "\");
     \$('#refresh-fb').click(function(){
        \$.ajax({url: \"";
                // line 146
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_fb_pic"), "html", null, true);
                echo "\",
                context: document.body,
                success: function(data){
                            \$('#fb-pic').attr(\"src\", \"";
                // line 149
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getContext($context, "user_large_image_path")), "html", null, true);
                echo "\" + data);
                          }
                });
     });
</script>
";
            }
            // line 155
            echo "<script type=\"text/javascript\">
var a = \$('#userForm_top1').autocomplete({ 
    serviceUrl:'";
            // line 157
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ologies_autocomplete_ajax"), "html", null, true);
            echo "',
    maxHeight:220,
    width:500,
    noCache: false,
  });

var b = \$('#userForm_top2').autocomplete({ 
    serviceUrl:'";
            // line 164
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ologies_autocomplete_ajax"), "html", null, true);
            echo "',
    maxHeight:220,
    width:500,
    noCache: false,
  });
  
var c = \$('#userForm_top3').autocomplete({ 
    serviceUrl:'";
            // line 171
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ologies_autocomplete_ajax"), "html", null, true);
            echo "',
    maxHeight:220,
    width:500,
    noCache: false,
  });
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  339 => 164,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 143,  291 => 140,  261 => 119,  252 => 117,  234 => 103,  223 => 99,  348 => 135,  340 => 133,  336 => 132,  332 => 131,  327 => 130,  324 => 129,  318 => 125,  315 => 124,  309 => 121,  304 => 119,  300 => 142,  290 => 112,  287 => 111,  279 => 133,  226 => 86,  149 => 63,  136 => 40,  100 => 31,  130 => 38,  251 => 82,  247 => 81,  238 => 90,  194 => 68,  191 => 67,  168 => 64,  294 => 114,  286 => 138,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 92,  255 => 118,  243 => 80,  208 => 92,  202 => 89,  199 => 163,  186 => 66,  183 => 65,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  112 => 26,  118 => 41,  106 => 29,  157 => 41,  232 => 88,  228 => 6,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 171,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 89,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 79,  187 => 74,  184 => 80,  182 => 66,  174 => 63,  150 => 57,  119 => 49,  110 => 36,  53 => 11,  66 => 20,  98 => 29,  166 => 54,  160 => 47,  154 => 36,  143 => 54,  138 => 54,  101 => 25,  36 => 4,  65 => 24,  18 => 1,  352 => 117,  347 => 160,  344 => 134,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 84,  241 => 91,  237 => 77,  233 => 76,  229 => 102,  225 => 100,  221 => 78,  217 => 72,  214 => 76,  203 => 71,  180 => 22,  175 => 8,  169 => 74,  167 => 61,  164 => 60,  155 => 49,  114 => 51,  83 => 24,  76 => 19,  72 => 19,  68 => 19,  64 => 14,  56 => 12,  21 => 3,  209 => 85,  205 => 72,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 75,  165 => 63,  161 => 69,  152 => 58,  148 => 56,  145 => 62,  141 => 60,  134 => 62,  132 => 43,  127 => 37,  123 => 51,  109 => 37,  93 => 39,  90 => 24,  54 => 12,  133 => 31,  124 => 44,  111 => 45,  80 => 27,  60 => 22,  61 => 21,  52 => 10,  45 => 11,  34 => 3,  224 => 65,  215 => 90,  211 => 88,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 66,  185 => 73,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 50,  156 => 49,  153 => 64,  146 => 55,  142 => 42,  137 => 44,  126 => 57,  120 => 33,  117 => 48,  103 => 40,  74 => 20,  47 => 10,  32 => 6,  26 => 4,  97 => 40,  95 => 35,  88 => 28,  78 => 26,  71 => 22,  22 => 3,  25 => 4,  42 => 6,  40 => 7,  23 => 5,  17 => 1,  92 => 29,  86 => 23,  79 => 28,  29 => 5,  24 => 6,  19 => 2,  69 => 24,  63 => 23,  58 => 13,  49 => 14,  43 => 6,  37 => 4,  20 => 2,  139 => 41,  131 => 40,  128 => 45,  125 => 36,  121 => 29,  115 => 31,  107 => 27,  99 => 27,  96 => 26,  91 => 34,  82 => 23,  77 => 20,  75 => 27,  57 => 15,  50 => 13,  46 => 7,  44 => 7,  39 => 5,  33 => 3,  30 => 9,  27 => 2,  135 => 57,  129 => 54,  122 => 56,  116 => 39,  113 => 31,  108 => 36,  104 => 28,  102 => 41,  94 => 25,  89 => 30,  87 => 33,  84 => 27,  81 => 21,  73 => 20,  70 => 20,  67 => 22,  62 => 15,  59 => 14,  55 => 14,  51 => 15,  48 => 8,  41 => 5,  38 => 4,  35 => 3,  31 => 6,  28 => 2,);
    }
}

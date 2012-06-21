<?php

/* OlogySocialBundle:FrontEnd:invite_facebook.html.twig */
class __TwigTemplate_42214a00faa6df2b05021c80cd5edd7c extends Twig_Template
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
        echo "Invite | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        if (($this->getContext($context, "loggedIn") == true)) {
            // line 5
            echo "\t<div id='page'>
            ";
            // line 6
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:dock.html.twig")->display($context);
            // line 7
            echo "\t</div>
";
        }
        // line 9
        echo "
<div id=\"container\">

  <div id=\"invite-box-main\">
    <h2>Invite your Facebook friends</h2>
        
        ";
        // line 15
        if (array_key_exists("fbError", $context)) {
            // line 16
            echo "        <p>
            <h3>Step 1: Authorize Ology to send an invite to your contacts by clicking here:</h3>
                <fb:login-button size=\"small\" scope=\"email,user_birthday,user_location,user_likes,publish_stream\">Connect to FB</fb:login-button>
        </p>
                <div id=\"fb-root\"></div>
                
        <p>
            If you are not redirected after clicking the facebook button, you might have to log out from Facebook first and retry.
        </p>
        ";
        } else {
            // line 26
            echo "        <h3>Choose which friends you want to invite:</h3>
        <p>Ology will post an invite on the wall of the friends you selected on your behalf.<br/>
        Please note that it is the <b>only</b> time that Ology will ever send a facebook message to your friends for you.<br/><br/></p>


                ";
            // line 31
            if (array_key_exists("friends", $context)) {
                // line 32
                echo "                   
            <form action=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_invite_fb_send"), "html", null, true);
                echo "\" method=\"post\">
                <div style=\"width: 490px; height: 250px; overflow-y: scroll; background:#ffffff;\">
                    ";
                // line 35
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "friends"));
                foreach ($context['_seq'] as $context["name"] => $context["id"]) {
                    // line 36
                    echo "                            
                            <div class=\"fb-invite-user\">
                              <div class=\"fb-invite-pic\">
                                <img src=\"https://graph.facebook.com/";
                    // line 39
                    echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
                    echo "/picture\" />
                                <input type=\"checkbox\" name=\"friends[]\" value=\"";
                    // line 40
                    echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
                    echo "\"/>
                              </div>
                              ";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
                    echo "
                            </div>
                    
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['id'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 46
                echo "                 </div>
                <div id=\"invite-form\">
                <br />
                    <h3>Invite to:</h3>
                    ";
                // line 50
                echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "ologyId"));
                echo " <br/>

                    <h3>Include a personal message:</h2>
                    ";
                // line 53
                echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "msg"));
                echo "
                <div id=\"invite-button\" >
                <br />
                    <input type=\"submit\" value=\"send\" class=\"invite-button\" />
                </div>

            </form>
                    </div>
                ";
            }
            // line 62
            echo "                <p>Only click the send button once or invites will be sent multiple times.</p>
        ";
        }
        // line 64
        echo "  </div>
</div>
";
    }

    // line 68
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 69
        echo "<script>
              window.fbAsyncInit = function() {
                FB.init({
                  appId      : '";
        // line 72
        echo twig_escape_filter($this->env, $this->getContext($context, "fb_app_id"), "html", null, true);
        echo "',
                  status     : true,
                  cookie     : true,
                  xfbml      : true,
                  oauth      : true,
                });

                FB.Event.subscribe('auth.login', function(response) {
                  window.location = '";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "fb_controller_path")), "html", null, true);
        echo "';
                });
              };

              (function(d){
                 var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                 js = d.createElement('script'); js.id = id; js.async = true;
                 js.src = \"//connect.facebook.net/en_US/all.js\";
                 d.getElementsByTagName('head')[0].appendChild(js);
               }(document));
            </script>

<script type=\"text/javascript\">
    \$('#inviteForm_ologyId').prepend(
        \$('<option></option>').val(-1).html('Entire site')
    );
    \$(\"#inviteForm_ologyId\").val(-1);
</script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:invite_facebook.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 105,  262 => 101,  198 => 71,  334 => 119,  321 => 114,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 107,  291 => 104,  261 => 98,  252 => 117,  234 => 103,  223 => 87,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 108,  287 => 102,  279 => 84,  226 => 88,  149 => 68,  136 => 40,  125 => 36,  115 => 46,  100 => 40,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 68,  168 => 80,  128 => 36,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 67,  183 => 75,  181 => 65,  163 => 56,  140 => 63,  170 => 70,  121 => 50,  112 => 48,  118 => 34,  106 => 40,  157 => 72,  232 => 88,  228 => 86,  220 => 86,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 60,  105 => 42,  85 => 32,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 103,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 49,  119 => 49,  110 => 36,  53 => 10,  91 => 36,  66 => 34,  98 => 37,  96 => 39,  166 => 60,  160 => 66,  154 => 50,  143 => 64,  138 => 46,  101 => 25,  58 => 16,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 83,  274 => 104,  257 => 100,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 89,  225 => 100,  221 => 84,  217 => 85,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  139 => 62,  114 => 51,  83 => 37,  76 => 20,  72 => 19,  68 => 20,  64 => 21,  56 => 15,  21 => 3,  209 => 79,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 69,  148 => 67,  145 => 66,  141 => 58,  134 => 45,  132 => 55,  127 => 53,  123 => 49,  109 => 40,  93 => 29,  90 => 24,  54 => 13,  133 => 31,  124 => 33,  111 => 48,  107 => 47,  80 => 27,  63 => 19,  60 => 18,  69 => 22,  61 => 17,  52 => 15,  50 => 12,  45 => 12,  43 => 10,  34 => 3,  224 => 65,  215 => 90,  211 => 80,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 68,  188 => 53,  185 => 67,  179 => 65,  177 => 64,  171 => 60,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 48,  142 => 47,  137 => 37,  131 => 37,  126 => 43,  120 => 46,  117 => 46,  103 => 45,  99 => 26,  74 => 39,  47 => 11,  32 => 6,  39 => 5,  26 => 5,  97 => 40,  95 => 41,  88 => 35,  82 => 33,  78 => 26,  75 => 34,  71 => 18,  22 => 3,  44 => 7,  30 => 6,  20 => 2,  25 => 7,  49 => 13,  42 => 6,  40 => 9,  23 => 4,  27 => 4,  17 => 1,  92 => 34,  86 => 38,  79 => 32,  77 => 31,  57 => 15,  46 => 11,  37 => 4,  33 => 5,  29 => 2,  24 => 3,  19 => 2,  135 => 50,  129 => 35,  122 => 42,  116 => 30,  113 => 32,  108 => 36,  104 => 35,  102 => 34,  94 => 26,  89 => 30,  87 => 35,  84 => 32,  81 => 41,  73 => 24,  70 => 26,  67 => 17,  62 => 16,  59 => 24,  55 => 11,  51 => 19,  48 => 9,  41 => 5,  38 => 4,  35 => 3,  31 => 8,  28 => 2,);
    }
}

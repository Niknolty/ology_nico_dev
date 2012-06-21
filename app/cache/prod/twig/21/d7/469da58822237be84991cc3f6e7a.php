<?php

/* OlogySocialBundle:FrontEnd:onboarding_step3.html.twig */
class __TwigTemplate_21d7469da58822237be84991cc3f6e7a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
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
        echo "Onboarding | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
<div id=\"container\">
    <div id=\"onboarding-profile\">
        <h1>You're set!</h1>
        <h2>Nice work, you're sort of awesome.</h2>
        <h3>Have a question?</h3>
        <p>
            Check out our <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_faq"), "html", null, true);
        echo "\">FAQs</a> to learn the ins and outs of Ology.   
        </p>
        <div class=\"profile-user\" style=\"background-image:url('";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_large_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
        echo "');\">
        </div>
        <span>
            Look at you.
        </span>
        <div class=\"upload-button\">
            Upload New Photo
        </div>
        <form action=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_onboarding", array("step" => 3)), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo " id=\"onboarding-form\">
            ";
        // line 22
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "form"), "imageFile"));
        echo "
            <input type=\"submit\" value=\"Update\" id=\"onboarding-submit\"/>
        </form>
    </div>
    <div id=\"onboarding-main\">
        <div id=\"onboarding-nav-bar\">
            <div class=\"ology-circle\">Step 1</div>
            <div class=\"ology-circle\">Step 2</div>
            <div class=\"ology-circle selected\">Done!</div>
        </div>
        <p>
            Cool. Now why not:
        </p>
        <div id=\"social-content\">
            <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, constant("\\Ology\\SocialBundle\\Resources\\Constants::FACEBOOK_FOLLOW_LINK"), "html", null, true);
        echo "\" target=\"_blank\">
                <img src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/facebook_like.jpg"), "html", null, true);
        echo "\"></img>
            </a>
            <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, constant("\\Ology\\SocialBundle\\Resources\\Constants::TWITTER_FOLLOW_LINK"), "html", null, true);
        echo "\" target=\"_blank\">
                <img src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/twitter_follow.jpg"), "html", null, true);
        echo "\"></img>
            </a>
        </div>
        <hr><br>
        <p>
            Where do you want to go from here?
        </p>
        <div id=\"onboarding-content\">
            <h2>Pick your destination:</h2>
            <div class=\"rect-button\">
                <a href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "user"), "getId"))), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/icon_profile.png"), "html", null, true);
        echo "\"></img>
                    My Profile
                </a>
            </div>
            <div class=\"rect-button\">
                <a href=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_home"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/icon_home.png"), "html", null, true);
        echo "\"></img>
                    My Home Page
                </a>
            </div>
            <div class=\"rect-button\">
                <a href=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_last_page"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/icon_arrow.png"), "html", null, true);
        echo "\"></img>
                    Where I Was
                </a>
            </div>      

            <h2>Happy Ologizing!</h2>
            <p>- The Ology Team</p>
        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:onboarding_step3.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 32,  251 => 82,  247 => 81,  238 => 79,  194 => 68,  191 => 67,  168 => 64,  128 => 45,  294 => 107,  286 => 103,  283 => 102,  280 => 101,  277 => 100,  268 => 94,  263 => 92,  255 => 83,  243 => 80,  208 => 73,  202 => 71,  199 => 163,  186 => 66,  183 => 65,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  121 => 29,  112 => 26,  118 => 41,  106 => 27,  157 => 41,  232 => 67,  228 => 6,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 99,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 78,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 69,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 50,  53 => 11,  91 => 20,  66 => 17,  98 => 29,  96 => 29,  166 => 54,  160 => 47,  154 => 36,  143 => 54,  138 => 63,  101 => 25,  58 => 10,  36 => 4,  65 => 24,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 84,  241 => 85,  237 => 77,  233 => 76,  229 => 81,  225 => 5,  221 => 78,  217 => 72,  214 => 76,  203 => 71,  180 => 22,  175 => 8,  169 => 56,  167 => 159,  164 => 158,  155 => 49,  139 => 32,  114 => 51,  83 => 24,  76 => 19,  72 => 19,  68 => 19,  64 => 15,  56 => 14,  21 => 3,  209 => 74,  205 => 72,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 61,  152 => 58,  148 => 56,  145 => 56,  141 => 36,  134 => 62,  132 => 43,  127 => 42,  123 => 44,  109 => 37,  93 => 39,  90 => 31,  54 => 12,  133 => 31,  124 => 44,  111 => 31,  107 => 27,  80 => 27,  63 => 17,  60 => 15,  69 => 18,  61 => 21,  52 => 13,  50 => 13,  45 => 11,  43 => 12,  34 => 6,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 70,  195 => 68,  193 => 67,  190 => 60,  188 => 66,  185 => 65,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 58,  153 => 58,  146 => 55,  142 => 39,  137 => 44,  131 => 40,  126 => 57,  120 => 35,  117 => 28,  103 => 26,  99 => 34,  74 => 20,  47 => 10,  32 => 6,  39 => 4,  26 => 4,  97 => 40,  95 => 33,  88 => 37,  82 => 23,  78 => 21,  75 => 25,  71 => 24,  22 => 3,  44 => 11,  30 => 9,  20 => 2,  25 => 4,  49 => 12,  42 => 9,  40 => 7,  23 => 5,  27 => 2,  17 => 1,  92 => 27,  86 => 24,  79 => 18,  77 => 20,  57 => 13,  46 => 12,  37 => 4,  33 => 3,  29 => 5,  24 => 6,  19 => 2,  135 => 52,  129 => 50,  122 => 56,  116 => 39,  113 => 31,  108 => 36,  104 => 42,  102 => 41,  94 => 28,  89 => 30,  87 => 30,  84 => 36,  81 => 28,  73 => 20,  70 => 20,  67 => 22,  62 => 15,  59 => 14,  55 => 13,  51 => 14,  48 => 9,  41 => 10,  38 => 9,  35 => 6,  31 => 6,  28 => 2,);
    }
}

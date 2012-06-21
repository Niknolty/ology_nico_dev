<?php

/* OlogySocialBundle:FrontEnd:ologize_thanks.html.twig */
class __TwigTemplate_de8107961b13a675881c7796bf9839ac extends Twig_Template
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
<html  xmlns:fb=\"http://www.facebook.com/2008/fbml\">
    <head>
        <title>Thank you</title>
        <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
        <script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/ologize_it/ologize_it.js"), "html", null, true);
        echo "\"></script>
        <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/ologize_it/ologize_it.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
        <meta property=\"og:title\" content=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "htmlTitle"), "html", null, true);
        echo "\" />
        <meta property=\"og:description\" content=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "summary"), "html", null, true);
        echo "\" />
        <meta property=\"og:image\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))), "html", null, true);
        echo "\" />
    </head>
    <body>
       <div id=\"main\">
            <div class=\"text_part\">
                <div class=\"awesome\">Awesome!</div>
                <div class=\"text\">You just ologized to <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, "ology_link"), "html", null, true);
        echo "\" id=\"ology_link\" target=\"_blank\" >";
        echo twig_escape_filter($this->env, $this->getContext($context, "ology_name"), "html", null, true);
        echo "</a></div>
                <div class=\"see_post\"><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, "post_link"), "html", null, true);
        echo "\" id=\"post_link\" target=\"_blank\" >See Your Post</a></div>
            </div>
            <div class=\"share_buttons_part\">
                <div class=\"text\">Share your post:</div>
                <div class=\"twitter_share\">
                    <div class=\"twitter_share_button\"></div>
                </div>
                <div class=\"facebook_share\">
                    <div class=\"facebook_share_button\"></div>
                </div>
                <div class=\"original_buttons\">
                    <a class=\"twitter-share-button\" href=\"#\" onclick='javascript:window.open(\"https://twitter.com/share?url=";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "post_link"), "html", null, true);
        echo "&text=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
        echo "\",\"mywindow1\",\"menubar=1,resizable=1,width=450,height=350\"); return false;'>Tweet</a>
                    ";
        // line 33
        echo "                    <a name=\"fb_share\" type=\"icon_count\" share_url=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "post_link"), "html", null, true);
        echo "\"  class=\"facebook-share-button\" ></a>
                </div>
            </div>
       </div>

       <script type=\"text/javascript\" src=\"http://static.ak.fbcdn.net/connect.php/js/FB.Share\"></script>
       ";
        // line 42
        echo "    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:ologize_thanks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 115,  353 => 113,  326 => 102,  314 => 99,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 81,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 143,  291 => 140,  261 => 79,  252 => 117,  234 => 103,  223 => 99,  348 => 135,  340 => 133,  336 => 106,  332 => 131,  327 => 130,  324 => 101,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 87,  287 => 111,  279 => 84,  226 => 86,  149 => 41,  136 => 40,  100 => 27,  130 => 54,  251 => 82,  247 => 81,  238 => 90,  194 => 68,  191 => 67,  168 => 64,  294 => 114,  286 => 85,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 163,  186 => 66,  183 => 75,  181 => 64,  163 => 53,  140 => 45,  170 => 70,  112 => 48,  118 => 34,  106 => 29,  157 => 44,  232 => 88,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 60,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 111,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 100,  307 => 95,  299 => 102,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 61,  119 => 49,  110 => 36,  53 => 11,  66 => 34,  98 => 42,  166 => 45,  160 => 66,  154 => 43,  143 => 42,  138 => 39,  101 => 25,  36 => 9,  65 => 16,  18 => 1,  352 => 117,  347 => 160,  344 => 110,  282 => 99,  276 => 83,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 73,  241 => 91,  237 => 69,  233 => 76,  229 => 102,  225 => 100,  221 => 78,  217 => 92,  214 => 88,  203 => 71,  180 => 50,  175 => 8,  169 => 74,  167 => 61,  164 => 67,  155 => 49,  114 => 51,  83 => 22,  76 => 33,  72 => 19,  68 => 17,  64 => 18,  56 => 18,  21 => 3,  209 => 85,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 75,  165 => 63,  161 => 69,  152 => 42,  148 => 56,  145 => 39,  141 => 58,  134 => 62,  132 => 55,  127 => 34,  123 => 35,  109 => 37,  93 => 39,  90 => 24,  54 => 16,  133 => 31,  124 => 33,  111 => 45,  80 => 27,  60 => 15,  61 => 17,  52 => 14,  45 => 12,  34 => 5,  224 => 65,  215 => 90,  211 => 88,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 53,  185 => 76,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 50,  156 => 49,  153 => 48,  146 => 55,  142 => 42,  137 => 37,  126 => 52,  120 => 50,  117 => 48,  103 => 45,  74 => 39,  47 => 13,  32 => 8,  26 => 4,  97 => 40,  95 => 35,  88 => 22,  78 => 26,  71 => 18,  22 => 3,  25 => 7,  42 => 6,  40 => 10,  23 => 4,  17 => 1,  92 => 29,  86 => 42,  79 => 21,  29 => 8,  24 => 6,  19 => 2,  69 => 24,  63 => 17,  58 => 16,  49 => 13,  43 => 10,  37 => 10,  20 => 2,  139 => 41,  131 => 37,  128 => 36,  125 => 36,  121 => 29,  115 => 33,  107 => 31,  99 => 26,  96 => 25,  91 => 34,  82 => 23,  77 => 20,  75 => 27,  57 => 14,  50 => 17,  46 => 7,  44 => 12,  39 => 11,  33 => 9,  30 => 8,  27 => 6,  135 => 56,  129 => 35,  122 => 56,  116 => 30,  113 => 32,  108 => 36,  104 => 28,  102 => 27,  94 => 26,  89 => 30,  87 => 33,  84 => 25,  81 => 41,  73 => 20,  70 => 29,  67 => 22,  62 => 15,  59 => 14,  55 => 15,  51 => 11,  48 => 12,  41 => 11,  38 => 4,  35 => 3,  31 => 6,  28 => 3,);
    }
}

<?php

/* OlogySocialBundle:FrontEnd:edit_post.html.twig */
class __TwigTemplate_bff74c5457addc6bb87388d27ca60a22 extends Twig_Template
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
        if (array_key_exists("postForm", $context)) {
            // line 2
            echo "\t<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_edit_id", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
            echo "\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "postForm"));
            echo " id=\"form-post\">

\t\t";
            // line 4
            echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "postForm"));
            echo "
\t\t<div id=\"post-ology-title\">
\t\t\t";
            // line 6
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "title"));
            echo "
\t\t</div>

\t    <div id=\"post-ology-text\">";
            // line 9
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "textContent"));
            echo "</div>

\t    <div class=\"media-box-edit\">
\t\t    <div class=\"attach-media\">Attach Media:</div>
\t\t    <div class=\"add-image\"></div>
\t\t    <div class=\"add-video\"></div>
\t\t    <div class=\"add-audio\"></div>
\t    </div>

\t    <div id=\"image_field\">
\t        <span class=\"egypt-med\">Select Image</span> ";
            // line 19
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "imageFile"));
            echo "
\t        <div class=\"cancel-edit-x\">x</div>
\t    </div>

\t    <div id=\"video_field\">
\t        <span class=\"egypt-med\">Paste YouTube video link</span> ";
            // line 24
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "videoUrl"));
            echo "
\t        <div class=\"cancel-edit-x\">x</div>
\t    </div>

\t    <div id=\"audio_field\">
\t    \t<span class=\"egypt-med\">Select Audio file</span> ";
            // line 29
            echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "audioFile"));
            echo "
\t        <div class=\"cancel-edit-x\">x</div>
\t    </div>

\t    <div id=\"remove-post-icon\">x <br />
\t\t\t";
            // line 34
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 3)) {
                // line 35
                echo "\t\t\t\t";
                echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_medium_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
                echo "
\t\t\t";
            }
            // line 37
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 4)) {
                // line 38
                echo "\t\t\t\t<iframe width=\"560\" src=\"http://www.youtube.com/embed/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "videoUrl"), "html", null, true);
                echo "?wmode=transparent\" frameborder=\"0\" allowfullscreen></iframe>
\t\t\t";
            }
            // line 40
            echo "\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "id") == 5)) {
                // line 41
                echo "\t\t\t\t<audio controls=\"true\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_audio_path") . $this->getAttribute($this->getContext($context, "post"), "audioUrl"))), "html", null, true);
                echo "\" type=\"audio/mpeg\" style=\"width:100%;\">
\t\t\t  \t\tYour browser does not support the audio element.
\t\t\t\t</audio>
\t\t\t";
            }
            // line 45
            echo "\t\t</div>

\t\t";
            // line 47
            echo $this->env->getExtension('form')->renderRest($this->getContext($context, "postForm"));
            echo "
\t\t<div id=\"ptype\">";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "postTypeId"), "html", null, true);
            echo "</div>

\t    <div class=\"cancel-edit\">Cancel</div> <input type=\"submit\" value=\"Update\" class=\"post-button\" />
\t    
\t</form>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:edit_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 137,  319 => 122,  311 => 117,  303 => 115,  278 => 105,  262 => 101,  198 => 71,  334 => 119,  321 => 114,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 160,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 107,  291 => 104,  261 => 98,  252 => 117,  234 => 103,  223 => 87,  348 => 120,  340 => 129,  336 => 128,  332 => 127,  327 => 126,  324 => 125,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 108,  287 => 102,  279 => 84,  226 => 88,  149 => 41,  136 => 40,  125 => 36,  115 => 38,  100 => 27,  130 => 44,  251 => 94,  247 => 95,  238 => 89,  194 => 69,  191 => 68,  168 => 64,  128 => 36,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 67,  183 => 75,  181 => 65,  163 => 56,  140 => 63,  170 => 70,  121 => 29,  112 => 48,  118 => 34,  106 => 40,  157 => 44,  232 => 88,  228 => 86,  220 => 86,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 60,  105 => 34,  85 => 32,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 132,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 116,  299 => 113,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 103,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 49,  119 => 49,  110 => 36,  53 => 11,  91 => 35,  66 => 34,  98 => 37,  96 => 30,  166 => 60,  160 => 66,  154 => 50,  143 => 42,  138 => 46,  101 => 25,  58 => 17,  36 => 6,  65 => 22,  18 => 1,  352 => 136,  347 => 160,  344 => 110,  282 => 106,  276 => 83,  274 => 104,  257 => 100,  253 => 98,  249 => 96,  245 => 93,  241 => 92,  237 => 91,  233 => 90,  229 => 89,  225 => 100,  221 => 84,  217 => 85,  214 => 84,  203 => 71,  180 => 50,  175 => 8,  169 => 59,  167 => 61,  164 => 67,  155 => 49,  139 => 41,  114 => 51,  83 => 37,  76 => 33,  72 => 19,  68 => 20,  64 => 21,  56 => 18,  21 => 3,  209 => 79,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 57,  161 => 59,  152 => 42,  148 => 67,  145 => 66,  141 => 58,  134 => 45,  132 => 55,  127 => 34,  123 => 49,  109 => 40,  93 => 29,  90 => 24,  54 => 15,  133 => 31,  124 => 33,  111 => 48,  107 => 47,  80 => 27,  63 => 19,  60 => 18,  69 => 22,  61 => 17,  52 => 15,  50 => 14,  45 => 12,  43 => 10,  34 => 3,  224 => 65,  215 => 90,  211 => 80,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 68,  188 => 53,  185 => 67,  179 => 65,  177 => 64,  171 => 60,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 48,  142 => 47,  137 => 37,  131 => 37,  126 => 43,  120 => 46,  117 => 46,  103 => 45,  99 => 26,  74 => 39,  47 => 13,  32 => 6,  39 => 5,  26 => 4,  97 => 40,  95 => 41,  88 => 35,  82 => 32,  78 => 26,  75 => 34,  71 => 18,  22 => 3,  44 => 7,  30 => 8,  20 => 2,  25 => 7,  49 => 13,  42 => 6,  40 => 11,  23 => 4,  27 => 4,  17 => 1,  92 => 40,  86 => 38,  79 => 31,  77 => 35,  57 => 15,  46 => 11,  37 => 4,  33 => 5,  29 => 8,  24 => 3,  19 => 2,  135 => 50,  129 => 35,  122 => 42,  116 => 30,  113 => 32,  108 => 36,  104 => 35,  102 => 34,  94 => 26,  89 => 30,  87 => 33,  84 => 33,  81 => 41,  73 => 20,  70 => 23,  67 => 29,  62 => 19,  59 => 24,  55 => 14,  51 => 19,  48 => 9,  41 => 11,  38 => 9,  35 => 9,  31 => 8,  28 => 2,);
    }
}

<?php

/* OlogySocialBundle:FrontEnd:post_form_content.html.twig */
class __TwigTemplate_5d5a4e979d09faca2a8c7fc3384aea82 extends Twig_Template
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
        echo "                ";
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "postForm"));
        echo "
\t<div id=\"post-ology-title\">
\t\t";
        // line 3
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "title"));
        echo "
\t</div>

    <div id=\"post-ology-text\">";
        // line 6
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "textContent"));
        echo "</div>

    <div class=\"media-box\">
\t    <div class=\"attach-media\">Attach Media:</div>
\t    <div class=\"add-image\"></div>
\t    <div class=\"add-video\"></div>
\t    <div class=\"add-audio\"></div>
    </div>

    <div id=\"image_field\">
        <div class=\"cancel-x\">x</div>
        <div id=\"img-web\">
            <span class=\"egypt-med\">Paste image URL</span>
            <div id=\"web-link\">
                <input style=\"width: 80%; border: 1px solid #CCC;\" id=\"input-img-grabber\" type=\"text\"/>
                ";
        // line 21
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "imageUrl"));
        echo "
            </div>
            <div id=\"grabbed-image\"></div>
        </div>
        <div id=\"img-or\" style=\"display: none;\">
            -or-
        </div>
        <div id=\"img-upload\">
            <span class=\"egypt-med\">Select Image</span> ";
        // line 29
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "imageFile"));
        echo "
        </div>
    </div>

    <div id=\"video_field\">
        <span class=\"egypt-med\">Paste YouTube video link</span> ";
        // line 34
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "videoUrl"));
        echo "
        <div class=\"cancel-x\">x</div>
    </div>

    <div id=\"audio_field\">
    \t<span class=\"egypt-med\">Select Audio file</span> ";
        // line 39
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "audioFile"));
        echo "
        <div class=\"cancel-x\">x</div>
    </div>

    ";
        // line 43
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "postForm"));
        echo "

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:post_form_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 39,  66 => 34,  58 => 29,  47 => 21,  23 => 3,  29 => 6,  26 => 3,  24 => 2,  17 => 1,  396 => 154,  392 => 153,  388 => 152,  384 => 151,  361 => 131,  355 => 127,  352 => 126,  345 => 121,  336 => 118,  330 => 117,  325 => 114,  319 => 112,  313 => 110,  311 => 109,  305 => 108,  302 => 107,  298 => 106,  295 => 105,  291 => 103,  282 => 100,  276 => 99,  269 => 95,  263 => 94,  260 => 93,  256 => 92,  253 => 91,  250 => 90,  244 => 87,  240 => 85,  238 => 84,  235 => 83,  233 => 82,  228 => 79,  222 => 76,  217 => 74,  213 => 72,  209 => 70,  207 => 69,  203 => 67,  200 => 66,  198 => 65,  190 => 59,  183 => 55,  180 => 54,  166 => 53,  163 => 52,  160 => 51,  157 => 50,  154 => 49,  151 => 48,  134 => 47,  126 => 41,  118 => 38,  115 => 37,  113 => 36,  108 => 33,  104 => 31,  101 => 30,  96 => 26,  94 => 25,  90 => 23,  84 => 21,  81 => 43,  78 => 19,  72 => 17,  70 => 16,  65 => 14,  61 => 13,  54 => 12,  52 => 11,  48 => 9,  44 => 7,  42 => 6,  39 => 5,  37 => 4,  34 => 3,  28 => 2,);
    }
}

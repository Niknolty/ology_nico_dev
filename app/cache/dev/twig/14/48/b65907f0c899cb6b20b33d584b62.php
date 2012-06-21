<?php

/* OlogySocialBundle:Post:create_post.html.twig */
class __TwigTemplate_1448b65907f0c899cb6b20b33d584b62 extends Twig_Template
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
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_store_id"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "postForm"));
        echo " id=\"form-post\">
\t<div id=\"post-ology-title\">
\t\t";
        // line 3
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "title"));
        echo "
\t</div>
    <div id=\"post-ology-text\">";
        // line 5
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "textContent"));
        echo "</div>

    <div class=\"media-box\">
            ";
        // line 8
        $this->env->loadTemplate("OlogySocialBundle:Tips:attach_media_tip.html.twig")->display($context);
        // line 9
        echo "\t    <div class=\"attach-media\">Attach Media:</div>
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
        // line 44
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "postForm"));
        echo "

    <div class=\"cancel\">Cancel</div>
    ";
        // line 47
        if ($this->getContext($context, "loggedIn")) {
            // line 48
            echo "       <input type=\"submit\" value=\"Post (Ologize)\" class=\"post-button\" />          
    ";
        } else {
            // line 50
            echo "       <input type=\"button\" value=\"Post (Ologize)\" class=\"post-button\" id=\"post-button-prompt\"/>
      ";
            // line 51
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display(array_merge($context, array("prompt_action" => "2")));
            // line 52
            echo "    ";
        }
        // line 53
        echo "</form>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:create_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 51,  95 => 48,  93 => 47,  87 => 44,  79 => 39,  63 => 29,  30 => 5,  19 => 2,  71 => 34,  67 => 15,  60 => 13,  54 => 12,  45 => 9,  25 => 3,  22 => 3,  20 => 2,  153 => 48,  151 => 47,  143 => 42,  138 => 39,  131 => 37,  128 => 36,  123 => 35,  118 => 34,  113 => 32,  107 => 53,  100 => 27,  83 => 22,  73 => 20,  70 => 19,  61 => 17,  55 => 15,  49 => 13,  44 => 12,  39 => 11,  36 => 8,  33 => 6,  27 => 6,  21 => 3,  17 => 1,  348 => 135,  344 => 134,  340 => 133,  336 => 132,  332 => 131,  327 => 130,  324 => 129,  318 => 125,  315 => 124,  309 => 121,  304 => 119,  300 => 117,  296 => 115,  294 => 114,  290 => 112,  287 => 111,  281 => 107,  279 => 106,  275 => 104,  272 => 103,  270 => 102,  259 => 94,  255 => 92,  241 => 91,  238 => 90,  235 => 89,  232 => 88,  229 => 87,  226 => 86,  209 => 85,  206 => 84,  202 => 82,  197 => 79,  192 => 76,  190 => 75,  187 => 74,  185 => 73,  178 => 69,  169 => 62,  167 => 61,  164 => 60,  162 => 59,  158 => 50,  156 => 49,  149 => 44,  145 => 43,  142 => 42,  139 => 41,  136 => 40,  130 => 38,  127 => 37,  125 => 36,  120 => 33,  117 => 32,  115 => 33,  111 => 30,  106 => 29,  104 => 52,  99 => 50,  96 => 26,  94 => 26,  90 => 24,  86 => 23,  81 => 21,  75 => 20,  69 => 17,  64 => 14,  58 => 16,  56 => 12,  52 => 21,  48 => 10,  46 => 7,  43 => 6,  41 => 7,  38 => 9,  35 => 3,  28 => 2,);
    }
}

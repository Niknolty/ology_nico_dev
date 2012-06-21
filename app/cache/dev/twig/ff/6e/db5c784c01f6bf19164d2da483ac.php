<?php

/* OlogySocialBundle:FrontEnd:ologize_create_post.html.twig */
class __TwigTemplate_ff6edb5c784c01f6bf19164d2da483ac extends Twig_Template
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
        <title>Ologize</title>
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
        echo "\" type=\"text/css\"/>
    </head>
    <body>
      
        <div id=\"main\">
        <div id=\"image_preview\">
            <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, "src"), "html", null, true);
        echo "\" style=\"\"/><br/>
        </div>
        <div id=\"form_block\">
            <form action=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_store_ologize_post"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "postForm"));
        echo " id=\"form-post\" >

                <div id=\"post-ology-title\">";
        // line 20
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "title"));
        echo "</div>
                <div id=\"post-ology-text\">";
        // line 21
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "postForm"), "textContent"));
        echo "</div>
                <div id=\"post-ology-select\">";
        // line 22
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "postForm"), "firstOlogy"));
        echo "</div>
        
                ";
        // line 24
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "postForm"));
        echo "

                <input type=\"submit\" value=\"Ologize it\" class=\"post-button\" />                
            </form>
        </div>
        </div>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:ologize_create_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  294 => 107,  286 => 103,  283 => 102,  280 => 101,  277 => 100,  268 => 94,  263 => 92,  255 => 90,  243 => 86,  208 => 73,  202 => 71,  199 => 70,  186 => 66,  183 => 65,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  112 => 26,  118 => 36,  106 => 34,  157 => 41,  232 => 67,  228 => 66,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 99,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 84,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 70,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 44,  53 => 13,  66 => 19,  98 => 29,  166 => 54,  160 => 47,  154 => 36,  143 => 54,  138 => 38,  101 => 33,  36 => 4,  65 => 24,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 84,  241 => 85,  237 => 77,  233 => 76,  229 => 81,  225 => 80,  221 => 78,  217 => 77,  214 => 76,  203 => 72,  180 => 22,  175 => 8,  169 => 56,  167 => 159,  164 => 158,  155 => 49,  114 => 27,  83 => 24,  76 => 19,  72 => 21,  68 => 19,  64 => 18,  56 => 21,  21 => 3,  209 => 74,  205 => 72,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 40,  152 => 58,  148 => 43,  145 => 56,  141 => 41,  134 => 39,  132 => 43,  127 => 42,  123 => 44,  109 => 37,  93 => 31,  90 => 26,  54 => 12,  133 => 31,  124 => 41,  111 => 31,  80 => 27,  60 => 22,  61 => 23,  52 => 20,  45 => 18,  34 => 6,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 71,  195 => 68,  193 => 67,  190 => 60,  188 => 77,  185 => 46,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 60,  153 => 58,  146 => 55,  142 => 39,  137 => 44,  126 => 43,  120 => 35,  117 => 28,  103 => 33,  74 => 20,  47 => 13,  32 => 4,  26 => 8,  97 => 21,  95 => 37,  88 => 24,  78 => 21,  71 => 17,  22 => 4,  25 => 4,  42 => 14,  40 => 7,  23 => 3,  17 => 1,  92 => 27,  86 => 24,  79 => 18,  29 => 3,  24 => 6,  19 => 2,  69 => 18,  63 => 17,  58 => 10,  49 => 10,  43 => 12,  37 => 14,  20 => 2,  139 => 32,  131 => 40,  128 => 43,  125 => 42,  121 => 29,  115 => 39,  107 => 27,  99 => 32,  96 => 29,  91 => 20,  82 => 23,  77 => 27,  75 => 17,  57 => 13,  50 => 16,  46 => 10,  44 => 9,  39 => 15,  33 => 3,  30 => 9,  27 => 2,  135 => 52,  129 => 50,  122 => 40,  116 => 39,  113 => 31,  108 => 24,  104 => 42,  102 => 41,  94 => 28,  89 => 30,  87 => 25,  84 => 32,  81 => 28,  73 => 20,  70 => 20,  67 => 18,  62 => 15,  59 => 16,  55 => 22,  51 => 14,  48 => 20,  41 => 8,  38 => 7,  35 => 7,  31 => 9,  28 => 5,);
    }
}

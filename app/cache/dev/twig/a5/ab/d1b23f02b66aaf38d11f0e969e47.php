<?php

/* OlogySocialBundle:FrontEnd:invite.html.twig */
class __TwigTemplate_a5abd1b23f02b66aaf38d11f0e969e47 extends Twig_Template
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
    <h2>Invite Friends</h2>
    ";
        // line 14
        if (array_key_exists("ok", $context)) {
            // line 15
            echo "        <div class=\"sent-invite\">
            Your friends have been invited. Invite some more...
        </div>
    ";
        }
        // line 19
        echo "    <h3>Facebook</h3>
    <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_invite_fb"), "html", null, true);
        echo "\">Invite your Facebook friends</a>.<br/><br/>
    <h3>Gmail</h3>
    <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_invite_gmail"), "html", null, true);
        echo "\">Pick from your Gmail contacts</a>.<br/><br/>
    <h3>Or, enter email addresses here:</h3>
    
    <div id=\"invite-form\">
    <form action=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_invite_send"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "inviteForm"));
        echo ">
            ";
        // line 27
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "email1"));
        echo "
            ";
        // line 28
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "email2"));
        echo "
            ";
        // line 29
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "email3"));
        echo "
            ";
        // line 30
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "email4"));
        echo "
            ";
        // line 31
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "email5"));
        echo "
            ";
        // line 32
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "email6"));
        echo "
            <br />
            <h3>Invite to:</h3>
            ";
        // line 36
        echo "                ";
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "ologyId"));
        echo "
           ";
        // line 38
        echo "            <br/>
            
            <h3>Include a personal message:</h3>
            ";
        // line 41
        echo $this->env->getExtension('form')->renderRow($this->getAttribute($this->getContext($context, "inviteForm"), "msg"));
        echo "
            <br />
            <div id=\"invite-button\" >
                <input type=\"submit\" value=\"send\" class=\"invite-button\" />
            </div>
    </form>
    </div>
</div>
  
</div>
";
    }

    // line 53
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 54
        echo "<script type=\"text/javascript\">
    \$('#inviteForm_ologyId').prepend(
        \$('<option></option>').val(-1).html('Entire site')
    );
    \$(\"#inviteForm_ologyId\").val(-1);
</script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:invite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 31,  130 => 32,  251 => 82,  247 => 81,  238 => 79,  194 => 68,  191 => 67,  168 => 64,  294 => 107,  286 => 103,  283 => 102,  280 => 101,  277 => 100,  268 => 94,  263 => 92,  255 => 83,  243 => 80,  208 => 73,  202 => 71,  199 => 163,  186 => 66,  183 => 65,  181 => 64,  163 => 53,  140 => 45,  170 => 44,  112 => 26,  118 => 41,  106 => 27,  157 => 41,  232 => 67,  228 => 6,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 48,  147 => 46,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  330 => 111,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  275 => 99,  272 => 93,  270 => 92,  265 => 91,  259 => 89,  256 => 88,  250 => 86,  248 => 85,  235 => 78,  227 => 79,  218 => 76,  212 => 75,  206 => 73,  197 => 69,  187 => 68,  184 => 67,  182 => 66,  174 => 63,  150 => 57,  119 => 47,  110 => 36,  53 => 11,  66 => 20,  98 => 29,  166 => 54,  160 => 47,  154 => 36,  143 => 54,  138 => 54,  101 => 25,  36 => 4,  65 => 24,  18 => 1,  352 => 117,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 84,  241 => 85,  237 => 77,  233 => 76,  229 => 81,  225 => 5,  221 => 78,  217 => 72,  214 => 76,  203 => 71,  180 => 22,  175 => 8,  169 => 56,  167 => 159,  164 => 158,  155 => 49,  114 => 51,  83 => 24,  76 => 19,  72 => 19,  68 => 19,  64 => 15,  56 => 14,  21 => 3,  209 => 74,  205 => 72,  196 => 79,  192 => 69,  189 => 77,  178 => 71,  176 => 48,  165 => 63,  161 => 61,  152 => 58,  148 => 56,  145 => 56,  141 => 36,  134 => 62,  132 => 43,  127 => 42,  123 => 44,  109 => 37,  93 => 39,  90 => 31,  54 => 12,  133 => 31,  124 => 44,  111 => 31,  80 => 27,  60 => 15,  61 => 21,  52 => 13,  45 => 11,  34 => 3,  224 => 65,  215 => 90,  211 => 88,  204 => 84,  200 => 70,  195 => 68,  193 => 67,  190 => 60,  188 => 66,  185 => 65,  179 => 65,  177 => 64,  171 => 62,  162 => 63,  158 => 69,  156 => 58,  153 => 58,  146 => 55,  142 => 39,  137 => 44,  126 => 57,  120 => 41,  117 => 28,  103 => 26,  74 => 20,  47 => 10,  32 => 6,  26 => 4,  97 => 40,  95 => 33,  88 => 28,  78 => 26,  71 => 22,  22 => 3,  25 => 4,  42 => 6,  40 => 7,  23 => 5,  17 => 1,  92 => 29,  86 => 24,  79 => 18,  29 => 5,  24 => 6,  19 => 2,  69 => 18,  63 => 19,  58 => 10,  49 => 12,  43 => 12,  37 => 4,  20 => 2,  139 => 32,  131 => 40,  128 => 45,  125 => 42,  121 => 29,  115 => 38,  107 => 27,  99 => 34,  96 => 30,  91 => 20,  82 => 23,  77 => 20,  75 => 25,  57 => 15,  50 => 13,  46 => 12,  44 => 7,  39 => 5,  33 => 3,  30 => 9,  27 => 2,  135 => 53,  129 => 50,  122 => 56,  116 => 39,  113 => 31,  108 => 36,  104 => 32,  102 => 41,  94 => 28,  89 => 30,  87 => 30,  84 => 27,  81 => 28,  73 => 20,  70 => 20,  67 => 22,  62 => 15,  59 => 14,  55 => 14,  51 => 14,  48 => 9,  41 => 10,  38 => 9,  35 => 6,  31 => 6,  28 => 2,);
    }
}

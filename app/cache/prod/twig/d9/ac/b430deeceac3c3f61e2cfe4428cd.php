<?php

/* OlogySocialBundle:Email:invite_ology_anon.html.twig */
class __TwigTemplate_d9acb430deeceac3c3f61e2cfe4428cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:Email:template.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OlogySocialBundle:Email:template.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<p><a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "inviterId"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "inviterName"), "html", null, true);
        echo "</a> has invited you to become a part of <a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology_invite", array("id" => $this->getContext($context, "ologyId"), "inviteId" => $this->getContext($context, "inviteId"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "ologyName"), "html", null, true);
        echo "</a> on Ology!</p>
";
        // line 4
        if (array_key_exists("msg", $context)) {
            // line 5
            echo "<p>";
            echo twig_escape_filter($this->env, $this->getContext($context, "heshe"), "html", null, true);
            echo " left you this message: \"<b>";
            echo twig_escape_filter($this->env, $this->getContext($context, "msg"), "html", null, true);
            echo "</b>\"</p>
";
        }
        // line 7
        echo "<p><a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology_invite", array("inviteId" => $this->getContext($context, "inviteId"), "id" => $this->getContext($context, "ologyId"))), "html", null, true);
        echo "\">Click here to check out the group and join your friend</a>.</p>

<p>Post, share, and discover in a single place. Your favorite TV show, an obscure indie band, or a local project you're a part of. [Ology] is all about you. Here you can express the things that have always interested you and always will.  It's not about where you've been or what you've done, it's about what you love.</p>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Email:invite_ology_anon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  56 => 18,  21 => 3,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 65,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 39,  107 => 36,  80 => 27,  63 => 18,  60 => 19,  69 => 20,  61 => 15,  52 => 7,  50 => 13,  45 => 12,  43 => 11,  34 => 10,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 49,  120 => 45,  117 => 41,  103 => 36,  99 => 34,  74 => 23,  47 => 19,  32 => 8,  39 => 12,  26 => 2,  97 => 34,  95 => 21,  88 => 29,  82 => 27,  78 => 25,  75 => 24,  71 => 14,  22 => 3,  44 => 5,  30 => 4,  20 => 2,  25 => 4,  49 => 11,  42 => 4,  40 => 8,  23 => 4,  27 => 2,  17 => 1,  92 => 23,  86 => 25,  79 => 19,  77 => 25,  57 => 15,  46 => 10,  37 => 7,  33 => 4,  29 => 3,  24 => 6,  19 => 2,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 26,  87 => 28,  84 => 28,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 23,  55 => 13,  51 => 13,  48 => 10,  41 => 9,  38 => 11,  35 => 7,  31 => 5,  28 => 3,);
    }
}

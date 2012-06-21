<?php

/* OlogySocialBundle:Email:Welcome.html.twig */
class __TwigTemplate_ec00915baeedf2f494bf55c7da0adf9f extends Twig_Template
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
        echo "You're in!  Congrats on being awesome!<br/><br/>

So now what?<br/><br/>

1. Follow and create ologies. An \"ology\" is anything you're interested in. A sports team, a new band, a bad reality TV show.....actually, anything at all.  Check out the <a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
        echo "\">the explore page</a> to find the communities for your interests.<br/>
2. Post something. Make your voice heard! It's easy.<br/>
3. <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_invite"), "html", null, true);
        echo "\">Invite your friends</a> to join as well!<br/><br/>

Remember, if you don't see an ology for the things you're passionate about, you can <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_create_ology"), "html", null, true);
        echo "\">create your own</a>. It'll be yours, you'll love it, and other people will too.<br/><br/>
If you lost your password please click here: <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_reset"), "html", null, true);
        echo "\">Reset Password</a>.<br/><br/>

Still have a few questions (on how to use Ology)? No worries, check out these <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_faq"), "html", null, true);
        echo "\">FAQs</a>.

Welcome to Ology. What are you waiting for?<br/><br/>

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Email:Welcome.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  114 => 40,  83 => 20,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  56 => 18,  21 => 3,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 65,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 39,  80 => 27,  60 => 19,  61 => 15,  52 => 12,  45 => 12,  34 => 10,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 55,  142 => 54,  137 => 51,  126 => 49,  120 => 45,  117 => 41,  103 => 36,  74 => 23,  47 => 11,  32 => 8,  26 => 2,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  71 => 14,  22 => 3,  25 => 4,  42 => 4,  40 => 8,  23 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 19,  29 => 3,  24 => 6,  19 => 2,  69 => 20,  63 => 18,  58 => 14,  49 => 11,  43 => 11,  37 => 7,  20 => 2,  139 => 59,  131 => 48,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 27,  77 => 25,  75 => 24,  57 => 15,  50 => 13,  46 => 10,  44 => 5,  39 => 12,  33 => 4,  30 => 4,  27 => 5,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 26,  87 => 32,  84 => 28,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 23,  55 => 8,  51 => 13,  48 => 10,  41 => 9,  38 => 4,  35 => 7,  31 => 5,  28 => 3,);
    }
}

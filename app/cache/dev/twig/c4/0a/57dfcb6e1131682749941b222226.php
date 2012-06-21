<?php

/* OlogySocialBundle:Email:NewCommentOnPostForAuthor.html.twig */
class __TwigTemplate_c40a57dfcb6e1131682749941b222226 extends Twig_Template
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
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "commenterId"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "commenterName"), "html", null, true);
        echo "</a> has commented on your post \"<a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getContext($context, "postId"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "postName"), "html", null, true);
        echo "</a>\" in <a href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getContext($context, "ologyId"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "ologyName"), "html", null, true);
        echo "</a>.<br/>
<a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, "websiteUrl"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getContext($context, "postId"))), "html", null, true);
        echo "\">Curious about what ";
        echo twig_escape_filter($this->env, $this->getContext($context, "heshe"), "html", null, true);
        echo " had to say?</a>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Email:NewCommentOnPostForAuthor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 4,  29 => 3,  26 => 2,);
    }
}

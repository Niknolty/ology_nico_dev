<?php

/* OlogySocialBundle:Email:template.html.twig */
class __TwigTemplate_8dcdbef1a514c381510f23cfe0ce231f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/emailheader.jpg"), "html", null, true);
        echo "\" />

<p>
";
        // line 4
        $this->displayBlock('body', $context, $blocks);
        // line 5
        echo "</p>

Follow what you love,<br/>
The Ology Team.<br/><br/>

<p>Want to stop receiving these notifications? <a href='{unsubscribe}'>Click here to unsubscribe</a></p>

";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Email:template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 4,  27 => 5,  25 => 4,  18 => 1,  47 => 4,  29 => 3,  26 => 2,);
    }
}

<?php

/* OlogySocialBundle:Tips:read_more_tip.html.twig */
class __TwigTemplate_bffcfb96e6a72d8e31ad5f1cb8c31633 extends Twig_Template
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
        if (((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user"))) && (!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "tipsList"))))) {
            // line 2
            echo "
<div id=\"tip14\" class=\"tips top\">
    When you see \"...\" at the end of a post, click it to read more!
    <span class=\"tip-close\">X</span>
    <a id=\"next-tip-button\" class=\"next-tip\">Next >></a>
</div>
            
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Tips:read_more_tip.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 2,  17 => 1,);
    }
}

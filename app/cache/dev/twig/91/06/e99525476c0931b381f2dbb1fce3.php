<?php

/* OlogySocialBundle:Editorial:image_iframe.html.twig */
class __TwigTemplate_9106e99525476c0931b381f2dbb1fce3 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_pic_store"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "picForm"));
        echo " id=\"form-pic\">
    ";
        // line 2
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "picForm"), "picture"));
        echo "
    <br /><input type=\"submit\" value=\"Upload\" />
</form>

<style type=\"text/css\">
\t#pictureForm_picture{
\t\tfont-size:0.75em
\t}
</style>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Editorial:image_iframe.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 2,  17 => 1,);
    }
}

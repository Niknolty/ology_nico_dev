<?php

/* TwigBundle:Exception:exception.rdf.twig */
class __TwigTemplate_f35872933b8d2f7162197496c78863fe extends Twig_Template
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
        $this->env->loadTemplate("TwigBundle:Exception:exception.xml.twig")->display(array_merge($context, array("exception" => $this->getContext($context, "exception"))));
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.rdf.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 8,  30 => 4,  20 => 2,  25 => 4,  49 => 9,  42 => 7,  40 => 6,  23 => 3,  27 => 3,  17 => 1,  92 => 39,  86 => 6,  79 => 40,  77 => 39,  57 => 22,  46 => 14,  37 => 8,  33 => 5,  29 => 4,  24 => 4,  19 => 2,  135 => 54,  129 => 50,  122 => 46,  116 => 42,  113 => 41,  108 => 40,  104 => 38,  102 => 37,  94 => 32,  89 => 29,  87 => 28,  84 => 27,  81 => 26,  73 => 21,  70 => 20,  67 => 19,  62 => 16,  59 => 15,  55 => 13,  51 => 11,  48 => 10,  41 => 7,  38 => 8,  35 => 7,  31 => 6,  28 => 3,);
    }
}

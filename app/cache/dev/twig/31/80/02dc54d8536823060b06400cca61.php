<?php

/* OlogySocialBundle:Form:formOlogyTheme.html.twig */
class __TwigTemplate_318002dc54d8536823060b06400cca61 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'field_widget' => array($this, 'block_field_widget'),
            'field_row' => array($this, 'block_field_row'),
            'form_row' => array($this, 'block_form_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 13
        echo "
";
        // line 14
        $this->displayBlock('field_widget', $context, $blocks);
        // line 20
        echo "    
    ";
        // line 22
        echo "
";
        // line 23
        $this->displayBlock('field_row', $context, $blocks);
        // line 32
        echo "
";
        // line 33
        $this->displayBlock('form_row', $context, $blocks);
    }

    // line 14
    public function block_field_widget($context, array $blocks = array())
    {
        // line 15
        ob_start();
        // line 16
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter($this->getContext($context, "type"), "text")) : ("text"));
        // line 17
        echo "    <input type=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "type"), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ((!twig_test_empty($this->getContext($context, "value")))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
            echo "\" ";
        }
        echo " placeholder=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "label"), "html", null, true);
        echo "\"/>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 23
    public function block_field_row($context, array $blocks = array())
    {
        // line 24
        ob_start();
        // line 25
        echo "    <div class=\"input-ology\">
     ";
        // line 27
        echo "        ";
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
        ";
        // line 28
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"), array("label" => ((array_key_exists("label", $context)) ? (_twig_default_filter($this->getContext($context, "label"), "")) : (""))));
        echo "
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 33
    public function block_form_row($context, array $blocks = array())
    {
        // line 34
        ob_start();
        // line 35
        echo "    <div>
        ";
        // line 36
        echo $this->env->getExtension('form')->renderLabel($this->getContext($context, "form"), ((array_key_exists("label", $context)) ? (_twig_default_filter($this->getContext($context, "label"), null)) : (null)));
        echo "
        ";
        // line 37
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Form:formOlogyTheme.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  99 => 37,  95 => 36,  92 => 35,  90 => 34,  87 => 33,  79 => 28,  74 => 27,  71 => 25,  69 => 24,  66 => 23,  48 => 17,  45 => 16,  43 => 15,  40 => 14,  36 => 33,  33 => 32,  31 => 23,  28 => 22,  25 => 20,  23 => 14,  20 => 13,);
    }
}

<?php

/* OlogySocialBundle:Post:list_channel.html.twig */
class __TwigTemplate_3670308dd0a9b82777f20adb99ba6cd7 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "posts"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 2
            echo "    ";
            if ($this->getAttribute($this->getContext($context, "post"), "isProfessional")) {
                // line 3
                echo "        ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
                // line 4
                echo "    ";
            } else {
                // line 5
                echo "        ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
                // line 6
                echo "    ";
            }
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 8
        echo "
";
        // line 9
        if (array_key_exists("scroll", $context)) {
            // line 10
            echo "<div>
    <a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel_pag", array("stub" => $this->getContext($context, "stub"), "offset" => $this->getContext($context, "nextPage"), "n" => $this->getContext($context, "n"))), "html", null, true);
            echo "\" class=\"navigation\">NEXT</a>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:list_channel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 11,  66 => 10,  64 => 9,  61 => 8,  46 => 6,  43 => 5,  40 => 4,  37 => 3,  34 => 2,  17 => 1,);
    }
}

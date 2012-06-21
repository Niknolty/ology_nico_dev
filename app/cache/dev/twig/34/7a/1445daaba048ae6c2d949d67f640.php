<?php

/* OlogySocialBundle:FrontEnd:reologize-popup.html.twig */
class __TwigTemplate_347a1445daaba048ae6c2d949d67f640 extends Twig_Template
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
        echo "<div class=\"reologize-popup\" title=\"<img id='reologize-icon' src='";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/reologize_icon_gray.jpg"), "html", null, true);
        echo "'/><div id='reologize-title'>ReOlogize It:</div>\">
    <div id=\"reologize-form\">
        <h2>Ologies</h2>
        <div class=\"reologize-ologies\">
            ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "ologies"));
        foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
            // line 6
            echo "                <div ology-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "id"), "html", null, true);
            echo "\" ologyOrStash=\"ology\" class=\"not-selected\">
                    ";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 10
        echo "        </div>
        <h2>Stashes</h2>
        <div class=\"reologize-stashes\">
            ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "stashes"));
        foreach ($context['_seq'] as $context["_key"] => $context["stash"]) {
            // line 14
            echo "                <div stash-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stash"), "id"), "html", null, true);
            echo "\" ologyOrStash=\"stash\" class=\"not-selected\">
                    ";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stash"), "name"), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stash'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 18
        echo "        </div>
        <input type=\"hidden\" id=\"post-id\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, "postId"), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" id=\"hidden-ology\" name=\"hidden-ologies\" value=\"0\"/>
        <input type=\"hidden\" id=\"hidden-stash\" name=\"hidden-stashes\" value=\"0\"/>
        <input type=\"submit\" id=\"reologize-submit\" value=\"ReOlogize\"/>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:reologize-popup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 19,  66 => 18,  57 => 15,  52 => 14,  48 => 13,  43 => 10,  34 => 7,  29 => 6,  25 => 5,  17 => 1,);
    }
}

<?php

/* OlogySocialBundle:FrontEnd:post_comments.html.twig */
class __TwigTemplate_707e0d79ca95c7148fd28d1f6b2239ea extends Twig_Template
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
        echo "<div id=\"comments\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 3
            echo "    <div class=\"comment\"> <a name=\"comments\"></a>
    ";
            // line 4
            if ($this->getContext($context, "loggedIn")) {
                // line 5
                echo "        ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id") == $this->getAttribute($this->getContext($context, "user"), "id"))) {
                    // line 6
                    echo "        <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_comment_delete", array("id" => $this->getAttribute($this->getContext($context, "comment"), "id"))), "html", null, true);
                    echo "\" class=\"delete-item\">x</a>
        ";
                }
                // line 8
                echo "    ";
            }
            // line 9
            echo "        <div class=\"user-img\">
            <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
            echo "\"></a>
        </div>
        <p style=\"padding-left:50px\"><a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
            echo "</a> - ";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
            echo "
            <span class=\"small\">
                <br /> Commented <abbr class=\"timeago\" title=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "creationDate"), "c"), "html", null, true);
            echo "\"></abbr>
            </span>
        </p>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 19
        echo "
";
        // line 27
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:post_comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 27,  71 => 19,  60 => 14,  51 => 12,  44 => 10,  41 => 9,  38 => 8,  32 => 6,  29 => 5,  27 => 4,  24 => 3,  20 => 2,  17 => 1,);
    }
}

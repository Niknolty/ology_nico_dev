<?php

/* OlogySocialBundle:FrontEnd:inline_comments.html.twig */
class __TwigTemplate_bffaea80d28e550122f57a38ddf784eb extends Twig_Template
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
        echo "<div class=\"inline-comments\">
";
        // line 2
        $context["nbComments"] = "0";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 4
            echo "   ";
            $context["nbComments"] = ($this->getContext($context, "nbComments") + 1);
            echo " 
    <div class=\"post-card-comment\"> <a name=\"comments\">
        <div class=\"user-img\">
            <a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">
                <img src=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
            echo "\">
            </a>
        </div>
        <p class=\"commentp\"><a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
            echo "</a> 
        ";
            // line 12
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content")) <= 140)) {
                // line 13
                echo "            ";
                echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
                echo "
        ";
            } else {
                // line 15
                echo "            ";
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), 140, false, "..."), "html", null, true);
                echo " 
        ";
            }
            // line 17
            echo "        </p>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "
";
        // line 21
        if (($this->getContext($context, "nbComments") > 2)) {
            // line 22
            echo "    <div class=\"hide-postcard-comments\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post_ajax_comments", array("postId" => $this->getContext($context, "postId"), "slug" => $this->getContext($context, "postSlug"))), "html", null, true);
            echo "\">
        hide comments
    </div>
";
        }
        // line 25
        echo "  
</div>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:inline_comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 25,  76 => 22,  74 => 21,  71 => 20,  63 => 17,  57 => 15,  51 => 13,  49 => 12,  43 => 11,  37 => 8,  33 => 7,  26 => 4,  22 => 3,  20 => 2,  17 => 1,);
    }
}

<?php

/* OlogySocialBundle:Editorial:post_list.html.twig */
class __TwigTemplate_3e837bf2345ab06e72fb02aae21f5342 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'page_header' => array($this, 'block_page_header'),
            'body' => array($this, 'block_body'),
            'pagescripts' => array($this, 'block_pagescripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OlogySocialBundle:FrontEnd:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "My Articles | Ology";
    }

    // line 3
    public function block_page_header($context, array $blocks = array())
    {
        // line 4
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/editors.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"container\">
    <h1>Drafts</h1>
    ";
        // line 10
        if ((twig_length_filter($this->env, $this->getContext($context, "drafts")) == 0)) {
            // line 11
            echo "    No draft. Get to work.
    ";
        } else {
            // line 13
            echo "    <table>
        <tr style=\"border-bottom: 1px dotted black\">
            <td style=\"text-align: center;\">Title</td>
            <td style=\"text-align: center;\">Last saved</td>
            <td>Kind</td></tr>
    ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "drafts"));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 19
                echo "            <tr style=\"border-bottom: 1px dotted black\">
                <td><a href=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_edit_form", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
                echo "\">";
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "htmlTitle")) > 0)) {
                    echo $this->getAttribute($this->getContext($context, "post"), "htmlTitle");
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
                }
                echo "</a></td>
                <td>";
                // line 21
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "lastSaved"), "F j, Y, g:i a"), "html", null, true);
                echo "</td>
                <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "name"), "html", null, true);
                echo "</td>
            </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 25
            echo "    ";
        }
        // line 26
        echo "    </table>

    <h1>Scheduled</h1>
    ";
        // line 29
        if ((twig_length_filter($this->env, $this->getContext($context, "scheduled")) == 0)) {
            // line 30
            echo "    No posts scheduled.
    ";
        } else {
            // line 32
            echo "    <table>
        <tr style=\"border-bottom: 1px dotted black\">
            <td style=\"text-align: center;\">Title</td>
            <td style=\"text-align: center;\">Scheduled for</td>
            <td>Kind</td></tr>
    ";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "scheduled"));
            foreach ($context['_seq'] as $context["_key"] => $context["spost"]) {
                // line 38
                echo "            <tr style=\"border-bottom: 1px dotted black\">
                <td><a href=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_edit_form", array("id" => $this->getAttribute($this->getContext($context, "spost"), "id"))), "html", null, true);
                echo "\">";
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "spost"), "htmlTitle")) > 0)) {
                    echo $this->getAttribute($this->getContext($context, "spost"), "htmlTitle");
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "spost"), "id"), "html", null, true);
                }
                echo "</a></td>
                <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "spost"), "scheduledPublish"), "F j, Y, g:i a"), "html", null, true);
                echo "</td>
                <td>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "spost"), "postType"), "name"), "html", null, true);
                echo "</td>
            </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['spost'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 44
            echo "    </table>
    ";
        }
        // line 46
        echo "

    <h1>Published</h1>
    <table>
        <tr style=\"border-bottom: 1px dotted black\">
            <td style=\"text-align: center;\">Title</td>
            <td style=\"text-align: center;\">Date published</td>
            <td>Kind</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    ";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "published"));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 58
            echo "            <tr style=\"border-bottom: 1px dotted black\">
                <td><a href=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
            echo "\">";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "htmlTitle")) > 0)) {
                echo $this->getAttribute($this->getContext($context, "post"), "htmlTitle");
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            }
            echo "</a></td>
                <td>";
            // line 60
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "creationDate"), "F j, Y, g:i a"), "html", null, true);
            echo "</td>
                <td>";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "postType"), "name"), "html", null, true);
            echo "</td>
                <td><a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_editors_post_edit_pp_form", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"), "postPublish" => true)), "html", null, true);
            echo "\">Edit</a></td>
                <td><a class=\"del-post-link\" href=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_pro_post_delete", array("id" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
            echo "\">Delete</a></td>
            </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 66
        echo "    </table>
</div>
";
    }

    // line 70
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 71
        echo "<script type=\"text/javascript\">
\$('.del-post-link').click(function(event) {
    event.preventDefault()
    var url = \$(this).attr('href');
    var confirm_box = confirm('Are you sure? All that hard work!');
    if (confirm_box) {
        window.location = url;
    } else {
        alert('didn\\'t think so.'); 
    }
});
</script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Editorial:post_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 71,  207 => 70,  201 => 66,  192 => 63,  188 => 62,  184 => 61,  180 => 60,  170 => 59,  167 => 58,  163 => 57,  150 => 46,  146 => 44,  137 => 41,  133 => 40,  123 => 39,  120 => 38,  116 => 37,  109 => 32,  105 => 30,  103 => 29,  98 => 26,  95 => 25,  86 => 22,  82 => 21,  72 => 20,  69 => 19,  65 => 18,  58 => 13,  54 => 11,  52 => 10,  48 => 8,  45 => 7,  38 => 4,  35 => 3,  29 => 2,);
    }
}

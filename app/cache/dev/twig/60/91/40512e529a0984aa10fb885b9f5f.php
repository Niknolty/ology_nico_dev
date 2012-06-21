<?php

/* OlogySocialBundle:FrontEnd:notifications.html.twig */
class __TwigTemplate_609140512e529a0984aa10fb885b9f5f extends Twig_Template
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
        if ($this->getContext($context, "loggedIn")) {
            // line 2
            echo "    <ul style=\"font-size: 11px;\">
    ";
            // line 3
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "notifications"));
            foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
                echo " 
        <li>
            <a href=\"";
                // line 5
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getContext($context, "notification"), "userImage"))), "html", null, true);
                echo "\" width=\"30px\" height=\"30px\" style=\"float: left; padding-right: 5px;\"/></a>
        ";
                // line 6
                if (($this->getAttribute($this->getContext($context, "notification"), "typeId") == 1)) {
                    // line 7
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "userFirstName"), "html", null, true);
                    echo "</a> joined your ology <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "notification"), "ologyId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "ologySlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "ologyName"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 9
                echo "        ";
                if (($this->getAttribute($this->getContext($context, "notification"), "typeId") == 3)) {
                    // line 10
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "userFirstName"), "html", null, true);
                    echo "</a> posted in the ology <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "notification"), "ologyId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "ologySlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "ologyName"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 12
                echo "        ";
                if (($this->getAttribute($this->getContext($context, "notification"), "typeId") == 4)) {
                    // line 13
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "userFirstName"), "html", null, true);
                    echo "</a> commented on your post <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "notification"), "postId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "postSlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "postTitle"), "html", null, true);
                    echo "</a> in <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "notification"), "ologyId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "ologySlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "ologyName"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 15
                echo "        ";
                if (($this->getAttribute($this->getContext($context, "notification"), "typeId") == 5)) {
                    // line 16
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "userFirstName"), "html", null, true);
                    echo "</a> also commented on the post <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "notification"), "postId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "postSlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "postTitle"), "html", null, true);
                    echo "</a> in <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "notification"), "ologyId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "ologySlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "ologyName"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 18
                echo "        ";
                if (($this->getAttribute($this->getContext($context, "notification"), "typeId") == 8)) {
                    // line 19
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "userFirstName"), "html", null, true);
                    echo "</a> follows your stash <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_stash", array("id" => $this->getAttribute($this->getContext($context, "notification"), "stashId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "stashName"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 21
                echo "        ";
                if (($this->getAttribute($this->getContext($context, "notification"), "typeId") == 9)) {
                    // line 22
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "userFirstName"), "html", null, true);
                    echo "</a> follows you in <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "notification"), "ologyId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "ologySlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "ologyName"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 24
                echo "        ";
                if (($this->getAttribute($this->getContext($context, "notification"), "typeId") == 10)) {
                    // line 25
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "notification"), "postId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "postSlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "postTitle"), "html", null, true);
                    echo "</a> has been reologized by <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "userFirstName"), "html", null, true);
                    echo "</a> in <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "notification"), "ologyId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "ologySlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "ologyName"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 27
                echo "        ";
                if (($this->getAttribute($this->getContext($context, "notification"), "typeId") == 11)) {
                    // line 28
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "notification"), "postId"), "slug" => $this->getAttribute($this->getContext($context, "notification"), "postSlug"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "postTitle"), "html", null, true);
                    echo "</a> has been reologized by <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "notification"), "userId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "userFirstName"), "html", null, true);
                    echo "</a> in <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_stash", array("id" => $this->getAttribute($this->getContext($context, "notification"), "stashId"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "notification"), "stashName"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 30
                echo "        </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 32
            echo "    </ul>
";
        } else {
            // line 34
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
            echo "\">Looks like nothing new is going on in your ologies.
    Why don’t you explore and find some new ones to join!</a>
";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:notifications.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 34,  177 => 32,  170 => 30,  135 => 25,  132 => 24,  120 => 22,  117 => 21,  105 => 19,  102 => 18,  86 => 16,  83 => 15,  67 => 13,  64 => 12,  49 => 9,  35 => 6,  29 => 5,  22 => 3,  19 => 2,  17 => 1,  396 => 154,  392 => 153,  388 => 152,  384 => 151,  361 => 131,  355 => 127,  352 => 126,  345 => 121,  336 => 118,  330 => 117,  325 => 114,  319 => 112,  313 => 110,  311 => 109,  305 => 108,  302 => 107,  298 => 106,  295 => 105,  291 => 103,  282 => 100,  276 => 99,  269 => 95,  263 => 94,  260 => 93,  256 => 92,  253 => 91,  250 => 90,  244 => 87,  240 => 85,  238 => 84,  235 => 83,  233 => 82,  228 => 79,  222 => 76,  217 => 74,  213 => 72,  209 => 70,  207 => 69,  203 => 67,  200 => 66,  198 => 65,  190 => 59,  183 => 55,  180 => 54,  166 => 53,  163 => 52,  160 => 51,  157 => 50,  154 => 28,  151 => 27,  134 => 47,  126 => 41,  118 => 38,  115 => 37,  113 => 36,  108 => 33,  104 => 31,  101 => 30,  96 => 26,  94 => 25,  90 => 23,  84 => 21,  81 => 20,  78 => 19,  72 => 17,  70 => 16,  65 => 14,  61 => 13,  54 => 12,  52 => 10,  48 => 9,  44 => 7,  42 => 6,  39 => 5,  37 => 7,  34 => 3,  28 => 2,);
    }
}

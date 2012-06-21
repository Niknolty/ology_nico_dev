<?php

/* OlogySocialBundle:FrontEnd:home.html.twig */
class __TwigTemplate_09a01c23607708931bb8799fc977054f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "Home | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        if (($this->getContext($context, "loggedIn") == true)) {
            // line 5
            echo "<div id='page'>
    ";
            // line 6
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:dock.html.twig")->display($context);
            // line 7
            echo "</div>
";
        }
        // line 9
        echo "<div id=\"container-home\">
    <div id=\"profile\">
        ";
        // line 11
        $this->env->loadTemplate("OlogySocialBundle:Tips:post_create_tip.html.twig")->display($context);
        // line 12
        echo "  \t<a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "user"), "id"))), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_medium_image_path") . $this->getAttribute($this->getContext($context, "user"), "imageUrl"))), "html", null, true);
        echo "\" width=\"60px\" height=\"60px\"/></a>
  \t<a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "user"), "id"))), "html", null, true);
        echo "\" class=\"view-profile\">View Profile</a>
        <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getContext($context, "user"), "id"))), "html", null, true);
        echo "\" class=\"edit-settings\">Edit Settings</a>
        <div class=\"post-something\">
            ";
        // line 16
        if ((!$this->getContext($context, "loggedIn"))) {
            // line 17
            echo "                You've got to log in or <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_register"), "html", null, true);
            echo "\">register</a> before you can join the discussion!<br /><br />
            ";
        } elseif ((twig_length_filter($this->env, $this->getContext($context, "userOlogies")) > 0)) {
            // line 19
            echo "                ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:create_post_home.html.twig")->display($context);
            // line 20
            echo "            ";
        } else {
            // line 21
            echo "                You've got to <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
            echo "\"> follow some Ologies</a> before you can join the discussion!<br /><br />
            ";
        }
        // line 23
        echo "        </div>
    </div>
    ";
        // line 25
        if (array_key_exists("justRegistered", $context)) {
            // line 26
            echo "        <div id=\"user-ologize-popup\">
            <a class='close-popup' href='#' onclick=\"\$('#user-ologize-popup').remove(); return false;\" title=\"Close\">X</a>
            <h2>Hey, one more quick thing:</h2>
           ";
            // line 30
            echo "           ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:ologize_settings.html.twig")->display($context);
            // line 31
            echo "        </div>
    ";
        }
        // line 33
        echo "    <div id=\"ology-posts-box-home\">
        <div id=\"posts-box-main-home\">
            <div id=\"p\">
                ";
        // line 36
        if ((twig_length_filter($this->env, $this->getContext($context, "posts")) <= 0)) {
            // line 37
            echo "                <div id=\"find-ologies\">
                    <h1><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
            echo "\">You are not following any Ologies.</a></h1><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
            echo "\">Explore and find what you love!</a>
                </div>
                ";
        } else {
            // line 41
            echo "                
                    <div id=\"post-filters-home\">
                        <h3>Top Posts:</h3>
                    </div>

                    <div id=\"posts-box-home\">
                        ";
            // line 47
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
                // line 48
                echo "                            ";
                if ($this->getAttribute($this->getContext($context, "post"), "isProfessional")) {
                    // line 49
                    echo "                                ";
                    $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
                    // line 50
                    echo "                            ";
                } else {
                    // line 51
                    echo "                                ";
                    $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"), "cardNumber" => $this->getAttribute($this->getContext($context, "loop"), "index"))));
                    // line 52
                    echo "                            ";
                }
                // line 53
                echo "                        ";
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
            // line 54
            echo "                        <div> 
                            <a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_home_pag", array("offset" => 1, "n" => $this->getContext($context, "nbPosts"))), "html", null, true);
            echo "\" class=\"navigation\">NEXT</a>
                        </div>
                    </div>
                ";
        }
        // line 59
        echo "            </div>
        </div>
    </div>
</div>

<div id=\"right-panel-home\">
    ";
        // line 65
        $this->env->loadTemplate("OlogySocialBundle:Tips:whats_new_tip.html.twig")->display($context);
        // line 66
        echo "    ";
        if (($this->getContext($context, "loggedIn") && (twig_length_filter($this->env, $this->getContext($context, "notifications")) > 0))) {
            // line 67
            echo "    <div id=\"whats-new-home\">
        <h2>What's New?</h2>
        ";
            // line 69
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:notifications.html.twig")->display($context);
            // line 70
            echo "    </div>
    ";
        } else {
            // line 72
            echo "    <div id=\"whats-new-home2\">
        <h2>What's New?</h2>
        <h3><a href=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
            echo "\">Looks like nothing new is going on in your ologies.</a></h3>
        <br />
        <a href=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
            echo "\">Why don’t you explore and find some new ones to join!</a>
    </div>
    ";
        }
        // line 79
        echo "
    <div id=\"ologist-home\">
        <div id=\"featured\">
            ";
        // line 82
        $this->env->loadTemplate("OlogySocialBundle:Tips:ology_featured_tip.html.twig")->display($context);
        // line 83
        echo "            <h2>Recommended Ologies:</h2>
            ";
        // line 84
        if (($this->getContext($context, "sponsor") != null)) {
            // line 85
            echo "            <div id=\"ology-sponsor-home\">
                <p>Brought to you by:</p>
                ";
            // line 87
            echo $this->getAttribute($this->getContext($context, "sponsor"), "tag");
            echo "
            </div>
            ";
        }
        // line 90
        echo "            ";
        if ((array_key_exists("suggestedOlogies", $context) && (twig_length_filter($this->env, $this->getContext($context, "suggestedOlogies")) > 0))) {
            // line 91
            echo "            <div id=\"featured\">
                ";
            // line 92
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "suggestedOlogies"));
            foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
                // line 93
                echo "                <div class=\"ology-featured-img\">
                    <a href=\"";
                // line 94
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_small_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))));
                echo "</a>
                    <a href=\"";
                // line 95
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\" class=\"follow\"></a>
                </div>

                <p class=\"ology-featured-desc\">
                    <span class=\"ology-featured-name\"><a href=\"";
                // line 99
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
                echo "</a></span>
                    ";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
                echo "
                </p>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 103
            echo "            </div>
            ";
        }
        // line 105
        echo "            
            ";
        // line 106
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "featuredOlogies"));
        foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
            // line 107
            echo "            <div class=\"ology-featured-img\">
                <a href=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_small_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))));
            echo "</a>
                ";
            // line 109
            if ($this->getAttribute($this->getContext($context, "memberships", true), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array", true, true)) {
                // line 110
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\" class=\"unfollow\"></a>
                ";
            } else {
                // line 112
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\" class=\"follow\"></a>
                ";
            }
            // line 114
            echo "            </div>

            <p class=\"ology-featured-desc\">
                <span class=\"ology-featured-name\"><a href=\"";
            // line 117
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
            echo "</a></span>
                ";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
            echo "
            </p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 121
        echo "        </div>
    </div>
  </div>
";
    }

    // line 126
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 127
        echo "    <script type=\"text/javascript\">
        var _gaq = _gaq || [];
        _gaq.push(['_setCustomVar', 1, 'UserType', 'Member', 2]);
    </script>
    <script src=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/homescroll.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
        \$('#postForm_firstOlogy').prepend(
            \$('<option></option>').val(-1).html('Pick an Ology')
        );
        \$(\"#postForm_firstOlogy\").val(-1);
        
        \$('#postForm_firstOlogy').change(function() {
          \$('.post-button').removeAttr('disabled');
        });

        \$(\"#post-button-home\").live(\"click\", function() {
            if (\$(\"#postForm_firstOlogy\").val() == -1)
                \$(\"#postForm_firstOlogy\").effect(\"shake\", { times:2 }, 300), 
                \$('.post-button').attr('disabled', 'disabled');
            else
                \$(\"form#form-post\").submit();
        });
    </script>

<script src=\"";
        // line 151
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/picgrabber.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_comment.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  396 => 154,  392 => 153,  388 => 152,  384 => 151,  361 => 131,  355 => 127,  352 => 126,  345 => 121,  336 => 118,  330 => 117,  325 => 114,  319 => 112,  313 => 110,  311 => 109,  305 => 108,  302 => 107,  298 => 106,  295 => 105,  291 => 103,  282 => 100,  276 => 99,  269 => 95,  263 => 94,  260 => 93,  256 => 92,  253 => 91,  250 => 90,  244 => 87,  240 => 85,  238 => 84,  235 => 83,  233 => 82,  228 => 79,  222 => 76,  217 => 74,  213 => 72,  209 => 70,  207 => 69,  203 => 67,  200 => 66,  198 => 65,  190 => 59,  183 => 55,  180 => 54,  166 => 53,  163 => 52,  160 => 51,  157 => 50,  154 => 49,  151 => 48,  134 => 47,  126 => 41,  118 => 38,  115 => 37,  113 => 36,  108 => 33,  104 => 31,  101 => 30,  96 => 26,  94 => 25,  90 => 23,  84 => 21,  81 => 20,  78 => 19,  72 => 17,  70 => 16,  65 => 14,  61 => 13,  54 => 12,  52 => 11,  48 => 9,  44 => 7,  42 => 6,  39 => 5,  37 => 4,  34 => 3,  28 => 2,);
    }
}

<?php

/* OlogySocialBundle:FrontEnd:pro_post_card.html.twig */
class __TwigTemplate_f922ab70ab1858cdf5c94f96710246e8 extends Twig_Template
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
        echo "<div class=\"pro post pics ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "html", null, true);
        echo "\">
    <div class=\"post-content\">
        ";
        // line 3
        if (array_key_exists("large", $context)) {
            // line 4
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_medium_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
            echo "</a>
        ";
        } else {
            // line 6
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getContext($context, "post"), "imageUrl"))));
            echo "</a>
        ";
        }
        // line 8
        echo "        
        ";
        // line 9
        if ((array_key_exists("unStashable", $context) && $this->getContext($context, "unStashable"))) {
            // line 10
            echo "            <div class=\"stash-delete-card\"><a class=\"stash-delete-card-link\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_stash_unstash", array("stashId" => $this->getContext($context, "stashId"), "postId" => $this->getAttribute($this->getContext($context, "post"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/close_button.png"), "html", null, true);
            echo "\"/></a></div>
        ";
        }
        // line 12
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologize_button.html.twig")->display($context);
        // line 13
        echo "        
        ";
        // line 14
        if (array_key_exists("displayology", $context)) {
            // line 15
            echo "            ";
            if (array_key_exists("large", $context)) {
                // line 16
                echo "            <div class=\"large-overlay\">
            ";
            } else {
                // line 18
                echo "            <div class=\"channel-overlay\">
            ";
            }
            // line 20
            echo "            Posted in <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
            echo "</a>
            </div>
        ";
        }
        // line 23
        echo "        \t
        ";
        // line 24
        $this->env->loadTemplate("OlogySocialBundle:Likes:ShowLikesCard.html.twig")->display($context);
        // line 25
        echo "        
        <h3><a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
        echo "\">";
        echo $this->getAttribute($this->getContext($context, "post"), "htmlTitle");
        echo "</a></h3>
        
        <p class=\"card-txt\">
            ";
        // line 29
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "summary"), "html", null, true));
        echo "
        </p>

        <hr align=\"center\" width=\"90%\" color=\"C5C5C5\" size=\"1\"/>
        <div class=\"user-img\">
            <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_small_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "imageUrl"))), array("class" => "user-pic"));
        echo "</a>
        </div>

        <div class=\"pro-small\">
            Posted by
            <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
        echo "\" class=\"user-popupable\" pid=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"), "html", null, true);
        echo "\">
                ";
        // line 40
        $context["firstname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"));
        // line 41
        echo "                ";
        $context["lastname_length"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"));
        // line 42
        echo "                ";
        if ((($this->getContext($context, "firstname_length") + $this->getContext($context, "lastname_length")) >= 15)) {
            echo " 
                    ";
            // line 43
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName") . " ") . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName")), 15, false, "..."), "html", null, true);
            echo "
                ";
        } else {
            // line 44
            echo "   
                    ";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"), "html", null, true);
            echo "
                ";
        }
        // line 46
        echo "      
            </a><br />
            ";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "editorTitle"), "html", null, true);
        echo "<br />
            in <a href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "slug"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "firstOlogy"), "name"), "html", null, true);
        echo "</a><br/>
        </div>
        
        ";
        // line 53
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologized.html.twig")->display($context);
        // line 54
        echo "        
        ";
        // line 56
        echo "        ";
        $this->env->loadTemplate("OlogySocialBundle:Likes:ShowStats.html.twig")->display($context);
        echo "     
    </div>
                    
                    
                    
                    
                    
                    
    ";
        // line 64
        if ($this->getContext($context, "loggedIn")) {
            // line 65
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "commentForm", true), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array", true, true)) {
                // line 66
                echo "            <div id=\"comment-form-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
                echo "\" class=\"inline-comment-form\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post_ajax_comments", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
                echo "\">
                ";
                // line 67
                $this->env->loadTemplate("OlogySocialBundle:Comment:inline_create.html.twig")->display(array_merge($context, array("form" => $this->getAttribute($this->getContext($context, "commentForm"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"))));
                // line 68
                echo "            </div>
        ";
            }
            // line 70
            echo "    ";
        } else {
            // line 71
            echo "        ";
            $this->env->loadTemplate("OlogySocialBundle:Comment:inline_create.html.twig")->display(array_merge($context, array("form" => $this->getAttribute($this->getContext($context, "commentForm"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"), "showprompt" => true)));
            // line 72
            echo "    ";
        }
        // line 73
        echo "    
                    
    ";
        // line 75
        if ($this->getAttribute($this->getContext($context, "commentPost", true), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array", true, true)) {
            // line 76
            echo "        <div class=\"two-first-comment\">
        ";
            // line 77
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "commentPost"), $this->getAttribute($this->getContext($context, "post"), "id"), array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 78
                echo "            <div class=\"post-card-comment\"> <a name=\"comments\">
                <div class=\"user-img\">
                    <a href=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
                echo "\">
                        <img src=\"";
                // line 81
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "imageUrl"))), "html", null, true);
                echo "\">
                    </a>
                </div>
                <p class=\"commentp\"><a href=\"";
                // line 84
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "comment"), "author"), "firstName"), "html", null, true);
                echo "</a> 
                ";
                // line 85
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content")) <= 140)) {
                    // line 86
                    echo "                    ";
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), "html", null, true));
                    echo "
                ";
                } else {
                    // line 88
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "content"), 140, false, "..."), "html", null, true);
                    echo " 
                ";
                }
                // line 90
                echo "                </p>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 92
            echo "  
        </div>        
    ";
        }
        // line 94
        echo "    
        
        
        
    <div class=\"show-comments\">
        ";
        // line 99
        if ((array_key_exists("cardNumber", $context) && ($this->getContext($context, "cardNumber") == 2))) {
            // line 100
            echo "            ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:comment_tip.html.twig")->display($context);
            // line 101
            echo "        ";
        }
        // line 102
        echo "          ";
        if (($this->getAttribute($this->getContext($context, "post"), "timesCommented") > 2)) {
            // line 103
            echo "            <div  class=\"show-postcard-comments\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post_ajax_comments", array("postId" => $this->getAttribute($this->getContext($context, "post"), "id"), "slug" => $this->getAttribute($this->getContext($context, "post"), "slug"))), "html", null, true);
            echo "\">
                show comments
            </div>
          ";
        }
        // line 107
        echo "    </div>                 
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:pro_post_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  294 => 107,  286 => 103,  283 => 102,  280 => 101,  277 => 100,  275 => 99,  268 => 94,  263 => 92,  255 => 90,  243 => 86,  235 => 84,  212 => 75,  208 => 73,  205 => 72,  202 => 71,  199 => 70,  193 => 67,  186 => 66,  183 => 65,  181 => 64,  166 => 54,  163 => 53,  151 => 48,  147 => 46,  140 => 45,  137 => 44,  132 => 43,  127 => 42,  124 => 41,  122 => 40,  116 => 39,  106 => 34,  98 => 29,  90 => 26,  87 => 25,  85 => 24,  82 => 23,  73 => 20,  69 => 18,  65 => 16,  62 => 15,  57 => 13,  54 => 12,  46 => 10,  41 => 8,  25 => 4,  23 => 3,  17 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 88,  245 => 79,  241 => 85,  237 => 77,  233 => 76,  229 => 81,  225 => 80,  221 => 78,  217 => 77,  214 => 76,  209 => 68,  203 => 42,  200 => 41,  195 => 68,  190 => 39,  185 => 38,  180 => 22,  175 => 8,  169 => 56,  167 => 159,  164 => 158,  161 => 70,  158 => 69,  155 => 49,  153 => 67,  148 => 65,  139 => 59,  126 => 49,  120 => 45,  117 => 41,  114 => 40,  111 => 39,  109 => 38,  92 => 23,  89 => 22,  83 => 20,  80 => 19,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  60 => 14,  56 => 12,  52 => 11,  48 => 10,  44 => 9,  40 => 8,  37 => 7,  33 => 6,  31 => 4,  26 => 1,);
    }
}

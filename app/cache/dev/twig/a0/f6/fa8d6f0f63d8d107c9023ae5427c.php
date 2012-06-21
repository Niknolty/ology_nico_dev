<?php

/* OlogySocialBundle:FrontEnd:ology.html.twig */
class __TwigTemplate_a0f6fa8d6f0f63d8d107c9023ae5427c extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
        echo " | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 6
            echo "<div id='page'>
    ";
            // line 7
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:dock.html.twig")->display($context);
            // line 8
            echo "</div>
";
        }
        // line 10
        echo "
<div id=\"container-ology\">
    ";
        // line 12
        if (twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user"))) {
            // line 13
            echo "        ";
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:almost-register-prompt.html.twig")->display($context);
            echo " 
    ";
        }
        // line 14
        echo "      
    <div id=\"ology-ologist\">
        <div id=\"ology-image\">
            <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_medium_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))), "html", null, true);
        echo "\" height=\"100\" width=\"100\"/>
        </div>
        <div id=\"ology-desc\">
            <h2><a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "Id"), "html", null, true);
        echo "\" class=\"ology-link-id2\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
        echo "</a></h2>
            <p class=\"ology-desc\">";
        // line 21
        echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), 150), "html", null, true);
        echo "</p>
            <div>
                ";
        // line 23
        if (($this->getContext($context, "loggedIn") == false)) {
            echo "    
                    <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_remember_join_offline", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
            echo "\" class=\"sign follow\"></a>
                    ";
            // line 25
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display(array_merge($context, array("prompt_action" => "3")));
            // line 26
            echo "                ";
        } elseif (($this->getContext($context, "isMember") == true)) {
            // line 27
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
            echo "\" class=\"unfollow\"></a><br/>
                    ";
            // line 28
            $this->env->loadTemplate("OlogySocialBundle:Tips:follow_unfollow_tip.html.twig")->display($context);
            // line 29
            echo "                ";
        } else {
            echo "  
                    <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
            echo "\" class=\"follow\"></a>
                    ";
            // line 31
            $this->env->loadTemplate("OlogySocialBundle:Tips:follow_unfollow_tip.html.twig")->display($context);
            // line 32
            echo "                ";
        }
        // line 33
        echo "            </div>
        </div>
            
        ";
        // line 36
        if ($this->getContext($context, "loggedIn")) {
            // line 37
            echo "            ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id") == $this->getAttribute($this->getContext($context, "user"), "id"))) {
                // line 38
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_update_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\" class=\"edit-ology\" >Edit</a>
            ";
            }
            // line 40
            echo "        ";
        }
        // line 41
        echo "                
        ";
        // line 42
        echo "        
            ";
        // line 43
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:ologist-right-box.html.twig")->display($context);
        echo "       
        ";
        // line 44
        echo "    
                
                
                
            <div id=\"post-bg\"></div>
            ";
        // line 49
        $this->env->loadTemplate("OlogySocialBundle:Tips:post_create_tip.html.twig")->display($context);
        // line 50
        echo "

";
        // line 59
        echo "\t\t";
        // line 60
        echo "        <div class=\"post-ology\">
            ";
        // line 61
        $this->env->loadTemplate("OlogySocialBundle:Post:create_post.html.twig")->display($context);
        // line 62
        echo "        </div>
    </div>

    <div id=\"ology-posts-box-ology\">
        <div id=\"posts-box-main-ology\">
            <div id=\"p\">
                <div id=\"post-filters-ology\">
                        <h3>";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
        echo " Feed</h3>
                </div>

                <div id=\"posts-box-ology\">
                    ";
        // line 73
        if ((!$this->getContext($context, "hasPosts"))) {
            // line 74
            echo "                    <div class=\"post text\">
                        ";
            // line 75
            if (((!$this->getContext($context, "loggedIn")) || ($this->getAttribute($this->getContext($context, "user"), "id") != $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id")))) {
                // line 76
                echo "                            <p style=\"font-size: 14px\">Awww… looks like no one has posted anything yet.</p>
                            <p style=\"font-size: 14px\">Why not be the first? FIRST!!!</p>
                        ";
            } else {
                // line 79
                echo "                            <p style=\"font-size: 14px\">Congrats on creating a new ology! You're kind of a big deal.</p>
                            <p style=\"font-size: 14px\">So now what?<br/>Post something.</p>
                        ";
            }
            // line 82
            echo "                    </div>
                    ";
        }
        // line 84
        echo "                        
                    ";
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "postsOlogies"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["po"]) {
            // line 86
            echo "                        ";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "po"), "post"), "isProfessional")) {
                // line 87
                echo "                            ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getAttribute($this->getContext($context, "po"), "post"))));
                // line 88
                echo "                        ";
            } else {
                // line 89
                echo "                            ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getAttribute($this->getContext($context, "po"), "post"), "cardNumber" => $this->getAttribute($this->getContext($context, "loop"), "index"))));
                // line 90
                echo "                        ";
            }
            // line 91
            echo "                    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['po'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 92
        echo "
                    <div class=\"nextpost\">
                      <a href=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology_pag", array("offset" => 1, "n" => $this->getContext($context, "nbPosts"), "id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
        echo "\" class=\"navigation\">NEXT</a>
                    </div>
                </div>   
            </div>
        </div>
    </div>
            
    <div id=\"ology-right-panel-home\">
    ";
        // line 102
        $this->env->loadTemplate("OlogySocialBundle:Tips:whats_new_tip.html.twig")->display($context);
        // line 103
        echo "    ";
        if (($this->getContext($context, "loggedIn") == false)) {
            // line 104
            echo "        <div id=\"whats-new-join\">
            <span class=\"whats-new-join\">Join today! Ology is where thousands of people share their interests and passions with each other.</span>
            ";
            // line 106
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:facebook_signin.html.twig")->display($context);
            // line 107
            echo "            <span class=\"whats-new-join2\">What is Ology?</span>
            <iframe width=\"150\" height=\"150\" src=\"http://www.youtube.com/embed/y2e_1KpZFvo?wmode=transparent\" frameborder=\"0\" allowfullscreen></iframe>
        </div>
    ";
        } else {
            // line 111
            echo "        ";
            if ((twig_length_filter($this->env, $this->getContext($context, "notifications")) > 0)) {
                // line 112
                echo "            <div id=\"whats-new\">
                <h2>What's New</h2>
                ";
                // line 114
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:notifications.html.twig")->display($context);
                // line 115
                echo "            </div>
        ";
            } else {
                // line 117
                echo "            <div id=\"whats-new-home2\">
                <h2>What's New?</h2>
                <h3><a href=\"";
                // line 119
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
                echo "\">Looks like nothing new is going on in your ologies.</a></h3>
                <br />
                <a href=\"";
                // line 121
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore"), "html", null, true);
                echo "\">Why don’t you explore and find some new ones to join!</a>
            </div>
        ";
            }
            // line 124
            echo "    ";
        }
        // line 125
        echo "    </div>
</div>
";
    }

    // line 129
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 130
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/silver-bullet/homescroll.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/picgrabber.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_comment.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_post.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:ology.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  348 => 135,  344 => 134,  340 => 133,  336 => 132,  332 => 131,  327 => 130,  324 => 129,  318 => 125,  315 => 124,  309 => 121,  304 => 119,  300 => 117,  296 => 115,  294 => 114,  290 => 112,  287 => 111,  281 => 107,  279 => 106,  275 => 104,  272 => 103,  270 => 102,  259 => 94,  255 => 92,  241 => 91,  238 => 90,  235 => 89,  232 => 88,  229 => 87,  226 => 86,  209 => 85,  206 => 84,  202 => 82,  197 => 79,  192 => 76,  190 => 75,  187 => 74,  185 => 73,  178 => 69,  169 => 62,  167 => 61,  164 => 60,  162 => 59,  158 => 50,  156 => 49,  149 => 44,  145 => 43,  142 => 42,  139 => 41,  136 => 40,  130 => 38,  127 => 37,  125 => 36,  120 => 33,  117 => 32,  115 => 31,  111 => 30,  106 => 29,  104 => 28,  99 => 27,  96 => 26,  94 => 25,  90 => 24,  86 => 23,  81 => 21,  75 => 20,  69 => 17,  64 => 14,  58 => 13,  56 => 12,  52 => 10,  48 => 8,  46 => 7,  43 => 6,  41 => 5,  38 => 4,  35 => 3,  28 => 2,);
    }
}

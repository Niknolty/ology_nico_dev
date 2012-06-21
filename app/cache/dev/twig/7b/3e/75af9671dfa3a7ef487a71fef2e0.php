<?php

/* OlogySocialBundle:FrontEnd:post_bottom.html.twig */
class __TwigTemplate_7b3e75af9671dfa3a7ef487a71fef2e0 extends Twig_Template
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
        echo "<div id=\"never-miss-a-thing\" ";
        if ((!$this->getContext($context, "loggedIn"))) {
            echo "style=\"border-bottom: 5px #CCC solid;\"";
        } else {
            echo " no=no ";
        }
        echo ">
    <span class=\"never-miss-a-thing-item\">Never Miss <br/>A Thing</span>
    <a class=\"never-miss-a-thing-item\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, constant("\\Ology\\SocialBundle\\Resources\\Constants::FACEBOOK_FOLLOW_LINK"), "html", null, true);
        echo "\" target=\"_blank\">
        <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/facebook_like.jpg"), "html", null, true);
        echo "\"></img>
    </a>
    <a class=\"never-miss-a-thing-item\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, constant("\\Ology\\SocialBundle\\Resources\\Constants::TWITTER_FOLLOW_LINK"), "html", null, true);
        echo "\" target=\"_blank\">
        <img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/twitter_follow.jpg"), "html", null, true);
        echo "\"></img>
    </a>
    <a class=\"never-miss-a-thing-item\" href=\"http://eepurl.com/ewlzs\" target=\"_blank\">
        <img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/daily_digest_button.png"), "html", null, true);
        echo "\"></img>
    </a>
    <a class=\"never-miss-a-thing-item\" href=\"http://itunes.apple.com/us/app/ology/id474073496?mt=8\" target=\"_blank\">
        <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/download_mobile_app_button.png"), "html", null, true);
        echo "\"></img>
    </a>
</div>


";
        // line 18
        if (($this->getContext($context, "loggedIn") == false)) {
            // line 19
            echo "<div id=\"post-join-bottom\">
    <div class=\"join-text\">
        <h3>Sign up for Ology</h3>
        <p>Join today! Ology is where thousands of people share their interests and passions with each other.</p>
        ";
            // line 23
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:facebook_signin.html.twig")->display($context);
            // line 24
            echo "        <br />
    </div>
    <div class=\"join-video\">
            <iframe width=\"150\" height=\"150\" src=\"http://www.youtube.com/embed/y2e_1KpZFvo?wmode=transparent\" Pframeborder=\"0\" allowfullscreen></iframe>
    </div>
</div>
";
        }
        // line 31
        echo "
";
        // line 32
        if (array_key_exists("pro", $context)) {
            // line 33
            echo "    <div id=\"pro-post-container-more-author-bottom\">
        <div class=\"user-img\">
            <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "imageUrl"))), "html", null, true);
            echo "\" class=\"user-pic\"></a>
        </div>
        <div class=\"small\">
            <div id=\"user-name\"><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"), "html", null, true);
            echo "</a></div><br />
            ";
            // line 39
            if (twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "editorTitle"))) {
                // line 40
                echo "            ";
            } else {
                // line 41
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "editorTitle"), "html", null, true);
                echo " <br />
            ";
            }
            // line 43
            echo "        </div><br />
        <div id=\"more-from-the-author-posts\">
            <h2 style=\"font-size: 17px;\">More from the Author:</h2>
            ";
            // line 46
            if ((!$this->getAttribute($this->getContext($context, "postsOfUserForOlogy", true), 0, array(), "array", true, true))) {
                // line 47
                echo "                <p style=\"font-size: 14px\">Awww… looks like <b>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "firstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "post"), "author"), "lastName"), "html", null, true);
                echo "</b> has no other posts.</p>
            ";
            } else {
                // line 49
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "postsOfUserForOlogy"));
                foreach ($context['_seq'] as $context["_key"] => $context["po"]) {
                    // line 50
                    echo "                    ";
                    if ($this->getAttribute($this->getContext($context, "po", true), "imageUrl", array(), "any", true, true)) {
                        // line 51
                        echo "                    <div class=\"more-from-the-author-posts-item\">
                        <div class=\"more-from-the-author-posts-item-white\">
                            <h3><a style=\"font-size: 11px;\" href=\"";
                        // line 53
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "po"), "id"), "slug" => $this->getAttribute($this->getContext($context, "po"), "slug"))), "html", null, true);
                        echo "\">";
                        echo $this->getAttribute($this->getContext($context, "po"), "htmlTitle");
                        echo "</a></h3>
                            <a href=\"";
                        // line 54
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "po"), "id"), "slug" => $this->getAttribute($this->getContext($context, "po"), "slug"))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/post/post_small/" . $this->getAttribute($this->getContext($context, "po"), "imageUrl"))));
                        echo "</a>    
                      
                        </div>    
                        ";
                        // line 57
                        if (($this->getAttribute($this->getContext($context, "po"), "timesCommented") == 0)) {
                            // line 58
                            echo "                        ";
                        } elseif (($this->getAttribute($this->getContext($context, "po"), "timesCommented") == 1)) {
                            // line 59
                            echo "                            <img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment.png"), "html", null, true);
                            echo "\"/>
                            <b>";
                            // line 60
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "po"), "timesCommented"), "html", null, true);
                            echo " Comment</b>
                        ";
                        } else {
                            // line 62
                            echo "                            <img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment.png"), "html", null, true);
                            echo "\"/>
                            <b>";
                            // line 63
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "po"), "timesCommented"), "html", null, true);
                            echo " Comments</b>
                        ";
                        }
                        // line 65
                        echo "                    </div>
                    ";
                    }
                    // line 67
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['po'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 68
                echo "            ";
            }
            // line 69
            echo "        </div>          
    </div>
";
        }
        // line 71
        echo "  


<div id=\"featured-post\">
    <div id=\"ology-sponsor-post-left\">
        <h2>Recommended Ologies:</h2>
    </div>
    <div id=\"ology-sponsor-post\">
        ";
        // line 79
        if (($this->getContext($context, "sponsor") != null)) {
            // line 80
            echo "            ";
            echo $this->getAttribute($this->getContext($context, "sponsor"), "tag");
            echo "
        ";
        }
        // line 82
        echo "    </div>
    <div style=\"clear:both\"></div>
    ";
        // line 84
        if ((array_key_exists("suggestedOlogies", $context) && (twig_length_filter($this->env, $this->getContext($context, "suggestedOlogies")) > 0))) {
            // line 85
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "suggestedOlogies"));
            foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
                // line 86
                echo "        <div class=\"featured-ology-post\">
            <div class=\"ology-featured-img\">
                <a href=\"";
                // line 88
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/ology/ology_round_medium/" . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))), "html", null, true);
                echo "\" width=\"120px\" height=\"120px\"/></a>
                <a href=\"";
                // line 89
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                echo "\" class=\"follow\"></a>
            </div>

            <p class=\"ology-featured-desc\">
                <span class=\"ology-featured-name\"><a href=\"";
                // line 93
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
                echo "</a></span>
                ";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
                echo "
            </p>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 98
            echo "    ";
        }
        // line 99
        echo "
    ";
        // line 100
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "featuredOlogies"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["ology"]) {
            // line 101
            echo "        ";
            if (($this->getAttribute($this->getContext($context, "loop"), "index0") < $this->getContext($context, "featuredToDisplay"))) {
                // line 102
                echo "        <div class=\"featured-ology-post\">
            <div class=\"ology-featured-img\">
                <a href=\"";
                // line 104
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/ology/ology_round_medium/" . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))), "html", null, true);
                echo "\" width=\"120px\" height=\"120px\"/></a>
                ";
                // line 105
                if ($this->getContext($context, "loggedIn")) {
                    // line 106
                    echo "                    ";
                    if ($this->getAttribute($this->getContext($context, "memberships", true), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array", true, true)) {
                        // line 107
                        echo "                        <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                        echo "\" class=\"unfollow\"></a>
                    ";
                    } else {
                        // line 109
                        echo "                        <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                        echo "\" class=\"follow\"></a>
                    ";
                    }
                    // line 111
                    echo "                ";
                }
                // line 112
                echo "            </div>
            <p class=\"ology-featured-desc\">
                <span class=\"ology-featured-name\"><a href=\"";
                // line 114
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
                echo "</a></span>
                ";
                // line 115
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
                echo "
            </p>
        </div>
        ";
            }
            // line 119
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 120
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:post_bottom.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  348 => 120,  321 => 114,  314 => 111,  308 => 109,  302 => 107,  297 => 105,  287 => 102,  264 => 99,  261 => 98,  251 => 94,  232 => 88,  228 => 86,  223 => 85,  199 => 71,  191 => 68,  185 => 67,  181 => 65,  176 => 63,  166 => 60,  158 => 58,  156 => 57,  142 => 53,  138 => 51,  130 => 49,  122 => 47,  120 => 46,  115 => 43,  109 => 41,  106 => 40,  96 => 38,  70 => 24,  68 => 23,  60 => 18,  52 => 13,  27 => 3,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  471 => 153,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  352 => 117,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 112,  307 => 104,  299 => 106,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  272 => 93,  259 => 89,  256 => 88,  253 => 87,  250 => 86,  245 => 93,  241 => 82,  221 => 84,  218 => 76,  212 => 75,  209 => 79,  203 => 72,  197 => 70,  192 => 69,  187 => 68,  184 => 67,  182 => 66,  179 => 65,  174 => 63,  171 => 62,  161 => 59,  153 => 58,  150 => 57,  146 => 55,  143 => 54,  135 => 50,  129 => 50,  124 => 48,  113 => 45,  107 => 43,  104 => 39,  102 => 41,  97 => 38,  91 => 35,  87 => 33,  84 => 33,  82 => 32,  77 => 29,  62 => 19,  59 => 15,  57 => 14,  53 => 13,  46 => 10,  41 => 10,  38 => 9,  36 => 6,  31 => 4,  29 => 6,  22 => 4,  17 => 1,  43 => 16,  37 => 15,  30 => 10,  28 => 9,  18 => 1,  677 => 233,  673 => 232,  668 => 230,  657 => 222,  653 => 220,  650 => 219,  642 => 216,  640 => 215,  634 => 213,  632 => 212,  626 => 208,  623 => 207,  617 => 205,  614 => 204,  608 => 202,  605 => 201,  602 => 200,  599 => 199,  595 => 197,  590 => 195,  584 => 193,  581 => 192,  578 => 191,  576 => 190,  572 => 188,  569 => 187,  563 => 185,  561 => 184,  554 => 179,  552 => 178,  547 => 175,  541 => 172,  538 => 171,  536 => 170,  530 => 167,  526 => 165,  515 => 160,  506 => 158,  498 => 161,  495 => 160,  492 => 159,  486 => 151,  483 => 150,  481 => 149,  478 => 148,  474 => 154,  469 => 152,  466 => 151,  463 => 150,  460 => 141,  457 => 140,  454 => 139,  452 => 138,  447 => 135,  441 => 134,  435 => 142,  433 => 131,  429 => 130,  423 => 126,  417 => 124,  415 => 123,  412 => 122,  408 => 120,  394 => 129,  383 => 118,  366 => 117,  362 => 115,  360 => 114,  357 => 113,  344 => 110,  341 => 109,  339 => 108,  334 => 119,  330 => 111,  327 => 115,  322 => 101,  316 => 99,  313 => 98,  311 => 97,  301 => 96,  291 => 104,  284 => 101,  279 => 86,  275 => 94,  270 => 92,  267 => 100,  265 => 91,  262 => 79,  257 => 77,  254 => 76,  252 => 75,  248 => 85,  243 => 72,  240 => 71,  238 => 89,  235 => 81,  230 => 67,  227 => 79,  225 => 65,  222 => 64,  217 => 82,  214 => 61,  211 => 80,  206 => 73,  202 => 56,  200 => 71,  196 => 53,  194 => 69,  190 => 51,  183 => 49,  177 => 64,  173 => 43,  157 => 41,  155 => 40,  148 => 54,  144 => 37,  128 => 35,  126 => 49,  119 => 47,  116 => 29,  110 => 44,  108 => 26,  105 => 25,  103 => 24,  99 => 22,  95 => 37,  93 => 19,  90 => 18,  88 => 35,  85 => 16,  79 => 31,  75 => 12,  71 => 11,  66 => 10,  63 => 9,  56 => 7,  48 => 12,  40 => 7,  32 => 3,);
    }
}

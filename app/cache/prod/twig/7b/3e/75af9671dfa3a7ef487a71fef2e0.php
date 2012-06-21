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
        return array (  334 => 119,  321 => 114,  308 => 109,  297 => 105,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 142,  415 => 137,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 116,  357 => 115,  353 => 113,  326 => 102,  314 => 111,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 81,  240 => 70,  230 => 67,  216 => 62,  213 => 61,  339 => 107,  329 => 157,  316 => 149,  310 => 146,  305 => 144,  302 => 107,  291 => 104,  261 => 98,  252 => 117,  234 => 103,  223 => 85,  348 => 120,  340 => 133,  336 => 106,  332 => 131,  327 => 115,  324 => 101,  318 => 125,  315 => 124,  309 => 121,  304 => 94,  300 => 142,  290 => 87,  287 => 102,  279 => 84,  226 => 86,  149 => 41,  136 => 40,  125 => 36,  115 => 43,  100 => 27,  130 => 49,  251 => 94,  247 => 81,  238 => 89,  194 => 69,  191 => 68,  168 => 64,  128 => 36,  294 => 114,  286 => 85,  283 => 102,  280 => 101,  277 => 132,  268 => 94,  263 => 80,  255 => 78,  243 => 80,  208 => 92,  202 => 89,  199 => 71,  186 => 66,  183 => 75,  181 => 65,  163 => 53,  140 => 45,  170 => 70,  121 => 29,  112 => 48,  118 => 34,  106 => 40,  157 => 44,  232 => 88,  228 => 86,  220 => 64,  210 => 62,  207 => 61,  159 => 45,  151 => 47,  147 => 60,  105 => 34,  85 => 24,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  435 => 142,  427 => 140,  421 => 138,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 120,  367 => 119,  364 => 120,  358 => 119,  355 => 118,  349 => 112,  346 => 111,  343 => 114,  338 => 113,  333 => 105,  330 => 104,  328 => 110,  325 => 155,  323 => 108,  320 => 107,  317 => 112,  307 => 95,  299 => 106,  296 => 141,  292 => 99,  289 => 139,  281 => 107,  275 => 104,  272 => 103,  270 => 102,  265 => 91,  259 => 94,  256 => 88,  250 => 116,  248 => 85,  235 => 68,  227 => 79,  218 => 96,  212 => 93,  206 => 84,  197 => 54,  187 => 74,  184 => 80,  182 => 66,  174 => 71,  150 => 61,  119 => 49,  110 => 36,  53 => 11,  91 => 34,  66 => 34,  98 => 42,  96 => 38,  166 => 60,  160 => 66,  154 => 43,  143 => 42,  138 => 51,  101 => 25,  58 => 16,  36 => 6,  65 => 16,  18 => 1,  352 => 117,  347 => 160,  344 => 110,  282 => 99,  276 => 83,  274 => 96,  257 => 82,  253 => 87,  249 => 88,  245 => 93,  241 => 91,  237 => 69,  233 => 76,  229 => 102,  225 => 100,  221 => 84,  217 => 82,  214 => 88,  203 => 71,  180 => 50,  175 => 8,  169 => 74,  167 => 61,  164 => 67,  155 => 49,  139 => 41,  114 => 51,  83 => 22,  76 => 33,  72 => 19,  68 => 23,  64 => 18,  56 => 18,  21 => 3,  209 => 79,  205 => 81,  196 => 86,  192 => 85,  189 => 77,  178 => 69,  176 => 63,  165 => 63,  161 => 59,  152 => 42,  148 => 54,  145 => 39,  141 => 58,  134 => 62,  132 => 55,  127 => 34,  123 => 35,  109 => 41,  93 => 39,  90 => 24,  54 => 16,  133 => 31,  124 => 33,  111 => 45,  107 => 31,  80 => 27,  63 => 17,  60 => 18,  69 => 24,  61 => 17,  52 => 13,  50 => 17,  45 => 12,  43 => 10,  34 => 5,  224 => 65,  215 => 90,  211 => 80,  204 => 90,  200 => 70,  195 => 68,  193 => 67,  190 => 75,  188 => 53,  185 => 67,  179 => 65,  177 => 64,  171 => 62,  162 => 59,  158 => 58,  156 => 57,  153 => 48,  146 => 55,  142 => 53,  137 => 37,  131 => 37,  126 => 52,  120 => 46,  117 => 48,  103 => 45,  99 => 26,  74 => 39,  47 => 13,  32 => 8,  39 => 11,  26 => 4,  97 => 40,  95 => 35,  88 => 35,  82 => 32,  78 => 26,  75 => 27,  71 => 18,  22 => 3,  44 => 12,  30 => 8,  20 => 2,  25 => 7,  49 => 13,  42 => 6,  40 => 7,  23 => 4,  27 => 3,  17 => 1,  92 => 29,  86 => 42,  79 => 31,  77 => 20,  57 => 14,  46 => 10,  37 => 10,  33 => 9,  29 => 8,  24 => 6,  19 => 2,  135 => 50,  129 => 35,  122 => 47,  116 => 30,  113 => 32,  108 => 36,  104 => 39,  102 => 27,  94 => 26,  89 => 30,  87 => 33,  84 => 33,  81 => 41,  73 => 20,  70 => 24,  67 => 22,  62 => 19,  59 => 14,  55 => 15,  51 => 11,  48 => 12,  41 => 11,  38 => 4,  35 => 3,  31 => 4,  28 => 3,);
    }
}

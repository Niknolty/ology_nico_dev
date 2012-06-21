<?php

/* OlogySocialBundle:Post:post_sidebar.html.twig */
class __TwigTemplate_5717385e01f7285c877e035acdf34a23 extends Twig_Template
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
        echo "<div id=\"big-post-sidebar\">
<div id=\"post-sidebar\">
    <div id=\"post-sidebar-follow-ology\">
        <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
        echo "</a><br />
        <span class=\"post-sidebar-follow-ology-text\">Follow to get the latest!</span><br />
        ";
        // line 6
        if (($this->getContext($context, "loggedIn") == false)) {
            // line 7
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_remember_join_offline", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
            echo "\" class=\"sign follow\"></a>
            ";
            // line 8
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display(array_merge($context, array("prompt_action" => "3")));
            // line 9
            echo "        ";
        } elseif (($this->getContext($context, "isMember") == true)) {
            // line 10
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
            echo "\" class=\"unfollow\"></a><br/>
            ";
            // line 11
            $this->env->loadTemplate("OlogySocialBundle:Tips:follow_unfollow_tip.html.twig")->display($context);
            // line 12
            echo "        ";
        } else {
            echo "  
            <a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
            echo "\" class=\"follow\"></a>
            ";
            // line 14
            $this->env->loadTemplate("OlogySocialBundle:Tips:follow_unfollow_tip.html.twig")->display($context);
            // line 15
            echo "        ";
        }
        // line 16
        echo "    </div>
        
        <div id=\"post-sidebar-infos\">

        <div id=\"sidebar-social_network_share\">
            <span class='st_facebook_large' displayText='Facebook'></span>
            <span class='st_twitter_large' displayText='Tweet'></span>
            <span class='st_pinterest_large' displayText='Pinterest'></span><br />
            <span class='st_tumblr_large' displayText='Tumblr'></span>
            <span class='st_email_large' displayText='Email'></span>
            <span class='st_sharethis_large' displayText='ShareThis'></span>
        </div>    
            
        ";
        // line 29
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 30
            echo "        <div id=\"reologize-post-button\">
            ";
            // line 31
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:reologize_button.html.twig")->display($context);
            // line 32
            echo "            ";
            $this->env->loadTemplate("OlogySocialBundle:Tips:reologize_tip.html.twig")->display($context);
            // line 33
            echo "        </div>
        ";
        }
        // line 35
        echo "            
        <div class=\"post-likes\">
            ";
        // line 37
        $this->env->loadTemplate("OlogySocialBundle:Likes:ShowLikesPost.html.twig")->display($context);
        // line 38
        echo "        </div>
            
        <div class=\"list-people-like\">
                ";
        // line 41
        if (($this->getContext($context, "nbLove") > 0)) {
            // line 42
            echo "                    ";
            if ((($this->getContext($context, "firstNameLove") == "ology") && ($this->getContext($context, "lastNameLove") == "ology"))) {
                // line 43
                echo "                        ";
                $context["user_name"] = "Anonymous";
                // line 44
                echo "                    ";
            } else {
                // line 45
                echo "                        ";
                $context["user_name"] = (($this->getContext($context, "firstNameLove") . " ") . $this->getContext($context, "lastNameLove"));
                echo " 
                    ";
            }
            // line 47
            echo "                ";
        }
        echo "    
                ";
        // line 48
        if (($this->getContext($context, "nbLove") == 1)) {
            // line 49
            echo "                    ";
            if (($this->getContext($context, "user_name") == "Anonymous")) {
                // line 50
                echo "                        <b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</b> loves it!
                    ";
            } else {
                // line 52
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "UserLoveId"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</a> loves it!
                    ";
            }
            // line 54
            echo "                ";
        } elseif (($this->getContext($context, "nbLove") == 2)) {
            // line 55
            echo "                        2 people love it!
                ";
        } elseif (($this->getContext($context, "nbLove") > 2)) {
            // line 57
            echo "                    ";
            if (($this->getContext($context, "user_name") == "Anonymous")) {
                // line 58
                echo "                        <b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</b> and ";
                echo twig_escape_filter($this->env, ($this->getContext($context, "nbLove") - 1), "html", null, true);
                echo " others <br />love it!
                    ";
            } else {
                // line 60
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "UserLoveId"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</a> and ";
                echo twig_escape_filter($this->env, ($this->getContext($context, "nbLove") - 1), "html", null, true);
                echo " others <br />love it!
                    ";
            }
            // line 62
            echo "                ";
        }
        // line 63
        echo "
                ";
        // line 64
        if (($this->getContext($context, "nbLove") > 0)) {
            // line 65
            echo "                    <div class=\"love-imgs\">
                    ";
            // line 66
            $context["number"] = "0";
            // line 67
            echo "                    ";
            $context["url"] = "";
            // line 68
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "UsersIdsLoveTab"));
            foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
                // line 69
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tab"));
                foreach ($context['_seq'] as $context["key2"] => $context["tab1"]) {
                    // line 70
                    echo "                            ";
                    if (($this->getContext($context, "key2") == 0)) {
                        // line 71
                        echo "                                ";
                        $context["number"] = $this->getContext($context, "tab1");
                        // line 72
                        echo "                            ";
                    } else {
                        // line 73
                        echo "                                ";
                        $context["url"] = $this->getContext($context, "tab1");
                        // line 74
                        echo "                            ";
                    }
                    // line 75
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key2'], $context['tab1'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 76
                echo "                        ";
                if (($this->getContext($context, "number") == 0)) {
                    // line 77
                    echo "                            <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getContext($context, "url"))), "html", null, true);
                    echo "\" class=\"user-pic\">
                        ";
                } else {
                    // line 79
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "number"))), "html", null, true);
                    echo "\"><img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getContext($context, "url"))), "html", null, true);
                    echo "\" class=\"user-pic\"></a>
                        ";
                }
                // line 81
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 82
            echo "                    </div>
                ";
        }
        // line 84
        echo "
                ";
        // line 85
        if (($this->getContext($context, "nbHate") > 0)) {
            // line 86
            echo "                    ";
            if ((($this->getContext($context, "firstNameHate") == "ology") && ($this->getContext($context, "lastNameHate") == "ology"))) {
                // line 87
                echo "                        ";
                $context["user_name"] = "Anonymous";
                // line 88
                echo "                    ";
            } else {
                // line 89
                echo "                            ";
                $context["user_name"] = (($this->getContext($context, "firstNameHate") . " ") . $this->getContext($context, "lastNameHate"));
                echo " 
                    ";
            }
            // line 91
            echo "                ";
        }
        echo "         
                ";
        // line 92
        if (($this->getContext($context, "nbHate") == 1)) {
            // line 93
            echo "                    ";
            if (($this->getContext($context, "user_name") == "Anonymous")) {
                // line 94
                echo "                        <b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</b> hates it!
                    ";
            } else {
                // line 96
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "UserHateId"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</a> hates it!
                    ";
            }
            // line 98
            echo "                ";
        } elseif (($this->getContext($context, "nbHate") == 2)) {
            // line 99
            echo "                    2 people hate it!
                ";
        } elseif (($this->getContext($context, "nbHate") > 2)) {
            // line 101
            echo "                    ";
            if (($this->getContext($context, "user_name") == "Anonymous")) {
                // line 102
                echo "                        <b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</b> and ";
                echo twig_escape_filter($this->env, ($this->getContext($context, "nbHate") - 1), "html", null, true);
                echo " others <br />hate it!
                    ";
            } else {
                // line 104
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "UserHateId"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</a> and ";
                echo twig_escape_filter($this->env, ($this->getContext($context, "nbHate") - 1), "html", null, true);
                echo " others <br />hate it!
                    ";
            }
            // line 106
            echo "                ";
        }
        // line 107
        echo "
                ";
        // line 108
        if (($this->getContext($context, "nbHate") > 0)) {
            // line 109
            echo "                    <div class=\"hate-imgs\">
                        ";
            // line 110
            $context["number"] = "0";
            // line 111
            echo "                    ";
            $context["url"] = "";
            // line 112
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "UsersIdsHateTab"));
            foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
                // line 113
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tab"));
                foreach ($context['_seq'] as $context["key2"] => $context["tab1"]) {
                    // line 114
                    echo "                            ";
                    if (($this->getContext($context, "key2") == 0)) {
                        // line 115
                        echo "                                ";
                        $context["number"] = $this->getContext($context, "tab1");
                        // line 116
                        echo "                            ";
                    } else {
                        // line 117
                        echo "                                ";
                        $context["url"] = $this->getContext($context, "tab1");
                        // line 118
                        echo "                            ";
                    }
                    // line 119
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key2'], $context['tab1'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 120
                echo "                        ";
                if (($this->getContext($context, "number") == 0)) {
                    // line 121
                    echo "                            <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getContext($context, "url"))), "html", null, true);
                    echo "\" class=\"user-pic\">
                        ";
                } else {
                    // line 123
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "number"))), "html", null, true);
                    echo "\"><img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getContext($context, "url"))), "html", null, true);
                    echo "\" class=\"user-pic\"></a>
                        ";
                }
                // line 125
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 126
            echo "                    </div>
                ";
        }
        // line 128
        echo "
                ";
        // line 129
        if (($this->getContext($context, "nbHmm") > 0)) {
            // line 130
            echo "                    ";
            if ((($this->getContext($context, "firstNameHmm") == "ology") && ($this->getContext($context, "lastNameHmm") == "ology"))) {
                // line 131
                echo "                        ";
                $context["user_name"] = "Anonymous";
                // line 132
                echo "                    ";
            } else {
                // line 133
                echo "                            ";
                $context["user_name"] = (($this->getContext($context, "firstNameHmm") . " ") . $this->getContext($context, "lastNameHmm"));
                echo " 
                    ";
            }
            // line 135
            echo "                ";
        }
        echo "        
                ";
        // line 136
        if (($this->getContext($context, "nbHmm") == 1)) {
            // line 137
            echo "                    ";
            if (($this->getContext($context, "user_name") == "Anonymous")) {
                // line 138
                echo "                        <b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</b> says hmm...
                    ";
            } else {
                // line 140
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "UserHmmId"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</a> says hmm...
                    ";
            }
            // line 142
            echo "                ";
        } elseif (($this->getContext($context, "nbHmm") == 2)) {
            // line 143
            echo "                        2 people say hmm...
                ";
        } elseif (($this->getContext($context, "nbHmm") > 2)) {
            // line 145
            echo "                    ";
            if (($this->getContext($context, "user_name") == "Anonymous")) {
                // line 146
                echo "                        <b>";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</b> and ";
                echo twig_escape_filter($this->env, ($this->getContext($context, "nbHmm") - 1), "html", null, true);
                echo " others <br />say hmm...
                    ";
            } else {
                // line 148
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "UserHmmId"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "user_name"), "html", null, true);
                echo "</a>  and ";
                echo twig_escape_filter($this->env, ($this->getContext($context, "nbHmm") - 1), "html", null, true);
                echo " others <br />say hmm...
                    ";
            }
            // line 150
            echo "                ";
        }
        // line 151
        echo "
                ";
        // line 152
        if (($this->getContext($context, "nbHmm") > 0)) {
            // line 153
            echo "                    <div class=\"hmm-imgs\">
                        ";
            // line 154
            $context["number"] = "0";
            // line 155
            echo "                    ";
            $context["url"] = "";
            // line 156
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "UsersIdsHmmTab"));
            foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
                // line 157
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tab"));
                foreach ($context['_seq'] as $context["key2"] => $context["tab1"]) {
                    // line 158
                    echo "                            ";
                    if (($this->getContext($context, "key2") == 0)) {
                        // line 159
                        echo "                                ";
                        $context["number"] = $this->getContext($context, "tab1");
                        // line 160
                        echo "                            ";
                    } else {
                        // line 161
                        echo "                                ";
                        $context["url"] = $this->getContext($context, "tab1");
                        // line 162
                        echo "                            ";
                    }
                    // line 163
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key2'], $context['tab1'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 164
                echo "                        ";
                if (($this->getContext($context, "number") == 0)) {
                    // line 165
                    echo "                            <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getContext($context, "url"))), "html", null, true);
                    echo "\" class=\"user-pic\">
                        ";
                } else {
                    // line 167
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getContext($context, "number"))), "html", null, true);
                    echo "\"><img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/user/user_small/" . $this->getContext($context, "url"))), "html", null, true);
                    echo "\" class=\"user-pic\"></a>
                        ";
                }
                // line 169
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['tab'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 170
            echo "                    </div>
                ";
        }
        // line 172
        echo "            </div>
    </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:post_sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 165,  510 => 164,  504 => 163,  501 => 162,  489 => 158,  484 => 157,  479 => 156,  476 => 155,  471 => 153,  453 => 148,  445 => 146,  442 => 145,  438 => 143,  427 => 140,  421 => 138,  418 => 137,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  391 => 128,  387 => 126,  381 => 125,  373 => 123,  367 => 121,  364 => 120,  358 => 119,  355 => 118,  352 => 117,  349 => 116,  346 => 115,  343 => 114,  338 => 113,  333 => 112,  328 => 110,  325 => 109,  323 => 108,  320 => 107,  317 => 106,  307 => 104,  299 => 102,  296 => 101,  292 => 99,  289 => 98,  281 => 96,  272 => 93,  259 => 89,  256 => 88,  253 => 87,  250 => 86,  245 => 84,  241 => 82,  221 => 77,  218 => 76,  212 => 75,  209 => 74,  203 => 72,  197 => 70,  192 => 69,  187 => 68,  184 => 67,  182 => 66,  179 => 65,  174 => 63,  171 => 62,  161 => 60,  153 => 58,  150 => 57,  146 => 55,  143 => 54,  135 => 52,  129 => 50,  124 => 48,  113 => 45,  107 => 43,  104 => 42,  102 => 41,  97 => 38,  91 => 35,  87 => 33,  84 => 32,  82 => 31,  77 => 29,  62 => 16,  59 => 15,  57 => 14,  53 => 13,  46 => 11,  41 => 10,  38 => 9,  36 => 8,  31 => 7,  29 => 6,  22 => 4,  17 => 1,  43 => 16,  37 => 15,  30 => 10,  28 => 9,  18 => 1,  677 => 233,  673 => 232,  668 => 230,  657 => 222,  653 => 220,  650 => 219,  642 => 216,  640 => 215,  634 => 213,  632 => 212,  626 => 208,  623 => 207,  617 => 205,  614 => 204,  608 => 202,  605 => 201,  602 => 200,  599 => 199,  595 => 197,  590 => 195,  584 => 193,  581 => 192,  578 => 191,  576 => 190,  572 => 188,  569 => 187,  563 => 185,  561 => 184,  554 => 179,  552 => 178,  547 => 175,  541 => 172,  538 => 171,  536 => 170,  530 => 167,  526 => 165,  515 => 160,  506 => 158,  498 => 161,  495 => 160,  492 => 159,  486 => 151,  483 => 150,  481 => 149,  478 => 148,  474 => 154,  469 => 152,  466 => 151,  463 => 150,  460 => 141,  457 => 140,  454 => 139,  452 => 138,  447 => 135,  441 => 134,  435 => 142,  433 => 131,  429 => 130,  423 => 126,  417 => 124,  415 => 123,  412 => 122,  408 => 120,  394 => 129,  383 => 118,  366 => 117,  362 => 115,  360 => 114,  357 => 113,  344 => 110,  341 => 109,  339 => 108,  334 => 106,  330 => 111,  327 => 103,  322 => 101,  316 => 99,  313 => 98,  311 => 97,  301 => 96,  291 => 93,  284 => 89,  279 => 86,  275 => 94,  270 => 92,  267 => 81,  265 => 91,  262 => 79,  257 => 77,  254 => 76,  252 => 75,  248 => 85,  243 => 72,  240 => 71,  238 => 70,  235 => 81,  230 => 67,  227 => 79,  225 => 65,  222 => 64,  217 => 62,  214 => 61,  211 => 60,  206 => 73,  202 => 56,  200 => 71,  196 => 53,  194 => 52,  190 => 51,  183 => 49,  177 => 64,  173 => 43,  157 => 41,  155 => 40,  148 => 39,  144 => 37,  128 => 35,  126 => 49,  119 => 47,  116 => 29,  110 => 44,  108 => 26,  105 => 25,  103 => 24,  99 => 22,  95 => 37,  93 => 19,  90 => 18,  88 => 17,  85 => 16,  79 => 30,  75 => 12,  71 => 11,  66 => 10,  63 => 9,  56 => 7,  48 => 12,  40 => 4,  32 => 3,);
    }
}

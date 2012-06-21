<?php

/* OlogySocialBundle:FrontEnd:profile.html.twig */
class __TwigTemplate_1425a7b69b7fe547c72670f10299e267 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'pagescripts' => array($this, 'block_pagescripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "firstName"), "html", null, true);
        echo "'s Profile | Ology";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "
<div id=\"stash-delete-confirm\">
    Are you sure you want to delete this stash?<br/><br/>
    <a href=\"#\"><span id=\"alert-confirm-button\">Yes</span></a>
    <a href=\"#\"><span id=\"alert-cancel-button\">No</span></a>
    <input type=\"hidden\" id=\"hiddenConfirmUrl\" value=\"\"/>
</div>

<div id=\"container\">
    ";
        // line 14
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display($context);
        // line 15
        echo "    <div id=\"profile-left\">
        <div class=\"profile-name\">
            <h2>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "lastName"), "html", null, true);
        echo "</h2>  
        </div>
        <div class=\"profile-user\" style=\"background-image:url(";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_large_image_path") . $this->getAttribute($this->getContext($context, "profileUser"), "imageUrl"))), "html", null, true);
        echo ");\">
            ";
        // line 20
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "summary")) > 0)) {
            // line 21
            echo "            <div class=\"profile-summary\">
                \"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "summary"), "html", null, true);
            echo "\"
            </div>
            ";
        }
        // line 25
        echo "        </div>

        <div id=\"profile-info\">
            <div>
                ";
        // line 29
        if (($this->getContext($context, "loggedIn") && ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "id") != $this->getAttribute($this->getContext($context, "profileUser"), "id")))) {
            // line 30
            echo "                    ";
            if ($this->getContext($context, "isFollowingUser")) {
                // line 31
                echo "                        <div class=\"following-button\" id=\"follow-button\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_follow_user_popup", array("userId" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))), "html", null, true);
                echo "\"></div>
                    ";
            } else {
                // line 33
                echo "                        <div class=\"follow-button2\" id=\"follow-button\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_follow_user_popup", array("userId" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))), "html", null, true);
                echo "\"></div>
                    ";
            }
            // line 35
            echo "                    <div id=\"follow-popup\"></div>
                ";
        }
        // line 37
        echo "                ";
        if (($this->getContext($context, "nbFollowers") > 0)) {
            // line 38
            echo "                    <a id=\"followers-page-link\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_followers_page", array("userId" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))), "html", null, true);
            echo "\">
                        <span class=\"profile-info-element\">Followers: </span>";
            // line 39
            echo twig_escape_filter($this->env, $this->getContext($context, "nbFollowers"), "html", null, true);
            echo "
                    </a>
                ";
        } else {
            // line 42
            echo "                    <span class=\"profile-info-element\">Followers: 0</span>
                ";
        }
        // line 44
        echo "                <br />
                ";
        // line 45
        if (($this->getContext($context, "nbFollowees") > 0)) {
            // line 46
            echo "                    <a id=\"followees-page-link\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_followees_page", array("userId" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))), "html", null, true);
            echo "\">
                        <span class=\"profile-info-element\">Following: </span>";
            // line 47
            echo twig_escape_filter($this->env, $this->getContext($context, "nbFollowees"), "html", null, true);
            echo "
                    </a>
                ";
        } else {
            // line 50
            echo "                    <span class=\"profile-info-element\">Following: 0</span>
                ";
        }
        // line 52
        echo "                <br /><br /><br />
            </div>
                
            <span class=\"profile-info-element\">";
        // line 55
        if (($this->getAttribute($this->getContext($context, "profileUser"), "editorTitle") != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "editorTitle"), "html", null, true);
        } else {
            echo "Member";
        }
        echo "</span> 
             since ";
        // line 56
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "creationDate"), "m/d/Y"), "html", null, true);
        echo "<br />
            
            ";
        // line 58
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "location")) > 0)) {
            // line 59
            echo "                <span class=\"profile-info-element\">Location:</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "location"), "html", null, true);
            echo "<br/>
            ";
        }
        // line 61
        echo "
            ";
        // line 62
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "editorTwitterId")) > 0)) {
            // line 63
            echo "            <span class=\"profile-info-element\">Twitter:</span> <a target=\"_blank\" href=\"http://twitter.com/#!/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "editorTwitterId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "editorTwitterId"), "html", null, true);
            echo "</a><br/>
            ";
        }
        // line 65
        echo "
            ";
        // line 66
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "occupation")) > 0)) {
            // line 67
            echo "            <span class=\"profile-info-element\">Occupation:</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "occupation"), "html", null, true);
            echo "<br />
            ";
        }
        // line 69
        echo "
            ";
        // line 70
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "sex")) > 0)) {
            // line 71
            echo "            <span class=\"profile-info-element\">Sex:</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "sex"), "html", null, true);
            echo "<br />
            ";
        }
        // line 73
        echo "            
            ";
        // line 74
        if (((!$this->getAttribute($this->getContext($context, "profileUser"), "displayBday")) && (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "birthday")) > 0))) {
            // line 75
            echo "            <span class=\"profile-info-element\">Birthday:</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "birthday"), "html", null, true);
            echo "<br />
            ";
        }
        // line 77
        echo "
            ";
        // line 78
        if ((((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website1")) > 0) || (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website2")) > 0)) || (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website3")) > 0))) {
            // line 79
            echo "            <span class=\"profile-info-element\">Outside links:</span><br/>
                ";
            // line 80
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website1")) > 0)) {
                // line 81
                echo "                    <a target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website1"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website1"), "html", null, true);
                echo "</a> <br />
                ";
            }
            // line 83
            echo "                ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website2")) > 0)) {
                // line 84
                echo "                    <a target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website2"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website2"), "html", null, true);
                echo "</a> <br />
                ";
            }
            // line 86
            echo "                ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website3")) > 0)) {
                // line 87
                echo "                    <a target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website3"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "website3"), "html", null, true);
                echo "</a> <br />
                ";
            }
            // line 89
            echo "            ";
        }
        // line 90
        echo "            
            <br/><br/>
            
            <span class=\"profile-info-element\">Posts:</span> ";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nbPosts"), "html", null, true);
        echo "<br />
            <span class=\"profile-info-element\">Comments:</span> ";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nbComments"), "html", null, true);
        echo "<br />
            <span class=\"profile-info-element\">Comments on your posts:</span> ";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nbCommentsForAllPosts"), "html", null, true);
        echo "<br />
            <span class=\"profile-info-element\">Posts ReOlogized:</span> ";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nbReologize"), "html", null, true);
        echo " <br />
            <span class=\"profile-info-element\">Posts ReOlogized by others:</span> ";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nbReologized"), "html", null, true);
        echo " <br />
        
            <br/><br/>
            
            <span class=\"profile-info-element\">Reactions to ";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "firstName"), "html", null, true);
        echo "'s posts:</span><br/>
            ";
        // line 102
        if (array_key_exists("percentLoved", $context)) {
            // line 103
            echo "            <div id=\"love-o-meter\">
                <div id=\"love-o-meter-love\" style=\"width: ";
            // line 104
            echo twig_escape_filter($this->env, $this->getContext($context, "percentLoved"), "html", null, true);
            echo "%;\"></div>
                <div id=\"love-o-meter-hate\" style=\"width: ";
            // line 105
            echo twig_escape_filter($this->env, $this->getContext($context, "percentHated"), "html", null, true);
            echo "%;\"></div>
                <div id=\"love-o-meter-hmmm\" style=\"width: ";
            // line 106
            echo twig_escape_filter($this->env, $this->getContext($context, "percentHmmmed"), "html", null, true);
            echo "%;\"></div>
            </div>
            ";
        }
        // line 109
        echo "            
            <div style=\"clear: both;\">
            ";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nbLike"), "html", null, true);
        echo " love";
        if (($this->getAttribute($this->getContext($context, "stats"), "nbLike") > 1)) {
            echo "s";
        }
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nbHate"), "html", null, true);
        echo " hate";
        if (($this->getAttribute($this->getContext($context, "stats"), "nbHate") > 1)) {
            echo "s";
        }
        echo " and ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "nbHmmm"), "html", null, true);
        echo " hmmm";
        if (($this->getAttribute($this->getContext($context, "stats"), "nbHmmm") > 1)) {
            echo "s";
        }
        echo ".
            </div>
        </div>
    </div>
    
    <div id=\"profile-right\">
        <div id=\"profile-ologies\">
            <div id=\"profile-ologies-header\">
                <div id=\"profile-ologies-header-left\">
                    <h4>";
        // line 120
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "firstName"), "html", null, true);
        echo "'s Ologies</h4>
                </div>
                <div id=\"profile-ologies-header-right\" class=\"show-ologies\">
                    <a id=\"ology-down-arr\" ";
        // line 123
        if ((twig_length_filter($this->env, $this->getContext($context, "allOlogies")) < 2)) {
            echo " style=\"display: none;\" ";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_user_ologies", array("id" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/arrowdown.jpg"), "html", null, true);
        echo "\"/></a>
                    <a id=\"ology-up-arr\" style=\"display: none\" href=\"#\"><img src=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/arrowup.jpg"), "html", null, true);
        echo "\"/></a>
                </div>
            </div>

            <div id=\"profile-ologies-ology-container\">
                ";
        // line 129
        if (($this->getContext($context, "loggedIn") && ($this->getAttribute($this->getContext($context, "user"), "id") == $this->getAttribute($this->getContext($context, "profileUser"), "id")))) {
            // line 130
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "allOlogies"));
            foreach ($context['_seq'] as $context["_key"] => $context["allOlogy"]) {
                // line 131
                echo "                    <div class=\"profile-ologies-ology\">
                        <a href=\"";
                // line 132
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "allOlogy"), "id"), "slug" => $this->getAttribute($this->getContext($context, "allOlogy"), "slug"))), "html", null, true);
                echo "\">
                            <img src=\"";
                // line 133
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/ology/ology_round_medium/" . $this->getAttribute($this->getContext($context, "allOlogy"), "imageUrl"))), "html", null, true);
                echo "\" height=\"80px\" width=\"80px\" />
                        </a>
                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['allOlogy'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 137
            echo "                    <div class=\"profile-ologies-ology\">
                        <a href=\"";
            // line 138
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_create"), "html", null, true);
            echo "\">
                            <img src=\"";
            // line 139
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/newology.png"), "html", null, true);
            echo "\"/>
                        </a>
                    </div>
                ";
        } else {
            // line 143
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "allOlogiesOther"));
            foreach ($context['_seq'] as $context["_key"] => $context["allOlogy"]) {
                // line 144
                echo "                    <div class=\"profile-ologies-ology\">
                        <a href=\"";
                // line 145
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "allOlogy"), "id"), "slug" => $this->getAttribute($this->getContext($context, "allOlogy"), "slug"))), "html", null, true);
                echo "\">
                            <img src=\"";
                // line 146
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/up/img/ology/ology_round_medium/" . $this->getAttribute($this->getContext($context, "allOlogy"), "imageUrl"))), "html", null, true);
                echo "\" height=\"80px\" width=\"80px\" />
                        </a>
                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['allOlogy'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 149
            echo "            
                ";
        }
        // line 150
        echo "    
            </div>

            <div id=\"profile-ologies-ology-container-aj\">
            </div>
        </div>

        ";
        // line 157
        if ((twig_length_filter($this->env, $this->getContext($context, "stashes")) > 0)) {
            // line 158
            echo "        <div id=\"profile-stashes\">
            <div id=\"profile-stashes-header\">
                <div id=\"profile-stashes-header-left\">
                    <h4>";
            // line 161
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "firstName"), "html", null, true);
            echo "'s Stashes</h4>
                </div>
                <div id=\"profile-stashes-header-right\" class=\"hide-stashes\">
                    <a id=\"stash-down-arr\" style=\"display: none\" href=\"";
            // line 164
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_user_stashes", array("id" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/arrowdown.jpg"), "html", null, true);
            echo "\"/></a>
                    <a id=\"stash-up-arr\" href=\"#\"><img src=\"";
            // line 165
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/arrowup.jpg"), "html", null, true);
            echo "\"/></a>
                </div>
            </div>

            <div style=\"display: none\" id=\"profile-stashes-stash-container\">
                ";
            // line 170
            if (($this->getContext($context, "loggedIn") && ($this->getAttribute($this->getContext($context, "profileUser"), "id") == $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "id")))) {
                // line 171
                echo "                    <div id=\"profile-stashes-stash-container-left\">
                        <div id=\"profile-stashes-stash-container-left-container\">
                    ";
                // line 173
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "stashes"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["stash"]) {
                    // line 174
                    echo "                        ";
                    $this->env->loadTemplate("OlogySocialBundle:FrontEnd:stash_preview.html.twig")->display(array_merge($context, array("stash" => $this->getContext($context, "stash"), "profileId" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))));
                    // line 175
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stash'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 176
                echo "                        </div>
                    </div>
                    <div id=\"profile-stashes-stash-container-right\">
                        <div class=\"stash-preview\" style=\"border: 1px gray solid\" >
                            <div class=\"stash-name-overlay\">
                                <a href=\"";
                // line 181
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_create"), "html", null, true);
                echo "\">Create Stash</a>
                            </div>
                        </div>
                    </div>
                ";
            } else {
                // line 186
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "stashes"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["stash"]) {
                    // line 187
                    echo "                        ";
                    $this->env->loadTemplate("OlogySocialBundle:FrontEnd:stash_preview.html.twig")->display(array_merge($context, array("stash" => $this->getContext($context, "stash"), "profileId" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))));
                    // line 188
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stash'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 189
                echo "                ";
            }
            // line 190
            echo "
            </div>
            <div id=\"profile-stashes-stash-container-aj\">
                ";
            // line 193
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "stashes"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["stash"]) {
                // line 194
                echo "                        ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:stash_preview.html.twig")->display(array_merge($context, array("stash" => $this->getContext($context, "stash"), "profileId" => $this->getAttribute($this->getContext($context, "profileUser"), "id"))));
                // line 195
                echo "                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stash'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 196
            echo "            </div>
        </div>
        ";
        }
        // line 199
        echo "
        <div id=\"profile-posts\">
            <div id=\"profile-posts-header\">
                <div id=\"profile-posts-header-left\">
                    <h4>";
        // line 203
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "firstName"), "html", null, true);
        echo "'s Posts</h4>
                </div>
            </div>
            <div id=\"profile-posts-post-container\">
                ";
        // line 207
        if ((twig_length_filter($this->env, $this->getContext($context, "posts")) == 0)) {
            // line 208
            echo "                    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "profileUser"), "firstName"), "html", null, true);
            echo " hasn't posted anything yet.
                ";
        } else {
            // line 210
            echo "                    ";
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
                // line 211
                echo "                        ";
                if ($this->getAttribute($this->getContext($context, "post"), "isProfessional")) {
                    // line 212
                    echo "                            ";
                    $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
                    // line 213
                    echo "                        ";
                } else {
                    // line 214
                    echo "                            ";
                    $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
                    // line 215
                    echo "                        ";
                }
                // line 216
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 217
            echo "
                    ";
            // line 218
            if ($this->getContext($context, "scroll")) {
                // line 219
                echo "                    <div>
                        <a href=\"";
                // line 220
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_user_posts_pag", array("id" => $this->getAttribute($this->getContext($context, "profileUser"), "id"), "offset" => 1, "n" => $this->getContext($context, "n"))), "html", null, true);
                echo "\" class=\"navigation\">NEXT</a>
                    </div>
                    ";
            }
            // line 223
            echo "                ";
        }
        // line 224
        echo "            </div>
        </div>
    </div>
</div>
";
    }

    // line 230
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 231
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/jquery.imagesloaded.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
        // line 232
        if (($this->getContext($context, "loggedIn") == true)) {
            // line 233
            echo "    ";
            if ((($this->getAttribute($this->getContext($context, "user"), "id") == $this->getAttribute($this->getContext($context, "profileUser"), "id")) && ($this->getAttribute($this->getContext($context, "user"), "FbId") != null))) {
                // line 234
                echo "        <script type=\"text/javascript\">
            \$.ajax(\"";
                // line 235
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_fb_likes"), "html", null, true);
                echo "\");
        </script>
    ";
            }
        }
        // line 239
        echo "
<script src=\"";
        // line 240
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_comment.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 241
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 242
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
<script src=\"";
        // line 243
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/profile.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
";
    }

    // line 246
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 247
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/profile.css"), "html", null, true);
        echo "?ologyv=11\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"";
        // line 248
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/css/stash.css"), "html", null, true);
        echo "?ologyv=11\" rel=\"stylesheet\" type=\"text/css\">
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  747 => 248,  742 => 247,  739 => 246,  733 => 243,  729 => 242,  725 => 241,  721 => 240,  718 => 239,  711 => 235,  708 => 234,  705 => 233,  703 => 232,  698 => 231,  695 => 230,  687 => 224,  684 => 223,  678 => 220,  675 => 219,  673 => 218,  656 => 216,  653 => 215,  644 => 212,  641 => 211,  617 => 208,  615 => 207,  608 => 203,  597 => 196,  583 => 195,  580 => 194,  563 => 193,  555 => 189,  541 => 188,  538 => 187,  520 => 186,  512 => 181,  505 => 176,  491 => 175,  488 => 174,  457 => 165,  451 => 164,  429 => 150,  425 => 149,  403 => 143,  379 => 133,  372 => 131,  365 => 129,  341 => 120,  313 => 111,  172 => 62,  502 => 177,  494 => 175,  483 => 167,  470 => 161,  465 => 170,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  350 => 113,  295 => 104,  258 => 90,  144 => 39,  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 158,  434 => 154,  432 => 147,  417 => 145,  408 => 144,  404 => 140,  401 => 130,  398 => 138,  389 => 137,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 110,  239 => 82,  231 => 79,  674 => 231,  670 => 217,  665 => 228,  654 => 220,  650 => 214,  647 => 213,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 210,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 190,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 171,  464 => 166,  461 => 141,  458 => 157,  455 => 139,  452 => 160,  450 => 137,  439 => 150,  433 => 131,  431 => 130,  413 => 122,  410 => 134,  406 => 119,  392 => 138,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 89,  244 => 86,  236 => 84,  293 => 99,  246 => 72,  242 => 83,  173 => 64,  354 => 114,  319 => 122,  311 => 97,  303 => 106,  278 => 106,  262 => 101,  198 => 71,  334 => 119,  321 => 101,  308 => 109,  297 => 112,  284 => 87,  267 => 94,  264 => 99,  222 => 87,  201 => 58,  426 => 149,  415 => 146,  412 => 136,  409 => 135,  407 => 133,  400 => 129,  395 => 127,  375 => 132,  361 => 123,  357 => 124,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 92,  271 => 95,  266 => 102,  240 => 111,  230 => 67,  216 => 84,  213 => 80,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 86,  234 => 86,  223 => 80,  348 => 118,  340 => 129,  336 => 107,  332 => 110,  327 => 104,  324 => 108,  318 => 106,  315 => 99,  309 => 109,  304 => 102,  300 => 142,  290 => 102,  287 => 109,  279 => 97,  226 => 66,  149 => 55,  136 => 51,  125 => 41,  115 => 33,  100 => 43,  130 => 44,  251 => 94,  247 => 87,  238 => 70,  194 => 52,  191 => 55,  168 => 50,  128 => 46,  294 => 114,  286 => 101,  283 => 102,  280 => 86,  277 => 85,  268 => 80,  263 => 93,  255 => 89,  243 => 73,  208 => 92,  202 => 73,  199 => 72,  186 => 69,  183 => 75,  181 => 63,  163 => 59,  140 => 53,  170 => 30,  121 => 45,  112 => 35,  118 => 37,  106 => 33,  157 => 46,  232 => 68,  228 => 66,  220 => 79,  210 => 72,  207 => 74,  159 => 59,  151 => 44,  147 => 43,  105 => 37,  85 => 34,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 176,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 165,  476 => 164,  474 => 154,  471 => 173,  469 => 152,  466 => 151,  463 => 150,  453 => 155,  445 => 161,  442 => 145,  438 => 157,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 137,  411 => 145,  405 => 132,  402 => 132,  399 => 131,  396 => 139,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 130,  364 => 116,  358 => 113,  355 => 112,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 106,  330 => 105,  328 => 103,  325 => 103,  323 => 108,  320 => 100,  317 => 112,  307 => 96,  299 => 105,  296 => 100,  292 => 103,  289 => 89,  281 => 107,  275 => 96,  272 => 82,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 74,  248 => 76,  235 => 69,  227 => 79,  218 => 78,  212 => 60,  206 => 60,  197 => 68,  187 => 67,  184 => 55,  182 => 65,  174 => 63,  150 => 49,  119 => 42,  110 => 48,  53 => 7,  91 => 27,  66 => 20,  98 => 24,  96 => 41,  166 => 61,  160 => 41,  154 => 28,  143 => 52,  138 => 42,  101 => 35,  58 => 19,  36 => 4,  65 => 21,  18 => 1,  352 => 119,  347 => 123,  344 => 110,  282 => 96,  276 => 94,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 83,  229 => 84,  225 => 81,  221 => 76,  217 => 81,  214 => 62,  203 => 59,  180 => 50,  175 => 44,  169 => 61,  167 => 62,  164 => 43,  155 => 45,  139 => 50,  114 => 28,  83 => 23,  76 => 20,  72 => 22,  68 => 22,  64 => 15,  56 => 17,  21 => 2,  209 => 75,  205 => 71,  196 => 70,  192 => 58,  189 => 65,  178 => 54,  176 => 61,  165 => 57,  161 => 58,  152 => 51,  148 => 55,  145 => 66,  141 => 53,  134 => 51,  132 => 50,  127 => 38,  123 => 44,  109 => 40,  93 => 28,  90 => 18,  54 => 14,  133 => 47,  124 => 46,  111 => 32,  107 => 28,  80 => 27,  63 => 19,  60 => 14,  69 => 21,  61 => 19,  52 => 15,  50 => 14,  45 => 6,  43 => 10,  34 => 5,  224 => 65,  215 => 77,  211 => 80,  204 => 73,  200 => 69,  195 => 57,  193 => 69,  190 => 68,  188 => 50,  185 => 66,  179 => 50,  177 => 49,  171 => 47,  162 => 48,  158 => 55,  156 => 56,  153 => 39,  146 => 49,  142 => 38,  137 => 46,  131 => 35,  126 => 45,  120 => 22,  117 => 44,  103 => 32,  99 => 22,  74 => 27,  47 => 11,  32 => 6,  39 => 5,  26 => 3,  97 => 30,  95 => 33,  88 => 27,  82 => 33,  78 => 25,  75 => 21,  71 => 19,  22 => 3,  44 => 10,  30 => 11,  20 => 2,  25 => 7,  49 => 9,  42 => 8,  40 => 4,  23 => 5,  27 => 4,  17 => 1,  92 => 21,  86 => 30,  79 => 13,  77 => 15,  57 => 17,  46 => 11,  37 => 6,  33 => 7,  29 => 2,  24 => 3,  19 => 2,  135 => 37,  129 => 39,  122 => 35,  116 => 30,  113 => 39,  108 => 38,  104 => 27,  102 => 26,  94 => 22,  89 => 31,  87 => 19,  84 => 29,  81 => 23,  73 => 24,  70 => 26,  67 => 20,  62 => 20,  59 => 9,  55 => 16,  51 => 12,  48 => 5,  41 => 9,  38 => 8,  35 => 6,  31 => 8,  28 => 3,);
    }
}

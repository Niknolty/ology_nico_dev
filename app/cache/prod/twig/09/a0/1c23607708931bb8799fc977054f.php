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
        return array (  388 => 152,  384 => 151,  269 => 95,  747 => 248,  742 => 247,  739 => 246,  733 => 243,  729 => 242,  725 => 241,  721 => 240,  718 => 239,  711 => 235,  708 => 234,  705 => 233,  703 => 232,  698 => 231,  695 => 230,  687 => 224,  684 => 223,  678 => 220,  675 => 219,  673 => 218,  656 => 216,  653 => 215,  644 => 212,  641 => 211,  617 => 208,  615 => 207,  608 => 203,  597 => 196,  583 => 195,  580 => 194,  563 => 193,  555 => 189,  541 => 188,  538 => 187,  520 => 186,  512 => 181,  505 => 176,  491 => 175,  488 => 174,  457 => 165,  451 => 164,  429 => 150,  425 => 149,  403 => 143,  379 => 133,  372 => 131,  365 => 129,  341 => 120,  313 => 110,  172 => 62,  502 => 177,  494 => 175,  483 => 167,  470 => 161,  465 => 170,  462 => 158,  447 => 153,  444 => 152,  441 => 151,  430 => 146,  424 => 142,  422 => 141,  390 => 125,  374 => 121,  371 => 120,  368 => 119,  362 => 117,  359 => 116,  350 => 113,  295 => 105,  258 => 90,  144 => 39,  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 158,  434 => 154,  432 => 147,  417 => 145,  408 => 144,  404 => 140,  401 => 130,  398 => 138,  389 => 137,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 121,  239 => 82,  231 => 79,  674 => 231,  670 => 217,  665 => 228,  654 => 220,  650 => 214,  647 => 213,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 210,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 190,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 171,  464 => 166,  461 => 141,  458 => 157,  455 => 139,  452 => 160,  450 => 137,  439 => 150,  433 => 131,  431 => 130,  413 => 122,  410 => 134,  406 => 119,  392 => 153,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 93,  244 => 87,  236 => 84,  293 => 99,  246 => 72,  242 => 83,  173 => 64,  354 => 114,  319 => 112,  311 => 109,  303 => 106,  278 => 106,  262 => 101,  198 => 65,  334 => 119,  321 => 101,  308 => 109,  297 => 112,  284 => 87,  267 => 94,  264 => 99,  222 => 76,  201 => 58,  426 => 149,  415 => 146,  412 => 136,  409 => 135,  407 => 133,  400 => 129,  395 => 127,  375 => 132,  361 => 131,  357 => 124,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 106,  271 => 95,  266 => 102,  240 => 85,  230 => 67,  216 => 84,  213 => 72,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 108,  302 => 107,  291 => 103,  261 => 101,  252 => 86,  234 => 86,  223 => 80,  348 => 118,  340 => 129,  336 => 118,  332 => 110,  327 => 104,  324 => 108,  318 => 106,  315 => 99,  309 => 109,  304 => 102,  300 => 142,  290 => 102,  287 => 109,  279 => 97,  226 => 66,  149 => 55,  136 => 51,  125 => 41,  115 => 37,  100 => 43,  130 => 44,  251 => 94,  247 => 87,  238 => 84,  194 => 52,  191 => 55,  168 => 50,  128 => 46,  294 => 114,  286 => 101,  283 => 102,  280 => 86,  277 => 85,  268 => 80,  263 => 94,  255 => 89,  243 => 73,  208 => 92,  202 => 73,  199 => 72,  186 => 69,  183 => 55,  181 => 63,  163 => 52,  140 => 53,  170 => 30,  121 => 45,  112 => 35,  118 => 38,  106 => 33,  157 => 50,  232 => 68,  228 => 79,  220 => 79,  210 => 72,  207 => 69,  159 => 59,  151 => 48,  147 => 43,  105 => 37,  85 => 34,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 176,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 165,  476 => 164,  474 => 154,  471 => 173,  469 => 152,  466 => 151,  463 => 150,  453 => 155,  445 => 161,  442 => 145,  438 => 157,  435 => 148,  427 => 129,  421 => 125,  418 => 138,  416 => 137,  411 => 145,  405 => 132,  402 => 132,  399 => 131,  396 => 154,  394 => 129,  391 => 128,  387 => 125,  381 => 123,  373 => 128,  367 => 130,  364 => 116,  358 => 113,  355 => 127,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 106,  330 => 117,  328 => 103,  325 => 114,  323 => 108,  320 => 100,  317 => 112,  307 => 96,  299 => 105,  296 => 100,  292 => 103,  289 => 89,  281 => 107,  275 => 96,  272 => 82,  270 => 104,  265 => 91,  259 => 94,  256 => 92,  250 => 90,  248 => 76,  235 => 83,  227 => 79,  218 => 78,  212 => 60,  206 => 60,  197 => 68,  187 => 67,  184 => 55,  182 => 65,  174 => 63,  150 => 49,  119 => 42,  110 => 48,  53 => 7,  91 => 27,  66 => 20,  98 => 24,  96 => 26,  166 => 53,  160 => 51,  154 => 49,  143 => 52,  138 => 42,  101 => 30,  58 => 17,  36 => 9,  65 => 14,  18 => 1,  352 => 126,  347 => 123,  344 => 110,  282 => 100,  276 => 99,  274 => 104,  257 => 99,  253 => 91,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 82,  229 => 84,  225 => 81,  221 => 76,  217 => 74,  214 => 62,  203 => 67,  180 => 54,  175 => 44,  169 => 61,  167 => 62,  164 => 43,  155 => 45,  139 => 50,  114 => 28,  83 => 23,  76 => 20,  72 => 17,  68 => 22,  64 => 18,  56 => 17,  21 => 2,  209 => 70,  205 => 71,  196 => 70,  192 => 58,  189 => 65,  178 => 54,  176 => 61,  165 => 57,  161 => 58,  152 => 51,  148 => 55,  145 => 66,  141 => 53,  134 => 47,  132 => 50,  127 => 38,  123 => 44,  109 => 40,  93 => 28,  90 => 23,  54 => 12,  133 => 47,  124 => 46,  111 => 32,  107 => 28,  80 => 27,  63 => 19,  60 => 14,  69 => 21,  61 => 13,  52 => 11,  50 => 14,  45 => 11,  43 => 10,  34 => 3,  224 => 65,  215 => 77,  211 => 80,  204 => 73,  200 => 66,  195 => 57,  193 => 69,  190 => 59,  188 => 50,  185 => 66,  179 => 50,  177 => 49,  171 => 47,  162 => 48,  158 => 55,  156 => 56,  153 => 39,  146 => 49,  142 => 38,  137 => 46,  131 => 35,  126 => 41,  120 => 22,  117 => 44,  103 => 32,  99 => 28,  74 => 27,  47 => 15,  32 => 6,  39 => 5,  26 => 3,  97 => 30,  95 => 33,  88 => 27,  82 => 33,  78 => 19,  75 => 19,  71 => 17,  22 => 3,  44 => 7,  30 => 8,  20 => 2,  25 => 5,  49 => 9,  42 => 6,  40 => 4,  23 => 4,  27 => 5,  17 => 1,  92 => 21,  86 => 30,  79 => 13,  77 => 15,  57 => 12,  46 => 11,  37 => 4,  33 => 7,  29 => 6,  24 => 3,  19 => 2,  135 => 37,  129 => 39,  122 => 35,  116 => 30,  113 => 36,  108 => 33,  104 => 31,  102 => 26,  94 => 25,  89 => 31,  87 => 19,  84 => 21,  81 => 20,  73 => 24,  70 => 16,  67 => 20,  62 => 20,  59 => 13,  55 => 16,  51 => 11,  48 => 9,  41 => 10,  38 => 8,  35 => 6,  31 => 8,  28 => 2,);
    }
}

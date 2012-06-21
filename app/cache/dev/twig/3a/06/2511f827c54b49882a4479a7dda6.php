<?php

/* OlogySocialBundle:FrontEnd:channel.html.twig */
class __TwigTemplate_3a062511f827c54b49882a4479a7dda6 extends Twig_Template
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "channel"), "name"), "html", null, true);
        echo " | Ology";
    }

    // line 5
    public function block_page_header($context, array $blocks = array())
    {
        // line 6
        echo "<meta name=\"title\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "channel"), "name"), "html", null, true);
        echo "\" />
<meta name=\"keywords\" content=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "channel"), "name"), "html", null, true);
        echo "\" />
<meta name=\"description\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "channel"), "name"), "html", null, true);
        echo "\" />
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user")))) {
            // line 13
            echo "<div id='page'>
    ";
            // line 14
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:dock.html.twig")->display($context);
            // line 15
            echo "</div>
";
        }
        // line 17
        echo "
<div id=\"container-channel\">
    ";
        // line 19
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display($context);
        // line 20
        echo "    ";
        $this->env->loadTemplate("OlogySocialBundle:FrontEnd:almost-register-prompt.html.twig")->display($context);
        // line 21
        echo "    <div id=\"post-ologist\">
        <div id=\"ology-image\">
            <img src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("bundles/ologysocial/img/channels/" . $this->getAttribute($this->getContext($context, "channel"), "imageLogo"))), "html", null, true);
        echo "\" height=\"100\" width=\"100\"/>
        </div>

        <div id=\"channel-desc\">
            <span class=\"channel-title\">";
        // line 27
        echo $this->getAttribute($this->getContext($context, "channel"), "imageTitle");
        echo "</span>
            <div>
                ";
        // line 29
        if (twig_test_empty($this->getAttribute($this->getContext($context, "app"), "user"))) {
            echo "    
                    <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_remember_core_ology_offline", array("id" => $this->getAttribute($this->getContext($context, "channel"), "id"))), "html", null, true);
            echo "\" class=\"sign follow\"></a>
                    ";
            // line 31
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:register-prompt.html.twig")->display(array_merge($context, array("prompt_action" => "3")));
            // line 32
            echo "                ";
        } elseif ((array_key_exists("isSubscribed", $context) && ($this->getContext($context, "isSubscribed") == true))) {
            // line 33
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel_unsubscription", array("channelId" => $this->getAttribute($this->getContext($context, "channel"), "id"))), "html", null, true);
            echo "\" class=\"unfollow\"></a>
                ";
        } else {
            // line 35
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel_subscription", array("channelId" => $this->getAttribute($this->getContext($context, "channel"), "id"))), "html", null, true);
            echo "\" class=\"follow\"></a>
                ";
        }
        // line 37
        echo "            </div>
        </div>
            
        ";
        // line 40
        if ($this->getAttribute($this->getContext($context, "channel"), "ad0")) {
            // line 41
            echo "            <div id=\"ad-zero\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad0");
            echo "</div>
        ";
        }
        // line 43
        echo "    </div>
    
    ";
        // line 45
        if ($this->getAttribute($this->getContext($context, "channel"), "ad1")) {
            // line 46
            echo "    <div id=\"ad-one\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad1");
            echo "</div>
    ";
        }
        // line 48
        echo "    ";
        if ($this->getAttribute($this->getContext($context, "channel"), "ad6")) {
            // line 49
            echo "        <div id=\"ad-six\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad6");
            echo "</div>
    ";
        }
        // line 51
        echo "        
    <div id=\"channel-box\">
        <div id=\"channel-left\">
            <div id=\"channel-featured-slideshow\">
                ";
        // line 55
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost1")) {
            // line 56
            echo "                ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "imageUrl")));
            // line 57
            echo "                <div id=\"channel-featured-post1\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\">
                        <a href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "slug"))), "html", null, true);
            echo "\" class=\"channel-featured-overlay\">";
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "htmlTitle");
            echo "</a>
                </div>
                ";
        }
        // line 61
        echo "
                ";
        // line 62
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost2")) {
            // line 63
            echo "                ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "imageUrl")));
            // line 64
            echo "                <div id=\"channel-featured-post2\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\">
                        <a href=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "slug"))), "html", null, true);
            echo "\" class=\"channel-featured-overlay\">";
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "htmlTitle");
            echo "</a>
                </div>
                ";
        }
        // line 68
        echo "
                ";
        // line 69
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost3")) {
            // line 70
            echo "                ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "imageUrl")));
            // line 71
            echo "                <div id=\"channel-featured-post3\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\">
                        <a href=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "slug"))), "html", null, true);
            echo "\" class=\"channel-featured-overlay\">";
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "htmlTitle");
            echo "</a>
                </div>
                ";
        }
        // line 75
        echo "
                ";
        // line 76
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost4")) {
            // line 77
            echo "                ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "imageUrl")));
            // line 78
            echo "                <div id=\"channel-featured-post4\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\">
                        <a href=\"";
            // line 79
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "slug"))), "html", null, true);
            echo "\" class=\"channel-featured-overlay\">";
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "htmlTitle");
            echo "</a>
                </div>
                ";
        }
        // line 82
        echo "
                ";
        // line 83
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost5")) {
            // line 84
            echo "                ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "imageUrl")));
            // line 85
            echo "                <div id=\"channel-featured-post5\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_large_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\">
                        <a href=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "slug"))), "html", null, true);
            echo "\" class=\"channel-featured-overlay\">";
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "htmlTitle");
            echo "</a>
                </div>
                ";
        }
        // line 89
        echo "                <div id=\"channel-featured-menu\">
                        ";
        // line 90
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost1")) {
            // line 91
            echo "                        ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "imageUrl")));
            // line 92
            echo "                                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost1"), "slug"))), "html", null, true);
            echo "\" id=\"channel-featured-thumb1\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\"></a>
                        ";
        }
        // line 94
        echo "                        ";
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost2")) {
            // line 95
            echo "                        ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "imageUrl")));
            // line 96
            echo "                                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost2"), "slug"))), "html", null, true);
            echo "\" id=\"channel-featured-thumb2\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\"></a>
                        ";
        }
        // line 98
        echo "                        ";
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost3")) {
            // line 99
            echo "                        ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "imageUrl")));
            // line 100
            echo "                                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost3"), "slug"))), "html", null, true);
            echo "\" id=\"channel-featured-thumb3\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\"></a>
                        ";
        }
        // line 102
        echo "                        ";
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost4")) {
            // line 103
            echo "                        ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "imageUrl")));
            // line 104
            echo "                                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost4"), "slug"))), "html", null, true);
            echo "\" id=\"channel-featured-thumb4\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\"></a>
                        ";
        }
        // line 106
        echo "                        ";
        if ($this->getAttribute($this->getContext($context, "channel"), "featuredPost5")) {
            // line 107
            echo "                        ";
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "image1Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "image1Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "imageUrl")));
            // line 108
            echo "                                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "featuredPost5"), "slug"))), "html", null, true);
            echo "\" id=\"channel-featured-thumb5\" style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getContext($context, "imagePath"))), "html", null, true);
            echo "');\"></a>
                        ";
        }
        // line 110
        echo "                </div>
            </div>
                
            <div id=\"featured-posts\">
                <h2>";
        // line 114
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "channel"), "specialTitle"), "html", null, true);
        echo "</h2>
                
                ";
        // line 116
        if ($this->getAttribute($this->getContext($context, "channel"), "specialPost1")) {
            // line 117
            echo "                <div class=\"featured-posts-item\">
                    <a href=\"";
            // line 118
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost1"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost1"), "slug"))), "html", null, true);
            echo "\">
                        ";
            // line 119
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost1"), "image2Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost1"), "image2Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost1"), "imageUrl")));
            // line 120
            echo "                        ";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getContext($context, "imagePath"))));
            echo "
                    </a>
                    <div class=\"extra-buzz-overlay\">
                        <a href=\"";
            // line 123
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost1"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost1"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost1"), "htmlTitle");
            echo "</a>
                    </div>
                </div>
                ";
        }
        // line 127
        echo "                ";
        if ($this->getAttribute($this->getContext($context, "channel"), "specialPost2")) {
            // line 128
            echo "                <div class=\"featured-posts-item\">
                    <a href=\"";
            // line 129
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost2"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost2"), "slug"))), "html", null, true);
            echo "\">
                        ";
            // line 130
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost2"), "image2Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost2"), "image2Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost2"), "imageUrl")));
            // line 131
            echo "                        ";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getContext($context, "imagePath"))));
            echo "
                    </a>
                    <div class=\"extra-buzz-overlay\">
                        <a href=\"";
            // line 134
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost2"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost2"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost2"), "htmlTitle");
            echo "</a>
                    </div>
                </div>
                ";
        }
        // line 138
        echo "                ";
        if ($this->getAttribute($this->getContext($context, "channel"), "specialPost3")) {
            // line 139
            echo "                <div class=\"featured-posts-item-right\">
                    <a href=\"";
            // line 140
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost3"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost3"), "slug"))), "html", null, true);
            echo "\">
                        ";
            // line 141
            $context["imagePath"] = (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost3"), "image2Url")))) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost3"), "image2Url")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost3"), "imageUrl")));
            // line 142
            echo "                        ";
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getContext($context, "imagePath"))));
            echo "
                    </a>
                    <div class=\"extra-buzz-overlay\">
                        <a href=\"";
            // line 145
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost3"), "id"), "slug" => $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost3"), "slug"))), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getAttribute($this->getContext($context, "channel"), "specialPost3"), "htmlTitle");
            echo "</a>
                    </div>
                </div>
                ";
        }
        // line 149
        echo "            </div>
        </div>

        <div id=\"channel-right\">
            ";
        // line 153
        if ($this->getAttribute($this->getContext($context, "channel"), "ad2")) {
            // line 154
            echo "                <div id=\"ad-two\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad2");
            echo "</div>
            ";
        }
        // line 156
        echo "            ";
        if ($this->getAttribute($this->getContext($context, "channel"), "video")) {
            // line 157
            echo "                <div id=\"ad-video\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "video");
            echo "</div>
            ";
        }
        // line 159
        echo "            ";
        if ($this->getAttribute($this->getContext($context, "channel"), "ad3")) {
            // line 160
            echo "\t\t<div id=\"ad-three\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad3");
            echo "</div>
            ";
        }
        // line 162
        echo "        </div>
    </div>
\t
    <div id=\"channel-posts\">
            ";
        // line 166
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
            // line 167
            echo "                    ";
            if ($this->getAttribute($this->getContext($context, "post"), "isProfessional")) {
                // line 168
                echo "                            ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
                // line 169
                echo "                    ";
            } else {
                // line 170
                echo "                            ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
                // line 171
                echo "                    ";
            }
            // line 172
            echo "            ";
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
        // line 173
        echo "    </div>
</div>
";
        // line 175
        if ($this->getAttribute($this->getContext($context, "channel"), "ad4")) {
            // line 176
            echo "    <div id=\"ad-four\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad4");
            echo "</div>
";
        }
        // line 178
        if ($this->getAttribute($this->getContext($context, "channel"), "ad5")) {
            // line 179
            echo "    <div id=\"ad-five\">";
            echo $this->getAttribute($this->getContext($context, "channel"), "ad5");
            echo "</div>
";
        }
        // line 181
        echo "
<div>
  <a href=\"";
        // line 183
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_channel_pag", array("stub" => $this->getContext($context, "stub"), "offset" => 1, "n" => $this->getContext($context, "n"))), "html", null, true);
        echo "\" class=\"navigation\">NEXT</a>
</div>

";
    }

    // line 188
    public function block_pagescripts($context, array $blocks = array())
    {
        // line 189
        echo "    <script type=\"text/javascript\">
    \$(\"#channel-featured-post1\").click(function(){
        window.location=\$(this).find(\"a\").attr(\"href\");
        return false;
    });
    \$(\"#channel-featured-post2\").click(function(){
        window.location=\$(this).find(\"a\").attr(\"href\");
        return false;
    });
    \$(\"#channel-featured-post3\").click(function(){
        window.location=\$(this).find(\"a\").attr(\"href\");
        return false;
    });
    \$(\"#channel-featured-post4\").click(function(){
        window.location=\$(this).find(\"a\").attr(\"href\");
        return false;
    });
    \$(\"#channel-featured-post5\").click(function(){
        window.location=\$(this).find(\"a\").attr(\"href\");
        return false;
    });

    \$(window).scroll(function(){

    var load = \"<div class='loading'><img src='";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/ajax-loader.gif"), "html", null, true);
        echo "' />Loading More</div>\";
    var end = \"<div id='end'>You've reached the end of the internets<div>\";
    
    if  (\$(window).scrollTop() == \$(document).height() - \$(window).height()){
        if (\$(\".navigation\").length) {
            \$(load).appendTo(\"body\").css(\"display\",\"block\");
            \$.get( \$(\".navigation\").attr(\"href\"), function(data) { 
                \$(\".navigation\").remove();
                \$('#channel-posts').append( data );
                \$('#channel-posts').linkify( function (links){ links.attr('target', '_blank'); } );
                \$(\"abbr.timeago\").timeago();
                \$('#channel-posts').masonry('reload');
            });
            \$(\".loading\").delay(900).fadeOut();
        } else {
            \$(\".loading\").delay(900).fadeOut(); 
            \$(end).appendTo(\"body\").css(\"display\",\"block\").hide().fadeIn().delay(800).fadeOut();

        }
    }

});

    </script>
  <script src=\"";
        // line 237
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/likes_display.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 238
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/js/offline_likes.js"), "html", null, true);
        echo "?ologyv=11\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:channel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  602 => 238,  598 => 237,  571 => 213,  545 => 189,  542 => 188,  534 => 183,  530 => 181,  524 => 179,  522 => 178,  516 => 176,  514 => 175,  510 => 173,  496 => 172,  493 => 171,  490 => 170,  487 => 169,  484 => 168,  481 => 167,  464 => 166,  458 => 162,  452 => 160,  449 => 159,  443 => 157,  440 => 156,  434 => 154,  432 => 153,  426 => 149,  417 => 145,  410 => 142,  408 => 141,  404 => 140,  401 => 139,  398 => 138,  389 => 134,  382 => 131,  380 => 130,  376 => 129,  373 => 128,  370 => 127,  361 => 123,  354 => 120,  352 => 119,  348 => 118,  345 => 117,  343 => 116,  338 => 114,  332 => 110,  324 => 108,  321 => 107,  318 => 106,  310 => 104,  307 => 103,  304 => 102,  296 => 100,  293 => 99,  290 => 98,  282 => 96,  279 => 95,  276 => 94,  268 => 92,  265 => 91,  263 => 90,  260 => 89,  252 => 86,  247 => 85,  244 => 84,  242 => 83,  239 => 82,  231 => 79,  226 => 78,  223 => 77,  221 => 76,  218 => 75,  210 => 72,  205 => 71,  202 => 70,  200 => 69,  197 => 68,  189 => 65,  184 => 64,  181 => 63,  179 => 62,  176 => 61,  168 => 58,  163 => 57,  160 => 56,  158 => 55,  152 => 51,  146 => 49,  143 => 48,  137 => 46,  135 => 45,  131 => 43,  125 => 41,  123 => 40,  118 => 37,  112 => 35,  106 => 33,  103 => 32,  101 => 31,  97 => 30,  93 => 29,  88 => 27,  81 => 23,  77 => 21,  74 => 20,  72 => 19,  68 => 17,  64 => 15,  62 => 14,  59 => 13,  57 => 12,  54 => 11,  48 => 8,  44 => 7,  39 => 6,  36 => 5,  29 => 3,);
    }
}

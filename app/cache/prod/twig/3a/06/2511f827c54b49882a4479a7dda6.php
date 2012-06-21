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
        return array (  598 => 237,  571 => 213,  542 => 188,  530 => 181,  522 => 178,  516 => 176,  514 => 175,  487 => 169,  449 => 159,  443 => 157,  440 => 156,  434 => 154,  432 => 153,  417 => 145,  408 => 141,  404 => 140,  401 => 139,  398 => 138,  389 => 134,  382 => 131,  380 => 130,  376 => 129,  370 => 127,  345 => 117,  239 => 82,  231 => 79,  674 => 231,  670 => 230,  665 => 228,  654 => 220,  650 => 218,  647 => 217,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 206,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 238,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 182,  552 => 178,  550 => 177,  545 => 189,  539 => 171,  536 => 170,  534 => 183,  528 => 166,  524 => 179,  496 => 172,  493 => 171,  490 => 170,  481 => 167,  472 => 146,  467 => 143,  464 => 166,  461 => 141,  458 => 162,  455 => 139,  452 => 160,  450 => 137,  439 => 133,  433 => 131,  431 => 130,  413 => 122,  410 => 142,  406 => 119,  392 => 118,  360 => 114,  342 => 109,  337 => 107,  273 => 83,  260 => 89,  244 => 84,  236 => 69,  293 => 99,  246 => 72,  242 => 83,  173 => 64,  354 => 120,  319 => 122,  311 => 97,  303 => 115,  278 => 106,  262 => 101,  198 => 54,  334 => 119,  321 => 107,  308 => 109,  297 => 112,  284 => 101,  267 => 100,  264 => 99,  222 => 93,  201 => 79,  426 => 149,  415 => 123,  412 => 136,  409 => 135,  407 => 134,  400 => 129,  395 => 127,  375 => 121,  361 => 123,  357 => 160,  353 => 113,  326 => 102,  314 => 98,  312 => 98,  301 => 92,  298 => 91,  271 => 82,  266 => 102,  240 => 111,  230 => 67,  216 => 62,  213 => 61,  339 => 108,  329 => 157,  316 => 149,  310 => 104,  305 => 144,  302 => 116,  291 => 104,  261 => 101,  252 => 86,  234 => 86,  223 => 77,  348 => 118,  340 => 129,  336 => 128,  332 => 110,  327 => 126,  324 => 108,  318 => 106,  315 => 124,  309 => 96,  304 => 102,  300 => 142,  290 => 98,  287 => 109,  279 => 95,  226 => 78,  149 => 68,  136 => 49,  125 => 41,  115 => 46,  100 => 40,  130 => 44,  251 => 94,  247 => 85,  238 => 70,  194 => 52,  191 => 70,  168 => 58,  128 => 49,  294 => 114,  286 => 107,  283 => 102,  280 => 101,  277 => 85,  268 => 92,  263 => 90,  255 => 76,  243 => 80,  208 => 92,  202 => 70,  199 => 71,  186 => 69,  183 => 75,  181 => 63,  163 => 57,  140 => 53,  170 => 30,  121 => 46,  112 => 35,  118 => 37,  106 => 33,  157 => 58,  232 => 109,  228 => 66,  220 => 63,  210 => 72,  207 => 61,  159 => 45,  151 => 27,  147 => 55,  105 => 25,  85 => 16,  537 => 172,  533 => 170,  527 => 169,  519 => 167,  513 => 159,  510 => 173,  504 => 157,  501 => 162,  498 => 161,  495 => 160,  492 => 159,  489 => 158,  484 => 168,  479 => 148,  476 => 147,  474 => 154,  471 => 153,  469 => 152,  466 => 151,  463 => 150,  453 => 148,  445 => 134,  442 => 145,  438 => 143,  435 => 142,  427 => 129,  421 => 125,  418 => 138,  416 => 136,  411 => 135,  405 => 133,  402 => 132,  399 => 131,  396 => 130,  394 => 129,  391 => 128,  387 => 125,  381 => 117,  373 => 128,  367 => 119,  364 => 116,  358 => 113,  355 => 112,  349 => 112,  346 => 132,  343 => 116,  338 => 114,  333 => 131,  330 => 104,  328 => 103,  325 => 102,  323 => 108,  320 => 100,  317 => 112,  307 => 103,  299 => 95,  296 => 100,  292 => 99,  289 => 92,  281 => 107,  275 => 104,  272 => 103,  270 => 104,  265 => 91,  259 => 94,  256 => 88,  250 => 74,  248 => 85,  235 => 68,  227 => 79,  218 => 75,  212 => 60,  206 => 78,  197 => 68,  187 => 74,  184 => 64,  182 => 67,  174 => 64,  150 => 49,  119 => 45,  110 => 48,  53 => 8,  91 => 39,  66 => 10,  98 => 37,  96 => 41,  166 => 61,  160 => 56,  154 => 28,  143 => 48,  138 => 46,  101 => 31,  58 => 19,  36 => 5,  65 => 22,  18 => 1,  352 => 119,  347 => 160,  344 => 110,  282 => 96,  276 => 94,  274 => 104,  257 => 99,  253 => 98,  249 => 96,  245 => 93,  241 => 71,  237 => 91,  233 => 68,  229 => 84,  225 => 65,  221 => 76,  217 => 81,  214 => 84,  203 => 71,  180 => 50,  175 => 44,  169 => 59,  167 => 61,  164 => 67,  155 => 40,  139 => 62,  114 => 28,  83 => 15,  76 => 20,  72 => 19,  68 => 17,  64 => 15,  56 => 7,  21 => 2,  209 => 59,  205 => 71,  196 => 71,  192 => 51,  189 => 65,  178 => 69,  176 => 61,  165 => 57,  161 => 59,  152 => 51,  148 => 54,  145 => 66,  141 => 58,  134 => 51,  132 => 24,  127 => 53,  123 => 40,  109 => 40,  93 => 29,  90 => 18,  54 => 11,  133 => 48,  124 => 33,  111 => 37,  107 => 47,  80 => 27,  63 => 9,  60 => 17,  69 => 21,  61 => 9,  52 => 10,  50 => 16,  45 => 6,  43 => 10,  34 => 5,  224 => 65,  215 => 61,  211 => 80,  204 => 57,  200 => 69,  195 => 68,  193 => 67,  190 => 68,  188 => 50,  185 => 67,  179 => 62,  177 => 32,  171 => 42,  162 => 59,  158 => 55,  156 => 57,  153 => 39,  146 => 49,  142 => 36,  137 => 46,  131 => 43,  126 => 34,  120 => 22,  117 => 29,  103 => 32,  99 => 22,  74 => 20,  47 => 11,  32 => 3,  39 => 6,  26 => 3,  97 => 30,  95 => 20,  88 => 27,  82 => 33,  78 => 26,  75 => 12,  71 => 11,  22 => 3,  44 => 7,  30 => 11,  20 => 2,  25 => 7,  49 => 9,  42 => 10,  40 => 4,  23 => 5,  27 => 5,  17 => 1,  92 => 34,  86 => 16,  79 => 13,  77 => 21,  57 => 12,  46 => 11,  37 => 8,  33 => 7,  29 => 3,  24 => 2,  19 => 2,  135 => 45,  129 => 35,  122 => 42,  116 => 30,  113 => 49,  108 => 26,  104 => 35,  102 => 18,  94 => 40,  89 => 30,  87 => 35,  84 => 34,  81 => 23,  73 => 24,  70 => 26,  67 => 13,  62 => 14,  59 => 13,  55 => 8,  51 => 14,  48 => 8,  41 => 5,  38 => 17,  35 => 6,  31 => 8,  28 => 6,);
    }
}

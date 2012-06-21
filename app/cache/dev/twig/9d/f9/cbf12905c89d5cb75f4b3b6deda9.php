<?php

/* OlogySocialBundle:FrontEnd:most_viewed_post.html.twig */
class __TwigTemplate_9df9cbf12905c89d5cb75f4b3b6deda9 extends Twig_Template
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
        echo "<div id=\"most-viewed-container\">
    <h2>Most Viewed in News:</h2>
    ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "mostViewedPosts"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["mostViewedPost"]) {
            // line 4
            echo "    <div class=\"most-viewed-item\">
        <div class=\"most-viewed-item-number\">";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo ".</div>
        <div class=\"most-viewed-item-image\"><img src=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "post_small_image_path") . $this->getAttribute($this->getContext($context, "mostViewedPost"), "imageUrl"))), "html", null, true);
            echo "\" height=\"60\" width=\"60\"/></div>
        <div class=\"most-viewed-item-text\"><a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "mostViewedPost"), "id"), "slug" => $this->getAttribute($this->getContext($context, "mostViewedPost"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "mostViewedPost"), "htmlTitle"), "html", null, true);
            echo "</a>
            ";
            // line 8
            if (($this->getAttribute($this->getContext($context, "mostViewedPost"), "timesCommented") > 0)) {
                // line 9
                echo "                 <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_post", array("postId" => $this->getAttribute($this->getContext($context, "mostViewedPost"), "id"), "slug" => $this->getAttribute($this->getContext($context, "mostViewedPost"), "slug"))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/comment.png"), "html", null, true);
                echo "\" style=\"vertical-align: text-top; margin-left: 5px;\"/> (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "mostViewedPost"), "timesCommented"), "html", null, true);
                echo ")</a>
            ";
            }
            // line 11
            echo "        </div>
    </div><div style=\"clear:both;\"></div>
    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mostViewedPost'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "        
    <div style=\"clear:both;\"></div>
</div>

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:most_viewed_post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 14,  67 => 11,  57 => 9,  55 => 8,  49 => 7,  45 => 6,  41 => 5,  38 => 4,  21 => 3,  17 => 1,  674 => 231,  670 => 230,  665 => 228,  654 => 220,  650 => 218,  647 => 217,  639 => 214,  637 => 213,  631 => 211,  629 => 210,  623 => 206,  620 => 205,  614 => 203,  611 => 202,  605 => 200,  602 => 199,  599 => 198,  596 => 197,  592 => 195,  587 => 193,  581 => 191,  578 => 190,  575 => 189,  573 => 188,  569 => 186,  566 => 185,  560 => 183,  558 => 182,  552 => 178,  550 => 177,  545 => 174,  539 => 171,  536 => 170,  534 => 169,  528 => 166,  524 => 164,  513 => 159,  504 => 157,  496 => 154,  493 => 153,  490 => 152,  484 => 150,  481 => 149,  479 => 148,  476 => 147,  472 => 146,  467 => 143,  464 => 142,  461 => 141,  458 => 140,  455 => 139,  452 => 138,  450 => 137,  445 => 134,  439 => 133,  433 => 131,  431 => 130,  427 => 129,  421 => 125,  415 => 123,  413 => 122,  410 => 121,  406 => 119,  392 => 118,  381 => 117,  364 => 116,  360 => 114,  358 => 113,  355 => 112,  342 => 109,  339 => 108,  337 => 107,  332 => 105,  328 => 103,  325 => 102,  320 => 100,  314 => 98,  311 => 97,  309 => 96,  299 => 95,  289 => 92,  282 => 88,  277 => 85,  273 => 83,  268 => 81,  265 => 80,  263 => 79,  260 => 78,  255 => 76,  252 => 75,  250 => 74,  246 => 72,  241 => 71,  238 => 70,  236 => 69,  233 => 68,  228 => 66,  225 => 65,  223 => 64,  220 => 63,  215 => 61,  212 => 60,  209 => 59,  204 => 57,  200 => 55,  198 => 54,  194 => 52,  192 => 51,  188 => 50,  181 => 48,  175 => 44,  171 => 42,  155 => 40,  153 => 39,  146 => 38,  142 => 36,  126 => 34,  124 => 33,  117 => 29,  114 => 28,  108 => 26,  105 => 25,  103 => 24,  99 => 22,  95 => 20,  93 => 19,  90 => 18,  88 => 17,  85 => 16,  79 => 13,  75 => 12,  71 => 11,  66 => 10,  63 => 9,  56 => 7,  48 => 5,  40 => 4,  32 => 3,);
    }
}

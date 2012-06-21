<?php

/* OlogySocialBundle:Post:list_recent.html.twig */
class __TwigTemplate_ee4e764df7fbc8a021bbd43b5c32973d extends Twig_Template
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
        echo "<div class=\"post\">
  <h2><a href=\"/ology/52\">Ology Media</a></h2>
  <div class=\"user-img\">
    <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_register"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/ology_favicon.png"), "html", null, true);
        echo "\" width=\"30\" height=\"40\" class=\"user-pic\"></a>
  </div>
  <h3><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_register"), "html", null, true);
        echo "\">Like what you see?</a></h3>
  <div class=\"small\">posted by <a href=\"/ology/52\">the My.Ology Team</a></div>

  <p><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_register"), "html", null, true);
        echo "\">
  Sign up with our easy Facebook registration and get even more.
  Post, follow, and create content all about the things you love.
  Click here to get started.</a></p>

  <center>
  <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_register"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ologysocial/img/ology-logo.png"), "html", null, true);
        echo "\"></a>
  </center>

</div>

";
        // line 20
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
            // line 21
            if ($this->getAttribute($this->getContext($context, "post"), "isProfessional")) {
                // line 22
                echo "    ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:pro_post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
            } else {
                // line 24
                echo "    ";
                $this->env->loadTemplate("OlogySocialBundle:FrontEnd:post_card.html.twig")->display(array_merge($context, array("post" => $this->getContext($context, "post"))));
            }
            // line 25
            echo "    
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 27
        echo "
    ";
        // line 28
        if (array_key_exists("scroll", $context)) {
            // line 29
            echo "      ";
            if (($this->getContext($context, "nextPage") <= 15)) {
                // line 30
                echo "        <div>
            <a href=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_post_recent", array("offset" => $this->getContext($context, "nextPage"), "n" => $this->getContext($context, "n"))), "html", null, true);
                echo "\" id=\"next\" class=\"navigation\" >NEXT</a>
        </div>
      ";
            }
            // line 34
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:list_recent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 10,  98 => 26,  96 => 27,  166 => 49,  160 => 47,  154 => 45,  143 => 41,  138 => 39,  101 => 29,  58 => 14,  36 => 8,  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 22,  72 => 12,  68 => 15,  64 => 9,  56 => 18,  21 => 3,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 43,  145 => 56,  141 => 40,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 47,  90 => 22,  54 => 20,  133 => 44,  124 => 41,  111 => 31,  107 => 31,  80 => 27,  63 => 29,  60 => 19,  69 => 11,  61 => 8,  52 => 21,  50 => 13,  45 => 12,  43 => 5,  34 => 2,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 42,  142 => 54,  137 => 51,  131 => 48,  126 => 49,  120 => 35,  117 => 41,  103 => 36,  99 => 28,  74 => 23,  47 => 17,  32 => 4,  39 => 9,  26 => 3,  97 => 26,  95 => 48,  88 => 29,  82 => 27,  78 => 18,  75 => 24,  71 => 21,  22 => 4,  44 => 15,  30 => 4,  20 => 2,  25 => 3,  49 => 7,  42 => 5,  40 => 4,  23 => 4,  27 => 4,  17 => 1,  92 => 23,  86 => 25,  79 => 39,  77 => 24,  57 => 10,  46 => 6,  37 => 3,  33 => 6,  29 => 6,  24 => 3,  19 => 2,  135 => 50,  129 => 47,  122 => 36,  116 => 42,  113 => 34,  108 => 40,  104 => 30,  102 => 51,  94 => 33,  89 => 26,  87 => 44,  84 => 20,  81 => 25,  73 => 22,  70 => 20,  67 => 10,  62 => 24,  59 => 8,  55 => 9,  51 => 13,  48 => 10,  41 => 9,  38 => 9,  35 => 9,  31 => 4,  28 => 4,);
    }
}

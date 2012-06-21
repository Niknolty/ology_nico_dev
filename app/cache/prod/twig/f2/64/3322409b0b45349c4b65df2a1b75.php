<?php

/* OlogySocialBundle:Post:list_explore.html.twig */
class __TwigTemplate_f2643322409b0b45349c4b65df2a1b75 extends Twig_Template
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
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "ologies"));
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
            // line 2
            echo "      <div class=\"post\">
        <div class=\"post-content\">
          <div class=\"post-cat-info\">
            <a href=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\">
              ";
            // line 6
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "ology_medium_image_path") . $this->getAttribute($this->getContext($context, "ology"), "imageUrl"))));
            echo "
            </a>
            <h2><a href=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_ology", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"), "slug" => $this->getAttribute($this->getContext($context, "ology"), "slug"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "name"), "html", null, true);
            echo "</a></h2>
            ";
            // line 9
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "ologylabels")) > 0)) {
                // line 10
                echo "               <span class=\"category-small\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "ologylabels"), 0, array(), "array"), "label"), "name"), "html", null, true);
                echo "</span>
            ";
            }
            // line 12
            echo "          </div>

        ";
            // line 14
            if ($this->getContext($context, "loggedIn")) {
                // line 15
                echo "          ";
                if ($this->getAttribute($this->getContext($context, "memberships", true), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array", true, true)) {
                    // line 16
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_leave", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                    echo "\" class=\"unfollow\"></a>
          ";
                } else {
                    // line 18
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_ology_join", array("id" => $this->getAttribute($this->getContext($context, "ology"), "id"))), "html", null, true);
                    echo "\" class=\"follow\"></a>
          ";
                }
                // line 20
                echo "        ";
            }
            // line 21
            echo "          <div class=\"explore-description\">
            ";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "ology"), "description"), "html", null, true);
            echo "
          </div>

          <div class=\"founder-section\">
          <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"))), "html", null, true);
            echo "\">
            ";
            // line 27
            echo $this->env->getExtension('estrisa_twig_image_tag.extension')->renderTag($this->env->getExtension('assets')->getAssetUrl(($this->getContext($context, "user_medium_image_path") . $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "imageUrl"))));
            echo "
          </a>
            Founded by<br /> 
            <h3><a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_profile", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "id"))), "html", null, true);
            echo "\">
              ";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "firstname"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "ology"), "founder"), "lastname"), "html", null, true);
            echo "
            </a></h3>
          </div> 

          ";
            // line 35
            $this->env->loadTemplate("OlogySocialBundle:FrontEnd:ology_stats.html.twig")->display(array_merge($context, array("stats" => $this->getAttribute($this->getContext($context, "statss"), $this->getAttribute($this->getContext($context, "ology"), "id"), array(), "array"))));
            // line 36
            echo "      </div>
      </div>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ology'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 39
        echo "
    ";
        // line 40
        if ($this->getContext($context, "scroll")) {
            // line 41
            echo "        <div>
            ";
            // line 42
            if (($this->getContext($context, "type") == "labels")) {
                // line 43
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore_pag", array("offset" => $this->getContext($context, "nextPage"), "n" => $this->getContext($context, "n"), "labels" => $this->getContext($context, "labels"))), "html", null, true);
                echo "\" id=\"next\" class=\"navigation\">NEXT</a>
            ";
            } elseif (($this->getContext($context, "type") == "recent")) {
                // line 45
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore_recent_pag", array("offset" => $this->getContext($context, "nextPage"), "n" => $this->getContext($context, "n"))), "html", null, true);
                echo "\" id=\"next\" class=\"navigation\">NEXT</a>
            ";
            } elseif (($this->getContext($context, "type") == "you")) {
                // line 47
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_website_explore_you_pag", array("offset" => $this->getContext($context, "nextPage"), "n" => $this->getContext($context, "n"))), "html", null, true);
                echo "\" id=\"next\" class=\"navigation\">NEXT</a>
            ";
            }
            // line 49
            echo "        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:Post:list_explore.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 49,  160 => 47,  154 => 45,  143 => 41,  138 => 39,  101 => 27,  58 => 14,  36 => 5,  65 => 20,  18 => 1,  352 => 161,  347 => 160,  344 => 159,  282 => 99,  276 => 97,  274 => 96,  257 => 82,  253 => 81,  249 => 80,  245 => 79,  241 => 78,  237 => 77,  233 => 76,  229 => 75,  225 => 74,  221 => 73,  217 => 71,  214 => 70,  203 => 42,  180 => 22,  175 => 8,  169 => 163,  167 => 159,  164 => 158,  155 => 68,  139 => 59,  114 => 40,  83 => 20,  76 => 17,  72 => 16,  68 => 15,  64 => 14,  56 => 18,  21 => 3,  209 => 68,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 70,  152 => 58,  148 => 43,  145 => 56,  141 => 40,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 38,  93 => 33,  90 => 22,  54 => 14,  133 => 44,  124 => 41,  111 => 31,  107 => 30,  80 => 27,  63 => 12,  60 => 19,  69 => 15,  61 => 15,  52 => 12,  50 => 13,  45 => 12,  43 => 11,  34 => 4,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 41,  195 => 40,  193 => 79,  190 => 39,  188 => 77,  185 => 38,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 69,  156 => 60,  153 => 67,  146 => 42,  142 => 54,  137 => 51,  131 => 48,  126 => 49,  120 => 35,  117 => 41,  103 => 36,  99 => 34,  74 => 23,  47 => 4,  32 => 4,  39 => 12,  26 => 2,  97 => 26,  95 => 21,  88 => 29,  82 => 27,  78 => 18,  75 => 24,  71 => 14,  22 => 3,  44 => 6,  30 => 4,  20 => 2,  25 => 4,  49 => 8,  42 => 5,  40 => 5,  23 => 4,  27 => 5,  17 => 1,  92 => 23,  86 => 25,  79 => 19,  77 => 25,  57 => 10,  46 => 10,  37 => 4,  33 => 4,  29 => 3,  24 => 6,  19 => 2,  135 => 50,  129 => 47,  122 => 36,  116 => 42,  113 => 40,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 26,  87 => 21,  84 => 20,  81 => 26,  73 => 21,  70 => 26,  67 => 14,  62 => 24,  59 => 8,  55 => 9,  51 => 13,  48 => 10,  41 => 9,  38 => 6,  35 => 2,  31 => 4,  28 => 3,);
    }
}

<?php

/* TwigBundle:Exception:error404.html.twig */
class __TwigTemplate_91787be972cd70437200b25b03c1270caab830dfab74fa78dc6e02fef1b55a2f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "TwigBundle:Exception:error404.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "  ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
  <style>
   .centered{
     margin: 0 auto;
     text-align: center;
   }
  </style>
 ";
    }

    // line 11
    public function block_container($context, array $blocks = array())
    {
        // line 12
        echo " <div class=\"centered\">
 <h3> 404: La página que buscas no se ha encontrado.</h3>
 <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("img/negative.png"), "html", null, true);
        echo "\" width=\"250\" height=\"250\" alt=\"not found\" />
 </div>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 14,  48 => 12,  45 => 11,  32 => 3,  29 => 2,  11 => 1,);
    }
}

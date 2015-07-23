<?php

/* KnpPaginatorBundle:Pagination:sortable_link.html.twig */
class __TwigTemplate_e3239a1cb5d3366a46ac612c483f3f870adb4bfa24252c0302e59b552c555e8c extends Twig_Template
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
        $__internal_02d80d5eedc363e67fdacafc55488cd1d22efa6b9f0cb7cd1376c43a9c2d7ac0 = $this->env->getExtension("native_profiler");
        $__internal_02d80d5eedc363e67fdacafc55488cd1d22efa6b9f0cb7cd1376c43a9c2d7ac0->enter($__internal_02d80d5eedc363e67fdacafc55488cd1d22efa6b9f0cb7cd1376c43a9c2d7ac0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "KnpPaginatorBundle:Pagination:sortable_link.html.twig"));

        // line 1
        echo "<a";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")));
        foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["attr"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attr'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ">";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</a>
";
        
        $__internal_02d80d5eedc363e67fdacafc55488cd1d22efa6b9f0cb7cd1376c43a9c2d7ac0->leave($__internal_02d80d5eedc363e67fdacafc55488cd1d22efa6b9f0cb7cd1376c43a9c2d7ac0_prof);

    }

    public function getTemplateName()
    {
        return "KnpPaginatorBundle:Pagination:sortable_link.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}

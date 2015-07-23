<?php

/* ::backend.html.twig */
class __TwigTemplate_b965a65fae67c725e783bfce32d023ff24900f5cedbd5f8a9a124bffa11cae23 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "::backend.html.twig", 1);
        $this->blocks = array(
            'topmenu' => array($this, 'block_topmenu'),
            'sidemenu' => array($this, 'block_sidemenu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_be5310a588bac7b0b7724a4e8b95342e8161c64f00fbb8062e7579001b471d6a = $this->env->getExtension("native_profiler");
        $__internal_be5310a588bac7b0b7724a4e8b95342e8161c64f00fbb8062e7579001b471d6a->enter($__internal_be5310a588bac7b0b7724a4e8b95342e8161c64f00fbb8062e7579001b471d6a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::backend.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_be5310a588bac7b0b7724a4e8b95342e8161c64f00fbb8062e7579001b471d6a->leave($__internal_be5310a588bac7b0b7724a4e8b95342e8161c64f00fbb8062e7579001b471d6a_prof);

    }

    // line 3
    public function block_topmenu($context, array $blocks = array())
    {
        $__internal_f597332ed09e50db9fb456bf43d8e36ed564471c74484de9825d0761a0d1153c = $this->env->getExtension("native_profiler");
        $__internal_f597332ed09e50db9fb456bf43d8e36ed564471c74484de9825d0761a0d1153c->enter($__internal_f597332ed09e50db9fb456bf43d8e36ed564471c74484de9825d0761a0d1153c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "topmenu"));

        // line 4
        echo "    ";
        $this->loadTemplate("::topmenu.html.twig", "::backend.html.twig", 4)->display($context);
        // line 5
        echo "    
 ";
        
        $__internal_f597332ed09e50db9fb456bf43d8e36ed564471c74484de9825d0761a0d1153c->leave($__internal_f597332ed09e50db9fb456bf43d8e36ed564471c74484de9825d0761a0d1153c_prof);

    }

    // line 8
    public function block_sidemenu($context, array $blocks = array())
    {
        $__internal_d0f5a51a364dbfdf4b0851ce28bfff80ada155beb616cd48661251300e50a477 = $this->env->getExtension("native_profiler");
        $__internal_d0f5a51a364dbfdf4b0851ce28bfff80ada155beb616cd48661251300e50a477->enter($__internal_d0f5a51a364dbfdf4b0851ce28bfff80ada155beb616cd48661251300e50a477_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidemenu"));

        // line 9
        echo "    ";
        $this->loadTemplate("::sidemenu.html.twig", "::backend.html.twig", 9)->display($context);
        // line 10
        echo "    
 ";
        
        $__internal_d0f5a51a364dbfdf4b0851ce28bfff80ada155beb616cd48661251300e50a477->leave($__internal_d0f5a51a364dbfdf4b0851ce28bfff80ada155beb616cd48661251300e50a477_prof);

    }

    public function getTemplateName()
    {
        return "::backend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 10,  58 => 9,  52 => 8,  44 => 5,  41 => 4,  35 => 3,  11 => 1,);
    }
}

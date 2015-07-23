<?php

/* BackendAdminBundle:Default:index.html.twig */
class __TwigTemplate_d16fa67bf477179697d7ee3e3c7d56b123a80b802c13ebd737025643f8b97d8a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::backend.html.twig", "BackendAdminBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::backend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c2196d6248c35206848b75a5d6b114172c90beee561ef313699ec13ab4f30553 = $this->env->getExtension("native_profiler");
        $__internal_c2196d6248c35206848b75a5d6b114172c90beee561ef313699ec13ab4f30553->enter($__internal_c2196d6248c35206848b75a5d6b114172c90beee561ef313699ec13ab4f30553_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendAdminBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c2196d6248c35206848b75a5d6b114172c90beee561ef313699ec13ab4f30553->leave($__internal_c2196d6248c35206848b75a5d6b114172c90beee561ef313699ec13ab4f30553_prof);

    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        $__internal_3a68ee31ca6455af4e478123a6c86412256371674d5f788ca737a60853937be3 = $this->env->getExtension("native_profiler");
        $__internal_3a68ee31ca6455af4e478123a6c86412256371674d5f788ca737a60853937be3->enter($__internal_3a68ee31ca6455af4e478123a6c86412256371674d5f788ca737a60853937be3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 4
        echo " 
<h4> BIENVENIDO ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo " !!</h4>
 
 ";
        // line 7
        if ($this->env->getExtension('security')->isGranted("ROLE_VISITOR")) {
            // line 8
            echo "  
 <p>
  Usted no posee rol asignado contactese con el administrador.
 </p>
 ";
        }
        // line 12
        echo " 
 

  

";
        
        $__internal_3a68ee31ca6455af4e478123a6c86412256371674d5f788ca737a60853937be3->leave($__internal_3a68ee31ca6455af4e478123a6c86412256371674d5f788ca737a60853937be3_prof);

    }

    public function getTemplateName()
    {
        return "BackendAdminBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 12,  50 => 8,  48 => 7,  43 => 5,  40 => 4,  34 => 3,  11 => 1,);
    }
}

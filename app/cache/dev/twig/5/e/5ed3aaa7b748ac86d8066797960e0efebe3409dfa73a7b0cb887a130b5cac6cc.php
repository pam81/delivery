<?php

/* BackendUserBundle:Group:index.html.twig */
class __TwigTemplate_5ed3aaa7b748ac86d8066797960e0efebe3409dfa73a7b0cb887a130b5cac6cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::backend.html.twig", "BackendUserBundle:Group:index.html.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::backend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_90dbf6f20484859aa4ad8cdae7c09db7ad8c37e1790a55abcf1fbbc6dca8ffae = $this->env->getExtension("native_profiler");
        $__internal_90dbf6f20484859aa4ad8cdae7c09db7ad8c37e1790a55abcf1fbbc6dca8ffae->enter($__internal_90dbf6f20484859aa4ad8cdae7c09db7ad8c37e1790a55abcf1fbbc6dca8ffae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendUserBundle:Group:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_90dbf6f20484859aa4ad8cdae7c09db7ad8c37e1790a55abcf1fbbc6dca8ffae->leave($__internal_90dbf6f20484859aa4ad8cdae7c09db7ad8c37e1790a55abcf1fbbc6dca8ffae_prof);

    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        $__internal_eb06673699eb6b6538f06eaf80606357f86cefe7da1a9569193c7abfbed8851e = $this->env->getExtension("native_profiler");
        $__internal_eb06673699eb6b6538f06eaf80606357f86cefe7da1a9569193c7abfbed8851e->enter($__internal_eb06673699eb6b6538f06eaf80606357f86cefe7da1a9569193c7abfbed8851e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 4
        echo "    
    
     <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <h1 class=\"page-header\">
                            Grupos de Usuarios
                        </h1>
                        <ol class=\"breadcrumb\">
                            <li>
                                <i class=\"fa fa-dashboard\"></i>  <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("principal");
        echo "\">Dashboard</a>
                            </li>
                            <li class=\"active\">
                                <i class=\"fa fa-users\"></i> Grupos de Usuarios
                            </li>
                        </ol>
                    </div>
                </div> <!-- row -->

                 <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <button type=\"button\" class=\"btn btn-primary\" id=\"new_button\" data-url=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("group_new");
        echo "\">Nuevo</button>
                     </div>
                     
                 </div>
                    

                 <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div class=\"table-responsive\">
                            <table class=\"table table-bordered table-hover\">
                                <thead>
                                    <tr>
                                        <th ";
        // line 36
        if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "isSorted", array(0 => "u.name"), "method")) {
            echo " class=\"sorted\"";
        }
        echo ">";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Nombre", "u.name");
        echo "</th>
                                        <th>Rol</th>
                                        <th style=\"width: 36px;\">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 43
            echo "                                       <tr>
                                                  <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "name", array()), "html", null, true);
            echo "</td>
                                                  <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "role", array()), "html", null, true);
            echo "</td>
                                                  <td>
                                                  <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("group_edit", array("id" => $this->getAttribute($context["group"], "id", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-pencil\"></i></a>
                                                  <a href=\"#\" class=\"btn confirm-delete\"   data-toggle=\"modal\" data-id=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
            echo "\"  data-target=\"#myModal\"><i class=\"fa fa-trash\"></i></a>
                                                  </td>
                                      </tr>
                                      
                                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>   
                <!-- /.row -->

                <div class=\"pagination\">
                       ";
        // line 62
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
    
               </div>



    
  <div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"basicModal\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h4 class=\"modal-title\" id=\"myModalLabel\">Confirmar Borrado</h4>
            </div>
            <div class=\"modal-body\">
                <p class=\"error-text\">Esta seguro que desea borrar el grupo?</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
                <button type=\"button\" class=\"btn btn-danger\" data-id=\"0\"  data-url=\"";
        // line 81
        echo $this->env->getExtension('routing')->getPath("group_delete", array("id" => "id"));
        echo "\">Borrar</button>
        </div>
    </div>
  </div>
</div>
    
    
    
    
    
    
    <form action=\"\" id=\"delete-form\" method=\"post\" ";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'enctype');
        echo ">
    ";
        // line 93
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
    <input type=\"hidden\" value=\"DELETE\" name=\"_method\">
    
    </form>
    
  
    
    
    ";
        
        $__internal_eb06673699eb6b6538f06eaf80606357f86cefe7da1a9569193c7abfbed8851e->leave($__internal_eb06673699eb6b6538f06eaf80606357f86cefe7da1a9569193c7abfbed8851e_prof);

    }

    // line 102
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_5655ba9e307dd5248ce41f6ecb42a2b489adce9e007c01a181fa2e2c5c6a5af6 = $this->env->getExtension("native_profiler");
        $__internal_5655ba9e307dd5248ce41f6ecb42a2b489adce9e007c01a181fa2e2c5c6a5af6->enter($__internal_5655ba9e307dd5248ce41f6ecb42a2b489adce9e007c01a181fa2e2c5c6a5af6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 103
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
 

   
  
";
        
        $__internal_5655ba9e307dd5248ce41f6ecb42a2b489adce9e007c01a181fa2e2c5c6a5af6->leave($__internal_5655ba9e307dd5248ce41f6ecb42a2b489adce9e007c01a181fa2e2c5c6a5af6_prof);

    }

    public function getTemplateName()
    {
        return "BackendUserBundle:Group:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 103,  192 => 102,  176 => 93,  172 => 92,  158 => 81,  136 => 62,  125 => 53,  114 => 48,  110 => 47,  105 => 45,  101 => 44,  98 => 43,  94 => 42,  81 => 36,  66 => 24,  52 => 13,  41 => 4,  35 => 3,  11 => 1,);
    }
}

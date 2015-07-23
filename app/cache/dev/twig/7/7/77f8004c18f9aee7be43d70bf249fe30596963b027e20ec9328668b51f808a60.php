<?php

/* BackendUserBundle:Seteo:index.html.twig */
class __TwigTemplate_77f8004c18f9aee7be43d70bf249fe30596963b027e20ec9328668b51f808a60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::backend.html.twig", "BackendUserBundle:Seteo:index.html.twig", 1);
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
        $__internal_09dc135efd864dfff6a90591775e20e12f96b4e5d4b42e68aec842d9c6a45c61 = $this->env->getExtension("native_profiler");
        $__internal_09dc135efd864dfff6a90591775e20e12f96b4e5d4b42e68aec842d9c6a45c61->enter($__internal_09dc135efd864dfff6a90591775e20e12f96b4e5d4b42e68aec842d9c6a45c61_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendUserBundle:Seteo:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_09dc135efd864dfff6a90591775e20e12f96b4e5d4b42e68aec842d9c6a45c61->leave($__internal_09dc135efd864dfff6a90591775e20e12f96b4e5d4b42e68aec842d9c6a45c61_prof);

    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        $__internal_6a35c375bce6f6634eba824d1b32adbd79ca5d362f236e44e802a0aaf57df8fc = $this->env->getExtension("native_profiler");
        $__internal_6a35c375bce6f6634eba824d1b32adbd79ca5d362f236e44e802a0aaf57df8fc->enter($__internal_6a35c375bce6f6634eba824d1b32adbd79ca5d362f236e44e802a0aaf57df8fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 4
        echo "    
    <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <h1 class=\"page-header\">
                            Seteo de parámetros
                        </h1>
                        <ol class=\"breadcrumb\">
                            <li>
                                <i class=\"fa fa-dashboard\"></i>  <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("principal");
        echo "\">Dashboard</a>
                            </li>
                            <li class=\"active\">
                                <i class=\"fa fa-cog\"></i> Seteos
                            </li>
                        </ol>
                    </div>
                </div> <!-- row -->

                 <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <button type=\"button\" class=\"btn btn-primary\" id=\"new_button\" data-url=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("seteo_new");
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
        // line 34
        if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "isSorted", array(0 => "u.name"), "method")) {
            echo " class=\"sorted\"";
        }
        echo ">";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Nombre", "u.name");
        echo "</th>
                                        <th>Valor</th>
                                        <th style=\"width: 36px;\">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        foreach ($context['_seq'] as $context["_key"] => $context["seteo"]) {
            // line 41
            echo "                                       <tr>
                                                  <td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["seteo"], "name", array()), "html", null, true);
            echo "</td>
                                                  <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["seteo"], "value", array()), "html", null, true);
            echo "</td>
                                                  <td>
                                                  <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("seteo_edit", array("id" => $this->getAttribute($context["seteo"], "id", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-pencil\"></i></a>
                                                  <a href=\"#\" class=\"btn confirm-delete\"   data-toggle=\"modal\" data-id=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["seteo"], "id", array()), "html", null, true);
            echo "\"  data-target=\"#myModal\"><i class=\"fa fa-trash\"></i></a>
                                                  </td>
                                      </tr>
                                      
                                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['seteo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>   
                <!-- /.row -->

                <div class=\"pagination\">
                       ";
        // line 60
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
                <p class=\"error-text\">Esta seguro que desea borrar el parámetro seleccionado?</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
                <button type=\"button\" class=\"btn btn-danger\" data-id=\"0\"  data-url=\"";
        // line 79
        echo $this->env->getExtension('routing')->getPath("seteo_delete", array("id" => "id"));
        echo "\">Borrar</button>
        </div>
    </div>
  </div>
</div>
    
    
    
    
    
    
    <form action=\"\" id=\"delete-form\" method=\"post\" ";
        // line 90
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'enctype');
        echo ">
    ";
        // line 91
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
    <input type=\"hidden\" value=\"DELETE\" name=\"_method\">
    
    </form>
    
    
    
   
    
    ";
        
        $__internal_6a35c375bce6f6634eba824d1b32adbd79ca5d362f236e44e802a0aaf57df8fc->leave($__internal_6a35c375bce6f6634eba824d1b32adbd79ca5d362f236e44e802a0aaf57df8fc_prof);

    }

    // line 101
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_7d29e35fda3b389eb52c04e852efbb15acaf35c843a12b3e949102c7455b527b = $this->env->getExtension("native_profiler");
        $__internal_7d29e35fda3b389eb52c04e852efbb15acaf35c843a12b3e949102c7455b527b->enter($__internal_7d29e35fda3b389eb52c04e852efbb15acaf35c843a12b3e949102c7455b527b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 102
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
   
  ";
        
        $__internal_7d29e35fda3b389eb52c04e852efbb15acaf35c843a12b3e949102c7455b527b->leave($__internal_7d29e35fda3b389eb52c04e852efbb15acaf35c843a12b3e949102c7455b527b_prof);

    }

    public function getTemplateName()
    {
        return "BackendUserBundle:Seteo:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 102,  191 => 101,  174 => 91,  170 => 90,  156 => 79,  134 => 60,  123 => 51,  112 => 46,  108 => 45,  103 => 43,  99 => 42,  96 => 41,  92 => 40,  79 => 34,  65 => 23,  51 => 12,  41 => 4,  35 => 3,  11 => 1,);
    }
}

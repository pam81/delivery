<?php

/* BackendUserBundle:User:index.html.twig */
class __TwigTemplate_a76c75970073f5b9f3bf141b9ac606175a377c0b575fc1afc02f35d9a177d5a7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::backend.html.twig", "BackendUserBundle:User:index.html.twig", 1);
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
        $__internal_833f0b5e58057093d0faa229c80f06311f742d4f5534289edd7be3ab4c77ab71 = $this->env->getExtension("native_profiler");
        $__internal_833f0b5e58057093d0faa229c80f06311f742d4f5534289edd7be3ab4c77ab71->enter($__internal_833f0b5e58057093d0faa229c80f06311f742d4f5534289edd7be3ab4c77ab71_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendUserBundle:User:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_833f0b5e58057093d0faa229c80f06311f742d4f5534289edd7be3ab4c77ab71->leave($__internal_833f0b5e58057093d0faa229c80f06311f742d4f5534289edd7be3ab4c77ab71_prof);

    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        $__internal_50d365772b4cc88a4083cf7a6e3abbe78bf8f9af2f399765fed9ce2ffc83d05c = $this->env->getExtension("native_profiler");
        $__internal_50d365772b4cc88a4083cf7a6e3abbe78bf8f9af2f399765fed9ce2ffc83d05c->enter($__internal_50d365772b4cc88a4083cf7a6e3abbe78bf8f9af2f399765fed9ce2ffc83d05c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 5
        echo "<div class=\"row\">
                    <div class=\"col-lg-12\">
                        <h1 class=\"page-header\">
                            Listado de Usuarios
                        </h1>
                        <ol class=\"breadcrumb\">
                            <li>
                                <i class=\"fa fa-dashboard\"></i>  <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("principal");
        echo "\">Dashboard</a>
                            </li>
                            <li class=\"active\">
                                <i class=\"fa fa-users\"></i> Listado de Usuarios
                            </li>
                        </ol>
                    </div>
                </div> <!-- row -->

                 <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <button type=\"button\" class=\"btn btn-primary\" id=\"new_button\" data-url=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("user_new");
        echo "\">Nuevo</button>
                     </div>
                     <div class=\"col-lg-4\">
                          <form id=\"custom-search-form\" class=\"form-search form-horizontal pull-right\" action=\"#\">
                            
                            <div class=\"form-group input-group\">
                                <input type=\"text\" class=\"form-control search-query\" id=\"search-query\" placeholder=\"Buscar\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "html", null, true);
        echo "\">
                                <span class=\"input-group-btn\"><button class=\"btn btn-default\" id=\"search-button\" data-url=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("user");
        echo "\" type=\"button\"><i class=\"fa fa-search\"></i></button></span>
                            </div>
                           
                          </form>
                     </div> 
                 </div>
                    

                 <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div class=\"table-responsive\">
                            <table class=\"table table-bordered table-hover\">
                                <thead>
                                    <tr>
                                        <th ";
        // line 44
        if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "isSorted", array(0 => "u.Email"), "method")) {
            echo " class=\"sorted\"";
        }
        echo ">";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Email", "u.email");
        echo "</th>
                                        <th>Tipo Usuario</th>
                                        <th>Estado</th>
                                        <th style=\"width: 36px;\">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 52
            echo "                                       <tr>
                                                 
                                                  <td>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</td>
                                                  <td>";
            // line 55
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["user"], "groups", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 56
                echo "                                                       ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "<br/>
                                                       ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo " </td>
                                                  
                                                  <td>   ";
            // line 59
            if (($this->getAttribute($context["user"], "isActive", array()) == 1)) {
                echo " <span class=\"label label-success\">Activo</span> ";
            } else {
                echo " <span class=\"label label-danger\">Inhabilitado</span>  ";
            }
            echo " </td>
                                                  <td>
                                                  <a href=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-pencil\"></i></a>
                                                  <a href=\"#\" class=\"btn confirm-delete\"   data-toggle=\"modal\" data-id=";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "  data-target=\"#myModal\"><i class=\"fa fa-trash\"></i></a>
                                                  </td>
                                      </tr>
                                      
                                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>   
                <!-- /.row -->

                <div class=\"pagination\">
                       ";
        // line 76
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
                <p class=\"error-text\">Esta seguro que desea borrar el usuario?</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
                <button type=\"button\" class=\"btn btn-danger\" data-id=\"0\"  data-url=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("user_delete", array("id" => "id"));
        echo "\">Borrar</button>
        </div>
    </div>
  </div>
</div>
    
    
    
    
    
    
    <form action=\"\" id=\"delete-form\" method=\"post\" ";
        // line 106
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'enctype');
        echo ">
    ";
        // line 107
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
    <input type=\"hidden\" value=\"DELETE\" name=\"_method\">
    
    </form>
    
    
    ";
        
        $__internal_50d365772b4cc88a4083cf7a6e3abbe78bf8f9af2f399765fed9ce2ffc83d05c->leave($__internal_50d365772b4cc88a4083cf7a6e3abbe78bf8f9af2f399765fed9ce2ffc83d05c_prof);

    }

    // line 117
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_800fd88edb4a79119a3c0439f4b1eabc7768bdfa51e486c06dc196cf870cfcce = $this->env->getExtension("native_profiler");
        $__internal_800fd88edb4a79119a3c0439f4b1eabc7768bdfa51e486c06dc196cf870cfcce->enter($__internal_800fd88edb4a79119a3c0439f4b1eabc7768bdfa51e486c06dc196cf870cfcce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 118
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
   ";
        // line 119
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "e7062b2_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e7062b2_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/e7062b2_user_index_1.js");
            // line 120
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
   ";
        } else {
            // asset "e7062b2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e7062b2") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/e7062b2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
   ";
        }
        unset($context["asset_url"]);
        
        $__internal_800fd88edb4a79119a3c0439f4b1eabc7768bdfa51e486c06dc196cf870cfcce->leave($__internal_800fd88edb4a79119a3c0439f4b1eabc7768bdfa51e486c06dc196cf870cfcce_prof);

    }

    public function getTemplateName()
    {
        return "BackendUserBundle:User:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 120,  237 => 119,  232 => 118,  226 => 117,  212 => 107,  208 => 106,  194 => 95,  172 => 76,  161 => 67,  150 => 62,  146 => 61,  137 => 59,  133 => 57,  124 => 56,  120 => 55,  116 => 54,  112 => 52,  108 => 51,  94 => 44,  77 => 30,  73 => 29,  64 => 23,  50 => 12,  41 => 5,  35 => 3,  11 => 1,);
    }
}

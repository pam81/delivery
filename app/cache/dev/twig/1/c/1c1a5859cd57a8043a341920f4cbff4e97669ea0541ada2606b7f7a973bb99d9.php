<?php

/* BackendAdminBundle:Zona:index.html.twig */
class __TwigTemplate_1c1a5859cd57a8043a341920f4cbff4e97669ea0541ada2606b7f7a973bb99d9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::backend.html.twig", "BackendAdminBundle:Zona:index.html.twig", 1);
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
        $__internal_1f8432f445a98a300da66dc28f1c6c91db0f4be89b3ce2bb2f10b6aa64fd2085 = $this->env->getExtension("native_profiler");
        $__internal_1f8432f445a98a300da66dc28f1c6c91db0f4be89b3ce2bb2f10b6aa64fd2085->enter($__internal_1f8432f445a98a300da66dc28f1c6c91db0f4be89b3ce2bb2f10b6aa64fd2085_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendAdminBundle:Zona:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1f8432f445a98a300da66dc28f1c6c91db0f4be89b3ce2bb2f10b6aa64fd2085->leave($__internal_1f8432f445a98a300da66dc28f1c6c91db0f4be89b3ce2bb2f10b6aa64fd2085_prof);

    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        $__internal_9ebe405fa3746edc63540ceee1107d26fc14471384da1cb0785950a22bf9f83c = $this->env->getExtension("native_profiler");
        $__internal_9ebe405fa3746edc63540ceee1107d26fc14471384da1cb0785950a22bf9f83c->enter($__internal_9ebe405fa3746edc63540ceee1107d26fc14471384da1cb0785950a22bf9f83c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 4
        echo " 
 
 <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <h1 class=\"page-header\">
                            Listado de Zonas
                        </h1>
                        <ol class=\"breadcrumb\">
                            <li>
                                <i class=\"fa fa-dashboard\"></i>  <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("principal");
        echo "\">Dashboard</a>
                            </li>
                            <li class=\"active\">
                                <i class=\"fa fa-globe\"></i> Listado de Zonas
                            </li>
                        </ol>
                    </div>
                </div> <!-- row -->

                 <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <button type=\"button\" class=\"btn btn-primary\" id=\"new_button\" data-url=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("zona_new");
        echo "\">Nuevo</button>
                     </div>
                     <div class=\"col-lg-4\">
                          <form id=\"custom-search-form\" class=\"form-search form-horizontal pull-right\" action=\"#\">
                            
                            <div class=\"form-group input-group\">
                                <input type=\"text\" class=\"form-control search-query\" id=\"search-query\" placeholder=\"Buscar\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "html", null, true);
        echo "\">
                                <span class=\"input-group-btn\"><button class=\"btn btn-default\" id=\"search-button\" data-url=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("zona");
        echo "\" type=\"button\"><i class=\"fa fa-search\"></i></button></span>
                            </div>
                           
                          </form>
                     </div>
                     <div class=\"col-lg-3\">
                     ";
        // line 37
        if ($this->env->getExtension('security')->isGranted("ROLE_VIEWZONA")) {
            echo " <button class=\"btn btn-primary\" type=\"button\" id=\"exportar_button\" data-url=\"";
            echo $this->env->getExtension('routing')->getPath("zona_exportar");
            echo "\" >Exportar </button> ";
        }
        // line 38
        echo "                     </div> 
                 </div>
                    

                 <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div class=\"table-responsive\">
                            <table class=\"table table-bordered table-hover\">
                                <thead>
                                    <tr>
                                        <th ";
        // line 48
        if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "isSorted", array(0 => "u.name"), "method")) {
            echo " class=\"sorted\"";
        }
        echo ">";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Nombre", "u.name");
        echo "</th>
                                        <th style=\"width: 36px;\">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     ";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        foreach ($context['_seq'] as $context["_key"] => $context["zona"]) {
            // line 54
            echo "                                       <tr>
                                                  <td>";
            // line 55
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["zona"], "name", array())), "html", null, true);
            echo "</td>
                                                  <td>
                                                  ";
            // line 57
            if ($this->env->getExtension('security')->isGranted("ROLE_MODZONA")) {
                // line 58
                echo "                                                  <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_edit", array("id" => $this->getAttribute($context["zona"], "id", array()))), "html", null, true);
                echo "\"><i class=\"fa fa-pencil\"></i></a>
                                                  ";
            }
            // line 60
            echo "                                                  ";
            if ($this->env->getExtension('security')->isGranted("ROLE_DELZONA")) {
                // line 61
                echo "                                                  <a href=\"#\" class=\"btn confirm-delete\"   data-toggle=\"modal\" data-id=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["zona"], "id", array()), "html", null, true);
                echo "  data-target=\"#myModal\"><i class=\"fa fa-trash\"></i></a>
                                                  ";
            }
            // line 63
            echo "                                                  </td>
                                      </tr>
                                      
                                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['zona'], $context['_parent'], $context['loop']);
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
                <p class=\"error-text\">Esta seguro que desea borrar la zona?</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
                <button type=\"button\" class=\"btn btn-danger\" data-id=\"0\"  data-url=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("zona_delete", array("id" => "id"));
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
        
        $__internal_9ebe405fa3746edc63540ceee1107d26fc14471384da1cb0785950a22bf9f83c->leave($__internal_9ebe405fa3746edc63540ceee1107d26fc14471384da1cb0785950a22bf9f83c_prof);

    }

    // line 117
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_c0e691b12b8c10fdebe83dbbaa6b0defbe2f46eede91f9143db337f573a6642c = $this->env->getExtension("native_profiler");
        $__internal_c0e691b12b8c10fdebe83dbbaa6b0defbe2f46eede91f9143db337f573a6642c->enter($__internal_c0e691b12b8c10fdebe83dbbaa6b0defbe2f46eede91f9143db337f573a6642c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 118
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
 
";
        // line 120
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c34c3ec_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c34c3ec_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/c34c3ec_search_index_1.js");
            // line 121
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "c34c3ec"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c34c3ec") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/c34c3ec.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 123
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "22315e7_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_22315e7_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/22315e7_exportar_entidad_1.js");
            // line 124
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "22315e7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_22315e7") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/22315e7.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 125
        echo "      
  
";
        
        $__internal_c0e691b12b8c10fdebe83dbbaa6b0defbe2f46eede91f9143db337f573a6642c->leave($__internal_c0e691b12b8c10fdebe83dbbaa6b0defbe2f46eede91f9143db337f573a6642c_prof);

    }

    public function getTemplateName()
    {
        return "BackendAdminBundle:Zona:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  272 => 125,  258 => 124,  254 => 123,  240 => 121,  236 => 120,  230 => 118,  224 => 117,  207 => 107,  203 => 106,  189 => 95,  167 => 76,  156 => 67,  147 => 63,  141 => 61,  138 => 60,  132 => 58,  130 => 57,  125 => 55,  122 => 54,  118 => 53,  106 => 48,  94 => 38,  88 => 37,  79 => 31,  75 => 30,  66 => 24,  52 => 13,  41 => 4,  35 => 3,  11 => 1,);
    }
}

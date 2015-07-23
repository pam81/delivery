<?php

/* BackendAdminBundle:Barrio:index.html.twig */
class __TwigTemplate_609b449e64c52deb5cfa176c013fd222fed9ab7026f5a2704062c4d199d76787 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::backend.html.twig", "BackendAdminBundle:Barrio:index.html.twig", 1);
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
        $__internal_5401308260add14f338e82d37a6368a974d1d12dd8cadd1132bdc4a4f4c891b3 = $this->env->getExtension("native_profiler");
        $__internal_5401308260add14f338e82d37a6368a974d1d12dd8cadd1132bdc4a4f4c891b3->enter($__internal_5401308260add14f338e82d37a6368a974d1d12dd8cadd1132bdc4a4f4c891b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendAdminBundle:Barrio:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5401308260add14f338e82d37a6368a974d1d12dd8cadd1132bdc4a4f4c891b3->leave($__internal_5401308260add14f338e82d37a6368a974d1d12dd8cadd1132bdc4a4f4c891b3_prof);

    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        $__internal_a6519132586557fd9f5f840fdc872c82e9c1731b309dca2f68863fa9467cb6f1 = $this->env->getExtension("native_profiler");
        $__internal_a6519132586557fd9f5f840fdc872c82e9c1731b309dca2f68863fa9467cb6f1->enter($__internal_a6519132586557fd9f5f840fdc872c82e9c1731b309dca2f68863fa9467cb6f1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 4
        echo " 
 
 <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <h1 class=\"page-header\">
                            Listado de Barrios
                        </h1>
                        <ol class=\"breadcrumb\">
                            <li>
                                <i class=\"fa fa-dashboard\"></i>  <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("principal");
        echo "\">Dashboard</a>
                            </li>
                            <li class=\"active\">
                                <i class=\"fa fa-globe\"></i> Listado de Barrios
                            </li>
                        </ol>
                    </div>
                </div> <!-- row -->

                 <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <button type=\"button\" class=\"btn btn-primary\" id=\"new_button\" data-url=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("barrio_new");
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
        echo $this->env->getExtension('routing')->getPath("barrio");
        echo "\" type=\"button\"><i class=\"fa fa-search\"></i></button></span>
                            </div>
                           
                          </form>
                     </div>
                     <div class=\"col-lg-3\">
                     ";
        // line 37
        if ($this->env->getExtension('security')->isGranted("ROLE_VIEWBARRIO")) {
            echo " <button class=\"btn btn-primary\" type=\"button\" id=\"exportar_button\" data-url=\"";
            echo $this->env->getExtension('routing')->getPath("barrio_exportar");
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
                                        <th>Zona</th>
                                       
                                        <th ";
        // line 50
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
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        foreach ($context['_seq'] as $context["_key"] => $context["barrio"]) {
            // line 56
            echo "                                       <tr>
                                                  <td>";
            // line 57
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["barrio"], "zona", array())), "html", null, true);
            echo "</td>
                                                  
                                                  <td>";
            // line 59
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["barrio"], "name", array())), "html", null, true);
            echo "</td>
                                                  <td>
                                                  ";
            // line 61
            if ($this->env->getExtension('security')->isGranted("ROLE_MODBARRIO")) {
                // line 62
                echo "                                                  <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("barrio_edit", array("id" => $this->getAttribute($context["barrio"], "id", array()))), "html", null, true);
                echo "\"><i class=\"fa fa-pencil\"></i></a>
                                                  ";
            }
            // line 64
            echo "                                                  ";
            if ($this->env->getExtension('security')->isGranted("ROLE_DELBARRIO")) {
                // line 65
                echo "                                                  <a href=\"#\" class=\"btn confirm-delete\"   data-toggle=\"modal\" data-id=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["barrio"], "id", array()), "html", null, true);
                echo "  data-target=\"#myModal\"><i class=\"fa fa-trash\"></i></a>
                                                  ";
            }
            // line 67
            echo "                                                  </td>
                                      </tr>
                                      
                                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['barrio'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>   
                <!-- /.row -->

                <div class=\"pagination\">
                       ";
        // line 80
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
                <p class=\"error-text\">Esta seguro que desea borrar el barrio?</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
                <button type=\"button\" class=\"btn btn-danger\" data-id=\"0\"  data-url=\"";
        // line 99
        echo $this->env->getExtension('routing')->getPath("barrio_delete", array("id" => "id"));
        echo "\">Borrar</button>
        </div>
    </div>
  </div>
</div>
    
    
    
    
    
    
    <form action=\"\" id=\"delete-form\" method=\"post\" ";
        // line 110
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'enctype');
        echo ">
    ";
        // line 111
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
    <input type=\"hidden\" value=\"DELETE\" name=\"_method\">
    
    </form>
 
 
 
    
    
    ";
        
        $__internal_a6519132586557fd9f5f840fdc872c82e9c1731b309dca2f68863fa9467cb6f1->leave($__internal_a6519132586557fd9f5f840fdc872c82e9c1731b309dca2f68863fa9467cb6f1_prof);

    }

    // line 121
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_5edac4e3a2dffdfeaaef17ecf4ffb86c42c01ff9e6f98706f16d510ccd25a5bc = $this->env->getExtension("native_profiler");
        $__internal_5edac4e3a2dffdfeaaef17ecf4ffb86c42c01ff9e6f98706f16d510ccd25a5bc->enter($__internal_5edac4e3a2dffdfeaaef17ecf4ffb86c42c01ff9e6f98706f16d510ccd25a5bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 122
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
 
";
        // line 124
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c34c3ec_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c34c3ec_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/c34c3ec_search_index_1.js");
            // line 125
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
        // line 127
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "22315e7_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_22315e7_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/22315e7_exportar_entidad_1.js");
            // line 128
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
        // line 129
        echo "      
  
";
        
        $__internal_5edac4e3a2dffdfeaaef17ecf4ffb86c42c01ff9e6f98706f16d510ccd25a5bc->leave($__internal_5edac4e3a2dffdfeaaef17ecf4ffb86c42c01ff9e6f98706f16d510ccd25a5bc_prof);

    }

    public function getTemplateName()
    {
        return "BackendAdminBundle:Barrio:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  279 => 129,  265 => 128,  261 => 127,  247 => 125,  243 => 124,  237 => 122,  231 => 121,  214 => 111,  210 => 110,  196 => 99,  174 => 80,  163 => 71,  154 => 67,  148 => 65,  145 => 64,  139 => 62,  137 => 61,  132 => 59,  127 => 57,  124 => 56,  120 => 55,  108 => 50,  94 => 38,  88 => 37,  79 => 31,  75 => 30,  66 => 24,  52 => 13,  41 => 4,  35 => 3,  11 => 1,);
    }
}

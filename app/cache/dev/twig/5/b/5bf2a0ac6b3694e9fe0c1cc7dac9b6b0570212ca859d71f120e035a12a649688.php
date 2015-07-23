<?php

/* BackendUserBundle:User:registrarse.html.twig */
class __TwigTemplate_5bf2a0ac6b3694e9fe0c1cc7dac9b6b0570212ca859d71f120e035a12a649688 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::loginBase.html.twig", "BackendUserBundle:User:registrarse.html.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::loginBase.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bf4620df7fd84f3166f646b78e10c25b774344f3956c579f72111bfe3b9281df = $this->env->getExtension("native_profiler");
        $__internal_bf4620df7fd84f3166f646b78e10c25b774344f3956c579f72111bfe3b9281df->enter($__internal_bf4620df7fd84f3166f646b78e10c25b774344f3956c579f72111bfe3b9281df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendUserBundle:User:registrarse.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bf4620df7fd84f3166f646b78e10c25b774344f3956c579f72111bfe3b9281df->leave($__internal_bf4620df7fd84f3166f646b78e10c25b774344f3956c579f72111bfe3b9281df_prof);

    }

    // line 2
    public function block_container($context, array $blocks = array())
    {
        $__internal_4f27b865b37147bca39cd815169e2819e2b2d5e9ce2c79565d16d4be821ee29e = $this->env->getExtension("native_profiler");
        $__internal_4f27b865b37147bca39cd815169e2819e2b2d5e9ce2c79565d16d4be821ee29e->enter($__internal_4f27b865b37147bca39cd815169e2819e2b2d5e9ce2c79565d16d4be821ee29e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 3
        echo "
<div id=\"loginModal\" class=\"modal show\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
  <div class=\"modal-content\">
      <div class=\"modal-header\">
          <h1 class=\"text-center\">William Hope - Administrador</h1>
      </div>
      <div class=\"modal-body\" style=\"overflow-y: auto; height: 460px;\">
       ";
        // line 11
        $this->loadTemplate("::messages.html.twig", "BackendUserBundle:User:registrarse.html.twig", 11)->display($context);
        // line 12
        echo "          <form class=\"form col-md-12 center-block\" action=\"";
        echo $this->env->getExtension('routing')->getPath("register_user");
        echo "\" method=\"POST\" id=\"formRegister\" name=\"formRegister\">
            <div class=\"form-group col-xs-12\">
              <label class=\"control-label col-xs-2\">Nombre</label>
              <div class=\"col-xs-10\">
                <input type=\"text\" id=\"inputNombre\" placeholder=\"\" name=\"name\" value=\"\" class=\"form-control\">
                <span id='backend_userbundle_usertype_name_errorloc' class=\"help-block \">  </span>
              </div>
            </div>
            <div class=\"form-group  col-xs-12\">
              <label class=\"control-label col-xs-2\">Apellido</label>
              <div class=\"col-xs-10\">
                <input type=\"text\" id=\"inputApellido\" placeholder=\"\" name=\"lastname\" value=\"\" class=\"form-control\">
                <span id='backend_userbundle_usertype_name_errorloc' class=\"help-block\"> </span>
              </div>
            </div>
            <div class=\"form-group  col-xs-12\">
              <label class=\"control-label col-xs-2\">Email</label>
              <div class=\"col-xs-10\">
                <input type=\"text\" id=\"inputEmail\" placeholder=\"\" name=\"email\" value=\"\" class=\"form-control\">
                <span id='backend_userbundle_usertype_name_errorloc' class=\"help-block\">  </span>
              </div>
            </div>
            
            <div class=\"form-group  col-xs-12\">
              <label class=\"control-label col-xs-2\">Contraseña</label>
              <div class=\"col-xs-10\">
                <input type=\"password\" id=\"inputPass\" placeholder=\"\" name=\"password\" value=\"\" class=\"form-control\">
                <span id='backend_userbundle_usertype_name_errorloc' class=\"help-block\">  </span>
              </div>
            </div>
            <div class=\"form-group  col-xs-12\">
              <label class=\"control-label col-xs-2\">Repetir Contraseña</label>
              <div class=\"col-xs-10\">
                <input type=\"password\" id=\"inputConfirmPass\" placeholder=\"\" name=\"confirmPassword\" value=\"\" class=\"form-control\">
                <span id='backend_userbundle_usertype_name_errorloc' class=\"help-block\">  </span>
              </div>
            </div>
            <div class=\"form-group\">
              <button class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" id=\"btn_login\">Registrarse</button>
              <span class=\"pull-right\"><a href=\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\">Login</a></span>
            </div>
            
          </form>
      </div>
      <div class=\"modal-footer\">
      </div>
  </div>
  </div>
</div>
";
        
        $__internal_4f27b865b37147bca39cd815169e2819e2b2d5e9ce2c79565d16d4be821ee29e->leave($__internal_4f27b865b37147bca39cd815169e2819e2b2d5e9ce2c79565d16d4be821ee29e_prof);

    }

    // line 62
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_3fec967f83e0ad28e57ccd9031494f82c9f69afc699608725bd9bcda9277f8ee = $this->env->getExtension("native_profiler");
        $__internal_3fec967f83e0ad28e57ccd9031494f82c9f69afc699608725bd9bcda9277f8ee->enter($__internal_3fec967f83e0ad28e57ccd9031494f82c9f69afc699608725bd9bcda9277f8ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 63
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
 ";
        // line 64
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b1fa222_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b1fa222_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/b1fa222_register_user_1.js");
            // line 65
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "b1fa222"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b1fa222") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/b1fa222.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 67
        echo "
";
        
        $__internal_3fec967f83e0ad28e57ccd9031494f82c9f69afc699608725bd9bcda9277f8ee->leave($__internal_3fec967f83e0ad28e57ccd9031494f82c9f69afc699608725bd9bcda9277f8ee_prof);

    }

    public function getTemplateName()
    {
        return "BackendUserBundle:User:registrarse.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 67,  129 => 65,  125 => 64,  120 => 63,  114 => 62,  96 => 51,  53 => 12,  51 => 11,  41 => 3,  35 => 2,  11 => 1,);
    }
}

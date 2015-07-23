<?php

/* BackendUserBundle:Security:login.html.twig */
class __TwigTemplate_4bc7764a9748c599b8d82440d2fda28532ff458efcf963d427b7d548a47d6782 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::loginBase.html.twig", "BackendUserBundle:Security:login.html.twig", 1);
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
        $__internal_79461753029b63b80dd5a7746c341b7d0608119de13ae51ba45f76491fc7368b = $this->env->getExtension("native_profiler");
        $__internal_79461753029b63b80dd5a7746c341b7d0608119de13ae51ba45f76491fc7368b->enter($__internal_79461753029b63b80dd5a7746c341b7d0608119de13ae51ba45f76491fc7368b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BackendUserBundle:Security:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_79461753029b63b80dd5a7746c341b7d0608119de13ae51ba45f76491fc7368b->leave($__internal_79461753029b63b80dd5a7746c341b7d0608119de13ae51ba45f76491fc7368b_prof);

    }

    // line 2
    public function block_container($context, array $blocks = array())
    {
        $__internal_59611b04ed9d26c4df0dd8760fdf55c39c62f12970da67dd3166cef3d8e1771a = $this->env->getExtension("native_profiler");
        $__internal_59611b04ed9d26c4df0dd8760fdf55c39c62f12970da67dd3166cef3d8e1771a->enter($__internal_59611b04ed9d26c4df0dd8760fdf55c39c62f12970da67dd3166cef3d8e1771a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 3
        echo "     <!--login modal-->
<div id=\"loginModal\" class=\"modal show\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
  <div class=\"modal-content\">
      <div class=\"modal-header\">
          <h1 class=\"text-center\">Zona Delivery - Administrador</h1>
      </div>
      <div class=\"modal-body\">
           ";
        // line 11
        $this->loadTemplate("::messages.html.twig", "BackendUserBundle:Security:login.html.twig", 11)->display($context);
        // line 12
        echo "          <form class=\"form col-md-12 center-block\" action=\"";
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"POST\" id=\"formLogin\" name=\"formLogin\">
            <div class=\"form-group\">
              <input type=\"text\" id=\"formUsername\" name=\"_username\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" class=\"form-control input-lg\" placeholder=\"Usuario\">
              <div id='formLogin_username_errorloc' class=\"help-block error\" ></div>
            </div>
            <div class=\"form-group\">
              <input type=\"password\" class=\"form-control input-lg\" placeholder=\"Contraseña\" id=\"formPassword\" name=\"_password\">
              <div id='formLogin_password_errorloc' class=\"help-block error\" ></div>
            </div>
            <div class=\"form-group\">
              <button class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" id=\"btn_login\">Ingresar</button>
              <span class=\"pull-right\"><a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("register_user");
        echo "\">Registrarse</a></span><span><a href=\"";
        echo $this->env->getExtension('routing')->getPath("forgot_pass");
        echo "\">Recuperar contraseña</a></span>
            </div>
            <input type=\"hidden\" name=\"_target_path\" value=\"backend_admin_homepage\" />
          </form>
      </div>
      <div class=\"modal-footer\">
      </div>
  </div>
  </div>
</div>
";
        
        $__internal_59611b04ed9d26c4df0dd8760fdf55c39c62f12970da67dd3166cef3d8e1771a->leave($__internal_59611b04ed9d26c4df0dd8760fdf55c39c62f12970da67dd3166cef3d8e1771a_prof);

    }

    // line 34
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_ae5617c51bb9f5af0e12b049ba87cb596c3bcb09d4c624a9e81147a773869fb1 = $this->env->getExtension("native_profiler");
        $__internal_ae5617c51bb9f5af0e12b049ba87cb596c3bcb09d4c624a9e81147a773869fb1->enter($__internal_ae5617c51bb9f5af0e12b049ba87cb596c3bcb09d4c624a9e81147a773869fb1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 35
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
 ";
        // line 36
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "71873f3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_71873f3_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/71873f3_login_user_1.js");
            // line 37
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "71873f3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_71873f3") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/71873f3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 39
        echo "
";
        
        $__internal_ae5617c51bb9f5af0e12b049ba87cb596c3bcb09d4c624a9e81147a773869fb1->leave($__internal_ae5617c51bb9f5af0e12b049ba87cb596c3bcb09d4c624a9e81147a773869fb1_prof);

    }

    public function getTemplateName()
    {
        return "BackendUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 39,  106 => 37,  102 => 36,  97 => 35,  91 => 34,  71 => 23,  59 => 14,  53 => 12,  51 => 11,  41 => 3,  35 => 2,  11 => 1,);
    }
}

<?php

/* ::base.html.twig */
class __TwigTemplate_2a29ef5c9db2bcc0545dd87347b863db4475632f7ddbfc97b3ac6114af21ceef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'topmenu' => array($this, 'block_topmenu'),
            'sidemenu' => array($this, 'block_sidemenu'),
            'container' => array($this, 'block_container'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d0df86434c880f21941197afd2fcf6fc206aa8e31a5f0dd32bbf6537f5e2c909 = $this->env->getExtension("native_profiler");
        $__internal_d0df86434c880f21941197afd2fcf6fc206aa8e31a5f0dd32bbf6537f5e2c909->enter($__internal_d0df86434c880f21941197afd2fcf6fc206aa8e31a5f0dd32bbf6537f5e2c909_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"es\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">
        <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 31
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" >
    </head>
    <body>
        ";
        // line 34
        $this->displayBlock('body', $context, $blocks);
        // line 81
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 94
        echo "    </body>
</html>
";
        
        $__internal_d0df86434c880f21941197afd2fcf6fc206aa8e31a5f0dd32bbf6537f5e2c909->leave($__internal_d0df86434c880f21941197afd2fcf6fc206aa8e31a5f0dd32bbf6537f5e2c909_prof);

    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        $__internal_79bafedb04a13de0e5dcc04186dc1c7f3ec5fb83840b1787f56b95a3c74b79c2 = $this->env->getExtension("native_profiler");
        $__internal_79bafedb04a13de0e5dcc04186dc1c7f3ec5fb83840b1787f56b95a3c74b79c2->enter($__internal_79bafedb04a13de0e5dcc04186dc1c7f3ec5fb83840b1787f56b95a3c74b79c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Zona Delivery - Administrador";
        
        $__internal_79bafedb04a13de0e5dcc04186dc1c7f3ec5fb83840b1787f56b95a3c74b79c2->leave($__internal_79bafedb04a13de0e5dcc04186dc1c7f3ec5fb83840b1787f56b95a3c74b79c2_prof);

    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_d8ed1d13e431f056c51255e391ae9fade62d84f9f322acde1d4820a8b5624e50 = $this->env->getExtension("native_profiler");
        $__internal_d8ed1d13e431f056c51255e391ae9fade62d84f9f322acde1d4820a8b5624e50->enter($__internal_d8ed1d13e431f056c51255e391ae9fade62d84f9f322acde1d4820a8b5624e50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 11
        echo "         <!-- Bootstrap Core CSS -->
          <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
          <link href=\"//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css\" rel=\"stylesheet\" />
        <!-- Custom CSS -->
          <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/sb-admin.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
          <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/custom.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <!-- Morris Charts CSS -->
          <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/plugins/morris.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

        <!-- Custom Fonts -->
          <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">

          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
          <!--[if lt IE 9]>
              <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
              <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
          <![endif]-->

        ";
        
        $__internal_d8ed1d13e431f056c51255e391ae9fade62d84f9f322acde1d4820a8b5624e50->leave($__internal_d8ed1d13e431f056c51255e391ae9fade62d84f9f322acde1d4820a8b5624e50_prof);

    }

    // line 34
    public function block_body($context, array $blocks = array())
    {
        $__internal_9c63bfe63472a4ca7e324779acc57e938774df8e0d53d6289c3b4ff502fff373 = $this->env->getExtension("native_profiler");
        $__internal_9c63bfe63472a4ca7e324779acc57e938774df8e0d53d6289c3b4ff502fff373->enter($__internal_9c63bfe63472a4ca7e324779acc57e938774df8e0d53d6289c3b4ff502fff373_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 35
        echo "        
            <div id=\"wrapper\">

        <!-- Navigation -->
        <nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("principal");
        echo "\">Hope</a>
            </div>
          
            ";
        // line 51
        $this->displayBlock('topmenu', $context, $blocks);
        // line 54
        echo "            
            ";
        // line 55
        $this->displayBlock('sidemenu', $context, $blocks);
        // line 58
        echo "           
            <!-- /.navbar-collapse -->
        </nav>

        <div id=\"page-wrapper\">

            <div class=\"container-fluid\">
              ";
        // line 65
        $this->loadTemplate("::messages.html.twig", "::base.html.twig", 65)->display($context);
        // line 66
        echo "              ";
        $this->displayBlock('container', $context, $blocks);
        // line 68
        echo "
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
        
        
        
        ";
        
        $__internal_9c63bfe63472a4ca7e324779acc57e938774df8e0d53d6289c3b4ff502fff373->leave($__internal_9c63bfe63472a4ca7e324779acc57e938774df8e0d53d6289c3b4ff502fff373_prof);

    }

    // line 51
    public function block_topmenu($context, array $blocks = array())
    {
        $__internal_047a60d0d3dde159888b63d541a33d55e3571aa3d45ae04dd9e381620d84d9b4 = $this->env->getExtension("native_profiler");
        $__internal_047a60d0d3dde159888b63d541a33d55e3571aa3d45ae04dd9e381620d84d9b4->enter($__internal_047a60d0d3dde159888b63d541a33d55e3571aa3d45ae04dd9e381620d84d9b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "topmenu"));

        // line 52
        echo "                
            ";
        
        $__internal_047a60d0d3dde159888b63d541a33d55e3571aa3d45ae04dd9e381620d84d9b4->leave($__internal_047a60d0d3dde159888b63d541a33d55e3571aa3d45ae04dd9e381620d84d9b4_prof);

    }

    // line 55
    public function block_sidemenu($context, array $blocks = array())
    {
        $__internal_0de94bbf65aac958ceec186c7333ac69933126dba542c1ebfb95d59ff5cbdc38 = $this->env->getExtension("native_profiler");
        $__internal_0de94bbf65aac958ceec186c7333ac69933126dba542c1ebfb95d59ff5cbdc38->enter($__internal_0de94bbf65aac958ceec186c7333ac69933126dba542c1ebfb95d59ff5cbdc38_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidemenu"));

        // line 56
        echo "                
            ";
        
        $__internal_0de94bbf65aac958ceec186c7333ac69933126dba542c1ebfb95d59ff5cbdc38->leave($__internal_0de94bbf65aac958ceec186c7333ac69933126dba542c1ebfb95d59ff5cbdc38_prof);

    }

    // line 66
    public function block_container($context, array $blocks = array())
    {
        $__internal_d6c700dc5098079a6a89a0a32fc202cadaab49ea77e9cd8b1ea78c0a116ffbad = $this->env->getExtension("native_profiler");
        $__internal_d6c700dc5098079a6a89a0a32fc202cadaab49ea77e9cd8b1ea78c0a116ffbad->enter($__internal_d6c700dc5098079a6a89a0a32fc202cadaab49ea77e9cd8b1ea78c0a116ffbad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 67
        echo "              ";
        
        $__internal_d6c700dc5098079a6a89a0a32fc202cadaab49ea77e9cd8b1ea78c0a116ffbad->leave($__internal_d6c700dc5098079a6a89a0a32fc202cadaab49ea77e9cd8b1ea78c0a116ffbad_prof);

    }

    // line 81
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_fca102c7e0b4dce49c84a82068d9ab9b323a850cf3258dacf3e48ed6bc48a6dd = $this->env->getExtension("native_profiler");
        $__internal_fca102c7e0b4dce49c84a82068d9ab9b323a850cf3258dacf3e48ed6bc48a6dd->enter($__internal_fca102c7e0b4dce49c84a82068d9ab9b323a850cf3258dacf3e48ed6bc48a6dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 82
        echo "          <!-- jQuery -->
          <script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
      
          <!-- Bootstrap Core JavaScript -->
          <script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
          <script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/admin.js"), "html", null, true);
        echo "\"></script>
          <script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.validate.min.js"), "html", null, true);
        echo "\"></script> 
          <script src=\"//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js\"></script>
          <script type=\"text/javascript\">
            \$('select').select2();
          </script>
        ";
        
        $__internal_fca102c7e0b4dce49c84a82068d9ab9b323a850cf3258dacf3e48ed6bc48a6dd->leave($__internal_fca102c7e0b4dce49c84a82068d9ab9b323a850cf3258dacf3e48ed6bc48a6dd_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  256 => 88,  252 => 87,  248 => 86,  242 => 83,  239 => 82,  233 => 81,  226 => 67,  220 => 66,  212 => 56,  206 => 55,  198 => 52,  192 => 51,  173 => 68,  170 => 66,  168 => 65,  159 => 58,  157 => 55,  154 => 54,  152 => 51,  146 => 48,  131 => 35,  125 => 34,  108 => 21,  102 => 18,  97 => 16,  93 => 15,  87 => 12,  84 => 11,  78 => 10,  66 => 9,  57 => 94,  54 => 81,  52 => 34,  45 => 31,  43 => 10,  39 => 9,  29 => 1,);
    }
}

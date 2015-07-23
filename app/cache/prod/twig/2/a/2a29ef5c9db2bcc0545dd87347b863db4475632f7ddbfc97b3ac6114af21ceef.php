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
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo "Hope - Administrador";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
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
    }

    // line 34
    public function block_body($context, array $blocks = array())
    {
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
    }

    // line 51
    public function block_topmenu($context, array $blocks = array())
    {
        // line 52
        echo "                
            ";
    }

    // line 55
    public function block_sidemenu($context, array $blocks = array())
    {
        // line 56
        echo "                
            ";
    }

    // line 66
    public function block_container($context, array $blocks = array())
    {
        // line 67
        echo "              ";
    }

    // line 81
    public function block_javascripts($context, array $blocks = array())
    {
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
        return array (  211 => 88,  207 => 87,  203 => 86,  197 => 83,  194 => 82,  191 => 81,  187 => 67,  184 => 66,  179 => 56,  176 => 55,  171 => 52,  168 => 51,  152 => 68,  149 => 66,  147 => 65,  138 => 58,  136 => 55,  133 => 54,  131 => 51,  125 => 48,  110 => 35,  107 => 34,  93 => 21,  87 => 18,  82 => 16,  78 => 15,  72 => 12,  69 => 11,  66 => 10,  60 => 9,  54 => 94,  51 => 81,  49 => 34,  42 => 31,  40 => 10,  36 => 9,  26 => 1,);
    }
}

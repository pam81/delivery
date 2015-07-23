<?php

/* ::loginBase.html.twig */
class __TwigTemplate_90bea1c838e6418f966ff112e29c033557c595df2b3c8441ff142be407127116 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'container' => array($this, 'block_container'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_59b76672bab4a592c0bc9b371219708742c6a655f626fb451066524b8f970f06 = $this->env->getExtension("native_profiler");
        $__internal_59b76672bab4a592c0bc9b371219708742c6a655f626fb451066524b8f970f06->enter($__internal_59b76672bab4a592c0bc9b371219708742c6a655f626fb451066524b8f970f06_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::loginBase.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\">
\t\t<meta charset=\"utf-8\">
\t   <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
\t\t ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" >
\t\t
\t</head>
\t<body>
 
";
        // line 27
        $this->displayBlock('container', $context, $blocks);
        // line 30
        echo "
\t<!-- script references -->
\t
\t
    ";
        // line 34
        $this->displayBlock('javascripts', $context, $blocks);
        // line 43
        echo "\t</body>
</html>";
        
        $__internal_59b76672bab4a592c0bc9b371219708742c6a655f626fb451066524b8f970f06->leave($__internal_59b76672bab4a592c0bc9b371219708742c6a655f626fb451066524b8f970f06_prof);

    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        $__internal_91ec9c76678248f92e5651c17e6c11eb4a9ff19ce00cb8d95dfcbe85f916d011 = $this->env->getExtension("native_profiler");
        $__internal_91ec9c76678248f92e5651c17e6c11eb4a9ff19ce00cb8d95dfcbe85f916d011->enter($__internal_91ec9c76678248f92e5651c17e6c11eb4a9ff19ce00cb8d95dfcbe85f916d011_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Zona Delivery - Login";
        
        $__internal_91ec9c76678248f92e5651c17e6c11eb4a9ff19ce00cb8d95dfcbe85f916d011->leave($__internal_91ec9c76678248f92e5651c17e6c11eb4a9ff19ce00cb8d95dfcbe85f916d011_prof);

    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_97d59d046e341cdbd86771172af87bbae0c7237bd73be18aa79117734133f22d = $this->env->getExtension("native_profiler");
        $__internal_97d59d046e341cdbd86771172af87bbae0c7237bd73be18aa79117734133f22d->enter($__internal_97d59d046e341cdbd86771172af87bbae0c7237bd73be18aa79117734133f22d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 11
        echo "         <!-- Bootstrap Core CSS -->
          <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
         <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/styles.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <!-- Custom Fonts -->
          <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
         
          <!--[if lt IE 9]>
            <script src=\"//html5shim.googlecode.com/svn/trunk/html5.js\"></script>
          <![endif]-->

        ";
        
        $__internal_97d59d046e341cdbd86771172af87bbae0c7237bd73be18aa79117734133f22d->leave($__internal_97d59d046e341cdbd86771172af87bbae0c7237bd73be18aa79117734133f22d_prof);

    }

    // line 27
    public function block_container($context, array $blocks = array())
    {
        $__internal_5d0c27f21ede9bf4b95ea32018f504c68b40556f845ec7c1d24fb320fcee9de7 = $this->env->getExtension("native_profiler");
        $__internal_5d0c27f21ede9bf4b95ea32018f504c68b40556f845ec7c1d24fb320fcee9de7->enter($__internal_5d0c27f21ede9bf4b95ea32018f504c68b40556f845ec7c1d24fb320fcee9de7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "container"));

        // line 28
        echo "
";
        
        $__internal_5d0c27f21ede9bf4b95ea32018f504c68b40556f845ec7c1d24fb320fcee9de7->leave($__internal_5d0c27f21ede9bf4b95ea32018f504c68b40556f845ec7c1d24fb320fcee9de7_prof);

    }

    // line 34
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f0513a2ae44c691715b8821f4496e4b45c68e87e21dfdfc4ec659ba8705eb76f = $this->env->getExtension("native_profiler");
        $__internal_f0513a2ae44c691715b8821f4496e4b45c68e87e21dfdfc4ec659ba8705eb76f->enter($__internal_f0513a2ae44c691715b8821f4496e4b45c68e87e21dfdfc4ec659ba8705eb76f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 35
        echo "          <!-- jQuery -->
          <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
      
          <!-- Bootstrap Core JavaScript -->
          <script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
           <script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.validate.min.js"), "html", null, true);
        echo "\"></script> 
        
        ";
        
        $__internal_f0513a2ae44c691715b8821f4496e4b45c68e87e21dfdfc4ec659ba8705eb76f->leave($__internal_f0513a2ae44c691715b8821f4496e4b45c68e87e21dfdfc4ec659ba8705eb76f_prof);

    }

    public function getTemplateName()
    {
        return "::loginBase.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 40,  142 => 39,  136 => 36,  133 => 35,  127 => 34,  119 => 28,  113 => 27,  99 => 15,  94 => 13,  90 => 12,  87 => 11,  81 => 10,  69 => 6,  61 => 43,  59 => 34,  53 => 30,  51 => 27,  42 => 22,  40 => 10,  33 => 6,  26 => 1,);
    }
}

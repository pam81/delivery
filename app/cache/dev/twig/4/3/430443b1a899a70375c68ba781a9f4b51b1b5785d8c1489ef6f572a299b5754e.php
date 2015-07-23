<?php

/* ::topmenu.html.twig */
class __TwigTemplate_430443b1a899a70375c68ba781a9f4b51b1b5785d8c1489ef6f572a299b5754e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ccd36c563bb83b494c5957061b969fa7e98f67153d8247b7ec4b203722a16557 = $this->env->getExtension("native_profiler");
        $__internal_ccd36c563bb83b494c5957061b969fa7e98f67153d8247b7ec4b203722a16557->enter($__internal_ccd36c563bb83b494c5957061b969fa7e98f67153d8247b7ec4b203722a16557_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::topmenu.html.twig"));

        // line 1
        echo "  <!-- Top Menu Items -->
            <ul class=\"nav navbar-right top-nav\">
                ";
        // line 3
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 4
            echo "                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> ";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
            echo " <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li>
                            <a href=\"";
            // line 8
            echo $this->env->getExtension('routing')->getPath("profile");
            echo "\"><i class=\"fa fa-fw fa-user\"></i> Perfil</a>
                        </li>
                        <li class=\"divider\"></li>
                        <li>
                            <a href=\"";
            // line 12
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\"><i class=\"fa fa-fw fa-power-off\"></i> Salir</a>
                        </li>
                    </ul>
                </li>
               ";
        }
        // line 16
        echo " 
            </ul>
";
        
        $__internal_ccd36c563bb83b494c5957061b969fa7e98f67153d8247b7ec4b203722a16557->leave($__internal_ccd36c563bb83b494c5957061b969fa7e98f67153d8247b7ec4b203722a16557_prof);

    }

    public function getTemplateName()
    {
        return "::topmenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 16,  44 => 12,  37 => 8,  31 => 5,  28 => 4,  26 => 3,  22 => 1,);
    }
}

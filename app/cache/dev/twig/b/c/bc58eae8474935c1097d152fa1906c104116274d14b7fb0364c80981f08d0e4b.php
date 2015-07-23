<?php

/* ::sidemenu.html.twig */
class __TwigTemplate_bc58eae8474935c1097d152fa1906c104116274d14b7fb0364c80981f08d0e4b extends Twig_Template
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
        $__internal_c4444b86506b6459e3af59ddf441f2735e554b3a71fae453de8e1afaf27cbacc = $this->env->getExtension("native_profiler");
        $__internal_c4444b86506b6459e3af59ddf441f2735e554b3a71fae453de8e1afaf27cbacc->enter($__internal_c4444b86506b6459e3af59ddf441f2735e554b3a71fae453de8e1afaf27cbacc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::sidemenu.html.twig"));

        // line 1
        echo " <!-- Sidebar Menu Items  -->
            <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
                <ul class=\"nav navbar-nav side-nav\">
                    <li class=\"active\">
                        <a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("principal");
        echo "\"><i class=\"fa fa-fw fa-dashboard\"></i> Dashboard</a>
                    </li>
                    ";
        // line 7
        if ($this->env->getExtension('security')->isGranted("ROLE_VIEWUSER")) {
            // line 8
            echo "                    <li>
                        <a href=\"";
            // line 9
            echo $this->env->getExtension('routing')->getPath("user");
            echo "\"><i class=\"fa fa-users\"></i> Usuarios</a>
                    </li>
                    ";
        }
        // line 12
        echo "                    ";
        if (((($this->env->getExtension('security')->isGranted("ROLE_SETEO") || $this->env->getExtension('security')->isGranted("ROLE_ADMIN")) || $this->env->getExtension('security')->isGranted("ROLE_VIEWZONA")) || $this->env->getExtension('security')->isGranted("ROLE_VIEWBARRIO"))) {
            // line 15
            echo "                      <li>
                        <a href=\"javascript:;\" data-toggle=\"collapse\" data-target=\"#demo\"><i class=\"fa fa-fw fa-arrows-v\"></i> Configuración <i class=\"fa fa-fw fa-caret-down\"></i></a>
                        <ul id=\"demo\" class=\"collapse\">
                            ";
            // line 18
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 19
                echo "                            <li>
                                <a href=\"";
                // line 20
                echo $this->env->getExtension('routing')->getPath("group");
                echo "\">Grupos</a>
                            </li>
                            ";
            }
            // line 23
            echo "                            ";
            if ($this->env->getExtension('security')->isGranted("ROLE_SETEO")) {
                // line 24
                echo "                            <li>
                                <a href=\"";
                // line 25
                echo $this->env->getExtension('routing')->getPath("seteo");
                echo "\">Seteo</a>
                            </li>
                            ";
            }
            // line 28
            echo "                            ";
            if ($this->env->getExtension('security')->isGranted("ROLE_VIEWZONA")) {
                // line 29
                echo "                            <li>
                                <a href=\"";
                // line 30
                echo $this->env->getExtension('routing')->getPath("zona");
                echo "\">Zona</a>
                            </li>
                            ";
            }
            // line 33
            echo "                            
                            ";
            // line 34
            if ($this->env->getExtension('security')->isGranted("ROLE_VIEWBARRIO")) {
                // line 35
                echo "                            <li>
                                <a href=\"";
                // line 36
                echo $this->env->getExtension('routing')->getPath("barrio");
                echo "\">Localidad / Barrios</a>
                            </li>
                            ";
            }
            // line 39
            echo "                        </ul>
                    </li>
                     ";
        }
        // line 42
        echo "                     
                </ul>
            </div>";
        
        $__internal_c4444b86506b6459e3af59ddf441f2735e554b3a71fae453de8e1afaf27cbacc->leave($__internal_c4444b86506b6459e3af59ddf441f2735e554b3a71fae453de8e1afaf27cbacc_prof);

    }

    public function getTemplateName()
    {
        return "::sidemenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 42,  101 => 39,  95 => 36,  92 => 35,  90 => 34,  87 => 33,  81 => 30,  78 => 29,  75 => 28,  69 => 25,  66 => 24,  63 => 23,  57 => 20,  54 => 19,  52 => 18,  47 => 15,  44 => 12,  38 => 9,  35 => 8,  33 => 7,  28 => 5,  22 => 1,);
    }
}

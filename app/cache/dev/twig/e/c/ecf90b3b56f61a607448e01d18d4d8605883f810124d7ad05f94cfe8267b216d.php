<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_ecf90b3b56f61a607448e01d18d4d8605883f810124d7ad05f94cfe8267b216d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f252fc43f7d30b09fba3409dc22dc6873e9f360f7a92b0863ce51c3b1c772f4b = $this->env->getExtension("native_profiler");
        $__internal_f252fc43f7d30b09fba3409dc22dc6873e9f360f7a92b0863ce51c3b1c772f4b->enter($__internal_f252fc43f7d30b09fba3409dc22dc6873e9f360f7a92b0863ce51c3b1c772f4b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f252fc43f7d30b09fba3409dc22dc6873e9f360f7a92b0863ce51c3b1c772f4b->leave($__internal_f252fc43f7d30b09fba3409dc22dc6873e9f360f7a92b0863ce51c3b1c772f4b_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_dcee7a7e496e64857868eebeda4c359ab7d8278bebbcc275b637912cee3d99ca = $this->env->getExtension("native_profiler");
        $__internal_dcee7a7e496e64857868eebeda4c359ab7d8278bebbcc275b637912cee3d99ca->enter($__internal_dcee7a7e496e64857868eebeda4c359ab7d8278bebbcc275b637912cee3d99ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_dcee7a7e496e64857868eebeda4c359ab7d8278bebbcc275b637912cee3d99ca->leave($__internal_dcee7a7e496e64857868eebeda4c359ab7d8278bebbcc275b637912cee3d99ca_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_1ec77b94b55b23d76bd62dc1b58d5157adaf9453f62b0686cdb3c49976aa464f = $this->env->getExtension("native_profiler");
        $__internal_1ec77b94b55b23d76bd62dc1b58d5157adaf9453f62b0686cdb3c49976aa464f->enter($__internal_1ec77b94b55b23d76bd62dc1b58d5157adaf9453f62b0686cdb3c49976aa464f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_1ec77b94b55b23d76bd62dc1b58d5157adaf9453f62b0686cdb3c49976aa464f->leave($__internal_1ec77b94b55b23d76bd62dc1b58d5157adaf9453f62b0686cdb3c49976aa464f_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_00b491b0509faa307c665bb9bbc58db8f1c354bffceaec34f118115fd3f7f9dd = $this->env->getExtension("native_profiler");
        $__internal_00b491b0509faa307c665bb9bbc58db8f1c354bffceaec34f118115fd3f7f9dd->enter($__internal_00b491b0509faa307c665bb9bbc58db8f1c354bffceaec34f118115fd3f7f9dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_00b491b0509faa307c665bb9bbc58db8f1c354bffceaec34f118115fd3f7f9dd->leave($__internal_00b491b0509faa307c665bb9bbc58db8f1c354bffceaec34f118115fd3f7f9dd_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}

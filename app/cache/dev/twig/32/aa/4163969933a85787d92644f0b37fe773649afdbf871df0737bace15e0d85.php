<?php

/* ::base.html.twig */
class __TwigTemplate_32aa4163969933a85787d92644f0b37fe773649afdbf871df0737bace15e0d85 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        // line 14
        echo "    </body>
    ";
        // line 15
        $this->displayBlock('javascripts', $context, $blocks);
        // line 20
        echo "</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "        ";
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "        ";
    }

    // line 15
    public function block_javascripts($context, array $blocks = array())
    {
        // line 16
        echo "        <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/phppracticaltestweb/js/jquery-1.11.0.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/phppracticaltestweb/js/jquery-2.1.0.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/phppracticaltestweb/js/jscripts.js"), "html", null, true);
        echo "\"></script>
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
        return array (  87 => 18,  83 => 17,  78 => 16,  75 => 15,  71 => 13,  68 => 12,  64 => 8,  61 => 7,  55 => 6,  50 => 20,  48 => 15,  45 => 14,  43 => 12,  36 => 9,  34 => 7,  30 => 6,  23 => 1,);
    }
}

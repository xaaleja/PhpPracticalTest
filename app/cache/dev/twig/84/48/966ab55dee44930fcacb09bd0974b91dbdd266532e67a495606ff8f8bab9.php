<?php

/* ::frontend.html.twig */
class __TwigTemplate_8448966ab55dee44930fcacb09bd0974b91dbdd266532e67a495606ff8f8bab9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'article' => array($this, 'block_article'),
            'aside' => array($this, 'block_aside'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/phppracticaltestweb/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    <header id=\"cabecera\">
    </header>
    <div id=\"content\">
              ";
        // line 11
        $this->displayBlock('article', $context, $blocks);
        // line 12
        echo "              ";
        $this->displayBlock('aside', $context, $blocks);
        // line 14
        echo "    </div>
";
    }

    // line 11
    public function block_article($context, array $blocks = array())
    {
    }

    // line 12
    public function block_aside($context, array $blocks = array())
    {
        // line 13
        echo "              ";
    }

    public function getTemplateName()
    {
        return "::frontend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 13,  64 => 12,  59 => 11,  54 => 14,  51 => 12,  49 => 11,  44 => 8,  41 => 7,  34 => 4,  31 => 3,);
    }
}

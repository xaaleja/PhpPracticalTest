<?php

/* ::frontend.html.twig */
class __TwigTemplate_8448966ab55dee44930fcacb09bd0974b91dbdd266532e67a495606ff8f8bab9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <header id=\"cabecera\">

    </header>
    <div id=\"content\">
              ";
        // line 8
        $this->displayBlock('article', $context, $blocks);
        // line 9
        echo "

              ";
        // line 11
        $this->displayBlock('aside', $context, $blocks);
        // line 14
        echo "    </div>
";
    }

    // line 8
    public function block_article($context, array $blocks = array())
    {
    }

    // line 11
    public function block_aside($context, array $blocks = array())
    {
        // line 12
        echo "
              ";
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
        return array (  60 => 12,  57 => 11,  52 => 8,  47 => 14,  45 => 11,  41 => 9,  39 => 8,  33 => 4,  30 => 3,);
    }
}

<?php

/* PhpPracticalTestWebBundle:Default:editProducts.html.twig */
class __TwigTemplate_05dd7e8186d341a7ca043c25508b347210363d9495abb799692205cca3755921 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>Product</h1>
    <div id=\"showProducts\">
        <ul>
            <li><strong>Name</strong></li>
            <li><strong>Price</strong></li>
            <li><strong>Updated at</strong></li>
            <br>
        </ul>
        <ul id=\"editList\">
            <li id=\"liName\">";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "productName", array()), "html", null, true);
        echo "</li>
            <li id=\"liPrice\">";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "productPrice", array()), "html", null, true);
        echo "</li>
            <li id=\"liDate\">";
        // line 15
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "updatedAt", array()), "Y-m-d"), "html", null, true);
        echo "</li>
        </ul>
    </div>
    <br>
    <br>
    <div id=\"formProducts\">
        <h2>Edit</h2>
        <form id=\"editForm\" action=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("update_product", array("id" => $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array()))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " class=\"edit-product-form\">
            ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "productName", array()), 'row');
        echo "
            ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "productPrice", array()), 'row');
        echo "
            ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "category_id", array()), 'row');
        echo "
            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

            <input id=\"submitEdit\" type=\"submit\" value=\"Submit\" />
        </form>
    </div>
    <div id=\"homepageLink\">
        <a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">Back to homepage</a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "PhpPracticalTestWebBundle:Default:editProducts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 33,  82 => 27,  78 => 26,  74 => 25,  70 => 24,  66 => 23,  60 => 22,  50 => 15,  46 => 14,  42 => 13,  31 => 4,  28 => 3,);
    }
}

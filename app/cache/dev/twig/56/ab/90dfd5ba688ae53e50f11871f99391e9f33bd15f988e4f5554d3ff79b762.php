<?php

/* PhpPracticalTestWebBundle:Default:showProducts.html.twig */
class __TwigTemplate_56ab90dfd5ba688ae53e50f11871f99391e9f33bd15f988e4f5554d3ff79b762 extends Twig_Template
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
        echo "    <h1>Products</h1>
    <div id=\"showProducts\">
        <ul>
            <li id=\"formTitle\"><strong>Name</strong></li>
            <li><strong>Price</strong></li>
            <li><strong>Updated at</strong></li>
            <br>
        </ul>
        ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 13
            echo "            <ul id=\"product";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", array()), "html", null, true);
            echo "\">
                <li>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "productName", array()), "html", null, true);
            echo "</li>
                <li>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "productPrice", array()), "html", null, true);
            echo "</li>
                <li>";
            // line 16
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["p"], "updatedAt", array()), "Y-m-d"), "html", null, true);
            echo "</li>
                <li class=\"deleteLink\">
                    <form id=\"deleteForm";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", array()), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("delete_product", array("id" => $this->getAttribute($context["p"], "id", array()))), "html", null, true);
            echo "\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formDelete"]) ? $context["formDelete"] : $this->getContext($context, "formDelete")), 'enctype');
            echo " class=\"delete-form\">
                        <input type=\"submit\" id=\"option\" value=\"Delete\" />
                        <input type=\"hidden\" id=\"idProduct\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", array()), "html", null, true);
            echo "\" />
                    </form>
                </li>
                <li><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("update_product", array("id" => $this->getAttribute($context["p"], "id", array()))), "html", null, true);
            echo "\">Edit</a></li>
                <br>
            </ul>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "    </div>
    <br>
    <div id=\"formProducts\">
        <h2>Add a new product</h2>
        <form id=\"newForm\" action=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("add_product");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " class=\"product-form\">
            ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "

            ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "productName", array()), 'row');
        echo "
            ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "productPrice", array()), 'row');
        echo "
            ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "category_id", array()), 'row');
        echo "

            ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

            <input id=\"submitNewProduct\" type=\"submit\" value=\"Submit\" />
        </form>
    </div>
    <div id=\"output\"></div>
";
    }

    public function getTemplateName()
    {
        return "PhpPracticalTestWebBundle:Default:showProducts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 38,  113 => 36,  109 => 35,  105 => 34,  100 => 32,  94 => 31,  88 => 27,  78 => 23,  72 => 20,  63 => 18,  58 => 16,  54 => 15,  50 => 14,  45 => 13,  41 => 12,  31 => 4,  28 => 3,);
    }
}

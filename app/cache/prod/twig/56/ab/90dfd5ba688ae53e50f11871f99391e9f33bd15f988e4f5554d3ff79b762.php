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

    ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 7
            echo "        <ul>
            <li>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", array()), "html", null, true);
            echo "</li>
            <li>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "categoryId", array()), "html", null, true);
            echo "</li>
            <li>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "productName", array()), "html", null, true);
            echo "</li>
            <li>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "productPrice", array()), "html", null, true);
            echo "</li>
            <li>";
            // line 12
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["p"], "updatedAt", array()), "Y-m-d"), "html", null, true);
            echo "</li>
            <li> <a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("delete_product", array("id" => $this->getAttribute($context["p"], "id", array()))), "html", null, true);
            echo "\">Delete</a></li>
            <br>
        </ul>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "
    <h2>Add a new product</h1>
    <div class=\"products-form\">
        <form action=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " class=\"product-form\">
            ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "

            ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "productName", array()), 'row');
        echo "
            ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "productPrice", array()), 'row');
        echo "
            ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category_id", array()), 'row');
        echo "

            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

            <input type=\"submit\" value=\"Submit\" />
        </form>
    </div>




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
        return array (  101 => 27,  96 => 25,  92 => 24,  88 => 23,  83 => 21,  77 => 20,  72 => 17,  62 => 13,  58 => 12,  54 => 11,  50 => 10,  46 => 9,  42 => 8,  39 => 7,  35 => 6,  31 => 4,  28 => 3,);
    }
}

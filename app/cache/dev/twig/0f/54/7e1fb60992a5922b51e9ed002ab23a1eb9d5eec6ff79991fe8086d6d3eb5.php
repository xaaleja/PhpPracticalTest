<?php

/* PhpPracticalTestApiBundle:Products:newProduct.html.twig */
class __TwigTemplate_0f547e1fb60992a5922b51e9ed002ab23a1eb9d5eec6ff79991fe8086d6d3eb5 extends Twig_Template
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
        // line 1
        echo "<h1>Product Form</h1>
<form action=\"{ { url('api_1_post_product') } }\" method=\"POST\" { { form_enctype(form) } }>
    { { form_widget(form) } }
    <input type=\"submit\" value=\"submit\">
</form>";
    }

    public function getTemplateName()
    {
        return "PhpPracticalTestApiBundle:Products:newProduct.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}

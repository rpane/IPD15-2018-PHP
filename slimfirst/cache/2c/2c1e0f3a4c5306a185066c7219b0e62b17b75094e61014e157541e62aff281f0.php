<?php

/* addme_success.html.twig */
class __TwigTemplate_720447fab3c06dcdb2f68805b8cc5fca406e4ce7da85b5d5e4f2e6c0b48ac7ab extends Twig_Template
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
        echo "<p>You have been added</p>";
    }

    public function getTemplateName()
    {
        return "addme_success.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<p>You have been added</p>", "addme_success.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimfirst\\templates\\addme_success.html.twig");
    }
}

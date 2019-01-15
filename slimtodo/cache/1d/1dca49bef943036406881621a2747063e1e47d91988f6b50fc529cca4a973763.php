<?php

/* fatal_error.html.twig */
class __TwigTemplate_1dc0a480b3301fb712ab2f2e52e0c1d5c8760ecbc8e67b66c216e98e9d3fa5ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "fatal_error.html.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Fatal Error";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    <p>Fatal Error, Ninjas are currently focusing their chi to resolve the issue</p>
    <img src=\"/images/ninja.png\">
";
    }

    public function getTemplateName()
    {
        return "fatal_error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% extends \"master.html.twig\" %}

{% block title %}Fatal Error{% endblock %}

{% block content %}
    <p>Fatal Error, Ninjas are currently focusing their chi to resolve the issue</p>
    <img src=\"/images/ninja.png\">
{% endblock %}
", "fatal_error.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimtodo\\templates\\fatal_error.html.twig");
    }
}

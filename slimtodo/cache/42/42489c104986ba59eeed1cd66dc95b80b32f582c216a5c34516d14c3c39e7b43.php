<?php

/* todoadd_success.html.twig */
class __TwigTemplate_0543844ec9b2ce0e1b81e2e326b16d0f1b2918fb03c4f0db75f096185a5d11d5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "todoadd_success.html.twig", 2);
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
        echo "Add successful";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    <p>Successfully added todo</p>
";
    }

    public function getTemplateName()
    {
        return "todoadd_success.html.twig";
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

{% block title %}Add successful{% endblock %}

{% block content %}
    <p>Successfully added todo</p>
{% endblock %}", "todoadd_success.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimtodo\\templates\\todoadd_success.html.twig");
    }
}

<?php

/* todoedit_success.html.twig */
class __TwigTemplate_4a9cb1a92cc4bd17c66d48974e1337f19073d1883f2eb101361b530732bf6e3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "todoedit_success.html.twig", 2);
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
        echo "Edit successful";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    <p>Successfully edited todo</p>
";
    }

    public function getTemplateName()
    {
        return "todoedit_success.html.twig";
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

{% block title %}Edit successful{% endblock %}

{% block content %}
    <p>Successfully edited todo</p>
{% endblock %}", "todoedit_success.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimtodo\\templates\\todoedit_success.html.twig");
    }
}

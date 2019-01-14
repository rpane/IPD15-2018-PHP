<?php

/* article_view.html.twig */
class __TwigTemplate_01737345a12f038070ddebd8a4bfba06e475b265aa58aa4079b5f160266a4b2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "article_view.html.twig", 2);
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
        echo "Login";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"artHead\">
    <b>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute(($context["a"] ?? null), "title", array()), "html", null, true);
        echo "</b>
    <br>Posted by ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["a"] ?? null), "authorName", array()), "html", null, true);
        echo " on ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["a"] ?? null), "creationTime", array()), "html", null, true);
        echo "<br>
    <div class=\"artBody\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["a"] ?? null), "body", array()), "html", null, true);
        echo "</div>
</div>
    ";
    }

    public function getTemplateName()
    {
        return "article_view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 9,  45 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 4,  11 => 2,);
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
{% extends \"master.html.twig\"%}

{% block title %}Login{% endblock %}
{% block content %}
<div class=\"artHead\">
    <b>{{a.title}}</b>
    <br>Posted by {{a.authorName}} on {{a.creationTime}}<br>
    <div class=\"artBody\">{{a.body}}</div>
</div>
    {% endblock %}", "article_view.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimblog\\templates\\article_view.html.twig");
    }
}

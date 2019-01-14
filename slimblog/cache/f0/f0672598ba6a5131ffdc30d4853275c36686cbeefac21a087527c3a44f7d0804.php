<?php

/* index.html.twig */
class __TwigTemplate_e707f1d4b34f152f7b13ce8b6b6e15ae909a099529e0f4ef32e9ad78085af5da extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "index.html.twig", 1);
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Login";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"artList\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["al"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 7
            echo "        <div class=\"artHead\">
            <b>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["a"], "title", array()), "html", null, true);
            echo "</b>
            <br>Posted by ";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["a"], "authorName", array()), "html", null, true);
            echo " on ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["a"], "creationTime", array()), "html", null, true);
            echo "<br>
            <div class=\"artBody\">";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["a"], "body", array()), "html", null, true);
            echo "</div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "</div>
    ";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 13,  58 => 10,  52 => 9,  48 => 8,  45 => 7,  41 => 6,  38 => 5,  35 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"master.html.twig\"%}

{% block title %}Login{% endblock %}
{% block content %}
<div class=\"artList\">
    {% for a in al %}
        <div class=\"artHead\">
            <b>{{a.title}}</b>
            <br>Posted by {{a.authorName}} on {{a.creationTime}}<br>
            <div class=\"artBody\">{{a.body}}</div>
        </div>
    {% endfor %}
</div>
    {% endblock %}", "index.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimblog\\templates\\index.html.twig");
    }
}

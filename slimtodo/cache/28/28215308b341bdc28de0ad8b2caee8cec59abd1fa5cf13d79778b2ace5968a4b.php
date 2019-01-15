<?php

/* todoList.html.twig */
class __TwigTemplate_6dde007068343b21f60b5941857ffe5a1e509de78bb79642de049eade75b08ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "todoList.html.twig", 1);
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
        echo "Todos";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"todoList\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["al"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 7
            echo "        <div class=\"todoHead\">
            <b>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["a"], "task", array()), "html", null, true);
            echo "</b>
            <br>Due Date: ";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["a"], "dueDate", array()), "html", null, true);
            echo " Completion: ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["a"], "isDone", array()), "html", null, true);
            echo "<br>            
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</div>
    ";
    }

    public function getTemplateName()
    {
        return "todoList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 12,  52 => 9,  48 => 8,  45 => 7,  41 => 6,  38 => 5,  35 => 4,  29 => 3,  11 => 1,);
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

{% block title %}Todos{% endblock %}
{% block content %}
<div class=\"todoList\">
    {% for a in al %}
        <div class=\"todoHead\">
            <b>{{a.task}}</b>
            <br>Due Date: {{a.dueDate}} Completion: {{a.isDone}}<br>            
        </div>
    {% endfor %}
</div>
    {% endblock %}", "todoList.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimtodo\\templates\\todoList.html.twig");
    }
}

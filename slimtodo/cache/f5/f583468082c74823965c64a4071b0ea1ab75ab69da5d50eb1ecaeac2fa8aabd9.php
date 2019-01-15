<?php

/* todoadd.html.twig */
class __TwigTemplate_4ed0ae9eee92a27ca49d7e6ff27d74b17c05d95e5276bb7dcab70bbdf78257ea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "todoadd.html.twig", 1);
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
        echo "Todo List";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if (($context["errorList"] ?? null)) {
            // line 6
            echo "        <ul class=\"error\">
            ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 8
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "        </ul>
    ";
        }
        // line 12
        echo "
    <form method=\"post\">
        Task: <input type=\"text\" name=\"task\"><br>
        Due Date: <input type=\"date\" name=\"dueDate\"><br>
        Completion:   <select name=\"isDone\">
            <option value=\"true\">True</option>
            <option value=\"false\">False</option>
        </select>
        <input type=\"submit\" value=\"Add\">
    </form> 
";
    }

    public function getTemplateName()
    {
        return "todoadd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 12,  57 => 10,  48 => 8,  44 => 7,  41 => 6,  38 => 5,  35 => 4,  29 => 3,  11 => 1,);
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

{% block title %}Todo List{% endblock %}
{% block content %}
    {% if errorList %}
        <ul class=\"error\">
            {% for error in errorList %}
                <li>{{error}}</li>
                {% endfor %}
        </ul>
    {% endif %}

    <form method=\"post\">
        Task: <input type=\"text\" name=\"task\"><br>
        Due Date: <input type=\"date\" name=\"dueDate\"><br>
        Completion:   <select name=\"isDone\">
            <option value=\"true\">True</option>
            <option value=\"false\">False</option>
        </select>
        <input type=\"submit\" value=\"Add\">
    </form> 
{% endblock %}", "todoadd.html.twig", "C:\\xampp\\htdocs\\ipd15\\IPD15-2018-PHP\\slimtodo\\templates\\todoadd.html.twig");
    }
}

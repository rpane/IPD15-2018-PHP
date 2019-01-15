<?php

/* addedit.html.twig */
class __TwigTemplate_3bfc7851e4d184bf061ea682372ed70aeeb483bc6e3ab40e715407e4c98e7343 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "addedit.html.twig", 1);
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
        // line 4
        echo "    ";
        if ((($context["action"] ?? null) == "edit")) {
            // line 5
            echo "        Editing todo
    ";
        } else {
            // line 7
            echo "        Adding todo
    ";
        }
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        if (($context["errorList"] ?? null)) {
            // line 13
            echo "        <ul class=\"error\">
            ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 15
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "        </ul>
    ";
        }
        // line 19
        echo "
    <form method=\"post\">
        Task: <input type=\"text\" name=\"task\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "task", array()), "html", null, true);
        echo "\"><br>
        Due Date: <input type=\"date\" name=\"dueDate\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "dueDate", array()), "html", null, true);
        echo "\"><br>
        Is done: <input type=\"checkbox\" name=\"isDone\" value=\"true\"
                        ";
        // line 24
        if (($this->getAttribute(($context["v"] ?? null), "isDone", array()) == "true")) {
            echo "checked";
        }
        echo "><br>     
        <input type=\"submit\" value=\"";
        // line 25
        if ((($context["action"] ?? null) == "edit")) {
            // line 26
            echo "Save todo";
        } else {
            echo "Add todo";
        }
        echo "\">
    </form> 
";
    }

    public function getTemplateName()
    {
        return "addedit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 26,  90 => 25,  84 => 24,  79 => 22,  75 => 21,  71 => 19,  67 => 17,  58 => 15,  54 => 14,  51 => 13,  48 => 12,  45 => 11,  39 => 7,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
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

{% block title %}
    {% if action == 'edit' %}
        Editing todo
    {% else %}
        Adding todo
    {% endif %}
{% endblock %}

{% block content %}
    {% if errorList %}
        <ul class=\"error\">
            {% for error in errorList %}
                <li>{{error}}</li>
                {% endfor %}
        </ul>
    {% endif %}

    <form method=\"post\">
        Task: <input type=\"text\" name=\"task\" value=\"{{v.task}}\"><br>
        Due Date: <input type=\"date\" name=\"dueDate\" value=\"{{v.dueDate}}\"><br>
        Is done: <input type=\"checkbox\" name=\"isDone\" value=\"true\"
                        {% if v.isDone == 'true' %}checked{% endif %}><br>     
        <input type=\"submit\" value=\"{% if action == 'edit'
           %}Save todo{% else %}Add todo{% endif %}\">
    </form> 
{% endblock %}", "addedit.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimtodo\\templates\\addedit.html.twig");
    }
}

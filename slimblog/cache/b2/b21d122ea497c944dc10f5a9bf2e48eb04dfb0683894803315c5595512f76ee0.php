<?php

/* register.html.twig */
class __TwigTemplate_f7e257a1a833bf21677b6177ffa85ab29287b030c5e1db1c8d9cc8c9d1fb458e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "register.html.twig", 1);
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
        if (($context["errorList"] ?? null)) {
            // line 6
            echo "    <ul class=\"error\">
        ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 8
                echo "            <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "    </ul>
";
        }
        // line 12
        echo "

<form method=\"post\">
    Email: <input type=\"text\" name=\"email\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "email", array()), "html", null, true);
        echo "\"><br>
    Password: <input type=\"password\" name=\"pass1\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "pass1", array()), "html", null, true);
        echo "\"><br>
    Password (repeat): <input type=\"password\" name=\"pass2\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "pass2", array()), "html", null, true);
        echo "\"><br>
    <input type=\"submit\" value=\"Register\">
</form>
";
    }

    public function getTemplateName()
    {
        return "register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 17,  69 => 16,  65 => 15,  60 => 12,  56 => 10,  47 => 8,  43 => 7,  40 => 6,  38 => 5,  35 => 4,  29 => 3,  11 => 1,);
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
{% if errorList %}
    <ul class=\"error\">
        {% for error in errorList %}
            <li>{{error}}</li>
            {% endfor %}
    </ul>
{% endif %}


<form method=\"post\">
    Email: <input type=\"text\" name=\"email\" value=\"{{v.email}}\"><br>
    Password: <input type=\"password\" name=\"pass1\" value=\"{{v.pass1}}\"><br>
    Password (repeat): <input type=\"password\" name=\"pass2\" value=\"{{v.pass2}}\"><br>
    <input type=\"submit\" value=\"Register\">
</form>
{% endblock %}", "register.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimblog\\templates\\register.html.twig");
    }
}

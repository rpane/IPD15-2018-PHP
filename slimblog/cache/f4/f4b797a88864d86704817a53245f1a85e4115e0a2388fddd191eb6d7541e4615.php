<?php

/* login.html.twig */
class __TwigTemplate_a88c3403678bcf16ead73a383a773ad10afdf11571cf29ee0917f1b8f6d58a63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "login.html.twig", 1);
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
        echo "    ";
        if (($context["error"] ?? null)) {
            // line 6
            echo "        <p class=\"error\">Login credentials invalid. 
            Try again or <a href=\"/register\">Register</a></p>
    ";
        }
        // line 9
        echo "
    <form method=\"post\">
        Email: <input type=\"text\" name=\"email\"><br>
        Password: <input type=\"password\" name=\"password\"><br>   
        <input type=\"submit\" value=\"Login\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 9,  41 => 6,  38 => 5,  35 => 4,  29 => 3,  11 => 1,);
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
    {% if error %}
        <p class=\"error\">Login credentials invalid. 
            Try again or <a href=\"/register\">Register</a></p>
    {% endif %}

    <form method=\"post\">
        Email: <input type=\"text\" name=\"email\"><br>
        Password: <input type=\"password\" name=\"password\"><br>   
        <input type=\"submit\" value=\"Login\">
    </form>
{% endblock %}", "login.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimblog\\templates\\login.html.twig");
    }
}

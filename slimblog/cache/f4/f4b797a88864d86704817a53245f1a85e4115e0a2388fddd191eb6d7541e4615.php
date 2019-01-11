<?php

/* login.html.twig */
class __TwigTemplate_a88c3403678bcf16ead73a383a773ad10afdf11571cf29ee0917f1b8f6d58a63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (($context["error"] ?? null)) {
            // line 2
            echo "    <p>Login credentials invalid</p>
";
        }
        // line 4
        echo "
<form method=\"post\">
    Email: <input type=\"text\" name=\"email\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "email", array()), "html", null, true);
        echo "\"><br>
    Password: <input type=\"password\" name=\"pass1\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "pass1", array()), "html", null, true);
        echo "\"><br>   
    <input type=\"submit\" value=\"Login\">
</form>";
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
        return array (  33 => 7,  29 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if error %}
    <p>Login credentials invalid</p>
{% endif %}

<form method=\"post\">
    Email: <input type=\"text\" name=\"email\" value=\"{{v.email}}\"><br>
    Password: <input type=\"password\" name=\"pass1\" value=\"{{v.pass1}}\"><br>   
    <input type=\"submit\" value=\"Login\">
</form>", "login.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimblog\\templates\\login.html.twig");
    }
}

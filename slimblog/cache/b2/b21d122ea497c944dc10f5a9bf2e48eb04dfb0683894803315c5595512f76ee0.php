<?php

/* register.html.twig */
class __TwigTemplate_f7e257a1a833bf21677b6177ffa85ab29287b030c5e1db1c8d9cc8c9d1fb458e extends Twig_Template
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
        if (($context["errorList"] ?? null)) {
            // line 2
            echo "    <ul>
        ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 4
                echo "            <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 6
            echo "    </ul>
";
        }
        // line 8
        echo "

<form method=\"post\">
    Email: <input type=\"text\" name=\"email\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "email", array()), "html", null, true);
        echo "\"><br>
    Password: <input type=\"password\" name=\"pass1\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["v"] ?? null), "pass1", array()), "html", null, true);
        echo "\"><br>
    Password (repeat): <input type=\"password\" name=\"pass2\" value=\"";
        // line 13
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
        return array (  54 => 13,  50 => 12,  46 => 11,  41 => 8,  37 => 6,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if errorList %}
    <ul>
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
", "register.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimblog\\templates\\register.html.twig");
    }
}

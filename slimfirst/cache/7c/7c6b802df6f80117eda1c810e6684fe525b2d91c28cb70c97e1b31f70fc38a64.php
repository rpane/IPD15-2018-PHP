<?php

/* random.html.twig */
class __TwigTemplate_3502679b375060cc22eef6a72ac123c899952421238de877b38fc3fe32ca7a56 extends Twig_Template
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
";
        // line 9
        if (($context["rndList"] ?? null)) {
            // line 10
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rndList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["num"]) {
                // line 11
                echo "        ";
                echo twig_escape_filter($this->env, $context["num"], "html", null, true);
                echo ",
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['num'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 14
        echo "
<form method=\"post\">
    Min: <input type=\"number\" name=\"min\"><br>
    Max: <input type=\"number\" name=\"max\"><br>
    Count: <input type=\"number\" name=\"count\"><br>
    <input type=\"submit\" value=\"Generate\">
</form>
";
    }

    public function getTemplateName()
    {
        return "random.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 14,  51 => 11,  46 => 10,  44 => 9,  41 => 8,  37 => 6,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
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

{% if rndList %}
    {% for num in rndList %}
        {{num}},
    {% endfor %}
{% endif %}

<form method=\"post\">
    Min: <input type=\"number\" name=\"min\"><br>
    Max: <input type=\"number\" name=\"max\"><br>
    Count: <input type=\"number\" name=\"count\"><br>
    <input type=\"submit\" value=\"Generate\">
</form>
", "random.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimfirst\\templates\\random.html.twig");
    }
}

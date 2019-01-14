<?php

/* articleadd.html.twig */
class __TwigTemplate_cb7bc812c01590405de49d2d2d0ef6d7237c1ec20ea4cdedfacaeb2f404129cc extends Twig_Template
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
    Title: <input type=\"text\" name=\"title\"><br>
    <textarea name=\"body\"></textarea><br>
    <input type=\"submit\" value=\"Publish Article\">
</form> 
";
    }

    public function getTemplateName()
    {
        return "articleadd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 8,  37 => 6,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
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
    Title: <input type=\"text\" name=\"title\"><br>
    <textarea name=\"body\"></textarea><br>
    <input type=\"submit\" value=\"Publish Article\">
</form> 
", "articleadd.html.twig", "C:\\xampp\\htdocs\\ipd15\\IPD15-2018-PHP\\slimblog\\templates\\articleadd.html.twig");
    }
}

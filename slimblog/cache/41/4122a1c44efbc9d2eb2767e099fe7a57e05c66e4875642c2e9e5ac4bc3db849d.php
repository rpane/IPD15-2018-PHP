<?php

/* register_success.html.twig */
class __TwigTemplate_29bb8193a5c7b8223170cf80c3e50ec38301b27433fee09e5520e88323c5ce5c extends Twig_Template
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
        echo "<p>Successfuly registered!</p>
";
    }

    public function getTemplateName()
    {
        return "register_success.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<p>Successfuly registered!</p>
", "register_success.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimblog\\templates\\register_success.html.twig");
    }
}

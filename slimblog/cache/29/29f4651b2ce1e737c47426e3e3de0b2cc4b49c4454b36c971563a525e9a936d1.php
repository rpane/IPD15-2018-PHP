<?php

/* login_success.html.twig */
class __TwigTemplate_b49c0a87f48049107a7850348cf7d4066d6bb46e9dcd0f80ccc39f77f1a49dae extends Twig_Template
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
        echo "<p>Logged successful</p>
";
    }

    public function getTemplateName()
    {
        return "login_success.html.twig";
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
        return new Twig_Source("<p>Logged successful</p>
", "login_success.html.twig", "C:\\xampp\\htdocs\\ipd15\\IPD15-2018-PHP\\slimblog\\templates\\login_success.html.twig");
    }
}

<?php

/* logout.html.twig */
class __TwigTemplate_a4fc12243e147730ad1653b17daa623c717c3af1945e7564b48b5dbdf668a5e9 extends Twig_Template
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
        echo "<p>You've been logged out</p>
";
    }

    public function getTemplateName()
    {
        return "logout.html.twig";
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
        return new Twig_Source("<p>You've been logged out</p>
", "logout.html.twig", "C:\\xampp\\htdocs\\ipd15\\IPD15-2018-PHP\\slimblog\\templates\\logout.html.twig");
    }
}

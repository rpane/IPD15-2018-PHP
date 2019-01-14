<?php

/* articleadd_success.html.twig */
class __TwigTemplate_89e8ea93501e35aa54414a1cd4410faf24ff60c1ac943549adc4d186e43d3a0d extends Twig_Template
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
        echo "<p>Succesfully added article</p>";
    }

    public function getTemplateName()
    {
        return "articleadd_success.html.twig";
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
        return new Twig_Source("<p>Succesfully added article</p>", "articleadd_success.html.twig", "C:\\xampp\\htdocs\\ipd15\\IPD15-2018-PHP\\slimblog\\templates\\articleadd_success.html.twig");
    }
}

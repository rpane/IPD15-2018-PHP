<?php

/* todoadd_success.html.twig */
class __TwigTemplate_0543844ec9b2ce0e1b81e2e326b16d0f1b2918fb03c4f0db75f096185a5d11d5 extends Twig_Template
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
        echo "<p>Successfully added todo</p>";
    }

    public function getTemplateName()
    {
        return "todoadd_success.html.twig";
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
        return new Twig_Source("<p>Successfully added todo</p>", "todoadd_success.html.twig", "C:\\xampp\\htdocs\\ipd15\\IPD15-2018-PHP\\slimtodo\\templates\\todoadd_success.html.twig");
    }
}

<?php

/* hello.html.twig */
class __TwigTemplate_2f1fe4f83cb2b6a9eb3b21a3f38eb0770743e9d32cf18dec535da29ebd8093e4 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>My Webpage</title>
    </head>
    <body>
        <p>Hello ";
        // line 7
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo " from TWIG, you are ";
        echo twig_escape_filter($this->env, ($context["age"] ?? null), "html", null, true);
        echo " y/o.</p>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "hello.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 7,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <title>My Webpage</title>
    </head>
    <body>
        <p>Hello {{ name }} from TWIG, you are {{ age }} y/o.</p>
    </body>
</html>", "hello.html.twig", "C:\\xampp\\htdocs\\IPD15-2018-PHP\\slimfirst\\templates\\hello.html.twig");
    }
}

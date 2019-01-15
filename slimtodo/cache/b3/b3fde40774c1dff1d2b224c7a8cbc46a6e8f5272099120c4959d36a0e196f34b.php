<?php

/* master.html.twig */
class __TwigTemplate_4af65d0d1ace238c8af7f5a52ea00ee689db0387988a7eb2638699586e12b2c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'addhead' => array($this, 'block_addhead'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>

        <link rel=\"stylesheet\" href=\"/styles.css\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " - Slim Blog</title>
        ";
        // line 7
        $this->displayBlock('addhead', $context, $blocks);
        // line 9
        echo "    </head>
    <body>
        <div id=\"centeredContent\">";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "            <div id=\"footer\">&copy; Copyright 2019 by <a href=\"http://localhost:8001/\">Roberto</a>.</div>
            <!---- TODO: add Google Analytics tracking code --->
        </div>
    </body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 7
    public function block_addhead($context, array $blocks = array())
    {
        // line 8
        echo "        ";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "master.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  61 => 11,  57 => 8,  54 => 7,  49 => 6,  41 => 12,  39 => 11,  35 => 9,  33 => 7,  29 => 6,  22 => 1,);
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

        <link rel=\"stylesheet\" href=\"/styles.css\" />
        <title>{% block title %}{% endblock %} - Slim Blog</title>
        {% block addhead %}
        {% endblock %}
    </head>
    <body>
        <div id=\"centeredContent\">{% block content %}{% endblock %}
            <div id=\"footer\">&copy; Copyright 2019 by <a href=\"http://localhost:8001/\">Roberto</a>.</div>
            <!---- TODO: add Google Analytics tracking code --->
        </div>
    </body>
</html>", "master.html.twig", "C:\\xampp\\htdocs\\ipd15\\IPD15-2018-PHP\\slimtodo\\templates\\master.html.twig");
    }
}

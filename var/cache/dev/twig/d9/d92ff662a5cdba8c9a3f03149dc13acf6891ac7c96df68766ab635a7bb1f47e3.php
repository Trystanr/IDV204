<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* post/index.html.twig */
class __TwigTemplate_2e34df0404fd97b2faa5f8de658068fa4d3150afd3bf4401a278e3c711f73eec extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "post/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "post/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "flashes", [0 => "success"], "method", false, false, false, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 5
            echo "        <div class=\"alert alert-success\">
            ";
            // line 6
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "    <h1>Posts </h1>
    <table class=\"table table-striped\">
        <thead> 
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) || array_key_exists("posts", $context) ? $context["posts"] : (function () { throw new RuntimeError('Variable "posts" does not exist.', 19, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 20
            echo "            <tr>
                <td> ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 21), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("post.show", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 23)]), "html", null, true);
            echo "\">
                        ";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 24), "html", null, true);
            echo "
                    </a>
                </td>
                <td >
                 <a class=\"text-danger\" href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("post.delete", ["id" => twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 28)]), "html", null, true);
            echo "\">
                 Delete
                 </a>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "        </tbody>
    </table>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "post/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 34,  111 => 28,  104 => 24,  100 => 23,  95 => 21,  92 => 20,  88 => 19,  76 => 9,  67 => 6,  64 => 5,  59 => 4,  52 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends('base.html.twig') %}

{% block body %}
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">
            {{ message }}
        </div>
    {% endfor %}
    <h1>Posts </h1>
    <table class=\"table table-striped\">
        <thead> 
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            {% for post in posts %}
            <tr>
                <td> {{ post.id }}</td>
                <td>
                    <a href=\"{{path('post.show', {id: post.id}) }}\">
                        {{ post.title }}
                    </a>
                </td>
                <td >
                 <a class=\"text-danger\" href=\"{{ path('post.delete', {id: post.id}) }}\">
                 Delete
                 </a>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
{% endblock %}", "post/index.html.twig", "/Applications/MAMP/htdocs/SfCourse/templates/post/index.html.twig");
    }
}

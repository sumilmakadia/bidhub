<?php

/* display/export/options_output_format.twig */
class __TwigTemplate_51ee7abc794698f619d578d73ae167d84a466abefcb4eb6d5da4feeb7a3c5dd4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<li>
    <label for=\"filename_template\" class=\"desc\">
        ";
        // line 3
        echo _gettext("File name template:");
        // line 4
        echo "        ";
        echo PhpMyAdmin\Util::showHint(($context["message"] ?? null));
        echo "
    </label>
    <input type=\"text\" name=\"filename_template\" id=\"filename_template\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["filename_template"] ?? null), "html", null, true);
        echo "\">
    <input type=\"checkbox\" name=\"remember_template\" id=\"checkbox_remember_template\"";
        // line 9
        echo ((($context["is_checked"] ?? null)) ? (" checked") : (""));
        echo ">
    <label for=\"checkbox_remember_template\">
        ";
        // line 11
        echo _gettext("use this for future exports");
        // line 12
        echo "    </label>
</li>
";
    }

    public function getTemplateName()
    {
        return "display/export/options_output_format.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 12,  40 => 11,  35 => 9,  31 => 7,  25 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "display/export/options_output_format.twig", "/srv/users/demo5002/apps/demo5002/public/phpmyadmin2019/templates/display/export/options_output_format.twig");
    }
}

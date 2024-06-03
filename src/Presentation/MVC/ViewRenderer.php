<?php

namespace Presentation\MVC;

final class ViewRenderer
{
    private function __construct()
    {
    }

    public static function render(MVC $mvc, string $view, mixed $data): void
    {
        // define helper functions for view rendering
        $render = function (string $view, mixed $data) use ($mvc) {
            self::render($mvc, $view, $data);
        };
        $htmlOut = function (mixed $value) {
            echo nl2br(htmlentities($value));
        };
        $beginForm = function (string $controller, string $action, array $params = [], string $method = 'get', ?string $cssClass = null) use ($mvc) {
            $cc = $cssClass !== null ? " class=\"$cssClass\"" : '';
            echo "<form method=\"$method\" action=\"?\"$cc>";
            foreach ($params as $name => $value) {
                echo ("<input type=\"hidden\" name=\"$name\" value=\"$value\">");
            }
            echo "<input type=\"hidden\" name=\"{$mvc->getControllerParameterName()}\" value=\"$controller\">";
            echo "<input type=\"hidden\" name=\"{$mvc->getActionParameterName()}\" value=\"$action\">";
        };
        $endForm = function () {
            echo '</form>';
        };
        $link = function (string $content, string $controller, string $action, array $params = [], ?string $cssClass = null) use ($mvc, $htmlOut) {
            $cc = $cssClass != null ? " class=\"$cssClass\"" : '';
            $url = $mvc->buildActionLink($controller, $action, $params);
            echo "<a href=\"$url\"$cc>";
            $htmlOut($content);
            echo '</a>';
        };

        // render view
        require($mvc->getViewPath() . "$view.inc");
    }
}

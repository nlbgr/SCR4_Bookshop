<?php

namespace Presentation\MVC;

abstract class Controller
{
    public final function getParam(string $id): mixed
    {
        return $_REQUEST[$id];
    }

    public final function tryGetParam(string $id, mixed &$value): bool
    {
        if (isset($_REQUEST[$id])) {
            $value = $_REQUEST[$id];
            return true;
         }
         return false;
    }

    public final function getRequestUri(): string {
        return $_SERVER['REQUEST_URI'];
    }

    public final function view(string $view, array $data = []): ViewResult
    {
        return new ViewResult($view, $data);
    }

    public final function redirectToUri(string $uri): RedirectToUriResult
    {
        return new RedirectToUriResult($uri);
    }

    public final function redirect(string $controller, string $action, array $params = []): RedirectResult
    {
        return new RedirectResult($controller, $action, $params);
    }
}

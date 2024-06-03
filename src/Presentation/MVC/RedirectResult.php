<?php

namespace Presentation\MVC;

final class RedirectResult extends ActionResult
{
    public function __construct(
        private string $controller,
        private string $action,
        private array $params,
    ) {
    }

    public function handle(MVC $mvc): void
    {
        $location = $mvc->buildActionLink($this->controller, $this->action, $this->params);
        header("Location: $location");
    }
}

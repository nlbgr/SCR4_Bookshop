<?php

namespace Presentation\MVC;

final class ViewResult extends ActionResult
{
    public function __construct(
        private string $view,
        private array $data
    ) {
    }

    public function handle(MVC $mvc): void
    {
        ViewRenderer::render($mvc, $this->view, $this->data);
    }
}

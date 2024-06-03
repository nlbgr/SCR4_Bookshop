<?php

namespace Presentation\MVC;

final class RedirectToUriResult extends ActionResult
{
    public function __construct(
        private string $uri
    ) {
    }

    public function handle(MVC $mvc): void
    {
        header("Location: $this->uri");
    }
}

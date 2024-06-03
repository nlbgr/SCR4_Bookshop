<?php

namespace Presentation\MVC;

abstract class ActionResult
{
    public abstract function handle(MVC $mvc): void;
}

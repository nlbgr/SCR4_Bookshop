<?php

namespace Application;

class SignOutCommand {
    public function __construct(
        private Services\AuthenticationService $authenticationService,
        private Services\CartService $cartService,
    ) { }

    public function execute() {
        $this->authenticationService->signOut();
        $this->cartService->clear();
    }
}
<?php

namespace Application;

class CartSizeQuery {
    public function __construct(
        private Services\CartService $cartService
    ){}

    public function execute(): int {
        return $this->cartService->getSize();
    }
}
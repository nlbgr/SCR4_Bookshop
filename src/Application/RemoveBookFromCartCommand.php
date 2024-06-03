<?php

namespace Application;

class RemoveBookFromCartCommand {
    public function __construct(
        private Services\CartService $cartService
    ) { }

    public function execute(int $bookId): void {
        $this->cartService->removeBook($bookId);
    }
}
<?php

namespace Application;

class AddBookToCartCommand {
    public function __construct(
        private Services\CartService $cartService
    ) { }

    public function execute(int $bookId): void {
        $this->cartService->addBook($bookId);
    }
}
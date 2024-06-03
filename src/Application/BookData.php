<?php

namespace Application;

readonly class BookData {
    public bool $isInCart;
    public function __construct(
        public int $id,
        public string $title,
        public string $author,
        public float $price,
        public int $cartCount
    ) {
        $this->isInCart = $this->cartCount > 0;
    }
}
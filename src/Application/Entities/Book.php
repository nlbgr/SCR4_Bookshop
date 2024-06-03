<?php

namespace Application\Entities;

class Book {
    public function __construct(
        private int $id,
        private string $title,
        private string $author,
        private float $price
    ) {}

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getPrice(): float {
        return $this->price;
    }
}
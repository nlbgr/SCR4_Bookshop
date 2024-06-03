<?php

namespace Application\Interfaces;

interface BookRepository {
    public function getBooksForCategory(int $categoryId): array;
    public function getBooksForFilter(string $filter): array;
}
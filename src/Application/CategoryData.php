<?php

namespace Application;

readonly class CategoryData {
    public function __construct(
        public int $id,
        public string $name
    ) {}
}
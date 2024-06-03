<?php

namespace Application;

class CategoriesQuery {
    public function __construct(private Interfaces\CategoryRepository $categoryRepository) {

    }

    public function execute(): array {
        $res = [];
        foreach ($this->categoryRepository->getCategories() as $c) {
            $res[] = new CategoryData($c->getId(), $c->getName());
        }
        return $res;
    }
}
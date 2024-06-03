<?php

namespace Application\Interfaces;

interface OrderRepository {
    public function createOrder(array $books, string $ccName, string $ccNumber): ?int;
}
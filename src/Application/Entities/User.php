<?php

namespace Application\Entities;

class User {
    public function __construct(
        private int $id,
        private string $userName,
        private string $passwordHash
    ) {}

    public function getUserName(): string {
        return $this->userName;
    }

    public function getPasswordHash(): string {
        return $this->passwordHash;
    }

    public function getId(): int {
        return $this->id;
    }
}
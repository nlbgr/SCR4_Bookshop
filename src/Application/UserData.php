<?php

namespace Application;

class UserData {
    public function __construct(
        public int $id,
        public string $userName
    ) {}
}
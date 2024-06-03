<?php

namespace Infrastructure;

class Session implements \Application\Interfaces\Session {
    public function __construct() {
        session_start();
    }

    public function get(string $key): mixed {
        return $_SESSION[$key] ?? null;
    }

    public function put(string $key, mixed $value): void {
        $_SESSION[$key] = $value;
    }

    public function delete(string $key): void {
        unset($_SESSION[$key]);
    }
}
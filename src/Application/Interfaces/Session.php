<?php

namespace Application\Interfaces;

interface Session {
    public function get(String $key): mixed;
    public function put(String $key, mixed $value): void;
    public function delete(String $key): void;

}
<?php

namespace Application\Interfaces;

interface UserRepository {
    public function getUesr(int $id): ?\Application\Entities\User;
    public function getUserForUserName(string $userName): ?\Application\Entities\User;
}
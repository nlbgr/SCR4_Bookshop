<?php

namespace Application\Interfaces;

interface UserRepository {
    public function getUser(int $id): ?\Application\Entities\User;
    public function getUserForUserName(string $userName): ?\Application\Entities\User;
}
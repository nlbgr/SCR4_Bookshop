<?php

namespace Application\Services;

class AuthenticationService {
    const SESSION_USER_ID = 'userId';

    public function __construct(
        private \Application\Interfaces\Session $session
    ){ }

    public function signIn(int $userId): void {
        $this->session->put(self::SESSION_USER_ID, $userId);
    }

    public function signOut(): void {
        $this->session->delete(self::SESSION_USER_ID);
    }

    public function getUserId(): ?int {
        return $this->session->get(self::SESSION_USER_ID);
    }
}
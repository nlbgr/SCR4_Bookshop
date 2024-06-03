<?php

namespace Application;

class SignInCommand {
    public function __construct(
        private Services\AuthenticationService $authenticationService,
        private Interfaces\UserRepository $userRepository
    ){ }

    public function execute(string $userName, string $password): bool {
        $this->authenticationService->signOut();
        $user = $this->userRepository->getUserForUserName($userName);

        if ($user != null && password_verify($password, $user->getPasswordHash())) {
            $this->authenticationService->signIn($user->getId());
            return true;
        }

        return false;
    }
}
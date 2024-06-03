<?php

namespace Application;

class SignedInUserQuery {
    public function __construct(
        private Services\AuthenticationService $authenticationService,
        private Interfaces\UserRepository $userRepository
    ) { }

    public function execute(): ?UserData {
        $id = $this->authenticationService->getUserId();
        if ($id === null) {
            return null;
        }

        $user = $this->userRepository->getUser($id);
        if ($user === null) {
            return null;
        }

        return new UserData($user->getId(), $user->getUserName());
    }
}
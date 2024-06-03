<?php

namespace Presentation\Controllers;

class User extends \Presentation\MVC\Controller {
    const PARAM_USER_NAME = 'un';
    const PARAM_PASSWORD = 'password';

    public function __construct(
        private \Application\SignInCommand $signInCommand
    ) {}

    public function GET_LogIn(): \Presentation\MVC\ActionResult {
        return $this->view('login', ['userName' => $this->tryGetParam(self::PARAM_USER_NAME, $value) ? $value : '']);
    }

    public function POST_LogIn(): \Presentation\MVC\ActionResult {
        if (!$this->signInCommand->execute($this->getParam(self::PARAM_USER_NAME), $this->getParam(self::PARAM_PASSWORD))) {
            return $this->view('login', [
                'userName' => $this->getParam(self::PARAM_USER_NAME),
                'errors' => ['Invalid username or password']
            ]);
        } else {
            return $this->redirect('Home', 'Index');
        }
    }
}
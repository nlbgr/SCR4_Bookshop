<?php

namespace Presentation\Controllers;

class Cart extends \Presentation\MVC\Controller {
    const PARAM_BOOK_ID = 'bid';
    const PARAM_CONTEXT = 'ctx';

    public function __construct(
        private \Application\AddBookToCartCommand $addBookToCartCommand,
        private \Application\RemoveBookFromCartCommand $removeBookFromCartCommand
    ) {}

    public function POST_Add(): \Presentation\MVC\ActionResult {
        $this->addBookToCartCommand->execute($this->getParam(self::PARAM_BOOK_ID));
        //return $this->view('home');
        return $this->redirectToUri($this->getParam(self::PARAM_CONTEXT));
    }

    public function POST_Remove(): \Presentation\MVC\ActionResult {
        $this->removeBookFromCartCommand->execute($this->getParam(self::PARAM_BOOK_ID));
        return $this->redirectToUri($this->getParam(self::PARAM_CONTEXT));
    }
}
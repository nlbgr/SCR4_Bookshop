<?php
namespace Presentation\Controllers;

class Books extends \Presentation\MVC\Controller {
    const PARAM_CATEGORY_ID = 'cid';
    const PARAM_FILTER = 'f';

    public function __construct(
        private \Application\CategoriesQuery $categoriesQuery,
        private \Application\BooksQuery $booksQuery,
        private \Application\BookSearchQuery $bookSearchQuery,
        private \Application\SignedInUserQuery $signedInUserQuery
    ) {

    }

    public function GET_Index(): \Presentation\MVC\ActionResult {
        return $this->view('bookList', [
            'user' => $this->signedInUserQuery->execute(),
            'categories' => $this->categoriesQuery->execute(),
            'selectedCategoryId' => $this->tryGetParam(self::PARAM_CATEGORY_ID, $value) ? $value : null,
            'books' => $this->tryGetParam(self::PARAM_CATEGORY_ID, $value) ? $this->booksQuery->execute($value) : null,
            'context' => $this->getRequestUri()
        ]);
    }

    public function GET_Search(): \Presentation\MVC\ActionResult {
        return $this->view('bookSearch', [
            'user' => $this->signedInUserQuery->execute(),
            'filter' => $this->tryGetParam(self::PARAM_FILTER, $value) ? $value : '',
            'books' => $this->tryGetParam(self::PARAM_FILTER, $value) ? $this->bookSearchQuery->execute($value) : null,
            'context' => $this->getRequestUri()
        ]);
    }
}
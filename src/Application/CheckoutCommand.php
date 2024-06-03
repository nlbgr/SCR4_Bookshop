<?php

namespace Application;

class CheckoutCommand {
    const Error_NotAuthenticated = 0x01;
    const Error_CartEmpty = 0x02;
    const Error_InvalidCreditCardName = 0x04;
    const Error_InvalidCreditCardNumber = 0x08;
    const Error_CreateOrderFailed = 0x10;

    public function __construct(
        private Interfaces\OrderRepository $orderRepository,
        private Services\CartService $cartService
    ) {

    }

    public function execute(string $ccName, string $ccNumber, ?int &$orderId): int {
        $ccName = trim($ccName);
        $ccNumber = str_replace(' ', '', $ccNumber);

        $errors = 0;

        // check for items in cart
        if ($this->cartService->getSize() === 0) {
            $errors |= self::Error_CartEmpty;
        }

        if (strlen($ccName) === 0) {
            $errors |= self::Error_InvalidCreditCardName;
        }
        if (strlen($ccNumber) !== 16 || !ctype_digit($ccNumber)) {
            $errors |= self::Error_InvalidCreditCardNumber;
        }

        if (!$errors) {
            $cart = $this->cartService->getAllBooksWithCount();
            $orderId = $this->orderRepository->createOrder($cart, $ccName, $ccNumber);

            if ($orderId === null) {
                $errors |= self::Error_CreateOrderFailed;
            }
        }

        return $errors;
    }
}
<?php

namespace Presentation\Controllers;

class Order extends \Presentation\MVC\Controller {
    const PARAM_ORDER_ID = 'oid';
    const PARAM_CARD_NUMBER = 'cn';
    const PARAM_NAME_ON_CARD = 'noc';

    public function __construct (
        private \Application\CartSizeQuery $cartSizeQuery,
        private \Application\CheckoutCommand $checkoutCommand
    ) {

    }

    public function GET_Create() : \Presentation\MVC\ActionResult {
        $cartSize = $this->cartSizeQuery->execute();

        if ($cartSize !== 0) {
            return $this->view('orderForm', [
                'cartSize' => $cartSize
            ]);
        }

        return $this->view('orderFormEmptyCart');
    }

    public function POST_Create() : \Presentation\MVC\ActionResult {
        $ccName = $this->getParam(self::PARAM_NAME_ON_CARD);
        $ccNumber = $this->getParam(self::PARAM_CARD_NUMBER);

        $result = $this->checkoutCommand->execute($ccName, $ccNumber, $orderId);

        echo $ccName;
        echo $ccNumber;
        echo $result;

        if ($result !== 0) {
            if ($result & \Application\CheckoutCommand::Error_CartEmpty) {
                return $this->redirect('Order', 'Create');
            }

            $errors = [];
            if ($result & \Application\CheckoutCommand::Error_InvalidCreditCardName) {
                $errors[] = "Invalid name on card";
            }
            if ($result & \Application\CheckoutCommand::Error_InvalidCreditCardNumber) {
                $errors[] = "Invalid credit card number (must be 16 digits)";
            }
            if (sizeof($errors) == 0) {
                $errors[] = "Order creation failed";
            }

            return $this->view('orderForm', [
                "cartSize" => $this->cartSizeQuery->execute(),
                "nameOnCard" => $ccName,
                "cardNumber" => $ccNumber,
                "errors" => $errors
            ]);
        } else {
            return $this->redirect('Order', 'ShowSummary', [self::PARAM_ORDER_ID => $orderId]);
        }
    }

    public function GET_ShowSummary() : \Presentation\MVC\ActionResult {
        return $this->view('orderSummary', [
            'orderId' => $this->getParam(self::PARAM_ORDER_ID)
        ]);
    }
}
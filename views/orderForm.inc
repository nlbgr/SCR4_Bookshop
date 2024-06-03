<?php $render('partial/header', $data); ?>

    <h1>Checkout</h1>

    <p>You have <strong><?php $htmlOut($data['cartSize']) ?></strong> item(s) in your cart.</p>

    <p>Please provide your credit card details for payment</p>

    <?php $beginForm('Order', 'Create', method: 'post') ?>
        <div class="mb-3">
            <label class="form-label" for="nameOnCard">Name on card</label>
            <input class="form-label" type="text" id="nameOnCard" name="noc" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="cardNumber">Card number</label>
            <input class="form-label" type="text" id="cardNumber" name="cn" />
        </div>

        <button class="btn btn-primary" type="submit">Place order</button>
    <?php $endForm() ?>

<?php $render('partial/footer', $data); ?>
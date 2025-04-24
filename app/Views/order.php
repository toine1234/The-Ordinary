<?php $carts = $cartItems ?>
<?php $total = 0; ?>
<?php foreach ($carts as $item): ?>
    <?php $total += $item['Gia'] * $item['SL']; ?>
<?php endforeach; ?>
<?php $shipping = $total > 39 ? 0:number_format(38,2); ?>
<?php $estiamtedTotal = number_format($total + $shipping,2); ?>
<div class="page-order-container">
    <!----------- Phần CHECK-OUT ------------>
    <div class="page-order-checkout-container">
        <div class="page-order-checkout">
            <!-- Shhipping -->
            &larr;
            <a href="/The-Ordinary/cart">Back to Cart</a>
            <h3>CHECKOUT</h3>
            <div class="order-checkout">
                <h4>01. SHIPPING</h4>
                <p>
                    All orders require up to 3 business days of processing time to be picked, packed and prepared for shipping. Kindly note that fulfillment times may vary during peak periods such as after/during product launches, holidays and special promotions.
                </p>
                <p>
                    Please note once your order is placed, we are unable to change your shipping address.
                </p>
                <label class="order-checkout-shipping-label">
                    <input type="radio" <?= $shipping === 0 ? "disabled" : "checked" ?>>
                    Standard Shipping
                    <span class="order-checkout-shipping-price">
                        38.00 USD
                    </span>
                </label>

                <div class="order-checkout-shipping">
                    <h5>SHIPPING ADDRESS</h5>
                    <form method="post" class="order-checkout-shipping-form">
                        <input type="text" name="HoTen" value="<?= $user_info['HoTen']?>" placeholder="Full Name" required>
                        <input type="text" name="shipping_address" value="<?= $user_info['DiaChi']?>" placeholder="Address" required>
                        <input type="tel" name="SDT" value="<?= $user_info['SDT']?>" placeholder="Phone" required>
                        <input type="text" placeholder="City" required>
                        <button type="button" class="btn-order-checkout-shipping">CONTINUE TO PAYMENT</button>
                    </form>

                </div>
            </div>



            <!-- Payment -->
            <div class="order-checkout-payment">
                <h4>02. PAYMENT</h4>
                <h5>PAYMENT METHOD</h5>
                <!-- <div class="order-checkout-payment-methods">
                    <label class="order-checkout-payment-radio-card">
                        <input type="radio" checked>
                        <i class="fa-solid fa-credit-card" style="font-size: 1.3rem;"></i>
                        <span>Cards</span>
                    </label>

                    <form class="order-checkout-card-form">
                        <input type="text" placeholder="Card Number">
                        <div class="card-form-row">
                            <input type="text" placeholder="Expiry Date">
                            <input type="text" placeholder="Security Code">
                        </div>
                        <input type="text" placeholder="Name On Card">
                        <label class="save-card">
                            <input type="checkbox"> SAVE FOR MY NEXT PAYMENT
                        </label>
                    </form>
                    <label class="order-checkout-payment-option">
                        <input type="radio" name="payment-method">
                        <i class="fa-brands fa-google-pay" style="font-size: 25px;"></i>
                        <span>Google Pay</span>
                    </label>
                    <label class="order-checkout-payment-option">
                        <input type="radio" name="payment-method">
                        <i class="fa-brands fa-paypal" style="font-size: 25px;"></i>
                        <span>PayPal</span>
                    </label>
                </div>
                <div class="order-checkout-billing-address">
                    <h5>BILLING ADDRESS</h5>
                    <label>
                        <input type="radio" name="billing-address" checked> Same as shipping address
                    </label>
                    <label>
                        <input type="radio" name="billing-address"> Use a different billing address
                    </label>
                </div>

                <button class="btn-order-checkout-review">CONTINUE TO REVIEW ORDER</button> -->
                <div id="paypal-button-container"></div>

            </div>


            <!-- Review -->
            <div class="order-checkout-review">
                <h4>03. REVIEW</h4>
                <label class="order-checkbox-container">
                    <input type="checkbox">
                    <span class="order-checkmark">KEEP ME UPDATED</span>
                </label>
                <p>
                    Stay up to date on the latest DECIEM news, events, promotions and new product developments. <br>
                    *By checking the above box you are agreeing to receive email communications from DECIEM Inc., its affiliates, brands (The Ordinary, NIOD and LOoPHA) and/or marketing partners. This can be changed at any time. Please refer to our Privacy Policy and Terms of Use for more details or Contact Us.
                </p>
                <p>
                    By placing the order, you agree to DECIEM's Privacy Policy and Terms of Use.
                </p>

                <form class="form-submit" method="post">
                    <input type="text" name="HoTen" hidden >
                    <input type="text" name="shipping_address" hidden>
                    <input type="tel" name="SDT" hidden >
                    <input type="text" placeholder="City" hidden>
                    <input type="text" name="payment_method" hidden>
                    <input type="text" name="total" value="<?=$estiamtedTotal?>" hidden>
                    <input type="text" name="cost_ship" value="<?= $shipping?>" hidden>
                    <button class="btn-order-checkout-button">PLACE ORDER</button>
                </form>
            </div>

        </div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=Aah1aCIFNDru_qqlCmL3Fl42XUfKPyBxkV6xiBy8KLDCIUNqaKfP5A1gr3EBfmZHlVC_29KKj-XXcx0U&currency=USD"></script>
<script>
paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?= $estiamtedTotal; ?>' // Tổng tiền
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return fetch('/paypal-verify.php', {
            method: 'post',
            headers: { 'content-type': 'application/json' },
            body: JSON.stringify({
                orderID: data.orderID
            })
        }).then(res => res.json())
          .then(data => {
              if (data.status === 'success') {
                  document.getElementById('checkout-form').submit();
              }
          });
    }
}).render('#paypal-button-container');
</script>


    <!-- Phần ORDER SUMMARY -->
    <div class="page-order-summary-container">
        <div class="page-order-summary">
            <h4>ORDER SUMMARY</h4>
            <hr>
            <div class="order-summary-items-row">
                <div class="order-summary-row">
                    <span>Merchandis subtotal</span>
                    <span><?= number_format($total, 2) ?> USD</span>
                </div>
                <div class="order-summary-row">
                    <span>Shipping & Handling</span>
                    <span><?= $shipping === 0 ? 'Free' : number_format(38, 2) . " USD" ?></span>
                </div>
            </div>
            <div class="order-summary-row-total">
                <strong>Estimated Total</strong>
                <strong><?=$estiamtedTotal?></strong>
            </div>
            <hr>
            <button class="btn-order-summary">PLACE ORDER</button>

            <div class="order-items-section">
                <p><strong>1 item(s)</strong></p>
                <hr>
                <?php foreach ($carts as $item): ?>
                    <div class="order-item">
                        <img class="order-product-img" src="<?= $item["Hinh_Anh"] ?>" alt="product">
                        <div class="order-item-details">
                            <p class="order-brand">THE ORDINARY</p>
                            <p class="product-name"><strong><?= $item['Ten_SP'] ?></strong></p>
                            <p>Size: 30ml</p>
                            <p>Quantity: <?= $item['SL'] ?></p>
                        </div>
                        <div class="order-item-price"><?= number_format($item['Gia'], 2) . " USD" ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="order-disclaimer">
                The safety of our customers is a key priority, which is why we are committed to the prevention of the sale and distribution of counterfeit products or products sold through unauthorized retail channels. Please note that products and services available via DECIEM are for personal use only. We do not permit the reselling of our products or services, as noted in our <a href="#">Terms and Conditions</a>. If you are not satisfied with your purchase, you may return it for a full refund within one year of purchase. Kindly note that DECIEM does not cover the costs of return shipping. Please explore our <a href="#">Return Policy</a> for more details.
            </p>


        </div>
    </div>

</div>

<script>
    document.querySelector('.btn-order-checkout-shipping').addEventListener('click', function(e) {
        e.preventDefault();

        // Lấy giá trị từ form
        const inputs = document.querySelectorAll('.order-checkout-shipping-form input');
        const fullName = inputs[0].value;
        const address = inputs[1].value;
        const phone = inputs[2].value;
        const city = inputs[3].value;

        const inputSubmits = document.querySelectorAll('.form-submit input');
        inputSubmits[0].value = fullName
        inputSubmits[1].value = address
        inputSubmits[2].value = phone
        inputSubmits[3].value = city
        inputSubmits[4].value = 'Paypal'
    });
</script>
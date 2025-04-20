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
                    <input type="radio" checked>
                    Standard Shipping
                    <span class="order-checkout-shipping-price">
                        38.00 USD
                    </span>
                </label>

                <div class="order-checkout-shipping">
                    <h5>SHIPPING ADDRESS</h5>
                    <form class="order-checkout-shipping-form">
                        <input type="text" placeholder="Full Name">
                        <input type="text" placeholder="Address">
                        <input type="tel" placeholder="Phone">
                        <input type="text" placeholder="City">
                    </form>
                    <button class="btn-order-checkout-shipping">CONTINUE TO PAYMENT</button>
                </div>
            </div>

            <!-- Payment -->
            <div class="order-checkout-payment">
                <h4>02. PAYMENT</h4>
                <h5>PAYMENT METHOD</h5>
                <div class="order-checkout-payment-methods">
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

                <button class="btn-order-checkout-review">CONTINUE TO REVIEW ORDER</button>
            </div>


            <!-- Review -->
            <div class="order-checkout-review">
                <h4>03. REVIEW</h4>

                <div class="order-checkout-review-section">
                    <h5>SHIPPING INFORMATION</h5>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Address:</strong> 123 Main St, City, Country</p>
                    <p><strong>Phone:</strong> +123456789</p>
                    <p><strong>Shipping Method:</strong> Standard Shipping - 38.00 USD</p>
                    <a href="#" class="edit-link">Edit</a>
                </div>

                <div class="order-checkout-review-section">
                    <h5>PAYMENT INFORMATION</h5>
                    <p><strong>Payment Method:</strong> Visa ending in 1234</p>
                    <p><strong>Billing Address:</strong> Same as shipping address</p>
                    <a href="#" class="edit-link">Edit</a>
                </div>

                <div class="order-checkout-review-section">
                    <h5>ITEM(S) IN YOUR ORDER</h5>
                    <div class="review-product">
                        <img src="https://cdn.example.com/product-image.jpg" alt="Product" class="product-thumbnail">
                        <div class="product-details">
                            <p><strong>The Ordinary</strong></p>
                            <p>Glycolic Acid 7% Exfoliating Toner</p>
                            <p>Size: 100ml</p>
                            <p>Quantity: 1</p>
                        </div>
                        <div class="product-price">
                            <p>10.40 USD</p>
                        </div>
                    </div>
                </div>

                <div class="order-checkout-review-totals">
                    <div class="totals-row">
                        <span>Merchandise Subtotal</span>
                        <span>10.40 USD</span>
                    </div>
                    <div class="totals-row">
                        <span>Shipping & Handling</span>
                        <span>38.00 USD</span>
                    </div>
                    <div class="totals-row total">
                        <strong>Estimated Total</strong>
                        <strong>48.40 USD</strong>
                    </div>
                </div>

                <button class="btn-order-place">PLACE ORDER</button>
            </div>


            
        </div>
    </div>



    <!-- Phần ORDER SUMMARY -->
    <div class="page-order-summary-container">
        <div class="page-order-summary">

        </div>
    </div>

</div>
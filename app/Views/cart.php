<?php $carts = $cartItems ?>
<?php $total = 0; ?>
<?php foreach ($carts as $item): ?>
<?php $total += $item['Gia'] * $item['SL']; ?>
<?php endforeach; ?>
<div class="cart-wrapper">
    <div class="cart-content">
        <div class="cart-header">
            <h1 style="font-size: 20px;font-weight:bold">MY CART <?= "(".count($carts).")" ?></h1> 
        </div>
        <?php if (!empty($carts)): ?>
            <div class="process-free-ship">
                <p>Free shipping on orders over 49.00 USD</p>
                <div class="process-free-ship-bar">
                    <div class="process-free-ship-bar-fill"></div>
                </div>
            </div>
        <?php endif; ?>
        <script>
            const processBar = document.querySelector('.process-free-ship-bar-fill');
            const totalAmount = <?= $total ?>;
            console.log(totalAmount);
            const freeShippingThreshold = 39.00;
    
            if (totalAmount >= freeShippingThreshold) {
                processBar.style.width = '100%';
                processBar.style.backgroundColor = '#4CAF50'; // Green color for free shipping
            } else {
                const percentage = (totalAmount / freeShippingThreshold) * 100;
                processBar.style.width = percentage + '%';
                processBar.style.backgroundColor = '#000'; // Orange color for progress
                processBar.innerText = percentage.toFixed(0) + '%';
            }
        </script>
        <div class="list-cart-products">
            <?php if (empty($carts)): ?>
                <div class="empty-cart-message">
                    <p>Looks like you haven't added anything to your cart yet.</p>
                    <a href="/The-Ordinary/shop" class="continue-shopping-btn">Continue Shopping &#8594;</a>
                </div>
            <?php endif; ?>
            <?php foreach ($carts as $item): ?>
                <form action="/The-Ordinary/cart/remove" method="post" class="cart-product-item">
                    <input type="hidden" name="cartId" value="<?= $item['ID_Gio_Hang'] ?>">
                    <div style="width: 80px;height: 80px" class="cart-product-image">
                        <img src="<?= $item['Hinh_Anh'] ?>" alt="Product Image">
                    </div>
                    <div class="cart-product-info">
                        <div class="cart-product-name">
                            <p>THE ORDINARY</p>
                            <h2>
                                <?= $item['Ten_SP'] ?>
                            </h2>
                        </div>
                        <p class="cart-product-price">
                            <?= number_format($item['Gia'], 2) . " USD" ?>
                        </p>
                        <button class="remove-item-cart">Remove</button>
                        <p class="cart-product-size">Size: 30ml</p>
                        <div class="cart-product-quantity">
                            <button class="btn-cart-quantity">-</button>
                            <input type="text" disabled value="<?= $item['SL'] ?>" class="cart-quantity-input">
                            <button class="btn-cart-quantity">+</button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
    <?php $shipping = $total >= 49 ? "Free" : "49.00 USD"; ?>
    <div class="order-summary">
        <div class="order-summary-header">
            <h1>ORDER SUMMARY</h1>
        </div>
        <div class="order-summary-content">
            <div class="order-summary-item">
                <p>Subtotal</p>
                <p><?= number_format($total, 2) . " USD" ?></p>
            </div>
            <div class="order-summary-item">
                <p>Shipping</p>
                <p><?= $shipping ?></p>
            </div>
            <div class="order-summary-item total-amount">
                <p>Total</p>
                <p><?= number_format($total + (int) $shipping, 2) . " USD" ?></p>
            </div>
            <div class="voucher">
                <input type="text" placeholder="Enter your voucher code">
                <button class="apply-voucher-btn">Apply</button>
            </div>
        </div>
        <?php if (!empty($carts)): ?>
            <a href="/The-Ordinary/checkout" class="checkout-btn">CHECKOUT</a>
        <?php endif; ?>
        <a href="/The-Ordinary/shop" class="continue-shopping-btn">Continue Shopping</a>
    </div>
    <script>
    const cartButton = document.querySelector('.icon-header-btn:nth-child(3)');
    const cartContainer = document.querySelector('.site-cart');
    const closeCartButton = document.querySelector('.close-cart');
    const containerCart = document.querySelector('.cart-Container');

    cartButton.addEventListener('click', () => {
        cartContainer.style.display = 'none';
        cartContainer.style.transform = 'none';
        containerCart.style.display = 'none';

    });
</script>
</div>
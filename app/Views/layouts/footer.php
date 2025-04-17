<footer>
    <div class='footerpage'>
        <div class='gap'></div>
        <div class='gap'></div>

        <div class='footer-container'>
            <div class='footer-col'>
                <div class='content-company'>
                    <h3>Company</h3>
                    <ul class='menu-company'>
                        <li>
                            <a href=''>About Us</a>
                        </li>
                        <li>
                            <a href=''>The Ordinary DNA</a>
                        </li>
                        <li>
                            <a href=''>Join Us</a>
                        </li>
                        Manufacture information: DECIEM Eastside
                    </ul>

                    <h3 style='margin-top: 30px;'>Our Commitments</h3>
                    <ul class='menu-company'>
                        <li>
                            <a href=''>Accessibility</a>
                        </li>
                        <li>
                            <a href=''>Sustainability</a>
                        </li>
                        <li>
                            <a href=''>Change is the Journey</a>
                        </li>
                        <li>
                            <a href=''>Everything Is Chemicals</a>
                        </li>
                    </ul>

                    <h3 style='line-height: 30px; margin-top: 100px;'>Location</h3>
                    <div class='location'>
                        <i class='fa-solid fa-location-dot'></i>
                        VIETNAM
                        <p>Language
                            EN</p>
                    </div>
                </div>

                <div class='content-customer-care'>
                    <h3>Customer Care</h3>
                    <ul class='menu-company'>
                        <li>
                            <a href=''>FAQ</a>
                        </li>
                        <li>
                            <a href=''>Disposal Instructions</a>
                        </li>
                        <li>
                            <a href=''>Return Policy</a>
                        </li>
                        <li>
                            <a href=''>Promotion Terms & Conditions</a>
                        </li>
                    </ul>
                </div>

                <div class='content-contact'>
                    <ul class='menu-contact'>
                        <li>
                            <a href=''>Contact Us</a>
                        </li>
                        <li>
                            <a href=''>Track Order</a>
                        </li>
                        <li>
                            <a href=''>Sign In</a>
                        </li>
                        <li>
                            <a href=''>Store Locator</a>
                        </li>
                    </ul>
                </div>
                <div class='content-info'>
                    <h3>Be in a know</h3>
                    <p class='content-info-description' style='padding-bottom: 15px;'>Subscribe to receive
                        science-backed tips, access to special offers, and new innovations.</p>
                    <form class="content-info-form">
                        <input type='email' class='form-email' placeholder='Enter your email'>
                        <i class='fa-solid fa-angle-right icon' style='color: gray;'></i>
                    </form>
                    <p style='padding:15px 0 15px 0;'>*By providing your email address you are agreeing to receive email
                        communications from DECIEM Inc., its affiliates, brands (The Ordinary, NIOD, and LOoPHA) and/or
                        marketing partners. This can be changed at any time. Please refer to our Privacy Policy and
                        Terms of Use for more details or Contact Us.</p>
                    <div class='footer-asset'>
                        <ul class='list-asset'>
                            <li>
                                <i class='fa-brands fa-facebook-f'></i>
                            </li>
                            <li>
                                <i class='fa-brands fa-instagram'></i>
                            </li>
                            <li>
                                <i class='fa-brands fa-youtube'></i>
                            </li>
                            <li>
                                <i class='fa-brands fa-tiktok'></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class='footer-copyright-menu'>
                <ul>
                    <li>BEDE Beauty Group Inc. 2022. All rights reserved.</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                    <li>Do not sell my personal information</li>
                    <li>Cookies</li>
                    <li style='font-weight: bold;'>A STORE PROJECT.</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!----------------------- SEARCH --------------------------->
<!----------------------- SEARCH --------------------------->
<!----------------------- SEARCH --------------------------->


<div class="Search-Container"></div>
<div class="site-search">
    <div class="search-header">
        <h1>Search</h1>
        <button class="close-search"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <form class="form-search" action="/The-Ordinary/shop" method="GET">
        <input type="text" name="search" class="search-input" placeholder="Search for products...">
        <button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
<script>
    const searchButton = document.querySelector('.icon-header-btn:nth-child(1)');
    const searchContainer = document.querySelector('.site-search');
    const closeSearchButton = document.querySelector('.close-search');
    const containerSearch = document.querySelector('.Search-Container');
    const body = document.querySelector('body');

    searchButton.addEventListener('click', () => {
        searchContainer.style.display = 'block';
        searchContainer.style.transform = 'translateY(0)';
        containerSearch.style.display = 'block';
        searchContainer.querySelector('.search-input').focus();
        searchContainer.querySelector('.search-input').value = '';
        body.style.overflow = 'hidden';

    });

    closeSearchButton.addEventListener('click', () => {
        searchContainer.style.display = 'none';
        searchContainer.style.transform = 'translateY(100%)';
        containerSearch.style.display = 'none';
        body.style.overflow = 'auto';

    });
</script>

<!----------------------- CART --------------------------->
<!----------------------- CART --------------------------->
<!----------------------- CART --------------------------->

<div class="cart-Container">

</div>
<?php $carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : []; ?>
<?php $total = 0; ?>
<?php foreach ($carts as $item): ?>
<?php $total += $item['Gia'] * $item['SL']; ?>
<?php endforeach; ?>
<div class="site-cart">
    <div class="cart-header">
        <h1>Cart</h1>
        <button class="close-cart"><i class="fa-solid fa-xmark"></i></button>
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
            <div class="cart-product-image">
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
    <?php if (!empty($carts)): ?>
    <div class="cart-checkout-container">
        <div class="cart-checkout-heading">
            <?php $itemcount = count($carts); ?>
            <?php $total = 0; ?>
            <?php foreach ($carts as $item): ?>
            <?php $total += $item['Gia'] * $item['SL']; ?>
            <?php endforeach; ?>
            <p>
                <?= $itemcount; ?> item in cart
            </p>
            <p>Estimated Total:
                <?= number_format($total, 2) . " USD"; ?>
            </p>
        </div>
        <a href="/The-Ordinary/cart" class="cart-checkout-btn">
            CHECKOUT
        </a>
    </div>
    <?php endif; ?>
    <script>
        document.querySelectorAll('.btn-cart-quantity').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = this.parentNode.querySelector('input[type=text]');
                let value = parseInt(input.value);
                if (this.innerText === '+') {
                    value = Math.min(value + 1, 10); // Max quantity is 10
                } else {
                    value = Math.max(value - 1, 1); // Min quantity is 1
                }
                input.value = value;
            });
        });
    </script>
</div>
<script>
    const cartButton = document.querySelector('.icon-header-btn:nth-child(3)');
    const cartContainer = document.querySelector('.site-cart');
    const closeCartButton = document.querySelector('.close-cart');
    const containerCart = document.querySelector('.cart-Container');

    cartButton.addEventListener('click', () => {
        cartContainer.style.display = 'block';
        cartContainer.style.transform = 'none';
        containerCart.style.display = 'block';
        body.style.overflow = 'hidden';

    });

    closeCartButton.addEventListener('click', () => {
        cartContainer.style.display = 'none';
        containerCart.style.display = 'none';
        body.style.overflow = 'auto';

    });
</script>
</body>

</html>
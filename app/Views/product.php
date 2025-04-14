<div class="container-product-detail">
    <div class="router-product-detail">
        <ul class="list-router-product-detail">
            <li><a href="/The-Ordinary/shop" style="color: gray;">Shop</a></li>
            &rsaquo;
            <li><a
                    href="/The-Ordinary/product?id=<?= htmlspecialchars($product[0]['ID_San_Pham']) ?>"><?php echo $product[0]['Ten_SP'] ?></a>
            </li>
        </ul>
    </div>

    <!------------------- MAIN --------------------->
    <!------------------- MAIN --------------------->
    <!------------------- MAIN --------------------->

    <?php foreach ($product as $item): ?>
    <div class="product-detail-main">

        <!------------------- SLIDE IMG --------------------->
        <!------------------- SLIDE IMG --------------------->
        <!------------------- SLIDE IMG --------------------->

        <div class="product-detail-img">
            <div class="img-slide">
                <?php foreach (explode(';', $item['Hinh_Anh']) as $img): ?>
                <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($item['Ten_SP']) ?>"
                    class="img-slide-item" onclick="changeImg(this.src)">
                <?php endforeach ?>
            </div>
            <div class="img-main">
                <img src="<?= htmlspecialchars(explode(';', $item["Hinh_Anh"])[0]) ?>" class="img-main-item">
            </div>
        </div>

        <!------------------- INFO PRODUCT --------------------->
        <!------------------- INFO PRODUCT --------------------->
        <!------------------- INFO PRODUCT --------------------->

        <div class="product-detail-info">
            <h2 class="product-detail-title">
                <?= htmlspecialchars($item['Ten_SP']) ?>
            </h2>
            <p class="product-detail-price">
                <?= number_format(htmlspecialchars($item['Gia']), 2) ?> USD
            </p>
            <p class="product-detail-description">
                <?= htmlspecialchars($item['Mo_Ta_Ngan']) ?>
            </p>
            <div class="product-detail-capacity">
                <?php foreach (explode(',', $item['Dung_Tich']) as $capacity): ?>
                <p class="product-detail-capacity--item">
                    <?= htmlspecialchars($capacity) ?>
                </p>
                <?php endforeach ?>
            </div>

            <div class="product-detail-quantity">
                <div class="quantity-amount">
                    <button class="btn-quantity" type="button"
                        onclick="this.parentNode.querySelector('input[type=number]')">-</button>
                    <input type="text" disabled value="1" class="input-quantity">
                    <button class="btn-quantity" type="button"
                        onclick="this.parentNode.querySelector('input[type=number]')">+</button>
                </div>
                <script>
                    document.querySelectorAll('.btn-quantity').forEach(function (button) {
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
                <button class="submit-add-to-cart" type="submit">
                    <i class='fa-solid fa-cart-shopping'></i>
                    Add to cart
                </button>
            </div>
            <div class="product-detail-message">
                <p class="product-detail-message--text">Free shipping on orders over $25</p>
                <p class="product-detail-message--text">365 days returns</p>
            </div>
            <div class="product-detail-attribute">
                <div class="product-detail-attribute--item">
                    <p class="attribute-item-title">Targets</p>
                    <p class="attribute-item-content">
                        <?= htmlspecialchars($item['Targets']) ?>
                    </p>
                </div>
                <div class="product-detail-attribute--item">
                    <p class="attribute-item-title">Suited to</p>
                    <p class="attribute-item-content">
                        <?= htmlspecialchars($item['Suited_to']) ?>
                    </p>
                </div>
                <div class="product-detail-attribute--item">
                    <p class="attribute-item-title">Format</p>
                    <p class="attribute-item-content">
                        <?= htmlspecialchars($item['Format']) ?>
                    </p>
                </div>
                <div class="product-detail-attribute--item">
                    <p class="attribute-item-title">Key ingredients</p>
                    <p class="attribute-item-content">
                        <?= htmlspecialchars($item['Key_ingredients']) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <script>
        function changeImg(src) {
            const imgMain = document.querySelector('.img-main-item');
            imgMain.src = src;
            const imgItems = document.querySelectorAll('.img-slide-item');
            imgItems.forEach(item => {
                if (item.src === imgMain.src) {
                    item.classList.add('actived-img-slide-item');
                } else {
                    item.classList.remove('actived-img-slide-item');
                }
            });

        }

        document.addEventListener('DOMContentLoaded', function () {
            const firstImg = document.querySelector('.img-slide-item');
            if (firstImg) {
                changeImg(firstImg.src);
            }
        });
    </script>

    <!-------------------OVERVIEW PRODUCT --------------------->
    <!-------------------OVERVIEW PRODUCT --------------------->
    <!-------------------OVERVIEW PRODUCT --------------------->

    <div class="product-detail-overview">
        <h2 class="product-detail-overview--title">Overview</h2>
        <button class="overview-content-toggle">
            <i class="fa-solid fa-angle-up"></i>
        </button>
        <script>
            document.querySelector('.overview-content-toggle').addEventListener('click', function () {
                const content = document.querySelector('.product-detail-overview--block');
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
                document.querySelector('.overview-content-toggle').style.transform = content.style.display === 'block' ? 'rotate(0)' : 'rotate(180deg)';
            });
        </script>
        <div class="product-detail-overview--block" style="display: block;">
            <div class="overview-inner">
                <div class="overview-inner-tab">
                    <div class="tab-pane">
                        <div class="tab-pane--left">
                            <div class="cta-link">
                                <h3>Discover if this product is right for you:</h3>
                                <div class="cataLink">
                                    <a class="btn-rounded-primary">Customize My Regimen</a>
                                </div>
                            </div>
                            <div class="descripstion-overview">
                                <h3 class="descripstion-overview--title">Product Details</h3>
                                <p class="descripstion-overview--content">
                                    <?= htmlspecialchars($item['Mo_Ta']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane--right">
                            <h3>Highlights</h3>
                            <div class="highlights-table">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------- USAGE PRODUCT --------------------->
    <!------------------- USAGE PRODUCT --------------------->
    <!------------------- USAGE PRODUCT --------------------->

    <div class="product-detail-usage">
        <h2 class="product-detail-usage--title">Usage Details</h2>
        <button class="overview-content-toggle--usage">
            <i class="fa-solid fa-angle-up"></i>
        </button>
        <script>
            document.querySelector('.overview-content-toggle--usage').addEventListener('click', function () {
                const content = document.querySelector('.product-detail-usage--content');
                content.style.display = content.style.display === 'grid' ? 'none' : 'grid';
                document.querySelector('.overview-content-toggle--usage').style.transform = content.style.display === 'grid' ? 'rotate(0)' : 'rotate(180deg)';
            });
        </script>
        <div class="product-detail-usage--content" style="display: grid;">
            <div class="usage-item">
                <img class="usage-item--img"
                    src="https://theordinary.com/on/demandware.static/-/Sites-deciem-master/default/dw8d85a6b1/Images/Usage-Details-How-To-Use-Image.jpg">
                <div class="usage-item--content">
                    <p>How to use</p>
                    <p>&#8594;</p>
                </div>
            </div>
            <div class="usage-item">
                <img class="usage-item--img"
                    src="https://theordinary.com/on/demandware.static/-/Library-Sites-DeciemSharedLibrary/default/dw9fb87a33/theordinary/pdp-cards/Usage-Details-Product-And-Safety-Guidance-Image.jpg">
                <div class="usage-item--content">
                    <p>Product & Safety Guidance</p>
                    <p>&#8594;</p>
                </div>
            </div>
            <div class="usage-item">
                <img class="usage-item--img"
                    src="https://theordinary.com/on/demandware.static/-/Library-Sites-DeciemSharedLibrary/default/dw23e9d8a2/theordinary/pdp-cards/Usage-Details-Disposal-Instructions-Image.jpg">
                <div class="usage-item--content">
                    <p>Recycling instructions</p>
                    <p>&#8594;</p>
                </div>
            </div>
        </div>
    </div>

</div>
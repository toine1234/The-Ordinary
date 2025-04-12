<div class="container-product-detail">
    <div class="router-product-detail">
        <ul class="list-router-product-detail">
            <li><a href="/The-Ordinary/shop" style="color: gray;">Shop</a></li>
            &rsaquo;
            <li><a
                    href="/The-Ordinary/product?id=<?= htmlspecialchars($product[0]['IP_San_Pham']) ?>"><?php echo $product[0]['Ten_SP'] ?></a>
            </li>
        </ul>
    </div>

    <!------------------- MAIN --------------------->
    <!------------------- MAIN --------------------->
    <!------------------- MAIN --------------------->

    <?php foreach ($product as $item): ?>
    <div class="product-detail-product">

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
                <?= htmlspecialchars($item['Gia']) ?> USD
            </p>
            <p class="product-detail-description">
                <?= htmlspecialchars($item['Mo_Ta_Ngan']) ?>
            </p>
            <div class="product-detail-btn">
                <button class="btn-add-to-cart" type="button">Add to cart</button>
                <button class="btn-buy-now" type="button">Buy now</button>
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

        // Set the first image as the main image on page load
        document.addEventListener('DOMContentLoaded', function () {
            const firstImg = document.querySelector('.img-slide-item');
            if (firstImg) {
                changeImg(firstImg.src);
            }
        });
    </script>



</div>
<?php
$list_filter_category = [
    'Serums' => '1',
    'Moisturizers' => '2',
    'Exfoliators' => '3',
    'Eye Serums' => '4',
    'Facial Cleansers' => '5',
    'Face Oils' => '6',
    'Toners & Essences' => '7',
    'Face Masques' => '8',
    'Explore Skincare' => '9',
];

$list_filter_format = [
    'Serum',
    'Cream',
    'Gel',
    'Liquid',
    'Oil',
    'Powder',
    'Balm',
    'Masque',
    'Suspension',
];

$list_filter_sort = [
    'Bestsellers',
    'Rank by lowest price',
    'Rank by highest price',
    'Rating',
]
    ?>
<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<div class="shop-container">
    <div class="router-shop">
        <ul class="list-router-shop">
            <li><a href="/The-Ordinary" style="color: gray;">Home</a></li>
            &rsaquo;
            <li><a href="/The-Ordinary/shop">Shop</a></li>
        </ul>
    </div>

    <!--------------- MAIN ------------------>
    <!--------------- MAIN ------------------>

    <div class="shop-main-content">

        <!--------------- FILTER PRODUCTS ------------------>
        <!--------------- FILTER PRODUCTS ------------------>
        <!--------------- FILTER PRODUCTS ------------------>

        <div class="filter-products-shop">
            <h2>Filter By</h2>

            <!--------------- Product Type Filter ------------------>
            <!--------------- Product Type Filter ------------------>
            <!--------------- Product Type Filter ------------------>

            <div class="filter-group">
                <div class="filter-group-title">
                    <p class="name-filter">Product Type</p>
                    <button class="btn-more-filter--type">&#43;</button>
                </div>
                <script>
                    document.querySelector('.btn-more-filter--type').addEventListener('click', function () {
                        const items = document.querySelector('.filter-group-items--type');
                        items.style.display = items.style.display === 'block' ? 'none' : 'block';
                        this.innerText = items.style.display === 'block' ? '-' : '+';

                    });
                </script>
                <div class="filter-group-items--type"
                    style="<?= isset($_GET['cate']) ? 'display: block;' : 'display: none;' ?>">
                    <form method="GET" id="filter-form--type">
                        <?php foreach ($list_filter_category as $item => $value):
                            $checked = in_array($value, $_GET['cate'] ?? []) ? 'checked' : ''; ?>
                            <label class="filter-item">
                                <input type="checkbox" name="cate[]" value="<?= htmlspecialchars($value) ?>" <?= $checked ?>>
                                <?= htmlspecialchars($item) ?>
                            </label>
                        <?php endforeach; ?>
                    </form>
                    <script>
                        document.querySelectorAll('#filter-form--type input[type="checkbox"]')
                            .forEach(
                                function (checkbox) {
                                    checkbox.addEventListener('change', function () {
                                        document.getElementById('filter-form--type').submit();

                                    });


                                });
                    </script>
                </div>
            </div>

            <!--------------- Format Filter ------------------>
            <!--------------- Format Filter ------------------>
            <!--------------- Format Filter ------------------>

            <div class="filter-group">
                <div class="filter-group-title">
                    <p class="name-filter">Format</p>
                    <button class="btn-more-filter--format"><?= isset($_GET['type']) ? '-' : '+' ?></button>
                </div>
                <script>
                    document.querySelector('.btn-more-filter--format').addEventListener('click', function () {
                        const items = document.querySelector('.filter-group-items--format');
                        items.style.display = items.style.display === 'block' ? 'none' : 'block';
                        this.innerText = items.style.display === 'block' ? '-' : '+';


                    });
                </script>
                <div class="filter-group-items--format"
                    style="<?= isset($_GET['type']) ? 'display: block;' : 'display: none;' ?>">
                    <form method="GET" id="filter-form--format">
                        <?php foreach ($list_filter_format as $item):
                            $checked = in_array($item, $_GET['type'] ?? []) ? 'checked' : ''; ?>
                            <label class="filter-item">
                                <input type="checkbox" name="type[]" value="<?= htmlspecialchars($item) ?>" <?= $checked ?>>
                                <?= htmlspecialchars($item) ?>
                            </label>
                        <?php endforeach; ?>
                    </form>
                    <script>
                        document.querySelectorAll('#filter-form--format input[type="checkbox"]')
                            .forEach(
                                function (checkbox) {
                                    checkbox.addEventListener('change', function () {
                                        document.getElementById('filter-form--format').submit();

                                    });


                                });
                    </script>
                </div>
            </div>
        </div>

        <!--------------- PRODUCTS ------------------>
        <!--------------- PRODUCTS ------------------>
        <!--------------- PRODUCTS ------------------>

        <div class="products-list">
            <div class="filter-sort">
                <button class="btn-filter-sort" type="button">
                    <span class="filter-sort-title">Sort by</span>
                    <span class="filter-sort-icon">&#8250;</span>
                    <div class="sort-by-bar">
                        <form class="sort-form">
                            <?php foreach ($list_filter_sort as $item): ?>
                                <label class="sort-item">
                                    <input type="radio" name="sort" value="<?= htmlspecialchars($item) ?>"
                                        <?= isset($_GET['sort']) && $_GET['sort'] === $item ? 'checked' : '' ?>>
                                    <?= htmlspecialchars($item) ?>
                                </label>
                            <?php endforeach; ?>
                        </form>
                        <script>
                            document.querySelectorAll('.sort-form input[type="radio"]')
                                .forEach(
                                    function (checkbox) {
                                        checkbox.addEventListener('change', function () {
                                            document.querySelector('.sort-form').submit();

                                        });

                                    });
                        </script>
                    </div>
                </button>
                <script>
                    document.querySelector('.btn-filter-sort').addEventListener('click', function () {
                        const items = document.querySelector('.sort-by-bar');
                        const btn = document.querySelector('.btn-filter-sort');
                        items.style.display = items.style.display === 'block' ? 'none' : 'block';
                        btn.style.border = items.style.display === 'block' ? '1px solid #000' : 'none';
                    });
                </script>
            </div>
            <div class="products-list-title">
                <h2><?php echo isset($_GET['search']) ? "Results for " . '"' . $_GET['search'] . '"' : "All products" ?></h2>
            </div>
            <?php
            if ($products == null) {
                echo '<h2 class="no_product" style="text-align: center; margin-top: 20px;">No products found</h2>';
            }
            ?>
            <?php foreach ($products as $product): ?>
                <form aria-disabled="true" action="/The-Ordinary/cart" method="post" class="product-container">
                    <input type="hidden" name="productId" value="<?= htmlspecialchars($product["ID_San_Pham"]) ?>">
                    <input type="hidden" name="quantity" value="1">
                    <a href="/The-Ordinary/product?id=<?= htmlspecialchars($product["ID_San_Pham"]) ?>">
                        <img src="<?= htmlspecialchars(explode(';', $product["Hinh_Anh"])[0]) ?>"
                            alt="<?= htmlspecialchars($product["Ten_SP"]) ?>" class="product-image">
                    </a>
                    <h2 class="product-title"><?= htmlspecialchars($product["Ten_SP"]) ?></h2>
                    <div class="rating-group">
                        <?php 
                        $fullstar = floor($product['overall']);
                        $halfstar = ($product['overall'] - $fullstar) >= 0.5 ? 1:0;
                        $emptystar = 5 - $fullstar - $halfstar;
                        ?>
                        <?php for ($i = 0; $i < $fullstar; $i++): ?>
                            <i class="bi bi-star-fill"></i>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < $halfstar; $i++): ?>
                            <i class="bi bi-star-half"></i>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < $emptystar; $i++): ?>
                            <i class="bi bi-star"></i>
                        <?php endfor; ?>
                        <p><?=number_format($product['overall'],1)?></p>
                        <p><?= '('.$product['reviews'].')'?></p>
                    </div>
                    <p class="product-targets"><?= htmlspecialchars($product["Targets"]) ?></p>
                    <div class="product-quantity">
                        <p class="product-price"><?= number_format($product["Gia"], 2) ?> USD</p>
                        <p><?= htmlspecialchars($product["Dung_Tich"]) ?></p>
                    </div>
                    <button name="create" value="create" <?= $product['SL'] == 0 ? "disabled" : "" ?> class="btn-add-to-cart"
                        type="submit">Add to Cart</button>
                    <?php if ($product['SL'] == 0): ?>
                        <div class="sold-out">
                            <p>Sold Out</p>
                        </div>
                    <?php endif; ?>
                </form>
            <?php endforeach ?>
            <div class="list-page-product">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a style="<?= isset($_GET['page']) && $_GET['page'] == $i ? "background-color:var(--black)" : "background-color:var(--graynhe)" ?>"
                        href="/The-Ordinary/shop?page=<?= $i ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>


        </div>
    </div>
</div>
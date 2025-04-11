<?php
$list_filter_type = [
    'Serums',
    'Moisturizers',
    'Exfoliators',
    'Eye Serums',
    'Facial Cleansers',
    'Face Oils',
    'Toners & Essences',
    'Face Masques',
    'Explore Skincare',
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
?>
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
                        items.style.display === 'block' ? items.classList.add('slide-in') : items.classList.remove('slide-in');
                    });
                </script>
                <div class="filter-group-items--type">
                    <form method="GET" id="filter-form--type">
                        <?php foreach ($list_filter_type as $item):
                            $checked = in_array($item, $_GET['type'] ?? []) ? 'checked' : ''; ?>
                            <label class="filter-item">
                                <input type="checkbox" name="type[]" value="<?= htmlspecialchars($item) ?>" <?= $checked ?>>
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
                                    const items = document.querySelector('.filter-group-items--type');
                                    items.style.display = 'block'

                                });
                    </script>
                </div>
            </div>

            <!--------------- Active Ingredient Filter ------------------>
            <!--------------- Active Ingredient Filter ------------------>
            <!--------------- Active Ingredient Filter ------------------>


            <div class="filter-group">
                <div class="filter-group-title">
                    <p class="name-filter">Active Ingredient</p>
                    <button class="btn-more-filter--active">&#43;</button>
                </div>
            </div>

            <!--------------- Format Filter ------------------>
            <!--------------- Format Filter ------------------>
            <!--------------- Format Filter ------------------>

            <div class="filter-group">
                <div class="filter-group-title">
                    <p class="name-filter">Format</p>
                    <button class="btn-more-filter--format">&#43;</button>
                </div>
                <script>
                    document.querySelector('.btn-more-filter--format').addEventListener('click', function () {
                        const items = document.querySelector('.filter-group-items--format');
                        items.style.display = items.style.display === 'block' ? 'none' : 'block';
                        items.style.display === 'block' ? items.classList.add('slide-in') : items.classList.remove('slide-in');
                    });
                </script>
                <div class="filter-group-items--format">
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
                                    const items = document.querySelector('.filter-group-items--format');
                                    items.style.display = 'block'

                                });
                    </script>
                </div>
            </div>
        </div>

        <!--------------- PRODUCTS ------------------>
        <!--------------- PRODUCTS ------------------>
        <!--------------- PRODUCTS ------------------>

        <div class="products-list">
            <div class="products-list-title">
                <h2>Products</h2>
                <p>All products</p>
            </div>
            <?php foreach ($products as $product): ?>
                <div class="product-container">
                    <img src="<?= htmlspecialchars(explode(';', $product["Hinh_Anh"])[0]) ?>"
                        alt="<?= htmlspecialchars($product["Ten_SP"]) ?>" class="product-image">
                    <h2 class="product-title"><?= htmlspecialchars($product["Ten_SP"]) ?></h2>
                    <p class="product-targets"><?= htmlspecialchars($product["Targets"]) ?></p>
                    <div class="product-quantity">
                        <p class="product-price"><?= number_format($product["Gia"], 2) ?> USD</p>
                        <p><?= htmlspecialchars($product["Dung_Tich"]) ?></p>
                    </div>
                    <button class="btn-add-to-cart" type="button">Add to Cart</button>

                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
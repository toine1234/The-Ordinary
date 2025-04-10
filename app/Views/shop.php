<?php
$list_filter = [
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
?>
<div class="shop-container">
    <div class="router-shop">
        <ul class="list-router-shop">
            <li><a href="/The-Ordinary" style="color: gray;">Home</a></li>
            &rsaquo;
            <li><a href="/The-Ordinary/shop">Shop</a></li>
        </ul>
    </div>
    <div class="shop-main-content">
        <div class="filter-products-shop">
            <h2>Filter By</h2>
            <div class="filter-group">
                <div class="filter-group-title">
                    <p class="name-filter">Product Type</p>
                    <button class="btn-more-filter">&#43;</button>
                </div>
                <div class="filter-group-items">
                    <form method="GET" id="filter-form">
                        <?php foreach ($list_filter as $item):
                            $checked = in_array($item, $_GET['type'] ?? []) ? 'checked' : ''; ?>
                            <label>
                                <input type="checkbox" name="type[]" value="<?= htmlspecialchars($type) ?>" <?= $checked ?>>
                                <?= htmlspecialchars($item) ?>
                            </label><br>
                        <?php endforeach; ?>
                    </form>

                </div>
            </div>
        </div>
        <div class="products-list">
            <?php foreach ($products as $product): ?>
                <div class="product-container">
                    <h2 class="product-title"><?= htmlspecialchars($product["Ten_SP"]) ?></h2>
                    <p class="product-targets"><?= htmlspecialchars($product["Targets"]) ?></p>
                    <div class="product-quantity">
                        <p class="product-price"><?= htmlspecialchars($product["Gia"]) ?>USD</p>
                        <p><?= htmlspecialchars($product["Dung_Tich"]) ?></p>

                    </div>

                    <button class="btn-add-to-cart" type="button">Add to Cart</button>

                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
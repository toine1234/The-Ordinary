<h1>Sản phẩm</h1>
<?php foreach ($products as $product): ?>
    <div>
        <h3><?= $product['name'] ?></h3>
        <p><?= number_format($product['price']) ?> đ</p>
    </div>
<?php endforeach; ?>

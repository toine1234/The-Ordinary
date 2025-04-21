<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE ORDINARY</title>
    <link rel="icon"
        href="https://theordinary.com/on/demandware.static/Sites-deciem-global-Site/-/default/dw8dc43046/images/brands-logo/theordinary_black.svg"
        type="image/x-icon">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public\assets\css\style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
$list_page = [
    "Products",
    "Users",
    "Orders",
    "Payment",
    "Setting",
]
    ?>

<body>
    <div class="wrapper-admin">
        <div class="header-admin">
            <nav class="navbar-admin">
                <ul class="navbar-admin-items">
                    <li><a href="/The-Ordinary">Home</a></li>
                    <li><a href="/The-Ordinary/shop">Shop</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </nav>
            <div class="logo-brand-admin">
                <img src='https://brandlogos.net/wp-content/uploads/2025/02/the_ordinary-logo_brandlogos.net_ruxn6.png'>

            </div>
        </div>
        <div class="container-admin">
            <div class="sidebar-admin">
                <form class="sidebar-admin-items" method="get">
                    <?php foreach ($list_page as $item): ?>
                        <label
                        style="<?= isset($_GET['page']) && $_GET['page'] === $item ? "background-color:var(--black);color:var(--white)":"" ?>"
                        class="sidebar-item">
                            <input hidden type="radio" name="page" value=<?= $item ?> 
                            <?= isset($_GET['page']) && $_GET['page'] === $item ? 'checked' : '' ?>>
                            <p><?= $item ?></p>
                        </label>
                    <?php endforeach; ?>
                </form>
                <script>
                    document.querySelectorAll('.sidebar-admin-items input[type="radio"]')
                        .forEach(
                        function (checkbox) {
                            checkbox.addEventListener('change', function () {
                                document.querySelector('.sidebar-admin-items').submit();
                            });
                    });
                </script>
            </div>
            <div class="content-admin">
                <?php if (isset($_GET['page']) && $_GET['page'] === 'Products'): ?>
                    <div class="table-data-products">
                        <table class="custom-table">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Format</th>
                                <th>Created Date</th>
                            </tr>
                            <?php foreach($products as $product): ?>
                                <tr onclick="display_view_products(<?= $product['ID_San_Pham'] ?>)">
                                    <td><?= $product["ID_San_Pham"]?></td>
                                    <td><?= $product["Ten_SP"]?></td>
                                    <td><?= $product["SL"]?></td>
                                    <td><?=number_format($product["Gia"],2)?> USD</td>
                                    <td><?=$product["Format"]?></td>
                                    <td><?=$product["Ngay_Tao"]?></td>
                                </tr>
                            <?php endforeach; ?>
                            <script>
                                function display_view_products(id){
                                    const form = document.createElement('form')
                                    form.innerHTML=`<input hidden type="radio" name="view" value=${id}>`
                                    form.target="_self"
                                    form.method = "get"
                                    form.action = "/The-Ordinary/admin?page=Products"
                                    form.submit()
                                }
                            </script>
                        </table>
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['page']) && $_GET['page'] === 'Users'): ?>
                    <div>Users</div>
                <?php endif; ?>
                <?php if (isset($_GET['page']) && $_GET['page'] === 'Orders'): ?>
                    <div>Orders</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
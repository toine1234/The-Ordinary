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
    <link rel="stylesheet" href="public\assets\css\admin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
$list_page = [
    "Products",
    "Orders",
    "Payment",
    "Sales",
    "Setting",
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

$list_suited_to =[
    'All Skin Types',
    'Dry Skin',
    'Oily Skin'
];

$list_category = [
    'Serums',
    'Gifts',
    'Moisturizers',
    'Exfoliators',
    'Eye Serums',
    'Facial Cleansers',
    'Face Oils',
    'Toners & Essences',
    'Face Masques',
    'Explore Skincare'
];

$list_filter_sort = [
    'Rank by lowest price',
    'Rank by highest price'
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
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
                <?= $_SESSION['flash']['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <div class="container-admin">
            <div class="sidebar-admin">
                <form class="sidebar-admin-items" method="get">
                    <?php foreach ($list_page as $item): ?>
                        <label
                        style="<?= isset($_GET['page']) && $_GET['page'] === $item ? "background-color:var(--black);color:var(--white)":"" ?>"
                        class="sidebar-item">
                            <input hidden type="radio" name="page" value=<?= $item ?> 
                            <?=isset($_GET['page']) && $_GET['page'] === $item ? "checked":"" ?>>
                            <p><?= $item ?></p>
                        </label>
                    <?php endforeach; ?>
                </form>
                <div class="sidebar-admin-items">
                    <a class="sidebar-item" href="/The-Ordinary/logout">Logout</a>
                </div class="sibe-bar-admin-items">
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

                <!-------------- PRODUCT PAGE -------------->
                <!-------------- PRODUCT PAGE -------------->
                <!-------------- PRODUCT PAGE -------------->
                    
                <?php if (isset($_GET['page']) && $_GET['page'] === 'Products'): ?>
                    <div class="content-admin-products">

                    <!-------------- STORE TABLE -------------->
                    <!-------------- STORE TABLE -------------->
                    <!-------------- STORE TABLE -------------->

                        <div class="header-table">
                            <h2 class="table-title">STOCK TABLE</h2>
                            <button class="overview-content-toggle">
                                <i class="fa-solid fa-angle-up"></i>
                            </button>
                        </div>
                        <script>
                            document.querySelector('.overview-content-toggle').addEventListener('click', function () {
                                const content = document.querySelector('.table-data-store');
                                content.style.display = content.style.display === 'block' ? 'none' : 'block';
                                document.querySelector('.overview-content-toggle').style.transform = content.style.display === 'block' ? 'rotate(0)' : 'rotate(180deg)';
                            });
                        </script>
                        <div style="display: block;" id="store" class="table-data-store">
                            <table class="custom-table">
                                <tr>
                                    <th>Id</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Brand Producer</th>
                                    <th>EXP</th>
                                    <th>MFG</th>
                                    <th>Created Date</th>
                                </tr>
                                <?php foreach($store as $item):?>
                                <tr>
                                    <td><?= $item['ID_San_Pham']?></td>
                                    <td><?= $item['Gia_Nhap']?></td>
                                    <td><?= $item['SL']?></td>
                                    <td><?= $item['Don_Vi_Cung_Cap']?></td>
                                    <td><?= $item['NSX']?></td>
                                    <td><?= $item['HSD']?></td>
                                    <td><?=$item["Ngay_Tao"]?></td>
                                </tr>
                                <?php endforeach;?>
                                
                            </table>
                        </div>
                        
                        <!-------------- PRODUCT TABLE -------------->
                        <!-------------- PRODUCT TABLE -------------->
                        <!-------------- PRODUCT TABLE -------------->

                        <div class="header-table">
                            <h2 class="table-title">PRODUCT TABLE</h2>
                            <button class="overview-content-toggle--2">
                                <i class="fa-solid fa-angle-up"></i>
                            </button>
                        </div>
                        <script>
                            document.querySelector('.overview-content-toggle--2').addEventListener('click', function () {
                                const content = document.querySelector('.table-data-products');
                                const feature = document.querySelector('.feature-product-table')
                                feature.style.display = feature.style.display === 'flex' ? 'none' : 'flex';
                                content.style.display = content.style.display === 'block' ? 'none' : 'block';
                                document.querySelector('.overview-content-toggle--2').style.transform = content.style.display === 'block' ? 'rotate(0)' : 'rotate(180deg)';
                            });
                        </script>
                        <div style="display: flex;" id="product" class="feature-product-table">
                            <form method="get" class="form-search">
                                <input type="text" hidden name="page" value="Products">
                                <div id="search" class="search">
                                    <i class='fa-solid fa-magnifying-glass'></i>
                                    <input name="search" type="text">
                                </div>
                                <button class="btn-search" type="submit">Search</button>
                            </form>
                            <form method="get" class="form-sort">
                                <input type="text" hidden name="page" value="Products">
                                <select style="height: 100%;" name="sort">
                                    <option value="" disabled selected>Select Sort</option>
                                    <?php foreach($list_filter_sort as $sort):?>
                                        <option <?= isset($_GET['sort']) && $_GET['sort'] === $sort ? 'selected' :''?> value="<?= $sort?>"><?= $sort?></option>
                                    <?php endforeach;?>
                                </select>
                            </form>
                            <script>
                            document.querySelectorAll('.form-sort select')
                                .forEach(
                                    function (checkbox) {
                                        checkbox.addEventListener('change', function () {
                                            document.querySelector('.form-sort').submit();

                                        });

                                    });
                            </script>
                        </div>
                        <div style="display: block;" class="table-data-products">
                            <table class="custom-table">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Format</th>
                                    
                                </tr>
                                <?php foreach($products as $item): ?>
                                    <tr 
                                    style="<?= isset($_GET['view']) && $_GET['view'] === $item['ID_San_Pham'] ? "background-color:var(--graynhe)":""?>" 
                                    id="<?=$item['ID_San_Pham']?>" 
                                    onclick="window.location.href='/The-Ordinary/admin?page=Products&view=<?=$item['ID_San_Pham']?>#<?=$item['ID_San_Pham']?>'">
                                        <td><?= $item["ID_San_Pham"]?></td>
                                        <td><?= $item["Ten_SP"]?></td>
                                        <td><?= $item["SL"]?></td>
                                        <td><?=number_format($item["Gia"],2)?> USD</td>
                                        <td><?=$item["Format"]?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        
                        <!-------------- INFORMATION -------------->
                        <!-------------- INFORMATION -------------->
                        <!-------------- INFORMATION -------------->
                        
                        <div class="info-detail">
                            <h2 class="info-detail-title">INFORMATION</h2>
                            <?php if (isset($_GET['view'])):?>
                            <form action="/The-Ordinary/admin/products" method="post" class="form-product-detail">
                                <div hidden class="form-group">
                                    <span>Id</span>
                                    <input readonly name="id_product" type="text" value="<?= isset($_GET['view']) ? $product[0]['ID_San_Pham'] :""?>">
                                </div>
                                <div class="form-group">
                                    <span>Name</span>
                                    <input name="name_product" type="text" value="<?= isset($_GET['view']) ? $product[0]['Ten_SP'] :""?>">
                                </div>
                                <div class="form-group">
                                    <span>Price</span>
                                    <input name="price_product" type="text" value="<?= isset($_GET['view']) ? number_format($product[0]['Gia'],2) :""?>">
                                </div>
                               
                                <div class="form-group">
                                    <span>Quantity</span>
                                    <input name="quantity_product" type="text" value="<?= isset($_GET['view']) ? $product[0]['SL'] :""?>">
                                </div>
                                <div class="form-group">
                                    <span>Size</span>
                                    <input name="size_product" type="text" value="<?= isset($_GET['view']) ? $product[0]['Dung_Tich'] :""?>">
                                </div>
                                <div class="form-group">
                                    <span>Targets</span>
                                    <input name="targets_product" type="text" value="<?= isset($_GET['view']) ? $product[0]['Targets'] :""?>">
                                </div>
                                <div class="form-group">
                                    <span>Key ingredients</span>
                                    <input name="ingredients_product" type="text" value="<?= isset($_GET['view']) ? $product[0]['Key_ingredients'] :""?>">
                                </div>
                                <div class="form-group">
                                    <span>Suited to</span>
                                    <select name="suited_product">
                                        <option disabled value="" >Select Suited</option>
                                        <?php foreach ($list_suited_to as $suited): ?>
                                        <option value="<?=$suited?>" <?=isset($_GET['view'])&&trim($suited) === trim($product[0]['Suited_to']) ? 'selected':''?>><?=$suited?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>Category</span>
                                    <select name="format_product">
                                        <option disabled value="" >Select Category</option>
                                        <?php foreach ($list_filter_format as $format): ?>
                                        <option value="<?=$format?>" <?= isset($_GET['view'])&&$format === $product[0]['Format'] ? 'selected':''?>><?=$format?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div style="grid-column-start:1;grid-column-end:3;width:100%" class="form-group">
                                    <span>Description</span>
                                    <textarea name="description_product" rows="5" cols="50"><?= isset($_GET['view']) ? $product[0]['Mo_Ta'] :""?></textarea>
                                </div>
                                <div class="Album">
                                    <span>Album</span>
                                    <div class="list-img">
                                    <?php foreach(explode(";",$product[0]['Hinh_Anh']) as $img):?>
                                        <img class="list-img-item" src="<?= $img?>">
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="submit" name="update" value="update">Update</button>
                                    <button type="submit" name="delete" value="delete">Delete</button>
                                </div>
                            </form>
                            <?php endif; ?>
                        </div>

                        <!-------------- CREATE -------------->
                        <!-------------- CREATE -------------->
                        <!-------------- CREATE -------------->

                        <div class="create-product">
                            <h2 class="create-product-title">CREATE</h2>
                            <form action="/The-Ordinary/admin/products" method="post" enctype="multipart/form-data" class="form-create-product">
                                <h3 style="grid-column-start:1;grid-column-end:3;width:100%">Create Stock</h3>
                                <div class="form-group">
                                    <span>Price Import</span>
                                    <input name="price_store" type="text">
                                </div>
                                <div class="form-group">
                                    <span>Quantity</span>
                                    <input name="quantity_store" type="text">
                                </div>
                                <div class="form-group">
                                    <span>Brand Producer</span>
                                    <input name="producer_store" type="text">
                                </div>
                                <div class="form-group">
                                    <span>EXP</span>
                                    <input name="exp_store" type="date">
                                </div>
                                <div class="form-group">
                                    <span>MFG</span>
                                    <input name="mfg_store" type="date">
                                </div>
                                <h3 style="grid-column-start:1;grid-column-end:3;width:100%;margin-top:30px;">Create Product</h3>
                                <div class="form-group">
                                    <span>Name</span>
                                    <input name="name_product" type="text">
                                </div>
                                <div class="form-group">
                                    <span>Price</span>
                                    <input name="price_product" type="text">
                                </div>
                                <div class="form-group">
                                    <span>Quantity</span>
                                    <input name="quantity_product" type="text">
                                </div>
                                <div class="form-group">
                                    <span>Size</span>
                                    <input name="size_product" type="text">
                                </div>
                                <div class="form-group">
                                    <span>Targets</span>
                                    <input name="targets_product" type="text">
                                </div>
                                <div class="form-group">
                                    <span>Key ingredients</span>
                                    <input name="ingredients_product" type="text">
                                </div>
                                <div class="form-group">
                                    <span>Suited to</span>
                                    <select name="suited_product">
                                        <option disabled selected value="" >Select Suited</option>
                                        <?php foreach ($list_suited_to as $suited): ?>
                                        <option><?=$suited?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span>Category</span>
                                    <select name="format_product">
                                        <option disabled selected value="" >Select Category</option>
                                        <?php foreach ($list_filter_format as $format): ?>
                                        <option value="<?=$format?>"><?=$format?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div style="grid-column-start:1;grid-column-end:3;width:100%" class="form-group">
                                    <span>Description</span>
                                    <textarea name="description_product" rows="5" cols="50"></textarea>
                                </div>
                                <div class="Album">
                                    <span>Album</span>
                                    <div class="dropzone" id="dropzone"><p>Drag drop image in here</p></div>
                                        <input type="file" name="images[]" id="fileInput" multiple style="display:none">
                                    <div class="preview" id="preview"></div>
                                </div>
                                <div class="btn-group">
                                    <button type="submit" name="create" value="create">Create</button>
                                </div>
                            </form>
                            <script>
                                const dropzone = document.getElementById('dropzone');
                                const fileInput = document.getElementById('fileInput');
                                const preview = document.getElementById('preview');

                                dropzone.addEventListener('click', () => fileInput.click());

                                dropzone.addEventListener('dragover', (e) => {
                                    e.preventDefault();
                                    dropzone.classList.add('dragover');
                                });

                                dropzone.addEventListener('dragleave', () => {
                                    dropzone.classList.remove('dragover');
                                });

                                dropzone.addEventListener('drop', (e) => {
                                    e.preventDefault();
                                    dropzone.classList.remove('dragover');
                                    fileInput.files = e.dataTransfer.files;
                                    showPreview(fileInput.files);
                                });

                                fileInput.addEventListener('change', () => {
                                    showPreview(fileInput.files);
                                });

                                function showPreview(files) {
                                    preview.innerHTML = "";
                                    for (let i = 0; i < files.length; i++) {
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        const img = document.createElement("img");
                                        img.src = e.target.result;
                                        preview.appendChild(img);
                                    };
                                    reader.readAsDataURL(files[i]);
                                    }
                                }
                            </script>
                        </div>
                    </div>
                <?php endif; ?>

                <!-------------- USERS PAGE -------------->
                <!-------------- USERS PAGE -------------->
                <!-------------- USERS PAGE -------------->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'Users'): ?>
                    <div>Users</div>
                <?php endif; ?>

                <!-------------- ORDERS PAGE -------------->
                <!-------------- ORDERS PAGE -------------->
                <!-------------- ORDERS PAGE -------------->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'Orders'): ?>
                    <div class="content-admin-order">
                        <div class="header-table">
                                <h2 class="table-title">ORDER TABLE</h2>
                                <button class="overview-content-toggle">
                                    <i class="fa-solid fa-angle-up"></i>
                                </button>
                            </div>
                            <script>
                                document.querySelector('.overview-content-toggle').addEventListener('click', function () {
                                    const content = document.querySelector('.table-data-order');
                                    content.style.display = content.style.display === 'block' ? 'none' : 'block';
                                    document.querySelector('.overview-content-toggle').style.transform = content.style.display === 'block' ? 'rotate(0)' : 'rotate(180deg)';
                                });
                            </script>
                        <div style="display: block;" id="order" class="table-data-order">
                            <table class="custom-table">
                                    <tr>
                                        <th>ID ORDER</th>
                                        <th>ID USER</th>
                                        <th>TOTAL</th>
                                        <th>SHIPPING</th>
                                        <th>ADDRESS</th>
                                        <th>PAYMENT METHOD</th>
                                        <th>PAYMENT STATUS</th>
                                        <th>STATUS</th>
                                        <th>CREATE DATE</th>
                                    </tr>
                                    <?php foreach($orders as $order):?>
                                    <tr style="<?= isset($_GET['view']) && $_GET['view'] === $order['ID_Don_Hang'] ? "background-color:var(--graynhe)":""?>" 
                                    id="<?=$order['ID_Don_Hang']?>" 
                                    onclick="window.location.href='/The-Ordinary/admin?page=Orders&view=<?=$order['ID_Don_Hang']?>#<?=$order['ID_Don_Hang']?>'">
                                    
                                        <td><?= $order['ID_Don_Hang']?></td>
                                        <td><?= $order['ID_Khach_Hang']?></td>
                                        <td><?= $order['tong_tien']?> USD</td>
                                        <td><?= $order['phi_ship']?> USD</td>
                                        <td><?= $order['dia_chi_giao']?></td>
                                        <td><?= $order['payment_method']?></td>
                                        <td><?= $order['payment_status']?></td>
                                        <td><?=$order["Trang_Thai"]?></td>
                                        <td><?=$order["Ngay_Dat"]?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    
                            </table>
                        </div>
                        <?php if (isset($_GET['view'])): ?>
                            <div class="receipt-order">
                                <div class="receipt-container">
                                    <div class="receipt-header">
                                        <h2>RECIEPT</h2>
                                        <p><?= $detailOrders[0]['Ngay_Dat']?></p>
                                    </div>
                                    <div class="order-items">
                                        <?php foreach($detailOrders as $item):?>
                                            <div class="order-items-container">
                                                <img src="<?= explode(';',$item['Hinh_Anh'])[0]?>">
                                                <div class="order-items-info">
                                                    <h3><?= $item['Ten_SP']?></h3>
                                                    <p><?= $item['so_luong']?>x</p>
                                                    <p><strong><?= $item['tong_tien']?> USD</strong></p>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="order-feature">
                                    <h2>FEATURE</h2>
                                    <form action="/The-Ordinary/admin/orders" method="post" class="update-status">
                                        <input hidden name="id_order" type="text" value="<?= $_GET['view']?>">
                                        <button type="submit" name="update" value="update">TO COMFIRM</button>
                                    </form>
                                    <form class="delete-order">
                                        <input hidden name="delete" type="text" value="<?= $_GET['view']?>">
                                        <button type="submit">DELETE</button>
                                    </form>
                                    <button class="print-receipt">RECEIPT PRINT</button>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                <?php endif; ?>

                
            </div>
        </div>
    </div>
</body>

</html>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="public\assets\css\admin.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<?php
$list_page = [
    "Products",
    "Orders",
    "Users",
    "Revenue",
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
];

$list_filter = [
    'pending',
    'shipped',
    'delivered',
    'cancelled'
]
    ?>

<body>
    <div class="wrapper-admin">
        <!-- <div class="header-admin">
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
        </div> -->
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
                <?= $_SESSION['flash']['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <div class="container-admin">
        
            <div class="sidebar-admin">
                <div class="logo-brand-admin">
                <img src='https://brandlogos.net/wp-content/uploads/2025/02/the_ordinary-logo_brandlogos.net_ruxn6.png'>

            </div>
                <form class="sidebar-admin-items" method="get">
                    <?php foreach ($list_page as $item): ?>
                        <label
                        style="<?= isset($_GET['page']) && $_GET['page'] === $item ? "border:1px solid var(--white)":"" ?>"
                        class="sidebar-item">
                            <input hidden type="radio" name="page" value=<?= $item ?> 
                            <?=isset($_GET['page']) && $_GET['page'] === $item ? "checked":"" ?>>
                            <p><?= $item ?></p>
                            <i class="fa-solid fa-angle-right"></i>
                        </label>
                    <?php endforeach; ?>
                </form>
                <div class="sidebar-admin-items">
                    <a class="sidebar-item" href="/The-Ordinary/logout">
                        <p>Log out</p>
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
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
                    <div class="management-product">
                        <h2>Management Product</h2>
                        <hr>
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
                                        <th>ID</th>
                                        <th>PRICE</th>
                                        <th>QUANTITY</th>
                                        <th>PRODUCER</th>
                                        <th>EXP</th>
                                        <th>MFG</th>
                                        <th>CREATE AT</th>
                                    </tr>
                                    <?php foreach($store as $item):?>
                                    <tr 
                                    style="<?= isset($_GET['view']) && $_GET['view'] === $item['ID_San_Pham'] ? "background-color:var(--graynhe)":""?>"
                                    id="<?= $item['ID_San_Pham']?>"> 
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
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>QUANTITY</th>
                                        <th>PRICE</th>
                                        <th>FORMAT</th>
                                        
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
                                <form action="/The-Ordinary/admin/products" method="post" class="form-product-detail" onsubmit="return confirmUpdateSubmit()">
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
                                <form action="/The-Ordinary/admin/products" method="post" enctype="multipart/form-data" class="form-create-product" onsubmit="return confirmCreatSubmit()">
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
                    </div>
                <?php endif; ?>

                <!-------------- USERS PAGE -------------->
                <!-------------- USERS PAGE -------------->
                <!-------------- USERS PAGE -------------->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'Users'): ?>
                    <div class="management-user">
                        <h2>Management User</h2>
                        <hr>
                        <div class="content-admin-user">
                                <div style="display: flex;" id="user" class="feature-user-table">
                                    <form method="get" class="form-search">
                                        <input type="text" hidden name="page" value="Users">
                                        <div id="search" class="search">
                                            <i class='fa-solid fa-magnifying-glass'></i>
                                            <input name="search" type="text">
                                        </div>
                                        <button class="btn-search" type="submit">Search</button>
                                    </form>
                                </div>
                                <div class="header-table">
                                    <h2 class="table-title">ACCOUNT TABLE</h2>
                                    <button class="overview-content-toggle--2">
                                        <i class="fa-solid fa-angle-up"></i>
                                    </button>
                                </div>
                                <script>
                                    document.querySelector('.overview-content-toggle--2').addEventListener('click', function () {
                                        const content = document.querySelector('.table-data-account');
                                        
                                        content.style.display = content.style.display === 'block' ? 'none' : 'block';
                                        document.querySelector('.overview-content-toggle--2').style.transform = content.style.display === 'block' ? 'rotate(0)' : 'rotate(180deg)';
                                    });
                                </script>
                            
                            <div style="display: block;" id="account" class="table-data-account">
                                <table class="custom-table">
                                        <tr>
                                            <th>ID</th>
                                            <th>EMAIL</th>
                                            <th>ROLE</th>
                                            <th>STATUS</th>
                                            <th>CREATE AT</th>
                                        </tr>
                                        <?php foreach($accounts as $account):?>
                                        <tr style="<?= isset($_GET['view']) && $_GET['view'] === $account['ID_Khach_Hang'] ? "background-color:var(--graynhe)":""?>" 
                                        id="<?=$account['ID_Khach_Hang']?>" 
                                        onclick="window.location.href='/The-Ordinary/admin?page=Users&view=<?=$account['ID_Khach_Hang']?>#<?=$account['ID_Khach_Hang']?>'">
                                        
                                            <td><?= $account['ID_Khach_Hang']?></td>
                                            <td><?= $account['Email']?></td>
                                            <td><?= $account['Roles']?></td>
                                            <td><?= $account['trang_thai']?></td>
                                            <td><?= $account['Ngay_Tao']?></td>
                                        </tr>
                                        <?php endforeach;?>
                                        
                                </table>
                            </div>
                            <div class="information-detail-user">
                                <h2>PROFILE</h2>
                                <hr>
                                <?php if (isset($_GET['view'])):?>
                                <?php $totalbuy = 0;?>
                                <?php foreach($order as $item):?>
                                <?php $totalbuy += $item['tong_tien'];?>
                                <?php endforeach;?>
                                <form method="post" action="/The-Ordinary/admin/users/status" class="profile-flex">
                                    <input name="id" hidden value="<?= isset($_GET['view'])?$_GET['view']:""?>" >
                                    <?php foreach($users as $user):?>
                                        <div class="form-group">
                                            <span>Name</span>
                                            <input name="fullname" value="<?= $user['HoTen']?>">
                                        </div>
                                        <div class="form-group">
                                            <span>Gender</span>
                                            <input name="gender" value="<?= $user['gioi_tinh']?>">
                                        </div>
                                        <div class="form-group">
                                            <span>Birth</span>
                                            <input type="date" name="birth" type="datetime" value="<?= $user['ngay_sinh']?>">
                                        </div>
                                        <div class="form-group">
                                            <span>Phone</span>
                                            <input name="phone" value="<?= $user['SDT']?>">
                                        </div>
                                        <div class="form-group">
                                            <span>Address</span>
                                            <input name="address" value="<?= $user['DiaChi']?>">
                                        </div>
                                        
                                    <?php endforeach;?>
                                    <div class="feature-manage-user">
                                        <button name="block" value="block">BLOCK</button>
                                        <button name="unblock" value="unblock">UNBLOCK</button>
                                        <button onclick="showFormMail()" type="button" name="sendmail" value="sendmail">SEND MAIL</button>
                                    </div>
                                </form>
                                <br>
                                <h2>ORDERS HISTORY</h2>
                                <hr>
                                <div style="display: block;" id="order" class="table-data-order">
                                    <table class="custom-table">
                                            <tr>
                                                <th>ID</th>
                                                <th>TOTAL</th>
                                                <th>STATUS</th>
                                                <th>CREATE AT</th>
                                            </tr>
                                            <?php foreach($order as $item):?>
                                            <tr>
                                                <td><?= $item['ID_Don_Hang']?></td>
                                                <td><?= $item['tong_tien']?> USD</td>
                                                <td><?= $item['Trang_Thai']?></td>
                                                <td><?= $item['Ngay_Dat']?></td>
                                            </tr>
                                            <?php endforeach;?>
                                            
                                    </table>
                                </div>
                                <br>
                                <h2>FEEDBACKS</h2>
                                <hr>
                                <div style="display: block;" id="order" class="table-data-comments">
                                    <table class="custom-table">
                                            <tr>
                                                <th>ID PRODUCT</th>
                                                <th>RATING</th>
                                                <th>COMMENT</th>
                                                <th>CREATE AT</th>
                                            </tr>
                                            <?php foreach($feedbacks as $item):?>
                                            <tr>
                                            
                                                <td><?= $item['ID_San_Pham']?></td>
                                                <td>
                                                    <?php for($i = 0; $i < $item['rating'];$i++):?>
                                                    <i class="bi bi-star-fill"></i>
                                                    <?php endfor;?>
                                                </td>
                                                <td><?= $item['binh_luan']?></td>
                                                <td><?= $item['ngay_dang']?></td>
                                            </tr>
                                            <?php endforeach;?>
                                            
                                    </table>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div style="display: none;" class="sendmail">
                            <form method="post" action="/The-Ordinary/admin/users/sendmail" class="form-mail">
                                <h3>EMAIL</h3>
                                <hr>
                                <div class="form-group">
                                    <span>From</span>
                                    <input name="mailsender" readonly type="email" value="dinhvanhuy.04032019@gmail.com">
                                </div>
                                <div class="form-group">
                                    <span>To</span>
                                    <input name="mailreceiver" readonly type="email" value="<?= $users[0]['Email']?>">
                                </div>
                                <div class="form-group">
                                    <span>Title</span>
                                    <input type="text" name="title">
                                </div>
                                <div class="form-group">
                                    <span>Content</span>
                                    <textarea name="content" cols="5" rows="5"></textarea>
                                </div>
                                <button name="sendmail" type="submit">SEND</button>
                                <button onclick="showFormMail()" type="button" class="close"><i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </div>
                        <script>
                            function showFormMail(){
                                const form = document.querySelector('.sendmail')
                                form.style.display = form.style.display === 'none' ? 'flex' : 'none'
                            }

                            document.querySelector('.form-mail button[name="sendmail"]').addEventListener('click',function(){
                                this.innerHTML = `<div class="spinner-border spinner-border-sm" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>`
                            })
                        </script>
                    </div>
                <?php endif; ?>

                <!-------------- ORDERS PAGE -------------->
                <!-------------- ORDERS PAGE -------------->
                <!-------------- ORDERS PAGE -------------->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'Orders'): ?>
                    <div class="management-order">
                        <h2>Management Order</h2>
                        <hr>
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
                                        const feature = document.querySelector('.feature-order-table')
                                        feature.style.display = feature.style.display === 'flex' ? 'none' : 'flex';
                                        content.style.display = content.style.display === 'block' ? 'none' : 'block';
                                        document.querySelector('.overview-content-toggle').style.transform = content.style.display === 'block' ? 'rotate(0)' : 'rotate(180deg)';
                                    });
                                </script>
                            <div style="display: flex;" id="product" class="feature-order-table">
                                <form method="get" class="form-search">
                                    <input type="text" hidden name="page" value="Orders">
                                    <div id="search" class="search">
                                        <i class='fa-solid fa-magnifying-glass'></i>
                                        <input name="search" type="text">
                                    </div>
                                    <button class="btn-search" type="submit">Search</button>
                                </form>
                                <form method="get" class="form-filter">
                                    <input type="text" hidden name="page" value="Orders">
                                    <select style="height: 100%;" name="filter">
                                        <option value="" disabled selected>Select filter</option>
                                        <?php foreach($list_filter as $filter):?>
                                            <option <?= isset($_GET['filter']) && $_GET['filter'] === $filter ? 'selected' :''?> value="<?= $filter?>"><?= $filter?></option>
                                        <?php endforeach;?>
                                    </select>
                                </form>
                                <script>
                                document.querySelectorAll('.form-filter select')
                                    .forEach(
                                        function (checkbox) {
                                            checkbox.addEventListener('change', function () {
                                                document.querySelector('.form-filter').submit();
    
                                            });
    
                                        });
                                </script>
                            </div>
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
                                            <th>CREATE AT</th>
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
                                    <div class="receipt-container" id="receipt">
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
                                                        <p><strong><?= $item['price_each']?> USD</strong></p>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>
                                        </div>
                                        <div class="order-info-user">
                                            <p><strong>Recipient: </strong><?= $detailOrders[0]['HoTen'];?></p>
                                            <p><strong>Phone: </strong><?= $detailOrders[0]['SDT'];?></p>
                                            <p><strong>Address: </strong><?= $detailOrders[0]['dia_chi_giao'];?></p>
                                            <p><strong>Total:</strong><?= $detailOrders[0]['tong_tien']?> USD</p>
                                        </div>
                                    </div>
                                    <div class="order-feature">
                                        <h2>FEATURE</h2>
                                        <form action="/The-Ordinary/admin/orders" method="post" class="update-status" onsubmit="return confirmUpdateSubmit()">
                                            <input hidden name="id_order" type="text" value="<?= $_GET['view']?>">
                                            <button type="submit" name="update" value="update">TO COMFIRM</button>
                                        </form>
                                        <form action="/The-Ordinary/admin/orders" method="post" class="delete-order" onsubmit="return confirmDeleteSubmit()">
                                            <input hidden name="id_order" type="text" value="<?= $_GET['view']?>">
                                            <button type="submit" name="delete" value="delete">DELETE</button>
                                        </form>
                                        <button onclick="window.print()" class="print-receipt">RECEIPT PRINT</button>
                                    </div>
                                   
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-------------- REVENUE PAGE -------------->
                <!-------------- REVENUE PAGE -------------->
                <!-------------- REVENUE PAGE -------------->

                <?php if(isset($_GET['page']) && $_GET['page'] === 'Revenue'): ?>
                    <div class="management-revenue">
                        <h2 class="revenue-manage-title">Revenue Management</h2>
                        <div class="content-admin-revenue">
                            <div class="revenue">
                                <h4>Revenue</h4>
                                <div class="revenue-chart">
                                    <canvas id="revenueChart" height="300px"></canvas>
                                </div>
                            </div>
                            <div class="statistical-product">
                                <h4>Bestseller</h4>
                                <div class="statistical-product-bestseller">
                                    <canvas id="bestseller" height="200px"></canvas>
                                </div>
                            </div>
                            <div class="gauge">
                                <?php $kpi = 100 ;?>
                                <?php $revenue = $currentMonthlyData[0]['revenue'] / $kpi * 100 ;?>
                                <?php $rotate = ($revenue / 100) * 180 - 90; ?>
                                <h4 style="text-align: left;">Churn Rate</h4>
                                <svg viewBox="0 0 100 50">
                                    <defs>
                                    <linearGradient id="gradient" x1="0" x2="1" y1="0" y2="0">
                                        <stop offset="0%" stop-color="#A66EFF" />
                                        <stop offset="100%" stop-color="#007BFF" />
                                    </linearGradient>
                                    </defs>
                                    <path d="M10,50 A40,40 0 0,1 90,50" stroke="url(#gradient)" stroke-width="10" fill="none" />
                                    <circle class="needle" cx="50" cy="50" r="2" fill="#00BFFF" />
                                    <line style="transform:rotate(<?= $rotate?>deg) ;" class="needle-line" x1="50" y1="50" x2="50" y2="20" stroke="#00BFFF" stroke-width="2" />
                                </svg>
                                <div class="value"><?= $revenue?>%</div>
                            </div>
                            <script>
                                const ctx = document.getElementById('revenueChart').getContext('2d');
                                const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
                                gradient1.addColorStop(0, 'rgb(144, 224, 239)');
                                gradient1.addColorStop(1, 'rgba(202, 240, 248, 0)');
                                const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
                                gradient2.addColorStop(0, 'rgb(199, 125, 255)');
                                gradient2.addColorStop(1, 'rgba(224, 170, 255, 0)');
                                const chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: <?= json_encode(array_column($monthlyData, 'month')) ?>,
                                    datasets: [
                                        {
                                            label: 'Revenue (USD)',
                                            fill: true,
                                            backgroundColor: gradient1,
                                            tension: 0.4, // đường cong mượt
                                            pointRadius: 0, // ẩn chấm tròn
                                            borderWidth: 2,
                                            borderColor: 'rgb(0, 180, 216)',
                                            data: <?= json_encode(array_map(fn($r) => round($r['revenue'], 0), $monthlyData)) ?>
                                        },
                                        {
                                            label: 'Profit (USD)',
                                            fill: true,
                                            backgroundColor: gradient2,
                                            tension: 0.4, // đường cong mượt
                                            pointRadius: 0, // ẩn chấm tròn
                                            borderWidth: 2,
                                            borderColor: 'rgb(199, 125, 255)',
                                            data: <?= json_encode(array_map(fn($r) => round($r['profit'], 0), $monthlyData)) ?>
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                            labels: {
                                                usePointStyle: true,
                                                pointStyle: 'circle',
                                                padding: 20,
                                                generateLabels(chart) {
                                                    return chart.data.datasets.map((dataset, i) => ({
                                                        text: dataset.label,
                                                        fillStyle: dataset.backgroundColor,
                                                        hidden: !chart.isDatasetVisible(i),
                                                        strokeStyle: 'transparent',
                                                        index: i,
                                                        pointStyle: 'circle'
                                                    }));
                                                }
                                                
                                            }
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                drawBorder: false
                                            }
                                        },
                                        x: {
                                            grid: {
                                                drawBorder: false,
                                            },
    
                                        }
                                    }
                                }
                            });
                            </script>
                            <script>
                                const ctx2 = document.getElementById('bestseller').getContext('2d');
                                const gradient3 = ctx2.createLinearGradient(0, 0, 0, 400);
                                gradient3.addColorStop(0, 'rgb(0, 180, 216)');
                                gradient3.addColorStop(1, 'rgb(199, 125, 255)');
                                const chart2 = new Chart(ctx2, {
                                type: 'bar',
                                data: {
                                    labels: <?= json_encode(array_column($bestseller, 'Ten_SP')) ?>,
                                    datasets: [
                                        {
                                            label: 'Top 5 bestseller',
                                            fill: true,
                                            backgroundColor: gradient3,
                                            pointRadius: 0,
                                            data: <?= json_encode(array_map(fn($r) => round($r['sold'], 0), $bestseller)) ?>
                                        },
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                            labels: {
                                                usePointStyle: true,
                                                pointStyle: 'circle',
                                                padding: 20,
                                                generateLabels(chart) {
                                                    return chart.data.datasets.map((dataset, i) => ({
                                                        text: dataset.label,
                                                        fillStyle: dataset.backgroundColor,
                                                        hidden: !chart.isDatasetVisible(i),
                                                        strokeStyle: 'transparent',
                                                        index: i,
                                                        pointStyle: 'circle'
                                                    }));
                                                }
                                                
                                            }
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                drawBorder: false
                                            }
                                        },
                                        x: {
                                            ticks: {
                                                callback: function(value) {
                                                let label = this.getLabelForValue(value);
                                                return label.length > 15 ? label.substring(0, 12) + '...' : label;
                                                }
                                            },
                                            grid: {
                                                drawBorder: false,
                                            },
    
                                        }
                                    }
                                }
                            });
                            </script>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
    <script>
    function confirmUpdateSubmit() {
        return confirm("Are you sure you want to update?");
    }
    function confirmDeleteSubmit() {
        return confirm("Are you sure you want to delete?");
    }
    function confirmCreatSubmit() {
        return confirm("Are you sure you want to create?");
    }  
    </script>
    
</body>

</html>
<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<div class="account-container">
    <div class="account-breadcrumb">
        <ul class="nav-user">
            <li><a href="/The-Ordinary/account" style="color: black; font-weight: 500;">Account</a></li>
        </ul>
    </div>
    <div class="account-dashboard">
        <div class="account-dashboard-menu">
            <ul class="account-menu">
                <li>
                    <a href="/The-Ordinary/account?page=account" style=<?= isset($_GET['page']) && $_GET['page'] == 'account' ? "text-decoration:underline;text-underline-offset:5px;margin-top:20px" : "" ?>>Account Settings</a>
                </li>
                <li>
                    <a href="/The-Ordinary/account?page=orders" style=<?= isset($_GET['page']) && $_GET['page'] == 'orders' ? "text-decoration:underline;text-underline-offset:5px;margin-top:20px" : "" ?>>Order
                        History</a>
                </li>
                <hr>
                <li>
                    <img class='img-brand'
                        src='https://theordinary.com/on/demandware.static/Sites-deciem-global-Site/-/default/dw8dc43046/images/brands-logo/theordinary_black.svg'>
                </li>
                <li>
                    <a href="#">Subscribe & Save</a>
                </li>
                <li>
                    <a href="#">Favourites</a>
                </li>
                <li>
                    <a href="#">Build My Regimen</a>
                </li>
                <hr>
                <li>
                    <a href="/The-Ordinary/logout">Sign out</a>
                </li>
            </ul>
        </div>
        <?php if (isset($_GET['page']) && $_GET['page'] == 'account'): ?>
            <div class="account-dashboard-profile">
                <?php $fullnameArray = explode(" ", $user['HoTen']) ?>
                <?php $name = end($fullnameArray) ?>
                <h1>Hello, <?= htmlspecialchars(htmlspecialchars($name, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') ?></h1>
                <hr>
                <div class="user-dashboard-card">
                    <div class="profile-section">
                        <h3>PROFILE</h3>
                        <div class="profile-info">
                            <div class="profile-info-frame">
                                <div class="profile-info-card">
                                    <p><strong><?= htmlspecialchars(htmlspecialchars($user['HoTen'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') ?></strong>
                                    </p>
                                    <p><?= htmlspecialchars($user['Email'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <p><?= htmlspecialchars($user['SDT'], ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                                <a href="/The-Ordinary/profile-edit">Edit</a>
                            </div>
                            <hr>
                            <div class="profile-password">
                                <input class="profile-password-input" type="password"
                                    value="<?= htmlspecialchars($account[0]['Password']) ?>" readonly disabled>
                                <a href="/The-Ordinary/password-edit">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="account-dashboard-address">
                    <h3>Address Book</h3>
                    <div class="account-dashboard-address-frame">
                        <div class="account-dashboard-address-info">
                            <p><?= htmlspecialchars($user['DiaChi']) ?></p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="account-dashboard-subscription-centre">
                    <h3>Subscription Centre</h3>
                    <div class="account-dashboard-subscription-centre-info">
                        <form class="customer-subscription-centre">
                            <h5>Select which brands you would like to receive email from:</h5>
                            <p>You wil receive emails for News & Updates, Offers and Promotions or Tips and Tricks.</p>
                            <div class="account-dashboard-subscription-centre-info-options">
                                <div class="subscription-centre-info-options-checkbox">
                                    <label><input type="checkbox" class="subscription-centre-control">The Ordinary</label>
                                    <label><input type="checkbox" class="subscription-centre-control">Niod</label>
                                    <label><input type="checkbox" class="subscription-centre-control">Loopha</label>
                                    <label><input type="checkbox" class="subscription-centre-control">Deciem</label>
                                </div>
                                <button class="btn-subscription-centre">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['page']) && $_GET['page'] == 'orders'): ?>
            <div class="orders-history">
                <div class="orders-grid">
                    <?php foreach ($orders as $order): ?>
                        <div class="orders-gap">
                            <p><strong>ID: </strong><?= $order['ID_Don_Hang'] ?></p>
                            <p><strong>Date: </strong><?= $order['Ngay_Dat'] ?></p>
                            <hr>
                            <p><strong>Address: </strong><?= $order['dia_chi_giao'] ?></p>
                            <p><strong>Status: </strong><?= $order['Trang_Thai'] ?></p>
                            <p><strong>Total: </strong><?= $order['tong_tien'] ?> USD</p>
                            <a style="text-decoration:underline"
                                href="/The-Ordinary/account?page=orders&id=<?= $order['ID_Don_Hang'] ?>">Detail</a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (isset($_GET['id'])):?>
                <div class="orders-detail">
                    <div class="orders-detail-container">
                        <p><strong>Product</strong></p>
                        <hr>
                        <div class="flex-products-order">
                            <?php foreach ($orderdetail as $item): ?>
                                <a href="/The-Ordinary/product?id=<?= $item['ID_San_Pham']?>" class="card-products-order">
                                    <img src="<?= explode(";", $item['Hinh_Anh'])[0] ?>">
                                    <div class="card-product-info">
                                        <p style="font-size: small;"><?= $item['Ten_SP'] ?></p>
                                        <p><?= $item['so_luong'] ?>x</p>
                                        <br>
                                        <p><strong><?= $item['price_each'] ?> USD</strong></p>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                            <br>
                            <p><strong>Shipping</strong></p>
                            <hr>
                            <div class="info-shipping-order">
                                <p><strong>ID: </strong><?= $orderdetail[0]['ID_Don_Hang'] ?></p>
                                <p><strong>Date: </strong><?= $orderdetail[0]['Ngay_Dat'] ?></p>
                                <p><strong>Address: </strong><?= $orderdetail[0]['dia_chi_giao'] ?></p>
                                <p><strong>Status: </strong><?= $orderdetail[0]['Trang_Thai'] ?></p>
                                <p><strong>Total: </strong><?= $orderdetail[0]['tong_tien'] ?> USD</p>
                            </div>
                            <form method="post" action="/The-Ordinary/account" class="order-actions">
                                <input hidden name="id" value="<?= $_GET['id']?>">
                                <input hidden name="status" value="<?=$orderdetail[0]['Trang_Thai']?>">
                                <button onsubmit="return confirmCancle()" style=<?=$orderdetail[0]['Trang_Thai'] != 'pending' ? 'opacity:50%' :"" ?> <?= $orderdetail[0]['Trang_Thai'] != 'pending' ? 'disabled' :"" ?> name="action" value="cancle">Cancle</button>
                                <button style=<?= $orderdetail[0]['Trang_Thai'] != 'delivered' ? 'opacity:50%' :"" ?> 
                                <?= $orderdetail[0]['Trang_Thai'] != 'delivered' ? 'disabled' :"" ?> name="action" value="refund">Refund</button>
                            </form>
                        </div>
                         <button onclick="showDetailProduct()" type="button" class="close"><i class="fa-solid fa-xmark"></i></button>
                         <script>
                            function showDetailProduct(){
                                const main = document.querySelector('.orders-detail')
                                main.style.display = main.style.display === 'none' ? 'block':'none'
                            }
                         </script>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <script>
        function confirmCancle(){
            return confirm("Are you sure cancle?")
        }
    </script>
</div>
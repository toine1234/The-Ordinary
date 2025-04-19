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
                    <a href="/The-Ordinary/account" class="user-active">Account Settings</a>
                </li>
                <li>
                    <a href="#">Order History</a>
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

        <div class="account-dashboard-profile">
            <?php $fullnameArray = explode(" ", $user['HoTen']) ?>
            <?php $name = end($fullnameArray) ?>
            <h1>Hello, <?= $name ?></h1>
            <hr>
            <div class="user-dashboard-card">
                <div class="profile-section">
                    <h3>PROFILE</h3>
                    <div class="profile-info">
                        <div class="profile-info-frame">
                            <div class="profile-info-card">

                                <p><strong><?= $user['HoTen'] ?></strong></p>
                                <p><?= $user['Email'] ?></p>
                                <p><?= $user['SDT'] ?></p>
                            </div>
                            <a href="/The-Ordinary/profile-edit">Edit</a>
                        </div>
                        <hr>
                        <div class="profile-password">
                            <input class="profile-password-input" type="password" value="<?= $account[0]['Password'] ?>" readonly disabled>
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
                        <p><?= $user['DiaChi'] ?></p>
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
    </div>
</div>
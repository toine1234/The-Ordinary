
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
                <img class='img-brand' src='https://theordinary.com/on/demandware.static/Sites-deciem-global-Site/-/default/dw8dc43046/images/brands-logo/theordinary_black.svg'>
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
            <h1>Hello, </h1>
            <hr>
            <div class="account-dashboard-card">
                <div class="profile-section">
                    <h3>PROFILE</h3>
                    <div class="profile-info">
                        <div class="profile-info-frame">
                            <div class="profile-info-card">
                                <p><strong><?= $account['HoTen']?></strong></p>
                                <p><?= $account['Email']?></p>
                                <p><?= $account['SDT']?></p>
                            </div>
                            <a href="#">Edit</a>
                        </div>
                        <hr>
                        <div class="profile-password">
                            <p>..............</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="account-dashboard-address">
                <h3>Address Book</h3>
                <div class="account-dashboard-address-info">
                    <p>Add new address</p>
                </div>
            </div>

            <hr>

            <div class="account-dashboard-payment-methods">

            </div>

        </div>
    </div>
</div>
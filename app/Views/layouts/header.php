<!DOCTYPE html>
<html>

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

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    </head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    
    <div class='main-nav'>
        <div class='header'>
            <div class='header-top'>
                <div class='header-slide'>
                    <button class='header-icon-previous'>
                        <i class='fa-solid fa-chevron-left'></i>
                        <span class='sr-only'>Previous</span>
                    </button>

                    <div class='header-promo-slider'>

                    </div>

                    <button class='header-icon-next'>
                        <i class='fa-solid fa-chevron-right'></i>
                        <span class='sr-only'>Next</span>
                    </button>
                </div>
                <div class='icon-header'>
                    <button class='icon-header-btn'>
                        <i class='fa-solid fa-magnifying-glass'></i>
                    </button>
                    <a href='/The-Ordinary/account' class='icon-header-btn'>
                        <i class='fa-solid fa-user'></i>
                    </a>
                    <button class='icon-header-btn'>
                        <i class='fa-solid fa-cart-shopping'></i>
                        <p class="amount-cart"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']):'0' ?></p>
                    </button>
                </div>
            </div>
        </div>
        <div class='brand-nav'>
            <ul class='brand-list'>
                <li class='brand-item active-brand'>
                    <a href='/The-Ordinary/' style='text-decoration: none; color: black;'>
                        <img class='img-brand'
                            src='https://theordinary.com/on/demandware.static/Sites-deciem-global-Site/-/default/dw8dc43046/images/brands-logo/theordinary_black.svg'>
                        <p>THE <br> ORDINARY</p>
                    </a>
                </li>
                <li class='brand-item'>
                    <a>

                        <p>NIOD</p>
                    </a>
                </li>
                <li class='brand-item'>
                    <a>

                        <p>LOOPHA</p>
                    </a>
                </li>
                <li class='brand-item'>
                    <a>

                        <p>DECIEM</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class='navbar-expand'>
            <div class='group-menu'>
                <ul class='menu-list'>
                    <li class='menu-item'><a href="/The-Ordinary/shop">All Products</a></li>
                    <li class='menu-item'><a href="/The-Ordinary/new">New</a></li>
                    <li class='menu-item'>Bestsellers</li>
                </ul>
            </div>
        </div>
    </div>
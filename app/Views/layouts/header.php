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
    <?php if (!isset($_COOKIE['accessToken'])): ?>
        <?php unset($_SESSION['idUser']); ?>
        <?php unset($_SESSION['cart']); ?>
        <?php unset($_SESSION['username']); ?>
    <?php endif; ?>
    <div class='main-nav'>
        <div class='header'>
            <div class='header-top'>
                <div class='header-slide'>
                    <button class='header-icon-previous'>
                        <p>
                            << /p>
                                <span class='sr-only'>Previous</span>
                    </button>

                    <div class='header-promo-slider'>
                        <div class="slides">
                            <div tabindex="1" class="slide">
                                <a>SALE OFF 50%</a>
                            </div>
                            <div tabindex="1" class="slide ">
                                <a>CARBON NEUTRAL SHIPPING ON ALL OREDERS</a>
                            </div>
                            <div tabindex="1" class="slide">
                                <a>20% OFF SELECT SETS & COLLECTIONS</a>
                            </div>

                        </div>
                    </div>

                    <button class='header-icon-next'>
                        <p>></p>
                        <span class='sr-only'>Next</span>
                    </button>
                </div>
                <script>
                    let slideIndex = 1;
                    setInterval(() => {
                        moveSlide(1)
                    }, 4000)

                    function moveSlide(n) {
                        showSlide(slideIndex += n);
                    }

                    function showSlide(n) {
                        const slides = document.querySelectorAll('.slide');
                        if (n > slides.length) {
                            slideIndex = 1;
                        }
                        if (n < 1) {
                            slideIndex = slides.length;
                        }
                        slides.forEach(slide => {
                            slide.style.transform = "translateY(-" + ((slideIndex - 1) * 120) + "%)";
                        });
                    }
                </script>
                <div class='icon-header'>
                    <button class='icon-header-btn' id="icon-header-btn-hamburger">
                        <i class='fa-solid fa-bars'></i>
                    </button>
                    <button class='icon-header-btn'>
                        <i class='fa-solid fa-magnifying-glass'></i>
                    </button>
                    <a href='/The-Ordinary/account' class='icon-header-btn'>
                        <i class='fa-solid fa-user'></i>
                        <?php if (isset($_SESSION['username'])): ?>
                            <?php $fullname = explode(" ", $_SESSION['username']); ?>
                            <?php $name = end($fullname); ?>
                            <p><?= $name ? "Hello, " . $name : "" ?></p>
                        <?php endif; ?>
                    </a>
                    <button class='icon-header-btn'>
                        <i class='fa-solid fa-cart-shopping'></i>
                        <p class="amount-cart"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0' ?></p>
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
                        <img src="https://niod.com/on/demandware.static/Sites-deciem-us-Site/-/default/dw778368d7/images/brands-logo/niod.svg" alt="NIOD_logo">
                        <p>NIOD</p>
                    </a>
                </li>
                <li class='brand-item'>
                    <a>
                        <img src="https://niod.com/on/demandware.static/Sites-deciem-us-Site/-/default/dwaef764f9/images/brands-logo/loopha_black.svg" alt="LOOPHA_logo">
                        <p>LOOPHA</p>
                    </a>
                </li>
                <li class='brand-item'>
                    <a>
                        <img src="https://niod.com/on/demandware.static/Sites-deciem-us-Site/-/default/dwe0b6a5be/images/brands-logo/deciem_black.svg" alt="DECIEM_logo">
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
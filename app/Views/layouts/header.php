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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/style.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="public/assets/css/responsive.css?v=<?= time() ?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<?php 
header('Content-Type: text/html; charset=UTF-8');
unset($_SESSION['chat_history']);
$slider = explode(";",isset($dataHome['slider']) ? $dataHome['slider'] :$_SESSION['slider']);
?>
<body>
    <?php if (!isset($_COOKIE['accessToken'])): ?>
        <?php if(isset($_SESSION['idUser'])) unset($_SESSION['idUser']); ?>
        <?php if(isset($_SESSION['cart'])) unset($_SESSION['cart']); ?>
        <?php if(isset($_SESSION['username'])) unset($_SESSION['username']); ?>
    <?php endif; ?>
    <?php require_once __DIR__ . '/../chatbox.php';?>
    <div class='main-nav'>
        <div class='header'>
            <div class='header-top'>
                <div class='header-slide'>
                    <button class='header-icon-previous'>
                        <p>
                            <
                                </p>
                                <span class='sr-only'>Previous</span>
                    </button>

                    <div class='header-promo-slider'>
                        <div class="slides">
                            <?php foreach($slider as $item):?>
                                <div tabindex="1" class="slide">
                                <a><?= $item ?></a>
                            </div>
                            <?php endforeach;?>
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
                    <button class='icon-header-btn open-navbar-btn'>
                        <i class='fa-solid fa-bars'></i>
                    </button>
                    <button class='icon-header-btn'>
                        <i class='fa-solid fa-magnifying-glass'></i>
                    </button>
                    <a href='/The-Ordinary/account?page=account' class='icon-header-btn'>
                        <i class='fa-solid fa-user'></i>
                        <?php if (isset($_SESSION['username'])): ?>
                            <?php $fullname = explode(" ", $_SESSION['username']); ?>
                            <?php $name = end($fullname); ?>
                            <p><?= $name ? "Hello, " . htmlspecialchars($name,ENT_QUOTES,'UTF-8') : "" ?></p>
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
                    <li class='menu-item'><a href="/The-Ordinary/shop?page=1">All Products</a></li>
                    <li class='menu-item'><a href="/The-Ordinary/new">New</a></li>
                    <li class='menu-item'>Bestsellers</li>
                </ul>
            </div>
        </div>
    </div>
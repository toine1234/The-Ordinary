<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE ORDINARY</title>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alatsi&family=Gidole&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- Header -->
    <?php
        include './viewer/header.php';
    ?>





    <!-- Content - Poster Header -->
    <div class="content-wrapper">
        <div class="poster">
            <img class="poster-image" src="./public/images/ORD-HP-Hero-SS-Hydration-Collection.png" alt="The Ordinary Bestsellers">
            <div class="title">
                <h1 class="h1-title">Your Real Skin. Our Serum Foundation. Back for a Limited Time.</h1>
                <p>
                    Tailored for common skin concerns, so you can simply choose what’s best for you—and
                    <b>save 10%*</b>
                    while you’re at it.
                </p>
                <a class="btn-explore-collections" href="https://theordinary.com/en-vn/category/skincare/skincare-collections">Explore Collections</a>
            </div>
        </div>
    </div>

    <!-- Main Home Page -->
    <div class="homepage">
        <!-- Line -->
        <div class="layout-top"></div>
        <div class="gap"></div>
        <div class="is-divider"></div>
        <div class="gap"></div>

        <!--------- Home-Bestseller ---------------->
        <div class="layout-bottom">
            <div class="bestseller-home">
                <ul class="menu-items">
                    <li class="bestsellers">
                        <a href="">
                            <span style="font-weight: 700; font-size: 28px; color: black;">Bestsellers</span>
                        </a>
                    </li>
                    <li class="view-all">
                        <a href="">
                            <span style="color: black;">View All</span>
                        </a>
                    </li>
                </ul>

                <div class="gap"></div>

                <!-- Bestseller -->
                <div class="home-list-bestsellers">
                    <!-- item 1 -->
                    <div class="home-bestsellers">
                        <img src="./public/images/ord-glyc-acid-7pct-100ml-Aug-UPC.png" alt="">
                        <div class="tag">Bestseller</div>
                        <i class="fa-regular fa-heart"></i>
                        <a href="">Glycolic Acid 7% Exfoliating Toner</a>
                        <div class="comment-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="" style="color: gray;">Evens Texture & Tone, Radiance</a>
                        <div class="divider-home-bestseller"></div>
                        <div class="homebestsellers-price">
                            <p class="price">8.70 USD</p>
                            <div class="size-options">
                                <a href="">100ml</a>
                                <a href="">240ml</a>
                            </div>
                        </div>
                        <button class="home-add-to-cart">Add To Cart</button>
                    </div>
                    <!-- item 2 -->
                    <div class="home-bestsellers">
                        <img src="./public/images/ORD-gf-15-pct-packshot.png" alt="">
                        <div class="tag">New</div>
                        <i class="fa-regular fa-heart"></i>
                        <a href="">GF 15% Solution</a>
                        <div class="comment-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="" style="color: gray;">Promotes Visible Regeneration</a>
                        <div class="divider-home-bestseller"></div>
                        <div class="homebestsellers-price">
                            <p class="price">15.50 USD</p>
                            <div class="size-options">
                                <a href="">30ml</a>
                            </div>
                        </div>
                        <button class="home-add-to-cart">Add To Cart</button>
                    </div>
                    <!-- item 3 -->
                    <div class="home-bestsellers">
                        <img src="./public/images/ord-hyaluronic-acid-2pct-B5-30ml-Clr-Acu.png" alt="">
                        <div class="tag">Bestseller</div>
                        <i class="fa-regular fa-heart"></i>
                        <a href="">Hyaluronic Acid 2% + B5 (with Ceramides)</a>
                        <div class="comment-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="" style="color: gray;">Plumps, Smooths</a>
                        <div class="divider-home-bestseller"></div>
                        <div class="homebestsellers-price">
                            <p class="price">9.90 USD</p>
                            <div class="size-options">
                                <a href="">30ml</a>
                                <a href="">60ml</a>
                            </div>
                        </div>
                        <button class="home-add-to-cart">Add To Cart</button>
                    </div>
                    <!-- item 4 -->
                    <div class="home-bestsellers">
                        <img src="./public/images/ord-nmf-pc-30ml-packshot1-Resized.png" alt="">
                        <div class="tag">Trending</div>
                        <i class="fa-regular fa-heart"></i>
                        <a href="">Natural Moisturizing Factors + PhytoCeramides</a>
                        <div class="comment-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="" style="color: gray;">Nourishes, Plumps</a>
                        <div class="divider-home-bestseller"></div>
                        <div class="homebestsellers-price">
                            <p class="price">10.80 USD</p>
                            <div class="size-options">
                                <a href="">30ml</a>
                                <a href="">1000ml</a>
                            </div>
                        </div>
                        <button class="home-add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!--------- Home-Concert ---------------->
        <div class="home-concert">
            <div class="gap"></div>
            <div class="is-divider"></div>
            <div class="gap"></div>
            <h3>Common Concerns</h3>
            <p>Not sure where to begin? Here are some common skin concerns.</p>
            <div class="home-list-concert">
                <!-- 1 -->
                <div class="type-concert">
                    <img src="./public/images/signs-of-aging-concern_1.png" alt="">
                    <a href="">Aging &rarr;</a>
                </div>
                <!-- 2 -->
                <div class="type-concert">
                    <img src="./public/images/congestion-concerns.png" alt="">
                    <a href="">Congestion &rarr;</a>
                </div>
                <!-- 3 -->
                <div class="type-concert">
                    <img src="./public/images/Dark Circles.png" alt="">
                    <a href="">Texture &rarr;</a>
                </div>
                <!-- 4 -->
                <div class="type-concert">
                    <img src="./public/images/Texture.png" alt="">
                    <a href="">Eye Care &rarr;</a>
                </div>
                <!-- 5 -->
                <div class="type-concert">
                    <img src="./public/images/Redness-Concern1.png" alt="">
                    <a href="">Redness &rarr;</a>
                </div>
                <!-- 6 -->
                <div class="type-concert">
                    <img src="./public/images/Dryness-Concern.png" alt="">
                    <a href="">Dryness &rarr;</a>
                </div>
            </div>
        </div>

        <!------------- Home Find Your Formulation -------------->
        <div class="home-formulation">
            <div class="gap"></div>
            <div class="is-divider"></div>
            <div class="gap"></div>
            <div class="formulation-text">
                <h3>Find Your Formulation</h3>
                <p style="padding-top: 20px;">Filter our formulations based on the skin concerns, you’d like to address most.</p>
            </div>
            <!-- <div class="formulation-form">
                <form>
                    <label for="product-type">I am looking for</label>
                    <select name="product-type">
                        <option value disabled selected class="placeholder">Product Type</option>
                        <option value="facial-cleansers">Facial Cleansers</option>
                        <option value="toners">Toners</option>
                        <option value="eye-serums">Eye Serums</option>
                        <option value="exfoliators">Exfoliators</option>
                        <option value="serums">Serums</option>
                        <option value="face-oils">Face Oils</option>
                        <option value="moisturizers">Moisturizers</option>
                        <option value="face-masques">Face Masques</option>
                    </select>
                    <label>to target</label>
                    <select name="concert">
                        <option value disabled selected class="placeholder"> concern </option>
                        <option value="uneven-skin-tone">Uneven Skin Tone</option>
                        <option value="textural-irregularities">Textural Irregularities</option>
                        <option value="dryness">Dryness</option>
                        <option value="dullness">Dullness</option>
                        <option value="barrier-support">Barrier Support</option>
                    </select>
                    <button type="submit">Get My Formulation</button>
                </form> -->
            </div>
        </div>




    </div>
</div>








    <!-- Footer -->
    <?php
        include './viewer/footer.php';
    ?>

</body>
</html>
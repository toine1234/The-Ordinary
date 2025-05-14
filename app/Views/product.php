<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<div class="container-product-detail">
    <?php if ($product[0]['SL'] == 0): ?>
        <div class="display-sold-out">
            <p>SOLD OUT</p>
        </div>
    <?php endif; ?>
    <div class="router-product-detail">
        <ul class="list-router-product-detail">
            <li><a href="/The-Ordinary/shop" style="color: gray;">Shop</a></li>
            &rsaquo;
            <li><a
                    href="/The-Ordinary/product?id=<?= htmlspecialchars($product[0]['ID_San_Pham']) ?>"><?php echo $product[0]['Ten_SP'] ?></a>
            </li>
        </ul>
    </div>

    <!------------------- MAIN --------------------->
    <!------------------- MAIN --------------------->
    <!------------------- MAIN --------------------->

    <?php foreach ($product as $item): ?>
    <div class="product-detail-main">

        <!------------------- SLIDE IMG --------------------->
        <!------------------- SLIDE IMG --------------------->
        <!------------------- SLIDE IMG --------------------->

        <div class="product-detail-img">
            <div class="img-slide">
                <?php foreach (explode(';', $item['Hinh_Anh']) as $img): ?>
                <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($item['Ten_SP']) ?>"
                    class="img-slide-item" onclick="changeImg(this.src)">
                <?php endforeach ?>
            </div>
            <div class="img-main">
                <img src="<?= htmlspecialchars(explode(';', $item["Hinh_Anh"])[0]) ?>" class="img-main-item">
            </div>
        </div>

        <!------------------- INFO PRODUCT --------------------->
        <!------------------- INFO PRODUCT --------------------->
        <!------------------- INFO PRODUCT --------------------->

        <div class="product-detail-info">
            <h2 class="product-detail-title">
                <?= htmlspecialchars($item['Ten_SP']) ?>
            </h2>
            <p class="product-detail-price">
                <?= number_format(htmlspecialchars($item['Gia']), 2) ?> USD
            </p>
            <p class="product-detail-description">
                <?= htmlspecialchars($item['Mo_Ta_Ngan']) ?>
            </p>
            <div class="product-detail-capacity">
                <?php foreach (explode(',', $item['Dung_Tich']) as $capacity): ?>
                <p class="product-detail-capacity--item">
                    <?= htmlspecialchars($capacity) ?>
                </p>
                <?php endforeach ?>
            </div>

            <div class="product-detail-quantity">
                <form action="/The-Ordinary/cart" method="post" class="quantity-amount">
                    <div class="quantity-amount-item">
                        <button class="btn-quantity" type="button"
                            onclick="this.parentNode.querySelector('input[type=number]')">-</button>
                        <input type="text" name="quantity" 
                         value="1" class="input-quantity">
                        <input type="hidden" name="productId" value="<?= htmlspecialchars($item["ID_San_Pham"]) ?>">
                        <button class="btn-quantity" type="button"
                            onclick="this.parentNode.querySelector('input[type=number]')">+</button>
                    </div>
                    <div class="quantity-amount-item">
                        <button name="create" value="create" class="submit-add-to-cart" type="submit">
                            <i class='fa-solid fa-cart-shopping'></i>
                            Add to cart
                        </button>
                    </div>
                </form>
                <script>
                    document.querySelectorAll('.btn-quantity').forEach(function (button) {
                        button.addEventListener('click', function () {
                            const input = this.parentNode.querySelector('input[type=text]');
                            let value = parseInt(input.value);
                            if (this.innerText === '+') {
                                value = Math.min(value + 1, 10); // Max quantity is 10
                            } else {
                                value = Math.max(value - 1, 1); // Min quantity is 1
                            }
                            input.value = value;
                        });
                    });
                </script>

            </div>
            <div class="product-detail-message">
                <p class="product-detail-message--text">Free shipping on orders over $25</p>
                <p class="product-detail-message--text">365 days returns</p>
            </div>
            <div class="product-detail-attribute">
                <div class="product-detail-attribute--item">
                    <p class="attribute-item-title">Targets</p>
                    <p class="attribute-item-content">
                        <?= htmlspecialchars($item['Targets']) ?>
                    </p>
                </div>
                <div class="product-detail-attribute--item">
                    <p class="attribute-item-title">Suited to</p>
                    <p class="attribute-item-content">
                        <?= htmlspecialchars($item['Suited_to']) ?>
                    </p>
                </div>
                <div class="product-detail-attribute--item">
                    <p class="attribute-item-title">Format</p>
                    <p class="attribute-item-content">
                        <?= htmlspecialchars($item['Format']) ?>
                    </p>
                </div>
                <div class="product-detail-attribute--item">
                    <p class="attribute-item-title">Key ingredients</p>
                    <p class="attribute-item-content">
                        <?= htmlspecialchars($item['Key_ingredients']) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <script>
        function changeImg(src) {
            const imgMain = document.querySelector('.img-main-item');
            imgMain.src = src;
            const imgItems = document.querySelectorAll('.img-slide-item');
            imgItems.forEach(item => {
                if (item.src === imgMain.src) {
                    item.classList.add('actived-img-slide-item');
                } else {
                    item.classList.remove('actived-img-slide-item');
                }
            });

        }

        document.addEventListener('DOMContentLoaded', function () {
            const firstImg = document.querySelector('.img-slide-item');
            if (firstImg) {
                changeImg(firstImg.src);
            }
        });
    </script>

    <!-------------------OVERVIEW PRODUCT --------------------->
    <!-------------------OVERVIEW PRODUCT --------------------->
    <!-------------------OVERVIEW PRODUCT --------------------->

    <div class="product-detail-overview">
        <h2 class="product-detail-overview--title">Overview</h2>
        <button class="overview-content-toggle">
            <i class="fa-solid fa-angle-up"></i>
        </button>
        <script>
            document.querySelector('.overview-content-toggle').addEventListener('click', function () {
                const content = document.querySelector('.product-detail-overview--block');
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
                document.querySelector('.overview-content-toggle').style.transform = content.style.display === 'block' ? 'rotate(0)' : 'rotate(180deg)';
            });
        </script>
        <div class="product-detail-overview--block" style="display: block;">
            <div class="overview-inner">
                <div class="overview-inner-tab">
                    <div class="tab-pane">
                        <div class="tab-pane--left">
                            <div class="cta-link">
                                <h3>Discover if this product is right for you:</h3>
                                <div class="cataLink">
                                    <a class="btn-rounded-primary">Customize My Regimen</a>
                                </div>
                            </div>
                            <div class="descripstion-overview">
                                <h3 class="descripstion-overview--title">Product Details</h3>
                                <p class="descripstion-overview--content">
                                    <?= htmlspecialchars($item['Mo_Ta']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane--right">
                            <h3>Highlights</h3>
                            <div class="highlights-table">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------- USAGE PRODUCT --------------------->
    <!------------------- USAGE PRODUCT --------------------->
    <!------------------- USAGE PRODUCT --------------------->

    <div class="product-detail-usage">
        <h2 class="product-detail-usage--title">Usage Details</h2>
        <button class="overview-content-toggle--usage">
            <i class="fa-solid fa-angle-up"></i>
        </button>
        <script>
            document.querySelector('.overview-content-toggle--usage').addEventListener('click', function () {
                const content = document.querySelector('.product-detail-usage--content');
                content.style.display = content.style.display === 'grid' ? 'none' : 'grid';
                document.querySelector('.overview-content-toggle--usage').style.transform = content.style.display === 'grid' ? 'rotate(0)' : 'rotate(180deg)';
            });
        </script>
        <div class="product-detail-usage--content" style="display: grid;">
            <div class="usage-item">
                <img class="usage-item--img"
                    src="https://theordinary.com/on/demandware.static/-/Sites-deciem-master/default/dw8d85a6b1/Images/Usage-Details-How-To-Use-Image.jpg">
                <div class="usage-item--content">
                    <p>How to use</p>
                    <p>&#8594;</p>
                </div>
            </div>
            <div class="usage-item">
                <img class="usage-item--img"
                    src="https://theordinary.com/on/demandware.static/-/Library-Sites-DeciemSharedLibrary/default/dw9fb87a33/theordinary/pdp-cards/Usage-Details-Product-And-Safety-Guidance-Image.jpg">
                <div class="usage-item--content">
                    <p>Product & Safety Guidance</p>
                    <p>&#8594;</p>
                </div>
            </div>
            <div class="usage-item">
                <img class="usage-item--img"
                    src="https://theordinary.com/on/demandware.static/-/Library-Sites-DeciemSharedLibrary/default/dw23e9d8a2/theordinary/pdp-cards/Usage-Details-Disposal-Instructions-Image.jpg">
                <div class="usage-item--content">
                    <p>Recycling instructions</p>
                    <p>&#8594;</p>
                </div>
            </div>
        </div>
    </div>

    <!------------------- REVIEWS PRODUCT --------------------->
    <!------------------- REVIEWS PRODUCT --------------------->
    <!------------------- REVIEWS PRODUCT --------------------->

    <div class="reviews">
        <h2 class="reviews-title">Reviews</h2>
        <div class="reviews-overview">
            <div class="rating-snapshot">
                <p>Rating Snapshot</p>
                <div class="gr-rating">
                    <p class="gr-rating-title">5 stars</p>
                    <div class="process-rating-bar">
                        <div style="width: 75%;" class="process-rating-bar--fill"></div>
                    </div>
                    <p>831</p>
                </div>
                <div class="gr-rating">
                    <p class="gr-rating-title">4 stars</p>
                    <div class="process-rating-bar">
                        <div style="width: 75%;" class="process-rating-bar--fill"></div>
                    </div>
                    <p>831</p>
                </div>
                <div class="gr-rating">
                    <p class="gr-rating-title">3 stars</p>
                    <div class="process-rating-bar">
                        <div style="width: 75%;" class="process-rating-bar--fill"></div>
                    </div>
                    <p>831</p>
                </div>
                <div class="gr-rating">
                    <p class="gr-rating-title">2 stars</p>
                    <div class="process-rating-bar">
                        <div style="width: 75%;" class="process-rating-bar--fill"></div>
                    </div>
                    <p>831</p>
                </div>
                <div class="gr-rating">
                    <p class="gr-rating-title">1 stars</p>
                    <div class="process-rating-bar">
                        <div style="width: 75%;" class="process-rating-bar--fill"></div>
                    </div>
                    <p>831</p>
                </div>
            </div>
            <div class="overall-rating">
                <p>Overall Rating</p>
                <div class="overall-value">
                    <h2>4.5</h2>
                    <div class="overall-value-r">
                        <div class="rating-group">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p>1081 Reviews</p>
                    </div>
                </div>
            </div>
            <div class="feedback">
                <p>Review this Product</p>
                <div onclick="showFormFeedback()" class="rating mb-3">
                    <i class="bi bi-star" data-index="1"></i>
                    <i class="bi bi-star" data-index="2"></i>
                    <i class="bi bi-star" data-index="3"></i>
                    <i class="bi bi-star" data-index="4"></i>
                    <i class="bi bi-star" data-index="5"></i>
                </div>
                <script>

                </script>
            </div>
        </div>
        <div class="comments">
            <div class="filters-comments">
                <select name="rating" class="rating-filter">
                    <option value="" selected disabled>Rating</option>
                    <option value="5 stars">5 stars</option>
                    <option value="4 stars">4 stars</option>
                    <option value="3 stars">3 stars</option>
                    <option value="2 stars">2 stars</option>
                    <option value="1 stars">1 stars</option>
                </select>
                <select name="skin-type" class="type-filter">
                    <option value="" selected disabled>Skin Type</option>
                    <option value="Combination">Combination</option>
                    <option value="Dry Skin">Dry Skin</option>
                    <option value="Oily Skin">Oily Skin</option>
                </select>
                <select name="skin-tone" class="tone-filter">
                    <option value="" selected disabled>Skin Tone</option>
                    <option value="Light">Light</option>
                    <option value="Medium">Medium</option>
                    <option value="Dark">Dark</option>
                </select>
            </div>
            <div class="list-comments">
                <?php foreach ($feedbacks as $feedback): ?>
                <div class="comment-flex">
                    <div class="comment-content-info">
                        <p>
                            <?= htmlspecialchars(htmlspecialchars($feedback['HoTen'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <p><strong>Skin Type </strong>
                            <?= htmlspecialchars(htmlspecialchars($feedback['loai_da'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <p><strong>Skin Tone </strong>
                            <?= htmlspecialchars(htmlspecialchars($feedback['skin_tone'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>
                    <div class="comment-content-feedback">
                        <div class="rating-group">
                            <?php $du = $feedback['rating'] % 10; ?>
                            <?php for ($i = 0; $i < $du; $i++): ?>
                            <i class="bi bi-star-fill"></i>
                            <?php endfor; ?>
                            <?php for ($i = 0; $i < 5 - $du; $i++): ?>
                            <i class="bi bi-star"></i>
                            <?php endfor; ?>

                        </div>
                        <p>
                            <?= htmlspecialchars(htmlspecialchars($feedback['ngay_dang'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <p>
                            <?= htmlspecialchars($feedback['binh_luan'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <div class="images-feedback">
                            <?php foreach (explode(";", $feedback['hinh_anh']) as $item): ?>
                            <img src="<?= $item ?>">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div style="display:none" class="form-feedback">
                <form method="post" action="/The-Ordinary/feedback" id="feedback" enctype="multipart/form-data">
                    <h3>FEEDBACK</h3>
                    <input hidden name="id" type="text" value="<?= $_GET['id']?>">
                    <div class="overall-rating-feedback">
                        <p>Overall Rating</p>
                        <input hidden name="rating" type="number">
                        <div class="rating-feedback mb-3">

                        </div>
                    </div>
                    <div class="review-area">
                        <p>Review</p>
                        <textarea name="comments" cols="61" rows="5"></textarea>
                    </div>
                    <div class="personal-information">
                        <p>Personal Infomation</p>
                        <div class="select-personal">
                            <select name="skin-type" class="type-filter">
                                <option value="" selected disabled>Skin Type</option>
                                <option value="Combination">Combination</option>
                                <option value="Dry Skin">Dry Skin</option>
                                <option value="Oily Skin">Oily Skin</option>
                            </select>
                            <select name="skin-tone" class="tone-filter">
                                <option value="" selected disabled>Skin Tone</option>
                                <option value="Bright">Bright</option>
                                <option value="Medium">Medium</option>
                                <option value="Dark">Dark</option>
                            </select>
                        </div>
                    </div>
                    <div class="gallery-feedback">
                        <p>Add Images</p>
                        <div class="dropzone" id="dropzone">
                            <p>Drag drop image in here</p>
                        </div>
                        <input type="file" name="images[]" id="fileInput" multiple style="display:none">
                        <div class="preview" id="preview"></div>
                    </div>
                    <button class="btn-submit-feedback" type="submit">SUBMIT</button>
                    <div onclick="showFormFeedback()" class="close-form-feedback"><i class="fa-solid fa-xmark"></i>
                    </div>
                </form>
            </div>
            <script>
                const stars = document.querySelectorAll('.rating i');
                var currentRating = 0;
                stars.forEach(star => {
                    star.addEventListener('mouseover', () => {
                        const index = +star.dataset.index;
                        highlightStars(index);
                    });

                    star.addEventListener('click', () => {
                        currentRating = +star.dataset.index;
                        const main = document.querySelector('.rating-feedback')
                        const input = document.querySelector('.overall-rating-feedback input[name="rating"]')
                        input.value = currentRating
                        let child = ""
                        for (let i = 0; i < currentRating; i++) {
                            child += `<i style="background-color:var(--black);color:var(--white)" class="bi bi-star-fill" data-index=${i + 1}></i>`
                        }

                        for (let i = 1; i <= 5 - currentRating; i++) {
                            child += `<i class="bi bi-star" data-index=${i + currentRating}></i>`
                        }
                        main.innerHTML = child
                        console.log(child)


                        highlightStars(currentRating);

                    });

                    star.addEventListener('mouseout', () => {
                        highlightStars(currentRating);
                    });
                });

                function highlightStars(index) {
                    stars.forEach((star, i) => {
                        if (i < index) {
                            star.classList.remove('bi-star');
                            star.classList.add('bi-star-fill');
                            star.style.background = 'var(--black)'
                            star.style.color = 'var(--white)'
                        } else {
                            star.classList.remove('bi-star-fill');
                            star.classList.add('bi-star');
                            star.style.background = 'var(--white)'
                            star.style.color = 'var(--black)'
                        }
                    });
                }

                function showFormFeedback() {
                    const form = document.querySelector('.form-feedback')
                    const body = document.querySelector('body')
                    form.style.display = form.style.display === 'none' ? 'flex' : 'none'
                    body.style.overflow = form.style.display === 'none' ? 'scroll' : 'hidden'
                }
            </script>
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
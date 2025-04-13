
<footer>
    <div class='footerpage'>
        <div class='gap'></div>
        <div class='gap'></div>

        <div class='footer-container'>
            <div class='footer-col'>
                <div class='content-company'>
                    <h3>Company</h3>
                    <ul class='menu-company'>
                        <li>
                            <a href=''>About Us</a>
                        </li>
                        <li>
                            <a href=''>The Ordinary DNA</a>
                        </li>
                        <li>
                            <a href=''>Join Us</a>
                        </li>
                        Manufacture information: DECIEM Eastside
                    </ul>

                    <h3 style='margin-top: 30px;'>Our Commitments</h3>
                    <ul class='menu-company'>
                        <li>
                            <a href=''>Accessibility</a>
                        </li>
                        <li>
                            <a href=''>Sustainability</a>
                        </li>
                        <li>
                            <a href=''>Change is the Journey</a>
                        </li>
                        <li>
                            <a href=''>Everything Is Chemicals</a>
                        </li>
                    </ul>

                    <h3 style='line-height: 30px; margin-top: 100px;'>Location</h3>
                    <div class='location'>
                        <i class='fa-solid fa-location-dot'></i>
                        VIETNAM
                        <p>Language
                            EN</p>
                    </div>
                </div>

                <div class='content-customer-care'>
                    <h3>Customer Care</h3>
                    <ul class='menu-company'>
                        <li>
                            <a href=''>FAQ</a>
                        </li>
                        <li>
                            <a href=''>Disposal Instructions</a>
                        </li>
                        <li>
                            <a href=''>Return Policy</a>
                        </li>
                        <li>
                            <a href=''>Promotion Terms & Conditions</a>
                        </li>
                    </ul>
                </div>

                <div class='content-contact'>
                    <ul class='menu-contact'>
                        <li>
                            <a href=''>Contact Us</a>
                        </li>
                        <li>
                            <a href=''>Track Order</a>
                        </li>
                        <li>
                            <a href=''>Sign In</a>
                        </li>
                        <li>
                            <a href=''>Store Locator</a>
                        </li>
                    </ul>
                </div>
                <div class='content-info'>
                    <h3>Be in a know</h3>
                    <p class='content-info-description' style='padding-bottom: 15px;'>Subscribe to receive
                        science-backed tips, access to special offers, and new innovations.</p>
                    <form class="content-info-form">
                        <input type='email' class='form-email' placeholder='Enter your email'>
                        <i class='fa-solid fa-angle-right icon' style='color: gray;'></i>
                    </form>
                    <p style='padding:15px 0 15px 0;'>*By providing your email address you are agreeing to receive email
                        communications from DECIEM Inc., its affiliates, brands (The Ordinary, NIOD, and LOoPHA) and/or
                        marketing partners. This can be changed at any time. Please refer to our Privacy Policy and
                        Terms of Use for more details or Contact Us.</p>
                    <div class='footer-asset'>
                        <ul class='list-asset'>
                            <li>
                                <i class='fa-brands fa-facebook-f'></i>
                            </li>
                            <li>
                                <i class='fa-brands fa-instagram'></i>
                            </li>
                            <li>
                                <i class='fa-brands fa-youtube'></i>
                            </li>
                            <li>
                                <i class='fa-brands fa-tiktok'></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class='footer-copyright-menu'>
                <ul>
                    <li>BEDE Beauty Group Inc. 2022. All rights reserved.</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                    <li>Do not sell my personal information</li>
                    <li>Cookies</li>
                    <li style='font-weight: bold;'>A STORE PROJECT.</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="Search-Container"></div>
<div class="site-search">
    <div class="search-header">
        <h1>Search</h1>
        <button class="close-search"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <form class="form-search" action="/The-Ordinary/shop" method="GET">
        <input type="text" name="search" class="search-input" placeholder="Search for products...">
        <button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
<script>
    const searchButton = document.querySelector('.icon-header-btn:nth-child(1)');
    const searchContainer = document.querySelector('.site-search');
    const closeSearchButton = document.querySelector('.close-search');
    const containerSearch = document.querySelector('.Search-Container');

    searchButton.addEventListener('click', () => {
        searchContainer.style.display = 'block';
        containerSearch.style.display = 'block';
        searchContainer.querySelector('.search-input').focus();
        searchContainer.querySelector('.search-input').value = ''; 
    });

    closeSearchButton.addEventListener('click', () => {
        searchContainer.style.display = 'none';
        containerSearch.style.display = 'none';

    });
</script>
</body>

</html>
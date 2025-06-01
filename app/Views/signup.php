<div class="signup-container">
    <div class="signup-account-breadcrumb">
        <ul class="nav-signup">
            <li><a href="/The-Ordinary/login" style="color: gray;">Account</a></li>&rsaquo;
            <li><a style="margin-left: 10px;" href="#">Create Account</a></li>
        </ul>
    </div>

    <div class="is-divider-login"></div>

    <div class="signup-wrapper">
        <h2 class="signup-wrapper-h2">Create Account</h2>
        <p class="signup-wrapper-p">Already have an account? <a href="/The-Ordinary/login" style="color: black;">Sign in </a></p>
        <form method="post">
            <input class="signup-input" type="text" name="name" placeholder="Full name" >
            <input class="signup-input" type="text" name="phone" placeholder="Phone" >
            <input class="signup-input" type="email" name="email" placeholder="Email" required>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <div class="input-group">
                <input type="password" name="confirm-password" placeholder="Confirm Password" required>
                <i class="fa-regular fa-eye-slash"></i>
            </div>
            <div class="options">
                <label><input type="checkbox" />Keep me updated</label>
            </div>
            <p class="signup-content-asset">Stay up to date on the latest DECIEM news, events, promotions and new product developments.
            *By checking the above box you are agreeing to receive email communications from DECIEM Inc., its affiliates, brands (The Ordinary, NIOD and LOoPHA) and/or marketing partners. This can be changed at any time. Please refer to our <a href="">Privacy Policy</a> and <a href="">Terms of Use</a> for more details or <a href="">Contact Us.</a></p>
            <button type="submit" class="btn-signin">JOIN NOW</button>
            <p class="signup-content-asset">By clicking “Join Now” you agree to the <a href="">Privacy Policy</a> and <a href="">Terms of Use</a>.</p>
            <?php unset($_SESSION["Validations"]); ?>
        </form>

        
    </div>
</div>
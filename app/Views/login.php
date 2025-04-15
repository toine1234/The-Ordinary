<?php session_start(); ?>
<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<div class="login-container">
    <div class="login-account-breadcrumb">
        <ul class="nav-login">
            <li><a href="/The-Ordinary/login" style="color: gray;">Account</a></li>&rsaquo;
            <li><a style="margin-left: 10px;" href="#">Sign In</a></li>
        </ul>
    </div>
    <div class="line-login"></div>
    <div class="login-wrapper">
        <div class="login-left">
            <h2 style="text-align: left; line-height: 30px; padding-bottom: 20px; font-size: 20px">SIGN IN TO YOUR
                ACCOUNT</h2>
            <p style="text-align: left;">First time visiting? You might need to <a href="/The-Ordinary/resetpassword"
                    style="color: black;">reset your password</a></p>

            <form method="post">
                <input class="login-input" type="email" name="email" placeholder="Email" required>
                <div class="password-wrapper">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fa-regular fa-eye-slash"></i>
                </div>
                <div class="options">
                    <label><input type="checkbox" />Remember Me</label>
                    <a href="/The-Ordinary/resetpassword">Reset password</a>
                </div>

                <button type="submit" class="btn-signin">SIGN IN</button>
            </form>

            <p class="policy">
                By signing in, you agree to the <a href="#">Terms of Use</a> and acknowledge the <a href="#">Privacy
                    Policy</a>. California consumers, see our <a href="#">Notice of Financial Incentives</a>.
            </p>
        </div>
        <div class="vertical-divider"></div>
        <div class="login-right">
            <h2 style="text-align: center; margin-bottom: 20px;">DISCOVER THE BENEFITS OF MEMBERSHIP</h2>
            <p style="text-align: center; margin-bottom: 20px;">One account. Three brands. Endless possibilities.</p>
            <img src="https://theordinary.com/on/demandware.static/-/Library-Sites-DeciemSharedLibrary/default/dw1a6617c2/deciem/signin-banner-image.jpg"
                alt="login image">
            <ul>

                <li>&#10003; Get personalized product recommendations via our comprehensive Regimen Builder.</li>
                <li>&#10003; Track orders and manage all your subscriptions in one place.</li>
            </ul>
            <a href="/The-Ordinary/signup">
                <button type="submit" class="btn-createaccount">CREATE ACCOUNT</button>
            </a>
        </div>
    </div>
</div>
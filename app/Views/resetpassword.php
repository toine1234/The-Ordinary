<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show mt-3 mx-3" role="alert">
        <?= $_SESSION['flash']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
<div class="reset-password-container" id="reset-password-container">
    <div class="resetpw-account-breadcrumb">
        <ul class="nav-resetpw">
            <li><a href="/The-Ordinary/login" style="color: gray; margin-right: 10px;">Account</a></li>&rsaquo;
            <li><a style="margin-left: 10px;" href="#">Reset Password</a></li>
        </ul>
    </div>
    <div class="is-divider-login"></div>
    <div class="resetpw-content">
        <h2>RESET PASSWORD</h2>
        <?php if (!isset($_GET['token'])): ?>
            <div class="login-resetpw-input">
                <input class="login-resetpw" type="email" name="email" placeholder="Email" required>
                <button class="btn-reset-password">RESET PASSWORD</button>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['token'])): ?>
            <form method="post" action="/The-Ordinary/resetpassword/update">
                <input name="email" hidden value="<?= $_GET['email']?>">
                <div class="input-group">
                    <input type="password" name="password" placeholder="New Password" required>
                    <i class="fa-regular fa-eye-slash"></i>
                </div>
                <div class="input-group">
                    <input type="password" name="comfirmPassword" placeholder="Confirm New Password" required>
                    <i class="fa-regular fa-eye-slash"></i>
                </div>
                <button type="submit" class="btn-password-edit">SAVE CHANGES</button>
            </form>
        <?php endif; ?>

        <script>
            document.querySelector('.btn-reset-password').addEventListener('click', function () {
                const data = document.querySelector('.login-resetpw').value
                console.log(data)
                const main = document.querySelector('.resetpw-content')
                fetch("/The-Ordinary/resetpassword", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: new URLSearchParams({ email: data }),
                })
                    .then(() => main.innerHTML = `
                        <div>
                        <h1 style="margin-top:50px">Instructions have been sent!</h1>
                        <p>Help is on the way - kindly check your email for next steps.</p>
                        <a href="/The-Ordinary/login" style="padding:10px;background-color:black;color:white;display:block;margin-top:20px;text-align:center;width:100%">RETURN TO SIGN IN</a>
                        </div>
                    `) // hoặc response.text() nếu server trả về text
            })
        </script>
    </div>
</div>
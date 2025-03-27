<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register & Login</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Alatsi&family=Gidole&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <?php
        include 'header.php';
        ?>

        <!----------------------------------- Form box ---------------------------------------------->
        <div class="form-box">

            <!------------------------------- Login form ------------------------------>

            <div class="login-container" id="login">
                <div class="top">
                    <header>Login</header>
                </div>
                <form method="post" action="">
                    <div class="input-box">
                        <input type="text" class="input-field" name="emaill" placeholder="Username or Email">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" name="passpass" placeholder="Password">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Forgot password ?</a></label>
                        </div>
                    </div>

                    <div class="input-box">
                        <input type="submit" class="submit" value="Sign In">
                    </div>
                </form>

                <div class="top">
                    <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                </div>
            </div>

            <!------------------------------- Register form ------------------------------>
            <div class="register-container" id="register">
                <div class="top">
                    <header>Sign Up</header>
                </div>

                <form method="post" action="function_PHP/register.php">
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" name="fName" placeholder="Firstname">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name="lName" placeholder="Lastname">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>

                    <div class="input-box">
                        <input type="text" class="input-field" name="email" placeholder="Email">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" name="pass" placeholder="Password">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Terms & conditions</a></label>
                        </div>
                    </div>

                    <div class="input-box">
                        <input type="submit" class="submit" value="Register">
                    </div>
                </form>

                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Sign In</a></span>
                </div>

            </div>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>
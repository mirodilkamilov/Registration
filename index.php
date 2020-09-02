<!DOCTYPE html>
<html lang="en">
<?php

include 'include/autoloader.php';

$isOk = true;
$registerForm = new registerForm();
$signInForm = new signInForm();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['submit'] == 'sign_up') {
        $isOk = $registerForm->registerCheck();
    } else if ($_POST['submit'] == 'sign_in') {
        $signInForm->signInValidate();
    }
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/v4-shims.css">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body>
    <div class="container <?= $isOk ? '' : 'container-active' ?>" id="container">
        <div class="box sign-in-container">
            <div class="form-container">
                <form action="index.php" method="post">
                    <h1>Login</h1>
                    <p class="form-paragraph">Sign in to your account to continue.</p>
                    <span class="error-span"><?php echo $signInForm->errors_sign['signIn']; ?></span>
                    <div class="input-area">
                        <input type="text" name="email" class="<?= empty($signInForm->errors_sign['email']) ? '' : 'error-input' ?>" value="<?= $signInForm->getEmail(); ?>" />
                        <span class="floating-labels">Email address</span>
                        <span class="error-span"><?php echo $signInForm->errors_sign['email']; ?></span>
                    </div>
                    <div class="input-area">
                        <input type="password" name="password" class="<?= empty($signInForm->errors_sign['password']) ? '' : 'error-input' ?>" />
                        <span class="floating-labels">Password</span>
                        <span class="error-span"><?php echo $signInForm->errors_sign['password']; ?></span>
                        <!-- <span class="error-span"><?php echo $signInForm->errors_sign['signIn']; ?></span> -->
                    </div>
                    <div class="button-container">
                        <a class="form-question" href="">Forgot your password?</a>
                        <button class="form-button sign-in-button" type="submit" name="submit" value="sign_in">Sign In</button>
                    </div>
                    <div class="form-footer">
                        <p class="form-paragraph">Not registered? <button type="button" class="footer-btn" id="create-account-link">Create account</button></p>
                    </div>
                </form>
            </div>
            <div class="img-container">
                <img src="images/login.svg" alt="login">
            </div>
        </div>
        <div class="box sign-up-container">
            <div class="img-container">
                <img src="images/register.svg" alt="register">
            </div>
            <div class="form-container">
                <form action="index.php" method="post">
                    <h1>Register</h1>
                    <p class="form-paragraph">Create account to continue.</p>
                    <div class="input-area">
                        <input type="text" name="fname" class="<?= empty($registerForm->errors_register['fname']) ? '' : 'error-input' ?>" value="<?php echo $registerForm->getFname(); ?>" />
                        <span class="floating-labels">First name</span>
                        <span class="error-span"><?php echo $registerForm->errors_register['fname']; ?></span>
                    </div>
                    <div class="input-area">
                        <input type="text" name="lname" class="<?= empty($registerForm->errors_register['lname']) ? '' : 'error-input' ?>" value="<?= $registerForm->getLname(); ?>" />
                        <span class="floating-labels">Last name</span>
                        <span class="error-span"><?php echo $registerForm->errors_register['lname']; ?></span>
                    </div>
                    <div class="input-area">
                        <input type="text" name="email" class="<?= empty($registerForm->errors_register['email']) ? '' : 'error-input' ?>" value="<?= $registerForm->getEmail(); ?>" />
                        <span class="floating-labels">Email address</span>
                        <span class="error-span"><?php echo $registerForm->errors_register['email']; ?></span>
                    </div>
                    <div class="input-area">
                        <input type="password" name="password" class="<?= empty($registerForm->errors_register['password']) ? '' : 'error-input' ?>" />
                        <span class="floating-labels">Password</span>
                        <span class="error-span"><?php echo $registerForm->errors_register['password']; ?></span>
                    </div>
                    <div class="button-container">
                        <button class="form-button sign-up-button" type="submit" name="submit" value="sign_up">Sign Up</button>
                    </div>
                    <div class="form-footer">
                        <p class="form-paragraph">Already have an account? <button type="button" class="footer-btn" id="sign-in-link">Sign in</button></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const createAccountLink = document.getElementById('create-account-link');
        const signInLink = document.getElementById('sign-in-link');
        const formContainer = document.getElementById('container');

        createAccountLink.addEventListener('click', () => {
            formContainer.classList.add('container-active');
        });

        signInLink.addEventListener('click', () => {
            formContainer.classList.remove('container-active');
        });
    </script>
</body>

</html>
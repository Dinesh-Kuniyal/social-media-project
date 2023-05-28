<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Opiverse</title>
    <?php include('../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php include('../components/loader.php'); ?>
    <h2 class="top-logo">
        <img src="../logo.png" style="width: 100px;" alt="LOGO">
    </h2>
    <div class="main-login-page-container">
        <div class="login-details-container">
            <form action="#" method="POST" enctype="text/plain">
                <h2 class="welcome-back-heading">Welcome Back</h2>
                <span class="login-taline-inner">Meet the people of your community</span>
                <!-- <div class="login-with-google-btn">
                    Login with google
                </div> -->
                <div class="or-label-login">
                    <div class="line-or"></div>
                    or Login with email
                    <div class="line-or"></div>
                </div>
                <input type="text" name="UsernameEmail" placeholder="Username or Email" required>
                <input type="password" placeholder="Password" name="password" required>
                <span class="forot-password-label">Forgot password ?</span>
                <div class="loader-login"></div>
                <span class="login-form-alert">
                    Incorrect details
                </span>
                <button class="LoginBtn" type="submit" name="login">Login</button>
                <div class="form-footer-link">
                    Not have an account? <a href="../signup/">Sign Up</a>
                </div>
            </form>
        </div>
        <div class="login-image-container">
            <img class="bg-img-login" src="../resources/images/background.jpg" alt="Failed To Load Image..">
            <div class="detail-container-qoute">
                <h2>
                    "We are building a community of people having same interests
                    by sharing mutual experience."
                </h2>
            </div>
            <div class="details-footer">
                <span class="name-footer">Dinesh Kuniyal</span>
                <span class="label-title">( Developer Opiverse )</span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const LoaderLogin = document.querySelector(".loader-login");
        const LoginForm = document.querySelector("form");
        const LoginAlert = document.querySelector(".login-form-alert");
        const LoginBtn = document.querySelector(".LoginBtn");
        LoginForm.onsubmit = (e) => {
            e.preventDefault();
        }
        const SetLoginAlert = (message) => {
            LoginAlert.style.display = "block";
            LoginAlert.innerHTML = message;
        }
        LoginBtn.onclick = () => {
            LoaderLogin.style.display = "block";
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "login.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        LoaderLogin.style.display = "none";
                        let response = xhr.response;
                        console.log(response)
                        eval(response);
                    }
                }
            }
            let formData = new FormData(LoginForm);
            xhr.send(formData);
        }
    </script>
</body>

</html>
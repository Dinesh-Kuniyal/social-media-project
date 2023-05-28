<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Opiverse</title>
    <?php include('../components/links.php'); ?>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php include("../components/loader.php"); ?>
    <h2 class="top-logo">
        <img src="../logo.png" style="width: 100px;" alt="LOGO">
    </h2>
    <div class="main-container">
        <div class="slider-container-outer">
            <img class="bg-layer" src="../resources/images/img2.jpg" alt="ERROR">
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
        <div class="form-container">
            <div class="verify-box">
                <h2 class="verify-heading">Verify your account</h2>
                <span class="verify-label-form">
                    Enter the OTP which we sent to your email address.
                </span>
                <form class="verify-form">
                    <input type="number" name="Entered_OTP" class="input_number" placeholder="ENTER OTP  [ 6 DIGITS ]">
                    <span class="verify-form-alert">Invalid OTP</span>
                    <button class="verify_btn" type="submit" name="verify">Verify account</button>
                </form>

                <div class="login-link-footer">
                    Didn't recieved an OTP? <a href="javascript:void(0)" class="resend_otp_btn"> RESEND OTP</a>
                </div>
                <div class="login-link-footer">
                    Already have an account? <a href="../login/"> Login Now</a>
                </div>
            </div>
            <form class="signup-form">
                <h3>Create an account for free</h3>
                <span class="form-tagline">Join the community of people
                    based on your interests.
                </span>
                <span class="join-as-label">Join As</span>
                <div class="reader-writer-btn-container">
                    <div class="btn reader-btn active">Reader</div>
                    <div class="btn writer-btn">Writer</div>
                </div>
                <input type="text" name="name" placeholder="Name">
                <input type="text" id="username" name="username" placeholder="Username">
                <input type="text" class="user_type" name="usertype" hidden placeholder="User Type" value="reader">
                <input type="email" name="email" placeholder="Email">
                <input autocomplete="new-password" type="password" id="SignupPassword" name="password" placeholder="Password">
                <div data-aos="ease-in" data-aos-duration="1000" class="form-sign-up-loader"></div>
                <span class="alert-label"></span>
                <button class="CreateAccountBtn">Create account</button>
                <!-- <div class="sign-up-with-google-link">
                    Sign up with google
                </div> -->
                <div class="login-link-footer">
                    Already have an account? <a href="../login/">Log in</a>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        const signup_form = document.querySelector(".signup-form");
        const sign_up_loader = document.querySelector(".form-sign-up-loader");
        const alert_label = document.querySelector(".alert-label");
        const SetFormAlert = (message) => {
            alert_label.style.display = "block";
            alert_label.innerHTML = message;
        }
        signup_form.onsubmit = (e) => {
            e.preventDefault();
        }
        const OpenSignUpLoader = () => {
            sign_up_loader.style.display = "block";
            setTimeout(() => {
                SetFormAlert('Slow internet connection.');
            }, 6000);
        }
        const CloseSignUpLoader = () => {
            sign_up_loader.style.display = "none";
            setTimeout(() => {
                SetFormAlert('Slow internet connection.');
            }, 6000);
        }
        const OpenVerifyBox = () => {
            document.querySelector(".verify-box").classList.add("verify-box-open");
        }
        const reader_btn = document.querySelector(".reader-btn");
        const writer_btn = document.querySelector(".writer-btn");
        const user_type = document.querySelector(".user_type");
        reader_btn.onclick = () => {
            ChangeTab(reader_btn, writer_btn);
            user_type.value = "reader";

        }
        writer_btn.onclick = () => {
            ChangeTab(writer_btn, reader_btn);
            user_type.value = "writer";
        }
        const ChangeTab = (a, b) => {
            a.classList.add("active");
            b.classList.remove("active");
        }
        const CreateAccountBtn = document.querySelector(".CreateAccountBtn");
        CreateAccountBtn.onclick = () => {
            var username = document.getElementById('username').value;
            // alert(username.length)
            var usernameFlag = true;
            for (i = 0; i < username.length; i++) {
                if (username[i] === " " || username[i] === "@" || username[i] === "#" || username[i] === "$" || username[i] === "%" || username[i] === "-") {
                    usernameFlag = false;
                }
            }
            if (usernameFlag) {
                OpenSignUpLoader();
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "signup.php", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            CloseSignUpLoader();
                            let response = xhr.response;
                            console.log(response)
                            eval(response);
                        }
                    }
                }
                let formData = new FormData(signup_form);
                xhr.send(formData);
            } else {
                alert("Special Characters And Spaces Are Not Allowed In Username");
            }
        }
        // OpenVerifyBox();
    </script>

    <!-- // Verify OTP  -->
    <script>
        const verify_form = document.querySelector(".verify-form");
        const verify_btn = document.querySelector(".verify_btn");
        const verify_alert_text = document.querySelector(".verify-form-alert");
        const resend_otp_btn = document.querySelector(".resend_otp_btn");
        verify_form.onsubmit = (e) => {
            e.preventDefault();
        }
        const ShowVerifyAlert = (message) => {
            verify_alert_text.style.display = "block";
            verify_alert_text.innerHTML = message;
        }
        verify_btn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "verify.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let response = xhr.response;
                        console.log(response);
                        // var obj = 
                        eval(response);

                    }
                }
            }
            let formData = new FormData(verify_form);
            xhr.send(formData);
        }
        resend_otp_btn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "resendOTP.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let response = xhr.response;
                        eval(response);
                    }
                }
            }
            let formData = new FormData(verify_form);
            xhr.send(formData);
        }
    </script>
    <div id="return-result-printer">
        <!-- <script>SetFormAlert('Username not available')</script> -->
    </div>
</body>

</html>
<?php
if (isset($_SESSION['UserVerfied'])) {
    if ($_SESSION['UserVerfied'] === 0) {
        echo '<script>OpenVerifyBox();</script>';
    }
}
?>
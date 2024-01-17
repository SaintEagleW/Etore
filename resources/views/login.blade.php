<!DOCTYPE html>
<html lang="en">

<head>
    <title>Etore Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* 加入樣式以匹配您的描述 */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 800px;
            height: 480px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            font-family: "Unbounded";
        }

        .left-panel,
        .right-panel {
            background-color: #F9F9F9;
            text-align: center;
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .left-panel {
            background-color: #686868;
            color: #fff;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .right-panel input {
            font-size: 16px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-color: #555555;
            height: 40px;
            width: 340px;
            font-family: Helvetica, sans-serif;
        }

        .right-panel input::placeholder {
            color: #888888;
        }

        #submit {
            display: block;
            margin: 0 auto;
            width: 140px;
            border-radius: 20px;
            font-size: 18px;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
        }

        #button {
            display: block;
            margin: 0 auto;
            width: 140px;
            border-radius: 20px;
            font-size: 18px;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
        }

        .title {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        p {
            text-align: justify;
            width: 205px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 190%;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .right-panel-p {
            text-align: center;
            width: 205px;
            margin-bottom: 20px;
            font-size: 14px;
            font-family: Helvetica, sans-serif;
            line-height: 120%;
        }

        .forgot-password {
            display: flex;
            flex-direction: row;
            /* align-items: center; */
            margin-top: 20px;
        }

        .forgot-password-p {
            font-size: 14px;
            font-family: Helvetica, sans-serif;
            color: #888888;
        }

        .reset-btn {
            font-size: 10px;
            font-family: Helvetica, sans-serif;
            width: 120px;
            height: 30px;
            border-radius: 20px;
            margin-left: -40px;
            margin-top: -2px;
        }
    </style>
</head>

<body>
    <div class="row container">
        <div class="left-panel col-md-5">
            <div class="content">
                <label class="title">Create Account</label>
                <p>Don't have an account to buy something? Try it for free!</p>
                <div class="d-grid gap-2">
                    <a href="http://localhost:8000/user/register" type="submit" id="button" class="form-control btn btn-light">SIGN UP</a>
                </div>
            </div>
        </div>
        <div class="right-panel col-md-7">
            <div class="content">
                <label class="title mb-2">Welcome Back</label>
                <p class="right-panel-p">Since you already have an account. Try to login to enjoy entire travel.</p>
                <div>
                    <div>
                        <input type=" email" name="email" class="form-control" id="email" required placeholder="Email">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" id="password" required placeholder="Password">
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" id="submit" class="form-control btn btn-secondary">SIGN IN</button>
                    </div>
                </div>

                <div class="forgot-password">
                    <p class="forgot-password-p">Forgot your password?</p>
                    <a href="http://localhost:8000/user/resetPassword" class="btn btn-outline-secondary reset-btn" id="reset">Reset Password</a>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            const buttonClick = (e) => {
                const email = $('#email').val();
                const password = $('#password').val();
                console.log(email, password);

                axios.post(
                    '/api/user/login', {
                        email: email,
                        password: password
                    }
                ).then(function(response) {

                    if (response.data.code === 0) {
                        setCookie('token', response.data.token);
                        window.location.href = `http://localhost:8000/user/profile`;
                    }

                    if (response.data.code === 1) {
                        alert(response.data.message);
                    }

                    if (response.data.code === 2) {
                        alert(response.data.message);
                    }

                }).catch(function(error) {
                    console.error(error);
                    alert(error.response.data.message);
                });
            }

            $('#submit').on('click', buttonClick);
            $('#email, #password').on('keydown', function(e) {
                if (e.key === 'Enter') {
                    buttonClick();
                }
            });

        });

        function setCookie(cookieName, cookieValue, expiryDate) {
            var d = new Date();
            d.setTime(d.getTime() + (expiryDate * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cookieName + "=" + cookieValue + "; " + expires + "; path=/";
        }
    </script>
</body>

</html>
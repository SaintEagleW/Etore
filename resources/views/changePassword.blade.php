<!DOCTYPE html>
<html lang="en">

<head>
    <title>Etore Register</title>
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
            font-family: 'Unbounded', sans-serif;
        }

        .left-panel,
        .right-panel {
            background-color: #F9F9F9;
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
        }

        .left-panel {
            background-color: #686868;
            color: #fff;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .right-panel input {
            /* color: #767676; */
            border-radius: 8px;
            /* margin-right: 20px auto; */
            margin-bottom: 15px;
            border-color: #555555;
            height: 40px;
            width: 340px;
            font-family: Helvetica, sans-serif;
            font-size: 16px;
            /* color: #888888; */
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

        #back {
            display: block;
            margin: 0 auto;
            width: 140px;
            border-radius: 20px;
            font-size: 15px;
            font-family: Helvetica, sans-serif;
            /* font-weight: bold; */
        }
    </style>
</head>

<body>
    <div class="row container">
        <div class="col-md-5 left-panel">
            <div class="content">
                <label class="title">Welcome Back</label>
                <p>Since you already have an account. Try to login to enjoy entire travel.</p>
                <div class="d-grid gap-2">
                    <a href="http://localhost:8000/user/login" type="submit" id="button" class="form-control btn btn-light">SIGN IN</a>
                </div>
            </div>

        </div>
        <div class="col-md-7 right-panel">
            <div class="content">
                <label class="title mb-2">Change Password</label>
                <p class="right-panel-p">Try a new password to login!</p>
                <div>
                    <div>
                        <input type="password" name="password" class="form-control" id="password" required placeholder="New Password">
                    </div>
                    <div>
                        <input type="password" name="passworConfirm" class="form-control" id="passwordConfirm" required placeholder="Password Confirm">
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" id="submit" class="form-control btn btn-secondary">CONFIRM</button>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <a href="http://localhost:8000/user/profile" id="back" class="form-control btn btn-outline-secondary">Back to profile</a>
                    </div>
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
                const password = $('#password').val();
                const passwordConfirm = $('#passwordConfirm').val();
                const token = getCookie('token');

                axios.patch(
                    '/api/user/changePassword', {
                        password: password,
                        passwordConfirm: passwordConfirm,
                        token: token
                    }
                ).then(function(response) {

                    if (response.data.code === 0) {
                        deleteCookie("token");
                        alert(response.data.message);
                        window.location.href = `http://localhost:8000/user/login`;
                    }

                    if (response.data.code === 1) {
                        alert(response.data.message);
                        window.location.href = `http://localhost:8000/user/login`;
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
        });

        function getCookie(cookieName) {
            var name = cookieName + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var cookieArray = decodedCookie.split(';');
            for (var i = 0; i < cookieArray.length; i++) {
                var cookie = cookieArray[i];
                while (cookie.charAt(0) === ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(name) === 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }
            return null;
        }

        function deleteCookie(name) {
            document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
    </script>
</body>

</html>
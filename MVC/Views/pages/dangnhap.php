<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/do_an_diem/Public/css/login.css">
    <link rel="stylesheet" href="/do_an_diem/Public/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
    <div class="nameapp" style="width: 60%;"></div>
    <div style="width: 40%;">
        <div id="main">
            <div class="body-login">
                <form action="http://localhost/do_an_diem/dangnhap_c/dangnhap_1" method="post">
                    <h1 class="header-login">Login</h1>
                    <?php if (isset($_SESSION['error_message'])) : ?>
                        <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
                        <?php unset($_SESSION['error_message']); ?>
                    <?php endif; ?>
                    <div class="text-login">
                        <input type="text" name="txtuser" placeholder="Username" required>
                        <i class="icon-login fa-solid fa-user"></i>
                    </div>
                    <div class="text-login">
                        <input type="password" name="txtpassword" placeholder="Password" required>
                        <i class="icon-login fa-solid fa-lock"></i>
                    </div>
                    <div class="remember-login">
                        <label for=""><input type="checkbox" name="remember" id="remember-checkbox"> Ghi nhớ password</label>
                        <a href="./quenmatkhau.php" class="quenmk">Quên mật khẩu</a>
                    </div>
                    <button type="submit" name="btn-login" class="btn-login">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rememberCheckbox = document.getElementById('remember-checkbox');
            var usernameInput = document.getElementsByName('txtuser')[0];
            var passwordInput = document.getElementsByName('txtpassword')[0];

            rememberCheckbox.addEventListener('change', function() {
                if (rememberCheckbox.checked) {
                    localStorage.setItem('username', usernameInput.value);
                    localStorage.setItem('password', passwordInput.value);
                } else {
                    localStorage.removeItem('username');
                    localStorage.removeItem('password');
                }
            });

            if (localStorage.getItem('username') && localStorage.getItem('password')) {
                usernameInput.value = localStorage.getItem('username');
                passwordInput.value = localStorage.getItem('password');
                rememberCheckbox.checked = true;
            }
        });
    </script>
</body>
</html>

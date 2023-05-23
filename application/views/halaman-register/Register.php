<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="<?=base_url();?>css/style-register.css">
    <link rel="stylesheet" href="<?=base_url()?>TOAST/dist/css/iziToast.min.css">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">

</head>
<body>

    <div class="container">
        <div class="logo-heylink">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
            </svg>
            <a href="">HeyLink.me</a>
        </div>
        <div class="register-login">
            <div class="container-login">

            </div>
        </div>
    </div>
    <div class="form-login">
        <div class="container-form">
            <div class="header-form">
                <p>Masuk ke akun anda <span>HeyLink.me</span> akun</p>
            </div>
            <form  method="post" class="form" id="formRegister">
                <div class="user-box">
                    <label for="">Email</label>
                    <input type="text" name="email" >
                </div>
                <div class="user-box">
                    <label for="">Nama Pengguna</label>
                    <input type="text" name="nama_pengguna">
                </div>
                <div class="user-box">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <button type="button" name="submit" onclick="register()" class="kotak-login" > Daftar</button>
                <!-- <button type="submit" name="submit"  class="kotak-login" > Daftar</button> -->
                <p class="text">Atau masuk dengan email Google anda</p>
                <a href="<?php echo site_url('google_register/register_google'); ?>" class="kotak-google">
                    <img class="img-google" src="<?=base_url();?>img/google.png" alt="">
                    <p>Daftar dengan Google</p>
                </a>
                <!-- <button id="registerBtn">Register with Google</button> -->
                <a href="<?=site_url('User_authentication/register_facebook');?>" class="kotak-fb">
                    <img class="img-fb" src="<?=base_url();?>img/facebook.png" alt="">
                    <p>Daftar dengan Facebook</p>
                </a>
                <p class="login-bottom">Sudah memiliki akun? <a href="<?=site_url('Login');?>">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
<script>

function register() {
    var data = $('#formRegister').serialize();
    $.ajax({
        method: 'POST',
        url: 'http://localhost/HProject/login/Welcome/addData',
        data: data,
        success: function(response) {
            var result = JSON.parse(response);
            if (result.status === false) {
                var errors = result.error;
                $.each(errors, function(key, value) {
                    iziToast.error({
                        title: 'Error',
                        message: value,
                        position: 'topRight'
                    });
                });
            } else {
                iziToast.success({
                    title: 'Success',
                    message: result.message,
                    position: 'topRight'
                });
                setTimeout(function() {
                        window.location.href = "<?=site_url('Welcome');?>";
                    }, 1700);
            }
        }
    });
}

</script>
<script src="<?=base_url();?>TOAST/dist/js/iziToast.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

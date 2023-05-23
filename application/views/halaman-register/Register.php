<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="<?=base_url();?>css/style-register.scss">
    <link rel="stylesheet" href="<?=base_url()?>TOAST/dist/css/iziToast.min.css">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff;
            position: relative;
            overflow-x: hidden;
            background-color: grey;
            margin: 30px 20px;
            background-image: url("<?= base_Url();?>img/banner.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="logo-heylink">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
            </svg>
            <a href="">JWS</a>
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
                    <input type="text" name="email" placeholder=" Masukan email">
                </div>
                <div class="user-box">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_pengguna" placeholder=" Masukan nama lengkap">
                </div>
                <div class="user-box">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder=" Masukan password">
                </div>
                <button type="button" name="submit" onclick="register()" class="kotak-login" > Daftar</button>
                <!-- <button type="submit" name="submit"  class="kotak-login" > Daftar</button> -->
                <p class="text">Atau masuk dengan email Google anda</p>
                <a href="<?php echo site_url('google_register/register_google'); ?>" class="kotak-google">
                    <img class="img-google" src="<?=base_url();?>img/google.png" alt="">
                    <p>Daftar dengan Google</p>
                </a>
                <!-- <button id="registerBtn">Register with Google</button> -->
                <a href="" class="kotak-no">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-telephone-fill"
                    viewBox="0 0 16 16"
                    >
                    <path
                        fill-rule="evenodd"
                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"
                    />
                    </svg>
                    <p>Daftar dengan No Telepon</p>
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

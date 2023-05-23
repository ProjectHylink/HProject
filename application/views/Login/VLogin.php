
    <div class="container">
        <div class="logo-heylink">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
            </svg>
            <a href="<?=site_url('Home');?>">HeyLink.me</a>
        </div>
        <div class="register-login">
            <div class="container-login">
                <p>Tidak Punya Akun?</p>
                <a href="<?=site_url('Welcome/register');?>" class="kotak-daftar">Daftar</a>
            </div>
        </div>
    </div>
    <div class="form-login">
        <div class="container-form">
            <div class="header-form">
                <p>Masuk ke akun anda <span>HeyLink.me</span> akun</p>
            </div>
            <form method="post" id="formLogin" class="form">
                <div class="user-box">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" required placeholder=" Masukkan email">
                </div>
                <div class="user-box">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" required placeholder=" Masukkan password">
                </div>
                <div class="lupa-sandi">
                    <a href="">Lupa kata sandi?</a>
                </div>
                <input type="button" onclick="login()" class="kotak-login" value="Login">
                <p class="text">Atau masuk dengan email Google anda</p>
                <a href="<?php echo site_url('google_login/authenticate'); ?>" class="kotak-google">
                    <img class="img-google" src="<?=base_Url();?>img/google.png" alt="">
                    <p>Login dengan Google</p>
                </a>
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
            </form>
        </div>
    </div>
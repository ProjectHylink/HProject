<?php if ($this->session->userdata('Login')): ?>
    <h1>Hello, <?= $this->session->userdata('nama_pengguna'); ?></h1>
    <a href="<?= site_url('Login/Logout'); ?>" class="btn btn-info">Logout</a>

<?php elseif ($this->session->userdata('access_token')): ?>
    <h1>Hello's, <?= $this->session->userdata('nama_pengguna'); ?></h1>
    <a href="<?= site_url('google_login/Logout?Logout=true'); ?>" class="btn btn-info">Keluar</a>

<?php elseif ($this->session->userdata('access_token')): ?>
    <h1>Hello'w, <?= $this->session->userdata('nama_pengguna'); ?></h1>
    <a href="<?= site_url('google_register/Logout?logout=true'); ?>" class="btn btn-info">Log Out</a>

<?php else: ?>
    <h1>Hello, Guest</h1>
    <!-- Tampilkan formulir login biasa di sini -->
<?php endif; ?>

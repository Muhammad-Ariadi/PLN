<?php
include 'header.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];

    // Perolehan nama lengkap dari database (sesuaikan dengan struktur database Anda)
    $query = $db->query("SELECT nama_lengkap FROM tbl_akun WHERE username='$username'");
    $data = $query->fetch_assoc();
    $nama_lengkap = $data['nama_lengkap'];

    // Tampilkan pesan selamat datang sesuai dengan peran pengguna
    if ($level == 'Admin') {
        $welcome_message = "SELAMAT DATANG ADMIN $nama_lengkap";
    } elseif ($level == 'petlap') {
        $welcome_message = "SELAMAT DATANG PETUGAS LAPANGAN $nama_lengkap";
    } else {
        $welcome_message = "SELAMAT DATANG";
    }
} else {
    // Jika pengguna belum login, redirect ke halaman login
    header("location: ../index.php");
    exit();
}
?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <h4>DASHBOARD</h4>
        </ol>
    </div>
    <div class="panel-container">
        <div class="bootstrap-tabel">
            <center>
                <h3><?php echo $welcome_message; ?></h3>
            </center>
        </div>

    </div>
</div>
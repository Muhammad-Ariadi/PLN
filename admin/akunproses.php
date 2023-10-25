<?php
include 'header.php';
if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 'prosestambah') {
        $kd_akun = $_POST['kd_akun'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $hasil = $db->query("INSERT into tbl_akun (kd_akun,nama_lengkap,username,password,level) values
        ('$kd_akun','$nama_lengkap','$username','$password','$level')");
        header("location:akuninput.php");
    } elseif ($_GET['proses'] == 'ubah') {
        $kd_akun = $_POST['kd_akun'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $hasil = $db->query("UPDATE tbl_akun set nama_lengkap='$nama_lengkap', username='$username',password='$password',level='$level' where kd_akun='$kd_akun'");
        header("location:akuninput.php");
    } elseif ($_GET['proses'] == 'proseshapus') {
        $kd_akun = $_GET['kode'];
        $hasil = $db->query("DELETE FROM tbl_akun WHERE kd_akun='$kd_akun'");
        header("location:akuninput.php");
    }
}

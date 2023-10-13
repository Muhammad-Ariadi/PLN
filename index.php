<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'login') {
        session_start();
        include 'assets/conn/config.php';
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hasil = $db->query("SELECT * FROM tbl_akun WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($hasil);

        if ($cek > 0) {
            $data = $hasil->fetch_assoc();
            $_SESSION['kd_akun_user'] = $data['kd_akun']; // Simpan kd_akun di sesi
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $data['level'];

            if ($data['level'] == 'Admin') {
                header("location:admin/index.php");
            } elseif ($data['level'] == 'petlap') {
                header("location:petlap/index.php");
            } else {
                header("location:index.php?pesan=gagal");
            }
        } else {
            header("location:index.php?pesan=gagal");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPLN</title>
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/cosmo.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background-color: skyblue;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .container h3 {
            text-align: center;
        }

        .form-group {
            margin-top: 15px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['aksi']) && $_GET['aksi'] == 'login') {
        echo "<div class='alert alert-danger text-center' role='alert'>Login anda gagal username dan password salah</div>";
    }
    ?>
    <div class="container">
        <center>
            <img style="width: 100px; display: inline-block; vertical-align: middle;" src="img/Logo_PLN.png" alt="Logo">
        </center>
        <form action="index.php?aksi=login" method="post" enctype="multipart/form-data">
            <br>
            <div style="text-align:center;">
                <p>Sistem Informasi Berbasis Website</p>
                <p style="font-size: 12px;">Login ke Akun Anda</p>
            </div>
            <br>
            <div class="input-group">
                <input type="text" name="username" class="form-control" placeholder="Username" autofocus autocomplete="off">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            </div>
            <br>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="LOGIN" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'login') {
        session_start();
        include 'assets/conn/config.php';
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hasil = $db->query("SELECT * from tbl_akun where username='$username' AND password='$password'");
        $cek = mysqli_num_rows($hasil);
        if ($hasil > 0) {
            $data = $hasil->fetch_assoc();
            if ($data['level'] == 'Admin') {
                $_SESSION['username'] = $username;
                $_SESSION['level'] = 'Admin';
                header("location:admin/index.php");
            } elseif($data['level'] == 'petlap') {
                $_SESSION['username'] = $username;
                $_SESSION['level'] = 'petlap';
                header("location:petlap/index.php");
            }else {
                header("location:index.php?pesan=gagal");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Sederhana</title>
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/cosmo.min.css">
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
        <form action="index.php?aksi=login" method="post" enctype="multipart/form-data">
            <h3>LOGIN SISTEM</h3>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group text-center">
                <input type="submit" value="LOGIN" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>
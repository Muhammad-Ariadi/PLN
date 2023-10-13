<?php
session_start();
include '../assets/conn/cek.php';
include '../assets/conn/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIPLN</title>

    <!-- Menggunakan Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/cosmo.min.css">
    <link rel="stylesheet" href="../assets/css/css_final.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .navbar-brand {
            margin: 0 auto;
            display: block;
            text-align: center;
        }

        @media (max-width: 576px) {
            .navbar-brand {
                margin-right: auto;
                text-align: left;
            }
        }
    </style>
</head>

<body onload="getLocation()">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <img style="width: 30px; display: inline-block; vertical-align: middle;" src="../img/Logo_PLN.png" alt="Logo">
            <a class="navbar-brand" href="#">SIPLN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pelangganinput.php">DATA PELANGGAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="akuninput.php">DATA HAK AKSES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Isi konten halaman di sini -->

    <!-- Menggunakan Bootstrap JS (jQuery, Popper.js, dan Bootstrap JS) dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
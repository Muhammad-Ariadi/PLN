<?php
include 'header.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') {
?>

        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <h4>DATA AKUN/ TAMBAH DATA</h4>
                </ol>
            </div>

            <?php

            $carikode = $db->query("SELECT max(kd_akun) FROM tbl_akun");
            while ($datakode = mysqli_fetch_array($carikode, MYSQLI_BOTH)) {
                if ($datakode) {
                    $nilaikode = substr($datakode[0], 1);
                    $kode = (int) $nilaikode;
                    $kode = $kode + 1;
                    $kode_otomatis = "A" . str_pad($kode, 2, "0", STR_PAD_LEFT);
                } else {
                    $kode_otomatis = "A01";
                }
            }


            ?>

            <div class="panel-container">
                <div class="bootstrap-tabel">
                    <form action="akunproses.php?proses=prosestambah" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Kode Akun</label>
                            <input type="lock" name="kd_akun" readonly class="form-control" value="<?php echo $kode_otomatis ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="" placeholder="nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" value="" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="level" id="" class="form-control" required>
                                <option value="">-</option>
                                <option value="0" <?php if ($_SESSION['level'] == 0) echo 'selected'; ?>>Admin</option>
                                <option value="1" <?php if ($_SESSION['level'] == 1) echo 'selected'; ?>>Petugas Lapangan</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <a href="akuninput.php" class="btn btn-primary">Kembali</a>
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php } elseif ($_GET['aksi'] == 'ubah') { ?>
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <h4>AKUN/ UBAH</h4>
                </ol>
            </div>

            <div class="panel-container">
                <div class="bootstrap-tabel">
                    <?php
                    $data = $db->query("SELECT * From tbl_akun where kd_akun='$_GET[kode]'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>

                        <form action="akunproses.php?proses=ubah" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="">Kode Akun</label>
                                <input type="text" name="kd_akun" class="form-control" readonly value="<?php echo $d['kd_akun'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $d['nama_lengkap'] ?>" placeholder="nama lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $d['username'] ?>" placeholder="username" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $d['password'] ?>" placeholder="password">
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="level" id="" class="form-control" value="<?php echo $d['level'] ?>" required>
                                    <option value="<?php echo $d['level'] ?>"><?php echo $d['level'] ?></option>
                                    <option value="0" <?php if ($_SESSION['level'] == 0) echo 'selected'; ?>>Admin</option>
                                    <option value="1" <?php if ($_SESSION['level'] == 1) echo 'selected'; ?>>Petugas Lapangan</option>
                                </select>
                            </div>
                </div>

                <div class="modal-footer">
                    <a href="akuninput.php" class="btn btn-primary">Kembali</a>
                    <input type="submit" class="btn btn-success" value="Ubah">
                </div>

                </form>
            <?php } ?>
            </div>
        </div>
        </div>
<?php
    }
}
?>
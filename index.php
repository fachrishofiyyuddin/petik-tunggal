<?php
include "koneksi/index.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>petik tunggal gagal menyimpan ke dalam database</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- sweetalert CDN -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h2>Cara Efektif Menyimpan Data Bertanda Petik Tunggal ke dalam Database MySQLi</h2>
        <hr>
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nama">Nama Lengkap:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" placeholder="Enter Nama Lengkap" name="nama">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nim">No. Induk Mahasiswa:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" placeholder="Enter NIM" name="nim">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="BtnSimpan" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
        <hr>
        <h3>Solusi:</h3>
        <ol>
            <li><a href="addslashes.php">addslashes</a></li>
            <li><a href="mysqli_real_ecape_string.php">mysqli_real_escape_string</a></li>
            <li><a href="mysqli_prepare.php">prepared statements</a> <i>(rekomendasi)</i></li>
        </ol>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Perintah</th>
                    <th>Cara Kerja</th>
                    <th>Cara <i>echo</i></th>
                    <th>Opini</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $perintah_query_select = mysqli_query($koneksi, "select * from mahasiswa order by id desc");
                while ($data = mysqli_fetch_array($perintah_query_select)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= stripslashes($data['nama']) ?></td>
                        <td><?= $data['nim'] ?></td>
                        <td><i><?= $data['perintah'] ?></i></td>
                        <td><?= $data['cara_kerja'] ?></td>
                        <td><i><?= $data['tipsecho'] ?></i></td>
                        <td>
                            <i>
                                <span class="label <?php if ($data['status'] == "kurang-baik") {
                                                        echo "label-danger";
                                                    } else {
                                                        echo "label-primary";
                                                    } ?>"><?= $data['status'] ?>
                                </span>
                            </i>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>

<?php
if (isset($_POST['BtnSimpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $cara_kerja = "-";

    if ($nama == "" || $nim == "") {
        echo '<script>swal("Inputan tidak boleh kosong", "You clicked the button!", "error")</script>';
        return;
    }

    $perintah_query_simpan = mysqli_query($koneksi, "insert into mahasiswa (nama,nim,cara_kerja) values ('$nama','$nim','$cara_kerja')");

    if ($perintah_query_simpan) {
        echo '<script>
                swal({
                    title: "Data berhasil disimpan",
                    text: "You clicked the button!",
                    icon: "success",
                    button: "OK"
                }).then(function() {
                     window.location.href = "' . $url . '";
                });
            </script>';
    } else {
        echo '<script>
                swal({
                    title: "Data gagal disimpan",
                    text: "You clicked the button!",
                    icon: "error",
                    button: "OK"
                }).then(function() {
                     window.location.href = "' . $url . '";
                });
            </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Hasil Perhitungan Nilai</title>
    <style>
        #par {
            text-align: center;
        }

        .body {
            text-align: center;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    $nama = $_POST['nama'];
    $nim  = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $semester = $_POST['semester'];
    $matkul = $_POST['matkul'];
    $tugas1 = $_POST['tugas1'];
    $tugas2 = $_POST['tugas2'];
    $tugas3 = $_POST['tugas3'];
    $tugas4 = $_POST['tugas4'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    ?>

    <div id="par" class="card p-3 text-center col-sm-6-center">
        <div class="card-header">
            <?php $hello = "Selamat Datang Kawan" ?>
            <?= strtoupper(str_replace("Kawan", $nama, $hello)) ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Biodata : </h5>
            <p class="card-text">
                <table style="text-align: justify;" cellpadding="3">

                    <tr>
                        <td> <?= "Nama : " ?><br></td>
                        <td> <?= $nama ?><br></td>
                    </tr>
                    <tr>
                        <td> <?= "NIM : " ?><br></td>
                        <td> <?= $nim ?><br></td>
                    </tr>
                    <tr>
                        <td> <?= "Kelas : " ?><br></td>
                        <td> <?= $kelas ?><br></td>
                    </tr>
                    <tr>
                        <td> <?= "Semester : " ?><br></td>
                        <td> <?= $semester ?><br></td>
                    </tr>

                    <tr>
                        <td> <?= "Mata Kuliah : " ?><br></td>
                        <td> <?= $matkul ?><br></td>
                    </tr>
                </table>

            </p>
            <!-- <a href="#" class="btn btn-primary"></a> -->
        </div>
        <div class="card-footer text-muted">
            Perolehan :
            <br>
            <table border="2" width="800" class="center">
                <br>
                <tr>
                    <?php for ($i = 1; $i < 5; $i++) { ?>
                        <td><?= "Tugas " . $i ?></td>
                    <?php } ?>
                    <td>UTS</td>
                    <td>UAS</td>
                    <td>IP Semester <?= $semester ?></td>
                    <td>Huruf</td>
                </tr>
                <tr>
                    <td><?= $tugas1 ?></td>
                    <td><?= $tugas2 ?></td>
                    <td><?= $tugas3 ?></td>
                    <td><?= $tugas4 ?></td>
                    <td><?= $uts ?></td>
                    <td><?= $uas ?></td>
                    <?php
                    $totaltugas = (($tugas1 + $tugas2 + $tugas3 + $tugas4) / 4) * (20 / 100);
                    $persentase = ((($tugas1 + $tugas2 + $tugas3 + $tugas4) / 4) / 5) + ((($uts + $uas) / 2) - 20);
                    if ($uts != 0 || $uas != 0) {
                        $totalujian = ($uts * (40 / 100)) + ($uas * (40 / 100));
                        $totalnilai = $totaltugas + $totalujian;
                        $ip = $totalnilai * (4 / 100);
                    }
                    ?>
                    <td><?= $ip ?></td>

                    <?php
                    echo $persentase . "%";
                    echo "<br>";
                    function lulus($isi)
                    {
                    ?>
                        <button type="button" class="btn btn-success">Anda Tidak Mengulang Mata Kuliah <?= $isi ?> </button>

                    <?php }
                    function ngulang($isi)
                    {
                    ?>
                        <button type="button" class="btn btn-danger">Anda Mengulang Mata Kuliah <?= $isi ?> </button>
                        <br>
                    <?php }
                    if ($ip <= 4.000 && $ip > 3.700) {
                        $huruf = "A";
                        lulus($matkul);
                    } elseif ($ip <= 3.700 && $ip > 3.300) {
                        $huruf = "A-";
                        lulus($matkul);
                    } elseif ($ip <= 3.300 && $ip > 3.000) {
                        $huruf = "B+";
                        lulus($matkul);
                    } elseif ($ip <= 3.000 && $ip > 2.700) {
                        $huruf = "B";
                        lulus($matkul);
                    } else {
                        $huruf = "-";
                        ngulang($matkul);
                    }
                    ?>
                    <br>
                    <td><?= $huruf ?></td>
                </tr>
            </table>
            <br>
            <?php
            if ($uts == 0) {
                $hariuts = date_create('2020-10-31');
                $ini = date_create();
                $diff = date_diff($hariuts, $ini);
            ?>
                <button type="button" class="btn btn-warning"><?= 'Ikuti Ujian Susulan UTS 30 Oktober 2020 ( ' . $diff->days . ' Hari Lagi )'; ?></button>
            <?php

            } elseif ($uas == 0) {
                $hariuas = date_create('2020-11-5');
                $now = date_create();
                $diff;
                $diff = date_diff($hariuts, $now);
            ?>
                <button type="button" class="btn btn-warning"><?= 'Ikuti Ujian Susulan UAS 5 November 2020  ( ' . $diff->days . ' Hari Lagi )'; ?></button>
            <?php
            }
            ?>
        </div>
    </div>
    <a href="submit.php" target="_BLANK">
            <script>
                window.print();
            </script>
        </a>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Jangan Lupa Liburan ! <br></strong>
        <?php
        $hariini = date("F j, Y");
        echo "Today : $hariini";

        $libur = date_create('2020-12-31');
        echo "<br> Weekend : December 30, 2020";
        $today = date_create();
        $diff = date_diff($libur, $today);
        echo '<br> D - ' . $diff->days . ' To Weekend';
        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Semangat !</h4>
        <p>Gagal Merencanakan adalah Merencanakan Kegagalan</p>
        <hr>
        <p class="mb-0">Wulan</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

</body>

</html>
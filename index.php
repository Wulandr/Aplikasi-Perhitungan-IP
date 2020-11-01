<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Aplikasi Perhitungan Nilai Mahasiswa</title>
    <style>
        #word {
            color: rgb(35, 93, 97);
            text-align: center;
        }
        #form {
            margin-left: 50px;
        }
        #button {
            background-color: black;
            color: white;
            padding: 14px 20px;
            cursor: pointer;
            width: auto;
            border: none;
            border-radius: 20px;
            margin-left: 300px;
        }
    </style>

</head>

<body>
    <?php
    include("menu.php");
    $kelas = ["A", "B", "C", "D"];
    $matkul1["01AP"] = "Algoritma";
    $matkul1["01MK"] = "Mikrokontroller 1";
    $matkul1["01SO"] = "Sistem Operasi";
    $matkul1["01PTI"] = "Pengantar TI";
    $matkul1["03PW"] = "Pemrogaman Web";
    $matkul1["03JK"] = "Jaringan Komputer";
    $matkul1["03MD"] = "Manajemen Dasar";
    $matkul1["03MM"] = "Multimedia";
    $matkul1["05SKD"] = "Sistem Keamanan Data";
    $matkul1["05OS"] = "Open Source";

    $semester = [1, 3, 5];
    ?>
    <br>
    <form id="form" method="POST" action="submit.php">
        <h2 id="word">Aplikasi Perhitungan Nilai Mahasiswa</h2>
        <br><br>
        <!-- Nama : <input type="text" name="nama" placeholder="Nama Mahasiswa :"></br> -->
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nama">
            </div>
        </div>
        <!-- NIM : <input type="text" name="nim" placeholder="NIM Mahasiswa :"></br> -->
        <div class="form-group row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nim">
            </div>
        </div>

        <div class="form-group row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <select name="kelas" class="form-control col-sm-1">
                <option selected>Choose...</option>
                <?php foreach ($kelas as $kelas) { ?>
                    <option><?= $kelas ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group row">
            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
            <select name="semester" class="form-control col-sm-1">
                <option selected>Choose...</option>
                <?php foreach ($semester as $semester) { ?>
                    <option><?= $semester ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group row">
            <label for="matkul" class="col-sm-2 col-form-label">Mata Kuliah</label>
            <select name="matkul" class="form-control col-sm-1">
                <option selected>Choose...</option>
                <?php
                foreach ($matkul1 as $matkul1) { ?>
                    <option><?= $matkul1 ?></option>
                <?php } ?>
            </select>
        </div>

        <?php for ($i = 1; $i < 5; $i++) { ?>
            <div class="form-group row" method="POST" action="submit.php">
                <label for="tugas<?= $i ?>" class="col-sm-2 col-form-label">Tugas <?= $i ?> </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="tugas<?= $i ?>">
                </div>
            </div>
        <?php } ?>

        <div class="form-group row" method="POST" action="submit.php">
            <label for="uts" class="col-sm-2 col-form-label" >UTS</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="uts" placeholder="Isi 0 jika belum">
            </div>
        </div>
        <div class="form-group row" method="POST" action="submit.php">
            <label for="uas" class="col-sm-2 col-form-label" >UAS</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="uas" placeholder="Isi 0 jika belum">
            </div>
        </div>
        <br>
        <input id="button" type="submit" value="SUBMIT">
    </form>

</body>

</html>
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TUGAS 2 - Aplikasi Akademik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="mahasiswa.php">TUGAS 2 - Aplikasi Akademik</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="mahasiswa.php">Data Mahasiswa <span class="sr-only">(current)</span></a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="makul.php">Data Mata Kuliah <span class="sr-only">(current)</span></a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="nilai.php">Data Nilai <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <h2>Data Mahasiswa</h2>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">NIM</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Kode Prodi</th>
                        <th scope="col" class="text-center">Mata Kuliah</th>
                        <th scope="col" class="text-center">SKS</th>
                        <th scope="col" class="text-center">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = "SELECT m.nim,m.nama,m.prodi,k.nmmk,k.sks,n.nilai FROM mahasiswa as m, matakuliah as k, nilai as n WHERE m.prodi=k.prodi AND k.kdmk = n.kdmk";
                    $hasil = mysqli_query($koneksi, $q);

                    foreach ($hasil as $data) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $no++; ?></th>
                        <td class="text-center"><?= $data['nim']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td class="text-center"><?= $data['prodi']; ?></td>
                        <td><?= $data['nmmk']; ?></td>
                        <td class="text-center"><?= $data['sks']; ?></td>
                        <td class="text-center"><?= $data['nilai']; ?></td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
        </div>

    </div>






    <script src="js/jquery.js"></script>
    <script src=" js/bootstrap.js"></script>
</body>


</html> 
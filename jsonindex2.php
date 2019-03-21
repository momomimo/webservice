<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TUGAS 3 - JSON INDEX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="jsonindex.php">TUGAS 3 - JSON</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="jsonindex.php">Tabel Login <span class="sr-only">(current)</span></a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="jsonindex2.php">Tabel Keluarga <span class="sr-only">(current)</span></a>
            </div>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="jsonindex3.php">Tabel Penduduk <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <h3>Menampilan Data Mysql</h3>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">KK</th>
                        <th scope="col">Nama Kepala Keluarga</th>
                        <th scope="col">NIK</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $q = "SELECT k.id,k.no_kk,p.nama,p.nik FROM tb_keluarga as k,tb_penduduk as p WHERE p.id_kk = k.nik_kepala";
                    $hasil = mysqli_query($koneksi, $q);

                    foreach ($hasil as $data) { ?>
                    <tr>
                        <th scope="row"><?= $data['id']; ?></th>
                        <td><?= $data['no_kk']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nik']; ?></td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <h3>Menampilkan Data Mysql Menggunakan JSON :</h3>
            <?php

            $q = "SELECT k.id,k.no_kk,p.nama,p.nik FROM tb_keluarga as k,tb_penduduk as p WHERE p.id_kk = k.nik_kepala";
            $hasil = mysqli_query($koneksi, $q);

            if (mysqli_num_rows($hasil) > 0) {
                $data = array();
                $data['json'] = array();
                while ($x = mysqli_fetch_array($hasil)) {
                    $d['id'] = $x["id"];
                    $d['no_kk'] = $x["no_kk"];
                    $d['nama'] = $x["nama"];
                    $d['nik'] = $x["nik"];
                    array_push($data['json'], $d);
                }
                echo json_encode($data);
            } else {
                $data["pesan"] = "tidak ada data";
                echo json_encode($data);
            }
            ?>
        </div>

    </div>






    <script src="js/jquery.js"></script>
    <script src=" js/bootstrap.js"></script>
</body>


</html> 
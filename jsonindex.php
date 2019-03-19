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
        <a class="navbar-brand" href="#">TUGAS 3 - JSON</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">HOME <span class="sr-only">(current)</span></a>
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
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $q = "SELECT * FROM tb_user";
                    $hasil = mysqli_query($koneksi, $q);

                    foreach ($hasil as $data) { ?>
                    <tr>
                        <th scope="row"><?= $data['id_user']; ?></th>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nik']; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td><?= $data['password']; ?></td>
                        <td><?= $data['no_telepon']; ?></td>
                        <td><?= $data['role']; ?></td>
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

            $q = "SELECT * FROM tb_user";
            $hasil = mysqli_query($koneksi, $q);

            if (mysqli_num_rows($hasil) > 0) {
                $data = array();
                $data['json'] = array();
                while ($x = mysqli_fetch_array($hasil)) {
                    $d['id_user'] = $x["id_user"];
                    $d['nik'] = $x["nik"];
                    $d['nama'] = $x["nama"];
                    $d['nama_user'] = $x["nama_user"];
                    $d['password'] = $x["password"];
                    $d['role'] = $x["role"];
                    $d['no_telepon'] = $x["no_telepon"];
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
    </ body>


</html> 
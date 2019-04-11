<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tugas 5 - Rest-Client Framework CI</title>
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/fontawesome/all.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/my.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatable/'); ?>/datatabel/assets/css/datatables.css" />
	<script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
	<script src="<?= base_url('assets/'); ?>js/jquery.js"></script>
	<script src="<?= base_url('assets/'); ?>js/bootstrap.js"></script>
	<script src="<?= base_url('assets/'); ?>js/my.js"></script>
	<script src="<?= base_url('assets/'); ?>js/fontawesome/all.js"></script>
	<script src="<?php echo base_url('assets/datatable/'); ?>/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url('assets/datatable/'); ?>/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="<?php echo base_url('assets/datatable/'); ?>/datatabel/assets/js/datatables.js"></script>
</head>

<body>

	<div class="page-wrapper chiller-theme toggled">
		<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
			<i class="fas fa-bars"></i>
		</a>
		<nav id="sidebar" class="sidebar-wrapper">
			<div class="sidebar-content">
				<div class="sidebar-brand">
					<a href="#"><?= $namaapp; ?></a>
					<div id="close-sidebar">
						<i class="fas fa-times"></i>
					</div>
				</div>
				<div class="sidebar-header">
					<div class="user-pic">
						<img class="img-responsive img-rounded" src="<?= base_url('assets');?>/img/momo.jpg" alt="User picture">
					</div>
					<div class="user-info">
						<span class="user-name">
							<strong><?= $pengguna; ?></strong>
						</span>
						<span class="user-role"><?= $nim; ?></span>
					</div>
				</div>
				<div class="sidebar-menu">
					<ul>
						<li class="header-menu">
							<span>NAVIGATION</span>
						</li>
						<li class="sidebar-dropdown">
							<a href="#">
								<i class="fa fa-laptop"></i>
								<span>Master Data</span>
							</a>
							<div class="sidebar-submenu">
								<ul>
									<li>
										<a href="#">Karyawan</a>
									</li>
									<li>
										<a href="#">Transaksi</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<main class="page-content">
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://localhost/arsitektur-ci/rest-server/">Rest-Server</a></li>
						<li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $subjudul; ?></li>
					</ol>
				</nav>
				<h2><?= $subjudul; ?></h2>
				<p>Untuk Rest-Client saya menggunakan Plugin <a href="http://docs.guzzlephp.org/en/stable/overview.html" target="_blank">GuzzleHttp</a> untuk mempermudah proses GET, PUT, DELETE, POST. <br>
					Maaf Pak, Sepertinya untuk fungsi PUT/Edit dan DELETE/Hapus tidak ijinkan oleh pihak 000webhostapp, karena bukan Member berbayar.
				</p>
				<hr>
				<div class="float-right">
           			 
        		</div>
				<div class="row">
					<div class="col-md-8">
						<div class="btn-group" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tambah" data-whatever="@mdo">
								<i class="fa fa-plus"></i> Tambah Data
							</button>
						</div>
					</div>
					<div class="col-md-4 float-right">
						<?= $this->session->flashdata('pesan'); ?>
					</div>
				</div>
				<br>
				<div class="row table-responsive">
					<table id="tabeldata" class="table table-hover table-bordered">
						<thead>
							<tr>
								<th scope="col" class="text-center">No</th>
								<th scope="col" class="text-center">Kode Karyawan</th>
								<th scope="col" class="text-center">Nama Depan</th>
								<th scope="col" class="text-center">Nama Belakang</th>
								<th scope="col" class="text-center">Jenis Kelamin</th>
								<th scope="col" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$q = "";
								foreach ($karyawan as $data) { 
									?>
									<tr>
										<th scope="row" class="text-center"><?= $no++; ?></th>
										<th scope="row" class="text-center"><?= $data['kode_karyawan']; ?></th>
										<td class="text-center"><?= $data['nama_depan']; ?></td>
										<td class="text-center"><?= $data['nama_belakang']; ?></td>
										<td class="text-center"><?= $data['jenis_kelamin']; ?></td>
										<td class="text-center">
											<button type="button" class="btn btn-warning" title="Edit" data-toggle="modal" data-target="#modaledit<?php echo $data['kode_karyawan'];?>"><i class="fa fa-edit"></i></button>
											<button type="button" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#modalhapus<?php echo $data['kode_karyawan'];?>"><i class="fa fa-times"></i></button>
										</td>
									</tr>
									<?php }?>
						</tbody>
					</table>
				</div>
			</div>

		</main>
	</div>
	<!-- Modal Tambah Data -->
	<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambah">Tambah Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url();?>karyawan/inputkaryawan" method="POST">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Kode Karyawan:</label>
							<input type="text" class="form-control" name="id">
							<input type="hidden" class="form-control" name="kc" value="CABANG-039">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Nama Depan:</label>
							<input type="text" class="form-control" name="nd">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Nama Belakang:</label>
							<input type="text" class="form-control" name="nb">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Jenis Kelamin:</label>
							<select class="form-control" name="jk">
								<option value="W">Wanita</option>
								<option value="P">Pria</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Edit -->
	<?php 
	$no = 1;
	foreach ($karyawan as $data):
            $id=$data['kode_karyawan'];
            $nd=$data['nama_depan'];
            $nb=$data['nama_belakang'];
            $jk=$data['jenis_kelamin'];
        ?>
	<div id="modaledit<?php echo $data['kode_karyawan'];?>" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambah">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form action="<?= base_url();?>karyawan/edit" method="POST">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Kode Karyawan:</label>
							<input type="text" readonly class="form-control" name="id" value="<?php echo $id;?>">
							<input type="hidden" class="form-control" name="kc" value="CABANG-039">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Nama Depan:</label>
							<input type="text" class="form-control" name="nd" value="<?php echo $nd;?>">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Nama Belakang:</label>
							<input type="text" class="form-control" name="nb" value="<?php echo $nb;?>">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Jenis Kelamin:</label>
							<select class="form-control" name="jk">
								<option value="W">Wanita</option>
								<option value="P">Pria</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php endforeach;?>
	<!-- Modal Tambah Hapus -->
	<?php 
	$no = 1;
	foreach ($karyawan as $data):
			$id=$data['kode_karyawan'];
			$nd=$data['nama_depan'];
        ?>
	<div id="modalhapus<?php echo $data['kode_karyawan'];?>" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambah">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
				<h3 class="text-center">Apakah Anda yakin ingin menghapus data ini?</h3>
				<h4 class="text-center text-danger"><?php echo $nd;?></h4>
					<form action="<?= base_url();?>karyawan/hapus" method="POST">
				</div>
				<div class="modal-footer">
					<input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php endforeach;?>
	<script>
        $(document).ready(function() {
            $('#tabeldata').DataTable();
        });
    </script>
</body>

</html>

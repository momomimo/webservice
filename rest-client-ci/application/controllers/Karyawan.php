<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('karyawan_m', 'karyawan');
	}
	public function index()
	{
		$d['namaapp'] = " REST Client";
		$d['tugas'] = "Tugas 4 -";
		$d['pengguna'] = "SUTRIMO";
		$d['nim'] = "16.01.53.0183";
		$d['judul'] = "Master Data";
		$d['subjudul'] = "Karyawan";
		$d['karyawan'] = $this->karyawan->ambilkaryawan();
		$this->load->view('Home', $d);
	}

	public function inputkaryawan()
	{
		$data = [
			'kc' => $this->input->post('kc', true),
			'id' => $this->input->post('id', true),
			'nd' => $this->input->post('nd', true),
			'nb' => $this->input->post('nb', true),
			'jk' => $this->input->post('jk', true)
		];
		if ($this->karyawan->tambahkaryawan($data) > 0) {
			$this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-check-circle"></i> Success</h4> Settings <a href="javascript:void(0)" class="alert-link">Data Berhasil Ditambahkan</a>!
        </div>');
            redirect('Karyawan');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-times-circle"></i> Error</h4> Oh no! Update <a href="javascript:void(0)" class="alert-link">Data Gagal ditambahkan</a>!
        </div>');
            redirect('Karyawan');
		}
	}
	public function edit()
	{
		$data = [
			'kc' => $this->input->post('kc', true),
			'id' => $this->input->post('id', true),
			'nd' => $this->input->post('nd', true),
			'nb' => $this->input->post('nb', true),
			'jk' => $this->input->post('jk', true)
		];
		if ($this->karyawan->editkaryawan($data) > 0) {
			$this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-check-circle"></i> Success</h4> Settings <a href="javascript:void(0)" class="alert-link">Data Berhasil dirubah</a>!
        </div>');
            redirect('Karyawan');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-times-circle"></i> Error</h4> Oh no! Update <a href="javascript:void(0)" class="alert-link">Data Gagal dirubah</a>!
        </div>');
            redirect('Karyawan');
		}
	}
	public function hapus()
	{
		$data = [
			'id' => $this->input->post('id', true)
		];
		if ($this->karyawan->hapuskaryawan($data) > 0) {
			$this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-check-circle"></i> Success</h4> Settings <a href="javascript:void(0)" class="alert-link">Data Berhasil dihapus</a>!
        </div>');
            redirect('Karyawan');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-times-circle"></i> Error</h4> Oh no! Update <a href="javascript:void(0)" class="alert-link">Data Gagal dihapus</a>!
        </div>');
            redirect('Karyawan');
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('pembayaran_model');

		if ($this->session->userdata('aktif') != TRUE) {
			$this->session->set_flashdata('message', 'Harap login untuk melanjutkan');
			redirect('login');
		}
		
		if ($this->session->userdata('jabatan') != 'Administrator') {
			redirect('home');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Data Pembayaran',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-money',
			'pembayaran' => $this->pembayaran_model->tampil_data()
		];

		$this->template->load('template', 'admin/pembayaran', $data);
	}

	public function lihat($id_pembayaran)
	{
		$data = [
			'title' => 'Data Pembayaran',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-money',
			'pembayaran' => $this->pembayaran_model->lihat_data($id_pembayaran)
		];

		$this->template->load('template', 'admin/pembayaran_lihat', $data);
	}

	public function proses()
	{
		$formSubmit = $this->input->post('submitform');

		if ($formSubmit == 'terima') {
			$tgl = date(DATE_ATOM);
			$data = [
				'status' => 'Diterima',
				'tgl_update' => $tgl
			];
			$this->db->where('id_pembayaran', $this->input->post('id_pembayaran'));
			$this->db->update('pembayaran',$data);

			$data1 = [
				'status' => 'Aktif'
			]; 

			$this->db->where('id_peserta', $this->input->post('id_peserta'));
			$this->db->update('siswa', $data1);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil diubah</div>');
			redirect('pembayaran');

		}else{

			$cek = $this->pembayaran_model->cekdata($this->input->post('id_peserta'));

			if ($cek->jumlah == '2') {
				$data = [
					'status' => 'Ditolak',
				];
				$this->db->where('id_peserta', $this->input->post('id_peserta'));
				$this->db->update('siswa',$data);
			}

			$tgl = date(DATE_ATOM);
			$data = [
				'status' => 'Ditolak',
				'tgl_update' => $tgl
			];
			$this->db->where('id_pembayaran', $this->input->post('id_pembayaran'));
			$this->db->update('pembayaran',$data);

			$this->db->where('id_peserta', $this->input->post('id_peserta'));
			$this->db->delete('bayar');

			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil diubah</div>');
			redirect('pembayaran');
		}

	}

	public function hapus()
	{
		$lama = 30;
		$this->pembayaran_model->hapus_data($lama);
		$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil dihapus.</div>');
		redirect('pembayaran');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('rekening_model');

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
			'title' => 'Data Rekening',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-dollar',
			'rekening' => $this->rekening_model->tampil_data()->result()
		];

		$this->template->load('template', 'admin/rekening', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('no_rek' , 'Nomor Rekening' , 'trim|numeric|is_unique[rekening.no_rek]',
			['numeric' => '<div class= col-md-12><div class="alert alert-danger alert-dismissible fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Pemberitahuan!</h4>
			Hanya gunakan angka.
			</div> </div>','is_unique' => '<div class= col-md-12><div class="alert alert-danger alert-dismissible fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Pemberitahuan!</h4>
			Nomor Rekening sudah terdaftar.
			</div> </div>']
		);

		if($this->form_validation->run()== FALSE) {
			$this->index();
		}else {
			$data = [
				'nm_bank' => htmlspecialchars($this->input->post('nama', true)),
				'kode_bank' => htmlspecialchars($this->input->post('kode', true)),
				'pemilik' => htmlspecialchars($this->input->post('pemilik', true)),
				'no_rek' => htmlspecialchars($this->input->post('no_rek', true)),
			];
			$this->db->insert('rekening',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil ditambahkan</div>');
			redirect('rekening');
		}
	}

	public function hapus($id_rekening)
	{

		if ($this->rekening_model->hapus_data($id_rekening)==true) {
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil dihapus.</div>');

		}
		redirect('rekening');
	}

	public function edit($id_rekening = null)
	{
		$where = array('id_rekening' => $id_rekening);
		$data = [
			'title' => 'Edit rekening',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-dollar',
			'rekening' => $this->rekening_model->edit_data($where, 'rekening')->result()
		];

		$this->template->load('template', 'admin/rekening_edit', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('no_rek' , 'Nomor Rekening' , 'trim|numeric',
			['numeric' => '<div class= col-md-12><div class="alert alert-danger alert-dismissible fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Pemberitahuan!</h4>
			Hanya gunakan angka.
			</div> </div>']
		);

		if($this->form_validation->run()== FALSE) {
			$this->index();
		}else {
			$data = [
				'nm_bank' => htmlspecialchars($this->input->post('nama', true)),
				'kode_bank' => htmlspecialchars($this->input->post('kode', true)),
				'pemilik' => htmlspecialchars($this->input->post('pemilik', true)),
				'no_rek' => htmlspecialchars($this->input->post('no_rek', true)),
			];
			$this->db->where('id_rekening', $this->input->post('id_rekening'));
			$this->db->update('rekening',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil diubah</div>');
			redirect('rekening');
		}	
	}
}
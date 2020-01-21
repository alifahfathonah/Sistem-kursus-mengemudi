<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');

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
			'title' => 'Data Siswa',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-users',
			'siswa' => $this->siswa_model->tampil_data()->result()
		];
		$this->template->load('template', 'admin/siswa', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('username' , 'Username' , 'trim|alpha_numeric|is_unique[siswa.username]',
			['alpha_numeric' => '<div class= col-md-12><div class="alert alert-danger alert-dismissible fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Pemberitahuan!</h4>
			Username hanya menggunakan huruf dan angka.
			</div> </div>','is_unique' => '<div class= col-md-12><div class="alert alert-danger alert-dismissible fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Pemberitahuan!</h4>
			Username sudah digunakan.
			</div> </div>']
		);

		if($this->form_validation->run()== FALSE) {
			$this->index();
		}else {
			$data = [
				'nm_peserta' => htmlspecialchars($this->input->post('nama', true)),
				'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => md5($this->input->post('tgl_lahir', PASSWORD_DEFAULT)),
				'status' => htmlspecialchars($this->input->post('status', true))
			];
			$this->db->insert('siswa',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil ditambahkan</div>');
			redirect('siswa');
		}
	}

	public function hapus($id_peserta)
	{

		if ($this->siswa_model->hapus_data($id_peserta)==true) {
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil dihapus.</div>');

		}
		redirect('siswa');
	}

	public function edit($id_peserta = null)
	{
		$where = array('id_peserta' => $id_peserta);
		$data = [
			'title' => 'Edit siswa',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-user',
			'siswa' => $this->siswa_model->edit_data($where, 'siswa')->result()
		];

		$this->template->load('template', 'admin/siswa_edit', $data);
	}

	public function update()
	{
		$formSubmit = $this->input->post('submitform');

		if ($formSubmit == 'simpan') {
			$data = [
				'nm_peserta' => htmlspecialchars($this->input->post('nama', true)),
				'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'status' => htmlspecialchars($this->input->post('status', true)),
				'password' => md5($this->input->post('tgl_lahir'))
			];

			$this->db->where('id_peserta', $this->input->post('id_peserta'));
			$this->db->update('siswa',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil diubah</div>');
			redirect('siswa');
		}else{
			$data = [
				'password' => md5($this->input->post('tgl_lahir'))
			];

			$this->db->where('id_peserta', $this->input->post('id_peserta'));
			$this->db->update('siswa',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Password berhasil direset</div>');
			redirect('siswa');
		}

		
	}

}
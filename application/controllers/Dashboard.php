<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');

		if ($this->session->userdata('aktif') != TRUE) {
			$this->session->set_flashdata('message', 'Harap login untuk melanjutkan');
			redirect('login');
		}

		if ($this->session->userdata('jabatan') != 'Administrator') {
			redirect('dashboard2');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-dashboard',
			'pembayaran' => $this->dashboard_model->tampil_data(),
			'countproses' => $this->dashboard_model->countproses(),
			'countditolak' => $this->dashboard_model->countditolak(),
			'countditerima' => $this->dashboard_model->countditerima(),
			'sertifikat' => $this->dashboard_model->tampil_data1()
		];
		$this->template->load('template', 'admin/Dashboard', $data);
	}

	public function edit()
	{
		$where = array('username' => $this->session->userdata('username'));
		//$username = $this->session->userdata('username');

		$data = [
			'title' => 'Edit Profil',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-dashboard',
			'profil' => $this->dashboard_model->edit($where, 'admin')->result()
		];

		$this->template->load('template', 'admin/Dashboard_edit', $data);
	}

	public function update()
	{
		if ($this->input->post('password') != null) {

			$this->form_validation->set_rules('password', 'Password', 'trim');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]');

			if ($this->form_validation->run() == FALSE)
			{
				$this->edit();
			}
			else
			{
				if (!empty($_FILES["foto"]["name"])) {
					//$username = $this->input->post('username');
					$data = $this->session->userdata('foto');
					$path = './assets/img/';
					@unlink($path.$data);

					$config['upload_path'] = './assets/img';
					$config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
					$config['max_size'] = '1000000';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('foto')){
				//validasi gagal
						$error = ['error' => $this->upload->display_error()];
						$this->index($error);
					} else {
						$upload_data = $this->upload->data();
						$foto = $upload_data['file_name'];
					}
				}else{
					$foto = $this->input->post('foto_lama');
				}

				$data = [
					'nama_admin' => htmlspecialchars($this->input->post('nama', true)),
					'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
					'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
					'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
					'alamat' => htmlspecialchars($this->input->post('alamat', true)),
					'password' => md5($this->input->post('password', PASSWORD_DEFAULT)),
					'foto' => $foto
				];

				$this->db->where('id_admin', $this->input->post('id_admin'));
				$this->db->update('admin',$data);
				$this->session->sess_destroy();
				redirect('login?s=ok');	
			}
		}else{

			if (!empty($_FILES["foto"]["name"])) {
				//$username = $this->input->post('username');
				$data = $this->session->userdata('foto');
				$path = './assets/img/';
				@unlink($path.$data);

				$config['upload_path'] = './assets/img';
				$config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
				$config['max_size'] = '1000000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('foto')){
				//validasi gagal
					$error = ['error' => $this->upload->display_error()];
					$this->index($error);
				} else {
					$upload_data = $this->upload->data();
					$foto = $upload_data['file_name'];
				}
			}else{
				$foto = $this->input->post('foto_lama');
			}

			$data = [
				'nama_admin' => htmlspecialchars($this->input->post('nama', true)),
				'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'foto' => $foto
			];

			$this->db->where('id_admin', $this->input->post('id_admin'));
			$this->db->update('admin',$data);
			$this->session->sess_destroy();
			redirect('login?s=ok');
		}
	}

	public function addnew()
	{
		if ($this->session->userdata('level') != 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Warning!</h4>Anda tidak diizinkan untuk mengakses laman tersebut</div>');
			redirect('dashboard');		
		}else{
			$data = [
				'title' => 'Dashboard',
				'title_icon' => 'fa-folder-open',
				'breadcrumb_icon' => 'fa-dashboard',
			];
			$this->template->load('template', 'admin/Dashboard_add', $data);

			if ($this->input->post('nama') != null) {

				$this->form_validation->set_rules('password', 'Password', 'trim');
				$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]');
				$this->form_validation->set_rules('username' , 'Username' , 'is_unique[admin.username]');

				if($this->form_validation->run()== FALSE) {
					$this->addnew();
				}else {
					$config['upload_path'] = './assets/img/';
					$config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
					$config['max_size'] = '1000000';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('foto')){
				//validasi gagal
						$error = ['error' => $this->upload->display_error()];
						$this->index($error);
					} else {
						$upload_data = $this->upload->data();
						$foto = $upload_data['file_name'];
						$data = [
							'nama_admin' => htmlspecialchars($this->input->post('nama', true)),
							'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
							'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
							'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
							'alamat' => htmlspecialchars($this->input->post('alamat', true)),
							'username' => htmlspecialchars($this->input->post('username', true)),
							'password' => md5($this->input->post('password', PASSWORD_DEFAULT)),
							'level' => htmlspecialchars($this->input->post('level', true)),
							'foto' => $foto
						];
						$this->db->insert('admin',$data);
						$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil ditambahkan</div>');
						redirect('dashboard');
					}
				}
			}
		}
	}
}

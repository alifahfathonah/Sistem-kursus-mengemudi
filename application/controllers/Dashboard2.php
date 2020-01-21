<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dashboard2 extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard2_model');

		if ($this->session->userdata('aktif') != TRUE) {
			$this->session->set_flashdata('message', 'Harap login untuk melanjutkan');
			redirect('login');	
		}

		if ($this->session->userdata('jabatan') != 'Instruktur') {
			redirect('home');
		}
	}
	
	public function index()
	{
		if ($this->session->userdata('aktif') != TRUE) {
			$this->session->set_flashdata('message', 'Harap login untuk melanjutkan');
			redirect('login');	
		}

		if ($this->session->userdata('jabatan') != 'Instruktur') {
			redirect('dashboard');
		}

		$data = [
			'title' => 'Dashboard',
			'title_icon' => 'fa-home',
			'breadcrumb_icon' => 'fa-home',
			'jadwal' => $this->dashboard2_model->getjadwal($this->session->userdata('id')),
			'nilai' => $this->dashboard2_model->getnilai($this->session->userdata('id')),
			'selesai' => $this->dashboard2_model->siswaselesai($this->session->userdata('id')),
			'aktif' => $this->dashboard2_model->siswaaktif($this->session->userdata('id')),
			'gagal' => $this->dashboard2_model->siswagagal($this->session->userdata('id'))
		];

		$this->template->load('template', 'instruktur/home', $data);
	}

	public function edit()
	{
		$data = [
			'title' => 'Edit Profile',
			'title_icon' => 'fa-home',
			'breadcrumb_icon' => 'fa-home',
			'profile' => $this->dashboard2_model->getprofile($this->session->userdata('id'))
		];

		$this->template->load('template', 'instruktur/editprofile', $data);
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
					'nm_instruktur' => htmlspecialchars($this->input->post('nama', true)),
					'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
					'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
					'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
					'alamat' => htmlspecialchars($this->input->post('alamat', true)),
					'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
					'password' => md5($this->input->post('password', PASSWORD_DEFAULT)),
					'foto' => $foto
				];

				$this->db->where('id_instruktur', $this->input->post('id_instruktur'));
				$this->db->update('instruktur',$data);
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
				'nm_instruktur' => htmlspecialchars($this->input->post('nama', true)),
				'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'foto' => $foto
			];

			$this->db->where('id_instruktur', $this->input->post('id_instruktur'));
			$this->db->update('instruktur',$data);
			$this->session->sess_destroy();
			redirect('login?s=ok');
		}
	}
}
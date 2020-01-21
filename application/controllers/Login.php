<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');

		if (isset($_GET['s'])) {
			if ($_GET['s'] == 'ok') {
				$this->session->set_flashdata('message', 'Data berhasil diubah silahkan login untuk melanjutkan');
			}
		}
	}

	public function index()
	{
		if ($this->session->userdata('aktif') == TRUE) {
			redirect('home');
		}

		$this->load->view('auth/login');
	}

	public function auth()
	{
		$username = $this->input->post('username'); 
		$password = md5($this->input->post('password'));

		$cek_admin = $this->login_model->auth_admin($username,$password);

		if ($cek_admin->num_rows() > 0) {
			//$where = array('username' => $username);
			$data = $cek_admin->row_array();
			$data_session = array(
				'id' => $data['id_admin'],
				'nama' => $data['nama_admin'],
				'tmpt_lahir' => $data['tmpt_lahir'],
				'tgl_lahir' => $data['tgl_lahir'],
				'alamat' => $data['alamat'],
				'foto' => $data['foto'],
				'username' => $username,
				'jabatan' => 'Administrator',
				'jns_kel' => $data['jns_kel'],
				'aktif' => TRUE,
				'level' => $data['level']
			);

			$this->session->set_userdata($data_session);
			redirect('dashboard');
		}else{
			$cek_instruktur = $this->login_model->auth_instruktur($username,$password);
			if ($cek_instruktur->num_rows() > 0) {
				$data = $cek_instruktur->row_array();
				$data_session = array(
					'id' => $data['id_instruktur'],
					'nama' => $data['nm_instruktur'],
					'tmpt_lahir' => $data['tmpt_lahir'],
					'tgl_lahir' => $data['tgl_lahir'],
					'alamat' => $data['alamat'],
					'foto' => $data['foto'],
					'username' => $username,
					'jabatan' => 'Instruktur',
					'jns_kel' => $data['jns_kel'],
					'aktif' => TRUE
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('dashboard2'));
			}else{
				$this->session->set_flashdata('message', 'Username atau Password salah');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}
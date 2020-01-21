<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		redirect('home');
	}

	public function action()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek= $this->auth_model->cek($username,$password);

		if ($cek->num_rows() > 0) {
			$data = $cek->row_array();

			$data_session =  array(
				'id' => $data['id_peserta'],
				'nama' => $data['nm_peserta'],
				'foto' => 'default.png',
				'username' => $username,
				'jabatan' => 'Peserta',
				'aktif' => TRUE,
			);
			$this->session->set_userdata($data_session);

			redirect('profile');
		}else{
			$this->session->set_flashdata('message', "<script>
				$('#wrong').modal('show');
				</script>");
			redirect('home');
		}
	}

}
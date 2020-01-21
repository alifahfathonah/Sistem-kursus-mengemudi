<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');

		if (isset($_GET['s'])) {
			if ($_GET['s'] == 'warning') {
				$this->session->set_flashdata('message', "<script>
					$('#warning').modal('show');
					</script>");
			}elseif($_GET['s'] == 'failed'){
				$this->session->set_flashdata('message', "<script>
					$('#failed').modal('show');
					</script>");
			}
		}
	}

	public function index()
	{
		$data = [
			'instruktur' => $this->home_model->getinstruktur()->result(),
			'testi' =>$this->home_model->gettestimoni()->result()
		];

		$this->load->view('frontend/home',$data);
		//$this->template->load('frontend/template','frontend/home');
	}

	public function reg()
	{
		$this->form_validation->set_rules('username' , 'Username' , 'trim|alpha_numeric|is_unique[siswa.username]',['alpha_numeric' => 'Hanya Gunakan Huruf dan Angka'],['is_unique'=> 'Username Sudah Digunakan']);

		if($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('message', "<script>
				$('#register').modal('show');
				</script>");
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
				'password' => md5($this->input->post('password', PASSWORD_DEFAULT)),
				'status' => 'Tidak Aktif'
			];
			$this->db->insert('siswa',$data);
			$this->session->set_flashdata('message', "<script>
				$('#succes').modal('show');
				</script>");
			redirect('home');
		}
	}

}
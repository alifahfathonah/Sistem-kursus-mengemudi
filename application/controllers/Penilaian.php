<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Penilaian extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('penilaian_model');

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
			'title' => 'Penilaian',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-pencil',
			'nilai' => $this->penilaian_model->getdata($this->session->userdata('id'))
		];

		$this->template->load('template', 'instruktur/penilaian', $data);
	}

	public function addnilai($id_jadwal)
	{
		$getdata = $this->penilaian_model->getjadwaldata($id_jadwal);
		$getsiswa = $this->penilaian_model->getsiswa($getdata->id_peserta);

		$data = [
			'title' => 'Penilaian',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-pencil',
			'rekap' => $this->penilaian_model->getabsendata($id_jadwal),
			'jadwal' => $getdata,
			'siswa' => $getsiswa
		];

		$this->template->load('template', 'instruktur/addnilai', $data);
	}

	public function adddata()
	{
		$uullaj = $this->input->post('uullaj');
		$pdkb = $this->input->post('pdkb');
		$ttssb = $this->input->post('ttssb');
		$mrlp = $this->input->post('mrlp');
		$mrjr = $this->input->post('mrjr');
		$pkb = $this->input->post('pkb');

		$jumlah = $uullaj + $pdkb + $ttssb + $mrlp + $mrjr + $pkb;

		$data = [
			'id_peserta' => htmlspecialchars($this->input->post('id_peserta', true)),
			'id_instruktur' => $this->session->userdata('id'),
			'uullaj' => htmlspecialchars($this->input->post('uullaj', true)),
			'pdkb' => htmlspecialchars($this->input->post('pdkb', true)),
			'ttssb' => htmlspecialchars($this->input->post('ttssb', true)),
			'mrlp' => htmlspecialchars($this->input->post('mrlp', true)),
			'mrjr' => htmlspecialchars($this->input->post('mrjr', true)),
			'pkb' => htmlspecialchars($this->input->post('pkb', true)),
			'jumlah' => $jumlah,
		];
		$this->db->insert('penilaian',$data);

		$data1 = [
			'status' => 'Selesai'
		];

		$this->db->where('id_peserta', $this->input->post('id_peserta'));
		$this->db->update('siswa',$data1);

		redirect('penilaian');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Peserta extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('peserta_model');

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
			'title' => 'Siswa',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-users',
			'siswa' => $this->peserta_model->getdata($this->session->userdata('id')),
		];

		$this->template->load('template', 'instruktur/peserta', $data);
	}

	public function detail($id)
	{
		$getid = $this->peserta_model->getjadwal($id);

		$data = [
			'title' => 'Siswa',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-users',
			'siswa' => $this->peserta_model->getpeserta($id),
			'absen1'=> $this->peserta_model->getabsen($getid->id_jadwal,'1'),
			'absen2'=> $this->peserta_model->getabsen($getid->id_jadwal,'2'),
			'absen3'=> $this->peserta_model->getabsen($getid->id_jadwal,'3'),
			'absen4'=> $this->peserta_model->getabsen($getid->id_jadwal,'4'),
			'absen5'=> $this->peserta_model->getabsen($getid->id_jadwal,'5'),
			'absen6'=> $this->peserta_model->getabsen($getid->id_jadwal,'6'),
			'absen7'=> $this->peserta_model->getabsen($getid->id_jadwal,'7'),
			'absen8'=> $this->peserta_model->getabsen($getid->id_jadwal,'8'),
			'absen9'=> $this->peserta_model->getabsen($getid->id_jadwal,'9'),
			'absen10'=> $this->peserta_model->getabsen($getid->id_jadwal,'10')
		];

		$this->template->load('template', 'instruktur/detail', $data);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Jadwal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal_model');

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
			'title' => 'Jadwal',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-calendar',
			'jadwal'=> $this->jadwal_model->getdata($this->session->userdata('id'))
		];

		$this->template->load('template', 'instruktur/jadwal', $data);
	}

	public function absensi($id)
	{
		$cekstatus = $this->jadwal_model->cekstatus($id);
		$instruktur = $this->session->userdata('id');

		if ($cekstatus->id_instruktur != $instruktur ) {
			redirect('jadwal');
		}

		if ($cekstatus->status == 'Tidak Aktif') {
			redirect('jadwal');
		}

		$cek_jumlah = $this->jadwal_model->cekpertemuan($id);
		$pertemuan = $cek_jumlah->jumlah + 1;

		$data = [
			'title' => 'Absensi',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-calendar',
			'absensi' => $this->jadwal_model->getabsen($id),
			'id_jadwal' => $id,
			'pertemuan' => $pertemuan,
		];
		$this->template->load('template', 'instruktur/absensi', $data);
	}

	public function addabsensi()
	{
		$id = $this->input->post('id');
		$cek_jumlah = $this->jadwal_model->cekpertemuan($id);
		$pertemuan = $cek_jumlah->jumlah + 1;
		$formsubmit = $this->input->post('formsubmit');
		$peserta = $this->jadwal_model->getpeserta($id);

		if ($formsubmit == 'ok') {
			if ($pertemuan == '10') {
				$data1 = [
					'status' => 'Tidak Aktif'
				];
				$this->db->where('id_jadwal', $id);
				$this->db->update('jadwal',$data1);

				$data2 = [
					'status' => 'Penilaian'
				];

				$this->db->where('id_peserta', $peserta->id_peserta);
				$this->db->update('siswa',$data2);

				$data = [
					'id_jadwal' => $id,
					'pertemuan' => $pertemuan,
					'keterangan' => htmlspecialchars($this->input->post('progress', true)),
					'tgl' => htmlspecialchars($this->input->post('tgl', true))
				];
				$this->db->insert('absensi',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Absensi berhasil ditambahkan.</div>');
				redirect(base_url('jadwal/absensi/').$id);
			}else{
				$data = [
					'id_jadwal' => $id,
					'pertemuan' => $pertemuan,
					'keterangan' => htmlspecialchars($this->input->post('progress', true)),
					'tgl' => htmlspecialchars($this->input->post('tgl', true))
				];
				$this->db->insert('absensi',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Absensi berhasil ditambahkan.</div>');
				redirect(base_url('jadwal/absensi/').$id);
			}
		}elseif ($formsubmit == 'failed') {
			$data1 = [
				'status' => 'Tidak Aktif'
			];
			$this->db->where('id_jadwal', $id);
			$this->db->update('jadwal',$data1);

			$data = [
				'status' => 'Gagal'
			];

			$this->db->where('id_peserta', $peserta->id_peserta);
			$this->db->update('siswa',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Data Berhasil dirubah</div>');
			redirect(base_url('jadwal'));
		}
	}
}
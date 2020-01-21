<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Pilihjadwal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('pilihjadwal_model');

		$jadwal = $this->pilihjadwal_model->getjadwalpeserta($this->session->userdata('id'));

		if ($this->session->userdata('aktif') != TRUE) {
			redirect('home');
		}


		if ($jadwal != null) {
			redirect('profile');
		}

		$status = $this->pilihjadwal_model->getdata($this->session->userdata('id'));

		if ($status->status == 'Tidak Aktif') {
			redirect('profile');
		}

	}

	public function index()
	{
		$data = [
			'title' => 'Pilih Jadwal',
			'small' => 'Welcome',
			'instruktur' => $this->pilihjadwal_model->getinstruktur()->result()
		];

		$this->template->load('frontend/template','frontend/pilihjadwal', $data);
	}

	public function Pilih($id)
	{
		$data = [
			'title' => 'Pilih Jam',
			'small' => 'Welcome',
			'id' => $id,
			'instruktur'=> $this->pilihjadwal_model->getdatainstruktur($id),
			'jam1' => $this->pilihjadwal_model->getjadwal($id,'08:00:00'),
			'jam2' => $this->pilihjadwal_model->getjadwal($id,'09:00:00'),
			'jam3' => $this->pilihjadwal_model->getjadwal($id,'10:00:00'),
			'jam4' => $this->pilihjadwal_model->getjadwal($id,'11:00:00'),
			'jam5' => $this->pilihjadwal_model->getjadwal($id,'12:00:00'),
			'jam6' => $this->pilihjadwal_model->getjadwal($id,'13:00:00'),
			'jam7' => $this->pilihjadwal_model->getjadwal($id,'14:00:00'),
			'jam8' => $this->pilihjadwal_model->getjadwal($id,'15:00:00'),
			'jam9' => $this->pilihjadwal_model->getjadwal($id,'16:00:00'),
			'jam10' => $this->pilihjadwal_model->getjadwal($id,'17:00:00'),
			'jam11' => $this->pilihjadwal_model->getjadwal($id,'18:00:00'),
			'jam12' => $this->pilihjadwal_model->getjadwal($id,'19:00:00'),
			'jam13' => $this->pilihjadwal_model->getjadwal($id,'20:00:00')
		];

		$this->template->load('frontend/template','frontend/pilihjam', $data);
	}

	public function simpan()
	{
		$jam = $this->input->post('jam');

		switch ($jam) {
			case 'jam1':

			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'08:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '08:00:00',
					'status' => 'Aktif'
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;

			case 'jam2':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'09:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '09:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;

			case 'jam3':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'10:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '10:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam4':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'11:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '11:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam5':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'12:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '12:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam6':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'13:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '13:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam7':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'14:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '14:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam8':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'15:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '15:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam9':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'16:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '16:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam10':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'17:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '17:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam11':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'18:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '18:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam12':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'19:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '19:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			case 'jam13':
			$cek = $this->pilihjadwal_model->getjadwal($this->input->post('id'),'20:00:00');

			if ($cek != NULL) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
				redirect('pilihjadwal');
			}else{
				$data = [
					'id_peserta' => $this->session->userdata('id'),
					'id_instruktur' => htmlspecialchars($this->input->post('id', true)),
					'tgl_mulai' => DATE('Y-m-d', strtotime('+1 days')),
					'tgl_selesai' => DATE('Y-m-d', strtotime('+11 days')),
					'jam' => '20:00:00',
					'status' => 'Aktif',
				];
				$this->db->insert('jadwal',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Jadwal berhasil dipilih, proses belajar mengajar akan dimulai besok. Datanglah tepat waktu!</div>');
				redirect('profile');
			}
			break;
			default:
			$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Jadwal gagal dipilih, jadwal mungkin telah diambil oleh peserta lain. silahkan pilih ulang</div>');
			redirect('pilihjadwal');
			break;
		}
	}
}
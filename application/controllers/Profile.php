<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');

		$status = $this->profile_model->getdata($this->session->userdata('id'));

		if ($this->session->userdata('aktif') != TRUE) {
			redirect('home');
		}

		if ($this->session->userdata('jabatan') != 'Peserta') {
			redirect('dashboard');
		}

		if ($status->status == 'Tidak Aktif') {
			redirect('bayar');
		}elseif ($status->status == 'Proses') {
			redirect('proses');
		}elseif ($status->status == 'Ditolak'){
			$this->session->sess_destroy();
			redirect('home?s=failed');
		}

	}
	
	public function index()
	{
		$jadwal = $this->profile_model->getjadwal($this->session->userdata('id'));

		if ($jadwal->id_peserta == null) {
			redirect('pilihjadwal');
		}

		$id = $this->session->userdata('id');
		$data = [
			'title' => 'Profil',
			'small' => 'Welcome',
			'profile' => $this->profile_model->getdata($id),
			'hitung' => $this->profile_model->hitunghari($id),
			'absen1'=> $this->profile_model->getabsen($jadwal->id_jadwal,'1'),
			'absen2'=> $this->profile_model->getabsen($jadwal->id_jadwal,'2'),
			'absen3'=> $this->profile_model->getabsen($jadwal->id_jadwal,'3'),
			'absen4'=> $this->profile_model->getabsen($jadwal->id_jadwal,'4'),
			'absen5'=> $this->profile_model->getabsen($jadwal->id_jadwal,'5'),
			'absen6'=> $this->profile_model->getabsen($jadwal->id_jadwal,'6'),
			'absen7'=> $this->profile_model->getabsen($jadwal->id_jadwal,'7'),
			'absen8'=> $this->profile_model->getabsen($jadwal->id_jadwal,'8'),
			'absen9'=> $this->profile_model->getabsen($jadwal->id_jadwal,'9'),
			'absen10'=> $this->profile_model->getabsen($jadwal->id_jadwal,'10'),
			'nilai' => $this->profile_model->getnilai($id),
			'sertifikat' => $this->profile_model->ceksertifikat($id)
		];

		$this->template->load('frontend/template','frontend/profile', $data);
	}

	public function update()
	{

		$data = [
			'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
			'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
			'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
			'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
			'alamat' => htmlspecialchars($this->input->post('alamat', true)),
			'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
		];
		$this->db->where('id_peserta', $this->session->userdata('id'));
		$this->db->update('siswa',$data);
		$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Data berhasil tersimpan</div>');
		redirect('profile');
	}

	public function pass()
	{
		$passlama = md5($this->input->post('passlama'));
		if ($passlama != $this->input->post('passasli')) {
			$this->session->sess_destroy();
			redirect('home?s=warning');
		}else{

			$this->form_validation->set_rules('passbaru', 'Password', 'trim|min_length[6]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[passbaru]');

			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('message1', "<script>
					$('#pass').modal('show');
					</script>");
				$this->index();
			}
			else{

				$data = ['password' => md5($this->input->post('passbaru', PASSWORD_DEFAULT))];
				$this->db->where('id_peserta', $this->session->userdata('id'));
				$this->db->update('siswa',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Data berhasil tersimpan</div>');
				redirect('profile');
			}
		}
	}

	public function testi()
	{
		$data = ['testimoni' => htmlspecialchars($this->input->post('testi', true))];
		$this->db->where('id_peserta', $this->session->userdata('id'));
		$this->db->update('siswa',$data);
		$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Data berhasil tersimpan</div>');
		redirect('profile');
	}

	public function sertifikat($id_peserta)
	{
		$cek = $this->profile_model->cekserti($id_peserta);

		if ($cek->jumlah == 0){
			if ($this->session->userdata('id') == $id_peserta) {
				$data = [
					'id_peserta' => $id_peserta,
					'status' => 'Belum'
				];

				$this->db->insert('sertifikat',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Sertifikat akan segera diproses, anda akan dihubungi saat sudah selesai di proses</div>');
				redirect('profile');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> Pemeritahuan!</h4>Data yang anda minta tidak dapat diproses.</div>');
				redirect('profile');
			}
		}elseif($cek->jumlah >= 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-exclamation"></i> Pemeritahuan!</h4>Permintaan anda sedang diproses.</div>');
			redirect('profile');
		}
	}

	public function download()
	{
		$getfoto = $this->profile_model->ceksertifikat($this->session->userdata('id'));

		if ($getfoto->scan == null) {
			redirect('profile/sertifikat/'.$this->session->userdata('id'));
		}else{
			force_download('assets/img/sertifikat/'.$getfoto->scan,null);
		}
	}
}
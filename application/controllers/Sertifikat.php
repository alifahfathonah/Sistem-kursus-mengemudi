<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sertifikat_model');
		$this->load->helper('tgl_indo');

		if ($this->session->userdata('aktif') != TRUE) {
			$this->session->set_flashdata('message', 'Harap login untuk melanjutkan');
			redirect('login');
		}

		if ($this->session->userdata('jabatan') != 'Administrator') {
			redirect('home');
		}
	}

	public function index($error = null)
	{
		$data = [
			'title' => 'Sertifikat',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-certificate',
			'sertifikat'=> $this->sertifikat_model->getdata()
		];
		$this->template->load('template', 'admin/sertifikat', $data);
	}

	public function update($id_sertifikat)
	{
		$data = [
			'status' => 'Sudah'
		]; 

		$this->db->where('id_sertifikat', $id_sertifikat);
		$this->db->update('sertifikat', $data);
		redirect('sertifikat/cetak/'.$id_sertifikat);
	}

	public function cetak($id_sertifikat)
	{
		$getsertifikat = $this->sertifikat_model->getsertifikat($id_sertifikat);
		$getnilai = $this->sertifikat_model->getnilai($getsertifikat->id_peserta);
		$year = DATE('Y');
		$tglskrng = DATE('Y-m-d');
		$tanggal = date_indo($tglskrng);

		$tgllahir = date_indo($getnilai->tgl_lahir);

		$data = [
			'title' => 'Sertifikat',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-certificate',
			'sertifikat'=> $getsertifikat,
			'nilai' => $getnilai,
			'year' => $year,
			'tanggal' => $tanggal,
			'tgllahir' => $tgllahir
		];
		$this->template->load('template', 'admin/cetak', $data);
	}

	public function upload()
	{
		$cek = $this->sertifikat_model->cekscan($this->input->post('id_sertifikat'));

		if ($cek->scan != null) {
			$path = './assets/img/sertifikat/';
			@unlink($path.$cek->scan);

			$config['upload_path'] = './assets/img/sertifikat';
			$config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
			$config['max_size'] = '10240';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
				//validasi gagal
				$error = ['error' => $this->upload->display_error('<p>', '</p>')];
				$this->index($error);
			} else {
				$upload_data = $this->upload->data();
				$foto = $upload_data['file_name'];
				$data = [
					'scan' => $foto,
				];
				$this->db->where('id_sertifikat', $this->input->post('id_sertifikat'));
				$this->db->update('sertifikat',$data);
				$this->session->set_flashdata('message', "<script>
					$('#finally').modal('show');
					</script>");
				redirect('sertifikat/cetak/'.$this->input->post('id_sertifikat'));
			}
		}else{
			$config['upload_path'] = './assets/img/sertifikat';
			$config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
			$config['max_size'] = '10240';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
				//validasi gagal
				$error = ['error' => $this->upload->display_error('<p>', '</p>')];
				$this->index($error);
			} else {
				$upload_data = $this->upload->data();
				$foto = $upload_data['file_name'];
				$data = [
					'scan' => $foto,
				];
				$this->db->where('id_sertifikat', $this->input->post('id_sertifikat'));
				$this->db->update('sertifikat',$data);
				$this->session->set_flashdata('message', "<script>
					$('#finally').modal('show');
					</script>");
				redirect('sertifikat/cetak/'.$this->input->post('id_sertifikat'));
			}
		}
	}
}
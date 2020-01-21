<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Proses extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('proses_model');

		$id = $this->session->userdata('id');
		$cek = $this->proses_model->cekdata($id);
		$cekstatus = $this->proses_model->cekstatus($id);

		if ($this->session->userdata('aktif') != TRUE) {
			redirect('home');
		}

		if ($cek->jumlah >= '1') {
			redirect('bayar');
		}

		if ($this->session->userdata('jabatan') != 'Peserta') {
			redirect('dashboard');
		}

		if ($cekstatus == null) {
			
		}elseif ($cekstatus->status == 'Ditolak') {
			$this->session->set_flashdata('message1', "<script>
				$('#warning').modal('show');
				</script>");
		}
	}

	public function index()
	{
		$this->load->helper('string');
		$nominal = 650000;
		$kode = random_string('nozero', 3);

		$total = $nominal - $kode;

		$data = [
			'title' => 'Pembayaran',
			'small' => 'Welcome',
			'rekening' => $this->proses_model->getrek(),
			'kode' => $kode,
			'total' => $total
		];

		$this->template->load('frontend/template','frontend/bayar', $data);
	}

	public function simpan()
	{
		$data = [
			'kode_unik' => htmlspecialchars($this->input->post('kode_unik', true)),
			'id_rekening' => htmlspecialchars($this->input->post('rekening1', true)),
			'nominal' => htmlspecialchars($this->input->post('nominal', true)),
			'id_peserta' => $this->session->userdata('id')
		];
		$this->db->insert('bayar',$data);
		redirect('bayar');
	}
}
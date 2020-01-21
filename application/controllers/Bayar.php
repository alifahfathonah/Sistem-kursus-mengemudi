<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Bayar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('bayar_model');

		$id = $this->session->userdata('id');
		$cek = $this->bayar_model->cekdata($id);
		$cek1 = $this->bayar_model->cekdata1($id);
		$cekstatus = $this->bayar_model->cekstatus($id);

		if ($this->session->userdata('aktif') != TRUE) {
			redirect('home');
		}

		if ($this->session->userdata('jabatan') != 'Peserta') {
			redirect('dashboard');
		}

		if ($cek->jumlah == '0') {
			redirect('proses');
		}

		if ($cek1->num_rows() > '0' && $cek1->row()->status == 'Proses') {
			$this->session->set_flashdata('message', "<script>
				$('#finally').modal('show');
				</script>");
			redirect('home');
		}

		if ($cekstatus->status == "Aktif") {
			redirect('profile');
		}
	}

	public function index()
	{

		$nominal = $this->bayar_model->getdata($this->session->userdata('id'));

		$data = [
			'title' => 'Pembayaran',
			'small' => 'Welcome',
			'bayar' => $this->bayar_model->getdata($this->session->userdata('id')),
			'jumlah' => number_format($nominal->nominal,2,',','.')
		];

		$this->template->load('frontend/template','frontend/bayar1', $data);
	}

	public function upload()
	{
		$this->form_validation->set_rules('jumlah' , 'Jumlah' , 'trim|integer',['integer' => 'Hanya Gunakan Angka']);

		if($this->form_validation->run()== FALSE) {
			$this->session->set_flashdata('message1', "<script>
				$('#upload').modal('show');
				</script>");
			$this->index();
		}else{
			$tgl = date(DATE_ATOM);

			$config['upload_path'] = './assets/img/bukti';
			$config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
			$config['max_size'] = '1000000';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
				//validasi gagal
				$error = ['error' => $this->upload->display_error()];
				$this->index($error);
			} else {
				$upload_data = $this->upload->data();
				$foto = $upload_data['file_name'];
				$data = [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'nm_bank' => htmlspecialchars($this->input->post('nm_bank', true)),
					'no_rekening' => htmlspecialchars($this->input->post('no_rek', true)),
					'jmlh_pembayaran' => htmlspecialchars($this->input->post('jumlah', true)),
					'tgl_upload' => $tgl,
					'bukti_pembayaran' => $foto,
					'status' => 'Proses',
					'id_peserta' => $this->session->userdata('id'),
					'id_rekening' => htmlspecialchars($this->input->post('id_rek', true))
				];
				$this->db->insert('pembayaran',$data);
				$this->session->set_flashdata('message', "<script>
					$('#finally').modal('show');
					</script>");
				redirect('home');
			}
		}
	}

	public function ulang($id)
	{
		$this->bayar_model->hapusdata($id);
		redirect('proses');
	}
}
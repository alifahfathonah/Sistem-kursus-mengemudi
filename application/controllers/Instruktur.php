<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('instruktur_model');

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
			'title' => 'Data Instruktur',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-user',
			'instruktur' => $this->instruktur_model->tampil_data()->result(),
			'error' => $error['error']
		];
		$this->template->load('template', 'admin/Instruktur', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('no_telp' , 'No Telepon' , 'is_unique[instruktur.no_telp]',['is_unique' => '<div class= col-md-12><div class="alert alert-danger alert-dismissible fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Pemberitahuan!</h4>
			No Telepon sudah terdaftar
			</div> </div>']);
		$this->form_validation->set_rules('email' , 'Email' , 'is_unique[instruktur.email]',['is_unique' => '<div class= col-md-12><div class="alert alert-danger alert-dismissible fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Pemberitahuan!</h4>
			No Telepon sudah terdaftar
			</div> </div>']);

		if($this->form_validation->run()== FALSE) {
			$this->index();
		}else {
			$config['upload_path'] = './assets/img';
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
					'nm_instruktur' => htmlspecialchars($this->input->post('nama', true)),
					'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
					'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
					'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
					'alamat' => htmlspecialchars($this->input->post('alamat', true)),
					'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'password' => md5($this->input->post('tgl_lahir', PASSWORD_DEFAULT)),
					'foto' => $foto
				];
				$this->db->insert('instruktur',$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil ditambahkan</div>');
				redirect('instruktur');
			}
		}
	}

	public function hapus($id_instruktur)
	{
		$data = $this->instruktur_model->get_foto($id_instruktur);
		$path = './assets/img/';
		@unlink($path.$data->foto);
		if ($this->instruktur_model->hapus_data($id_instruktur)==true) {
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil dihapus.</div>');

		}
		redirect('instruktur');
	}

	public function edit($id_instruktur = null)
	{
		$where = array('id_instruktur' => $id_instruktur);
		$data = [
			'title' => 'Edit Instruktur',
			'title_icon' => 'fa-folder-open',
			'breadcrumb_icon' => 'fa-user',
			'instruktur' => $this->instruktur_model->edit_data($where, 'instruktur')->result()
		];

		$this->template->load('template', 'admin/Instruktur_edit', $data);

	}

	public function update()
	{
		$formSubmit = $this->input->post('submitform');

		if ($formSubmit == 'simpan') {
			if (!empty($_FILES["foto"]["name"])) {
				$id_instruktur = $this->input->post('id_instruktur');
				$data = $this->instruktur_model->get_foto($id_instruktur);
				$path = './assets/img/';
				@unlink($path.$data->foto);

				$config['upload_path'] = './assets/img';
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
				}
			}else{
				$foto = $this->input->post('foto_lama');
			}

			$data = [
				'nm_instruktur' => htmlspecialchars($this->input->post('nama', true)),
				'jns_kel' => htmlspecialchars($this->input->post('jns_kel', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'foto' => $foto
			];

			$this->db->where('id_instruktur', $this->input->post('id_instruktur'));
			$this->db->update('instruktur',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Data berhasil diubah</div>');
			redirect('instruktur');	
		}else{
			$data = [
				'password' => md5($this->input->post('tgl_lahir', PASSWORD_DEFAULT))
			];

			$this->db->where('id_instruktur', $this->input->post('id_instruktur'));
			$this->db->update('instruktur', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>Password berhasil direset</div>');
			redirect('instruktur');
		}
	}
}
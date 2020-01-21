<?php

class pembayaran_model extends CI_Model
{
	
	function tampil_data()
	{
		$this->db->select('
			`pembayaran`.*
			, `siswa`.`id_peserta`
			, `siswa`.`nm_peserta`
			, `rekening`.`id_rekening`
			, `rekening`.`nm_bank`');
		$this->db->join('siswa', '`pembayaran`.`id_peserta` = `siswa`.`id_peserta`');
		$this->db->join('rekening', '`rekening`.`id_rekening` = `pembayaran`.`id_rekening`');
		$this->db->from('pembayaran');

		$query = $this->db->get();
		return $query->result();
	}

	function lihat_data($id_pembayaran)
	{

		$this->db->select('
			`pembayaran`.*
			, `siswa`.`id_peserta`
			, `siswa`.`nm_peserta`
			, `rekening`.`id_rekening`
			, `rekening`.`nm_bank`');
		$this->db->join('siswa', '`pembayaran`.`id_peserta` = `siswa`.`id_peserta`');
		$this->db->join('rekening', '`rekening`.`id_rekening` = `pembayaran`.`id_rekening`');
		$this->db->from('pembayaran');
		$this->db->where('pembayaran`.`id_pembayaran`', $id_pembayaran);

		$query = $this->db->get();
		return $query->result();
	}

	function hapus_data()
	{
		$this->db->where('status','Ditolak');
		$this->db->where('DATEDIFF(CURDATE(), tgl_update) >', '30');
		$this->db->delete('pembayaran');
	}

	function cekdata($id)
	{
		$query = $this->db->query("SELECT COUNT(id_pembayaran) AS jumlah FROM pembayaran WHERE id_peserta='$id' AND STATUS='Ditolak'");
		return $query->row();
	}
}